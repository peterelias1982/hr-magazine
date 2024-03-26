<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'articleCategoryName' => 'required|string|max:255|unique:article_categories,articleCategoryName', // Adjust max length as needed
        'slug' => 'required|string|max:255|unique:article_categories,slug',  // Adjust max length as needed
        'hasComments' => 'sometimes|boolean', // Allow optional update
        'hasSource' => 'sometimes|boolean', // Allow optional update
        'hasYoutubeLink' => 'sometimes|boolean', // Allow optional update
        ];
    }
}
