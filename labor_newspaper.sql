-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 07, 2022 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.3.37-MariaDB-cll-lve
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tabaphu_labor_newspaper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `business_information`
--

CREATE TABLE `business_information` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_journalist` int(11) DEFAULT NULL,
  `ID_category` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Images` varchar(255) DEFAULT NULL,
  `Date_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `business_information`
--

INSERT INTO `business_information` (`ID`, `ID_journalist`, `ID_category`, `Title`, `Content`, `Avatar`, `Images`, `Date_post`) VALUES
(1, NULL, NULL, 'Founder Hush & Hush tham gia sự kiện ra mắt bộ 3 sản phẩm DeeplyRooted', NULL, 'thongtindoanhnghiep5.jpg', NULL, '2022-09-12 07:40:41'),
(2, NULL, NULL, 'Chọn trang phục Golf “đa năng” để hoàn thiện phong cách cho người bận rộn', NULL, 'thongtindoanhnghiep4.jpg', NULL, '2022-09-12 07:41:09'),
(3, NULL, NULL, 'Cập nhật giá đơn vị quỹ Prulink của Prudential Việt Nam', NULL, 'thongtindoanhnghiep3.jpg', NULL, '2022-09-12 07:41:21'),
(4, NULL, NULL, 'Hơn 1000 người tham gia sự kiện \"Dai-ichi Life -Cung Đường Yêu Thương 2022\"', NULL, 'thongtindoanhnghiep2.jpg', NULL, '2022-09-12 07:41:43'),
(5, NULL, NULL, 'Hành trình lên \"số 1\" của VinShop và mục tiêu số hóa 1,4 triệu tạp hóa VN', NULL, 'thongtindoanhnghiep1.jpg', NULL, '2022-09-12 07:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `Name`) VALUES
(1, 'Thời sự'),
(2, 'Xã hội'),
(3, 'Công đoàn'),
(4, 'Thế giới'),
(5, 'Kinh doanh'),
(6, 'Văn hóa - Giải trí'),
(7, 'Thể thao'),
(8, 'Bạn đọc'),
(9, 'Bất động sản'),
(10, 'Pháp luật'),
(11, 'Giáo dục'),
(12, 'Xe +'),
(13, 'Sức khỏe'),
(14, 'Gia đình - Hôn nhân'),
(15, 'Công nghệ'),
(16, 'Tấm lòng vàng'),
(17, 'Công đoàn Việt Nam'),
(18, 'Dân tộc & Tôn giáo'),
(19, 'Du lịch'),
(20, 'Lao động trẻ'),
(21, 'THÔNG TIN DOANH NGHIỆP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_post` int(11) DEFAULT NULL,
  `ID_comment_parent` int(11) DEFAULT NULL,
  `Main` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`ID`, `ID_user`, `ID_post`, `ID_comment_parent`, `Main`, `Date`) VALUES
(1, 90, 2, 0, 'Hay quá', '2022-10-25 03:05:58'),
(2, 90, 2, 1, 'Dở ẹtt', '2022-10-25 03:05:58'),
(3, 91, 1, 0, 'Đẹp quá', '2022-10-25 04:30:43'),
(4, 91, 1, 0, 'Tuyệt vời', '2022-10-25 04:30:59'),
(5, 93, 1, 4, 'Đống ý', '2022-10-27 04:24:28'),
(6, 93, 1, 4, 'Đống ý', '2022-10-27 03:39:30'),
(7, 93, 1, 4, 'Sai rồi', '2022-10-27 03:11:36'),
(8, 90, 1, 0, 'Tân ngu', '2022-10-28 03:01:59'),
(9, 93, 1, 8, 'Tân ngu quá mà', '2022-10-28 03:01:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data`
--

CREATE TABLE `data` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `data`
--

INSERT INTO `data` (`ID`, `Name`, `Email`, `Image`, `Video`) VALUES
(8, 'Phú', 'tabaphu0@gmail.com', './images/4.jpg', './videos/1.mp4'),
(10, 'Phú', 'tanngu@gmail.com', './images/1.jpg', './videos/2.mp4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_advertisement`
--

CREATE TABLE `images_advertisement` (
  `ID` int(11) NOT NULL,
  `Name_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `images_advertisement`
--

INSERT INTO `images_advertisement` (`ID`, `Name_image`) VALUES
(1, '1.jpg'),
(2, '2.gif'),
(3, '3.jpg'),
(4, '4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_header_and_footer`
--

CREATE TABLE `images_header_and_footer` (
  `ID` int(11) NOT NULL,
  `Name_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `images_header_and_footer`
--

INSERT INTO `images_header_and_footer` (`ID`, `Name_image`) VALUES
(1, 'logotitle.png'),
(2, 'logolaodong.png'),
(3, 'logolaodongtv.png'),
(4, 'logodulich+.png'),
(5, 'logocongdoanvietnam.png'),
(6, 'logodantoctongiao.png'),
(7, 'logolaodongtre.png'),
(8, 'logofacebook.jpg'),
(9, 'logotwitter.jpg'),
(10, 'logoyoutube.jpg'),
(11, 'logomess.jpg'),
(12, 'logorss.jpg'),
(13, 'logogoogleplay.png'),
(14, 'logoappstore.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `journalist`
--

CREATE TABLE `journalist` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Pass_word` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `journalist`
--

INSERT INTO `journalist` (`ID`, `Name`, `Email`, `Pass_word`) VALUES
(1, 'Tạ Bá Phú', 'tabaphu0@gmail.com', NULL),
(2, 'Đoàn Trương Ngọc Tân', 'doantruongngoctan@gmail.com', NULL),
(3, 'Nguyễn Hữu Tín', 'nguyenhuutin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `ID` int(11) UNSIGNED NOT NULL,
  `ID_journalist` int(11) DEFAULT NULL,
  `ID_category` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Images` varchar(255) DEFAULT NULL,
  `Date_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`ID`, `ID_journalist`, `ID_category`, `Title`, `Content`, `Avatar`, `Images`, `Date_post`) VALUES
(1, 1, 1, 'Làm gì để xử lý tình trạng tín dụng đen bủa vây công nhân, khu công nghiệp?', NULL, 'thoisu5.jpg', NULL, '2022-09-12 03:40:29'),
(2, 1, 1, 'Việt Nam tăng cường khả năng quốc phòng để bảo vệ Tổ quốc và hoà bình', NULL, 'thoisu4.jpg', NULL, '2022-09-12 03:40:30'),
(3, 1, 1, 'Đại biểu Quốc hội dẫn phản ánh của Báo Lao Động về những \"đơn thuốc đắt đỏ\"', NULL, 'thoisu3.jpg', NULL, '2022-09-12 03:40:31'),
(4, 1, 1, 'Điện Biên thành lập Ban Chỉ đạo phòng chống tham nhũng, tiêu cực', NULL, 'thoisu2.jpg', NULL, '2022-09-12 03:40:32'),
(5, 1, 1, 'Phải quản lý giá dịch vụ y tế của cả bệnh viện công và bệnh viện tư', 'Phó Thủ tướng Vũ Đức Đam nêu rõ chắc chắn phải quản lý giá dịch vụ y tế dù rằng là bệnh viện công hay bệnh viện tư. Không buông lỏng...', 'thoisu1.jpg', NULL, '2022-09-12 03:40:33'),
(6, 1, 2, 'Nhiều quận huyện ở TPHCM sẽ bị cúp nước vào cuối tuần', NULL, 'xahoi5.jpg', NULL, '2022-09-12 03:40:29'),
(7, 1, 2, 'Nữ sinh 16 tuổi mất liên lạc khi vào TPHCM tìm việc đã gọi điện về gia đình', NULL, 'xahoi4.jpg', NULL, '2022-09-12 03:40:30'),
(8, 1, 2, 'Liên tiếp trẻ nhập viện vì tai nạn thương tích trong mùa hè', NULL, 'xahoi3.jpg', NULL, '2022-09-12 03:40:31'),
(9, 1, 2, 'Hà Nội thành lập đoàn kiểm tra, xử lý vi phạm về tải trọng', NULL, 'xahoi2.jpg', NULL, '2022-09-12 03:40:32'),
(10, 1, 2, 'Cao Bằng: Mưa diện rộng gây thiệt hại lớn về tài sản, 1 người tử vong', 'Cao Bằng - Mưa lớn trên địa bàn tỉnh gây thiệt hại lớn về tài sản, hoa màu cùng các công trình giao thông, mưa lũ cũng đã khiến 1...', 'xahoi1.jpg', NULL, '2022-09-12 03:40:33'),
(11, 1, 3, 'Lương tăng mong giá cả đừng tăng', NULL, 'congdoan5.jpg', NULL, '2022-09-12 03:40:29'),
(12, 1, 3, 'Gỡ vướng để đẩy nhanh tiến độ triển khai hỗ trợ tiền thuê nhà trọ', NULL, 'congdoan4.jpg', NULL, '2022-09-12 03:40:30'),
(13, 1, 3, 'Công nhân phản ánh doanh nghiệp còn nợ lương, nợ bảo hiểm xã hội', NULL, 'congdoan3.jpg', NULL, '2022-09-12 03:40:31'),
(14, 1, 3, 'Công nhân xúc động vì được nhận quà từ Thủ tướng', NULL, 'congdoan2.jpg', NULL, '2022-09-12 03:40:32'),
(15, 1, 3, 'Công đoàn PV Drilling kiểm tra công tác an toàn vệ sinh lao động', 'Đại biểu Quốc hội Nguyễn Công Long cho rằng: \"Chúng ta thử hình dung, một bác sĩ bước vào phòng mổ thay vì toàn tâm toàn ý cứu bệnh nhân...', 'congdoan1.jpg', NULL, '2022-09-12 03:40:33'),
(16, 1, 4, 'Nga phản hồi về ý tưởng gửi vũ khí hạt nhân tới Ukraina', NULL, 'thegioi5.jpg', NULL, '2022-09-12 03:40:29'),
(17, 1, 4, 'Cảnh báo kho vũ khí hạt nhân toàn cầu chuyển biến đáng lo ngại', NULL, 'thegioi4.jpg', NULL, '2022-09-12 03:40:30'),
(18, 1, 4, 'Phần Lan tuyên bố sẽ không gia nhập NATO nếu không có Thụy Điển', NULL, 'thegioi3.jpg', NULL, '2022-09-12 03:40:31'),
(19, 1, 4, 'Voi giết cụ bà Ấn Độ rồi quay lại phá đám tang', NULL, 'thegioi2.jpg', NULL, '2022-09-12 03:40:32'),
(20, 1, 4, 'Bắc Kinh cấp tập ngăn chặn ổ dịch COVID-19 bùng phát \"dữ dội\" từ quán bar', 'Theo đại biểu Quốc hội Nguyễn Thị Thuỷ, tiến trình xã hội hoá trong lĩnh vực y tế hiện nay đang đặt ở \"nút tạm dừng\", các hoạt động mua...', 'thegioi1.jpg', NULL, '2022-09-12 03:40:33'),
(21, 2, 5, 'Giá trứng bình ổn tại TPHCM sẽ tăng 2.000 đồng/vỉ từ ngày 15.6', NULL, 'kinhdoanh5.jpg', NULL, '2022-09-12 03:40:29'),
(22, 2, 5, 'Giải nhanh bài toán doanh nghiệp FDI lỗ 2 triệu USD/ngày vì thiếu điện', NULL, 'kinhdoanh4.jpg', NULL, '2022-09-12 03:40:30'),
(23, 2, 5, 'Giá đồng Bitcoin rớt giá ở mức kỷ lục', NULL, 'kinhdoanh3.jpg', NULL, '2022-09-12 03:40:31'),
(24, 2, 5, 'Loạt vi phạm trong phát triển điện mặt trời mái nhà ở Ninh Thuận', NULL, 'kinhdoanh2.jpg', NULL, '2022-09-12 03:40:32'),
(25, 2, 5, 'Giá xăng tăng rất mạnh, vượt mốc 32.000 đồng/lít, giá dầu tăng \"sốc\" hơn', 'TPHCM - Các chuyên gia cảnh báo, thời gian qua, tại các bệnh viện có khoa truyền nhiễm liên tục tiếp nhiều bệnh nhân có triệu chứng hậu COVID-19, mắc sốt...', 'kinhdoanh1.jpg', NULL, '2022-09-12 03:40:33'),
(26, 2, 6, 'Vì sao không thể gọi tên mối quan hệ kỳ lạ giữa Trịnh Công Sơn và Khánh Ly?', NULL, 'vh-gt5.jpg', NULL, '2022-09-12 03:40:29'),
(27, 2, 6, 'Mối quan hệ bà Nhung và Trang hiện tại ra sao ở \"Thương ngày nắng về\"?', NULL, 'vh-gt4.jpg', NULL, '2022-09-12 03:40:30'),
(28, 2, 6, 'Thanh âm tre, gỗ, nứa... là văn hóa của đại ngàn Tây Nguyên', NULL, 'vh-gt3.jpg', NULL, '2022-09-12 03:40:31'),
(29, 2, 6, 'Khách du lịch đến Đà Lạt tăng mạnh dịp nghỉ hè', NULL, 'vh-gt2.jpg', NULL, '2022-09-12 03:40:32'),
(30, 2, 6, 'Hữu Tín là ai trước khi bị bắt \"tại trận\" sử dụng ma túy?', NULL, 'vh-gt1.jpg', NULL, '2022-09-12 03:40:33'),
(31, 2, 7, 'AC Milan sẽ tìm thấy biểu tượng mới ở Sandro Tonali?', NULL, 'thethao5.jpg', NULL, '2022-09-12 03:40:29'),
(32, 2, 7, 'Tuyển nữ Australia quyết truất ngôi tuyển nữ Việt Nam ở AFF Cup 2022', NULL, 'thethao4.jpg', NULL, '2022-09-12 03:40:30'),
(33, 2, 7, 'Đua F1: Giành pole không đồng nghĩa với chiến thắng chặng nữa?', NULL, 'thethao3.jpg', NULL, '2022-09-12 03:40:31'),
(34, 2, 7, 'Lịch thi đấu tuyển nữ Việt Nam tại giải bóng đá nữ vô địch Đông Nam Á 2022', NULL, 'thethao2.jpg', NULL, '2022-09-12 03:40:32'),
(35, 2, 7, 'Sau giải U23 Châu Á, huấn luyện viên Gong Oh-kyun sẽ trở lại Hàn Quốc?', NULL, 'thethao1.jpg', NULL, '2022-09-12 03:40:33'),
(36, 2, 8, 'Thái Bình: Điều tra nguyên nhân cá chết bất thường hàng loạt trên sông', NULL, 'bandoc5.jpg', NULL, '2022-09-12 03:40:29'),
(37, 2, 8, 'Cá chết bất thường trên sông ở Thái Bình: Bước đầu xác định \"nghi phạm', NULL, 'bandoc4.jpg', NULL, '2022-09-12 03:40:30'),
(38, 2, 8, 'Hướng dẫn rút Bảo hiểm xã hội 1 lần khi có 2 sổ Bảo hiểm xã hội', NULL, 'bandoc3.jpg', NULL, '2022-09-12 03:40:31'),
(39, 2, 8, 'Sản phẩm du lịch phải khác biệt, không thể làm theo phong trào', NULL, 'bandoc2.jpg', NULL, '2022-09-12 03:40:32'),
(40, 2, 8, 'Tăng lương tối thiểu từ 1.7: Tiền lương tính đóng BHXH bắt buộc ra sao?', NULL, 'bandoc1.jpg', NULL, '2022-09-12 03:40:33'),
(41, 3, 9, 'Thời gian, địa điểm nhận tiền bồi thường thu hồi đất', NULL, 'batdongsan5.jpg', NULL, '2022-09-12 03:40:29'),
(42, 3, 9, 'Hạn mức nhận chuyển nhượng đất nông nghiệp năm 2022', NULL, 'batdongsan4.jpg', NULL, '2022-09-12 03:40:30'),
(43, 3, 9, 'Hạ màn \"lùm xùm\" Dự án khu nhà ở phố Wall', NULL, 'batdongsan3.jpg', NULL, '2022-09-12 03:40:31'),
(44, 3, 9, 'Các loại đất nghiêm cấm xây dựng người dân cần biết', NULL, 'batdongsan2.jpg', NULL, '2022-09-12 03:40:32'),
(45, 3, 9, 'Bình Dương: Bất động sản qua cơn sốt, nhiều nơi rao bán không có người mua', NULL, 'batdongsan1.jpg', NULL, '2022-09-12 03:40:33'),
(46, 3, 10, 'Người cha và con trai 5 tuổi tử vong trong căn hộ chung cư ở TPHCM', NULL, 'phapluat5.jpg', NULL, '2022-09-12 03:40:29'),
(47, 3, 10, 'Cướp giật điện thoại còn rút dao đe doạ người truy đuổi', NULL, 'phapluat4.jpg', NULL, '2022-09-12 03:40:30'),
(48, 3, 10, 'Anh trai đang trong quân ngũ, em có được tạm hoãn nghĩa vụ quân sự?', NULL, 'phapluat3.jpg', NULL, '2022-09-12 03:40:31'),
(49, 3, 10, 'Xảy ra mâu thuẫn trước quán bar, 2 đối tượng đánh người tử vong', NULL, 'phapluat2.jpg', NULL, '2022-09-12 03:40:32'),
(50, 3, 10, 'Tạm giữ diễn viên hài Hữu Tín', NULL, 'phapluat1.jpg', NULL, '2022-09-12 03:40:33'),
(51, 3, 11, 'TPHCM: Thí sinh nhập viện ngay sau khi kết thúc môn thi cuối cùng lớp 10', NULL, 'giaoduc5.jpg', NULL, '2022-09-12 03:40:29'),
(52, 3, 11, '226 trường đại học công bố xét học bạ THPT năm 2022', NULL, 'giaoduc4.jpg', NULL, '2022-09-12 03:40:30'),
(53, 3, 11, 'Các trường học không được bán SGK kèm sách bài tập, tham khảo', NULL, 'giaoduc3.jpg', NULL, '2022-09-12 03:40:31'),
(54, 3, 11, 'Thêm trường đại học công bố quy chế, điểm mới tuyển sinh 2022', NULL, 'giaoduc2.jpg', NULL, '2022-09-12 03:40:32'),
(55, 3, 11, 'Hậu Giang: Hơn 10.000 học sinh thi tuyển vào lớp 10 từ ngày 17.6', NULL, 'giaoduc1.jpg', NULL, '2022-09-12 03:40:33'),
(56, 3, 12, 'Nhận biết các loại vạch kẻ đường cấm đỗ xe', NULL, 'xe5.jpg', NULL, '2022-09-12 03:40:29'),
(57, 3, 12, 'Những lựa chọn ôtô điện sắp ra mắt thời xăng tăng giá', NULL, 'xe4.jpg', NULL, '2022-09-12 03:40:30'),
(58, 3, 12, 'Khám phá chiếc xế hộp tiền tỉ mà Á hậu Thùy Dung mới tậu', NULL, 'xe3.jpg', NULL, '2022-09-12 03:40:31'),
(59, 3, 12, 'Lượng xe nhập khẩu tiếp đà tăng khi kết thúc giảm thuế trước bạ xe nội', NULL, 'xe2.jpg', NULL, '2022-09-12 03:40:32'),
(60, 3, 12, '11 trường hợp bị thu hồi giấy đăng ký xe và biển số xe', NULL, 'xe1.jpg', NULL, '2022-09-12 03:40:33'),
(61, 1, 13, '4 cách làm mặt nạ dưỡng da hỗn hợp', NULL, 'suckhoe5.jpg', NULL, '2022-09-12 03:40:29'),
(62, 1, 13, '4 trường hợp có nguy cơ mắc đậu mùa khỉ', NULL, 'suckhoe4.jpg', NULL, '2022-09-12 03:40:30'),
(63, 1, 13, '2 bước làm mặt nạ từ nước cam đơn giản mà hiệu quả dành cho các chị em', NULL, 'suckhoe3.jpg', NULL, '2022-09-12 03:40:31'),
(64, 1, 13, 'Cảnh báo bệnh nhân hậu COVID-19 mắc sốt xuất huyết dễ chuyển nặng', NULL, 'suckhoe2.jpg', NULL, '2022-09-12 03:40:32'),
(65, 1, 13, '7 nguyên nhân làm cho đôi mắt căng thẳng', NULL, 'suckhoe1.jpg', NULL, '2022-09-12 03:40:33'),
(66, 1, 14, '4 điều làm nên \"khí chất\" cho phụ nữ', NULL, 'hn-gd5.jpg', NULL, '2022-09-12 03:40:29'),
(67, 1, 14, '6 mẹo để tránh bị các nhà dịch vụ du lịch lừa', NULL, 'hn-gd4.jpg', NULL, '2022-09-12 03:40:30'),
(68, 1, 14, 'Ca sĩ Jaykii và vợ từ oan gia ngõ hẹp đến không thể thiếu nhau', NULL, 'hn-gd3.jpg', NULL, '2022-09-12 03:40:31'),
(69, 1, 14, 'Quyền Linh quặn lòng khi nữ điều dưỡng phải “gồng mình” nuôi chồng ung thư', NULL, 'hn-gd2.jpg', NULL, '2022-09-12 03:40:32'),
(70, 1, 14, '3 bước đơn giản để giải quyết sàn nhà bếp dính dầu mỡ', NULL, 'hn-gd1.jpg', NULL, '2022-09-12 03:40:33'),
(71, 1, 15, 'Meta mất 3 lãnh đạo cấp cao trong một tuần', NULL, 'congnghe5.jpg', NULL, '2022-09-12 03:40:29'),
(72, 1, 15, 'Tuyên bố trí tuệ nhân tạo có tri giác, một kỹ sư bị Google cho nghỉ', NULL, 'congnghe4.jpg', NULL, '2022-09-12 03:40:30'),
(73, 1, 15, 'Đà Nẵng tổ chức ngày khởi nghiệp công nghệ Google 2022', NULL, 'congnghe3.jpg', NULL, '2022-09-12 03:40:31'),
(74, 1, 15, 'Điện thoại thông minh có thể bị theo dõi thông qua tín hiệu Bluetooth', NULL, 'congnghe2.jpg', NULL, '2022-09-12 03:40:32'),
(75, 1, 15, 'Công ty mẹ của TikTok chuẩn bị \"đổ bộ\" thị trường thực tế ảo', NULL, 'congnghe1.jpg', NULL, '2022-09-12 03:40:33'),
(76, 1, 16, 'Gia cảnh cùng cực của 3 nạn nhân trong vụ án tại Phú Yên', NULL, 'tamlongvang5.jpg', NULL, '2022-09-12 03:40:29'),
(77, 1, 16, 'Đôi vợ chồng nghèo có 3 con cùng mắc bạo bệnh', NULL, 'tamlongvang4.jpg', NULL, '2022-09-12 03:40:30'),
(78, 1, 16, 'Xin cứu lấy đôi chân của cậu thanh niên trẻ', NULL, 'tamlongvang3.jpg', NULL, '2022-09-12 03:40:31'),
(79, 1, 16, 'Hoàn cảnh đáng thương của cậu bé mồ côi 11 tuổi', NULL, 'tamlongvang2.jpg', NULL, '2022-09-12 03:40:32'),
(80, 1, 16, 'Chắp cánh ước mơ cho nữ sinh có gia cảnh nghèo khó', NULL, 'tamlongvang1.jpg', NULL, '2022-09-12 03:40:33'),
(81, 2, 17, 'Công đoàn PV Drilling kiểm tra công tác an toàn vệ sinh lao động', NULL, 'congdoanvn5.jpg', NULL, '2022-09-12 03:40:29'),
(82, 2, 17, 'Trường Đại học Dầu khí Việt Nam triển khai 5S tại các tổ Công đoàn', NULL, 'congdoanvn4.jpg', NULL, '2022-09-12 03:40:30'),
(83, 2, 17, 'Công đoàn Quốc phòng chăm lo đoàn viên nhân Tháng Công nhân', NULL, 'congdoanvn3.jpg', NULL, '2022-09-12 03:40:31'),
(84, 2, 17, 'Công đoàn ngành GTVT Hà Nội nâng cao nghiệp vụ cho 150 cán bộ CĐCS', NULL, 'congdoanvn2.jpg', NULL, '2022-09-12 03:40:32'),
(85, 2, 17, 'Hơn 2.600 sáng kiến của người lao động Gia Lai được ghi nhận', NULL, 'congdoanvn1.jpg', NULL, '2022-09-12 03:40:33'),
(86, 2, 18, 'Giáo hội Phật giáo Ninh Bình tham gia hiệu quả phong trào thi đua yêu nước', NULL, 'dt-tg5.jpg', NULL, '2022-09-12 03:40:29'),
(87, 2, 18, 'Công nghệ và phụ huynh cùng \"gác cổng\" để bảo vệ trẻ em trên mạng Internet', NULL, 'dt-tg4.jpg', NULL, '2022-09-12 03:40:30'),
(88, 2, 18, 'Công nhân vượt khó, sáng tạo góp phần khôi phục sản xuất', NULL, 'dt-tg3.jpg', NULL, '2022-09-12 03:40:31'),
(89, 2, 18, 'Công nhân, lao động hạnh phúc khi những sáng kiến được áp dụng vào sản xuất', NULL, 'dt-tg2.jpg', NULL, '2022-09-12 03:40:32'),
(90, 2, 18, 'Hành trình lan tỏa những điều tốt đẹp: Cống hiến vì cộng đồng', NULL, 'dt-tg1.jpg', NULL, '2022-09-12 03:40:33'),
(91, 2, 19, 'Vẻ đẹp bãi biển Hồ Tràm - nơi Minh Hằng dự kiến tổ chức hôn lễ', NULL, 'dulich5.jpg', NULL, '2022-09-12 03:40:29'),
(92, 2, 19, 'Đến cao nguyên Đồng Cao hoá thân thành thiếu nữ Mông Cổ', NULL, 'dulich4.jpg', NULL, '2022-09-12 03:40:30'),
(93, 2, 19, 'Du khách Úc viết về trải nghiệm ở Việt Nam sau đại dịch', NULL, 'dulich3.jpg', NULL, '2022-09-12 03:40:31'),
(94, 2, 19, 'Không gian homestay Đà Lạt đang gây tranh cãi nhất MXH', NULL, 'dulich2.jpg', NULL, '2022-09-12 03:40:32'),
(95, 2, 19, '6 điểm du lịch tự nhiên không thể bỏ lỡ khi đến Điện Biên', NULL, 'dulich1.jpg', NULL, '2022-09-12 03:40:33'),
(96, 2, 20, 'Kim Hyun Joong tiết lộ đã kết hôn với mối tình đầu', NULL, 'laodongtre5.jpg', NULL, '2022-09-12 03:40:29'),
(97, 2, 20, '“Cơm nhà” lên án vấn nạn “cưng chiều con rể - ghét bỏ con dâu”', NULL, 'laodongtre4.jpg', NULL, '2022-09-12 03:40:30'),
(98, 2, 20, 'Real Madrid công bố kế hoạch chia tay Marcelo hoành tráng', NULL, 'laodongtre3.jpg', NULL, '2022-09-12 03:40:31'),
(99, 2, 20, '\"Bom tấn\" mới của Real Madrid tăng gần 1 triệu lượt theo dõi trên MXH', NULL, 'laodongtre2.jpg', NULL, '2022-09-12 03:40:32'),
(100, 2, 20, 'Cứu sống bệnh nhi đuối nước, phù phổi cấp', NULL, 'laodongtre1.jpg', NULL, '2022-09-12 03:40:33'),
(101, 1, 6, 'Khán giả phản ứng gì khi Hiền Hồ trở lại sau scandal?', 'Vẫn còn làn sóng chỉ trích Hiền Hồ. Thậm chí, một số nghệ sĩ cũng bị \"vạ lây\" sau khi thể hiện thái độ ủng hộ việc Hiền Hồ trở lại sau scandal.', 'vh-gt6.jpg', NULL, '2022-09-13 02:26:55'),
(106, NULL, NULL, 'Phát hiện người xinh đẹp nhất trần đời', 'Bùi Thị Mẫn vợ của Tạ Bá Phú', '1.jpg', NULL, '2022-09-14 14:34:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `business_information`
--
ALTER TABLE `business_information`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_journalist` (`ID_journalist`),
  ADD KEY `ID_category` (`ID_category`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `images_advertisement`
--
ALTER TABLE `images_advertisement`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `images_header_and_footer`
--
ALTER TABLE `images_header_and_footer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `journalist`
--
ALTER TABLE `journalist`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_journalist` (`ID_journalist`),
  ADD KEY `ID_category` (`ID_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `business_information`
--
ALTER TABLE `business_information`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `business_information`
--
ALTER TABLE `business_information`
  ADD CONSTRAINT `business_information_ibfk_1` FOREIGN KEY (`ID_journalist`) REFERENCES `journalist` (`ID`),
  ADD CONSTRAINT `business_information_ibfk_2` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`ID_journalist`) REFERENCES `journalist` (`ID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
