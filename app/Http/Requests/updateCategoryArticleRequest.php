<?php

namespace App\Http\Requests;

use App\Models\ArticleCategory;
use Illuminate\Foundation\Http\FormRequest;

class updateCategoryArticleRequest extends FormRequest
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
        $id=(ArticleCategory::where("slug",$this->slug)->first()),
        'articleCategoryName' => "required|string|max:255|unique:article_categories,articleCategoryName,"
        .$id["id"], // Adjust max length as needed
        // 'slug' => 'required|string|max:255|unique:article_categories,slug',  // Adjust max length as needed
        'hasComments' => 'sometimes', // Allow optional update
        'hasSource' => 'sometimes', // Allow optional update
        'hasYoutubeLink' => 'sometimes', // Allow optional update
        'hasAuthor' => 'sometimes', // Allow optional update
        ];
    }
}
