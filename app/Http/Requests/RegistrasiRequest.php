<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiRequest extends FormRequest
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
            'nama' => 'required',
            'no_telp' => 'required|numeric|digits_between:10,12',
            'alamat' => 'required',
            'email' => 'required|unique:users|unique:pengemudis',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'no_telp' => 'Nomor Telphone',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirm' => 'Konfirmasi Password',
        ];
    }

    public function messages()
    {
        return [
            // 'paket' => 'Paket',
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah terdaftar.',
            'max' => ':attribute maksimal :max karakter.',
            'same' => 'Konfirmasi password tidak sesuai.',
            'numeric' => ':attribute harus berupa angka.',
            'digits_between' => ':attribute harus berupa angka dengan panjang minimal :min dan maksimal :max karakter.',
        ];
        
    }
}
