<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
        [
            'name' => 'S5',
            'price' => '150',
            'category' => 'Mobile',
            'description' => 'A very good S5',
            'gallery' => 'https://images.samsung.com/is/image/samsung/de-galaxy-s5-g900f-sm-g900fzkadbt-000235099-standard'
        ]
    );
    }
}
