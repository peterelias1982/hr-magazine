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
            'fromDate'=>'required|date',
            'toDate'=>'required|date',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'streetNo'=>'required|integer',
            'streetName'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'postalCode'=>'required|max:255',
            'country'=>'required|max:255',
            'latitude'=>'required_without:googleMapLink|decimal',
            'longitude'=>'required_without:googleMapLink|required_with:latitude|decimal',
            'googleMapLink'=>'required_without:googleMapLink:longitude,latitude',
            'description'=>'required',
            'speakers'=>'required',
        ];
    }
}
