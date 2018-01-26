<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariationOptionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'black',
            'swatch' => '#000000',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'blue',
            'swatch' => '#1E294D',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'brown',
            'swatch' => '#683209',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'green',
            'swatch' => '#006A29',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'gray',
            'swatch' => '#68686A',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'red',
            'swatch' => '#BF1625',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'yellow',
            'swatch' => '#FFEC58',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 1,
            'title' => 'white',
            'swatch' => '#FFFFFF',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => 'small',
            'swatch' => 'S',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => 'medium',
            'swatch' => 'M',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => 'large',
            'swatch' => 'L',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => 'x large',
            'swatch' => 'XL',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => '2x large',
            'swatch' => '2XL',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('variation_options')->insert([
            'variation_attribute_id' => 2,
            'title' => '3x large',
            'swatch' => '3XL',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
    }

}
