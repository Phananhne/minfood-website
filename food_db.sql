-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2022 lúc 10:59 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(3, 'HaDuyen', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(14, 2, 10, 'Bánh Đúc Lá Dứa', 25000, 1, 'banhduc.jpg'),
(15, 2, 8, 'Bánh Hỏi Heo Quay', 50000, 1, 'banhhoiheoquay.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(4, 2, 'Kiều Thị Hà Duyên ', 'hduyen1511@gmail.com', '0356754328', 'Món ăn ngon, đảm bảo vệ sinh lắm ạ!'),
(5, 1, 'Đàng Anh Min', 'danganhminh2303@gmail.com', '0784657483', 'Giao hàng khá nhanh, rất hài lòng về MinFood.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'Chờ xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(3, 2, 'Kieu Duyen', '0329237231', 'hduyen1511@gmail.com', 'Ví MoMo', 'An Nhơn, Xuân Hải, Ninh Hải, Ninh Thuận', 'Vịt Nấu Chao (100000 x 1) - Bánh Đúc Lá Dứa (25000 x 1) - Bánh Hỏi Heo Quay (50000 x 1) - ', 175000, '2022-11-28 10:14:19', 'Hoàn Thành'),
(4, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Thanh Toán Khi Nhận Hàng', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Bún Tằm Bì (45000 x 1) - Bánh Canh Ghẹ (50000 x 1) - ', 95000, '2022-11-28 10:20:30', 'Hoàn Thành'),
(6, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Ví MoMo', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Bún Tằm Bì (45000 x 2) - Cá lóc nướng trui (150000 x 1) - Mì Quảng (45000 x 1) - ', 285000, '2022-12-06 14:28:27', 'Chờ xử lý'),
(7, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Ví MoMo', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Bánh Xèo (25000 x 2) - Bánh Khọt (45000 x 1) - Bún đậu mắm tôm (185000 x 1) - ', 280000, '2022-12-07 05:19:11', 'Chờ xử lý'),
(8, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Ví MoMo', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Bánh Xèo (25000 x 2) - Bánh Khọt (45000 x 1) - Bún đậu mắm tôm (185000 x 1) - ', 280000, '2022-12-07 05:20:37', 'Chờ xử lý'),
(9, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Thanh Toán Khi Nhận Hàng', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Bún Tằm Bì (45000 x 5) - ', 225000, '2022-12-09 08:11:09', 'Chờ xử lý'),
(10, 1, 'Min', '0355425196', 'danganhminh2303@gmail.com', 'Ví MoMo', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận', 'Vịt Nấu Chao (100000 x 1) - Cá lóc nướng trui (150000 x 1) - ', 250000, '2022-12-09 09:19:05', 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`) VALUES
(1, 'Bánh bông lan trứng muối', 'Miền Nam', 35000, 'banhbonglan.jpg'),
(3, 'Vịt Nấu Chao', 'Miền Tây', 100000, 'vịt nấu chao.jpeg'),
(4, 'Cá lóc nướng trui', 'Miền Tây', 150000, 'calocnuongtrui.jpg'),
(6, 'Bún Mắm', 'Miền Tây', 40000, 'bunmam.jpg'),
(7, 'Bún Tằm Bì', 'Miền Tây', 45000, 'banhtambi.jpg'),
(8, 'Bánh Hỏi Heo Quay', 'Miền Tây', 50000, 'bánh hỏi.jpeg'),
(9, 'Bánh Canh Ghẹ', 'Miền Nam', 50000, 'bánh canh ghẹ.jpeg'),
(10, 'Bánh Đúc Lá Dứa', 'Miền Nam', 25000, 'banhduc.jpg'),
(11, 'Bánh Xèo', 'Miền Nam', 25000, 'bánh xèo.jpeg'),
(12, 'Hủ Tiếu Sa Đéc', 'Miền Nam', 45000, 'hủ tiếu.jpg'),
(13, 'Bún Cá Hải Phòng Đất Cảng', 'Miền Bắc', 40000, 'buncahaiphong.jpg'),
(14, 'Nem Nắm', 'Miền Bắc', 20000, 'nemnam.jpg'),
(16, 'Phở Hà Nội', 'Miền Bắc', 55000, 'Phở.jpg'),
(17, 'Bánh Đa Cua', 'Miền Bắc', 50000, 'banhdacua.jpg'),
(18, 'Nem Chua Thanh Hóa', 'Miền Bắc', 25000, 'nemchua.jpg'),
(19, 'Nem Nướng', 'Miền Trung', 25000, 'nem.jpg'),
(20, 'Bánh Mì', 'Miền Nam', 30000, 'bánh mì.jpeg'),
(21, 'Cơm Gà', 'Miền Trung', 40000, 'cơm gà.jpeg'),
(22, 'Cao Lầu', 'Miền Trung', 30000, 'cao lầu.jpeg'),
(23, 'Mì Quảng', 'Miền Trung', 45000, 'mì quảng.jpg'),
(24, 'Bánh Ướt', 'Miền Trung', 45000, 'banhuot.jpg'),
(25, 'Bánh Khọt', 'Miền Nam', 45000, 'bánh khọt.jpeg'),
(26, 'Bún đậu mắm tôm', 'Miền Bắc', 185000, 'bún đậu mắm tôm.jpeg'),
(27, 'Bún Cá', 'Miền Nam', 45000, 'bún cá.jpeg'),
(28, 'Gỏi Cuốn', 'Miền Tây', 15000, 'goi cuon.jpeg'),
(29, 'Cơm Tấm', 'Miền Nam', 35000, 'cơm tấm.jpeg'),
(30, 'Bún Thịt Nướng', 'Miền Trung', 45000, 'bún thịt nướng.jpeg'),
(31, 'Bánh Tráng Nướng', 'Miền Trung', 15000, 'bánh tráng nướng.jpeg'),
(32, 'Bánh Căn', 'Miền Trung', 25000, 'bánh căn.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'Min', 'danganhminh2303@gmail.com', '0355425196', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'Hoài Trung, Phước Thái, Ninh Phước, Ninh Thuận'),
(2, 'Kieu Duyen', 'hduyen1511@gmail.com', '0329237231', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'An Nhơn, Xuân Hải, Ninh Hải, Ninh Thuận'),
(3, 'Văn Dự', 'trancaesar2002@gmail.com', '0367275643', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', ''),
(4, 'Phan Anh', 'phthi2611@gmail.com', '0889300878', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
