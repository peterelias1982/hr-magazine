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
            'streetNo'=>'required|integer|min:1',
            'streetName'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'postalCode'=>'required|max:255',
            'country'=>'required|max:255',
            'latitude' => [
                'required_if:googleMapLink,Null',
                'required_with:longitude',
                'numeric', 
                'regex:/^[-+]?(90(\.0+)?|[0-8]?\d(\.\d+)?)$/',
                'nullable',
            ],
            'longitude' => [
                'required_if:googleMapLink,Null',
                'required_with:latitude',
                'numeric', 
                'regex:/^[-+]?((180(\.0+)?)|((1[0-7]\d|\d{1,2})(\.\d+)?))$/',
                'nullable',
            ],
            'googleMapLink'=>'required_if:latitude,NULL|required_if:longitude,NULL',
            'description'=>'required',
            'speakers'=>'required',
//            agenda validation
            'topic'=>'required|array',
            'fromTime'=>'required|array',
            'toTime'=>'required|array',
            'speaker'=>'required|array',
            'topic.*.*'=>'required|max:255',
            'fromTime.*.*'=>'required',
            'toTime.*.*'=>'required',
            'speaker.*.*'=>'required|max:255',
        ];
    }
    
    public function messages()
    {
        return[
            'latitude.regex'=>'Latitude value should be between -90 and +90',
            'longitude.regex'=>'Longitude value should be between -180 and +180',
            'topic.*.*.required'=>'Topic is required',
            'fromTime.*.*.required'=>'From (Time) is required',
            'toTime.*.*.required'=>'To (Time) is required',
            'speaker.*.*.required'=>'Speaker is required',
        ];
    }
}
