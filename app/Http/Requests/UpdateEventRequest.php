<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title'=>'required|max:255',
            'from'=>'required|date',
            'to'=>'required|date',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'streetNo'=>'required|integer',
            'city'=>'required|max:100',
            'state'=>'required|max:100',
            'postalCode'=>'required|max:20',
            'country'=>'required|max:100',
            'latitude'=>'required|decimal',
            'longitude'=>'required|decimal',
            'description'=>'required',
            'speakers'=>'required',
        ];
    }
}
