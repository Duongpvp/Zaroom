-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 09:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id_class` int(3) NOT NULL,
  `name_class` varchar(30) NOT NULL,
  `time` datetime NOT NULL,
  `code` varchar(6) NOT NULL,
  `teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `name_class`, `time`, `code`, `teacher`) VALUES
(1, '1', '2022-03-18 02:49:16', '2', ''),
(2, 'ATHT', '2022-03-18 02:49:55', '123', ''),
(3, 'ANM', '2022-03-18 02:49:55', '321', ''),
(4, '4', '2022-03-18 02:50:16', '111', ''),
(5, 'LTW', '2022-03-18 02:50:16', '222', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_user`
--

CREATE TABLE `class_user` (
  `id_class` int(3) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_user`
--

INSERT INTO `class_user` (`id_class`, `id_user`) VALUES
(5, 11),
(1, 12),
(3, 12),
(1, 13),
(4, 13),
(5, 14),
(2, 14),
(1, 11),
(4, 11),
(3, 8),
(3, 14),
(2, 8),
(4, 8),
(5, 8),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id_ex` int(10) NOT NULL,
  `title_ex` varchar(100) NOT NULL,
  `content_ex` varchar(1000) NOT NULL,
  `file_ex` varchar(500) NOT NULL,
  `date_ex` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id_ex`, `title_ex`, `content_ex`, `file_ex`, `date_ex`) VALUES
(1, 'Post thứ nhất của nhóm ANM', 'An ninh mạng (cybersecurity), an ninh máy tính (computer security), bảo mật công nghệ thông tin (IT security) là việc bảo vệ hệ thống mạng máy tính khỏi các hành vi trộm cắp hoặc làm tổn hại đến phần cứng, phần mềm và các dữ liệu, cũng như các nguyên nhân dẫn đến sự gián đoạn, chuyển lệch hướng của các dịch vụ hiện đang được được cung cấp.[1]\r\n\r\nAn ninh mạng là thực tiễn của việc bảo vệ các hệ thống điện tử, mạng lưới, máy tính, thiết bị di động, chương trình và dữ liệu khỏi những cuộc tấn công kỹ thuật số độc hại có chủ đích. Tội phạm mạng có thể triển khai một loạt các cuộc tấn công chống lại các nạn nhân hoặc doanh nghiệp đơn lẻ; có thể kể đến như truy cập, làm thay đổi hoặc xóa bỏ dữ liệu nhạy cảm; tống tiền; can thiệp vào các quy trình kinh doanh.', '', '2022-04-20 21:07:25'),
(2, 'Post thứ hai của nhóm ANM', 'An ninh mạng máy tính bao gồm việc kiểm soát truy cập vật lý đến phần cứng, cũng như bảo vệ chống lại tác hại có thể xảy ra qua truy cập mạng máy tính, cơ sở dữ liệu (SQL injection) và việc lợi dụng lỗ hổng phần mềm (code injection).[2] Do sai lầm của những người điều hành, dù cố ý hoặc do bất cẩn, an ninh công nghệ thông tin có thể bị lừa đảo phi kỹ thuật để vượt qua các thủ tục an toàn thông qua các phương pháp khác nhau.[3]\r\n\r\nAn ninh mạng hoạt động thông qua một cơ sở hạ tầng chặt chẽ, được chia thành ba phần chính: bảo mật công nghệ thông tin, an ninh mạng và an ninh máy tính.\r\n\r\nBảo mật công nghệ thông tin (với cách gọi khác là bảo mật thông tin điện tử): Bảo vệ dữ liệu ở nơi chúng được lưu trữ và cả khi các dữ liệu này di chuyển trên các mạng lưới thông tin. Trong khi an ninh mạng chỉ bảo vệ dữ liệu số, bảo mật công nghệ thông tin nắm trong tay trọng trách bảo vệ cả dữ liệu kỹ thuật số lẫn dữ liệu vật lý khỏi những kẻ xâm nhập trái phép.\r\nAn ninh mạng: Là một tập hợp con của bảo', '', '2022-04-20 21:07:25'),
(3, 'Post thứ ba của nhóm ANM', 'Lĩnh vực này dần trở nên quan trọng do sự phụ thuộc ngày càng nhiều vào các hệ thống máy tính và Internet tại các quốc gia,[4] cũng như sự phụ thuộc vào hệ thống mạng không dây như Bluetooth, Wi-Fi, cùng với sự phát triển của các thiết bị \"thông minh\", bao gồm điện thoại thông minh, TV và các thiết bị khác kết nối vào hệ thống Internet of Things.\r\n\r\nNhân sự làm việc trong mảng an ninh mạng có thể được chia thành 3 dạng sau:\r\n\r\nHacker mũ trắng (White-hat hacker) [5] – cũng còn gọi là \"ethical hacker\" (hacker có nguyên tắc/đạo đức) hay penetration tester (người xâm nhập thử nghiệm vào hệ thống). Hacker mũ trắng là những chuyên gia công nghệ làm nhiệm vụ xâm nhập thử nghiệm vào hệ thống công nghệ thông tin để tìm ra lỗ hổng, từ đó yêu cầu người chủ hệ thống phải vá lỗi hệ thống để phòng ngừa các xâm nhập khác sau này với ý đồ xấu (thường là của các hacker mũ đen).[6]\r\nHacker mũ đen (Black-hat hacker): là các chuyên gia công nghệ xâm nhập vào hệ thống với mục đích xấu như đánh cắp thông ti', '', '2022-04-20 21:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `ex_class`
--

CREATE TABLE `ex_class` (
  `id_ex_r` int(3) NOT NULL,
  `id_class_r` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ex_class`
--

INSERT INTO `ex_class` (`id_ex_r`, `id_class_r`) VALUES
(1, 3),
(2, 3),
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ex_sub`
--

CREATE TABLE `ex_sub` (
  `id_ex_r` int(10) NOT NULL,
  `id_sub_r` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(3) NOT NULL,
  `body` longtext NOT NULL,
  `user_from` varchar(100) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
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
(82, 'hjkfsd', 'luanlt632000@gmail.com', '2@2', '2022-04-15 13:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `title`, `content`, `date`) VALUES
(1, 'Post thứ nhất của nhóm ANM', 'An ninh mạng (cybersecurity), an ninh máy tính (computer security), bảo mật công nghệ thông tin (IT security) là việc bảo vệ hệ thống mạng máy tính khỏi các hành vi trộm cắp hoặc làm tổn hại đến phần cứng, phần mềm và các dữ liệu, cũng như các nguyên nhân dẫn đến sự gián đoạn, chuyển lệch hướng của các dịch vụ hiện đang được được cung cấp.[1]\n\nAn ninh mạng là thực tiễn của việc bảo vệ các hệ thống điện tử, mạng lưới, máy tính, thiết bị di động, chương trình và dữ liệu khỏi những cuộc tấn công kỹ thuật số độc hại có chủ đích. Tội phạm mạng có thể triển khai một loạt các cuộc tấn công chống lại các nạn nhân hoặc doanh nghiệp đơn lẻ; có thể kể đến như truy cập, làm thay đổi hoặc xóa bỏ dữ liệu nhạy cảm; tống tiền; can thiệp vào các quy trình kinh doanh.', '2022-04-19 06:29:48'),
(2, 'Post thứ hai của nhóm ANM', 'An ninh mạng máy tính bao gồm việc kiểm soát truy cập vật lý đến phần cứng, cũng như bảo vệ chống lại tác hại có thể xảy ra qua truy cập mạng máy tính, cơ sở dữ liệu (SQL injection) và việc lợi dụng lỗ hổng phần mềm (code injection).[2] Do sai lầm của những người điều hành, dù cố ý hoặc do bất cẩn, an ninh công nghệ thông tin có thể bị lừa đảo phi kỹ thuật để vượt qua các thủ tục an toàn thông qua các phương pháp khác nhau.[3]\n\nAn ninh mạng hoạt động thông qua một cơ sở hạ tầng chặt chẽ, được chia thành ba phần chính: bảo mật công nghệ thông tin, an ninh mạng và an ninh máy tính.\n\nBảo mật công nghệ thông tin (với cách gọi khác là bảo mật thông tin điện tử): Bảo vệ dữ liệu ở nơi chúng được lưu trữ và cả khi các dữ liệu này di chuyển trên các mạng lưới thông tin. Trong khi an ninh mạng chỉ bảo vệ dữ liệu số, bảo mật công nghệ thông tin nắm trong tay trọng trách bảo vệ cả dữ liệu kỹ thuật số lẫn dữ liệu vật lý khỏi những kẻ xâm nhập trái phép.\nAn ninh mạng: Là một tập hợp con của bảo mật công nghệ thông tin. An ninh mạng thực hiện nhiệm vụ đảm bảo dữ liệu kỹ thuật số trên các mạng lưới, máy tính và thiết bị cá nhân nằm ngoài sự truy cập, tấn công và phá hủy bất hợp pháp.\nAn ninh máy tính: Là một tập hợp con của an ninh mạng. Loại bảo mật này sử dụng phần cứng và phần mềm để bảo vệ bất kỳ dữ liệu nào được gửi từ máy tính cá nhân hoặc các thiết bị khác đến hệ thống mạng lưới thông tin. An ninh máy tính thực hiện chức năng bảo vệ cơ sở hạ tầng công nghệ thông tin và chống lại các dữ liệu bị chặn, bị thay đổi hoặc đánh cắp bởi tội phạm mạng.', '2022-04-19 06:31:12'),
(3, 'Post thứ ba của nhóm ANM', 'Lĩnh vực này dần trở nên quan trọng do sự phụ thuộc ngày càng nhiều vào các hệ thống máy tính và Internet tại các quốc gia,[4] cũng như sự phụ thuộc vào hệ thống mạng không dây như Bluetooth, Wi-Fi, cùng với sự phát triển của các thiết bị \"thông minh\", bao gồm điện thoại thông minh, TV và các thiết bị khác kết nối vào hệ thống Internet of Things.\r\n\r\nNhân sự làm việc trong mảng an ninh mạng có thể được chia thành 3 dạng sau:\r\n\r\nHacker mũ trắng (White-hat hacker) [5] – cũng còn gọi là \"ethical hacker\" (hacker có nguyên tắc/đạo đức) hay penetration tester (người xâm nhập thử nghiệm vào hệ thống). Hacker mũ trắng là những chuyên gia công nghệ làm nhiệm vụ xâm nhập thử nghiệm vào hệ thống công nghệ thông tin để tìm ra lỗ hổng, từ đó yêu cầu người chủ hệ thống phải vá lỗi hệ thống để phòng ngừa các xâm nhập khác sau này với ý đồ xấu (thường là của các hacker mũ đen).[6]\r\nHacker mũ đen (Black-hat hacker): là các chuyên gia công nghệ xâm nhập vào hệ thống với mục đích xấu như đánh cắp thông tin, phá hủy hệ thống, làm lây nhiễm các phần mềm độc hại cũng như các hành vị phá hoại mạng máy tính vi phạm pháp luật khác.[7]\r\nHacker mũ xám (Grey-hat hacker): là các chuyên gia công nghệ có thể vừa làm công nghệ của cả hacker mũ trắng và mũ xám.[8]', '2022-04-19 06:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(3) NOT NULL,
  `r_from` varchar(50) NOT NULL,
  `r_to` varchar(50) NOT NULL,
  `request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `r_from`, `r_to`, `request`) VALUES
(24, 'luanlt632000@gmail.com', 'luanb1807573@student.ctu.edu.vn', 0),
(27, '4@4', 'luanlt632000@gmail.com', 0),
(28, '2@2', 'luanlt632000@gmail.com', 0),
(29, '2@2', 'luanb1807573@student.ctu.edu.vn', 0),
(31, 'luanlt632000@gmail.com', '1@1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(5) NOT NULL,
  `date_create` datetime NOT NULL,
  `name_room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
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
(36, '2022-04-13 20:46:25', '2@21');

-- --------------------------------------------------------

--
-- Table structure for table `room_chat`
--

CREATE TABLE `room_chat` (
  `id_user` int(10) NOT NULL,
  `id_room` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_chat`
--

INSERT INTO `room_chat` (`id_user`, `id_room`) VALUES
(8, 13),
(10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id_sub` int(10) NOT NULL,
  `file_sub` varchar(200) NOT NULL,
  `email_sub` varchar(100) NOT NULL,
  `score` int(3) NOT NULL,
  `date_sub` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `permission`) VALUES
(8, 'Luan', 'luanlt632000@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 1),
(10, 'ád', 'luanb1807573@student.ctu.edu.vn', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(11, '1', '1@1', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(12, 'admin', '2@2', 'c4ca4238a0b923820dcc509a6f75849b', '', 2),
(13, '3', '3', '', '', 0),
(14, '4', '4@4', 'c4ca4238a0b923820dcc509a6f75849b', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `class_user`
--
ALTER TABLE `class_user`
  ADD KEY `classes` (`id_class`),
  ADD KEY `users` (`id_user`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id_ex`);

--
-- Indexes for table `ex_class`
--
ALTER TABLE `ex_class`
  ADD KEY `id_ex` (`id_ex_r`),
  ADD KEY `id_clas` (`id_class_r`);

--
-- Indexes for table `ex_sub`
--
ALTER TABLE `ex_sub`
  ADD KEY `ex` (`id_ex_r`),
  ADD KEY `sub` (`id_sub_r`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `room_chat`
--
ALTER TABLE `room_chat`
  ADD KEY `user` (`id_user`),
  ADD KEY `room` (`id_room`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id_ex` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id_sub` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_user`
--
ALTER TABLE `class_user`
  ADD CONSTRAINT `classes` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `ex_class`
--
ALTER TABLE `ex_class`
  ADD CONSTRAINT `id_clas` FOREIGN KEY (`id_class_r`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `id_ex` FOREIGN KEY (`id_ex_r`) REFERENCES `exercise` (`id_ex`);

--
-- Constraints for table `ex_sub`
--
ALTER TABLE `ex_sub`
  ADD CONSTRAINT `ex` FOREIGN KEY (`id_ex_r`) REFERENCES `exercise` (`id_ex`),
  ADD CONSTRAINT `sub` FOREIGN KEY (`id_sub_r`) REFERENCES `submissions` (`id_sub`);

--
-- Constraints for table `room_chat`
--
ALTER TABLE `room_chat`
  ADD CONSTRAINT `room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
