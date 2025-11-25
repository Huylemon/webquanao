<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['id' => 1, 'name' => 'Khanh', 'phone' => '0975664813', 'email' => 'khanh@gmail.com', 'address' => 'tu mai', 'created_at' => Carbon::parse('2024-04-20 07:52:31'), 'updated_at' => Carbon::parse('2024-04-20 07:52:31')],
            ['id' => 2, 'name' => 'Đặng Tùng Khánh', 'phone' => '0975664813', 'email' => 'dangkhanh@gmail.com', 'address' => 'Bắc Giang', 'created_at' => Carbon::parse('2024-05-05 23:19:42'), 'updated_at' => Carbon::parse('2024-05-05 23:19:42')],
            ['id' => 3, 'name' => 'khánh', 'phone' => '0975664813', 'email' => 'boytmbg22@gmail.com', 'address' => 'bac giang', 'created_at' => Carbon::parse('2024-05-06 01:05:10'), 'updated_at' => Carbon::parse('2024-05-06 01:05:10')],
            ['id' => 4, 'name' => 'Linh', 'phone' => '0975664813', 'email' => 'khanhtmbg@gmail.com', 'address' => 'Tư Mại', 'created_at' => Carbon::parse('2024-05-06 06:18:10'), 'updated_at' => Carbon::parse('2024-05-06 06:18:10')],
            ['id' => 6, 'name' => 'Khánh Đặng', 'phone' => '0988888888', 'email' => 'khanh123@gmail.com', 'address' => 'Nguyên Xá', 'created_at' => Carbon::parse('2024-05-20 09:04:14'), 'updated_at' => Carbon::parse('2024-05-20 09:04:14')],
            ['id' => 7, 'name' => 'Đặng Tùng Ninh', 'phone' => '09768882421', 'email' => 'ninh@gmail.com', 'address' => 'Yên Dũng', 'created_at' => Carbon::parse('2024-05-21 23:17:22'), 'updated_at' => Carbon::parse('2024-05-21 23:17:22')],
            ['id' => 8, 'name' => 'ninh', 'phone' => '0975556421', 'email' => 'k@gmail.com', 'address' => 'bắc ginag', 'created_at' => Carbon::parse('2024-05-21 23:18:20'), 'updated_at' => Carbon::parse('2024-05-21 23:18:20')],
        ]);
    }
}
