<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rules;

class UpdateProfileRequest extends FormRequest
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
            'email' => 'required|email',
            'phoneNo' => 'required|numeric|min:10|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'stateID' => 'required|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ];
    }
}
