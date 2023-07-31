<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiPengemudiRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Ambil nilai input nomor telepon
        $noTelp = $this->input('no_telp');

        // Tambahkan awalan "+62" jika nomor telepon tidak memiliki awalan
        if (!str_starts_with($noTelp, '+62')) {
            $this->merge([
                'no_telp' => '+62' . $noTelp,
            ]);
        }
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
            'no_telp' => 'required|string|regex:/^\+62[0-9]{8,13}$/',
            'alamat' => 'required',
            'email' => 'required|unique:pengemudis|unique:users',
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
            'regex' => 'Format :attribute harus sesuai dengan format +628xxxxxxxxxx.',
        ];
        
    }
}
