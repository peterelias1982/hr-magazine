<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceArticleRequest extends FormRequest
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
        'sourceName' => 'required|string|max:255', // Adjust max length as needed
        'sourceLink' => 'required|url', // Ensures a valid URL format
        'category_id' => 'required|exists:article_categories,id', // Ensures category exists
        'article_id' => 'required|exists:articles,id', // Ensures article exists

        ];
    }
}
