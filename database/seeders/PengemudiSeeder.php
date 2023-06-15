<?php

namespace Database\Seeders;

use App\Models\Pengemudi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengemudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Pengemudi::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama' => 'Angga jon',
            'no_telp' => '0821223445',
            'email' => 'anggajon@gmiail.@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'Denpasar',
            'status' => 'tidak-tour'],

            ['nama' => 'Made Bawa',
            'no_telp' => '0823334765',
            'email' => 'madebawa@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'Badung',
            'status' => 'tidak-tour'],
        ];

        foreach ($data as $value){
        Pengemudi::insert([
            'nama' => $value['nama'],
            'no_telp' => $value['no_telp'],
            'email' =>  $value['email'],
            'password' => $value['password'],
            'alamat' => $value['alamat'],
            'status' => $value['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        }
    }
    
}
