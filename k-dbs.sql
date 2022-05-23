-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2022 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

CREATE TABLE `table_banking` (
  `banking_id` int(11) NOT NULL,
  `banking_username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_transfer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_amount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banking_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_banks`
--

CREATE TABLE `table_banks` (
  `banks_id` int(11) NOT NULL,
  `banks_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_images` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_account_holder` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_number_holder` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_branch` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banks_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_banks`
--

INSERT INTO `table_banks` (`banks_id`, `banks_name`, `banks_images`, `banks_account_holder`, `banks_number_holder`, `banks_branch`, `banks_status`, `banks_time`) VALUES
(1, 'false', 'https://static.mservice.io/img/logo-momo.png', 'Ngô Minh Hoàng', '0334306378', 'false', 'true', '0334306378'),
(2, 'Ngân hàng MB BANK Việt Nam', 'https://play-lh.googleusercontent.com/g4opzz09xGJxjSJjkP_TABKffpRu7i4xJPXLerYMbyXUWjDB6cTGy07ebyth91ZBQYs', 'Ngô Minh Hoàng', '5555555550511', 'false', 'true', '1611982872');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_buff`
--

CREATE TABLE `table_buff` (
  `buff_id` int(11) NOT NULL,
  `buff_username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_fb_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_server` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_comment` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_minutes` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_amount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_note` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_present` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_payment` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `buff_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `table_card` (
  `card_id` int(11) NOT NULL,
  `card_username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_amount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_serial` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_pin` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_history_buy`
--

CREATE TABLE `table_history_buy` (
  `history_buy_id` int(11) NOT NULL,
  `history_buy_username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `history_buy_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_buy_point_original` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_buy_point_final` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_buy_content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_buy_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_history_buy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_history_user`
--

CREATE TABLE `table_history_user` (
  `history_user_id` int(11) NOT NULL,
  `history_user_username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `history_user_content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_user_ip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `history_user_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_service`
--

CREATE TABLE `table_service` (
  `service_id` int(11) NOT NULL,
  `service_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_category` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_price` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_price_server_1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_price_server_2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_price_server_3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_price_server_4` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_min_amount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_max_amount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_info` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `service_noted` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `service_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_service`
--

INSERT INTO `table_service` (`service_id`, `service_title`, `service_slug`, `service_category`, `service_price`, `service_price_server_1`, `service_price_server_2`, `service_price_server_3`, `service_price_server_4`, `service_min_amount`, `service_max_amount`, `service_info`, `service_noted`, `service_status`, `service_time`) VALUES
(1, 'Facebook Liker | KDH Team', 'buff-like-post-facebook', 'facebook', '9', '16', '20', '46', '0', '100', '100000', '<p>- Buy with post ID that has opened public tracking (must have a like button).\r\n</p>\r\n<p>- We do not refund paid orders.</p>', '<p>- It is forbidden to buff the Seeding IDs with content that violates the law, politics, debauchery... If you intentionally buff you, you will be deducted all money and banned from the system forever, and must take full responsibility before the law.\r\n</p>\r\n<p>- Do not install multiple orders at the same time, the old one is finished, then the new one will be added.\r\n</p>\r\n<p>- Do not buy multiple sites at once, drop or lack of support.\r\n</p>\r\n<p>- Each ID can be increased up to 10 times on the system to avoid Spam, need to buy more please contact admin to be resolved.</p>\r\n<p>- Enter id error or die id runtime, the system will not refund.</p>', '1', '1624003576'),
(2, 'Facebook Followers | KDH Team', 'buff-follow-facebook', 'facebook', '11', '23', '29', '45', '0', '300', '1000000', '<p>- Buy with post ID that has opened public tracking (must have a like button).\r\n</p>\r\n<p>- We do not refund paid orders.</p>', '<p>- It is forbidden to buff the Seeding IDs with content that violates the law, politics, debauchery... If you intentionally buff you, you will be deducted all money and banned from the system forever, and must take full responsibility before the law.\r\n</p>\r\n<p>- Do not install multiple orders at the same time, the old one is finished, then the new one will be added.\r\n</p>\r\n<p>- Do not buy multiple sites at once, drop or lack of support.\r\n</p>\r\n<p>- Each ID can be increased up to 10 times on the system to avoid Spam, need to buy more please contact admin to be resolved.</p>\r\n<p>- Enter id error or die id runtime, the system will not refund.</p>', '1', '1624003944');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_site`
--

CREATE TABLE `table_site` (
  `site_id` int(11) NOT NULL,
  `site_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_keyword` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_domain` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_fb_token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_facebook` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_zalo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_fanpage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_mail_username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_mail_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_mmo_partner_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_mmo_partner_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_card_partner_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_card_partner_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_site`
--

INSERT INTO `table_site` (`site_id`, `site_title`, `site_logo`, `site_name`, `site_keyword`, `site_domain`, `site_fb_token`, `site_facebook`, `site_zalo`, `site_fanpage`, `site_mail_username`, `site_mail_password`, `site_mmo_partner_id`, `site_mmo_partner_key`, `site_card_partner_id`, `site_card_partner_key`, `site_status`, `site_time`) VALUES
(1, 'Welcome To KDH Team', 'not found :)', 'kdhteam.xyz', 'kdh, kdh team, KDH, KDH Team', 'https://localhost', '1', 'https://www.facebook.com/KDH.IT', '0911323854', 'https://www.facebook.com/KDH.IT', '1', '1', '387', '0', '0911323854', '0', '1', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_fb` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_point` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_blocked` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_time_last` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_user`

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_banking`
--
ALTER TABLE `table_banking`
  ADD PRIMARY KEY (`banking_id`),
  ADD KEY `banking_username` (`banking_username`);

--
-- Chỉ mục cho bảng `table_banks`
--
ALTER TABLE `table_banks`
  ADD PRIMARY KEY (`banks_id`),
  ADD KEY `banks_number_holder` (`banks_number_holder`);

--
-- Chỉ mục cho bảng `table_buff`
--
ALTER TABLE `table_buff`
  ADD PRIMARY KEY (`buff_id`),
  ADD KEY `buff_username` (`buff_username`);

--
-- Chỉ mục cho bảng `table_card`
--
ALTER TABLE `table_card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `card_username` (`card_username`);

--
-- Chỉ mục cho bảng `table_history_buy`
--
ALTER TABLE `table_history_buy`
  ADD PRIMARY KEY (`history_buy_id`),
  ADD KEY `history_buy_username` (`history_buy_username`);

--
-- Chỉ mục cho bảng `table_history_user`
--
ALTER TABLE `table_history_user`
  ADD PRIMARY KEY (`history_user_id`),
  ADD KEY `history_user_username` (`history_user_username`);

--
-- Chỉ mục cho bảng `table_service`
--
ALTER TABLE `table_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_slug` (`service_slug`);

--
-- Chỉ mục cho bảng `table_site`
--
ALTER TABLE `table_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Chỉ mục cho bảng `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_banking`
--
ALTER TABLE `table_banking`
  MODIFY `banking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_banks`
--
ALTER TABLE `table_banks`
  MODIFY `banks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `table_buff`
--
ALTER TABLE `table_buff`
  MODIFY `buff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `table_card`
--
ALTER TABLE `table_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_history_buy`
--
ALTER TABLE `table_history_buy`
  MODIFY `history_buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `table_history_user`
--
ALTER TABLE `table_history_user`
  MODIFY `history_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `table_service`
--
ALTER TABLE `table_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `table_site`
--
ALTER TABLE `table_site`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
