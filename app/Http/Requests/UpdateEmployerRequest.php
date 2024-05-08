<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerRequest extends FormRequest
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
        $slug = $this->route('slug');
        return [
            'companyName'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'logo'=>'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'phone'=>'sometimes|string',
            'about_company'=>'required|string',
            'firstName' => 'required|string|max:255',
            'secondName' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'sometimes|email|unique:users,email,'.$slug.',slug',
            'value'=>'sometimes|string',
            'mobile' => 'sometimes|string', // Allow mobile to be empty
            'position' => 'required|string', // Position is required
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
