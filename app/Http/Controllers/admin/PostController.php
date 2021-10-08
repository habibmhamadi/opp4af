<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    use ImageUpload;

    public function __construct(Request $request)
    {
        $this->getRouteFilters($request);
    }

    public function index(Request $request)
    {
        $posts = Post::with('user');
        $posts = $this->applyRouteFilters($posts)->orderByDesc($this->order)->simplePaginate(10);
        $datas = [
            'posts' => $posts,
            'count' => ($request->query('page', 1) - 1) * 10,
            'query' => $request->query('query')
        ];
        return view('admin.post.index', $datas);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $this->uploadImage($request->file('image'));
        auth()->user()->posts()
            ->create($validated);
        return redirect()->route('admin.post.index')->with(['success' => 'Create success.']);
    }

    public function show(Post $post)
    {
        return view('admin.post.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('alter-post', $post), 401);
        return view('admin.post.edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        abort_if(Gate::denies('alter-post', $post), 401);
        $validated = $request->validated();
        $validated['published'] = false;
        if($request->hasFile('image'))
        {
            $this->deleteImage($post->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }
        $post->update($validated);
        return redirect()->route('admin.post.index')->with(['success' => 'Edit success.']);
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('alter-post', $post), 401);
        $this->deleteImage($post->image);
        $post->delete();
        return back()->with(['success' => 'Delete success.']);
    }

    public function publish(Post $post)
    {
        abort_if(Gate::denies('admin'), 401);
        $post->update(['published' => true]);
        return redirect()->route('admin.post.index')->with(['success' => 'Publish success.']);
    }

    public function unPublish(Post $post)
    {
        abort_if(Gate::denies('admin'), 401);
        $post->update(['published' => false]);
        return redirect()->route('admin.post.index')->with(['success' => 'Un-publish success.']);
    }


    private function getRouteFilters(Request $request)
    {
        $this->query = $request->query('query', '');
        $this->state = $request->query('state', '');
    }

    private function applyRouteFilters($posts)
    {
        if($this->state == 'published')
        {
            $posts = $posts->where('published', true);
        }
        else if ($this->state == 'unpublished')
        {
            $posts = $posts->where('published', false);
        }
        if ($this->query) {
            $posts = $posts->where('name', 'like', '%'.$this->query.'%');
        }
        if ($this->state == 'view')
        {
            $this->order = 'view';
        }
        else {
            $this->order = 'id';
        }
        return $posts;
    }
}
