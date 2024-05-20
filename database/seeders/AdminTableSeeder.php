<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    public function run(): void
    {
        $password=Hash::make('12345678');
        $adminRecorde=[
            [
                'name'=>'Admin',
                'type'=>'admin',
                'mobile'=>'01773443625',
                'email'=>'admin@gmail.com',
                'password'=>$password,
                'image'=>'',
                'status'=>1,
            ]
        ];
        Admin::insert($adminRecorde);
    }
}
