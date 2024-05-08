<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobsRequest extends FormRequest
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
            'company'=>'required',
            "about_company"=>'required|string',
            'city'=>'required',
            'state'=>'required',
            'streetNo'=>'required',
            'streetName'=>'required',
            'postalCode'=>'required',
            'country'=>'required',
            'careerLevel'=>'required',
            'image'=>'sometimes|image|mimes:jpeg,png,gif|max:2048',
            'deadline'=>'required',
            'content'=>'required|string',
            'email'=>'required|email',
            'category_id'=>'required|exists:job_categories,id',
        ];
    }
}
