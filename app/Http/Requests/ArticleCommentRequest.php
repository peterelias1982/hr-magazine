<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCommentRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id', // Ensures user exists
            'content' => 'required|string',
            'parentComment' => 'nullable|exists:article_comments,id', // Allow null for root comments
            'article_id' => 'required|exists:articles,id', // References articles table (corrected)
        ];
    }
}
