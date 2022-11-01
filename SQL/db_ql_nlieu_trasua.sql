-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ql_nlieu_trasua`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_ctdh` int(11) NOT NULL,
  `san_pham` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_hang` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dm` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_dm`, `ten_dm`) VALUES
('DUC', 'Dụng cụ '),
('MUT', 'Mứt'),
('SID', 'Siro - Đường'),
('SUB', 'Sữa bột'),
('THA', 'Thạch '),
('TRA', 'Trà'),
('TRC', 'Trân châu');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_donhang` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `so_dt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tg_dat` datetime NOT NULL,
  `tg_giao` datetime DEFAULT NULL,
  `tinh_trang_tt` tinyint(1) DEFAULT NULL,
  `tinh_trang_giaohang` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` int(11) NOT NULL,
  `ho_nv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `mat_khau` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `mo_ta` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `danh_muc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `gia`, `mo_ta`, `danh_muc`, `hinh_anh`) VALUES
('MU01', 'Mứt Dừa Sấy Giòn ( Dừa Khô ) 280g Cao Cấp', 18000, '', 'MUT', 'mut-dua-say-gion-cao-cap-280g.jpg'),
('MU02', 'Mứt KiWi Hương Dâu 2.8kg', 60000, 'Mứt KiWi Hương Dâu 2.8kg', 'MUT', 'mut-kiwi-2.8kg-huong-dau-tay.jpg'),
('MU03', 'Mứt KiWi Hương Dâu Tây 2.8kg', 60000, 'Mứt KiWi Hương Dâu Tây 2.8kg', 'MUT', 'mut-kiwi-2.8kg-huong-dau-tay-2.jpg'),
('MU04', 'Mứt Trái Cây SP Cao Cấp', 0, 'Mứt Trái Cây SP Cao Cấp', 'MUT', 'mut-trai-cay-sp-cao-cap.jpg'),
('SB01', 'Bột Vị Dâu Tây Loại 1kg', 70000, 'Bột Vị Hoa Quả\r\nĐược kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'bot-vi-dau-tay-loai-1kg.jpg'),
('SB02', 'Bột Vị Dưa Vàng Loại 1kg', 70000, 'Bột Vị Hoa Quả\r\nĐược kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'bot-vi-dua-vang-loai-1kg.jpg'),
('SB03', 'Bột Vị Khoai Môn Loại 1kg', 70000, 'Bột Vị Hoa Quả\r\nĐược kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'bot-vi-khoai-mon-loai-1kg.jpg'),
('SB04', 'Bột Vị Socola Loại 1kg', 70000, 'Bột Vị Hoa Quả\r\nĐược kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'bot-vi-socola-loai-1kg.jpg'),
('SB05', 'Bột Vị Vị Trà Loại 1kg', 70000, 'Được kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'bot-vi-vi-tra-loai-1kg.jpg'),
('SB06', 'Puding Socola Loại 1kg', 70000, 'Được kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'puding-socola-loai-1kg.jpg'),
('SB07', 'Puding Trứng Loại 1kg', 120000, 'Được kết hợp từ nguồn sữa bột với nước cốt trái cây, trộn đều và sấy trong điều kiện phòng kín với nhiệt độ và áp suất cao . Sau nghiền nhỏ tơi xốp tạo ra những gói vị hoa quả đặc trưng của vị trái cây, quyện với vị ngậy béo của sữa bột, tạo ra một SP Bột Vị Kun Han thật tuyệt hảo.\r\nPhù hợp trong nghành đồ uống pha chế giải khát.', 'SUB', 'puding-trung-loai-1kg.jpg'),
('SB08', 'Sữa Lắc ( Shaker ) bao 25kg', 1550000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-lac-ly-shaker-loai-25kg.jpg'),
('SB09', 'Sữa Lắc ( Shaker ) loại 1kg', 70000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-lac-ly-shaker-loai-1kg.jpg'),
('SB10', 'Sữa Nấu A1 bao 25kg', 1850000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a1-loai-25kg.jpg'),
('SB11', 'Sữa Nấu A1 loại 1kg', 80000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a1-loai-1kg.jpg'),
('SB12', 'Sữa Nấu A2 bao 25kg', 1650000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a2-loai-25kg.jpg'),
('SB13', 'Sữa Nấu A2 loại 1kg', 70000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a2-loai-1kg.jpg'),
('SB14', 'Sữa Nấu A3 bao 25kg', 1550000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a3-loai-25kg.jpg'),
('SB15', 'Sữa Nấu A3 loại 1kg', 65000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a3-loai-1kg.jpg'),
('SB16', 'Sữa Nấu A4 bao 25kg', 1400000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a4-loai-25kg.jpg'),
('SB17', 'Sữa Nấu A4 loại 1kg', 60000, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a4-loai-1kg.jpg'),
('SB18', 'Sữa Nấu A5 bao 25kg', 0, 'Sữa Bột Kun Han\r\nThành Phần chính: Bột Sữa có nguồn gốc từ ngũ cốc như: Lúa mạch, Đậu Đỏ, Đậu Tương, Gạo Nếp … thêm hương vị Vani Kẹo\r\nĐược sản xuất và Oxi hoá tại phòng kín với nhiệt độ và áp suất cao, tạo ra một hỗn hợp sữa bột tinh khiết, giàu dinh dưỡng ,với quy trình khép kín giữ được nguyên các thành phần dinh dưỡng của nguyên liệu.\r\nSữa Bột Kun Han là thương hiệu tiên phong, là nhà sản xuất đầu tiên tại Việt Nam chuyên phục vụ nghành pha chế giải khát , đặc biệt trong nghành Trà Sữa Cao Cấp', 'SUB', 'sua-nau-a5-loai-25kg.jpg'),
('SD01', 'Đường Nước nhập khẩu Hàn Quốc Loại 25kg', 460000, '', 'SID', 'duong-nuoc-han-quoc-thung-25kg.jpg'),
('SD02', 'Siro Đường Đen Cao Cấp 520ml', 0, 'Siro Đường Đen Cao Cấp 520ml', 'SID', 'siro-huong-duong-den-sp-dac-biet-520ml.jpg'),
('SD03', 'Siro Hoa Quả can 2 lít', 55000, 'Siro Hoa Quả can 2 lít', 'SID', 'siro-hoa-qua-huong-cac-vi-can-2lit.jpg'),
('SD04', 'Siro Hương Sữa 520ml', 75000, 'Siro Hương Sữa 520ml', 'SID', 'siro-huong-sua-sp-dac-biet-520ml.jpg'),
('SD05', 'Siro Monin SP Cao Cấp', 0, 'Siro Monin SP Cao Cấp', 'SID', 'siro-monin-sp-cao-cap.jpg'),
('SD06', 'Siro Teisseire SP Cao Cấp', 0, 'Siro Teisseire SP Cao Cấp', 'SID', 'siro-teisseire-sp-cao-cap.jpg'),
('SD07', 'Siro Trái Cây SP Cao Cấp', 0, 'Siro Trái Cây SP Cao Cấp', 'SID', 'siro-trai-cay-sp-cao-cap.jpg'),
('TC01', 'Trân Châu Đen 1kg', 22000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-den-1kg.jpg'),
('TC02', 'Trân Châu Đen Cafe túi 2kg', 52000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-den-huong-cafe-2kg.jpg'),
('TC03', 'Trân Châu Đen Caramel túi 2kg', 86000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-den-huong-caramel-2kg.jpg'),
('TC04', 'Trân Châu Đen Mật Ong túi 2kg', 56000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-den-huong-mat-ong-2kg.jpg'),
('TC05', 'Trân Châu Đường Đen túi 2kg', 86000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-den-huong-duong-den-2kg.jpg'),
('TC06', 'Trân Châu Hoàng Kim Đào túi 2kg', 86000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-hoang-kim-dao-2kg.jpg'),
('TC07', 'Trân Châu trắng 1kg', 22000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-trang-1kg.jpg'),
('TC08', 'Trân Châu Trắng Bạch Ngọc 2kg', 86000, 'Trân Châu Kun Han là dòng sản phẩm Cao Cấp của Công Ty Minh Hạnh:\r\nThành phần chính: 90% là Tinh bột sắn ( Bột Mỳ ). Ngoài ra kết hợp thêm với những Hương Liệu từ thiên nhiên, được sản xuất trên dây truyền tự động khép kín. Trân Châu Kun Han sẽ luôn luôn đảm bảo vị tươi ngon nhất cho khách hàng sử dụng. Với tiêu chí thực phẩm vì Sức Khoẻ Cộng Đồng, Trân Châu Kun Han luôn luôn đi đầu trong công nghệ sản xuất và nghiên cứu mẫu mã đa dạng, mùi vị hoa quả đặc trưng . Đáp ứng nhu cầu của nhiều nghành đồ uống giải khát .', 'TRC', 'tran-chau-trang-bach-ngoc-2kg.jpg'),
('TH01', 'Thạch Bi Dừa 2.5kg', 45000, 'Thạch Bi Dừa 2.5kg\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Bi là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-bi-dua-2.5kg.jpg'),
('TH02', 'Thạch 3Q ( Ngọc Trai ) 2kg', 115000, 'Thạch Bi Dừa 2.5kg\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Bi là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-3q-ngoc-trai-2kg.jpg'),
('TH03', 'Thạch Bi Đen Trắng 2.5kg', 45000, 'Thạch Bi Đen Trắng 2.5kg\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\n\r\nThạch Bi là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-bi-den-trang-2.5kg.jpg'),
('TH04', 'Thạch Dừa 2.5kg Hương Dâu Tây', 35000, 'Thạch Dừa 2.5kg Hương Dâu Tây\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Dừa là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-dua-2.5kg-huong-dau-tay.jpg'),
('TH05', 'Thạch Dừa 2.5kg Hương Dừa', 35000, 'Thạch Dừa 2.5kg Hương Dừa\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Dừa là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-dua-2.5kg-huong-dua.jpg'),
('TH06', 'Thạch Dừa 2.5kg Hương Dưa Vàng', 35000, 'Thạch Dừa 2.5kg Hương Dưa Vàng\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-dua-2.5kg-huong-dua-vang.jpg'),
('TH07', 'Thạch Dừa 2.5kg Hương Khoai Môn', 35000, 'Thạch Dừa 2.5kg Hương Khoai Môn\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-dua-2.5kg-huong-khoai-mon.jpg'),
('TH08', 'Thạch Dừa 2.5kg Hương Táo', 35000, 'Thạch Dừa 2.5kg Hương Táo\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-dua-2.5kg-huong-tao.jpg'),
('TH09', 'Thạch Kim Cương 11 loại', 105000, 'Thạch Kim Cương 11 loại\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-coffee-3.3kg.jpg'),
('TH10', 'Thạch Kim Cương Dâu Tây 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-dau-tay-3.3kg.jpg'),
('TH11', 'Thạch Kim Cương Dừa 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-dua-3.3kg.jpg'),
('TH12', 'Thạch Kim Cương Khoai Môn 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-khoai-mon-3.3kg.jpg'),
('TH13', 'Thạch Kim Cương Matcha 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-matcha-3.3kg.jpg'),
('TH14', 'Thạch Kim Cương Socola 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-socola-3.3kg.jpg'),
('TH15', 'Thạch Kim Cương Táo 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-tao-3.3kg.jpg'),
('TH16', 'Thạch Kim Cương Trái Cây 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-trai-cay-3.3kg.jpg'),
('TH17', 'Thạch Kim Cương Trắng 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nThạch Kim Cương là Sản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-trang-3.3kg.jpg'),
('TH18', 'Thạch Kim Cương Việt Quất 3.3kg', 105000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-kim-cuong-viet-quat-3.3kg.jpg'),
('TH19', 'Thạch ngũ sắc cao 2.5kg', 40000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-ngu-sac-cao-2.5kg.jpg'),
('TH20', 'Thạch ngũ sắc cao 2.5kg', 40000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-ngu-sac-cao-2.5kg-2.jpg'),
('TH21', 'Thạch ngũ sắc thấp 2.5kg', 40000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-ngu-sac-thap-2.5kg-2.jpg'),
('TH22', 'Thạch ngũ sắc thấp 2.5kg', 40000, 'Sản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-ngu-sac-thap-2.5kg.jpg'),
('TH23', 'Thạch Rau Câu 2.5kg Hương Cafe', 35000, 'Thạch Rau Câu 2.5kg Hương Cafe\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa', 'THA', 'thach-rau-cau-2.5kg-huong-ca-phe.jpg'),
('TH24', 'Thạch Thủy Tinh 2.5kg Hương Trái Cây', 35000, 'Thạch Thủy Tinh 2.5kg Hương Trái Cây\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà Sữa.', 'THA', 'thach-thuy-tinh-2.5kg-huong-trai-cay.jpg'),
('TH25', 'Thạch Thủy Tinh 2.5kg Hương Trái Cây', 35000, 'Thạch Thủy Tinh 2.5kg Hương Trái Cây\r\n\r\nSản Phẩm được chiết suất 100% Từ nguồn Rong Biển. Sản Xuất trên dây truyền hiện đại của Nhật Bản.\r\nSản Phẩm Cao Cấp thuộc Công Ty TNHH Thạch Rau Câu Minh Hạnh. Sản Phẩm chuyên dùng trong các thương hiệu đồ uống giải khát, đặc biệt trong nghành Trà S', 'THA', 'thach-thuy-tinh-2.5kg-huong-trai-cay-2.jpg'),
('TR01', 'Hồng Trà ( Trà Đen) Số 1', 95000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'hong-tra-tra-den-so-1.jpg'),
('TR02', 'Hồng Trà ( Trà Đen) Số 2', 95000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'hong-tra-tra-den-so-2.jpg'),
('TR03', 'Hồng Trà ( Trà Đen) Số 3', 95000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'TRA', 'hong-tra-tra-den-so-3.jpg'),
('TR04', 'Hồng Trà ( Trà Đen) Số 4', 95000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'hong-tra-tra-den-so-4.jpg'),
('TR05', 'Hồng Trà ( Trà Đen) Túi Lọc Đ', 140000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'hong-tra-tra-den-tui-loc-d.jpg'),
('TR06', 'Hồng Trà ( Trà Đen) Túi Lọc V', 140000, 'Là sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'hong-tra-tra-den-tui-loc-v.jpg'),
('TR07', 'Trà Ô Long Cao Lửa Túi 1kg', 280000, 'Trà OLong Thương Hiệu Kun Han\r\nlà sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'tra-o-long-cao-lua-tui-1kg.jpg'),
('TR08', 'Trà Xanh Lài Túi 1kg', 190000, 'Trà Xanh Lài Thương Hiệu Kun Han\r\n\r\nLà sản phẩm Cao Cấp của Công Ty TNHH Thạch Rau Câu Minh Hạnh.\r\nNguyên Liệu : 100% từ những cánh trà thiên nhiên của tỉnh Thái Nguyên và tỉnh Lâm Đồng, được lên men và ủ theo Công Nghệ của Nhật Bản, Sản phẩm giúp trẻ hoá làn da, chống OXi hoá đặc biệt ngăn ngừa Ung Thư. Phù hợp cho mọi lứa tuổi sử dụng, đặc dùng sản phẩm ngon hơn trong nghành pha chế Trà Sữa', 'TRA', 'tra-xanh-lai-nhai-tui-1kg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_ctdh`),
  ADD KEY `san_pham` (`san_pham`),
  ADD KEY `don_hang` (`don_hang`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_donhang`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `danh_muc` (`danh_muc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_donhang`) REFERENCES `chi_tiet_don_hang` (`don_hang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`danh_muc`) REFERENCES `danh_muc` (`ma_dm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
