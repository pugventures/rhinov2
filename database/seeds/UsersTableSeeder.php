<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'first_name' => 'Donny',
            'last_name' => 'Hansen',
            'email' => 'dhansen@pugventuresllc.com',
            'password' => bcrypt('F10na*77'),
            'role' => 'administrator',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
    }

}
