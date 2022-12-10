<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = Order::factory()->definition();
            foreach (array_chunk($data, 500) as $orders) {
                Order::insert($orders);
            }
        }
    }
}
