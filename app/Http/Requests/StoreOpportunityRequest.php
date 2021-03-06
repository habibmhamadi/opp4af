<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpportunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'category_id' => 'required|numeric',
            'organization' => 'nullable|string',
            'fund_id' => 'required|numeric',
            'area_ids' => 'required',
            'location_ids' => 'required',
            'education_ids' => 'required',
            'deadline' => 'nullable|date|after:now',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:60',
            'description' => 'required|string',
        ];
    }
}
