<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfile extends FormRequest
{
    
   

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
            'gender' => 'required|string|max:255',
            'email' => 'nullable|email|',
            'mobile' => 'nullable|string', 
            'position' => 'required|string', // Position is required
            'image' => 'sometimes',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'email'=>'enter your correct email',
            'firstName.max' =>'the name must not exceed 255 characters.',
            'secondName.max' =>'the name must not exceed 255 characters.',
    'fistName'=>'here',
    'secondName' => 'here',
                'gender' => 'here',
                'email.unique' => 'here must be unique',
                'mobile' => 'here', // Allow mobile to be empty
                'position' => 'here', 
            // Add more custom messages for other fields as needed
        ];
    }
}
