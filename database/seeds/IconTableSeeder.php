<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class IconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('icons')->insert([
            [
                'id' => 1,
                'image' => 'icon1.png',
                'title' => 'VẬN CHUYỂN TỨC THỜI',
                'description' => 'Free Ship Đơn Hàng Chỉ từ 300k',
                'status' => '1'
            ],
            [
                'id' => 2,
                'image' => 'icon2.png',
                'title' => 'CHẤT LƯỢNG ĐẢM BẢO',
                'description' => 'Hơn 200 Thương Hiệu hàng đầu Thế Giới',
                'status' => '1'
            ],
            [
                'id' => 3,
                'image' => 'icon3.png',
                'title' => 'CAM KẾT HỖ TRỢ 24/7',
                'description' => 'Gọi Diện - SMS - Messenger',
                'status' => '1'
            ],
            [
                'id' => 4,
                'image' => 'icon4.png',
                'title' => 'ĐỔI TRẢ TRÊN TOÀN HỆ THỐNG',
                'description' => 'Miễn Phí Trong Vòng 30 Ngày',
                'status' => '1'
            ],

            [
                'id' => 5,
                'image' => 'icon4.png',
                'title' => 'ĐỔI TRẢ TRÊN TOÀN HỆ THỐNG',
                'description' => 'Miễn Phí Trong Vòng 30 Ngày',
                'status' => '0'
            ],
        ]);

    }
}
