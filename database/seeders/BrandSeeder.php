<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = Brand::factory()->definition();
            foreach (array_chunk($data, 10) as $brands) {
                Brand::insert($brands);
            }
        }
    }
}
