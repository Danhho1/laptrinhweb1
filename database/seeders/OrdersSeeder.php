<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrdersSeeder extends Seeder
{
    const MAX_RECORDS = 100;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách user_id
        $userIds = DB::table('users')->pluck('id')->toArray();
        $userCount = count($userIds);
        
        for ($i = 1; $i < self::MAX_RECORDS; $i++) {
            // Chọn ngẫu nhiên một user nếu có đủ dữ liệu
            $userId = $userCount > 0 ? $userIds[array_rand($userIds)] : $i;
            
            DB::table('orders')->insert([
                'id' => $i, // Đảm bảo ID được chỉ định rõ ràng
                'user_id' => $userId,
                'total_amount' => 0, // Sẽ được cập nhật trong OrderDetailSeeder
                'address' => "Nhà số {$i}, Khu phố Thủ Đức",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}