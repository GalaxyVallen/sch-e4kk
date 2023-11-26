<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi!',
            'name.string' => 'Nama tidak boleh angka atau simbol!',
            'name.min' => 'Nama harus memiliki minimal 5 karekter!',
            'username.required' => 'Username harus diisi!',
            'username.min' => 'Username harus memiliki minimal 5 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email tidak sesuai!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password harus memiliki minimal 6 karakter!',
            'password.confirmed' => 'Ulangi password tidak sesuai!'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5',
            'username' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ];
    }
}
