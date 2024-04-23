<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'gender' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
            'mobile' => 'nullable|string', // Allow mobile to be empty
            'position' => 'required|string', // Position is required
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
            'email' => 'here',
            'password' => 'here',
            'mobile' => 'here', // Allow mobile to be empty
            'position' => 'here', 
        // Add more custom messages for other fields as needed
    ];
}
}
