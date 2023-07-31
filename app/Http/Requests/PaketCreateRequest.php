<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketCreateRequest extends FormRequest
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
            'destinasi' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            // 'id_mobil' => 'mobil',
        ];
    }

    public function messages()
    {
        return [
           
        ];
        
    }
}
