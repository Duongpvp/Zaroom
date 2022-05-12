-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2022 lúc 02:14 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `login`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id_class` int(3) NOT NULL,
  `name_class` varchar(30) NOT NULL,
  `time` datetime NOT NULL,
  `code` varchar(6) NOT NULL,
  `email_teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id_class`, `name_class`, `time`, `code`, `email_teacher`) VALUES
(8, 'Niên Luận Ngành', '0000-00-00 00:00:00', '2a7bf3', 'Cô Quyên'),
(9, 'ANM', '0000-00-00 00:00:00', '92bd6a', 'tea@tea'),
(19, 'DASD', '2022-05-01 10:54:05', 'c03ced', 'tea@tea'),
(21, 'Bảo mật web', '2022-05-08 20:49:41', '4f438e', 'tea@tea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_user`
--

CREATE TABLE `class_user` (
  `id_class` int(3) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class_user`
--

INSERT INTO `class_user` (`id_class`, `id_user`) VALUES
(8, 29),
(19, 17),
(9, 16),
(9, 17),
(19, 16),
(19, 29),
(21, 17),
(21, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exercise`
--

CREATE TABLE `exercise` (
  `id_ex` int(10) NOT NULL,
  `title_ex` varchar(100) NOT NULL,
  `content_ex` varchar(1000) NOT NULL,
  `date_ex` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `exercise`
--

INSERT INTO `exercise` (`id_ex`, `title_ex`, `content_ex`, `date_ex`) VALUES
(1, 'Post thứ nhất của nhóm ANM', 'An ninh mạng (cybersecurity), an ninh máy tính (computer security), bảo mật công nghệ thông tin (IT security) là việc bảo vệ hệ thống mạng máy tính khỏi các hành vi trộm cắp hoặc làm tổn hại đến phần cứng, phần mềm và các dữ liệu, cũng như các nguyên nhân dẫn đến sự gián đoạn, chuyển lệch hướng của các dịch vụ hiện đang được được cung cấp.[1]\r\n\r\nAn ninh mạng là thực tiễn của việc bảo vệ các hệ thống điện tử, mạng lưới, máy tính, thiết bị di động, chương trình và dữ liệu khỏi những cuộc tấn công kỹ thuật số độc hại có chủ đích. Tội phạm mạng có thể triển khai một loạt các cuộc tấn công chống lại các nạn nhân hoặc doanh nghiệp đơn lẻ; có thể kể đến như truy cập, làm thay đổi hoặc xóa bỏ dữ liệu nhạy cảm; tống tiền; can thiệp vào các quy trình kinh doanh.', '2022-04-20 21:07:25'),
(2, 'Post thứ hai của nhóm ANM', 'An ninh mạng máy tính bao gồm việc kiểm soát truy cập vật lý đến phần cứng, cũng như bảo vệ chống lại tác hại có thể xảy ra qua truy cập mạng máy tính, cơ sở dữ liệu (SQL injection) và việc lợi dụng lỗ hổng phần mềm (code injection).[2] Do sai lầm của những người điều hành, dù cố ý hoặc do bất cẩn, an ninh công nghệ thông tin có thể bị lừa đảo phi kỹ thuật để vượt qua các thủ tục an toàn thông qua các phương pháp khác nhau.[3]\r\n\r\nAn ninh mạng hoạt động thông qua một cơ sở hạ tầng chặt chẽ, được chia thành ba phần chính: bảo mật công nghệ thông tin, an ninh mạng và an ninh máy tính.\r\n\r\nBảo mật công nghệ thông tin (với cách gọi khác là bảo mật thông tin điện tử): Bảo vệ dữ liệu ở nơi chúng được lưu trữ và cả khi các dữ liệu này di chuyển trên các mạng lưới thông tin. Trong khi an ninh mạng chỉ bảo vệ dữ liệu số, bảo mật công nghệ thông tin nắm trong tay trọng trách bảo vệ cả dữ liệu kỹ thuật số lẫn dữ liệu vật lý khỏi những kẻ xâm nhập trái phép.\r\nAn ninh mạng: Là một tập hợp con của bảo', '2022-04-20 21:07:25'),
(3, 'Post thứ ba của nhóm ANM', 'Lĩnh vực này dần trở nên quan trọng do sự phụ thuộc ngày càng nhiều vào các hệ thống máy tính và Internet tại các quốc gia,[4] cũng như sự phụ thuộc vào hệ thống mạng không dây như Bluetooth, Wi-Fi, cùng với sự phát triển của các thiết bị \"thông minh\", bao gồm điện thoại thông minh, TV và các thiết bị khác kết nối vào hệ thống Internet of Things.\r\n\r\nNhân sự làm việc trong mảng an ninh mạng có thể được chia thành 3 dạng sau:\r\n\r\nHacker mũ trắng (White-hat hacker) [5] – cũng còn gọi là \"ethical hacker\" (hacker có nguyên tắc/đạo đức) hay penetration tester (người xâm nhập thử nghiệm vào hệ thống). Hacker mũ trắng là những chuyên gia công nghệ làm nhiệm vụ xâm nhập thử nghiệm vào hệ thống công nghệ thông tin để tìm ra lỗ hổng, từ đó yêu cầu người chủ hệ thống phải vá lỗi hệ thống để phòng ngừa các xâm nhập khác sau này với ý đồ xấu (thường là của các hacker mũ đen).[6]\r\nHacker mũ đen (Black-hat hacker): là các chuyên gia công nghệ xâm nhập vào hệ thống với mục đích xấu như đánh cắp thông ti', '2022-04-20 21:08:35'),
(4, '123', ' \r\n                   123     ', '0000-00-00 00:00:00'),
(5, '543534', ' \r\n       345435                 ', '0000-00-00 00:00:00'),
(6, 'Bài tập 1', ' dkfbsfskbfskjbgkjgbdskbgsdkdskb\r\n                        ', '0000-00-00 00:00:00'),
(8, 'Bài tập 1', '123213 \r\n                        ', '0000-00-00 00:00:00'),
(9, 'Bài tập 3', ' \r\n                      123  ', '0000-00-00 00:00:00'),
(10, '', ' \r\n                        ', '0000-00-00 00:00:00'),
(24, '88', 'sdfsdgsdgsdgsdg', '0000-00-00 00:00:00'),
(25, '88', 'sdfsdgsdgsdgsdg', '0000-00-00 00:00:00'),
(26, '99', 'qwerewrwer', '0000-00-00 00:00:00'),
(27, '999', '999', '0000-00-00 00:00:00'),
(28, '111', '111', '0000-00-00 00:00:00'),
(29, '222', '222', '0000-00-00 00:00:00'),
(30, '222', '222', '0000-00-00 00:00:00'),
(45, 'Bài tập 1', 'Làm theo hướng dẫn!!! Chúc may mắn', '0000-00-00 00:00:00'),
(46, 'Bài tập 2', 'Cố lên mấy em làm theo hướng dẫn', '0000-00-00 00:00:00'),
(47, 'Thi cuối kì 2', 'Những gì em đã học!', '0000-00-00 00:00:00'),
(49, 'Bài tập 1', 'nội dung', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ex_class`
--

CREATE TABLE `ex_class` (
  `id_ex_r` int(3) NOT NULL,
  `id_class_r` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ex_class`
--

INSERT INTO `ex_class` (`id_ex_r`, `id_class_r`) VALUES
(1, 9),
(2, 9),
(45, 19),
(46, 19),
(47, 19),
(49, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `id_file` int(10) NOT NULL,
  `path_file` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `file`
--

INSERT INTO `file` (`id_file`, `path_file`, `time`) VALUES
(1, 'login (5).sql', '2022-05-01 04:48:32'),
(2, 'post.php', '2022-05-01 06:06:18'),
(3, 'Phiếu nhận SV.doc', '2022-05-04 16:07:59'),
(4, 'MaSV_CT311XY_Baitap_MoPhong.pdf', '2022-05-04 19:00:21'),
(5, 'pexels-ketut-subiyanto-4132406.jpg', '2022-05-04 19:08:31'),
(6, 'phpinfo.png', '2022-05-04 19:08:31'),
(7, 'DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', '2022-05-05 12:01:01'),
(8, 'CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 12:04:57'),
(9, 'CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 12:23:56'),
(25, '0CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 16:05:45'),
(26, '1DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', '2022-05-05 16:05:45'),
(27, '0CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 16:24:01'),
(28, '1DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', '2022-05-05 16:24:01'),
(29, '0CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 16:27:10'),
(30, '1DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', '2022-05-05 16:27:10'),
(31, '0B1807573_Cau5a.jpg', '2022-05-05 21:29:00'),
(32, '1B1807573_Cau5b.jpg', '2022-05-05 21:29:00'),
(33, '0CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', '2022-05-05 21:31:32'),
(34, '1DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', '2022-05-05 21:31:32'),
(60, 'code mau TKCDM.txt', '2022-05-07 17:12:42'),
(61, 'B1807573_Cau4.jpg', '2022-05-07 18:20:19'),
(62, 'B1807573_Cau5a.jpg', '2022-05-07 18:20:19'),
(63, 'B1807573_Cau1.jpg', '2022-05-07 20:57:36'),
(64, 'TKB.docx', '2022-05-08 10:50:18'),
(65, 'code mau TKCDM.txt', '2022-05-08 10:50:43'),
(70, 'B1807573_Cau5b.jpg', '2022-05-08 21:11:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file_exercise`
--

CREATE TABLE `file_exercise` (
  `id_exercise` int(3) NOT NULL,
  `id_file_exercise` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `file_exercise`
--

INSERT INTO `file_exercise` (`id_exercise`, `id_file_exercise`) VALUES
(4, 1),
(5, 2),
(1, 1),
(2, 3),
(2, 2),
(1, 4),
(1, 5),
(2, 6),
(6, 7),
(24, 25),
(25, 26),
(27, 27),
(27, 28),
(28, 29),
(28, 30),
(29, 31),
(29, 32),
(45, 60),
(46, 61),
(46, 62),
(46, 63),
(47, 64),
(47, 65),
(49, 70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(3) NOT NULL,
  `body` longtext NOT NULL,
  `user_from` varchar(100) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id_msg`, `body`, `user_from`, `user_to`, `date_sent`) VALUES
(13, 'Tao ten la', 'duong891109@gmail.com', '', '2022-03-22 12:34:52'),
(14, 'fhdfhdfhdfh', 'moi', '', '2022-03-22 07:47:46'),
(15, 'dgjdhfgjidgod', 'luanlt632000@gmail.com', '', '2022-03-22 07:57:33'),
(16, 'hello!', 'luanlt632000@gmail.com', '', '2022-03-22 08:00:07'),
(17, 'ghdfjkngdfkjghdo', '1', '', '2022-03-22 08:00:40'),
(18, 'sdfsd', '2', '', '2022-03-22 08:21:57'),
(19, 'alo', 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', '0000-00-00 00:00:00'),
(20, 'uraaa', 'luanlt632000@gmail.com', '', '0000-00-00 00:00:00'),
(21, 'aaaaaaa', 'luanlt632000@gmail.com', '', '2022-03-22 14:27:50'),
(22, 'Hello!!!', 'luanlt632000@gmail.com', '', '2022-03-22 14:28:46'),
(23, 'Hello!', 'luanlt632000@gmail.com', '', '2022-03-22 14:29:54'),
(24, 'lmao', 'luanlt632000@gmail.com', '', '2022-03-22 14:31:04'),
(25, 'bruh', 'luanlt632000@gmail.com', '', '2022-03-22 14:31:19'),
(26, 'lmao lmao bruh', 'luanlt632000@gmail.com', '', '2022-03-22 14:31:49'),
(27, 'fuck', 'luanlt632000@gmail.com', '', '2022-03-22 14:59:49'),
(28, 'fuckl', 'luanlt632000@gmail.com', '', '2022-03-22 15:04:30'),
(29, 'bsdjhf', 'luanlt632000@gmail.com', '', '2022-03-22 15:07:48'),
(30, 'gdfg', 'luanlt632000@gmail.com', '', '2022-03-22 15:21:03'),
(31, 'àasgdf', 'dfher', '', '2022-03-22 09:21:11'),
(32, 'dsfsdf', 'luanlt632000@gmail.com', '', '2022-03-22 15:32:16'),
(33, 'fghfhfhg', 'dat', '', '2022-03-22 09:32:58'),
(34, 'gdfhfghf', 'aaaa', '', '2022-03-22 09:39:50'),
(35, 'hello', 'Dat09', '', '2022-03-22 09:54:02'),
(36, 'hello', 'luanb1807573@student.ctu.edu.vn', '', '2022-03-22 15:57:40'),
(37, 'Chao bạn bên kia nha', 'luanb1807573@student.ctu.edu.vn', 'luanlt632000@gmail.com', '2022-03-22 15:58:11'),
(38, 'hi', 'luanlt632000@gmail.com', '', '2022-03-22 15:58:20'),
(39, 'ád', 'luanlt632000@gmail.com', '', '2022-03-22 15:59:32'),
(40, 'áda', 'luanlt632000@gmail.com', '', '2022-03-22 16:00:23'),
(41, 'jsdfio', 'luanb1807573@student.ctu.edu.vn', '', '2022-03-22 16:01:19'),
(42, 'sdfsd', 'luanb1807573@student.ctu.edu.vn', '', '2022-03-22 16:01:55'),
(43, 'ád', 'luanb1807573@student.ctu.edu.vn', 'luanlt632000@gmail.com', '2022-04-10 20:48:05'),
(44, 'alo', 'luanb1807573@student.ctu.edu.vn', 'luanlt632000@gmail.com', '2022-04-10 20:50:34'),
(45, 'nghe nghe', 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', '2022-04-10 20:52:35'),
(46, 'hihihihi', 'luanb1807573@student.ctu.edu.vn', 'luanlt632000@gmail.com', '2022-04-10 20:53:26'),
(47, 'hahahaha', 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', '2022-04-10 20:53:35'),
(48, 'hello', 'luanlt632000@gmail.com', '2@2', '2022-04-10 21:00:43'),
(49, 'hi', '2@2', 'luanlt632000@gmail.com', '2022-04-10 21:00:53'),
(50, 'abc', 'luanlt632000@gmail.com', '2@2', '2022-04-10 21:01:06'),
(51, 'fdgdfg', '2@2', 'luanlt632000@gmail.com', '2022-04-10 21:04:04'),
(52, 'dfgdfgkl', '2@2', 'luanlt632000@gmail.com', '2022-04-10 21:04:05'),
(53, 'hjksdfois', '2@2', 'luanlt632000@gmail.com', '2022-04-10 21:04:06'),
(54, 'aaaaaaaa', '2@2', 'luanlt632000@gmail.com', '2022-04-10 21:04:17'),
(55, 'halo', '4@4', 'luanlt632000@gmail.com', '2022-04-10 21:06:38'),
(56, 'how old are you?', '4@4', 'luanlt632000@gmail.com', '2022-04-10 21:06:56'),
(57, 'I\'m fine thank you, and you?', 'luanlt632000@gmail.com', '4@4', '2022-04-10 21:07:20'),
(58, ':)))', '4@4', 'luanlt632000@gmail.com', '2022-04-10 21:07:29'),
(59, 'am good', '4@4', 'luanlt632000@gmail.com', '2022-04-10 21:07:39'),
(60, 'bye :)', '4@4', 'luanlt632000@gmail.com', '2022-04-10 21:07:43'),
(61, 'hey', 'luanlt632000@gmail.com', '4@4', '2022-04-10 21:07:55'),
(62, 'hi', 'luanlt632000@gmail.com', '2@2', '2022-04-11 14:53:50'),
(63, 'sdgsfhgkjdfgkjdfbgdfjkgbdfkjgbdfjkgfffffffffffffffffffffffffffffffkdahglksgklsahgkhgrkwgheroghweoioghweioghweogeogewbngoebgoewbgwegbekjgbjlgbwrkjegbrwekjgberkjgberkgbekgb', 'luanlt632000@gmail.com', '4@4', '2022-04-11 15:17:10'),
(64, 'Ng&ocirc;i sao TVB Cao Qu&acirc;n Hiền l&agrave; người được chọn v&agrave;o vai Bao Chửng lần n&agrave;y. Tuy nhi&ecirc;n kh&aacute;c với h&igrave;nh ảnh vị quan đạo mạo, kh&iacute; chất năm xưa, tạo h&igrave;nh của nam ch&iacute;nh Bao Thanh Thi&ecirc;n lần n&agrave;y tr&ocirc;ng v&ocirc; c&ugrave;ng ch&aacute;n ng&aacute;n, nhạt nho&agrave; từ m&agrave;u sắc đến trang phục. Đ&atilde; vậy, việc nam phụ Bằng Chứng Th&eacute;p 2 qu&aacute; gầy khiến cho h&igrave;nh ảnh Bao C&ocirc;ng xử &aacute;n kh&ocirc;ng oai vệ như xưa.', 'luanlt632000@gmail.com', '4@4', '2022-04-11 19:49:06'),
(65, '&aacute;d', 'luanlt632000@gmail.com', '4@4', '2022-04-11 20:36:50'),
(66, 'bla', 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', '2022-04-11 21:12:18'),
(67, 'ble', 'luanlt632000@gmail.com', '4@4', '2022-04-11 21:12:29'),
(68, 'fighting', 'luanlt632000@gmail.com', '4@4', '2022-04-11 22:32:54'),
(69, 'alo', '2@2', 'ANM', '2022-04-13 12:36:16'),
(70, 'nsdfjhks', 'luanlt632000@gmail.com', '1@1', '2022-04-13 15:24:59'),
(71, 'hi', '2@2', 'luanb1807573@student.ctu.edu.vn', '2022-04-13 16:28:29'),
(72, 'đ&acirc;y l&agrave; tin nhắn nh&oacute;m ANM', '2@2', 'ANM', '2022-04-13 16:30:06'),
(73, 'hhhh', 'luanlt632000@gmail.com', 'ANM', '2022-04-13 20:30:30'),
(74, 'fix được rồiiiiiiiiiii', '2@2', 'luanlt632000@gmail.com', '2022-04-13 21:23:17'),
(75, 'alo', 'luanlt632000@gmail.com', '4@4', '2022-04-13 21:55:21'),
(76, 'l&ocirc;', '4@4', 'luanlt632000@gmail.com', '2022-04-13 21:55:38'),
(77, 'l&ocirc;', 'luanlt632000@gmail.com', '2@2', '2022-04-13 21:55:49'),
(78, 'nghe', '2@2', 'luanlt632000@gmail.com', '2022-04-13 21:55:58'),
(79, 'haha', '2@2', 'ANM', '2022-04-13 21:56:09'),
(80, 'huhu', '4@4', 'ANM', '2022-04-13 21:57:25'),
(81, 'hihi', 'luanlt632000@gmail.com', 'ANM', '2022-04-13 21:58:22'),
(82, 'hjkfsd', 'luanlt632000@gmail.com', '2@2', '2022-04-15 13:24:23'),
(83, 'alo', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:28:30'),
(84, 'bạn n&oacute;i g&igrave; ạ ?', 'stu@stu', 'duong891109@gmail.com', '2022-04-29 21:28:40'),
(85, 'n&egrave; he gạch ống t phan ccdmm', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:28:53'),
(86, 'What sup bro', 'stu@stu', 'duong891109@gmail.com', '2022-04-29 21:28:58'),
(87, 'sup ga', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:29:02'),
(88, 'sup heo', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:29:03'),
(89, 'sup bo', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:29:08'),
(90, ':V', 'stu@stu', 'duong891109@gmail.com', '2022-04-29 21:29:12'),
(91, 'what is your name', 'stu@stu', 'duong891109@gmail.com', '2022-04-29 21:29:18'),
(92, 'T&egrave;o', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:29:21'),
(93, 'hello T&egrave;o', 'stu@stu', 'duong891109@gmail.com', '2022-04-29 21:29:29'),
(94, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:30:09'),
(95, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:30:26'),
(96, 'sda', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:30:30'),
(97, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:31:09'),
(98, 'Check D version', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:31:15'),
(99, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:38:29'),
(100, 'asd', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:38:39'),
(101, 'asd', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 21:38:42'),
(102, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:13:54'),
(103, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:13:57'),
(104, 'asd', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:08'),
(105, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:20'),
(106, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:26'),
(107, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:33'),
(108, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:39'),
(109, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:14:44'),
(110, '234123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:04'),
(111, 'asd', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:39'),
(112, 'asd', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:41'),
(113, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:43'),
(114, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:48'),
(115, '123', 'duong891109@gmail.com', 'stu@stu', '2022-04-29 22:15:50'),
(116, 'gdfgdf', '', '', '0000-00-00 00:00:00'),
(117, 'fsdfsd', '', '', '0000-00-00 00:00:00'),
(118, 'hi', 'stu@stu', 'duong891109@gmail.com', '0000-00-00 00:00:00'),
(119, '&ecirc;', 'stu@stu', 'duong891109@gmail.com', '0000-00-00 00:00:00'),
(120, 'eeafhsdkjfh', 'stu@stu', 'duong891109@gmail.com', '2022-05-05 15:18:31'),
(121, 'Hi stu', 'tea@tea', 'stu@stu', '2022-05-08 10:59:31'),
(122, 'Dạ em nghe', 'stu@stu', 'tea@tea', '2022-05-08 10:59:38'),
(123, 'alo', 'tea@tea', 'ANM2', '2022-05-08 11:42:26'),
(124, 'dạ nghe ạ', 'stu@stu', 'ANM2', '2022-05-08 11:42:35'),
(125, 'hi', 'tea@tea', 'stu@stu', '2022-05-08 11:43:11'),
(126, 'hello', 'stu@stu', 'ANM3', '2022-05-08 13:53:50'),
(127, 'Em ch&agrave;o c&ocirc; ạ!', 'stu@stu', 'tea@tea', '2022-05-08 21:16:29'),
(128, 'Ch&agrave;o buổi tối em!', 'tea@tea', 'stu@stu', '2022-05-08 21:16:50'),
(129, 'Ch&agrave;o cả lớp!', 'stu@stu', 'Bảo mật web', '2022-05-08 21:17:07'),
(130, 'C&ocirc; ch&agrave;o cả lớp', 'tea@tea', 'Bảo mật web', '2022-05-08 21:17:29'),
(131, 'ch&agrave;o cả nh&agrave;!!', 'stu@stu', 'ANM', '2022-05-08 21:53:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id_post` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id_post`, `title`, `content`, `date`) VALUES
(1, 'Post thứ nhất của nhóm ANM', 'An ninh mạng (cybersecurity), an ninh máy tính (computer security), bảo mật công nghệ thông tin (IT security) là việc bảo vệ hệ thống mạng máy tính khỏi các hành vi trộm cắp hoặc làm tổn hại đến phần cứng, phần mềm và các dữ liệu, cũng như các nguyên nhân dẫn đến sự gián đoạn, chuyển lệch hướng của các dịch vụ hiện đang được được cung cấp.[1]\n\nAn ninh mạng là thực tiễn của việc bảo vệ các hệ thống điện tử, mạng lưới, máy tính, thiết bị di động, chương trình và dữ liệu khỏi những cuộc tấn công kỹ thuật số độc hại có chủ đích. Tội phạm mạng có thể triển khai một loạt các cuộc tấn công chống lại các nạn nhân hoặc doanh nghiệp đơn lẻ; có thể kể đến như truy cập, làm thay đổi hoặc xóa bỏ dữ liệu nhạy cảm; tống tiền; can thiệp vào các quy trình kinh doanh.', '2022-04-19 06:29:48'),
(2, 'Post thứ hai của nhóm ANM', 'An ninh mạng máy tính bao gồm việc kiểm soát truy cập vật lý đến phần cứng, cũng như bảo vệ chống lại tác hại có thể xảy ra qua truy cập mạng máy tính, cơ sở dữ liệu (SQL injection) và việc lợi dụng lỗ hổng phần mềm (code injection).[2] Do sai lầm của những người điều hành, dù cố ý hoặc do bất cẩn, an ninh công nghệ thông tin có thể bị lừa đảo phi kỹ thuật để vượt qua các thủ tục an toàn thông qua các phương pháp khác nhau.[3]\n\nAn ninh mạng hoạt động thông qua một cơ sở hạ tầng chặt chẽ, được chia thành ba phần chính: bảo mật công nghệ thông tin, an ninh mạng và an ninh máy tính.\n\nBảo mật công nghệ thông tin (với cách gọi khác là bảo mật thông tin điện tử): Bảo vệ dữ liệu ở nơi chúng được lưu trữ và cả khi các dữ liệu này di chuyển trên các mạng lưới thông tin. Trong khi an ninh mạng chỉ bảo vệ dữ liệu số, bảo mật công nghệ thông tin nắm trong tay trọng trách bảo vệ cả dữ liệu kỹ thuật số lẫn dữ liệu vật lý khỏi những kẻ xâm nhập trái phép.\nAn ninh mạng: Là một tập hợp con của bảo mật công nghệ thông tin. An ninh mạng thực hiện nhiệm vụ đảm bảo dữ liệu kỹ thuật số trên các mạng lưới, máy tính và thiết bị cá nhân nằm ngoài sự truy cập, tấn công và phá hủy bất hợp pháp.\nAn ninh máy tính: Là một tập hợp con của an ninh mạng. Loại bảo mật này sử dụng phần cứng và phần mềm để bảo vệ bất kỳ dữ liệu nào được gửi từ máy tính cá nhân hoặc các thiết bị khác đến hệ thống mạng lưới thông tin. An ninh máy tính thực hiện chức năng bảo vệ cơ sở hạ tầng công nghệ thông tin và chống lại các dữ liệu bị chặn, bị thay đổi hoặc đánh cắp bởi tội phạm mạng.', '2022-04-19 06:31:12'),
(3, 'Post thứ ba của nhóm ANM', 'Lĩnh vực này dần trở nên quan trọng do sự phụ thuộc ngày càng nhiều vào các hệ thống máy tính và Internet tại các quốc gia,[4] cũng như sự phụ thuộc vào hệ thống mạng không dây như Bluetooth, Wi-Fi, cùng với sự phát triển của các thiết bị \"thông minh\", bao gồm điện thoại thông minh, TV và các thiết bị khác kết nối vào hệ thống Internet of Things.\r\n\r\nNhân sự làm việc trong mảng an ninh mạng có thể được chia thành 3 dạng sau:\r\n\r\nHacker mũ trắng (White-hat hacker) [5] – cũng còn gọi là \"ethical hacker\" (hacker có nguyên tắc/đạo đức) hay penetration tester (người xâm nhập thử nghiệm vào hệ thống). Hacker mũ trắng là những chuyên gia công nghệ làm nhiệm vụ xâm nhập thử nghiệm vào hệ thống công nghệ thông tin để tìm ra lỗ hổng, từ đó yêu cầu người chủ hệ thống phải vá lỗi hệ thống để phòng ngừa các xâm nhập khác sau này với ý đồ xấu (thường là của các hacker mũ đen).[6]\r\nHacker mũ đen (Black-hat hacker): là các chuyên gia công nghệ xâm nhập vào hệ thống với mục đích xấu như đánh cắp thông tin, phá hủy hệ thống, làm lây nhiễm các phần mềm độc hại cũng như các hành vị phá hoại mạng máy tính vi phạm pháp luật khác.[7]\r\nHacker mũ xám (Grey-hat hacker): là các chuyên gia công nghệ có thể vừa làm công nghệ của cả hacker mũ trắng và mũ xám.[8]', '2022-04-19 06:31:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_class`
--

CREATE TABLE `post_class` (
  `id_post_r` int(10) NOT NULL,
  `id_class_r` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post_class`
--

INSERT INTO `post_class` (`id_post_r`, `id_class_r`) VALUES
(1, 9),
(2, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relation`
--

CREATE TABLE `relation` (
  `id` int(3) NOT NULL,
  `r_from` varchar(50) NOT NULL,
  `r_to` varchar(50) NOT NULL,
  `request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `relation`
--

INSERT INTO `relation` (`id`, `r_from`, `r_to`, `request`) VALUES
(24, 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', 0),
(27, '4@4', 'luanlt632000@gmail.com', 0),
(28, '2@2', 'luanlt632000@gmail.com', 0),
(29, '2@2', 'luanb1807573@student.ctu.edu.vn', 0),
(31, 'luanlt632000@gmail.com', '1@1', 1),
(32, 'duong891109@gmail.com', 'stu@stu', 0),
(33, 'duong891109@gmail.com', 'tea@tea', 0),
(35, 'stu@stu', 'duong891109@gmail.com', 1),
(39, 'stu@stu', 'tea@tea', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id_room` int(5) NOT NULL,
  `date_create` datetime NOT NULL,
  `name_room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id_room`, `date_create`, `name_room`) VALUES
(1, '2022-03-24 08:12:14', ''),
(2, '2022-03-24 08:12:32', ''),
(3, '2022-03-24 08:41:50', 'luanlt632000@gmail.comj2'),
(4, '2022-03-24 08:47:44', '2luanlt632000@gmail.com'),
(5, '2022-03-24 15:22:12', 'luanlt632000@gmail.com2'),
(7, '2022-03-24 15:24:40', 'luanlt632000@gmail.com2'),
(13, '2022-03-24 09:32:01', 'luanb1807573@student.ctu.edu.vnluanlt632000@gmail.com'),
(14, '2022-04-10 18:47:00', '2'),
(16, '2022-04-10 21:00:22', '2@2luanlt632000@gmail.com'),
(17, '2022-04-10 21:06:28', '4@4luanlt632000@gmail.com'),
(18, '2022-04-11 18:49:10', 'luanlt632000@gmail.com'),
(20, '2022-04-13 07:41:10', 'ANM'),
(22, '2022-04-13 12:53:33', 'luanb1807573@student.ctu.edu.vn2@2'),
(23, '2022-04-13 15:24:21', 'luanlt632000@gmail.com1@1'),
(33, '2022-04-13 20:43:33', 'luanlt632000@gmail.com4@4'),
(34, '2022-04-13 20:43:52', 'luanlt632000@gmail.comluanb1807573@student.ctu.edu.vn'),
(35, '2022-04-13 20:44:01', 'luanlt632000@gmail.com2@2'),
(36, '2022-04-13 20:46:25', '2@21'),
(37, '2022-04-29 16:22:01', 'LAPTRINHMANG'),
(38, '2022-04-29 21:28:27', 'duong891109@gmail.comstu@stu'),
(39, '2022-04-30 09:08:29', 'Niên luận ngành'),
(40, '2022-04-30 09:15:40', 'Niên Luận Ngành'),
(41, '2022-04-30 14:30:29', 'duong891109@gmail.comtea@tea'),
(42, '2022-05-01 10:25:59', 'ANM'),
(43, '2022-05-01 10:26:38', 'ANM3'),
(44, '2022-05-01 05:26:58', '123'),
(45, '2022-05-01 05:29:09', '123'),
(46, '2022-05-01 05:39:26', '54'),
(47, '2022-05-01 05:39:46', '111'),
(48, '2022-05-01 05:46:52', '222'),
(49, '2022-05-01 05:49:10', '1123'),
(50, '2022-05-01 05:54:05', 'DASD'),
(51, '2022-05-08 10:42:41', 'Đường lối 2'),
(52, '2022-05-08 10:59:04', 'tea@teastu@stu'),
(53, '2022-05-08 20:49:41', 'Bảo mật web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_chat`
--

CREATE TABLE `room_chat` (
  `id_user` int(10) NOT NULL,
  `id_room` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submissions`
--

CREATE TABLE `submissions` (
  `id_sub` int(10) NOT NULL,
  `file_sub` varchar(200) NOT NULL,
  `email_sub` varchar(100) NOT NULL,
  `score` int(3) NOT NULL,
  `date_sub` datetime NOT NULL,
  `id_ex_r` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `submissions`
--

INSERT INTO `submissions` (`id_sub`, `file_sub`, `email_sub`, `score`, `date_sub`, `id_ex_r`) VALUES
(1, 'D:\\\\vidu\\\\a.pdf', 'luanlt632000@gmail.com', 0, '2022-04-20 22:05:07', 0),
(2, 'E:\\\\sdfsd\\\\sdfsdg', 'luanlt632000@gmail.com', 0, '2022-04-20 22:12:41', 0),
(3, 'C:\\\\aaaa\\\\bbbb', 'abc@gmail', 0, '2022-04-20 22:15:13', 0),
(69, 'B1807573_Cau1.jpg', 'stu@stu', 100, '2022-05-07 15:03:43', 44),
(70, 'B1807573_Cau2.jpg', 'stu@stu', 10, '2022-05-07 15:03:43', 44),
(71, 'B1807573_Cau3.jpg', 'stu@stu', 70, '2022-05-07 15:03:43', 44),
(72, 'CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', 'duong891109@gmail.com', 0, '2022-05-07 15:24:04', 44),
(73, 'DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', 'duong891109@gmail.com', 40, '2022-05-07 15:24:04', 44),
(74, 'Text.txt', 'stu@stu', 80, '2022-05-07 18:03:17', 45),
(75, 'thông tin cty thực tập.xlsx', 'stu@stu', 100, '2022-05-07 18:03:17', 45),
(76, 'login.sql', 'stu@stu', 60, '2022-05-07 18:20:41', 46),
(77, 'New Text Document.txt', 'stu@stu', 50, '2022-05-07 18:20:41', 46),
(78, 'Nhap danh sach hoc sinh ngoai tinh .xlsx', 'stu@stu', 100, '2022-05-07 18:20:41', 46),
(79, 'Nhap danh sach hoc sinh ngoai tinh .xlsx', 'stu@stu', 80, '2022-05-08 10:52:58', 47),
(80, 'Text.txt', 'stu@stu', 90, '2022-05-08 10:52:58', 47),
(83, 'CT31101_39_B1807573_LeTanLuan_DanhGiaNhaKhoaHoc.docx', 'stu@stu', 80, '2022-05-08 21:13:38', 49),
(84, 'DSSV TTTT - theo từng đơn vị - in 22-06-2021.pdf', 'stu@stu', 60, '2022-05-08 21:13:38', 49);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `permission` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `permission`) VALUES
(15, 'ADMIN', 'admin@admin', '0ed148b1c278a612c14e588d11afe430', '', 2),
(16, 'Student1', 'stu@stu', 'ac729dc6aa95619703be0778813ee43d', '', 0),
(17, 'Giáo viên 1', 'tea@tea', 'd1420a8a81b9e56b259f4723b4762cbd', '', 1),
(29, 'Duong Test', 'duong891109@gmail.com', 'a5ec448a90582a699e5937436d5e286b', '', 0),
(33, 'Giáo viên 2', 'luanlt632000@gmail.com', 'd1420a8a81b9e56b259f4723b4762cbd', '', 1),
(35, 'Phi Duong', 'duongbd67@gmail.com', '039bad0d2bd2a2341c63ee45d4737c53', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Chỉ mục cho bảng `class_user`
--
ALTER TABLE `class_user`
  ADD KEY `classes` (`id_class`),
  ADD KEY `users` (`id_user`);

--
-- Chỉ mục cho bảng `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id_ex`);

--
-- Chỉ mục cho bảng `ex_class`
--
ALTER TABLE `ex_class`
  ADD KEY `id_ex` (`id_ex_r`),
  ADD KEY `id_clas` (`id_class_r`);

--
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Chỉ mục cho bảng `file_exercise`
--
ALTER TABLE `file_exercise`
  ADD KEY `id_exercise` (`id_exercise`),
  ADD KEY `id_file_exercise` (`id_file_exercise`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `post_class`
--
ALTER TABLE `post_class`
  ADD KEY `id_post_r` (`id_post_r`),
  ADD KEY `id_class_r` (`id_class_r`);

--
-- Chỉ mục cho bảng `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Chỉ mục cho bảng `room_chat`
--
ALTER TABLE `room_chat`
  ADD KEY `user` (`id_user`),
  ADD KEY `room` (`id_room`);

--
-- Chỉ mục cho bảng `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id_sub`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id_ex` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id_sub` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class_user`
--
ALTER TABLE `class_user`
  ADD CONSTRAINT `classes` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `ex_class`
--
ALTER TABLE `ex_class`
  ADD CONSTRAINT `id_clas` FOREIGN KEY (`id_class_r`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `id_ex` FOREIGN KEY (`id_ex_r`) REFERENCES `exercise` (`id_ex`);

--
-- Các ràng buộc cho bảng `file_exercise`
--
ALTER TABLE `file_exercise`
  ADD CONSTRAINT `id_exercise` FOREIGN KEY (`id_exercise`) REFERENCES `exercise` (`id_ex`),
  ADD CONSTRAINT `id_file_exercise` FOREIGN KEY (`id_file_exercise`) REFERENCES `file` (`id_file`);

--
-- Các ràng buộc cho bảng `post_class`
--
ALTER TABLE `post_class`
  ADD CONSTRAINT `id_class_r` FOREIGN KEY (`id_class_r`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `id_post_r` FOREIGN KEY (`id_post_r`) REFERENCES `post` (`id_post`);

--
-- Các ràng buộc cho bảng `room_chat`
--
ALTER TABLE `room_chat`
  ADD CONSTRAINT `room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
