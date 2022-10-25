<?php

namespace App\Http\Requests\Auth;

use App\Rules\Datebetween;
use Illuminate\Foundation\Http\FormRequest;

class HospitalsEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'hospitalID' => 'required',
            'eventName' => 'required|',
            'eventDate' => ['required', 'date', New Datebetween()],
            'eventTime' => 'required|',
            'eventDescription' => 'required|',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
