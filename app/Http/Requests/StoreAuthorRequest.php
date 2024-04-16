<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
            'firstName' => 'required|string|max:255',
            'secondName' => 'required|string|max:255',
            'email'=>'nullable|email',
            'mobile' => 'nullable|string',
            'position' => 'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'shortDescription'=>'required|string|max:1000',
            'linkedin'=>'required|url',
            'twitter' => 'required|url',
            'instagram' =>'required|url' ,
            'facebook'=>'required|url',
        ];

    }
public function messages()
{
    return [
        'required' => ':attribute is required',
        'url'=>'enter link only',
        
        'email'=>'enter your correct email',

        'image'=>'only jpg,png or jpeg can be uploaded',
        'shortDescription.max' => 'The description must not exceed 1000 characters.',
        'firstName.max' =>'the name must not exceed 255 characters.',
        'secondName.max' =>'the name must not exceed 255 characters.',

        // Add more custom messages for other fields as needed
    ];
}
}
