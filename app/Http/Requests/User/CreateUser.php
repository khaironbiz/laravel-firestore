<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'nama'          => 'required',
            'dob'           => 'required|date',
            'email'         => 'required|email',
            'phone'         => 'required',
            'nik'           => 'required',
            'berat_badan'   => 'required|numeric'
        ];
    }
}
