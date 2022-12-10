<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
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
            $data[] = OrderDetail::factory()->definition();
            foreach (array_chunk($data, 500) as $orderDetails) {
                OrderDetail::insert($orderDetails);
            }
        }

        OrderDetail::chunk(1000, function ($orderDetails) {
            foreach ($orderDetails as $orderDetail) {
                $orderDetail->update([
                    'order_id' => $orderDetail->id,
                ]);
            }
        });
    }
}
