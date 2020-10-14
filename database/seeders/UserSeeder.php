<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elfuzevi = new \App\Models\User;
        $elfuzevi->name = 'Ebu Muhendis El-fuzevi';
        $elfuzevi->email = 'fuzevi@elfuzevi.com';
        $elfuzevi->username = 'elfuzevi';
        $elfuzevi->password = Hash::make('password');
        $elfuzevi->save();
    }
}
