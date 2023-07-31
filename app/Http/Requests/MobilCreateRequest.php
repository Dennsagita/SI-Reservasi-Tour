<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilCreateRequest extends FormRequest
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
            'no_plat_mobil' => 'required|unique:mobils|max:11',
            'id_pengemudi' => 'required|unique:mobils',
            'merk' => 'required',
            'nama_mobil' => 'required|max:80',
            // 'paket' => 'required|unique:mobils',
        ];
    }

    public function attributes()
    {
        return [
            'no_plat_mobil' => 'Nomor Plat Mobil',
            'id_pengemudi' => 'Pengemudi',
            'merk' => 'Merk Mobil',
            'nama_mobil' => 'Nama Mobil',
        ];
    }

    public function messages()
    {
        return [
            // 'paket' => 'Paket',
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah terdaftar.',
            'max' => ':attribute maksimal :max karakter.',
        ];
        
    }
}
