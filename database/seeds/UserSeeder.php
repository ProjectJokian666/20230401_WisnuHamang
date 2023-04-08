<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->nik = '3506257005670001';
    	$admin->name = 'Admin';
    	$admin->email = 'admin@gmail.com';
    	$admin->password = Hash::make('admin');
    	$admin->level = '99';
    	$admin->save();

    	$admin = new User;
        $admin->nik = '3506257005670002';
    	$admin->name = 'User';
    	$admin->email = 'user@gmail.com';
    	$admin->password = Hash::make('user');
    	$admin->level = '1';
    	$admin->save();
    }
}
