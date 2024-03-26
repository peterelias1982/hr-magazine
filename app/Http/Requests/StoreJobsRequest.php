<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobsRequest extends FormRequest
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
            'title'=>'required',
            'slug'=>'required|unique:job_details,slug',
            'company'=>'required',
            'city'=>'required',
            'image'=>'required|image|mimes:jpeg,png,gif|max:2048',
            'deadline'=>'required',
            'content'=>'required',
            'email'=>'required|email',
            'category_id'=>'required|exists:job_categories,id',
            'employer_id'=>'required|exists:employers,id'
        ];
    }
}
