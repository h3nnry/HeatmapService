<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('link_types')->insert([
            'type' => 'product'
        ]);

        DB::table('link_types')->insert([
            'type' => 'category'
        ]);

        DB::table('link_types')->insert([
            'type' => 'static-page'
        ]);

        DB::table('link_types')->insert([
            'type' => 'checkout'
        ]);

        DB::table('link_types')->insert([
            'type' => 'homepage'
        ]);

    }
}
