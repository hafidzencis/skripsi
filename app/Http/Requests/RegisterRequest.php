<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'nama' => 'required|min:8|max:255',
            'email' =>  'required|unique:users|email',
            'password' => ['required','min:8','max:255',
                Password::min(8)
                ->mixedCase()
                ->numbers()],
            'nik'=> 'required|numeric|digits:16',
            'no_hp' => 'required|numeric|min:11',
            'tempat_lahir' => 'required|min:4',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'image_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_3x4' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
