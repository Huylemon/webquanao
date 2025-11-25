-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2024 lúc 05:41 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_total` int(11) NOT NULL,
  `bill_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`bill_id`, `user_id`, `customer_id`, `bill_date`, `bill_total`, `bill_status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2024-04-20', 2214000, 'Hủy đơn', '2024-04-20 07:52:31', '2024-05-20 09:22:02'),
(2, 4, 2, '2024-05-06', 458000, 'Thành công', '2024-05-05 23:19:42', '2024-05-20 15:59:44'),
(3, 4, 3, '2024-05-06', 259000, 'Thành công', '2024-05-06 01:05:10', '2024-05-20 15:59:44'),
(4, 4, 1, '2024-05-06', 756000, 'Thành công', '2024-05-06 05:57:04', '2024-05-20 15:59:44'),
(5, 4, 4, '2024-05-06', 1090000, 'Hủy đơn', '2024-05-06 06:18:10', '2024-05-20 15:59:44'),
(6, 5, 6, '2024-05-20', 488000, 'Đang giao hàng', '2024-05-20 09:04:14', '2024-05-20 09:25:15'),
(7, 5, 6, '2024-05-20', 479000, 'Đang giao hàng', '2024-05-20 09:05:39', '2024-05-20 09:25:01'),
(8, 4, 7, '2024-05-22', 369000, 'Chờ xác nhận', '2024-05-21 23:17:22', '2024-05-21 23:17:22'),
(9, 4, 8, '2024-05-22', 120000, 'Chờ xác nhận', '2024-05-21 23:18:20', '2024-05-21 23:18:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `billDetail_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`billDetail_id`, `bill_id`, `product_id`, `size_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 6, 369000, '2024-04-20 07:52:31', '2024-04-20 07:52:31'),
(2, 2, 4, '', 2, 229000, '2024-05-05 23:19:42', '2024-05-05 23:19:42'),
(3, 3, 11, '', 1, 259000, '2024-05-06 01:05:10', '2024-05-06 01:05:10'),
(4, 4, 5, '', 4, 189000, '2024-05-06 05:57:04', '2024-05-06 05:57:04'),
(5, 5, 10, '', 10, 109000, '2024-05-06 06:18:10', '2024-05-06 06:18:10'),
(6, 6, 11, '7Y-21-23kg', 1, 259000, '2024-05-20 09:04:14', '2024-05-20 09:04:14'),
(7, 6, 4, '8Y-23-25kg', 1, 229000, '2024-05-20 09:04:14', '2024-05-20 09:04:14'),
(8, 7, 4, '5Y-17-19kg', 1, 229000, '2024-05-20 09:05:39', '2024-05-20 09:05:39'),
(9, 7, 7, '5Y-17-19kg', 1, 250000, '2024-05-20 09:05:39', '2024-05-20 09:05:39'),
(10, 8, 1, '6Y-19-21kg', 1, 369000, '2024-05-21 23:17:22', '2024-05-21 23:17:22'),
(11, 9, 9, '6Y-19-21kg', 1, 120000, '2024-05-21 23:18:20', '2024-05-21 23:18:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_gender`, `created_at`, `updated_at`) VALUES
(1, 'Đầm hai dây', 'Nữ', '2024-04-19 07:15:28', '2024-04-19 07:15:28'),
(2, 'Đầm ngắn tay', 'Nữ', '2024-05-01 02:21:24', '2024-05-01 02:21:24'),
(3, 'Đầm dài tay', 'Nữ', '2024-05-01 02:21:34', '2024-05-01 02:21:34'),
(4, 'Đầm công chúa', 'Nữ', '2024-05-01 02:21:45', '2024-05-01 02:21:45'),
(5, 'Chân váy', 'Nữ', '2024-05-01 02:22:09', '2024-05-01 02:22:09'),
(6, 'Yếm bé gái', 'Nữ', '2024-05-01 02:22:33', '2024-05-01 02:22:33'),
(7, 'Áo thun ngắn tay bé trai', 'Nam', '2024-05-03 22:50:26', '2024-05-03 22:51:12'),
(8, 'Mũ đội', 'Phụ kiện', '2024-05-05 23:02:21', '2024-05-05 23:02:21'),
(9, 'Áo khoác gió dài tay', 'Nam', '2024-05-05 23:05:40', '2024-05-05 23:05:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'Khanh', '0975664813', 'khanh@gmail.com', 'tu mai', '2024-04-20 07:52:31', '2024-04-20 07:52:31'),
(2, 'Đặng Tùng Khánh', '0975664813', 'dangkhanh@gmail.com', 'Bắc Giang', '2024-05-05 23:19:42', '2024-05-05 23:19:42'),
(3, 'khánh', '0975664813', 'boytmbg22@gmail.com', 'bac giang', '2024-05-06 01:05:10', '2024-05-06 01:05:10'),
(4, 'Linh', '0975664813', 'khanhtmbg@gmail.com', 'Tư Mại', '2024-05-06 06:18:10', '2024-05-06 06:18:10'),
(6, 'Khánh Đặng', '0988888888', 'khanh123@gmail.com', 'Nguyên Xá', '2024-05-20 09:04:14', '2024-05-20 09:04:14'),
(7, 'Đặng Tùng Ninh', '09768882421', 'ninh@gmail.com', 'Yên Dũng', '2024-05-21 23:17:22', '2024-05-21 23:17:22'),
(8, 'ninh', '0975556421', 'k@gmail.com', 'bắc ginag', '2024-05-21 23:18:20', '2024-05-21 23:18:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_color`, `product_description`, `product_discount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Đầm váy thô hai dây bé gái Rabity 92491', 369000, '1897837625.webp', 'Hồng', '<p>Đầm váy là là một outfits không thể thiếu trong tủ đồ của các cô công chúa nhỏ giúp ba mẹ tiết kiệm thời gian trong việc lựa chọn cho bé mỗi ngày mà bé có thể mặc trong nhiều dịp khác nhau như như đi chơi, đi học, đi tiệc,...</p><h2><strong>1. Đặc điểm nổi bật&nbsp;Đầm váy thô hai dây bé gái Rabity 92491</strong></h2><ul><li>Nhóm sản phẩm: &nbsp;Đầm váy bé gái</li><li>Chất liệu: 95% cotton 5%spandex an toàn và thoáng mát cho da của bé</li><li>Size: Phù hợp với bé gái&nbsp;cân nặng từ 17&nbsp;- 25kg, từ 5&nbsp;- 8&nbsp;tuổi</li></ul><h2><strong>2. Thông tin chi tiết Đầm váy thô hai dây bé gái Rabity 92491</strong></h2><p>Đầm váy hai dây bé gái kiểu&nbsp;dáng nhẹ nhàng, thanh lịch,&nbsp;màu hồng&nbsp;dịu dàng cho các bé có thể mặc&nbsp;đi học, đi tiệc&nbsp;hoặc&nbsp;đi chơi cuối tuần. Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</p><p><img src=\"https://file.hstatic.net/1000290074/file/dam-vay-tho-hai-day-be-gai-92491-1_09d952da76284174b67097d444bd34d4.jpg\" alt=\"Đầm hai dây bé gái\" width=\"1200\" height=\"1200\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/dam-vay-tho-hai-day-be-gai-92491-2_1e0f4433ea304fecb6e24759c86bb477.jpg\" alt=\"Đầm hai dây bé gái\" width=\"1200\" height=\"1200\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/chat-lieu-95-cotton-5-spandex_3f487c7bed9a4433819993ecdc2b60ea.jpg\" alt=\"Đầm hai dây bé gái\" width=\"1200\" height=\"1200\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/cach-bao-quan-vai-95-cotton-5-spandex_958602b277124f50ae34c15c761fc38c.jpg\" alt=\"Đầm hai dây bé gái\" width=\"1200\" height=\"1200\"></p><h2><strong>3. Bảng size tham khảo&nbsp;</strong></h2><p><img src=\"https://file.hstatic.net/1000290074/file/bang_size_quan_ao-01_b6f14c5da17143fa8da8e95c401d066e.jpg\" alt=\"bảng size quần áo trẻ em\" width=\"2048\" height=\"2048\"></p><h2>&nbsp;</h2>', 0, 1, '2024-04-19 07:18:03', '2024-05-03 22:39:25'),
(2, 'Đầm váy thun Nàng Tiên Cá Ariel ngắn tay bé gái', 229000, '806757277.webp', 'Xanh ngọc', '<p>Nội dung đang được cập nhật</p>', 0, 2, '2024-05-01 02:25:03', '2024-05-01 02:25:03'),
(3, 'Đầm váy thô hai dây bé gái TK 2024', 329000, '560998687.jpg', 'Xanh bò - Gắn nơ', '<h2><strong>Đầm váy thô hai dây bé gái TK 2024</strong></h2><p>Là công chúa&nbsp;phải xinh, chiếc đầm váy thô hai dây là sự lựa chọn hoàn hảo của mẹ cho bé diện đồ. Được thiết kế với chất&nbsp;cotton mềm, mịn mát, bé có thể&nbsp;mặc nhà thoải mái, dạo phố xinh xắn.</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 2024</strong></h3><p>- Chất liệu vải 100% cotton, thoáng mát&nbsp;và thấm hút mồ hôi</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 14-25kg, từ 4-8 tuổi</p><p>- Đầm 2 dây mịn mát&nbsp;họa tiết thổ cẩm thời trang, thiết kế nơ bản to cho bé mặc đi chơi thật đáng yêu</p><p>&nbsp;</p><h3><strong>2. Hình ảnh Đầm váy thô hai dây bé gái TK 2024</strong></h3><p><img src=\"https://file.hstatic.net/1000290074/file/93242000-1_33afd755baa14bacb613c18a0800ef78_grande.jpg\" alt=\"Đầm váy thô hai dây bé gái Rabity 93242\" width=\"400\" height=\"600\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/93242000-3_1d5a6f41cc454dd9a3d5560c7879d35d_grande.jpg\" alt=\"Đầm váy thô hai dây bé gái Rabity 93242\" width=\"400\" height=\"600\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/93242000-4_26041538a76f45ab8a435699f3c4f76a_grande.jpg\" alt=\"Đầm váy thô hai dây bé gái Rabity 93242\" width=\"400\" height=\"600\"></p><p><i>Đầm váy thô hai dây bé gái &nbsp;TK 2024 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 0, 1, '2024-05-03 07:23:45', '2024-05-03 22:39:06'),
(4, 'Đầm váy thô hai dây hoa lá bé gái TK 20241', 229000, '1316242054.webp', 'Tím than - In Hoa', '<h2><strong>Đầm váy thô hai dây bé gái TK 20241</strong></h2><p>Bé yêu&nbsp;vận động, bé thích khám phá thiên nhiên thì chiếc váy màu sắc này mang đến sự mát mẻ tươi vui cho bé. Váy được thiết kế 2 dây thoải mái, đáng yêu cùng với thân váy dưới xòe thoải mái</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 20241</strong></h3><p>- Chất liệu 100% cotton từ sợi bông thiên nhiên, an toàn và thoáng mát</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 14-34kg, từ 4-12&nbsp;tuổi</p><p>- Đầm váy thiết kế&nbsp;hau dây&nbsp;họa tiết hoa cỏ&nbsp;tươi mát</p><p>&nbsp;</p><h3><strong>2. Hình ảnh&nbsp;Đầm váy thô hai dây bé gái TK 20241</strong></h3><p><img src=\"https://file.hstatic.net/1000290074/file/93218000-1_581479c7422441a181adf2f4e486ede2_grande.jpg\" alt=\"Đầm váy thô hai dây bé gái Rabity 93218\" width=\"400\" height=\"600\"></p><p><i>Đầm váy thô hai dây bé gái TK 20241 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 0, 1, '2024-05-03 07:26:31', '2024-05-03 22:38:49'),
(5, 'Đầm váy thun hai dây họa tiết hoa cho bé gái TK22', 189000, '1123948719.webp', 'Xanh - In Hoa', '<h2><strong>Đầm váy thun hai dây bé gái TK 22</strong></h2><p>Bé yêu&nbsp;vận động, bé thích khám phá thiên nhiên thì chiếc váy màu sắc này mang đến sự mát mẻ tươi vui cho bé. Váy được thiết kế 2 dây thoải mái, 2 màu sắc nổi bật và đáng yêu cùng với thân váy dưới xòe thoải mái</p><p>&nbsp;</p><h3><strong>1. Thông tin&nbsp;Đầm váy thun hai dây bé gái TK 22</strong></h3><p>- Chất liệu 100% cotton từ sợi bông thiên nhiên, an toàn và thoáng mát</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 11-34kg</p><p>- Đầm váy thiết kế&nbsp;sát nách&nbsp;họa tiết hoa cỏ nổi bật, tươi mát</p><p>&nbsp;</p><h3><strong>2. Hình ảnh&nbsp;Đầm váy thun hai dây bé gái TK 22</strong></h3><p><img src=\"https://product.hstatic.net/1000290074/product/93148000-1_624a7501fc534a45afc3712ab7d90ff9_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/93148000-3_3de883c476544d16bc40246a2781fe0a_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/93148000-5_32ecddf558e84bc8a60188ad6393a48a_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/93148000-6_32c77ef752a1487a93e2a927b88067b0_grande.jpg\" width=\"400\" height=\"600\"></p><p><i>Đầm váy thun hai dây bé gái </i><strong>TK 22 </strong><i>xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 0, 1, '2024-05-03 08:14:03', '2024-05-03 22:38:41'),
(6, 'Đầm váy thô hai dây bé gái họa tiết chấm bi TK 23', 219000, '1441463747.webp', 'Xanh Bò - Chấm Bi', '<h2><strong>Đầm váy thô hai dây bé gái TK 23</strong></h2><p>Là công chúa&nbsp;phải xinh, chiếc đầm váy thô hai dây chấm bi&nbsp;là sự lựa chọn hoàn hảo của mẹ cho bé diện đồ. Được thiết kế với chất&nbsp;thun cotton mềm, mịn mát, bé có thể&nbsp;mặc nhà thoải mái, dạo phố xinh xắn.</p><h3><strong>1. Thông tin&nbsp;Đầm váy thô hai dây bé gái TK 23</strong></h3><p>- Chất liệu vải 100% cotton, co giãn và thấm hút mồ hôi</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Phù hợp với bé gái cân nặng từ 16-34kg</p><p>- Đầm 2 dây họa tiết chấm bi năng động, đáng yêu</p><p>&nbsp;</p><h3><strong>2. Hình ảnh Đầm váy thô hai dây bé gái TK 23</strong></h3><p><img src=\"https://file.hstatic.net/1000290074/file/vay-be-gai-hai-day_f2f3547d400346708c8c893a93637ecb_grande.jpg\" alt=\"Đầm váy bé gái hai dây Rabity chấm bi\" width=\"400\" height=\"600\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/vay-be-gai-hai-day-cham-bi_c76c2b9143c54738974af75a5c1a5bc0_grande.jpg\" alt=\"Đầm váy bé gái hai dây Rabity chấm bi\" width=\"400\" height=\"600\"></p><p><i><img src=\"https://file.hstatic.net/1000290074/file/dam-vay-be-gai-tho-hai-day_b21f4e6453a94cf79e5d43e422800652_grande.jpg\" alt=\"Đầm váy bé gái hai dây Rabity chấm bi\" width=\"400\" height=\"600\"></i></p><p><i>Đầm váy thô hai dây bé gái TK 23 xinh xắn, mịn mát</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 0, 1, '2024-05-03 08:16:57', '2024-05-03 22:38:32'),
(7, 'Đầm váy hai dây chấm bi Minnie bé gái TK202422', 279000, '1349579284.webp', 'Hồng - Minnie Chấm Bi', '<h2><strong>Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h2><h3><strong>1.&nbsp;Thông tin chi tiết&nbsp;Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h3><p>- Chất liệu: Với thiết kế 95% cotton và 5% spandex thoáng mát và an toàn cho làn da</p><p>- Độ tuổi, cân nặng: phù hợp cho bé từ 2-6 tuổi, từ 11-21kg</p><p>- Loại sản phẩm: &nbsp;Đầm váy bé gái</p><p>- Đầm váy sát nách hình chuột Minnie bản quyền Disney, đầm 2 dây đáng yêu, chân váy voan nhiều lớp bồng bềnh kết hợp với màu sắc bắt mắt, hiện đại cùng chấm bi vô cùng đáng yêu.</p><p>&nbsp;</p><h3><strong>2.&nbsp;Hình ảnh sản phẩm Đầm váy hai dây chấm bi Minnie bé gái TK 202422</strong></h3><p><img src=\"https://product.hstatic.net/1000290074/product/56950000-1_99400d3236f34468b912ef3186bf2188_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/56950000-3_cdeb441834034f30be1f43ffdcb50d25_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/56950000-6_d74448800b774dffa76dab4d47ec4341_grande.jpg\" width=\"400\" height=\"600\"></p><p><i>Đầm Minnie duyên dáng, đáng yêu&nbsp;</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản đầm váy&nbsp;của bé nơi khô ráo. Ngoài ra, khi giặt và phơi đầm váy&nbsp;trẻ em, mẹ nên lộn trái mặt trong của đầm váy tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 250000, 1, '2024-05-03 08:23:26', '2024-05-03 22:38:17'),
(8, 'Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002', 415000, '1083849072.webp', 'Hồng - Nơ', '<h2><strong>Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h2><p><strong>L</strong>ấy cảm hứng từ phong cách Parisian thanh lịch, thời thượng mang hơi thở kinh đô ánh sáng, những nhà mốt kì cựu Việt Nam – Pháp mang đến khung cảnh thiên nhiên đầy màu sắc thông qua hình ảnh khu vườn Versailles.</p><h3><strong>1. Thông tin chi tiết sản phẩm&nbsp;Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h3><p>- Chất liệu: 65% cotton và 35% spandex, form dáng đứng, 2 lớp&nbsp;dày dặn&nbsp;</p><p>- Phù hợp với bé gái có cân nặng từ 19-37kg</p><p>- Loại sản phẩm: Đầm váy bé gái</p><p>- Váy dáng đứng chữ A, điểm nhấn là thiết kế chiếc nơ trước ngực, điệu đà và&nbsp;thanh lịch.&nbsp;</p><p>- Kích thước sản phẩm:&nbsp;</p><p><img src=\"https://file.hstatic.net/1000290074/file/83002_2e36d8d5851945a692f8b0cc6f3d56a6_grande.png\" width=\"512\" height=\"180\"></p><p>&nbsp;</p><h3><strong>2. Hình ảnh sản phẩm&nbsp;Đầm váy thô hai dây bé gái TK x ELLE Kids- designed in Paris 83002</strong></h3><p><img src=\"https://product.hstatic.net/1000290074/product/83002000-1_b73635a627204d0aa1fed04b3fc8c86a_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/83002000-6_be4ba09d44c24ae5a574a0a26740ae3b_grande.jpg\" width=\"400\" height=\"600\"></p><p>Màu đỏ có ánh kim lấp lánh</p><p><img src=\"https://product.hstatic.net/1000290074/product/83002000-2_47a9158bc8a54deab2f5c71dc3da466f_grande.jpg\" width=\"400\" height=\"600\"></p><p><img src=\"https://product.hstatic.net/1000290074/product/83002000-3_0fd8102778b64b5b9e8e94719efeb7ce_grande.jpg\" width=\"400\" height=\"600\"></p><p><i>Đầm váy màu hồng - ánh kim lấp lánh nhẹ nhàng</i></p><p>&nbsp;</p><h3><strong>3. Hướng dẫn giặt và bảo quản&nbsp;</strong></h3><p>- Giặt tay trong lần giặt đầu tiên, mẹ nên ngâm và giặt riêng, không giặt chung đồ tối và sáng màu.&nbsp;Sau đó giặt bằng nước lạnh không có xà phòng để hình in mềm hơn, khó bong tróc hơn. Nên giặt sản phẩm bằng nước lạnh hoặc nước ấm dưới 40 độ C. Giặt bằng nước quá nóng có thể làm giãn vải và làm lỏng sản phẩm.</p><p>- Bảo quản: Sản phẩm có tính hút ẩm và thấm nước cao nên, vì vậy, mẹ nên&nbsp;bảo quản áo thun của bé nơi khô ráo. Ngoài ra, khi giặt và phơi áo thun trẻ em, mẹ nên lộn trái mặt trong của áo thun tay ngắn&nbsp;để giữ màu cho sản phẩm luôn như mới.</p>', 399000, 1, '2024-05-03 08:25:21', '2024-05-03 22:38:04'),
(9, 'Áo thun ngắn tay Mickey bé trai TKShop', 85000, '633673259.webp', 'Xanh đậm - Mickey', '<p>Áo&nbsp;thun bé trai một&nbsp;là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo thun cá tính, năng động giúp bé thoải mái vận động. Với những mẫu áo thun bạn có thể phối cho bé nhiều outfits mặc ở nhà, đi học, đi chơi, đi tiệc,...</p><h2><strong>1. Thông tin&nbsp;Áo thun ngắn tay bé trai Mickey Rabity 5712.01</strong></h2><p>- Loại sản phẩm: Áo thun bé trai</p><p>- Phù hợp với bé trai cân nặng từ 11 - 21kg, từ 2 - 6&nbsp;tuổi</p><p>- Chất liệu 100% cotton&nbsp;thoáng mát và an toàn cho làn da của bé</p><p>- Áo&nbsp;thun ngắn tay in hình nhân vật hoạt hình Mickey&nbsp;bản quyền Disney sắc nét và màu sắc hài hòa</p><p>&nbsp;</p><h2><strong>2. Chất liệu&nbsp;Áo thun ngắn tay bé trai Mickey Rabity 5712.01</strong></h2><p>Áo thun&nbsp;bé trai&nbsp;form vừa vặn thoải mái. Kiểu dáng dễ phối nhiều outfit lịch sự cho bé diện đi học, đi tiệc hay xuống phố. Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</p><p><img src=\"https://file.hstatic.net/1000290074/file/100_cotton_5201276f2ecb4845aae445734629f3d8.jpg\" alt=\"Áo bé gái ngắn tay 83037\" width=\"1200\" height=\"1200\"></p><p><img src=\"https://file.hstatic.net/1000290074/file/cach_bao_quan_054b1e15238b45a68377047388a22ad0.jpg\" alt=\"Áo bé gái ngắn tay 83037\" width=\"1200\" height=\"1200\"></p><h2><strong>3. Bảng size tham khảo&nbsp;</strong></h2><p><img src=\"https://file.hstatic.net/1000290074/file/bang_size_quan_ao-01_b6f14c5da17143fa8da8e95c401d066e.jpg\" alt=\"bảng size quần áo trẻ em\" width=\"2048\" height=\"2048\"></p>', 120000, 7, '2024-05-03 22:53:42', '2024-05-03 22:53:42'),
(10, 'Mũ nón vành bé trai/bé gái Tkshop', 109000, '1986232493.webp', 'Xanh chấm bi', '<h2><strong>Mũ nón vành bé trai/bé gái TK shop</strong></h2><p>Mũ vừa mang tính thời trang, vừa vô cùng tiện lợi, phù hợp cho cả bé trai và bé gái. Mẹ có thể sử dụng cho bé trong mọi hoàn cảnh, đi học, đi chơi, đi dã ngoại, du lịch... Đồng thời sử dụng mũ trong những ngày hè nóng bức còn đảm bảo sức khỏe cho con yêu nữa mẹ nhé</p><p>&nbsp;</p><h3><strong>1.&nbsp;Thông tin chi tiết&nbsp;Mũ nón vành bé trai/bé gái TK shop</strong></h3><p>- Loại sản phẩm: Mũ nón trẻ em</p><p>- Chất liệu: Mũ chất liệu vải kaki thoáng mát cho mùa hè, không gây cảm giác nóng nực bí bách cho bé, kết cấu mềm mại thoải mái</p><p>- Kích thước: Cho bé sơ sinh và bé 1-2 tuổi</p><p>- Kiểu dáng: Mũ vành che nắng cho bé, màu sắc đáng yêu với họa tiết chấm bi, kết hợp với 2 tai mèo dễ thương khiến bé thích vô cùng, phù hợp cho cả bé trai và bé gái. Đồng thời mũ có dây đeo có thể điều chỉnh độ dài.</p>', 0, 8, '2024-05-05 23:03:37', '2024-05-05 23:03:37'),
(11, 'Áo khoác gió dài tay bé trai TK shop', 259000, '1415545587.webp', 'xanh - đen', '<h2><strong>1. Đặc điểm nổi bật&nbsp;Áo khoác gió dài tay bé trai TK shop</strong></h2><ul><li>Nhóm sản phẩm: Áo khoác</li><li>Chất liệu: 100% polyester tránh&nbsp;nắng và chống gió tốt, bền bỉ, chống nước tốt và dễ vệ sinh</li><li>Size: Phù hợp với bé trai cân nặng từ 11-21kg, từ 2-6 tuổi</li><li>Áo khoác bé trai là bạn đồng hành không thể thiếu cho bé khi ra ngoài, với phong cách năng động, kiểu dáng đơn giản, vừa chống nắng,&nbsp;tia UV, tránh gió và chống nước, vừa&nbsp;đồng thời bảo vệ sức khỏe cho bé.&nbsp;Sản phẩm đạt chứng nhận Oeko-Tex 100 an toàn cho da trẻ em.</li></ul>', 0, 9, '2024-05-05 23:06:47', '2024-05-05 23:06:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2024-04-19 14:18:03', '2024-04-19 14:18:03'),
(2, 1, 2, 19, '2024-04-19 14:18:03', '2024-05-22 06:17:22'),
(3, 1, 3, 14, '2024-04-19 14:18:03', '2024-04-20 14:52:31'),
(4, 1, 4, 30, '2024-04-19 14:18:03', '2024-04-19 14:18:03'),
(5, 2, 1, 20, '2024-05-01 09:25:03', '2024-05-01 09:25:03'),
(6, 2, 2, 25, '2024-05-01 09:25:03', '2024-05-01 09:25:03'),
(7, 2, 3, 15, '2024-05-01 09:25:03', '2024-05-01 09:25:03'),
(8, 2, 4, 10, '2024-05-01 09:25:03', '2024-05-01 09:25:03'),
(9, 3, 1, 20, '2024-05-03 14:23:45', '2024-05-03 14:23:45'),
(10, 3, 2, 20, '2024-05-03 14:23:45', '2024-05-03 14:23:45'),
(11, 3, 3, 20, '2024-05-03 14:23:45', '2024-05-03 14:23:45'),
(12, 3, 4, 20, '2024-05-03 14:23:45', '2024-05-03 14:23:45'),
(13, 4, 1, 17, '2024-05-03 14:26:31', '2024-05-20 16:05:39'),
(14, 4, 2, 20, '2024-05-03 14:26:31', '2024-05-03 14:26:31'),
(15, 4, 3, 20, '2024-05-03 14:26:31', '2024-05-03 14:26:31'),
(16, 4, 4, 19, '2024-05-03 14:26:31', '2024-05-20 16:04:14'),
(17, 5, 1, 16, '2024-05-03 15:14:03', '2024-05-06 12:57:04'),
(18, 5, 2, 20, '2024-05-03 15:14:03', '2024-05-03 15:14:03'),
(19, 5, 3, 20, '2024-05-03 15:14:03', '2024-05-03 15:14:03'),
(20, 5, 4, 20, '2024-05-03 15:14:03', '2024-05-03 15:14:03'),
(21, 6, 1, 23, '2024-05-03 15:16:57', '2024-05-03 15:16:57'),
(22, 6, 2, 13, '2024-05-03 15:16:57', '2024-05-03 15:16:57'),
(23, 6, 3, 33, '2024-05-03 15:16:57', '2024-05-03 15:16:57'),
(24, 6, 4, 10, '2024-05-03 15:16:57', '2024-05-03 15:16:57'),
(25, 7, 1, 11, '2024-05-03 15:23:26', '2024-05-20 16:05:39'),
(26, 7, 2, 19, '2024-05-03 15:23:26', '2024-05-03 15:23:26'),
(27, 7, 3, 10, '2024-05-03 15:23:26', '2024-05-03 15:23:26'),
(28, 7, 4, 20, '2024-05-03 15:23:26', '2024-05-03 15:23:26'),
(29, 8, 1, 14, '2024-05-03 15:25:21', '2024-05-03 15:25:21'),
(30, 8, 2, 10, '2024-05-03 15:25:21', '2024-05-03 15:25:21'),
(31, 8, 3, 19, '2024-05-03 15:25:21', '2024-05-03 15:25:21'),
(32, 8, 4, 15, '2024-05-03 15:25:21', '2024-05-03 15:25:21'),
(33, 9, 1, 50, '2024-05-04 05:53:42', '2024-05-04 05:53:42'),
(34, 9, 2, 29, '2024-05-04 05:53:42', '2024-05-22 06:18:20'),
(35, 9, 3, 20, '2024-05-04 05:53:42', '2024-05-04 05:53:42'),
(36, 9, 4, 34, '2024-05-04 05:53:42', '2024-05-04 05:53:42'),
(37, 10, 1, 10, '2024-05-06 06:03:37', '2024-05-06 06:03:37'),
(38, 10, 2, 0, '2024-05-06 06:03:37', '2024-05-06 13:18:10'),
(39, 10, 3, 10, '2024-05-06 06:03:37', '2024-05-06 06:03:37'),
(40, 10, 4, 10, '2024-05-06 06:03:37', '2024-05-06 06:03:37'),
(41, 11, 1, 49, '2024-05-06 06:06:47', '2024-05-06 08:05:10'),
(42, 11, 2, 30, '2024-05-06 06:06:47', '2024-05-06 06:06:47'),
(43, 11, 3, 49, '2024-05-06 06:06:47', '2024-05-20 16:04:14'),
(44, 11, 4, 60, '2024-05-06 06:06:47', '2024-05-06 06:06:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, '5Y-17-19kg', '2024-04-19 07:14:34', '2024-04-19 07:14:34'),
(2, '6Y-19-21kg', '2024-04-19 07:14:45', '2024-04-19 07:14:45'),
(3, '7Y-21-23kg', '2024-04-19 07:15:00', '2024-04-19 07:15:00'),
(4, '8Y-23-25kg', '2024-04-19 07:15:05', '2024-04-19 07:15:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', 'admin', '$2y$10$m3IU8LKJRBD9Y7Kxa.6wp.keVV9A1L3VNUs3t7PbU678s0tL6DvbG', '2024-04-19 06:42:51', '2024-04-19 13:43:20'),
(3, 'khánh', 'dangtungkhanh@gmail.com', 'customer', '$2y$10$v7ChlXoles88jAYq0jHGj.wzPoGekWv78MTk4kr2g1xdTRDlvVl16', '2024-05-01 02:26:20', '2024-05-01 02:26:20'),
(4, 'Tùng Khánh', 'dantungkhanh288@gmail.com', 'customer', '$2y$10$gHgJJLlksvCymgQn7pS66u0gNAch6LVMEwvMucZXK0SOgewnimEXC', '2024-05-03 07:27:27', '2024-05-03 07:27:27'),
(5, 'Khánh Đặng', 'khanh@gmail.com', 'customer', '$2y$10$PxqH7W0YiHaFhCMqFRZOpe5dBCvm5mJQ/0NytRvWMbGVBf/MDlB7W', '2024-05-20 09:00:36', '2024-05-20 09:00:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`billDetail_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `billDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
