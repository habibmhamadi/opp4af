<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOpportunityRequest extends FormRequest
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
        $storeObj = new StoreOpportunityRequest();
        $rules = $storeObj->rules();
        $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        return $rules;
    }
}
