<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('karyawan')->insert([
            'first_name'=>'Ani',
            'last_name'=>'Aniyaaa',
            'address'=>'Jagakarsa',
            'city_state_zip'=>'Jakarta',
            'home_phone'=>'021999123',
            'cell_phone'=>'082112344321',
            'email'=>'aniya@gmail.com',
            'applied_position'=>'Admin',
            'expected_salary'=>'8.000.000',
            'created_at'=>date ('Y-m-d H:i:s')
        ]);
        DB::table('karyawan')->insert([
            'first_name'=>'Cio',
            'last_name'=>'Ciola',
            'address'=>'Jagakarsa',
            'city_state_zip'=>'Jakarta',
            'home_phone'=>'021999456',
            'cell_phone'=>'082112345678',
            'email'=>'ciola@gmail.com',
            'applied_position'=>'Admin',
            'expected_salary'=>'8.000.000',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
