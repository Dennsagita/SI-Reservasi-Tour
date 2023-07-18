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
            'no_plat_mobil' => 'unique:mobils|max:11',
            'id_pengemudi' => 'unique:mobils',
            'merk' => 'required',
            'nama_mobil' => 'required|max:80',
            'paket' => 'unique:mobils',
        ];
    }

    public function attributes()
    {
        return [
            'id_pengemudi' => 'pemilik',
        ];
    }

    public function messages()
    {
        return [
            'id_pengemudi' => 'Pemilik Sudah Terdaftar Mempunyai Mobil',
            'no_plat_mobil' => 'No Plat Mobil maksimal :max karakter'
        ];
        
    }
}
