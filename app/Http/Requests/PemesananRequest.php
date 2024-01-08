<?php

namespace App\Http\Requests;

use App\Models\Paket;
use Illuminate\Foundation\Http\FormRequest;

class PemesananRequest extends FormRequest
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
        'id_paket' => 'required',
        'tgl_tour_mulai' => 'required',
        'tgl_tour_selesai' => 'required',
        'tgl_berangkat' => 'required',
        'jam_datang' => 'required',
        'lokasi_penjemputan' => 'required',
        'nominal_dp' => [
            'required',
            'numeric',
            function ($attribute, $value, $fail) {
                $paket = Paket::find($this->id_paket);

                if (!$paket) {
                    $fail('Paket tidak ditemukan.');
                } else {
                    $harga_paket = $paket->harga;
                    $harga_diskon = $harga_paket * 0.2; // Harga paket dikurangi 20%

                    if ($value < $harga_diskon) {
                        $fail("Nominal DP kurang dari 20% (Rp." . number_format($harga_diskon, 0). ")");
                    }
                }
            },
        ],
    ];
}

    public function attributes()
    {
        return [
            'id_paket' => 'Paket',
            'tgl_tour_mulai' => 'Tanggal Tour Mulai',
            'tgl_tour_selesai' => 'Tanggal Tour Selesai',
            'tgl_berangkat' => 'Tanggal Berangkat',
            'jam_datang' => 'Jam Berangkat',
            'lokasi_penjemputan' => 'Lokasi Penjemputan',
            'nominal_dp' => 'Nominal DP',
            // 'images[]' => 'Bukti DP',
        ];
    }

    public function messages()
    {
        return [
            // 'paket' => 'Paket',
            'required' => ':attribute harus diisi.',
            // 'unique' => ':attribute sudah terdaftar.',
            // 'max' => ':attribute maksimal :max karakter.',
            // 'same' => 'Konfirmasi password tidak sesuai.',
            'numeric' => ':attribute harus berupa angka.',
            // 'digits_between' => ':attribute harus berupa angka dengan panjang minimal :min dan maksimal :max karakter.',
        ];
        
    }
}
