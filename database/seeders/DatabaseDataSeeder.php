<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed categories
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Đầm hai dây', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-04-19 07:15:28'), 'updated_at' => Carbon::parse('2024-04-19 07:15:28')],
            ['id' => 2, 'name' => 'Đầm ngắn tay', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-05-01 02:21:24'), 'updated_at' => Carbon::parse('2024-05-01 02:21:24')],
            ['id' => 3, 'name' => 'Đầm dài tay', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-05-01 02:21:34'), 'updated_at' => Carbon::parse('2024-05-01 02:21:34')],
            ['id' => 4, 'name' => 'Đầm công chúa', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-05-01 02:21:45'), 'updated_at' => Carbon::parse('2024-05-01 02:21:45')],
            ['id' => 5, 'name' => 'Chân váy', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-05-01 02:22:09'), 'updated_at' => Carbon::parse('2024-05-01 02:22:09')],
            ['id' => 6, 'name' => 'Yếm bé gái', 'gender' => 'Nữ', 'created_at' => Carbon::parse('2024-05-01 02:22:33'), 'updated_at' => Carbon::parse('2024-05-01 02:22:33')],
            ['id' => 7, 'name' => 'Áo thun ngắn tay bé trai', 'gender' => 'Nam', 'created_at' => Carbon::parse('2024-05-03 22:50:26'), 'updated_at' => Carbon::parse('2024-05-03 22:51:12')],
            ['id' => 8, 'name' => 'Mũ đội', 'gender' => 'Phụ kiện', 'created_at' => Carbon::parse('2024-05-05 23:02:21'), 'updated_at' => Carbon::parse('2024-05-05 23:02:21')],
            ['id' => 9, 'name' => 'Áo khoác gió dài tay', 'gender' => 'Nam', 'created_at' => Carbon::parse('2024-05-05 23:05:40'), 'updated_at' => Carbon::parse('2024-05-05 23:05:40')],
        ]);

        // Seed sizes
        DB::table('sizes')->insert([
            ['id' => 1, 'size_name' => '5Y-17-19kg', 'created_at' => Carbon::parse('2024-04-19 07:14:34'), 'updated_at' => Carbon::parse('2024-04-19 07:14:34')],
            ['id' => 2, 'size_name' => '6Y-19-21kg', 'created_at' => Carbon::parse('2024-04-19 07:14:45'), 'updated_at' => Carbon::parse('2024-04-19 07:14:45')],
            ['id' => 3, 'size_name' => '7Y-21-23kg', 'created_at' => Carbon::parse('2024-04-19 07:15:00'), 'updated_at' => Carbon::parse('2024-04-19 07:15:00')],
            ['id' => 4, 'size_name' => '8Y-23-25kg', 'created_at' => Carbon::parse('2024-04-19 07:15:05'), 'updated_at' => Carbon::parse('2024-04-19 07:15:05')],
        ]);

        // Seed users
        DB::table('users')->insert([
            ['id' => 2, 'name' => 'admin', 'email' => 'admin@admin.com', 'email_verified_at' => null, 'password' => '$2y$10$m3IU8LKJRBD9Y7Kxa.6wp.keVV9A1L3VNUs3t7PbU678s0tL6DvbG', 'type' => 'admin', 'remember_token' => null, 'created_at' => Carbon::parse('2024-04-19 06:42:51'), 'updated_at' => Carbon::parse('2024-04-19 13:43:20')],
            ['id' => 3, 'name' => 'khánh', 'email' => 'dangtungkhanh@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$v7ChlXoles88jAYq0jHGj.wzPoGekWv78MTk4kr2g1xdTRDlvVl16', 'type' => 'user', 'remember_token' => null, 'created_at' => Carbon::parse('2024-05-01 02:26:20'), 'updated_at' => Carbon::parse('2024-05-01 02:26:20')],
            ['id' => 4, 'name' => 'Tùng Khánh', 'email' => 'dantungkhanh288@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$gHgJJLlksvCymgQn7pS66u0gNAch6LVMEwvMucZXK0SOgewnimEXC', 'type' => 'user', 'remember_token' => null, 'created_at' => Carbon::parse('2024-05-03 07:27:27'), 'updated_at' => Carbon::parse('2024-05-03 07:27:27')],
            ['id' => 5, 'name' => 'Khánh Đặng', 'email' => 'khanh@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$PxqH7W0YiHaFhCMqFRZOpe5dBCvm5mJQ/0NytRvWMbGVBf/MDlB7W', 'type' => 'user', 'remember_token' => null, 'created_at' => Carbon::parse('2024-05-20 09:00:36'), 'updated_at' => Carbon::parse('2024-05-20 09:00:36')],
        ]);

        // Seed products
        $products = [
            [
                'id' => 1,
                'name' => 'Đầm váy thô hai dây bé gái Rabity 92491',
                'price' => 369000,
                'image' => '1897837625.webp',
                'color' => 'Hồng',
                'description' => '<p>Đầm váy là là một outfits không thể thiếu trong tủ đồ của các cô công chúa nhỏ giúp ba mẹ tiết kiệm thời gian trong việc lựa chọn cho bé mỗi ngày mà bé có thể mặc trong nhiều dịp khác nhau như như đi chơi, đi học, đi tiệc,...</p><h2><strong>1. Đặc điểm nổi bật&nbsp;Đầm váy thô hai dây bé gái Rabity 92491</strong></h2><ul><li>Nhóm sản phẩm: &nbsp;Đầm váy bé gái</li><li>Chất liệu: 95% cotton 5%spandex an toàn và thoáng mát cho da của bé</li><li>Size: Phù hợp với bé gái&nbsp;cân nặng từ 17&nbsp;- 25kg, từ 5&nbsp;- 8&nbsp;tuổi</li></ul><h2><strong>2. Thông tin chi tiết Đầm váy thô hai dây bé gái Rabity 92491</strong></h2><p>Đầm váy hai dây bé gái kiểu&nbsp;dáng nhẹ nhàng, thanh lịch,&nbsp;màu hồng&nbsp;dịu dàng cho các bé có thể mặc&nbsp;đi học, đi tiệc&nbsp;hoặc&nbsp;đi chơi cuối tuần. Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</p><p><img src="https://file.hstatic.net/1000290074/file/dam-vay-tho-hai-day-be-gai-92491-1_09d952da76284174b67097d444bd34d4.jpg" alt="Đầm hai dây bé gái" width="1200" height="1200"></p><p><img src="https://file.hstatic.net/1000290074/file/dam-vay-tho-hai-day-be-gai-92491-2_1e0f4433ea304fecb6e24759c86bb477.jpg" alt="Đầm hai dây bé gái" width="1200" height="1200"></p><p><img src="https://file.hstatic.net/1000290074/file/chat-lieu-95-cotton-5-spandex_3f487c7bed9a4433819993ecdc2b60ea.jpg" alt="Đầm hai dây bé gái" width="1200" height="1200"></p><p><img src="https://file.hstatic.net/1000290074/file/cach-bao-quan-vai-95-cotton-5-spandex_958602b277124f50ae34c15c761fc38c.jpg" alt="Đầm hai dây bé gái" width="1200" height="1200"></p><h2><strong>3. Bảng size tham khảo&nbsp;</strong></h2><p><img src="https://file.hstatic.net/1000290074/file/bang_size_quan_ao-01_b6f14c5da17143fa8da8e95c401d066e.jpg" alt="bảng size quần áo trẻ em" width="2048" height="2048"></p><h2>&nbsp;</h2>',
                'discount' => 0,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-04-19 07:18:03'),
                'updated_at' => Carbon::parse('2024-05-03 22:39:25'),
            ],
            [
                'id' => 2,
                'name' => 'Đầm váy thun Nàng Tiên Cá Ariel ngắn tay bé gái',
                'price' => 229000,
                'image' => '806757277.webp',
                'color' => 'Xanh ngọc',
                'description' => '<p>Nội dung đang được cập nhật</p>',
                'discount' => 0,
                'category_id' => 2,
                'created_at' => Carbon::parse('2024-05-01 02:25:03'),
                'updated_at' => Carbon::parse('2024-05-01 02:25:03'),
            ],
            [
                'id' => 3,
                'name' => 'Đầm váy thô hai dây bé gái TK 2024',
                'price' => 329000,
                'image' => '560998687.jpg',
                'color' => 'Xanh bò - Gắn nơ',
                'description' => '<h2><strong>Đầm váy thô hai dây bé gái TK 2024</strong></h2><p>Là công chúa&nbsp;phải xinh, chiếc đầm váy thô hai dây là sự lựa chọn hoàn hảo của mẹ cho bé diện đồ. Được thiết kế với chất&nbsp;cotton mềm, mịn mát, bé có thể&nbsp;mặc nhà thoải mái, dạo phố xinh xắn.</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 2024</strong></h3><p>- Chất liệu vải 100% cotton, thoáng mát&nbsp;và thấm hút mồ hôi</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 14-25kg, từ 4-8 tuổi</p><p>- Đầm 2 dây mịn mát&nbsp;họa tiết thổ cẩm thời trang, thiết kế nơ bản to cho bé mặc đi chơi thật đáng yêu</p><p>&nbsp;</p><h3><strong>2. Hình ảnh Đầm váy thô hai dây bé gái TK 2024</strong></h3><p><img src="https://file.hstatic.net/1000290074/file/93242000-1_33afd755baa14bacb613c18a0800ef78_grande.jpg" alt="Đầm váy thô hai dây bé gái Rabity 93242" width="400" height="600"></p><p><img src="https://file.hstatic.net/1000290074/file/93242000-3_1d5a6f41cc454dd9a3d5560c7879d35d_grande.jpg" alt="Đầm váy thô hai dây bé gái Rabity 93242" width="400" height="600"></p><p><img src="https://file.hstatic.net/1000290074/file/93242000-4_26041538a76f45ab8a435699f3c4f76a_grande.jpg" alt="Đầm váy thô hai dây bé gái Rabity 93242" width="400" height="600"></p><p><i>Đầm váy thô hai dây bé gái &nbsp;TK 2024 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 0,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 07:23:45'),
                'updated_at' => Carbon::parse('2024-05-03 22:39:06'),
            ],
            [
                'id' => 4,
                'name' => 'Đầm váy thô hai dây hoa lá bé gái TK 20241',
                'price' => 229000,
                'image' => '1316242054.webp',
                'color' => 'Tím than - In Hoa',
                'description' => '<h2><strong>Đầm váy thô hai dây bé gái TK 20241</strong></h2><p>Bé yêu&nbsp;vận động, bé thích khám phá thiên nhiên thì chiếc váy màu sắc này mang đến sự mát mẻ tươi vui cho bé. Váy được thiết kế 2 dây thoải mái, đáng yêu cùng với thân váy dưới xòe thoải mái</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 20241</strong></h3><p>- Chất liệu 100% cotton từ sợi bông thiên nhiên, an toàn và thoáng mát</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 14-34kg, từ 4-12&nbsp;tuổi</p><p>- Đầm váy thiết kế&nbsp;hau dây&nbsp;họa tiết hoa cỏ&nbsp;tươi mát</p><p>&nbsp;</p><h3><strong>2. Hình ảnh&nbsp;Đầm váy thô hai dây bé gái TK 20241</strong></h3><p><img src="https://file.hstatic.net/1000290074/file/93218000-1_581479c7422441a181adf2f4e486ede2_grande.jpg" alt="Đầm váy thô hai dây bé gái Rabity 93218" width="400" height="600"></p><p><i>Đầm váy thô hai dây bé gái TK 20241 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 0,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 07:26:31'),
                'updated_at' => Carbon::parse('2024-05-03 22:38:49'),
            ],
            [
                'id' => 5,
                'name' => 'Đầm váy thun hai dây họa tiết hoa cho bé gái TK22',
                'price' => 189000,
                'image' => '1123948719.webp',
                'color' => 'Xanh - In Hoa',
                'description' => '<h2><strong>Đầm váy thun hai dây bé gái TK 22</strong></h2><p>Bé yêu&nbsp;vận động, bé thích khám phá thiên nhiên thì chiếc váy màu sắc này mang đến sự mát mẻ tươi vui cho bé. Váy được thiết kế 2 dây thoải mái, 2 màu sắc nổi bật và đáng yêu cùng với thân váy dưới xòe thoải mái</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thun hai dây bé gái TK 22</strong></h3><p>- Chất liệu 100% cotton từ sợi bông thiên nhiên, an toàn và thoáng mát</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 11-34kg</p><p>- Đầm váy thiết kế&nbsp;sát nách&nbsp;họa tiết hoa cỏ nổi bật, tươi mát</p><p>&nbsp;</p><h3><strong>2. Hình ảnh&nbsp;Đầm váy thun hai dây bé gái TK 22</strong></h3><p><img src="https://product.hstatic.net/1000290074/product/93148000-1_624a7501fc534a45afc3712ab7d90ff9_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/93148000-3_3de883c476544d16bc40246a2781fe0a_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/93148000-5_32ecddf558e84bc8a60188ad6393a48a_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/93148000-6_32c77ef752a1487a93e2a927b88067b0_grande.jpg" width="400" height="600"></p><p><i>Đầm váy thun hai dây bé gái </i><strong>TK 22 </strong><i>xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 0,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 08:14:03'),
                'updated_at' => Carbon::parse('2024-05-03 22:38:41'),
            ],
            [
                'id' => 6,
                'name' => 'Đầm váy thô hai dây bé gái họa tiết chấm bi TK 23',
                'price' => 219000,
                'image' => '1441463747.webp',
                'color' => 'Xanh Bò - Chấm Bi',
                'description' => '<h2><strong>Đầm váy thô hai dây bé gái TK 23</strong></h2><p>Là công chúa&nbsp;phải xinh, chiếc đầm váy thô hai dây chấm bi&nbsp;là sự lựa chọn hoàn hảo của mẹ cho bé diện đồ. Được thiết kế với chất&nbsp;thun cotton mềm, mịn mát, bé có thể&nbsp;mặc nhà thoải mái, dạo phố xinh xắn.</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 23</strong></h3><p>- Chất liệu vải 100% cotton, co giãn và thấm hút mồ hôi</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 16-34kg</p><p>- Đầm 2 dây họa tiết chấm bi năng động, đáng yêu</p><p>&nbsp;</p><h3><strong>2. Hình ảnh Đầm váy thô hai dây bé gái TK 23</strong></h3><p><img src="https://file.hstatic.net/1000290074/file/vay-be-gai-hai-day_f2f3547d400346708c8c893a93637ecb_grande.jpg" alt="Đầm váy bé gái hai dây Rabity chấm bi" width="400" height="600"></p><p><img src="https://file.hstatic.net/1000290074/file/vay-be-gai-hai-day-cham-bi_c76c2b9143c54738974af75a5c1a5bc0_grande.jpg" alt="Đầm váy bé gái hai dây Rabity chấm bi" width="400" height="600"></p><p><i><img src="https://file.hstatic.net/1000290074/file/dam-vay-be-gai-tho-hai-day_b21f4e6453a94cf79e5d43e422800652_grande.jpg" alt="Đầm váy bé gái hai dây Rabity chấm bi" width="400" height="600"></i></p><p><i>Đầm váy thô hai dây bé gái TK 23 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 0,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 08:16:57'),
                'updated_at' => Carbon::parse('2024-05-03 22:38:32'),
            ],
            [
                'id' => 7,
                'name' => 'Đầm váy hai dây chấm bi Minnie bé gái TK202422',
                'price' => 279000,
                'image' => '1349579284.webp',
                'color' => 'Hồng - Minnie Chấm Bi',
                'description' => '<h2><strong>Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h2><h3><strong>1.&nbsp;Thông tin chi tiết&nbsp;Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h3><p>- Chất liệu: Với thiết kế 95% cotton và 5% spandex thoáng mát và an toàn cho làn da</p><p>- Độ tuổi, cân nặng: phù hợp cho bé từ 2-6 tuổi, từ 11-21kg</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Đầm váy sát nách hình chuột Minnie bản quyền Disney, đầm 2 dây đáng yêu, chân váy voan nhiều lớp bồng bềnh kết hợp với màu sắc bắt mắt, hiện đại cùng chấm bi vô cùng đáng yêu.</p><p>&nbsp;</p><h3><strong>2.&nbsp;Hình ảnh sản phẩm Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h3><p><img src="https://product.hstatic.net/1000290074/product/56950000-1_99400d3236f34468b912ef3186bf2188_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/56950000-3_cdeb441834034f30be1f43ffdcb50d25_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/56950000-6_d74448800b774dffa76dab4d47ec4341_grande.jpg" width="400" height="600"></p><p><i>Đầm Minnie duyên dáng, đáng yêu&nbsp;</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản đầm váy&nbsp;của bé nơi khô ráo. Ngoài ra, khi giặt và phơi đầm váy&nbsp;trẻ em, mẹ nên lộn trái mặt trong của đầm váy tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 250000,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 08:23:26'),
                'updated_at' => Carbon::parse('2024-05-03 22:38:17'),
            ],
            [
                'id' => 8,
                'name' => 'Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002',
                'price' => 415000,
                'image' => '1083849072.webp',
                'color' => 'Hồng - Nơ',
                'description' => '<h2><strong>Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h2><p><strong>L</strong>ấy cảm hứng từ phong cách Parisian thanh lịch, thời thượng mang hơi thở kinh đô ánh sáng, những nhà mốt kì cựu Việt Nam – Pháp mang đến khung cảnh thiên nhiên đầy màu sắc thông qua hình ảnh khu vườn Versailles.</p><h3><strong>1. Thông tin chi tiết sản phẩm&nbsp;Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h3><p>- Chất liệu: 65% cotton và 35% spandex, form dáng đứng, 2 lớp&nbsp;dày dặn&nbsp;</p><p>- Phù hợp với bé gái có cân nặng từ 19-37kg</p><p>- Loại sản phẩm: Đầm váy bé gái</p><p>- Váy dáng đứng chữ A, điểm nhấn là thiết kế chiếc nơ trước ngực, điệu đà và&nbsp;thanh lịch.&nbsp;</p><p>- Kích thước sản phẩm:&nbsp;</p><p><img src="https://file.hstatic.net/1000290074/file/83002_2e36d8d5851945a692f8b0cc6f3d56a6_grande.png" width="512" height="180"></p><p>&nbsp;</p><h3><strong>2. Hình ảnh sản phẩm&nbsp;Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h3><p><img src="https://product.hstatic.net/1000290074/product/83002000-1_b73635a627204d0aa1fed04b3fc8c86a_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/83002000-6_be4ba09d44c24ae5a574a0a26740ae3b_grande.jpg" width="400" height="600"></p><p>Màu đỏ có ánh kim lấp lánh</p><p><img src="https://product.hstatic.net/1000290074/product/83002000-2_47a9158bc8a54deab2f5c71dc3da466f_grande.jpg" width="400" height="600"></p><p><img src="https://product.hstatic.net/1000290074/product/83002000-3_0fd8102778b64b5b9e8e94719efeb7ce_grande.jpg" width="400" height="600"></p><p><i>Đầm váy màu hồng - ánh kim lấp lánh nhẹ nhàng</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>',
                'discount' => 399000,
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-05-03 08:25:21'),
                'updated_at' => Carbon::parse('2024-05-03 22:38:04'),
            ],
            [
                'id' => 9,
                'name' => 'Áo thun ngắn tay Mickey bé trai TKShop',
                'price' => 85000,
                'image' => '633673259.webp',
                'color' => 'Xanh đậm - Mickey',
                'description' => '<p>Áo&nbsp;thun bé trai một&nbsp;là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo thun cá tính, năng động giúp bé thoải mái vận động. Với những mẫu áo thun bạn có thể phối cho bé nhiều outfits mặc ở nhà, đi học, đi chơi, đi tiệc,...</p><h2><strong>1. Thông tin&nbsp;Áo thun ngắn tay bé trai Mickey Rabity 5712.01</strong></h2><p>- Loại sản phẩm: Áo thun bé trai</p><p>- Phù hợp với bé trai cân nặng từ 11 - 21kg, từ 2 - 6&nbsp;tuổi</p><p>- Chất liệu 100% cotton&nbsp;thoáng mát và an toàn cho làn da của bé</p><p>- Áo&nbsp;thun ngắn tay in hình nhân vật hoạt hình Mickey&nbsp;bản quyền Disney sắc nét và màu sắc hài hòa</p><p>&nbsp;</p><h2><strong>2. Chất liệu&nbsp;Áo thun ngắn tay bé trai Mickey Rabity 5712.01</strong></h2><p>Áo thun&nbsp;bé trai&nbsp;form vừa vặn thoải mái. Kiểu dáng dễ phối nhiều outfit lịch sự cho bé diện đi học, đi tiệc hay xuống phố. Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</p><p><img src="https://file.hstatic.net/1000290074/file/100_cotton_5201276f2ecb4845aae445734629f3d8.jpg" alt="Áo bé gái ngắn tay 83037" width="1200" height="1200"></p><p><img src="https://file.hstatic.net/1000290074/file/cach_bao_quan_054b1e15238b45a68377047388a22ad0.jpg" alt="Áo bé gái ngắn tay 83037" width="1200" height="1200"></p><h2><strong>3. Bảng size tham khảo&nbsp;</strong></h2><p><img src="https://file.hstatic.net/1000290074/file/bang_size_quan_ao-01_b6f14c5da17143fa8da8e95c401d066e.jpg" alt="bảng size quần áo trẻ em" width="2048" height="2048"></p>',
                'discount' => 120000,
                'category_id' => 7,
                'created_at' => Carbon::parse('2024-05-03 22:53:42'),
                'updated_at' => Carbon::parse('2024-05-03 22:53:42'),
            ],
            [
                'id' => 10,
                'name' => 'Mũ nón vành bé trai/bé gái Tkshop',
                'price' => 109000,
                'image' => '1986232493.webp',
                'color' => 'Xanh chấm bi',
                'description' => '<h2><strong>Mũ nón vành bé trai/bé gái TK shop</strong></h2><p>Mũ vừa mang tính thời trang, vừa vô cùng tiện lợi, phù hợp cho cả bé trai và bé gái. Mẹ có thể sử dụng cho bé trong mọi hoàn cảnh, đi học, đi chơi, đi dã ngoại, du lịch... Đồng thời sử dụng mũ trong những ngày hè nóng bức còn đảm bảo sức khỏe cho con yêu nữa mẹ nhé</p><p>&nbsp;</p><h3><strong>1.&nbsp;Thông tin chi tiết&nbsp;Mũ nón vành bé trai/bé gái TK shop</strong></h3><p>- Loại sản phẩm: Mũ nón trẻ em</p><p>- Chất liệu: Mũ chất liệu vải kaki thoáng mát cho mùa hè, không gây cảm giác nóng nực bí bách cho bé, kết cấu mềm mại thoải mái</p><p>- Kích thước: Cho bé sơ sinh và bé 1-2 tuổi</p><p>- Kiểu dáng: Mũ vành che nắng cho bé, màu sắc đáng yêu với họa tiết chấm bi, kết hợp với 2 tai mèo dễ thương khiến bé thích vô cùng, phù hợp cho cả bé trai và bé gái. Đồng thời mũ có dây đeo có thể điều chỉnh độ dài.</p>',
                'discount' => 0,
                'category_id' => 8,
                'created_at' => Carbon::parse('2024-05-05 23:03:37'),
                'updated_at' => Carbon::parse('2024-05-05 23:03:37'),
            ],
            [
                'id' => 11,
                'name' => 'Áo khoác gió dài tay bé trai TK shop',
                'price' => 259000,
                'image' => '1415545587.webp',
                'color' => 'xanh - đen',
                'description' => '<h2><strong>1. Đặc điểm nổi bật&nbsp;Áo khoác gió dài tay bé trai TK shop</strong></h2><ul><li>Nhóm sản phẩm: Áo khoác</li><li>Chất liệu: 100% polyester tránh&nbsp;nắng và chống gió tốt, bền bỉ, chống nước tốt và dễ vệ sinh</li><li>Size: Phù hợp với bé trai cân nặng từ 11-21kg, từ 2-6 tuổi</li><li>Áo khoác bé trai là bạn đồng hành không thể thiếu cho bé khi ra ngoài, với phong cách năng động, kiểu dáng đơn giản, vừa chống nắng,&nbsp;tia UV, tránh gió và chống nước, vừa&nbsp;đồng thời bảo vệ sức khỏe cho bé.&nbsp;Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</li></ul>',
                'discount' => 0,
                'category_id' => 9,
                'created_at' => Carbon::parse('2024-05-05 23:06:47'),
                'updated_at' => Carbon::parse('2024-05-05 23:06:47'),
            ],
        ];

        DB::table('products')->insert($products);

        // Seed product_size
        DB::table('product_size')->insert([
            ['product_id' => 1, 'size_id' => 1, 'quantity' => 10],
            ['product_id' => 1, 'size_id' => 2, 'quantity' => 19],
            ['product_id' => 1, 'size_id' => 3, 'quantity' => 14],
            ['product_id' => 1, 'size_id' => 4, 'quantity' => 30],
            ['product_id' => 2, 'size_id' => 1, 'quantity' => 20],
            ['product_id' => 2, 'size_id' => 2, 'quantity' => 25],
            ['product_id' => 2, 'size_id' => 3, 'quantity' => 15],
            ['product_id' => 2, 'size_id' => 4, 'quantity' => 10],
            ['product_id' => 3, 'size_id' => 1, 'quantity' => 20],
            ['product_id' => 3, 'size_id' => 2, 'quantity' => 20],
            ['product_id' => 3, 'size_id' => 3, 'quantity' => 20],
            ['product_id' => 3, 'size_id' => 4, 'quantity' => 20],
            ['product_id' => 4, 'size_id' => 1, 'quantity' => 17],
            ['product_id' => 4, 'size_id' => 2, 'quantity' => 20],
            ['product_id' => 4, 'size_id' => 3, 'quantity' => 20],
            ['product_id' => 4, 'size_id' => 4, 'quantity' => 19],
            ['product_id' => 5, 'size_id' => 1, 'quantity' => 16],
            ['product_id' => 5, 'size_id' => 2, 'quantity' => 20],
            ['product_id' => 5, 'size_id' => 3, 'quantity' => 20],
            ['product_id' => 5, 'size_id' => 4, 'quantity' => 20],
            ['product_id' => 6, 'size_id' => 1, 'quantity' => 23],
            ['product_id' => 6, 'size_id' => 2, 'quantity' => 13],
            ['product_id' => 6, 'size_id' => 3, 'quantity' => 33],
            ['product_id' => 6, 'size_id' => 4, 'quantity' => 10],
            ['product_id' => 7, 'size_id' => 1, 'quantity' => 11],
            ['product_id' => 7, 'size_id' => 2, 'quantity' => 19],
            ['product_id' => 7, 'size_id' => 3, 'quantity' => 10],
            ['product_id' => 7, 'size_id' => 4, 'quantity' => 20],
            ['product_id' => 8, 'size_id' => 1, 'quantity' => 14],
            ['product_id' => 8, 'size_id' => 2, 'quantity' => 10],
            ['product_id' => 8, 'size_id' => 3, 'quantity' => 19],
            ['product_id' => 8, 'size_id' => 4, 'quantity' => 15],
            ['product_id' => 9, 'size_id' => 1, 'quantity' => 50],
            ['product_id' => 9, 'size_id' => 2, 'quantity' => 29],
            ['product_id' => 9, 'size_id' => 3, 'quantity' => 20],
            ['product_id' => 9, 'size_id' => 4, 'quantity' => 34],
            ['product_id' => 10, 'size_id' => 1, 'quantity' => 10],
            ['product_id' => 10, 'size_id' => 2, 'quantity' => 0],
            ['product_id' => 10, 'size_id' => 3, 'quantity' => 10],
            ['product_id' => 10, 'size_id' => 4, 'quantity' => 10],
            ['product_id' => 11, 'size_id' => 1, 'quantity' => 49],
            ['product_id' => 11, 'size_id' => 2, 'quantity' => 30],
            ['product_id' => 11, 'size_id' => 3, 'quantity' => 49],
            ['product_id' => 11, 'size_id' => 4, 'quantity' => 60],
        ]);

        // Seed orders (fix customer_id = 1 to NULL)
        DB::table('orders')->insert([
            ['id' => 1, 'code' => 'ORD1713591151', 'customer_name' => 'Khanh', 'phone' => '0975664813', 'address' => 'tu mai', 'total_amount' => 2214000, 'quantity' => 6, 'type_payment' => null, 'email' => 'khanh@gmail.com', 'status' => 'Hủy đơn', 'customer_id' => null, 'created_at' => Carbon::parse('2024-04-20 07:52:31'), 'updated_at' => Carbon::parse('2024-05-20 09:22:02')],
            ['id' => 2, 'code' => 'ORD1714997982', 'customer_name' => 'Đặng Tùng Khánh', 'phone' => '0975664813', 'address' => 'Bắc Giang', 'total_amount' => 458000, 'quantity' => 2, 'type_payment' => null, 'email' => 'dangkhanh@gmail.com', 'status' => 'Thành công', 'customer_id' => 2, 'created_at' => Carbon::parse('2024-05-05 23:19:42'), 'updated_at' => Carbon::parse('2024-05-20 15:59:44')],
            ['id' => 3, 'code' => 'ORD1715007910', 'customer_name' => 'khánh', 'phone' => '0975664813', 'address' => 'bac giang', 'total_amount' => 259000, 'quantity' => 1, 'type_payment' => null, 'email' => 'boytmbg22@gmail.com', 'status' => 'Thành công', 'customer_id' => 3, 'created_at' => Carbon::parse('2024-05-06 01:05:10'), 'updated_at' => Carbon::parse('2024-05-20 15:59:44')],
            ['id' => 4, 'code' => 'ORD1715025424', 'customer_name' => 'Tùng Khánh', 'phone' => '0975664813', 'address' => 'Tư Mại', 'total_amount' => 756000, 'quantity' => 4, 'type_payment' => null, 'email' => 'dantungkhanh288@gmail.com', 'status' => 'Thành công', 'customer_id' => 4, 'created_at' => Carbon::parse('2024-05-06 05:57:04'), 'updated_at' => Carbon::parse('2024-05-20 15:59:44')],
            ['id' => 5, 'code' => 'ORD1715026690', 'customer_name' => 'Linh', 'phone' => '0975664813', 'address' => 'Tư Mại', 'total_amount' => 1090000, 'quantity' => 10, 'type_payment' => null, 'email' => 'khanhtmbg@gmail.com', 'status' => 'Hủy đơn', 'customer_id' => 4, 'created_at' => Carbon::parse('2024-05-06 06:18:10'), 'updated_at' => Carbon::parse('2024-05-20 15:59:44')],
            ['id' => 6, 'code' => 'ORD1716180254', 'customer_name' => 'Khánh Đặng', 'phone' => '0988888888', 'address' => 'Nguyên Xá', 'total_amount' => 488000, 'quantity' => 2, 'type_payment' => null, 'email' => 'khanh123@gmail.com', 'status' => 'Đang giao hàng', 'customer_id' => 5, 'created_at' => Carbon::parse('2024-05-20 09:04:14'), 'updated_at' => Carbon::parse('2024-05-20 09:25:15')],
            ['id' => 7, 'code' => 'ORD1716180339', 'customer_name' => 'Khánh Đặng', 'phone' => '0988888888', 'address' => 'Nguyên Xá', 'total_amount' => 479000, 'quantity' => 2, 'type_payment' => null, 'email' => 'khanh123@gmail.com', 'status' => 'Đang giao hàng', 'customer_id' => 5, 'created_at' => Carbon::parse('2024-05-20 09:05:39'), 'updated_at' => Carbon::parse('2024-05-20 09:25:01')],
            ['id' => 8, 'code' => 'ORD1716319042', 'customer_name' => 'Đặng Tùng Ninh', 'phone' => '09768882421', 'address' => 'Yên Dũng', 'total_amount' => 369000, 'quantity' => 1, 'type_payment' => null, 'email' => 'ninh@gmail.com', 'status' => 'Chờ xác nhận', 'customer_id' => 4, 'created_at' => Carbon::parse('2024-05-21 23:17:22'), 'updated_at' => Carbon::parse('2024-05-21 23:17:22')],
            ['id' => 9, 'code' => 'ORD1716319100', 'customer_name' => 'ninh', 'phone' => '0975556421', 'address' => 'bắc ginag', 'total_amount' => 120000, 'quantity' => 1, 'type_payment' => null, 'email' => 'k@gmail.com', 'status' => 'Chờ xác nhận', 'customer_id' => 4, 'created_at' => Carbon::parse('2024-05-21 23:18:20'), 'updated_at' => Carbon::parse('2024-05-21 23:18:20')],
        ]);

        // Seed order_details
        DB::table('order_details')->insert([
            ['order_id' => 1, 'product_id' => 1, 'size_name' => '', 'quantity' => 6, 'price' => 369000, 'created_at' => Carbon::parse('2024-04-20 07:52:31'), 'updated_at' => Carbon::parse('2024-04-20 07:52:31')],
            ['order_id' => 2, 'product_id' => 4, 'size_name' => '', 'quantity' => 2, 'price' => 229000, 'created_at' => Carbon::parse('2024-05-05 23:19:42'), 'updated_at' => Carbon::parse('2024-05-05 23:19:42')],
            ['order_id' => 3, 'product_id' => 11, 'size_name' => '', 'quantity' => 1, 'price' => 259000, 'created_at' => Carbon::parse('2024-05-06 01:05:10'), 'updated_at' => Carbon::parse('2024-05-06 01:05:10')],
            ['order_id' => 4, 'product_id' => 5, 'size_name' => '', 'quantity' => 4, 'price' => 189000, 'created_at' => Carbon::parse('2024-05-06 05:57:04'), 'updated_at' => Carbon::parse('2024-05-06 05:57:04')],
            ['order_id' => 5, 'product_id' => 10, 'size_name' => '', 'quantity' => 10, 'price' => 109000, 'created_at' => Carbon::parse('2024-05-06 06:18:10'), 'updated_at' => Carbon::parse('2024-05-06 06:18:10')],
            ['order_id' => 6, 'product_id' => 11, 'size_name' => '7Y-21-23kg', 'quantity' => 1, 'price' => 259000, 'created_at' => Carbon::parse('2024-05-20 09:04:14'), 'updated_at' => Carbon::parse('2024-05-20 09:04:14')],
            ['order_id' => 6, 'product_id' => 4, 'size_name' => '8Y-23-25kg', 'quantity' => 1, 'price' => 229000, 'created_at' => Carbon::parse('2024-05-20 09:04:14'), 'updated_at' => Carbon::parse('2024-05-20 09:04:14')],
            ['order_id' => 7, 'product_id' => 4, 'size_name' => '5Y-17-19kg', 'quantity' => 1, 'price' => 229000, 'created_at' => Carbon::parse('2024-05-20 09:05:39'), 'updated_at' => Carbon::parse('2024-05-20 09:05:39')],
            ['order_id' => 7, 'product_id' => 7, 'size_name' => '5Y-17-19kg', 'quantity' => 1, 'price' => 250000, 'created_at' => Carbon::parse('2024-05-20 09:05:39'), 'updated_at' => Carbon::parse('2024-05-20 09:05:39')],
            ['order_id' => 8, 'product_id' => 1, 'size_name' => '6Y-19-21kg', 'quantity' => 1, 'price' => 369000, 'created_at' => Carbon::parse('2024-05-21 23:17:22'), 'updated_at' => Carbon::parse('2024-05-21 23:17:22')],
            ['order_id' => 9, 'product_id' => 9, 'size_name' => '6Y-19-21kg', 'quantity' => 1, 'price' => 120000, 'created_at' => Carbon::parse('2024-05-21 23:18:20'), 'updated_at' => Carbon::parse('2024-05-21 23:18:20')],
        ]);
    }
}

