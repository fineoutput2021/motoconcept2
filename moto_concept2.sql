-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 08:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moto_concept2`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_states`
--

CREATE TABLE `all_states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_states`
--

INSERT INTO `all_states` (`id`, `state_name`) VALUES
(1, 'Andaman & Nicobar [AN]'),
(2, 'Andhra Pradesh [AP]'),
(3, 'Arunachal Pradesh [AR]'),
(4, 'Assam [AS]'),
(5, 'Bihar [BH]'),
(6, 'Chandigarh [CH]'),
(7, 'Chhattisgarh [CG]'),
(8, 'Dadra & Nagar Haveli [DN]'),
(9, 'Daman & Diu [DD]'),
(10, 'Delhi [DL]'),
(11, 'Goa [GO]'),
(12, 'Gujarat [GU]'),
(13, 'Haryana [HR]'),
(14, 'Himachal Pradesh [HP]'),
(15, 'Jammu & Kashmir [JK]'),
(16, 'Jharkhand [JH]'),
(17, 'Karnataka [KR]'),
(18, 'Kerala [KL]'),
(19, 'Lakshadweep [LD]'),
(20, 'Madhya Pradesh [MP]'),
(21, 'Maharashtra [MH]'),
(22, 'Manipur [MN]'),
(23, 'Meghalaya [ML]'),
(24, 'Mizoram [MM]'),
(25, 'Nagaland [NL]'),
(26, 'Orissa [OR]'),
(27, 'Pondicherry [PC]'),
(28, 'Punjab [PJ]'),
(29, 'Rajasthan [RJ]'),
(30, 'Sikkim [SK]'),
(31, 'Tamil Nadu [TN]'),
(32, 'Tripura [TR]'),
(33, 'Uttar Pradesh [UP]'),
(34, 'Uttaranchal [UT]'),
(35, 'West Bengal [WB]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar`
--

CREATE TABLE `tbl_admin_sidebar` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_sidebar`
--

INSERT INTO `tbl_admin_sidebar` (`id`, `name`, `url`) VALUES
(1, 'Dashboard', 'home'),
(5, 'Slider Management', 'slider/view_slider'),
(7, 'Vendors Management', 'vendors/view_vendors'),
(8, 'Banner Images', 'banners/view_banners'),
(9, 'Contact Us Management', 'contactus/view_contactus'),
(12, 'Products Management', 'Products/view_product_categories'),
(13, 'Category Management', 'category/view_category'),
(14, 'Sub-Category', 'subcategory/view_subcategory'),
(15, 'Orders Management', '#'),
(16, 'Inventory', 'inventory/view_icategory'),
(18, 'Minor Category', 'Minorcategory/view_minorcategory'),
(19, 'App Slider', 'Appslider/view_appslider'),
(20, 'App Banner', 'Appbanner/view_appbanner\r\n'),
(21, 'Stocks ', 'Stock/view_stock'),
(22, 'Brands', 'Brands/view_brands\r\n'),
(23, 'Popup', 'Popup/view_popup'),
(24, 'Two Images', 'Two_images/view_two_images'),
(25, 'Feedback', 'Feedback/view_feedback'),
(26, 'Feedback', 'Feedback/view_feedback');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar2`
--

CREATE TABLE `tbl_admin_sidebar2` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_sidebar2`
--

INSERT INTO `tbl_admin_sidebar2` (`id`, `main_id`, `name`, `url`) VALUES
(1, 2, 'View Team', 'system/view_team'),
(2, 2, 'Add Team', 'system/add_team'),
(3, 15, 'New Orders', 'Orders/view_orders'),
(4, 15, 'Accepted Orders', 'Orders/view_accept_order'),
(5, 15, 'Rejected Orders', 'Orders/view_cancel_orders'),
(6, 15, 'Dispatch Orders', 'Orders/view_dispatched_orders'),
(7, 15, 'Completed Orders', 'Orders/view_completed_orders'),
(8, 15, 'Hold Orders', 'Orders/view_hold_orders');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appbanner`
--

CREATE TABLE `tbl_appbanner` (
  `id` int(11) NOT NULL,
  `bimage` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appslider`
--

CREATE TABLE `tbl_appslider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` int(11) NOT NULL,
  `banner_image` text NOT NULL,
  `redirection_link` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bodymaterial`
--

CREATE TABLE `tbl_bodymaterial` (
  `id` int(11) NOT NULL,
  `filter_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cameratype`
--

CREATE TABLE `tbl_cameratype` (
  `id` int(12) NOT NULL,
  `filtername` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `token_id` varchar(100) NOT NULL,
  `ip` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `image2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `promocode` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `min_cart_amount` float(10,2) NOT NULL,
  `discount_percent` varchar(100) NOT NULL,
  `maximum_discount` float(10,2) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `quantity` varchar(250) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iproducts`
--

CREATE TABLE `tbl_iproducts` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `inventory` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_irdistance`
--

CREATE TABLE `tbl_irdistance` (
  `id` int(12) NOT NULL,
  `filtername` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledtype`
--

CREATE TABLE `tbl_ledtype` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_length`
--

CREATE TABLE `tbl_length` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lens`
--

CREATE TABLE `tbl_lens` (
  `id` int(11) NOT NULL,
  `filtername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minorcategory`
--

CREATE TABLE `tbl_minorcategory` (
  `id` int(11) NOT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `subcategory_id` varchar(100) DEFAULT NULL,
  `minorcategoryname` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `brand` mediumtext DEFAULT NULL,
  `resolution` mediumtext DEFAULT NULL,
  `ir_distance` mediumtext DEFAULT NULL,
  `camera_type` mediumtext DEFAULT NULL,
  `body_materials` mediumtext DEFAULT NULL,
  `video_channel` mediumtext DEFAULT NULL,
  `poe_ports` mediumtext DEFAULT NULL,
  `poe_type` mediumtext DEFAULT NULL,
  `sata_ports` mediumtext DEFAULT NULL,
  `length` mediumtext DEFAULT NULL,
  `screen_size` mediumtext DEFAULT NULL,
  `led_type` mediumtext DEFAULT NULL,
  `size` mediumtext DEFAULT NULL,
  `lens` mediumtext DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order1`
--

CREATE TABLE `tbl_order1` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `promocode_id` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL COMMENT '1 for Bank transfer , 2 for Pay on store',
  `bank_receipt` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL COMMENT '0 for pending , 1 for succeed',
  `order_status` int(11) DEFAULT NULL COMMENT '1 for orderPlaced , 2 for orderConfirmed , 3 for orderDispatched , 4 for orderDelivered , 5 for cancel,6 for hold',
  `final_amount` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order2`
--

CREATE TABLE `tbl_order2` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `product_mrp` varchar(255) NOT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `main_id` varchar(100) NOT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `gst_percentage` varchar(255) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` bigint(30) NOT NULL,
  `product_id` bigint(30) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_status` enum('1','2','3','4') NOT NULL DEFAULT '2',
  `vendor_screenshot` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `temp_id` int(11) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poeports`
--

CREATE TABLE `tbl_poeports` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poetype`
--

CREATE TABLE `tbl_poetype` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_popup`
--

CREATE TABLE `tbl_popup` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `subcategory_id` varchar(100) DEFAULT NULL,
  `minorcategory_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `video1` varchar(100) DEFAULT NULL,
  `video2` varchar(100) DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `sellingprice` varchar(50) NOT NULL,
  `productdescription` varchar(100) DEFAULT NULL,
  `modelno` varchar(100) DEFAULT NULL,
  `inventory` varchar(250) NOT NULL,
  `weight` double NOT NULL,
  `feature_product` varchar(100) NOT NULL,
  `popular_product` int(100) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `brand` int(11) NOT NULL,
  `resolution` int(11) NOT NULL,
  `irdistance` int(11) NOT NULL,
  `cameratype` int(11) NOT NULL,
  `bodymaterial` int(11) NOT NULL,
  `videochannel` int(11) NOT NULL,
  `poeports` int(11) NOT NULL,
  `poetype` int(11) NOT NULL,
  `sataports` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `screensize` int(11) NOT NULL,
  `ledtype` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `lens` int(11) NOT NULL,
  `gstrate` int(11) NOT NULL,
  `gstprice` int(11) NOT NULL,
  `sellingpricegst` int(11) NOT NULL,
  `wishlist` int(11) NOT NULL,
  `max` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `promocode` varchar(255) NOT NULL,
  `ptype` varchar(244) NOT NULL,
  `giftpercent` varchar(255) NOT NULL,
  `minorder` varchar(255) NOT NULL,
  `max` varchar(255) NOT NULL,
  `ip` varchar(300) NOT NULL,
  `added_by` varchar(1111) NOT NULL,
  `is_active` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resolution`
--

CREATE TABLE `tbl_resolution` (
  `id` int(11) NOT NULL,
  `filtername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sataports`
--

CREATE TABLE `tbl_sataports` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screensize`
--

CREATE TABLE `tbl_screensize` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slider_image` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `stockname` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `stockmessage` varchar(10000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE `tbl_store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe_us`
--

CREATE TABLE `tbl_subscribe_us` (
  `id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `power` int(11) NOT NULL,
  `services` varchar(1000) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `power`, `services`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'Anay Pareek', 'anaypareek@rocketmail.com', '9ffd3dfaf18c6c0dededaba5d7db9375', '9799655891', '19 kalyanpuri new sanganer road sodala', '', 1, '[\"999\"]', '1000000', '16-05-2018', 1, 1),
(19, 'Demo', 'demo@gmail.com', 'f702c1502be8e55f4208d69419f50d0a', '9999999999', 'jaipur', NULL, 1, '[\"999\"]', '::1', '2020-01-04 18:12:55', 1, 1),
(29, 'Animesh Sharma', 'animesh.skyline@gmail.com', '8bda6fe26dad2b31f9cb9180ec3823e8', '8441849182', 'pratap nagar sitapura jaipur', '', 2, '[\"999\"]', '::1', '2020-01-06 14:47:11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `ip` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_two_images`
--

CREATE TABLE `tbl_two_images` (
  `id` int(11) NOT NULL,
  `image1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `authentication` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(1000) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `authentication`, `phone`, `email`, `dob`, `address`, `state`, `district`, `zipcode`, `company_name`, `city`, `house_no`, `gstin`, `image1`, `image2`, `token_id`, `ip`, `date`, `is_active`) VALUES
(1, 'Piyush', '066131b288d2ad5ca387aae6', '9521459091', 'Rtrd@gmail.com', '11,10,1992', 'Fjfufuf', '29', 'nougur', '302022', 'Ghhv', NULL, NULL, NULL, 'assets/uploads/users/users20220219110254.jpg', '', 'hhhhhhhh', '49.205.213.122', '2022-02-19 11:20:58', 1),
(2, 'Bhanu pratap', '0b0ef3c7de8916565e38cc53', '9929098564', 'bhanusinghnaruka@gmail.com', '14,07,1989', 'Jaipur', '29', 'nougur', '302021', 'Supreme Technocom', NULL, NULL, NULL, 'assets/uploads/users/users20220223080237.jpg', '', 'hhhhhhhh', '157.38.231.153', '2022-02-23 20:57:17', 1),
(3, 'piyush', 'd84d6d2b95fabd1cc57641fe', '8989898989', 'piyush@gmail.com', '1998-10-12', 'sodala', '28', 'Jaipur', '302020', 'fine', NULL, NULL, '', 'assets/uploads/users/users20220302020308.jpg', '', 'dHj2NhvPoZW73L0X6Q5mgycKAbwnOJ', '49.205.213.93', '2022-03-02 14:46:13', 1),
(4, 'test', '331a0f0245e940f554a439e8', '9999999999', 'testr@gmail.com', '11/10/1998', 'sodala', '28', 'Jaipur', '202202', 'fine', NULL, NULL, '', 'assets/uploads/users/users20220302030345.jpg', '', 'SJadX6u2em9I3njO4DACowq5W0lpvb', '49.205.213.93', '2022-03-02 15:34:49', 1),
(6, 'rohbit', 'c60166ec1055a09f696908fd', '1111111111', 'rohit@gmail.com', '12/12/1212', 'sodala', '2', 'Changlang', '202020', 'fien', NULL, NULL, '', 'assets/uploads/users/users20220303110337.jpg', '', 'yg910YTdflnG4wpcKq57kUQAiM2FOJ', '49.205.213.93', '2022-03-03 11:14:44', 1),
(8, 'pavan', '7ff495360ed0ca1f438c65a7', '9898989898', 'pavan@gmail.com', '11/10/2020', 'sodala', '28', 'Jaipur', '302020', 'test', 'jaipur', '12', '', 'assets/uploads/users/users20220303020306.jpg', '', 'vjQgD7mxae1NZtFuEB5J0TMiHkIWAn', '49.205.213.93', '2022-03-03 14:27:29', 1),
(9, 'manoj', 'a4417d5b27ed5ef7f1125104', '3333333333', 'manoj@gmail.com', '10/10/1220', 'shyam nagar', '28', 'Jaipur', '302022', 'testing', 'sodalal', '12', '', 'assets/uploads/users/users20220303020325.jpg', '', 'sMf0S7aivFr8lZg2WtzPyL35ph1oQk', '49.205.213.93', '2022-03-03 14:37:40', 1),
(11, 'Nitesh', 'c301bf6f18ec611e598c4900', '0000000000', 'nitesh@gmail.com', NULL, 'cas', '28', 'cvsd', '302101', 'FINE', 'Jaipur', NULL, '', 'assets/uploads/users/users20220309030328.jpg', NULL, '7jDB0RxU8QTCXthPW1SdIwrYyOzpNK', '49.204.165.81', '2022-03-09 15:53:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_temp`
--

CREATE TABLE `tbl_user_temp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(1000) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` enum('1','2','3','') NOT NULL COMMENT '1.approved|2.Rejected|3.Cancel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_temp`
--

INSERT INTO `tbl_user_temp` (`id`, `name`, `phone`, `email`, `dob`, `address`, `state`, `district`, `zipcode`, `company_name`, `city`, `house_no`, `gstin`, `image1`, `image2`, `token_id`, `ip`, `date`, `is_active`, `added_by`, `status`) VALUES
(1, 'tt', '123456789', 'tt@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211108051141.png', '', 'vdvd', '183.83.45.61', '2021-11-08 17:25:41', 1, 0, '1'),
(2, 'test1', '8005843406', 'test1@gmail.com', '2000-01-01', '12', '17', 'Leh', 'wq', 'abc', NULL, NULL, '101', 'assets/uploads/users/users20211108051151.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 17:31:51', 0, 0, '1'),
(3, 'test1', '8005843406', 'test1@gmail.com', '2000-01-01', '12', '17', 'Leh', 'wq', 'abc', NULL, NULL, '101', 'assets/uploads/users/users20211108051145.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 17:51:45', 0, 0, '1'),
(4, 'test1', '8005843406', 'test1@gmail.com', '2000-01-01', '12', '17', 'Leh', 'wq', 'abc', NULL, NULL, '101', 'assets/uploads/users/users20211108061135.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 18:31:35', 0, 0, '1'),
(5, 'test1', '1234567890', 'test1@gmail.com', '2000-01-11', '1712 BAJAJ BHAWAN', '28', 'Jaipur', '302003', 'abc', NULL, NULL, '1', 'assets/uploads/users/users20211108061156.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 18:51:56', 0, 0, '1'),
(6, 'test1', '1234567891', 'test1@gmail.com', '2000-01-01', 'wer', '28', 'Jaipur', '12123', 'abc', NULL, NULL, '1', 'assets/uploads/users/users20211108061152.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 18:54:52', 0, 0, '1'),
(7, 'test 1', '0123456789', 'test1@gmail.com', '2000-01-01', '123ds', '28', 'Jaipur', '12132', 'abc', NULL, NULL, '1', 'assets/uploads/users/users20211108071121.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-08 19:02:21', 0, 0, '1'),
(8, 'Test 1', '8005843406', 'test1@gmail.com', '2000-01-01', '12112, haldiyon ka rasta, Johori Bazar', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '12123', 'assets/uploads/users/users20211109111131.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-09 11:09:31', 0, 0, '1'),
(9, 'tt', '0000000000', 'tt1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211109111138.png', '', 'vdvd', '183.83.45.12', '2021-11-09 11:15:38', 0, 0, '1'),
(10, 'tt', '0000000001', 'tt1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211109111100.png', '', 'vdvd', '183.83.45.12', '2021-11-09 11:16:00', 0, 0, '1'),
(11, 'test1', '1234567899', 'test1@gmail.com', '0001-01-11', '4123r', '28', 'Jaipur', '31245', '42134t', NULL, NULL, '1214', 'assets/uploads/users/users20211109111135.jpg', '', 'ED4iPMemnhK1rILcOV9bRoJ5yfTwY2', '183.83.43.242', '2021-11-09 11:19:35', 0, 0, '1'),
(12, 'test3', '1234567898', 'test2@gmail.com', '2000-01-01', '123, dfsi', '28', 'Jaipur', '1243', 'abc', NULL, NULL, '123456', 'assets/uploads/users/users20211109021103.jpg', '', 'Lg6zO3nWSxaQDAGh0PyMFicJjl2vd7', '183.83.43.242', '2021-11-09 14:03:03', 0, 0, '1'),
(13, 'test1', '1234567895', 'test1@gmail.com', '2000-01-01', '1712 BAJAJ BHAWAN', '28', 'Bhilwara', '302003', 'acd', NULL, NULL, '123456', 'assets/uploads/users/users20211119121143.jpg', 'assets/uploads/users/users20211119121143.jpg', 'hiBMc2JKmwtFPGXlTjdCVvxunoLQYZ', '183.83.43.2', '2021-11-19 12:50:43', 0, 0, '1'),
(14, 'test1', '1234567893', 'test1@gmail.com', '2000-01-01', '1712 BAJAJ BHAWAN', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '12345', 'assets/uploads/users/users20211119121147.jpg', 'assets/uploads/users/users20211119121147.jpg', 'hiBMc2JKmwtFPGXlTjdCVvxunoLQYZ', '183.83.43.2', '2021-11-19 12:52:47', 0, 0, '1'),
(15, 'vikas', '9876543212', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211119011156.png', 'assets/uploads/users/users20211119011156.png', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 13:03:56', 0, 0, '1'),
(16, 'vikas', '9876543212', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211119011100.png', 'assets/uploads/users/users20211119011100.png', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 13:04:00', 0, 0, '1'),
(17, 'vikas', '9876543212', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, '', NULL, '', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 13:04:03', 0, 0, '1'),
(18, 'vikas', '9876543212', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211119011124.png', 'assets/uploads/users/users20211119011124.png', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 13:05:24', 0, 0, '1'),
(19, 'vikas', '9876543212', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, NULL, 'assets/uploads/users/users20211119011133.png', 'assets/uploads/users/users20211119011133.png', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 13:06:33', 0, 0, '1'),
(20, 'ab', '1234567892', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.20.107', '2021-11-19 13:09:00', 0, 0, '1'),
(21, 'ab', '28789789890', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.20.107', '2021-11-19 13:09:35', 0, 0, '1'),
(22, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.20.107', '2021-11-19 14:38:45', 0, 0, '1'),
(23, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.20.107', '2021-11-19 14:39:19', 0, 0, '1'),
(24, 'vikas', '5858585858', 'gh@gmail.com', '4/5/2000', 'dsvfvbdvdb', 'rajasthan', 'jaipur', '123456', 'ffdvdvd', NULL, NULL, NULL, 'assets/uploads/users/users20211119021140.png', 'assets/uploads/users/users20211119021140.png', 'fgjklgjljlksjlkdfjlsjldjl', '183.83.45.20', '2021-11-19 14:54:40', 0, 0, '1'),
(25, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.20.107', '2021-11-19 14:58:33', 0, 0, '1'),
(26, 'a', '2222', 'altaf@gmail.com', '10/10/1999', 'dsss', 'rj', 'nougur', '341510', 'jhj', NULL, NULL, NULL, NULL, '', 'hhhhhhhh', '157.38.20.107', '2021-11-19 15:02:21', 0, 0, '1'),
(27, 'a', '1234567897', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031120.png', 'assets/uploads/users/users20211119031120.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:13:20', 0, 0, '1'),
(28, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031131.png', 'assets/uploads/users/users20211119031131.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:13:31', 0, 0, '1'),
(29, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031108.png', 'assets/uploads/users/users20211119031108.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:14:08', 0, 0, '1'),
(30, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:14:51', 0, 0, '1'),
(31, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:22:51', 0, 0, '1'),
(32, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031128.png', 'assets/uploads/users/users20211119031128.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:23:28', 0, 0, '1'),
(33, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, 'assets/uploads/users/users20211119031138.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:23:38', 0, 0, '1'),
(34, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031157.png', '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:23:57', 0, 0, '1'),
(35, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119031113.png', '', 'dfhkdhfskfdfhskdjfdfjs', '157.38.18.162', '2021-11-19 15:26:13', 0, 0, '1'),
(36, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, 'assets/uploads/users/users20211119041158.png', 'assets/uploads/users/users20211119041158.png', 'dfhkdhfskfdfhskdjfdfjs', '157.38.247.219', '2021-11-19 16:04:58', 0, 0, '1'),
(37, 'Bh', '789568545', 'Altaf@gmail.com', 'Nn', 'Nsnsbs', 'Nsnsn', 'nougur', 'Jsbsbsb', 'Nsbsns', NULL, NULL, NULL, 'assets/uploads/users/users20211119101135.jpg', 'assets/uploads/users/users20211119101135.jpg', 'hhhhhhhh', '157.38.1.64', '2021-11-19 22:07:35', 0, 0, '1'),
(38, 'piyush', '1234567888', 'test@gmail.com', '1002-10-10', 'sodala jaipur', '28', 'Jaipur', '302019', 'fineoutput', NULL, NULL, '', 'assets/uploads/users/users20211120041148.png', 'assets/uploads/users/users20211120041148.png', '0c9ot4sbBWDiJPCMjFY3NOImZyeqf8', '183.83.45.20', '2021-11-20 16:07:48', 0, 0, '1'),
(39, 'tegsdbds', '541415645414', 'fgdfg@gmail.com', '0011-02-11', 'sdfbsdhfcbx bhnf nfnmsdmn', '28', 'Jaipur', '2303030303', 'gbndfigdfjjgvn', NULL, NULL, '', 'assets/uploads/users/users20211120041103.png', '', '0c9ot4sbBWDiJPCMjFY3NOImZyeqf8', '183.83.45.20', '2021-11-20 16:09:03', 0, 0, '1'),
(40, 'radhe', '111111111111', 'fggnfn@jbg.com', '2010-10-01', 'hfgnbfghbf', '28', 'Jaipur', '232322', 'hbnhgfgbgh', NULL, NULL, '', 'assets/uploads/users/users20211120061106.png', '', 'WLlpDHTj4hRbNMugqV9rBAztJxK7eG', '183.83.45.20', '2021-11-20 18:10:06', 0, 0, '1'),
(41, 'htfgthftgh', '12322131231', 'ffgndfjkgjnjfn@fjn.com', '2000-02-10', 'hjghjghjmnhvbnhvb', '28', 'Jaipur', '1213131', 'hjhjvjg', NULL, NULL, '', 'assets/uploads/users/users20211120061102.png', '', 'WLlpDHTj4hRbNMugqV9rBAztJxK7eG', '183.83.45.20', '2021-11-20 18:11:02', 0, 0, '1'),
(42, 'vghfghhn', '1212121212', 'xvxcvnxj@gmail.com', '2000-02-20', 'gdfgdfgfdfg', '28', 'Jaipur', '1212312', 'xfgdfgdfdf', NULL, NULL, '', 'assets/uploads/users/users20211120061112.png', '', 'WLlpDHTj4hRbNMugqV9rBAztJxK7eG', '183.83.45.20', '2021-11-20 18:12:12', 0, 0, '1'),
(43, 'Abc', '8654345678', 'Abc@gail.com', '2021-12-31', 'oifjojfiowqfhiqhg', '13', 'Samba', '767676', 'Abcd', NULL, NULL, '876789', 'assets/uploads/users/users20211120061127.jpg', '', '9E2spU3VrTkYyXWFIf0uOnPM8zvwtc', '183.83.43.2', '2021-11-20 18:22:27', 0, 0, '1'),
(44, 'radhe', '41564156452', 'gfdgdfg@gmail.com', '0001-02-20', 'rasdgfdgfd', '28', 'Jaipur', '302022', 'hfghbgb', NULL, NULL, '', 'assets/uploads/users/users20211120061128.png', '', 'aJshguxnRPf49D1jeOLbWrCE3GVXv7', '183.83.45.20', '2021-11-20 18:54:28', 0, 0, '1'),
(45, 'vnvn', '869476940047', 'vnvn@gmail.con', '2024-04-23', 'fsdfwq', '20', 'Mumbai City', 'efwqfw', 'lk;trjeoehyphhp', NULL, NULL, '575775', 'assets/uploads/users/users20211120071119.jpg', '', '7uOWi0KnMbgvdsTFErZxNe1mhc4Vqk', '183.83.43.2', '2021-11-20 19:03:19', 0, 0, '1'),
(46, 'vikash kumar jha', '748842', 'vjha8300@gmail.com', '2021-02-23', '21 south colony , Jhotwara', '28', 'Churu', '302012', 'ggkkh', NULL, NULL, '1234567', 'assets/uploads/users/users20211122111139.jpg', '', 'uYqyi74MaAoI52sB8Ejzc1kfKebN9U', '183.83.43.2', '2021-11-22 11:37:39', 0, 0, '1'),
(47, 'a', '7976475854', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011119.jpg', 'assets/uploads/users/users20211122011119.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:08:19', 0, 0, '1'),
(48, 'a', '7976475854', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011131.jpg', 'assets/uploads/users/users20211122011131.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:14:31', 0, 0, '1'),
(49, 'a', '7976475854', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011134.jpg', 'assets/uploads/users/users20211122011134.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:14:34', 0, 0, '1'),
(50, 'a', '1234567892', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011148.jpg', 'assets/uploads/users/users20211122011148.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:15:48', 0, 0, '1'),
(51, 'a', '1234567892', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011111.jpg', 'assets/uploads/users/users20211122011111.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:19:11', 0, 0, '1'),
(52, 'a', '1234567892', 'altaf@gmail.com', '10//10/199', 'ssss', 'rj', 'nougur', '11', 'fine', NULL, NULL, NULL, 'assets/uploads/users/users20211122011155.jpg', 'assets/uploads/users/users20211122011155.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:19:55', 0, 0, '1'),
(53, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011137.jpg', 'assets/uploads/users/users20211122011137.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:24:37', 0, 0, '1'),
(54, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011151.jpg', 'assets/uploads/users/users20211122011151.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:24:51', 0, 0, '1'),
(55, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011136.jpg', 'assets/uploads/users/users20211122011136.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:25:36', 0, 0, '1'),
(56, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011139.jpg', 'assets/uploads/users/users20211122011139.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:25:39', 0, 0, '1'),
(57, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011158.jpg', 'assets/uploads/users/users20211122011158.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:25:58', 0, 0, '1'),
(58, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011158.jpg', 'assets/uploads/users/users20211122011158.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:25:58', 0, 0, '1'),
(59, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011129.jpg', 'assets/uploads/users/users20211122011129.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:26:29', 0, 0, '1'),
(60, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011119.jpg', 'assets/uploads/users/users20211122011119.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:27:19', 0, 0, '1'),
(61, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011125.jpg', 'assets/uploads/users/users20211122011125.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:28:25', 0, 0, '1'),
(62, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011137.jpg', 'assets/uploads/users/users20211122011137.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:28:37', 0, 0, '1'),
(63, 'vikash kumar jha', '7488421637', 'vjha8300@gmail.com', '2002-02-23', '21 south colony , Jhotwara', '28', 'Hanumangarh', '302012', 'lkjhwioufho', NULL, NULL, '12345678', 'assets/uploads/users/users20211122011143.png', '', 'uYqyi74MaAoI52sB8Ejzc1kfKebN9U', '183.83.43.2', '2021-11-22 13:28:43', 0, 0, '1'),
(64, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011135.jpg', 'assets/uploads/users/users20211122011135.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:42:35', 0, 0, '1'),
(65, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011135.jpg', 'assets/uploads/users/users20211122011135.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:42:35', 0, 0, '1'),
(66, 'q', '1234567892', 'altag@gmail.com', '10/10/199', 'ssss', 'rj', 'nougur', 'edeee', 'ddd', NULL, NULL, NULL, 'assets/uploads/users/users20211122011107.jpg', 'assets/uploads/users/users20211122011107.jpg', 'hhhhhhhh', '157.38.229.149', '2021-11-22 13:44:07', 0, 0, '1'),
(67, 'Abc', '7488421645', 'Abc@gmail.com', '2222-02-22', '21 south colony , Jhotwara', '28', 'Churu', '302012', 'dkljsdiughwsgih', NULL, NULL, '23456', 'assets/uploads/users/users20211122061112.jpg', '', 'kwnZBEPlc8yiL6G1e5FHOapXb2tVfS', '183.83.43.2', '2021-11-22 18:00:12', 0, 0, '1'),
(68, 'radhe test', '9521459091', 'demo@gmail.com', '1000-10-10', 'test', '28', 'Jaipur', '302020', 'tech', NULL, NULL, '', 'assets/uploads/users/users20211124101124.png', '', 'D0Vu5XcZPgNxw9IqMHjvlCBhy7kiKU', '183.83.45.218', '2021-11-24 10:54:24', 0, 0, '1'),
(69, 'anc', '67667678', 'Abc@gmail.com', '2222-03-12', '21 south colony , Jhotwara', '0', 'South Andaman', '302012', 'bvb', NULL, NULL, '23456', 'assets/uploads/users/users20211124111156.png', '', 'mnpKx0vl2b3CJhcPoIryjBRQMEe6wd', '183.83.43.2', '2021-11-24 11:10:56', 0, 0, '1'),
(70, 'Aa', '9982367691', 'Altaf@gmail.com', '10/10/1999', 'Aa', 'Rj', 'nougur', 'Jj', 'Jj', NULL, NULL, NULL, 'assets/uploads/users/users20211124011130.jpg', 'assets/uploads/users/users20211124011130.jpg', 'hhhhhhhh', '157.47.219.27', '2021-11-24 13:00:30', 0, 0, '1'),
(71, 'Kk', '9982325642', 'Altaf@gmail.com', '10101999', 'भी', 'Jpr', 'nougur', 'Hh', 'J', NULL, NULL, NULL, 'assets/uploads/users/users20211124011101.jpg', 'assets/uploads/users/users20211124011101.jpg', 'hhhhhhhh', '157.47.219.27', '2021-11-24 13:04:01', 0, 0, '1'),
(72, 'Kk', '9982325642', 'Altaf@gmail.com', '10101999', 'भी', 'Jpr', 'nougur', 'Hh', 'J', NULL, NULL, NULL, 'assets/uploads/users/users20211124011106.jpg', 'assets/uploads/users/users20211124011106.jpg', 'hhhhhhhh', '157.47.219.27', '2021-11-24 13:06:06', 0, 0, '1'),
(73, 'Kk', '9982325642', 'Altaf@gmail.com', '10101999', 'भी', 'Jpr', 'nougur', 'Hh', 'J', NULL, NULL, NULL, 'assets/uploads/users/users20211124011146.jpg', 'assets/uploads/users/users20211124011146.jpg', 'hhhhhhhh', '157.47.219.27', '2021-11-24 13:06:46', 0, 0, '1'),
(74, 'Vv', '2222222222', 'Altf@gmail.com', '19191911', 'Bh', 'Rj', 'nougur', 'Bh', 'Bb', NULL, NULL, NULL, 'assets/uploads/users/users20211124011158.jpg', 'assets/uploads/users/users20211124011158.jpg', 'hhhhhhhh', '157.47.219.27', '2021-11-24 13:11:58', 0, 0, '1'),
(75, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031120.jpg', 'assets/uploads/users/users20211124031120.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:08:20', 0, 0, '1'),
(76, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031145.jpg', 'assets/uploads/users/users20211124031145.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:08:45', 0, 0, '1'),
(77, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031115.jpg', 'assets/uploads/users/users20211124031115.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:09:15', 0, 0, '1'),
(78, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031125.jpg', 'assets/uploads/users/users20211124031125.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:09:25', 0, 0, '1'),
(79, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031113.jpg', 'assets/uploads/users/users20211124031113.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:11:13', 0, 0, '1'),
(80, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031153.jpg', 'assets/uploads/users/users20211124031153.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:11:53', 0, 0, '1'),
(81, 'A', '5555555555', 'Altaf@gmail.com', '10/10/1999', 'Njj', 'Jj', 'nougur', '667777', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20211124031105.jpg', 'assets/uploads/users/users20211124031105.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:12:05', 0, 0, '1'),
(82, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.47.196.220', '2021-11-24 15:27:34', 0, 0, '1'),
(83, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.47.196.220', '2021-11-24 15:27:54', 0, 0, '1'),
(84, 'a', '7976475854', 'altaf@gmail.com', '10/10/1999', 'dshbgbhghjg', 'rj', 'ng', '341510', 'fn', NULL, NULL, NULL, NULL, '', 'dfhkdhfskfdfhskdjfdfjs', '157.47.196.220', '2021-11-24 15:28:13', 0, 0, '1'),
(85, 'Y', '3538353535', 'altaf@gmail.com', '10/10/1999', 'Ff', 'Ff', 'nougur', '555555', 'Ff', NULL, NULL, NULL, 'assets/uploads/users/users20211124031148.jpg', 'assets/uploads/users/users20211124031148.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:41:48', 0, 0, '1'),
(86, 'Y', '3538353535', 'altaf@gmail.com', '10/10/1999', 'Ff', 'Ff', 'nougur', '555555', 'Ff', NULL, NULL, NULL, 'assets/uploads/users/users20211124031137.jpg', 'assets/uploads/users/users20211124031137.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:43:37', 0, 0, '1'),
(87, 'Y', '3538353535', 'altaf@gmail.com', '10/10/1999', 'Ff', 'Ff', 'nougur', '555555', 'Ff', NULL, NULL, NULL, 'assets/uploads/users/users20211124031114.jpg', 'assets/uploads/users/users20211124031114.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:44:14', 0, 0, '1'),
(88, 'Y', '3538353535', 'altaf@gmail.com', '10/10/1999', 'Ff', 'Ff', 'nougur', '555555', 'Ff', NULL, NULL, NULL, 'assets/uploads/users/users20211124031138.jpg', 'assets/uploads/users/users20211124031138.jpg', 'hhhhhhhh', '157.47.196.220', '2021-11-24 15:44:38', 0, 0, '1'),
(89, 'Tushar Dangayach', '1231331133', 'sadsds@gmail.com', '23/11/1111', '1712 BAJAJ BHAWAN', '28', 'Hanumangarh', '302003', 'Curious Life', NULL, NULL, '132231', 'assets/uploads/users/users20211125041139.jpeg', '', 'CKAyhWg4M0o87H63YPdSFOfsVqZNe2', '183.83.43.2', '2021-11-25 16:32:39', 0, 0, '1'),
(90, 'fweui', '2355273', 'Abc@gmail.com', '22/22/2222', 'fsdfwq', '15', 'Hassan', 'efwqfw', 'dkljsdiughwsgih', NULL, NULL, '876789', 'assets/uploads/users/users20211126061105.jpg', '', 'Ia2YnyqHvA59Vsr3zkbdjcpKGSNFeE', '183.83.43.2', '2021-11-26 18:03:05', 0, 0, '1'),
(91, 'gbfgfgvbfgv', '1231231231', 'piyush123@gmail.com', '10/10/2020', 'cgvbgvbf', '28', 'Jaipur', '222222', 'tech', NULL, NULL, '', 'assets/uploads/users/users20211126071125.jpg', '', 'd0NqXBLuw2Ec148KCkO6hgWsxoHDrV', '183.83.45.218', '2021-11-26 19:02:25', 0, 0, '1'),
(92, 'Altaf', '8302720087', 'salim@gmail.com', '10/10/1999', 'Bb', '29', 'nougur', 'Hhh', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20211126071134.jpg', 'assets/uploads/users/users20211126071134.jpg', 'hhhhhhhh', '157.47.217.33', '2021-11-26 19:42:34', 0, 0, '1'),
(93, 'Altaf', '8302720086', 'salim@gmail.com', '10/10/1999', 'Bb', '29', 'nougur', 'Hhh', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20211126071143.jpg', 'assets/uploads/users/users20211126071143.jpg', 'hhhhhhhh', '157.47.217.33', '2021-11-26 19:43:43', 0, 0, '1'),
(94, 'Altaf', '8302755555', 'salim@gmail.com', '10/10/1999', 'Bb', '29', 'nougur', 'Hhh', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20211126071154.jpg', 'assets/uploads/users/users20211126071154.jpg', 'hhhhhhhh', '157.47.217.33', '2021-11-26 19:43:54', 0, 0, '1'),
(95, 'Hhh', '9785306265', 'atf@gmail.com', '10/10/1999', 'Fff', '29', 'nougur', '555556', 'Fub', NULL, NULL, NULL, 'assets/uploads/users/users20211126091100.jpg', 'assets/uploads/users/users20211126091100.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:09:00', 0, 0, '1'),
(96, 'Hhh', '9785306265', 'atf@gmail.com', '10/10/1999', 'Fff', '29', 'nougur', '555556', 'Fub', NULL, NULL, NULL, 'assets/uploads/users/users20211126091148.jpg', 'assets/uploads/users/users20211126091148.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:10:48', 0, 0, '1'),
(97, 'Hhh', '9785306255', 'atf@gmail.com', '10/10/1999', 'Fff', '0', 'nougur', '555556', 'Fub', NULL, NULL, NULL, 'assets/uploads/users/users20211126091113.jpg', 'assets/uploads/users/users20211126091113.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:11:13', 0, 0, '1'),
(98, 'Vmvv', '7976475854', 'Hehe@gmail.com', '55/44/4444', 'Bhh', '29', 'nougur', 'Gg', 'Gg', NULL, NULL, NULL, 'assets/uploads/users/users20211126091158.jpg', 'assets/uploads/users/users20211126091158.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:13:58', 0, 0, '1'),
(99, 'Vmvv', '7976475852', 'Hehe@gmail.com', '55/44/4444', 'Bhh', '29', 'nougur', 'Gg', 'Gg', NULL, NULL, NULL, 'assets/uploads/users/users20211126091157.jpg', 'assets/uploads/users/users20211126091157.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:17:57', 0, 0, '1'),
(100, 'Vmvv', '7976475852', 'Hehe@gmail.com', '55/44/4444', 'Bhh', '29', 'nougur', 'Gg', 'Gg', NULL, NULL, NULL, 'assets/uploads/users/users20211126091109.jpg', 'assets/uploads/users/users20211126091109.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:18:09', 0, 0, '1'),
(101, 'Altaf', '7976475854', 'deshwalialtaf@gmal.con', '10/10/19999', 'Aaaa', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20211126091101.jpg', 'assets/uploads/users/users20211126091101.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:22:01', 0, 0, '1'),
(102, 'Ttt', '7976475854', 'deshwalialtaf@gmal.con', '10/10/1999', 'Nnnn', 'null', 'nougur', 'Bbb', 'Nnnn', NULL, NULL, NULL, 'assets/uploads/users/users20211126091116.jpg', 'assets/uploads/users/users20211126091116.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:31:16', 0, 0, '1'),
(103, 'Ttt', '7976475854', 'deshwalialtaf@gmal.con', '10/10/1999', 'Nnnn', 'null', 'nougur', 'Bbb', 'Nnnn', NULL, NULL, NULL, 'assets/uploads/users/users20211126091143.jpg', 'assets/uploads/users/users20211126091143.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:33:43', 0, 0, '1'),
(104, 'Ttt', '7976475854', 'deshwalialtaf@gmal.con', '10/10/1999', 'Nnnn', '29', 'nougur', 'Bbb', 'Nnnn', NULL, NULL, NULL, 'assets/uploads/users/users20211126091116.jpg', 'assets/uploads/users/users20211126091116.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:34:16', 0, 0, '1'),
(105, 'tt', '0000000002', 'tt1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211126091137.jpg', 'assets/uploads/users/users20211126091137.png', 'vdvd', '183.83.45.218', '2021-11-26 21:42:37', 0, 0, '1'),
(106, 'tt', '7976475854', 'tt1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211126091132.jpg', 'assets/uploads/users/users20211126091132.png', 'vdvd', '183.83.45.218', '2021-11-26 21:43:32', 0, 0, '1'),
(107, 'Gg', '7976475888', 'deshwalialtaf@gmal.con', '10/10/1999', 'Ff', '29', 'nougur', '666', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20211126091136.jpg', 'assets/uploads/users/users20211126091136.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 21:51:36', 0, 0, '1'),
(108, 'Altaf', '2222222222', 'deshwalialtaf@gmal.con', '10/10/1999', 'Bbbb', '29', 'nougur', 'Hhh', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20211126101102.jpg', 'assets/uploads/users/users20211126101102.jpg', 'hhhhhhhh', '157.47.224.54', '2021-11-26 22:00:02', 0, 0, '1'),
(109, 'ravi', '9876543210', 'ravi@gmail.com', '11/11/1111', 'KALYANPURI', '28', 'Rajsamand', '302019', 'local', NULL, NULL, '', 'assets/uploads/users/users20211127111148.png', '', 'dSzPxN6uY3tsQaACBq519c0mebgliO', '183.83.45.218', '2021-11-27 11:03:48', 0, 0, '1'),
(110, 'piyush', '9521459521', 'gmail@gmail.com', '11/10/2020', 'test', '28', 'Jaipur', '302020', 'local', NULL, NULL, '', 'assets/uploads/users/users20211127111134.png', '', 'amV3DgULo82fAtkIQrWHGKJRYvuzhw', '183.83.45.218', '2021-11-27 11:41:34', 1, 0, '1'),
(111, 'piyush', '9521459521', 'gmail@gmail.com', '11/10/2020', 'test', '28', 'Jaipur', '302020', 'local', NULL, NULL, '', 'assets/uploads/users/users20211127111148.png', '', 'amV3DgULo82fAtkIQrWHGKJRYvuzhw', '183.83.45.218', '2021-11-27 11:41:48', 0, 0, '1'),
(112, 'piyush', '9521459521', 'gmail@gmail.com', '11/10/2020', 'test', '28', 'Jaipur', '302020', 'local', NULL, NULL, '', 'assets/uploads/users/users20211127111139.png', '', 'amV3DgULo82fAtkIQrWHGKJRYvuzhw', '183.83.45.218', '2021-11-27 11:41:39', 0, 0, '1'),
(113, 'test02', '2121212112', 'test02@gmail.com', '21/21/2212', '1221, 32sdfsf', '28', 'Jaipur', '212121', 'Comp', NULL, NULL, '12', 'assets/uploads/users/users20211127111131.jpg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 11:50:31', 0, 0, '1'),
(114, 'test03', '3211111111', 'test03@gmail.com', '23/12/1332', '21111111111', '28', 'Jaipur', '321111', 'ewewfef', NULL, NULL, '2111221', 'assets/uploads/users/users20211127121137.jpeg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:06:37', 0, 0, '1'),
(115, 'test04', '4322222224', 'gmail@gmail.com', '23/32/4323', '34222222222222dfdf', '28', 'Jaipur', '321111', '32111111', NULL, NULL, '234444444444', 'assets/uploads/users/users20211127121129.jpg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:09:29', 0, 0, '1'),
(116, 'tushar1', '0000000011', 'tushar1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', NULL, '', 'vdvd', '183.83.43.2', '2021-11-27 12:16:29', 0, 0, '1'),
(117, 'test01', '2313211111', 'test04@gmail.com', '12/33/3333', '1712 BAJAJ BHAWAN', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '', 'assets/uploads/users/users20211127121101.jpg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:19:01', 0, 0, '1'),
(118, 'tushar1', '0000000011', 'tushar1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', NULL, '', 'vdvd', '183.83.43.2', '2021-11-27 12:19:15', 0, 0, '1'),
(119, 'tushar1', '0000000011', 'tushar1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', NULL, '', 'vdvd', '183.83.43.2', '2021-11-27 12:19:18', 0, 0, '1'),
(120, 'Tushar Dangayach', '8005843407', 'test04@gmail.com', '13/22/1131', '1712 BAJAJ BHAWAN', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '', 'assets/uploads/users/users20211127121141.jpeg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:20:41', 0, 0, '1'),
(121, 'tt', '0000000005', 'tt1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211127121118.png', '', 'vdvd', '183.83.45.218', '2021-11-27 12:28:18', 0, 0, '1'),
(122, 'Tushar Dangayach', '8005843408', 'dangayacht@gmail.com', '31/22/2222', '1712 BAJAJ BHAWAN', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '1132123', 'assets/uploads/users/users20211127121153.jpeg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:29:53', 0, 0, '1'),
(123, 'ashok', '9898989898', 'pintu@gmail.com', '10/29/2910', 'jdj tonk', '28', 'Jaipur', '345345', 'triust', NULL, NULL, '', 'assets/uploads/users/users20211127121123.jpg', '', 'mWtDBxsF8ar3K5J29USdiYwhRekoMv', '183.83.45.218', '2021-11-27 12:30:23', 0, 0, '1'),
(124, 'abc', '7765432198', 'abc@gmail.com', '22/22/2222', 'dddff', '16', 'Pathanamthitta', '323243', 'nsss', NULL, NULL, '345656', 'assets/uploads/users/users20211127121117.png', '', 'CxE4beqIiSFQ0d1UTVjYgkOp7tMfzN', '183.83.43.2', '2021-11-27 12:31:17', 0, 0, '1'),
(125, 'testuser', '4211111111', 'gmail@gmail.com', '13/22/2222', '132`113`, sd', '28', 'Jaipur', '231111', '33333213', NULL, NULL, '412671427', 'assets/uploads/users/users20211127121138.jpeg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:31:38', 0, 0, '1'),
(126, 'tushar1', '0000000012', 'tushar1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', NULL, '', 'vdvd', '183.83.43.2', '2021-11-27 12:35:28', 0, 0, '1'),
(127, 'tushar1', '0000000013', 'tushar1@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211127121145.jpeg', 'assets/uploads/users/users20211127121145.jpeg', 'vdvd', '183.83.43.2', '2021-11-27 12:38:45', 0, 0, '1'),
(128, 'nitesh', '0000000015', 'nitesh@gmail.com', '03', 'dsvfvbdvdb', 'fvdd', 'vdfvd', '123456', 'ffdvdvd', NULL, NULL, '', 'assets/uploads/users/users20211127121108.jpg', '', 'vdvd', '183.83.43.2', '2021-11-27 12:40:08', 0, 0, '1'),
(129, 'vbvbv', '7575757576', 'ab@gail.co', '38/02/2021', 'sodala', '19', 'Harda', '113232', 'bvb', NULL, NULL, '656543', 'assets/uploads/users/users20211127121104.jpg', '', 'PbgQ9EkrhYeK4vdAHysiO7qJ2DVmT0', '183.83.43.2', '2021-11-27 12:41:04', 0, 0, '1'),
(130, 'akak', '8764646464', 'ak123@gmail.com', '22/03/2021', 'jfjf', '19', 'Dindori', '543434', 'fieoutput', NULL, NULL, '654346', 'assets/uploads/users/users20211127121101.jpeg', '', 'itcj8zKW96Y0nrfwBvm3sNVQdD54eo', '183.83.43.2', '2021-11-27 12:43:01', 0, 0, '1'),
(131, 'bholtu', '8765565645', 'bholtu@gmail.com', '06/10/1998', 'bihar', '16', 'Thiruvananthapuram', '654323', 'fineoutput', NULL, NULL, '123434', 'assets/uploads/users/users20211127121155.png', '', 'TX6pz2fL8bd79gUn5xytos4wVlHSjc', '183.83.43.2', '2021-11-27 12:44:55', 0, 0, '1'),
(132, 'dfw', '2144121243', 'register@gmail.com', '32/35/2235', '342143234', '28', 'Jaipur', '132312', 'sdfsdffsd', NULL, NULL, '32441224', 'assets/uploads/users/users20211127011146.jpg', '', 'JFTBEbaPLCGD8MAc5ef6KnVwodgW1r', '183.83.43.2', '2021-11-27 13:06:46', 0, 0, '1'),
(133, 'test09', '1322222222', 'test09@gmail.com', '13/22/2222', '1223', '28', 'Jaipur', '31321', '3211ewfsd', NULL, NULL, '31222', 'assets/uploads/users/users20211127011143.jpg', '', 'JFTBEbaPLCGD8MAc5ef6KnVwodgW1r', '183.83.43.2', '2021-11-27 13:10:43', 0, 0, '1'),
(134, 'test08', '2133333333', 'test08@gmail.com', '32/11/1111', '412312', '28', 'Jaipur', '123333', '321111111dsv', NULL, NULL, '2144', 'assets/uploads/users/users20211127011126.jpg', '', 'JFTBEbaPLCGD8MAc5ef6KnVwodgW1r', '183.83.43.2', '2021-11-27 13:12:26', 0, 0, '1'),
(135, 'tut', '8769696969', 't123@gmail.com', '06/10/1998', 'bhopal', '15', 'Hassan', '876654', 'iuytrdsasxdcv', NULL, NULL, '4567654', 'assets/uploads/users/users20211127031120.png', '', 'tJ0s3nag98xSVXmPBl4h7bo2dDCMfz', '183.83.43.2', '2021-11-27 15:09:20', 0, 0, '1'),
(136, 'amamam', '7488421639', 'vbvb@gmail.com', '22/22/2222', 'e2e2e21, efwef', '28', 'Jaipur', '302012', 'lrkdjhgkelrhge', NULL, NULL, '', 'assets/uploads/users/users20211127031150.jpg', '', 'SJfhcOR7GZUtm1PWbCleB5dxwnoVr3', '183.83.43.2', '2021-11-27 15:11:50', 0, 0, '1'),
(137, 'bvbvbv', '9889898989', 'b123@gmail.com', '23/32/221', 'fgnfrln', '15', 'Kalaburagi (Gulbarga)', '899898', 'kjgug', NULL, NULL, '543345654', 'assets/uploads/users/users20211127031143.png', '', 'Ax3d6facKTDuy5PZoJh9In2WkQ4mzY', '183.83.43.2', '2021-11-27 15:40:43', 0, 0, '1'),
(138, 'vikash kumar jha', '7488421638', 'vjha8300@gmail.com', '02/34/2222', '21 south colony , Jhotwara', '28', 'Jaisalmer', '302012', 'lsgmlkm', NULL, NULL, '', 'assets/uploads/users/users20211127051132.png', '', 'g4tFvpBYQqUaGxhsWkZ9lMRf0mD2C3', '183.83.43.2', '2021-11-27 17:27:32', 0, 0, '1'),
(139, 'fddgd', '1111111111', 'altaf@gmail.com', '10/10/1999', 'ffffff', '29', 'nougur', '222222', 'dgg', NULL, NULL, NULL, 'assets/uploads/users/users20211127061147.jpg', 'assets/uploads/users/users20211127061147.jpg', 'hhhhhhhh', '157.38.247.219', '2021-11-27 18:43:47', 0, 0, '1'),
(140, 'fddgd', '1111111111', 'altaf@gmail.com', '10/10/1999', 'ffffff', '29', 'nougur', '222222', 'dgg', NULL, NULL, NULL, 'assets/uploads/users/users20211127061144.jpg', 'assets/uploads/users/users20211127061144.jpg', 'hhhhhhhh', '157.38.247.219', '2021-11-27 18:44:44', 0, 0, '1'),
(141, 'Jhhhhhh', '4545444444', 'Altaf@gmail.com', '10/10/1999', 'Din', '29', 'nougur', '777777', 'Jjj', NULL, NULL, NULL, 'assets/uploads/users/users20211127061136.jpg', 'assets/uploads/users/users20211127061136.jpg', 'hhhhhhhh', '157.38.247.219', '2021-11-27 18:48:36', 1, 0, '1'),
(142, 'Tushar Dangayach', '8005843409', 'test@gmail.com', '12/21/3223', '1712 BAJAJ BHAWAN, HALDIYO KA RASTA UCHA KUA JOHARI BAZAR', '28', 'Jaipur', '302003', 'Curious Life', NULL, NULL, '1', 'assets/uploads/users/users20211128111115.jpg', '', 'IV0aOTtJfYpnNxAXsZeQjHGRovLwFE', '182.64.72.221', '2021-11-28 11:23:15', 1, 0, '1'),
(143, 'anay', '9799655891', 'Anay@gmail.com', '03/07/1994', '19 kalyanpuri', '29', 'nougur', '302019', 'fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20211129121132.jpg', 'assets/uploads/users/users20211129121132.jpg', 'hhhhhhhh', '183.83.43.2', '2021-11-29 12:50:32', 0, 0, '1'),
(144, 'anay', '9799655891', 'Anay@gmail.com', '03/07/1994', '19 kalyanpuri', 'null', 'nougur', '302019', 'fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20211129011140.jpg', 'assets/uploads/users/users20211129011140.jpg', 'hhhhhhhh', '183.83.43.2', '2021-11-29 13:04:40', 0, 0, '1'),
(145, 'cvcv', '7488421647', 'cv@gmail.com', '43/32/2021', '21 south colony , Jhotwara', '28', 'Dungarpur', '879979', 'kfrj', NULL, NULL, '123454', 'assets/uploads/users/users20211129011105.jpg', '', 'zPlDmSGNe2XyE1QRYiMjU3bfvH7swA', '183.83.43.2', '2021-11-29 13:07:05', 0, 0, '1'),
(146, 'Hbhhh', '8585858585', 'Altaf@gmail.com', '10/10/1999', 'Ggg', '29', 'nougur', '555555', 'Cc', NULL, NULL, NULL, 'assets/uploads/users/users20211129011129.jpg', 'assets/uploads/users/users20211129011129.jpg', 'hhhhhhhh', '157.47.209.240', '2021-11-29 13:17:29', 0, 0, '1'),
(147, 'Jhjhhh', '6666666525', 'altaf@gmail.com', '10/10/1999', 'Ttt', '29', 'nougur', '666666', 'Ggg', NULL, NULL, NULL, 'assets/uploads/users/users20211129011116.jpg', 'assets/uploads/users/users20211129011116.jpg', 'hhhhhhhh', '157.38.52.159', '2021-11-29 13:30:16', 0, 0, '1'),
(148, 'Altaf', '1212121999', 'altaf@gmail.com', '10/10/1999', 'Addre', '29', 'nougur', '789777', 'Hhh', NULL, NULL, NULL, 'assets/uploads/users/users20211201111232.jpg', 'assets/uploads/users/users20211201111232.jpg', 'hhhhhhhh', '157.38.225.127', '2021-12-01 11:17:32', 0, 0, '1'),
(149, 'd,gmfkh', '7979245523', 'Abc@gmail.com', '23/23/2021', '21 south colony , Jhotwara', '14', 'Lohardaga', '302012', 'ggkkh', NULL, NULL, '345656', 'assets/uploads/users/users20211217061234.jpeg', 'assets/uploads/users/users20211217061234.jpg', 'jvtJIPAnUQmVxOEl8kZqCrph2ioMDN', '183.83.42.120', '2021-12-17 18:45:34', 0, 0, '1'),
(150, 'radhe test', '8686868686', 'demo@gmail.com', '06/10/1998', '104', '2', 'Dibang Valley', '454534', 'khihiuh', NULL, NULL, '', 'assets/uploads/users/users20220103110104.png', '', 'YXtvzDHRx4aKj6MmpJTiWbeylICs7r', '49.205.212.249', '2022-01-03 11:34:04', 0, 0, '1'),
(151, 'Salim', '7777777777', 'Des@gmail.com', '16/12/1999', 'Ddd', '29', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220118050153.jpg', 'assets/uploads/users/users20220118050153.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-18 17:47:53', 0, 0, '1'),
(152, 'Nitesh', '1231231322', 'nitesh@gmail.com', '', 'Jaipur', '29', 'nougur', '302018', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220118050124.jpg', 'assets/uploads/users/users20220118050124.jpg', 'hhhhhhhh', '157.47.219.232', '2022-01-18 17:54:24', 0, 0, '1'),
(153, 'Vvv', '8888888888', 'Grd@gmail.com', '19/12/1999', 'Y', '29', 'nougur', '745854', 'Vc', NULL, NULL, NULL, 'assets/uploads/users/users20220118050137.jpg', 'assets/uploads/users/users20220118050137.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-18 17:57:37', 0, 0, '1'),
(154, 'Vvv', '8888888888', 'Grd@gmail.com', '19/12/1999', 'Y', '29', 'nougur', '745854', 'Vc', NULL, NULL, NULL, 'assets/uploads/users/users20220118050103.jpg', 'assets/uploads/users/users20220118050103.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-18 17:58:03', 0, 0, '1'),
(155, 'Vvv', '8888888888', 'Grd@gmail.com', '19/12/1999', 'Y', '29', 'nougur', '745854', 'Vc', NULL, NULL, NULL, 'assets/uploads/users/users20220118050103.jpg', 'assets/uploads/users/users20220118050103.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-18 17:58:03', 0, 0, '1'),
(156, 'Nitesh', '9887987987', 'nitesh@gmail.com', '', 'Mansarovar', '29', 'nougur', '302019', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220118060102.jpg', 'assets/uploads/users/users20220118060102.jpg', 'hhhhhhhh', '157.47.219.232', '2022-01-18 18:04:02', 0, 0, '1'),
(157, 'nitesh', '9090909090', 'nitesh12@gmail.com', '12/10/2020', 'jaipur', '28', 'Jaipur', '212212', 'fkine', NULL, NULL, '', 'assets/uploads/users/users20220118060115.jpg', '', 'oRmyQnJ0Xc71EaqsfLvuYdl94xkZtb', '49.205.213.89', '2022-01-18 18:06:15', 0, 0, '1'),
(158, 'Bb', '9999999999', 'Ds@gmail.com', '10/10/1999', 'Hh', 'null', 'nougur', 'Hhhhhh', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20220118060111.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-18 18:18:11', 0, 0, '1'),
(159, 'Bb', '9999999999', 'Ds@gmail.com', '10/10/1999', 'Hh', 'null', 'nougur', 'Hhhhhh', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20220118060151.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-18 18:18:51', 0, 0, '1'),
(160, 'Bb', '9999999999', 'Ds@gmail.com', '10/10/1999', 'Hh', 'null', 'nougur', 'Hhhhhh', 'Hh', NULL, NULL, NULL, 'assets/uploads/users/users20220118060157.jpg', 'assets/uploads/users/users20220118060157.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-18 18:20:57', 0, 0, '1'),
(161, 'Ccv', '7777777777', 'Gg@gmail.com', '17/12/1999', 'Trt', 'null', 'nougur', 'Fff', 'Cfd', NULL, NULL, NULL, 'assets/uploads/users/users20220118070139.jpg', '', 'hhhhhhhh', '157.38.104.213', '2022-01-18 19:20:39', 0, 0, '1'),
(162, 'Ccv', '7777777777', 'Gg@gmail.com', '17/12/1999', 'Trt', 'null', 'nougur', 'Fff', 'Cfd', NULL, NULL, NULL, 'assets/uploads/users/users20220118070157.jpg', '', 'hhhhhhhh', '157.38.104.213', '2022-01-18 19:20:57', 0, 0, '1'),
(163, 'Ccv', '7777777777', 'Gg@gmail.com', '17/12/1999', 'Trt', '29', 'nougur', 'Fff', 'Cfd', NULL, NULL, NULL, 'assets/uploads/users/users20220118070141.jpg', '', 'hhhhhhhh', '157.38.104.213', '2022-01-18 19:24:41', 0, 0, '1'),
(164, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070134.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:28:34', 0, 0, '1'),
(165, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070124.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:29:24', 0, 0, '1'),
(166, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070142.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:30:42', 0, 0, '1'),
(167, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070154.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:30:54', 0, 0, '1'),
(168, 'Ccv', '7777777777', 'Gg@gmail.com', '17/12/1999', 'Trt', 'null', 'nougur', 'Fff', 'Cfd', NULL, NULL, NULL, 'assets/uploads/users/users20220118070105.jpg', '', 'hhhhhhhh', '157.38.104.213', '2022-01-18 19:32:05', 0, 0, '1'),
(169, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070136.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:32:36', 0, 0, '1'),
(170, 'Ccv', '7777777777', 'Gg@gmail.com', '17/12/1999', 'Trt', 'null', 'nougur', 'Fff', 'Cfd', NULL, NULL, NULL, 'assets/uploads/users/users20220118070142.jpg', '', 'hhhhhhhh', '157.38.104.213', '2022-01-18 19:35:42', 0, 0, '1'),
(171, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070130.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:39:30', 0, 0, '1'),
(172, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070113.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:40:13', 0, 0, '1'),
(173, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070108.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:42:08', 0, 0, '1'),
(174, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070130.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:43:30', 0, 0, '1'),
(175, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220118070134.jpg', '', 'hhhhhh', '157.38.204.48', '2022-01-18 19:51:34', 0, 0, '1'),
(176, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120117.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:31:17', 0, 0, '1'),
(177, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120126.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:31:26', 0, 0, '1'),
(178, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120153.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:32:53', 0, 0, '1'),
(179, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120123.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:40:23', 0, 0, '1'),
(180, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120145.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:46:45', 0, 0, '1'),
(181, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119120114.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 12:55:14', 0, 0, '1'),
(182, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119010121.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 13:06:21', 0, 0, '1'),
(183, 'piyush', '8745965412', 'piyush@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', NULL, NULL, NULL, 'assets/uploads/users/users20220119010138.jpg', '', 'vdvd', '49.205.213.89', '2022-01-19 13:06:38', 0, 0, '1'),
(184, 'piyush', '8745965412', 'piyush@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', NULL, NULL, NULL, 'assets/uploads/users/users20220119010108.jpg', '', 'vdvd', '49.205.213.89', '2022-01-19 13:07:08', 0, 0, '1'),
(185, 'piyush', '8745965412', 'piyush@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', NULL, NULL, NULL, 'assets/uploads/users/users20220119010115.jpg', '', 'vdvd', '49.205.213.89', '2022-01-19 13:07:15', 0, 0, '1'),
(186, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119010131.jpg', '', 'hhhhhh', '157.38.194.13', '2022-01-19 13:12:31', 0, 0, '1'),
(187, 'Altaf', '5555555555', 'G@gmail.com', '', 'Hh', 'null', 'nougur', '302012', 'H', NULL, NULL, NULL, 'assets/uploads/users/users20220119010139.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 13:25:39', 0, 0, '1'),
(188, 'Altaf', '5555555555', 'G@gmail.com', '', 'Hh', 'null', 'nougur', '302012', 'H', NULL, NULL, NULL, 'assets/uploads/users/users20220119010122.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 13:26:22', 0, 0, '1'),
(189, 'Altaf', '5555555555', 'G@gmail.com', '', 'Hh', '29', 'nougur', '302012', 'H', NULL, NULL, NULL, 'assets/uploads/users/users20220119010139.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 13:28:39', 0, 0, '1'),
(190, 'Hh', '5555555555', 'Gt@gmaik.com', '', 'Hh', '29', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220119020119.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 14:03:19', 0, 0, '1'),
(191, 'Hh', '5555555555', 'Gt@gmaik.com', '', 'Hh', 'null', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220119020148.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 14:08:48', 0, 0, '1');
INSERT INTO `tbl_user_temp` (`id`, `name`, `phone`, `email`, `dob`, `address`, `state`, `district`, `zipcode`, `company_name`, `city`, `house_no`, `gstin`, `image1`, `image2`, `token_id`, `ip`, `date`, `is_active`, `added_by`, `status`) VALUES
(192, 'Hh', '5555555555', 'Gt@gmaik.com', '', 'Hh', 'null', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220119020110.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 14:09:10', 0, 0, '1'),
(193, 'Hh', '5555555555', 'Gt@gmaik.com', '', 'Hh', 'null', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220119020139.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 14:10:39', 0, 0, '1'),
(194, 'Hh', '5555555555', 'Gt@gmaik.com', '', 'Hh', 'null', 'nougur', '302012', 'G', NULL, NULL, NULL, 'assets/uploads/users/users20220119020110.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 14:11:10', 0, 0, '1'),
(195, 'Altaf', '2222222222', 'Desg@gmail.com', '10/10/1999', 'Hh', '29', 'nougur', '302012', 'Gg', NULL, NULL, NULL, 'assets/uploads/users/users20220119030138.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:04:38', 0, 0, '1'),
(196, 'Hg', '2323232323', 'H@gmail.com', '', 'Gf', '29', 'nougur', '96', 'Bh', NULL, NULL, NULL, 'assets/uploads/users/users20220119030104.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:41:04', 0, 0, '1'),
(197, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030128.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:54:28', 0, 0, '1'),
(198, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030133.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:54:33', 0, 0, '1'),
(199, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030156.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:54:56', 0, 0, '1'),
(200, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030125.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:55:25', 0, 0, '1'),
(201, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030135.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:55:35', 0, 0, '1'),
(202, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030129.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:57:29', 0, 0, '1'),
(203, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', '29', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030150.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:57:50', 0, 0, '1'),
(204, 'Mf', '2323232323', 'Al@gmail.com', '', 'V', 'null', 'nougur', '302015', 'B', NULL, NULL, NULL, 'assets/uploads/users/users20220119030137.jpg', 'assets/uploads/users/users20220119030137.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-19 15:58:37', 0, 0, '1'),
(205, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119040102.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 16:33:02', 0, 0, '1'),
(206, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119050138.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 17:32:38', 0, 0, '1'),
(207, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119050104.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 17:33:04', 0, 0, '1'),
(208, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119050143.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 17:33:43', 0, 0, '1'),
(209, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119050135.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 17:43:35', 0, 0, '1'),
(210, 'jn', '77777777777', 'alt@gmail.com', '10/10/19999', 'mnb', '29', 'n', '302012', 'f', NULL, NULL, NULL, 'assets/uploads/users/users20220119050154.jpg', '', 'hhhhhh', '157.38.58.190', '2022-01-19 17:43:54', 0, 0, '1'),
(211, 'Altafpathn', '2323232323', 'Gh@gmail.com', '', 'Gg', '29', 'nougur', '302012', 'Cg', NULL, NULL, NULL, 'assets/uploads/users/users20220119050144.jpg', '', 'hhhhhhhh', '157.38.58.190', '2022-01-19 17:46:44', 0, 0, '1'),
(212, 'Altafpathn', '2323232323', 'Gh@gmail.com', '', 'Gg', '29', 'nougur', '302012', 'Cg', NULL, NULL, NULL, 'assets/uploads/users/users20220119050117.jpg', 'assets/uploads/users/users20220119050117.jpg', 'hhhhhhhh', '157.38.58.190', '2022-01-19 17:47:17', 0, 0, '1'),
(213, 'Radhe', '3213213213', 'Radhe123@gmail.com', '', 'Jaipur', '29', 'nougur', '302022', 'Fineout', NULL, NULL, NULL, 'assets/uploads/users/users20220120100142.jpg', '', 'hhhhhhhh', '157.38.27.18', '2022-01-20 10:27:42', 0, 0, '1'),
(214, 'Nitesh Shah', '8387039990', 'Nitish@gmail.com', '', 'Mansarovar', '12', 'nougur', '123123', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220120010104.jpg', '', 'hhhhhhhh', '49.205.213.89', '2022-01-20 13:34:04', 0, 0, '1'),
(215, 'Deep', '9887988798', 'Deep@gmail.com', '', 'Ndjdn', '9', 'nougur', '302020', 'Test', NULL, NULL, NULL, 'assets/uploads/users/users20220121030141.jpg', '', 'hhhhhhhh', '49.205.213.89', '2022-01-21 15:44:41', 0, 0, '1'),
(216, 'Prakash', '9928071101', 'Prakashan@gmail.com', '', 'Tonk road', '29', 'nougur', '302019', 'SSP', NULL, NULL, NULL, 'assets/uploads/users/users20220122050138.jpg', '', 'hhhhhhhh', '49.205.213.89', '2022-01-22 17:24:38', 0, 0, '1'),
(217, 'Altaf', '7976475852', 'Desh@Gmail.com', '10/10/1999', 'Address', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220124010120.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-24 13:42:20', 0, 0, '1'),
(218, 'Altaf', '7976475851', 'Deshwali@gmaill.com', '10/10/1999', 'Dess', '29', 'nougur', '302012', 'Tt', NULL, NULL, NULL, 'assets/uploads/users/users20220124010119.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-24 13:52:19', 0, 0, '1'),
(219, 'Altaf', '7976475853', 'Des@gmail.com', '10/10/1999', 'Add', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220124040116.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-24 16:05:16', 0, 0, '1'),
(220, 'Altaf', '7976475855', 'Des@gmail.com', '10/10/1999', 'Hhhhh', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220124050107.jpg', '', 'hhhhhhhh', '157.38.74.41', '2022-01-24 17:25:07', 0, 0, '1'),
(221, 'Le altaf', '7976475861', 'H@gmail.com', '10/10/1999', 'Hh', 'null', 'nougur', '302012', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220124050127.jpg', '', 'hhhhhhhh', '157.38.74.41', '2022-01-24 17:38:27', 0, 0, '1'),
(222, 'Altaf', '7976475859', 'Deshwali.03@gmail.com', '10/10/1999', 'Hhh', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220124070156.jpg', '', 'hhhhhhhh', '157.47.227.121', '2022-01-24 19:15:56', 0, 0, '1'),
(223, 'Altaf', '7976473030', 'deshwalialtaf@gmal.con', '10/10/1999', 'Deshwali mohla', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220124080114.jpg', '', 'hhhhhhhh', '157.47.234.56', '2022-01-24 20:29:14', 0, 0, '1'),
(224, 'Altaf', '7976472030', 'deshwalialtaf@gmal.con', '10/10/1999', 'Adres', '29', 'nougur', '302012', 'H', NULL, NULL, NULL, 'assets/uploads/users/users20220124090159.jpg', '', 'hhhhhhhh', '157.47.234.56', '2022-01-24 21:05:59', 0, 0, '1'),
(225, 'Samsu', '7976472020', 'Des@gmail.com', '10/10/1999', 'Adress', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220125110150.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-25 11:00:50', 0, 0, '1'),
(226, 'Samsu', '7976472020', 'Des@gmail.com', '10/10/1999', 'Adress', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220125110159.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-25 11:00:59', 0, 0, '1'),
(227, 'Altaf', '7976471010', 'T@gmail.com', '', 'Merta', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220125110112.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-25 11:07:12', 0, 0, '1'),
(228, 'Altaf', '7976471010', 'T@gmail.com', '', 'Merta', 'null', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220125110120.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-25 11:08:20', 0, 0, '1'),
(229, 'Altaf', '7976471010', 'T@gmail.com', '', 'Merta', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220125110137.jpg', '', 'hhhhhhhh', '157.38.104.19', '2022-01-25 11:08:37', 0, 0, '1'),
(230, 'Nitesh shah', '8890388889', 'nitesh@gmail.com', '', 'Mansarovar', '29', 'nougur', '302019', 'Fine so', NULL, NULL, NULL, 'assets/uploads/users/users20220125110158.jpg', '', 'hhhhhhhh', '49.205.212.237', '2022-01-25 11:15:58', 0, 0, '1'),
(231, 'ALTAF PATHAN', '7976471111', 'Altaf@GMAIL.COM', '10/10/1999', 'Jothwara', '29', 'nougur', '302012', 'Fine', NULL, NULL, NULL, 'assets/uploads/users/users20220127020110.jpg', '', 'hhhhhhhh', '157.38.98.29', '2022-01-27 14:56:10', 0, 0, '1'),
(232, 'Aaaaaa', '9521459091', 'Desh@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Fineoutpit', NULL, NULL, NULL, 'assets/uploads/users/users20220128070106.jpg', '', 'hhhhhhhh', '157.47.221.184', '2022-01-28 19:12:06', 0, 0, '1'),
(233, 'Aaaaaa', '9521459091', 'Desh@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Fineoutpit', NULL, NULL, NULL, 'assets/uploads/users/users20220128070126.jpg', '', 'hhhhhhhh', '157.47.221.184', '2022-01-28 19:12:26', 0, 0, '1'),
(234, 'Aaaaaa', '9521459091', 'Desh@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Fineoutpit', NULL, NULL, NULL, 'assets/uploads/users/users20220128070154.jpg', '', 'hhhhhhhh', '157.47.221.184', '2022-01-28 19:12:54', 0, 0, '1'),
(235, 'ALTAF', '9521459090', 'Desh@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Fineouput', NULL, NULL, NULL, 'assets/uploads/users/users20220128070119.jpg', '', 'hhhhhhhh', '157.47.221.184', '2022-01-28 19:16:19', 0, 0, '1'),
(236, 'ALTAF', '7976474040', 'deshwalialtaf@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Finoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220129120113.jpg', '', 'hhhhhhhh', '157.38.72.50', '2022-01-29 12:06:13', 0, 0, '1'),
(237, 'ALTAF', '7976474040', 'deshwalialtaf@gmail.com', '', 'Jothwara', '29', 'nougur', '302012', 'Finoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220129120126.jpg', '', 'hhhhhhhh', '157.38.72.50', '2022-01-29 12:06:26', 0, 0, '1'),
(238, 'Animesh Sharma', '7014224653', 'sanimesh21@gmail.com', '21/10/1994', '19 kalyanpuri', '29', 'nougur', '302019', 'Fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220202110227.jpg', '', 'hhhhhhhh', '49.205.213.10', '2022-02-02 11:36:27', 0, 0, '1'),
(239, 'radhe', '9787767245', 'radhe123@gmail.com', '11/01/1998', 'sodala jaipur', '28', 'Nagaur', '302022', 'nitish shah', NULL, NULL, '', 'assets/uploads/users/users20220202020206.jpg', '', 'vWKJByu5iSkAVdrXDHf3QCagtz98cL', '49.205.213.10', '2022-02-02 14:06:06', 0, 0, '1'),
(240, 'testnameFOP', '1321321321', 'fineoutput@gmail.com', '03/02/1999', 'this is testing addresss FOP', '28', 'Jaipur', '303223', 'FOP', NULL, NULL, '213123121231', 'assets/uploads/users/users20220202080211.jpg', 'assets/uploads/users/users20220202080211.jpg', 'CsvxBAZETSYtrXmR7iDPf1KU0IunJw', '49.205.213.10', '2022-02-02 20:58:11', 0, 0, '1'),
(241, 'fineOutPut test', '9898989898', 'finetestoutput@gmail.com', '02/03/1999', 'this is another testing address', '28', 'Jaipur', '132132', 'fineoutput testing', NULL, NULL, '564654654654', 'assets/uploads/users/users20220206070225.jpg', 'assets/uploads/users/users20220206070225.jpg', 'bB6a0RlNzJrTAEXKMvdqk8uWYZP743', '49.205.213.10', '2022-02-06 19:44:25', 0, 0, '1'),
(242, 'piyush', '9879879879', 'piyush@gmail.com', '11/11/1998', 'sodala', '28', 'Jaipur', '302022', 'fineout', NULL, NULL, '', 'assets/uploads/users/users20220217030242.png', '', 'vplFzaK8xct3jOikge6GWLBA4hXTVN', '49.205.213.184', '2022-02-17 15:47:42', 0, 0, '1'),
(243, 'Piyush', '9521459091', 'Rtrd@gmail.com', '11,10,1992', 'Fjfufuf', '29', 'nougur', '302022', 'Ghhv', NULL, NULL, NULL, 'assets/uploads/users/users20220219110254.jpg', '', 'hhhhhhhh', '49.205.213.122', '2022-02-19 11:20:54', 0, 0, '1'),
(244, 'Bhanu pratap', '9929098564', 'bhanusinghnaruka@gmail.com', '14,07,1989', 'Jaipur', '29', 'nougur', '302021', 'Supreme Technocom', NULL, NULL, NULL, 'assets/uploads/users/users20220223080237.jpg', '', 'hhhhhhhh', '157.38.231.153', '2022-02-23 20:56:36', 0, 0, '1'),
(245, 'piyush', '8989898989', 'piyush@gmail.com', '1998-10-12', 'sodala', '28', 'Jaipur', '302020', 'fine', NULL, NULL, '', 'assets/uploads/users/users20220302020308.jpg', '', 'dHj2NhvPoZW73L0X6Q5mgycKAbwnOJ', '49.205.213.93', '2022-03-02 14:46:08', 0, 0, '1'),
(246, 'test', '9999999999', 'testr@gmail.com', '11/10/1998', 'sodala', '28', 'Jaipur', '202202', 'fine', NULL, NULL, '', 'assets/uploads/users/users20220302030345.jpg', '', 'SJadX6u2em9I3njO4DACowq5W0lpvb', '49.205.213.93', '2022-03-02 15:34:45', 0, 0, '1'),
(247, 'nitesh', '0000000000', 'nitesh@gmail.com', '09/45/2024', 'vdvd', '14', 'Latehar', '302052', 'sccs', NULL, NULL, '', 'assets/uploads/users/users20220303110308.jpg', '', 'null', '49.205.213.93', '2022-03-03 11:11:08', 0, 0, '1'),
(248, 'rohbit', '1111111111', 'rohit@gmail.com', '12/12/1212', 'sodala', '2', 'Changlang', '202020', 'fien', NULL, NULL, '', 'assets/uploads/users/users20220303110337.jpg', '', 'yg910YTdflnG4wpcKq57kUQAiM2FOJ', '49.205.213.93', '2022-03-03 11:14:37', 0, 0, '1'),
(249, 'vsdvs', '6552952929', 'nitesdsh@gmail.com', '25/25/1262', 'vdvd', '14', 'Koderma', '302052', 'sccs', NULL, NULL, '', 'assets/uploads/users/users20220303010329.jpg', '', 'vjQgD7mxae1NZtFuEB5J0TMiHkIWAn', '49.205.213.93', '2022-03-03 13:28:29', 0, 0, '1'),
(250, 'nitesh', '8387039990', 'nitesh@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', NULL, NULL, NULL, NULL, '', 'vdvd', '49.205.213.93', '2022-03-03 14:22:16', 0, 0, '1'),
(251, 'nitesh', '8387039990', 'nitesh@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', NULL, NULL, NULL, 'assets/uploads/users/users20220303020340.jpg', '', 'vdvd', '49.205.213.93', '2022-03-03 14:22:40', 0, 0, '1'),
(252, 'nitesh', '8387039990', 'nitesh@mail.com', '03/12/1984', 'vvd', 'dvdv', 'vdvd', '302054', 'vdvd', 'ca', 'ca', NULL, 'assets/uploads/users/users20220303020353.jpg', '', 'vdvd', '49.205.213.93', '2022-03-03 14:23:53', 0, 0, '1'),
(253, 'pavan', '9898989898', 'pavan@gmail.com', '11/10/2020', 'sodala', '28', 'Jaipur', '302020', 'test', 'jaipur', '12', '', 'assets/uploads/users/users20220303020306.jpg', '', 'vjQgD7mxae1NZtFuEB5J0TMiHkIWAn', '49.205.213.93', '2022-03-03 14:27:06', 0, 0, '1'),
(254, 'manoj', '3333333333', 'manoj@gmail.com', '10/10/1220', 'shyam nagar', '28', 'Jaipur', '302022', 'testing', 'sodalal', '12', '', 'assets/uploads/users/users20220303020325.jpg', '', 'sMf0S7aivFr8lZg2WtzPyL35ph1oQk', '49.205.213.93', '2022-03-03 14:37:25', 0, 0, '1'),
(255, 'Nitesh', '0000000000', 'NITESH@GMAIL.COM', NULL, 'Mansarover', '28', 'ONE', '302021', 'F9output', 'Jaipur', NULL, '', 'assets/uploads/users/users20220309030305.jpg', NULL, 'riXGVd78Bz1WQsx3qjl5oYnpaF0M4c', '49.204.165.81', '2022-03-09 15:52:05', 0, 0, '1'),
(256, 'Nitesh', '0000000000', 'nitesh@gmail.com', NULL, 'cas', '28', 'cvsd', '302101', 'FINE', 'Jaipur', NULL, '', 'assets/uploads/users/users20220309030328.jpg', NULL, '7jDB0RxU8QTCXthPW1SdIwrYyOzpNK', '49.204.165.81', '2022-03-09 15:53:28', 0, 0, '1'),
(257, 'salim', '8302720087', 'salim@gmail.com', '', 'asdf', '29', 'nougur', '302012', 'fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220323030351.jpg', '', 'hhhhhhhh', '157.38.25.237', '2022-03-23 15:55:51', 0, 0, '1'),
(258, 'salim', '8302720087', 'salim@gmail.com', '', 'asdf', '29', 'nougur', '302012', 'fineoutput', NULL, NULL, NULL, 'assets/uploads/users/users20220323030334.jpg', '', 'hhhhhhhh', '157.38.25.237', '2022-03-23 15:56:34', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE `tbl_vendors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gstin` varchar(250) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityname` varchar(250) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '1: Approved| 2:Pending| 3:Rejected',
  `is_active` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videochannel`
--

CREATE TABLE `tbl_videochannel` (
  `id` int(12) NOT NULL,
  `filter_name` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewproducts`
--

CREATE TABLE `tbl_viewproducts` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `categoryname` varchar(100) DEFAULT NULL,
  `subcategoryname` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_states`
--
ALTER TABLE `all_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appbanner`
--
ALTER TABLE `tbl_appbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appslider`
--
ALTER TABLE `tbl_appslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bodymaterial`
--
ALTER TABLE `tbl_bodymaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cameratype`
--
ALTER TABLE `tbl_cameratype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_iproducts`
--
ALTER TABLE `tbl_iproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_irdistance`
--
ALTER TABLE `tbl_irdistance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ledtype`
--
ALTER TABLE `tbl_ledtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_length`
--
ALTER TABLE `tbl_length`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lens`
--
ALTER TABLE `tbl_lens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_minorcategory`
--
ALTER TABLE `tbl_minorcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poeports`
--
ALTER TABLE `tbl_poeports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poetype`
--
ALTER TABLE `tbl_poetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sataports`
--
ALTER TABLE `tbl_sataports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_screensize`
--
ALTER TABLE `tbl_screensize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe_us`
--
ALTER TABLE `tbl_subscribe_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_two_images`
--
ALTER TABLE `tbl_two_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_temp`
--
ALTER TABLE `tbl_user_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_videochannel`
--
ALTER TABLE `tbl_videochannel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_viewproducts`
--
ALTER TABLE `tbl_viewproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_states`
--
ALTER TABLE `all_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_appbanner`
--
ALTER TABLE `tbl_appbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_appslider`
--
ALTER TABLE `tbl_appslider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bodymaterial`
--
ALTER TABLE `tbl_bodymaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cameratype`
--
ALTER TABLE `tbl_cameratype`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_iproducts`
--
ALTER TABLE `tbl_iproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_irdistance`
--
ALTER TABLE `tbl_irdistance`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ledtype`
--
ALTER TABLE `tbl_ledtype`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_length`
--
ALTER TABLE `tbl_length`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lens`
--
ALTER TABLE `tbl_lens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_minorcategory`
--
ALTER TABLE `tbl_minorcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poeports`
--
ALTER TABLE `tbl_poeports`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poetype`
--
ALTER TABLE `tbl_poetype`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sataports`
--
ALTER TABLE `tbl_sataports`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_screensize`
--
ALTER TABLE `tbl_screensize`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_store`
--
ALTER TABLE `tbl_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subscribe_us`
--
ALTER TABLE `tbl_subscribe_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_two_images`
--
ALTER TABLE `tbl_two_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user_temp`
--
ALTER TABLE `tbl_user_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_videochannel`
--
ALTER TABLE `tbl_videochannel`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_viewproducts`
--
ALTER TABLE `tbl_viewproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
