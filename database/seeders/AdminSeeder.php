<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama' => 'admin',
            'no_telp' => '0821222845',
            'email' => 'admin1@gmiail.@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'Denpasar',],

            ['nama' => 'admin 2',
            'no_telp' => '0823334645',
            'email' => 'admin2a@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => 'Badung',],
        ];

        foreach ($data as $value){
        Admin::insert([
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
