<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            
            'title' => 'required|string|max:255|unique:articles,title', // Adjust max length as needed
            'slug' => 'required|string|max:255|unique:articles,slug',  // Adjust max length as needed
            'image' => 'required|string|mimes:jpeg,png,jpg|max:2048', // Adjust validation for image based on your requirements (e.g., mimes, size)
            'content' => 'required|string',
            'category_id' => 'required|exists:article_categories,id', // Ensures category exists
            'user_id' => 'nullable|exists:users,id', // Ensures user exists
            'approved' => 'sometimes|boolean', // Allow optional update for approved field
            // 'articleable_id' => 'required|exists:articleable_type,id', // Assuming morph relation
            // 'articleable_type' => 'required|string', // Assuming morph relation
        ];
    }
}
