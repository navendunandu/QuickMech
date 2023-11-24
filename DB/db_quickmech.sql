-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 12:41 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_quickmech`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(4, 'Volkswagen', '9874563210', 'volkswagenoff@gmail.com', 'Aa123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `booking_date` varchar(50) NOT NULL,
  `booking_fortime` varchar(50) NOT NULL,
  `booking_details` varchar(500) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `booking_rate` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_fordate` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `vehicle_vinno` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_fortime`, `booking_details`, `vehicle_no`, `service_id`, `booking_rate`, `user_id`, `booking_fordate`, `branch_id`, `vehicle_vinno`, `booking_status`) VALUES
(5, '2023-11-11', '22:43', 'qdf', '3456', 13, 0, 1, '2023-11-25', 21230, 56543, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(50) NOT NULL auto_increment,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `branch_photo` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `branch_email` varchar(50) NOT NULL,
  `branch_contact` varchar(100) NOT NULL,
  `branch_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21267 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_address`, `branch_photo`, `place_id`, `branch_email`, `branch_contact`, `branch_password`) VALUES
(21230, 'Volkswagen,Aluva', 'Volkswagen,opposite metro piller no.67,Aluva', 'download (1).jpg', 13, 'volkswagenaluva@gmail.com', '8756246598', '1234567'),
(21231, 'Volkswagen,Edapally', 'Volkswagen,opposite metro piller no.356,Edappally', 'download (1).jpg', 15, 'volkswagenedpally@gmail.com', '9876543210', '123'),
(21232, 'Volkswagen,Muvattupuzha', 'Volkswagen,Kolenchery road,Muvattupuzha', 'download (1).jpg', 16, 'volkswagenmvta@gmail.com', '9638527410', '8598'),
(21235, 'Volkswagen,Venpalavattom', 'Volkswagen, NH Bypass,Venpalavattom', 'download (2).jpg', 18, 'volkswagentvm@gmail.com', '6584289568', '6584'),
(21238, 'Volkswagen,Pala', 'Volkswagon,Near Kottaramattom Bus Stand', 'download (3).jpg', 19, 'volkswagenpala@gmail.com', '8459685495', '1563'),
(21239, 'Volkswagen,Erattupetta', 'Volkswagon,Kaduvamuzhi,Erattupetta', 'download (4).jpg', 20, 'volkswagenertp@gmail.com', '8090708898', '5678'),
(21240, 'Volkswagen,Taliparamba', 'Volkswagen,Near Hotel Crown Plaza,Taliparamba', 'download (5).jpg', 21, 'volkswagentali@gmail.com', '9866994409', '55555'),
(21241, 'Volkswagen,Kannur', 'Volkswagen, Opp Private Bus Stand,Kannur', 'download.jpg', 22, 'volkswagenknr@gmail.com', '9545954400', '44444'),
(21242, 'Volkswagen,Adkathbail,Siraj Nagar', 'Volkswagen,Near KSRCT Bus Stand', 'images (1).jpg', 23, 'volkswagentadk@gmail.com', '9922929238', '33333'),
(21245, 'Volkswagen,Sulthan Bathery', 'Volkswagen,Near City Mall,Sulthan Bathery', 'images (3).jpg', 25, 'volkswagensultb@gmail.com', '9494857656', '11111'),
(21246, 'Volkswagen,Punalur', 'Volkswagen,Opp KSRTC Bus Stand', 'images (1).jpg', 26, 'volkswagenpunalur@gmail.com', '9999888823 ', '121212'),
(21247, 'Volkswagen,Kollam', 'Volkswagen,Near New Bus Stand,Kollam', 'images (4).jpg', 27, 'volkswagenkollam@gmail.com', '8888999923', '232323'),
(21253, 'Volkswagen,Kalpetta', 'Volkswagen,NH 766,Madiyur,Kalpetta', 'images (8).jpg', 24, 'volkswagenkalpetta@gmail.com', '9767471290', '666444'),
(21254, 'Volkswagen,Irinjalakuda', 'Volkswagen,Irinjalakuda Kottoor Rd,Irinjalakuda ', 'images (9).jpg', 28, 'volkswageneri@gmail.com', '9087654379', '565456'),
(21255, 'Volkswagen,Chavakkad', 'Volkswagen, Panchavadi Beach Rd,Chavakkad', 'images (10).jpg', 29, 'volkswagencha@gmail.com', '7068768090', '45662'),
(21256, 'Volkswagen,Pattambi', 'Volkswagen, Koombankallu,Pattambi Pattambi - Cherp', 'images (11).jpg', 30, 'volkswagenpattambi@gmail.com', '7687679091', '3344221'),
(21257, 'Volkswagen,Ottapalam', 'Volkswagen,Thozhupadam- Ottapalam Rd,Ottapalam ', 'images (4).jpg', 31, 'volkswagenottapalam@gmail.com', '8098784567', '7771'),
(21258, 'Volkswagen,Thiruvalla', 'Volkswagen,opposite Hotel Tilak,Thiruvalla', 'images (12).jpg', 32, 'volkswagenthiruvalla@gmail.com', '7887678909', '8881'),
(21259, 'Volkswagen,Adoor', 'Volkswagen,Kayamkulam - Pathanapuram Rd, Adoor', 'images 10.jpg', 33, 'volkswagenadoor@gmail.com', '6787679089', '9991'),
(21260, 'Volkswagen,Puthenathani', 'Volkswagen,Near Carbon Automotives,Puthenathani', 'images.jpg', 34, 'volkswagenputhen@gmail.com', '7009008001', '1112'),
(21261, 'Volkswagen,Nilambur', 'Volkswagen, Peevees Complex, Main Road, Nilambur', 'images (14).jpg', 35, 'volkswagennilambur@gmail.com', '9080715444', '55577777'),
(21263, 'Volkswagen,Kozhikode ', 'Volkswagen,Kannur Rd, Pavangad,Kozhikode ', 'images (15).jpg', 36, 'volkswagenkozhikode@gmail.com', '6090235467', '9876'),
(21264, 'Volkswagen,Alappuzha', 'Volkswagen,NH 66, opp. Valiyakalavoor temple, Path', 'images (16).jpg', 37, 'volkswagenalappuzha@gmail.com', '6969790989', '369'),
(21266, 'Volkswagen,Thodupuzha', 'Volkswagon,Near Smitha Hospital,Vengalloor,Thodupu', 'images 10.jpg', 17, 'volkswagentdpa@gmail.com', '6556982585', '2255');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(14, 'Ernakulam'),
(15, 'Idukki'),
(16, 'Trivandrum'),
(17, 'Kottayam'),
(18, 'Kannur'),
(19, 'Kasargod'),
(20, 'Kozhikode'),
(21, 'Wayanad'),
(22, 'Kollam'),
(23, 'Thrissur'),
(24, 'Palakkad'),
(25, 'Pathanamthitta'),
(26, 'Malappuram'),
(27, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_qstn1` varchar(50) NOT NULL,
  `feedback_qstn2` varchar(50) NOT NULL,
  `feedback_qstn3` varchar(50) NOT NULL,
  `feedback_qstn4` varchar(50) NOT NULL,
  `feedback_qstn5` varchar(50) NOT NULL,
  `feedback_qstn6` varchar(50) NOT NULL,
  `feedback_qstn7` varchar(50) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `feedback_msg` varchar(100) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_qstn1`, `feedback_qstn2`, `feedback_qstn3`, `feedback_qstn4`, `feedback_qstn5`, `feedback_qstn6`, `feedback_qstn7`, `booking_id`, `feedback_msg`) VALUES
(1, 'YES', 'YES', 'YES', 'YES', 'YES', 'Extreamely likely', 'Friend,Family or colleague', 5, 'Good'),
(2, 'YES', 'YES', 'YES', 'YES', 'YES', 'Extreamely likely', 'Friend,Family or colleague', 5, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(11, 0, 'Thodupuzha'),
(12, 0, 'Muttom'),
(13, 14, 'Aluva'),
(15, 14, 'Edappally'),
(16, 14, 'Muvattupuzha'),
(17, 15, 'Thodupuzha'),
(18, 16, 'Nh Bypass, Venpalavattom'),
(19, 17, 'Pala'),
(20, 17, 'Erattupettta'),
(21, 18, 'Taliparamba'),
(22, 18, 'Kannur'),
(23, 19, 'Adkathbail,Siraj Nagar'),
(24, 21, 'Kalpetta'),
(25, 21, 'Sulthan Bathery'),
(26, 22, 'Punalur'),
(27, 22, 'Kollam Town'),
(28, 23, 'Irinjalakuda'),
(29, 23, 'Chavakkad'),
(30, 24, 'Pattambi'),
(31, 24, 'Ottapalam'),
(32, 25, 'Thiruvalla'),
(33, 25, 'Adoor'),
(34, 26, 'Puthenathani'),
(35, 26, 'Nilambur'),
(36, 20, 'Kozhikode'),
(37, 27, 'Pathirappally');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicedetails`
--

CREATE TABLE `tbl_servicedetails` (
  `service_id` int(50) NOT NULL auto_increment,
  `service_title` varchar(100) NOT NULL,
  `service_details` varchar(50) NOT NULL,
  `service_price` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `service_image` varchar(100) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  PRIMARY KEY  (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_servicedetails`
--

INSERT INTO `tbl_servicedetails` (`service_id`, `service_title`, `service_details`, `service_price`, `type_id`, `service_image`, `vehicle_id`) VALUES
(13, 'Second Service', 'Second', '3500', 4, '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(50) NOT NULL auto_increment,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(4, 'First Service'),
(5, 'Second Service'),
(6, 'Third Service'),
(7, 'Customer Requirement');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `place_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `place_id`, `user_name`, `user_gender`, `user_contact`, `user_email`, `user_password`, `user_photo`) VALUES
(1, '11', 'Nora', 'Male', '905846248', 'jeevacarlose@yahoo.com', 'asdf', 'Desert.jpg'),
(2, '11', 'Nora', 'Male', '905846248', 'jeevacarlose@yahoo.com', 'asdf', 'Hydrangeas.jpg'),
(3, '27', ' jozzzzz', 'Male', '9058465455', 'krkeey@hotmail.com', '123456', 'Penguins.jpg'),
(4, '-----Select-----', '', '', '', 'A', '', ''),
(5, '-----Select-----', '', '', '9058462489', 'gfddytyfu', '', ''),
(6, '-----Select-----', '', '', '9058462489', 'gfddytyfu', '', ''),
(7, '13', 'Nora', 'Male', '9058462482', '222', 'awqqw12121A', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechicletype`
--

CREATE TABLE `tbl_vechicletype` (
  `vechicletype_id` int(11) NOT NULL auto_increment,
  `vechicletype_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`vechicletype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_vechicletype`
--

INSERT INTO `tbl_vechicletype` (`vechicletype_id`, `vechicletype_name`) VALUES
(5, 'Sedan'),
(6, 'HatchBack'),
(8, 'SUV'),
(9, 'Minivan'),
(10, 'Station Wagon'),
(11, 'Crossover'),
(12, 'Coupe'),
(13, 'Convertible'),
(14, 'Compact car'),
(15, 'Sports car');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `vehicle_id` int(50) NOT NULL auto_increment,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicletype_id` int(50) NOT NULL,
  PRIMARY KEY  (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicle_id`, `vehicle_name`, `vehicletype_id`) VALUES
(18, 'VIRTUS', 6),
(20, 'POLO                                              ', 5),
(26, 'TAIGUN', 8),
(27, 'PASSAT', 5);
