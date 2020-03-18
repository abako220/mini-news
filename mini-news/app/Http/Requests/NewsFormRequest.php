<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
                'title' => 'required|string|max:100',
                'description' => 'required|string|min:5',
                'news_type' => 'required|integer',
                'posted_by' => 'required|string|max:20'
            ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'description.required' => 'Description is required!',
            'news_type.required' => 'News type is required!',
            'posted_by.required' => 'Posted_by is required!',
        ];
    }

    /*
    *   Filters to be applied to the input
    */
    public function filters() {
        return [
            'title' => 'capitalize',
            'description' => 'lowercase',
            'posted_by' => 'trim|capitalize',

        ];
    }
}
