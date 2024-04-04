<?php

namespace App\Http\Requests;

use App\Models\ArticleCategory;
use App\Rules\ArticleAttachesRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
        $category =  ArticleCategory::where('id', $this->category_id)->first();

        return [
            'title' => "required|string|max:255|unique:articles,title,{$this->slug},slug",
            'image' => 'sometimes|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required|string',
            'category_id' => 'required|exists:article_categories,id',
            'articleable' => ['sometimes', 'array', new ArticleAttachesRule($category)],
            'tags_id'  => 'sometimes|array',
            'user_id' => 'nullable',
            'approved' => 'sometimes',
            'author_id' => Rule::requiredIf(fn() => $category? $category['hasAuthor'] : false),

        ];
    }
}
