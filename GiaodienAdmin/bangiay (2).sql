-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `locked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`user_id`, `name`, `email`, `password`, `locked`) VALUES
(61, 'Lê Văn Hải', 'hai2004@gmail.com', '$2y$10$l1T0op/hlx6SpdAGTLGIpObv188U.uhrmZo7SkppUQA7OTkbsHSem', 0),
(65, 'Dung', 'dung2004@gmail.com', '$2y$10$5BqrljVras2tkL3iyGEToOCECDzkLPBgfhWMwBXjsZUQ6G.iPJDB.', 0),
(66, 'Võ Văn Chính', 'chinh04@gmail.com', '$2y$10$tPz7AuliqBA2lE6OEuEq9eTYjanU43/W/P/Hk2hZ82iw33jYio5Jq', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'chinh', 'chinhspecial2004@gmail.com', '$2y$10$hzMT3ltJqCjLsXj0SDgQoe70JJVlqpnQoYysNAJ.i0VgUX7NMSiCy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anhchitiet`
--

CREATE TABLE `tbl_anhchitiet` (
  `anh_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `duongdananh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_anhchitiet`
--

INSERT INTO `tbl_anhchitiet` (`anh_id`, `sanpham_id`, `duongdananh`) VALUES
(109, 19, 'uploads1/chitietgiayNike20.jpeg'),
(110, 19, 'uploads1/chitietgiayNike21.jpeg'),
(111, 19, 'uploads1/chitietgiayNike22.jpeg'),
(112, 19, 'uploads1/chitietgiayNike23.jpeg'),
(113, 19, 'uploads1/chitietgiayNike24.jpeg'),
(114, 23, 'uploads1/chitietgiayNike.jpeg'),
(115, 23, 'uploads1/chitietgiayNike1.jpeg'),
(116, 23, 'uploads1/chitietgiayNike2.jpeg'),
(117, 23, 'uploads1/chitietgiayNike3.jpeg'),
(118, 23, 'uploads1/chitietgiayNike4.jpeg'),
(119, 4, 'uploads1/chitietgiayMLB.jpg'),
(120, 4, 'uploads1/chitietgiayMLB1.jpg'),
(123, 4, 'uploads1/chitietgiayMLB4.jpg'),
(124, 20, 'uploads1/chitietgiayNike25.jpeg'),
(125, 20, 'uploads1/chitietgiayNike26.jpeg'),
(126, 20, 'uploads1/chitietgiayNike27.jpeg'),
(127, 20, 'uploads1/chitietgiayNike28.jpeg'),
(128, 22, 'uploads1/chitietgiayNike11.jpeg'),
(129, 22, 'uploads1/chitietgiayNike12.jpeg'),
(130, 22, 'uploads1/chitietgiayNike13.jpeg'),
(131, 22, 'uploads1/chitietgiayNike14.jpeg'),
(132, 25, 'uploads1/chitietgiayNike5.jpeg'),
(133, 25, 'uploads1/chitietgiayNike6.jpeg'),
(134, 25, 'uploads1/chitietgiayNike7.jpeg'),
(135, 25, 'uploads1/chitietgiayNike8.jpeg'),
(136, 25, 'uploads1/chitietgiayNike9.jpeg'),
(137, 21, 'uploads1/chitietgiayNike15.jpeg'),
(138, 21, 'uploads1/chitietgiayNike16.jpeg'),
(139, 21, 'uploads1/chitietgiayNike17.jpeg'),
(140, 21, 'uploads1/chitietgiayNike18.jpeg'),
(141, 21, 'uploads1/chitietgiayNike19.jpeg'),
(158, 16, 'uploads1/chitietgiayMLB19.jpg'),
(159, 16, 'uploads1/chitietgiayMLB20.jpg'),
(160, 16, 'uploads1/chitietgiayMLB21.jpg'),
(161, 16, 'uploads1/chitietgiayMLB22.jpg'),
(162, 16, 'uploads1/chitietgiayMLB23.jpg'),
(193, 7, 'uploads1/chitietgiayMLB10.jpg'),
(194, 7, 'uploads1/chitietgiayMLB11.jpg'),
(195, 7, 'uploads1/chitietgiayMLB12.jpg'),
(196, 7, 'uploads1/chitietgiayMLB13.jpg'),
(197, 79, 'uploads1/chitietgiayMLB24.jpeg'),
(198, 79, 'uploads1/chitietgiayMLB25.jpeg'),
(199, 79, 'uploads1/chitietgiayMLB26.jpeg'),
(200, 79, 'uploads1/chitietgiayMLB27.jpeg'),
(201, 79, 'uploads1/chitietgiayMLB28.jpeg'),
(213, 116, 'uploads1/chitietgiayNewBlance19.jpg'),
(214, 116, 'uploads1/chitietgiayNewBlance20.jpg'),
(215, 116, 'uploads1/chitietgiayNewBlance21.jpg'),
(216, 116, 'uploads1/chitietgiayNewBlance22.jpg'),
(217, 14, 'uploads1/chitietgiayNewBlance11.jpg'),
(218, 14, 'uploads1/chitietgiayNewBlance12.jpg'),
(219, 14, 'uploads1/chitietgiayNewBlance13.jpg'),
(220, 14, 'uploads1/chitietgiayNewBlance15.jpg'),
(221, 14, 'uploads1/chitietgiayNewBlance16.jpg'),
(223, 13, 'uploads1/chitietgiayNewBlance23.jpg'),
(224, 13, 'uploads1/chitietgiayNewBlance24.jpg'),
(225, 13, 'uploads1/chitietgiayNewBlance25.jpg'),
(226, 13, 'uploads1/chitietgiayNewBlance26.jpg'),
(227, 13, 'uploads1/chitietgiayNewBlance27.jpg'),
(228, 13, 'uploads1/chitietgiayNewBlance28.jpg'),
(317, 118, 'uploads1/chitietgiayNewBlance34.jpg'),
(318, 118, 'uploads1/chitietgiayNewBlance35.jpg'),
(319, 118, 'uploads1/chitietgiayNewBlance36.jpg'),
(320, 118, 'uploads1/chitietgiayNewBlance37.jpg'),
(321, 118, 'uploads1/chitietgiayNewBlance38.jpg'),
(322, 118, 'uploads1/chitietgiayNewBlance39.jpg'),
(328, 8, 'uploads1/chitietgiayNewBlance6.jpg'),
(329, 8, 'uploads1/chitietgiayNewBlance7.jpg'),
(330, 8, 'uploads1/chitietgiayNewBlance8.jpg'),
(331, 8, 'uploads1/chitietgiayNewBlance9.jpg'),
(332, 8, 'uploads1/chitietgiayNewBlance10.jpg'),
(363, 116, 'uploads1/chitietgiayNewBlance17.jpg'),
(364, 116, 'uploads1/chitietgiayNewBlance18.jpg'),
(390, 4, 'uploads1/chitietgiayMLB2.jpg'),
(391, 4, 'uploads1/chitietgiayMLB3.jpg'),
(392, 7, 'uploads1/chitietgiayMLB9.jpg'),
(398, 148, 'uploads1/chitietgiayMLB5.jpg'),
(399, 148, 'uploads1/chitietgiayMLB6.jpg'),
(400, 148, 'uploads1/chitietgiayMLB7.jpg'),
(401, 148, 'uploads1/chitietgiayMLB8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `img`) VALUES
(1, 'Banner.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `danhgia_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sosao` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhgia`
--

INSERT INTO `tbl_danhgia` (`danhgia_id`, `sanpham_id`, `nguoidung_id`, `noidung`, `img`, `sosao`) VALUES
(36, 16, 66, '', '', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `user_id` int(11) NOT NULL,
  `giohang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `giasanpham` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'đã đăng nhập'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`user_id`, `giohang_id`, `sanpham_id`, `tensanpham`, `giasanpham`, `hinhanh`, `soluong`, `size`, `status`) VALUES
(65, 381, 79, 'Giày MLB Liner Mid Denim Boston Siêu Cấp', 980000, 'uploads/giayMLB3.jpg', 3, 38, 'đã đăng nhập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id` int(11) NOT NULL,
  `madonhang` varchar(100) NOT NULL,
  `ten_nguoi_mua` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `dia_chi` mediumtext NOT NULL,
  `dien_thoai` varchar(256) NOT NULL,
  `noi_dung` mediumtext NOT NULL,
  `hang_duoc_mua` mediumtext NOT NULL,
  `ngaytaohd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id`, `madonhang`, `ten_nguoi_mua`, `email`, `dia_chi`, `dien_thoai`, `noi_dung`, `hang_duoc_mua`, `ngaytaohd`) VALUES
(289, '#B353888FBC3EE702', 'Võ Văn Chính', 'chinh04@gmail.com', '59 Lưu Quang Vũ,Phường Hoà Quý,Quận Ngũ Hành Sơn,Thành phố Đà Nẵng', '0335321987', 'Đã xử lý', '[79],[9],[36];', '2024-01-05 16:33:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `menu_link`) VALUES
(1, '  Trang chủ', 'index.php'),
(2, '  Sản phẩm ', 'sanpham.php'),
(3, 'Tin tức', 'tintuc.php'),
(4, 'Khuyến mãi', 'khuyenmai.php'),
(5, 'Liên hệ', 'contact.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `submenu1_id` int(11) NOT NULL,
  `masanpham` varchar(50) NOT NULL,
  `sanpham_name` varchar(100) NOT NULL,
  `sanpham_gia` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `sanpham_giasale` int(11) NOT NULL,
  `sanpham_img` varchar(100) NOT NULL,
  `noibat` varchar(50) NOT NULL,
  `mo_ta` varchar(600) NOT NULL,
  `tinh_trang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `submenu1_id`, `masanpham`, `sanpham_name`, `sanpham_gia`, `sale`, `sanpham_giasale`, `sanpham_img`, `noibat`, `mo_ta`, `tinh_trang`) VALUES
(4, 3, 'C/S', ' Giày MLB Liner Mid Monogram NY', 1000000, 15, 850000, 'uploads/giayMLB6.jpg', 'Không', 'Giày MLB Liner Mid Monogram NY với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker dễ mang, dễ phố đồ thì không nên bỏ qua mẫu giày siêu phẩm này đâu nhé! Dưới đây là một số hình ảnh của đôi Giày MLB Liner Mid Monogram NY tại TyHi Sneaker (hàng chuẩn Siêu cấp bản xịn nhất thị trường).', 'Còn hàng'),
(7, 3, 'C/S', 'Giày MLB Liner Mid Denim Boston Siêu Cấp', 1500000, 0, 1500000, 'uploads/giayMLB1.jpg', 'Không', 'Giày MLB Liner Mid Denim Boston Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker dễ mang, dễ phố đồ thì không nên bỏ qua mẫu giày siêu phẩm này đâu nhé! Dưới đây là một số hình ảnh của đôi Giày MLB Liner Mid Denim Boston Siêu Cấp tại TyHi Sneaker (hàng chuẩn Siêu cấp bản xịn nhất thị trường).', 'Còn hàng'),
(8, 2, 'C/S', 'Giày New Blance 550 White Green Cao Cấp', 500000, 10, 450000, 'uploads/giayNewBlance9.jpg', 'Không', 'Giày New Balance 550 White Green với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker dễ mang, dễ phố', 'Còn hàng'),
(13, 2, 'C/S', 'Giày New Blance 550 White Navy Cao Cấp', 300000, 0, 300000, 'uploads/giayNewBalance3.jpg', 'Có', 'Giày New Balance 550 White Navy là một trong những mẫu giày được yêu thích trong bộ sưu tập của thương hiệu New Balance. Với sự kết hợp màu sắc trắng tinh khiết và navy cổ điển, đôi giày này mang đến vẻ đẹp thanh lịch và phong cách thể thao cổ điển. Thiế', 'Sắp hết hàng'),
(14, 2, 'C/S', 'Giày New Blance 550 Aime Leon Dore White Navy Siêu Cấp', 550000, 20, 440000, 'uploads/giayNewBlance4.jpg', 'Không', 'Giày New Balance 550 Aime Leon Dore White Navy là một phiên bản độc đáo và đẳng cấp của thương hiệu New Balance, phối hợp cùng thương hiệu thời trang Aime Leon Dore. Với màu sắc trắng thanh lịch kết hợp với xanh navy trầm lắng, đôi giày này mang đến vẻ đẹ', 'Còn hàng'),
(16, 3, 'C/S', 'Giày MLB Big Ball Chunky Mask Los Angeles Dogers ', 450000, 0, 450000, 'uploads/giayMLB.jpg', 'Không', 'Giày MLB Big Ball Chunky Mask Los Angeles Dogers với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker ', 'Sắp hết hàng'),
(19, 1, 'C/S', ' Giày Nike Jordan 1 Low ‘Cardinal Red’ Like Auth', 500000, 10, 450000, 'uploads/giayNike8.jpg', 'Có', ' Giày Nike Jordan 1 Low ‘Cardinal Red’ Like Authvới thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker dễ mang', 'Sắp hết hàng'),
(20, 1, 'C/S', 'Giày Nike Air Jordan 1 Low GS ‘Shattered Backboard’', 450000, 30, 315000, 'uploads/giayNike2.jpg', 'Không', 'Giày Nike Air Jordan 1 Low GS ‘Shattered Backboard’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê ', 'Còn hàng'),
(21, 1, 'C/S', 'Giày Nike Air Jordan 1 ‘White Metallic Gold’ CZ4776-100', 600000, 0, 600000, 'uploads/giayNike1.jpg', 'Có', 'Giày Nike Air Jordan 1 Low ‘White Metallic Gold’ CZ4776-100 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người', 'Còn hàng'),
(22, 1, 'C/S', 'Giày Nike Air Jordan 1 High Switch ‘Light Smoke Grey', 1200000, 10, 1080000, 'uploads/giayNike7.jpg', 'Có', 'Giày Nike Air Jordan 1 High Switch ‘Light Smoke Grey’ là một phiên bản độc đáo và mới lạ trong dòng Air Jordan 1, lấy cảm hứng từ thiết kế kinh điển của Michael Jordan và đem lại một chút sáng tạo riêng biệt. Với việc kết hợp các yếu tố từ cả giày bóng rổ và giày chạy, đây thực sự là một sản phẩm độc đáo.', 'Sắp hết hàng'),
(23, 1, 'C/S', 'Giày Jordan 1 Retro Low Dior CN8608-002 Like Auth', 550000, 18, 451000, 'uploads/giayNike.jpg', 'Không', 'Giày Jordan 1 Retro Low Dior CN8608-002 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\n\r\nVà nếu bạn cũng là một người đam mê dòng sneaker', 'Còn hàng'),
(25, 1, 'C/S', 'Giày Nike Air Jordan 1 Low Panda Like Auth ', 850000, 20, 680000, 'uploads/giayNike6.jpg', 'Không', 'Giày Nike Air Jordan 1 Low Panda Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 'Còn hàng'),
(79, 3, 'N/S', 'Giày MLB Liner Mid Denim Boston Siêu Cấp', 1400000, 30, 980000, 'uploads/giayMLB3.jpg', 'Không', 'Giày MLB Liner Mid Denim Boston là một sự kết hợp hoàn hảo giữa thời trang đường phố và tinh thần thể thao của thành phố Boston. Được thiết kế bởi MLB, một trong những tên tuổi nổi tiếng trong làng thể thao, đôi giày này thể hiện sự đam mê và lòng tự hào của người yêu thể thao và Boston Red Sox.', 'Còn hàng'),
(116, 2, 'M/S', 'Giày New Blance 550 Aimé Leon Dore x Natural Green Cao Cấp', 1000000, 10, 900000, 'uploads/giayNewBalance.jpg', 'Không', 'Giày New Balance 550 Aimé Leon Dore x Natural Green với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.\r\nGiày New Balance 550 Aimé Leon Dore x Natural Green là một phiên bản đặc biệt trong dòng sản phẩm New Balance 550, hợp tác cùng thương hiệu thời trang nổi tiếng Aimé Leon Dore. Với sự kết hợp màu sắc tinh tế của natural green và phong cách cá tính, đôi giày này mang đến vẻ đẹp độc đáo và thanh lịch. ', 'Còn hàng'),
(118, 2, 'R/S', 'Giày New Balance 550 White Full Cao Cấp', 1000000, 12, 880000, 'uploads/giayNewBlance8.jpg', 'Có', 'Giày New Balance 550 White Full là một trong những phiên bản đáng chú ý trong dòng sản phẩm New Balance 550. Với màu sắc trắng tinh khiết trải đều trên toàn bộ đôi giày, đây là mẫu giày mang đến vẻ đẹp tinh tế và thanh lịch. Thiết kế của Giày New Balance 550 White Full hướng đến sự tối giản và đơn giản, tạo nên sự phong cách hiện đại và trẻ trung.\r\nMàu sắc trắng tinh khiết trọn vẹn: Với màu trắng trải đều từ trên đế đến thân giày, Giày New Balance 550 White Full tạo nên sự hài hòa và tinh tế, là lựa chọn hoàn hảo cho những ai yêu thích sự tối giản và thanh lịch.\r\n\r\n', 'Sắp hết hàng'),
(148, 3, 'N/S', 'Giày MLB Liner High NY ‘White Black’ (QUAI DÁN)', 300000, 20, 240000, 'uploads/giayMLB2.jpg', 'Không', 'Thương hiệu MLB (Major League Baseball) là một trong những thương hiệu nổi tiếng trong ngành thể thao, chuyên về bóng chày, và có sự uy tín và danh tiếng vượt bậc. Từ việc chuyên sản xuất các sản phẩm liên quan đến bóng chày, MLB đã mở rộng sang lĩnh vực thời trang và giày dép với mục tiêu đáp ứng nhu cầu của người hâm mộ và giới trẻ yêu thích phong cách thể thao đường phố.\r\n', 'Còn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `kichco` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `sanpham_id`, `kichco`, `soluong`) VALUES
(22, 116, 45, 0),
(23, 116, 46, 0),
(24, 116, 47, 2),
(25, 116, 48, 5),
(26, 116, 49, 3),
(159, 19, 35, 16),
(160, 19, 36, 13),
(161, 19, 37, 10),
(162, 19, 38, 11),
(163, 19, 39, 6),
(164, 19, 40, 10),
(165, 19, 41, 10),
(166, 20, 37, 10),
(167, 20, 38, 5),
(168, 20, 39, 12),
(169, 20, 40, 6),
(170, 21, 38, 8),
(171, 21, 39, 9),
(172, 21, 40, 10),
(173, 21, 41, 11),
(174, 21, 42, 12),
(175, 22, 35, 4),
(176, 22, 36, 10),
(177, 22, 37, 5),
(178, 22, 38, 8),
(179, 22, 39, 10),
(180, 22, 40, 12),
(181, 22, 41, 10),
(182, 23, 35, 3),
(183, 23, 36, 2),
(184, 23, 37, 5),
(185, 23, 38, 5),
(186, 23, 39, 10),
(187, 23, 40, 2),
(188, 25, 38, 4),
(189, 25, 39, 5),
(190, 25, 40, 10),
(191, 25, 42, 6),
(192, 8, 40, 8),
(193, 8, 41, 7),
(194, 8, 42, 4),
(195, 8, 43, 5),
(196, 13, 35, 10),
(197, 13, 36, 6),
(198, 13, 37, 10),
(199, 13, 38, 12),
(200, 13, 39, 5),
(201, 13, 40, 10),
(202, 13, 41, 9),
(203, 13, 42, 10),
(204, 14, 36, 12),
(205, 14, 37, 14),
(206, 14, 38, 15),
(207, 14, 39, 2),
(208, 14, 40, 10),
(210, 118, 35, 10),
(211, 118, 36, 3),
(212, 118, 37, 15),
(213, 118, 38, 9),
(214, 118, 39, 8),
(215, 118, 40, 4),
(216, 118, 41, 15),
(217, 4, 35, 10),
(218, 4, 36, 5),
(219, 4, 37, 15),
(220, 4, 38, 8),
(221, 4, 39, 10),
(222, 4, 40, 7),
(223, 4, 41, 8),
(224, 4, 42, 10),
(225, 7, 36, 10),
(226, 7, 37, -11),
(227, 7, 38, 5),
(228, 7, 39, 12),
(229, 7, 40, 15),
(230, 7, 41, 8),
(231, 7, 42, 10),
(232, 16, 36, 10),
(233, 16, 37, 4),
(234, 16, 38, 13),
(235, 16, 40, 15),
(236, 16, 41, 10),
(237, 16, 42, 5),
(256, 148, 35, 33),
(257, 148, 36, 0),
(258, 148, 37, 10),
(259, 148, 38, 5),
(260, 148, 39, 12),
(261, 148, 40, 5),
(262, 148, 41, 9),
(263, 148, 42, 5),
(264, 79, 34, 0),
(265, 79, 35, 0),
(266, 79, 36, 1),
(267, 79, 37, 10),
(268, 79, 38, 3),
(269, 79, 39, 4),
(270, 79, 40, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `caption_title` varchar(100) NOT NULL,
  `caption_subtitle` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `caption_title`, `caption_subtitle`, `img`) VALUES
(1, ' Giày NewBlance 550 Aime Leon ', 'Retro High OG Dark Mocha', 'uploads/giayNewBlance3.jpg'),
(2, 'Giày Nike Air Jordan 1', 'Liner Mid Monogram Boston', 'uploads/giayNike8.jpg'),
(3, 'Giày Nike Air Jordan 1 High Switch', 'Run Star Hike Hi JW Anderson Black', 'uploads/giayNike7.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_submenu1`
--

CREATE TABLE `tbl_submenu1` (
  `submenu1_id` int(11) NOT NULL,
  `submenu1_name` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_submenu1`
--

INSERT INTO `tbl_submenu1` (`submenu1_id`, `submenu1_name`, `menu_id`) VALUES
(1, ' Giày Nike', 2),
(2, ' Giày New Blance', 2),
(3, ' Giày MLB', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_submenu2`
--

CREATE TABLE `tbl_submenu2` (
  `submenu2_id` int(11) NOT NULL,
  `submenu2_name` varchar(100) NOT NULL,
  `submenu1_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuonghieu`
--

CREATE TABLE `tbl_thuonghieu` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thuonghieu`
--

INSERT INTO `tbl_thuonghieu` (`id`, `img`) VALUES
(1, 'partner_1.jpg'),
(2, 'partner_2.jpg'),
(3, 'partner_5.jpg'),
(4, 'partner_4.jpg'),
(5, 'partner_6.jpg'),
(6, 'partner_8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`id`, `title`, `content`, `img`) VALUES
(1, 'Chương trình TRI ÂN khách hàng thành viên 20/03 - 31/03/2023', '<p>C-Shop chân thành cám ơn quý khách hàng đã đồng hành xuyên suốt cùng shop trong 8 năm qua ! Để tỏ lòng biết ơn, shop xin gửi đến quý khách hàng thành viên từng mua hàng tại shop nội dung chương trình khuyến mãi tri ân như sau:</p> <br>\r\n\r\n \r\n\r\n<span><h5>THỜI GIAN</h5>: 20/03/2023 - 31/03/2023 </span><br>\r\n\r\n<span><h5>ÁP DỤNG</h5>: Mua tại shop và online </span><br>\r\n\r\n<span><h5>LƯU Ý</h5>: Chỉ áp dụng hàng đang có sẵn ở shop, không áp dụng order</span><br>\r\n\r\n \r\n\r\n<h4>NỘI DUNG:</h4> <br>\r\n\r\n<h4>1. Đối với hàng Best Quality\r\n\r\nGiảm cộng thêm 5% tất cả các hạng thành viên</h4> <br>\r\n\r\n<p>Member giảm 5% + 5% = 10%</p> <br>\r\n\r\n<p>Silver giảm 10% + 5% = 15%</p> <br>\r\n\r\n<p>Gold giảm 15% + 5% = 20%</p> <br>\r\n\r\n <p>Diamond giảm 20% + 5% = 25%</p> <br>\r\n\r\n \r\n\r\n<p>Ví dụ: Sản phẩm ở website có giá 2.000.000</p> <br>\r\n\r\n<p>- Member giảm 10% còn 1.800.000</p> <br>\r\n\r\n<p>- Silver giảm 15% còn 1.700.000 </p> <br>\r\n\r\n<p>- Gold giảm 20% còn 1.600.000 </p> <br>\r\n\r\n<p>- Diamond giảm 25% còn 1.500.000</p> <br>\r\n\r\n \r\n\r\n<h4>2. Đối với hàng chính hãng</h4> <br>\r\n\r\n<p>Tất cả các hạng được giảm 200.000đ so với giá ở C-Shop </p> <br>\r\n\r\n \r\n\r\n<p>C-Shop xin chúc quý khách thật nhiều sức khỏe và thật nhiều hạnh phúc. Hy vọng quý khách tiếp tục đồng hành cùng shop trong chặng đường tiếp theo. Trân trọng !</p>', 'uploads1/tintuc1.png'),
(2, 'CHƯƠNG TRÌNH KHUYẾN MÃI TẾT 2023', '<p>Chương trình khuyến mãi Tết áp dụng từ 05/01/2023 - 18/01/2023 hoặc đến khi hết quà tặng</p> <br>\r\n\r\n \r\n\r\n<h5>HÀNG BEST QUALITY:</h5> <br>\r\n \r\n\r\n<strong>Giá trị đơn hàng 1.000.000 đến 1.790.000: </strong> <br>\r\n\r\n<p>- Mua online: Tặng 01 vớ, 05 khăn ướt lau giày Fandy </p>\r\n\r\n<p>- Mua offline: Tặng 01 vớ, 05 khăn ướt lau giày Fandy </p> <br>\r\n\r\n \r\n\r\n<strong>Giá trị đơn hàng từ 1.800.000 đến 2.490.000: <strong> <br>\r\n\r\n<p>- Mua online: Free ship*, tặng 01 vớ, 01 chai vệ sinh mini Fandy 70.000, lì xì 50.000 </p> <br>\r\n\r\n<p>- Mua offline: Tặng 01 vớ, 01 chai vệ sinh mini Fandy 70.000, lì xì 50.000</p> \r\n<br>\r\n\r\n \r\n\r\n<storng>Giá trị đơn hàng từ 2.500.000 trở lên: <strong> <br>\r\n\r\n<p>- Mua online: Free ship*, tặng 01 vớ, 01 combo giặt khô Fandy 250.000, lì xì 100.000 </p> <br>\r\n\r\n<p>- Mua offline: Tặng 01 vớ, 01 combo giặt khô Fandy 250.000, lì xì 100.000</p> <br>\r\n\r\n \r\n\r\n<p>Tặng thêm 01 áo thun cao cấp BeleSneaker cho đơn hàng trên 5.000.000<p> <br>\r\n\r\n \r\n\r\n<p>Tri ân khách hàng thân thiết giảm giá thêm 5% - 10% - 15% - 20% tùy theo cấp độ MEMBER - SILVER - GOLD - DIAMOND</p> <br>\r\n\r\n \r\n\r\n<h4>HÀNG CHÍNH HÃNG</h4> <br>\r\n \r\n\r\n<h5>Áp dụng cho tất cả mẫu giày trên 3.000.000 </h5> <br>\r\n\r\n<p>- Lì xì 100.000</p> <br>\r\n\r\n<p>- Free ship</p> <br>\r\n\r\n<p>- Tặng 01 vớ </p> <br>\r\n\r\n \r\n\r\n<h4>*Free ship</h4>: áp dụng cho dịch vụ Giaohangtietkiem, khách cần ship Grab, Ahamove sẽ có phí. <br>\r\n\r\n<h4>*Chỉ áp dụng hàng đang có sẵn, không áp dụng order </h4> <br>\r\n\r\n \r\n\r\n<p>C-Shop xin chúc quý khách hàng năm mới hạnh phúc, bình an và thành công ! </p>', 'uploads1/tintuc2.png'),
(3, 'Thông báo về tình trạng hàng hóa và kẹt biên', '<p>Do tình trạng kẹt biên đang diễn biến phức tạp, hàng về chậm hơn dự kiến 7-14 ngày. <p> <br>\r\n\r\n \r\n\r\n<h4>C-Shop xin thông báo đến quý khách hàng như sau: </h4> <br>\r\n\r\n \r\n\r\n<p>- Quý khách vui lòng xem mẫu và size còn tại website: www.bele.vn hoặc inbox Zalo 0939688099 / Facebook Bele Giày Thể Thao để được tư vấn trước. </p> <br>\r\n\r\n<p>Vì số lượng mẫu và size ở tại cửa hàng còn rất ít, đã có nhiều khách hàng đến shop nhưng hết size/hết mẫu không mua được...</p> <br>\r\n\r\n \r\n\r\n<p>- Shop tạm ngưng nhận order, dự kiến 30 ngày hết kẹt biên shop sẽ thông báo mở order trở lại. </p> <br>\r\n\r\n \r\n\r\n<p>- Dự kiến 01/04 - 30/04 hàng sẽ về thêm rất nhiều mẫu mới </p> <br>\r\n\r\n \r\n\r\n<p>- Đôi với khách hàng đang order, hàng về trễ hơn dự kiến sẽ nhận được ưu đãi giảm giá 1% / ngày, tối đa 10% (Chỉ áp dụng đối với loại hàng Best) </p> <br>\r\n\r\n \r\n\r\n<strong>Rất mong quý khách thông cảm vì sự bất tiện này, đây là tình trạng chung bất khả kháng trên toàn quốc ! </strong>\r\n\r\n \r\n\r\n<p>C-Shop trân trọng thông báo ! </p>', 'uploads1/tintuc3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `user_info_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tennguoidung` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sodienthoai` varchar(20) DEFAULT NULL,
  `gioitinh` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `tinh/tp` varchar(255) DEFAULT NULL,
  `quan/huyen` varchar(255) DEFAULT NULL,
  `xa/phuong` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`user_info_id`, `user_id`, `tennguoidung`, `email`, `sodienthoai`, `gioitinh`, `ngaysinh`, `tinh/tp`, `quan/huyen`, `xa/phuong`, `diachi`) VALUES
(30, 61, 'Lê Văn Hải', 'hai2004@gmail.com', '0335321987', 'Nam', '2000-11-11', '', 'Thành phố Chí Linh', 'Phường Đồng Lạc', '52 Lưu Quang Vũ'),
(31, 65, 'Phạm Thị Dung', 'dung2004@gmail.com', '0335321987', 'Nữ', '2004-03-12', 'Thành phố Hải Phòng', 'Huyện Cát Hải', 'Xã Việt Hải', '59 Lưu Quang Vũ'),
(35, 66, 'Võ Văn Chính', 'chinh04@gmail.com', '0335321987', 'Nam', '2004-04-09', 'Thành phố Đà Nẵng', 'Quận Ngũ Hành Sơn', 'Phường Hoà Quý', '59 Lưu Quang Vũ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_anhchitiet`
--
ALTER TABLE `tbl_anhchitiet`
  ADD PRIMARY KEY (`anh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`danhgia_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`),
  ADD KEY `submenu1_id` (`submenu1_id`);

--
-- Chỉ mục cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_submenu1`
--
ALTER TABLE `tbl_submenu1`
  ADD PRIMARY KEY (`submenu1_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Chỉ mục cho bảng `tbl_submenu2`
--
ALTER TABLE `tbl_submenu2`
  ADD KEY `submenu1_id` (`submenu1_id`);

--
-- Chỉ mục cho bảng `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`user_info_id`),
  ADD UNIQUE KEY `username` (`tennguoidung`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_anhchitiet`
--
ALTER TABLE `tbl_anhchitiet`
  MODIFY `anh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `danhgia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_submenu1`
--
ALTER TABLE `tbl_submenu1`
  MODIFY `submenu1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_anhchitiet`
--
ALTER TABLE `tbl_anhchitiet`
  ADD CONSTRAINT `tbl_anhchitiet_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD CONSTRAINT `tbl_danhgia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_danhgia_ibfk_2` FOREIGN KEY (`nguoidung_id`) REFERENCES `tbl_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `tbl_giohang_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_giohang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`submenu1_id`) REFERENCES `tbl_submenu1` (`submenu1_id`);

--
-- Các ràng buộc cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD CONSTRAINT `tbl_size_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_submenu1`
--
ALTER TABLE `tbl_submenu1`
  ADD CONSTRAINT `tbl_submenu1_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_submenu2`
--
ALTER TABLE `tbl_submenu2`
  ADD CONSTRAINT `tbl_submenu2_ibfk_1` FOREIGN KEY (`submenu1_id`) REFERENCES `tbl_submenu1` (`submenu1_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD CONSTRAINT `tbl_user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
