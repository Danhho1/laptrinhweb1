<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderDetailSeeder extends Seeder
{
    const MAX_RECORDS = 100;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lấy tất cả các product_id
         $productIds = DB::table('products')->pluck('id')->toArray();
         $productCount = count($productIds);
        for ($i = 1; $i < self::MAX_RECORDS; $i++) {
            // Chọn ngẫu nhiên một sản phẩm
            $productId = $productIds[array_rand($productIds)];
            $product = DB::table('products')->where('id', $productId)->first();
            
            // Số lượng ngẫu nhiên từ 1-5
            $quantity = rand(1, 5);
            
            // Cập nhật total_amount trong bảng orders
            $price = $product->price ?? 0;
            $totalAmount = $price * $quantity;
            
            DB::table('orders')
                ->where('id', $i)
                ->update(['total_amount' => $totalAmount]);
            
            DB::table('order_detail')->insert([
                'order_id' => $i,
                'product_id' => $productId,
                'quantity' => $quantity,
                'notes' => 'Ghi chú cho đơn hàng #' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}