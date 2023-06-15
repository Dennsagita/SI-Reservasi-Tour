<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama' => 'Dika di',
            'no_telp' => '0821223445',
            'email' => 'dikaadi@gmail.@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => '0823334445',],

            ['nama' => 'Agus Suputra',
            'no_telp' => '0823334445',
            'email' => 'agussuputra@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => '0823334445',],
        ];

        foreach ($data as $value){
        User::insert([
            'nama' => $value['nama'],
            'no_telp' => $value['no_telp'],
            'email' =>  $value['email'],
            'password' => $value['password'],
            'alamat' => $value['alamat'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        }
    }
}
