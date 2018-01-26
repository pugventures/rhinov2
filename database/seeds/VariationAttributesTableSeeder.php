<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariationAttributesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('variation_attributes')->insert([
            'title' => 'size',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_attributes')->insert([
            'title' => 'color',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
    }

}
