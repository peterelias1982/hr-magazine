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
            'address'=>'required',
            'latitude'=>'sometimes|decimal',
            'longitude'=>'sometimes|decimal',
            'longitude'=>'sometimes|decimal',
            'googleMapLink'=>'sometimes',
            'description'=>'required',
            'speakers'=>'required',
            'event_id'=>'required',
            'topic'=>'required|max:255',
            'fromTime'=>'required|time',
            'toTime'=>'required|time',
            'speaker'=>'required|max:255',
        ];
    }
}
