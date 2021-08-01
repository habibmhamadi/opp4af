<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.category.index', [
            'categories' => Category::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 401);
        Category::create($request->validate(['name' => 'required|min:3|unique:categories,name']));
        return redirect()->route('admin.category.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies('admin'), 401);
        $category->update($request->validate(['name' => 'required|min:3|unique:categories,name']));
        return redirect()->route('admin.category.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('admin'), 401);
        $category->delete();
        return redirect()->route('admin.category.index')->with(['success' => __('Delete success.')]);
    }
}
