<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'streetNo'=>'required|integer',
            'streetName'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'postalCode'=>'required|max:255',
            'country'=>'required|max:255',
            'latitude'=>'required_without:googleMapLink',
            'longitude'=>'required_without:googleMapLink|required_with:latitude',
            'googleMapLink'=>'required_if:latitude,NULL|required_if:longitude,NULL',
            'description'=>'required',
            'speakers'=>'required',
//            agenda validation
            'topic'=>'required|array',
            'fromTime'=>'required|array',
            'toTime'=>'required|array',
            'speaker'=>'required|array',
        ];
    }
}
