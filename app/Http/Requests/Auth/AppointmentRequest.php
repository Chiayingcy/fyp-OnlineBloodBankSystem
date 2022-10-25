<?php

namespace App\Http\Requests\Auth;

use App\Rules\Datebetween;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'appointmentDate' => ['required', 'date',New Datebetween()],
            'appointmentTime' => ['required'],
        ];
    }
}
