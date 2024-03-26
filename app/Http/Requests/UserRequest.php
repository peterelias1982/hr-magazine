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
            'name'=>'required|string|max:255',
            'slug'=>'required|unique:users,slug',
            'email'=>'nullable|email|unique:users,email',
            // 'password'=>'nullable|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[-_?@!$#%.]).*$/',
            // 'mobile'=>'nullable',
            // 'password' => 'required_if:create|string|min:8|confirmed', // Required on create, confirmed, minimum length
            'password' => 'nullable|string|min:8|confirmed',
             'mobile' => 'nullable|string', // Allow mobile to be empty
             'position' => 'required|string', // Position is required
             'userable_type' => 'nullable|string', // Allow userable_type to be empty
             'userable_id' => 'nullable|integer|exists:' . config('userable.model'), // Check if userable_id exists in userable model
             'active' => 'sometimes|boolean', // Allow updating `active` field (optional)
        ];
    }
}
