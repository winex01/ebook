<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Administrator',
            'email' => 'admin'.'@gmail.com',
            'password' => bcrypt('password'),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
