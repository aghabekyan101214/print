<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Traits\GenerateRandomString;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin' . '@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
