-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2020 at 03:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `national_day`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `is_super`) VALUES
(5, 'test', 'test@test.com', '123456', 0),
(7, 'super admin', 'super@admin.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `merchant_id` int(11) NOT NULL,
  `merchant_name` varchar(255) NOT NULL,
  `merchant_email` varchar(255) NOT NULL,
  `merchant_password` varchar(255) NOT NULL,
  `merchant_mobile` varchar(255) NOT NULL,
  `merchant_address` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `merchant_desc` text NOT NULL,
  `merchant_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`merchant_id`, `merchant_name`, `merchant_email`, `merchant_password`, `merchant_mobile`, `merchant_address`, `active`, `merchant_desc`, `merchant_image`) VALUES
(3, 'تاجر ١', 'merchant@merchant.com', '123456', '22222', '434444', 1, '', '1599661077screen shot 2020-09-06 at 5.51.04 pm.png'),
(6, 'aaa', 'aaaa@aaaccc.com', '123456', '1234567', 'مكة المكرمة', 1, '', NULL),
(8, 'ayman', 'aa221@aa.com', '123456', '1234567', 'مكة المكرمة', 1, '', NULL),
(9, 'ayman', 'ayman@ayman.com', '1234567', '123456', 'جدة', 1, 'تحربةتربحر ', NULL),
(10, 'تاجر ٣', 'm1@m1.com', '123456', '1234567', 'مكة المكرمة', 1, 'jjj', NULL),
(11, 'test22', 'test2222@tes.com', '123456', '2222', 'الرياض', 1, 'asdsad', NULL),
(12, 'تاجر ٥', 'merchant22@mm.com', '123456', '1234567', 'مكة المكرمة', 1, 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_contest`
--

CREATE TABLE `merchant_contest` (
  `m_contest_id` int(11) NOT NULL,
  `merchant_id` varchar(150) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `votes` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `sponsor_email` varchar(255) NOT NULL,
  `sponsor_password` varchar(255) NOT NULL,
  `sponsor_mobile` varchar(255) NOT NULL,
  `sponsor_address` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `gold` tinyint(1) DEFAULT NULL,
  `sponsor_desc` text NOT NULL,
  `sponsor_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`, `sponsor_email`, `sponsor_password`, `sponsor_mobile`, `sponsor_address`, `active`, `gold`, `sponsor_desc`, `sponsor_image`) VALUES
(1, 'راعي ذهبي', 'aa@aa.com', '123456', '1234567', 'الرياض', 1, 1, 'حساب ذهبي ', '1600185720screen shot 2020-08-22 at 12.05.21 pm.png'),
(2, 'حساب فضي', 'test@test.com', '123456', '1234567', 'الرياض', 1, NULL, 'حساب فضي', '1600185677download.jpeg'),
(3, 'test', 'missa@test.com', '123456', '1234567', 'الرياض', 1, NULL, 'ss', '1600186281screen shot 2020-09-15 at 12.22.29 am.png'),
(4, 'test', 'a1@a.com', '123', '123', 'الرياض', 1, NULL, '11', NULL),
(5, 'test', 'a2@a.com', '123', '123', 'الرياض', 1, NULL, 'dd', NULL),
(6, 'test', 'a3@a.com', '123', '123', 'مكة المكرمة', 1, NULL, '111', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_contest`
--

CREATE TABLE `sponsor_contest` (
  `spc_id` int(11) NOT NULL,
  `sponsor_id` varchar(255) NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_admin`
--

CREATE TABLE `uploads_admin` (
  `upload_admin_id` int(11) NOT NULL,
  `upload_file_admin` varchar(255) NOT NULL,
  `upload_for_all` tinyint(1) DEFAULT '1',
  `for_merchants` tinyint(1) DEFAULT '0',
  `for_users` tinyint(1) DEFAULT '0',
  `for_sponsors` tinyint(1) DEFAULT '0',
  `admin_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_merchants`
--

CREATE TABLE `uploads_merchants` (
  `upload_merchant_id` int(11) NOT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `upload_merchant_file` varchar(255) NOT NULL,
  `upload_merchant_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_sponsors`
--

CREATE TABLE `uploads_sponsors` (
  `upload_sponsor_id` int(11) NOT NULL,
  `sponsor_id` varchar(255) NOT NULL,
  `upload_sponsor_file` varchar(255) NOT NULL,
  `upload_sponsor_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_users`
--

CREATE TABLE `uploads_users` (
  `upload_user_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `upload_user_file` varchar(255) NOT NULL,
  `upload_user_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `admin_id` varchar(11) DEFAULT NULL,
  `user_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `user_address`, `active`, `admin_id`, `user_desc`) VALUES
(3, 'أحمد', 'aa@aa.com', '123456', '12455531513', 'jeddah', 1, '4', ''),
(9, 'مشارك 1', 'aa@aaa.com', '123', '1111', '333', 1, '4', ''),
(10, 'aaaa', 'test@test.com', '123', '123', '111', 1, '4', ''),
(13, 'aaaa', 'aaaaaa@aaaa.com', '1234567', '1234567890', 'aaaa', 1, '7', ''),
(24, 'ayman', 'a2a@aa.com', '12344', '111', 'الرياض', 1, NULL, ''),
(27, 'aaa', 'aasdrea@aa.com', '123456', '1234567', 'الرياض', 1, NULL, ''),
(28, 'aaaa', 'a231412412412a@aa.com', '12345', '1234567', 'الرياض', 1, NULL, ''),
(29, 'اايمن', 'ssss@saklf.com', '123456', '123455', 'الرياض', 1, NULL, 'تجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة تجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربةتجربة');

-- --------------------------------------------------------

--
-- Table structure for table `user_contest`
--

CREATE TABLE `user_contest` (
  `contest_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_email` varchar(255) NOT NULL,
  `v_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`v_id`, `v_name`, `v_email`, `v_password`) VALUES
(1, 'ayman', 'aymanalkhalil12@gmail.com', '123456'),
(2, 'test', 'test@test.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `voters_active_contest`
--

CREATE TABLE `voters_active_contest` (
  `v_c_id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `sponsor_id` varchar(255) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `user_contest_id` varchar(255) DEFAULT NULL,
  `merchant_contest_id` varchar(255) DEFAULT NULL,
  `voted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voter_contest`
--

CREATE TABLE `voter_contest` (
  `v_c_id` int(11) NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `contest_id` varchar(255) NOT NULL,
  `voted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voter_merchant_contest`
--

CREATE TABLE `voter_merchant_contest` (
  `v_m_c_id` int(11) NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `m_contest_id` varchar(255) NOT NULL,
  `voted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `merchant_contest`
--
ALTER TABLE `merchant_contest`
  ADD PRIMARY KEY (`m_contest_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `sponsor_contest`
--
ALTER TABLE `sponsor_contest`
  ADD PRIMARY KEY (`spc_id`);

--
-- Indexes for table `uploads_admin`
--
ALTER TABLE `uploads_admin`
  ADD PRIMARY KEY (`upload_admin_id`);

--
-- Indexes for table `uploads_merchants`
--
ALTER TABLE `uploads_merchants`
  ADD PRIMARY KEY (`upload_merchant_id`);

--
-- Indexes for table `uploads_sponsors`
--
ALTER TABLE `uploads_sponsors`
  ADD PRIMARY KEY (`upload_sponsor_id`);

--
-- Indexes for table `uploads_users`
--
ALTER TABLE `uploads_users`
  ADD PRIMARY KEY (`upload_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_contest`
--
ALTER TABLE `user_contest`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `voters_active_contest`
--
ALTER TABLE `voters_active_contest`
  ADD PRIMARY KEY (`v_c_id`);

--
-- Indexes for table `voter_contest`
--
ALTER TABLE `voter_contest`
  ADD PRIMARY KEY (`v_c_id`);

--
-- Indexes for table `voter_merchant_contest`
--
ALTER TABLE `voter_merchant_contest`
  ADD PRIMARY KEY (`v_m_c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merchant_contest`
--
ALTER TABLE `merchant_contest`
  MODIFY `m_contest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sponsor_contest`
--
ALTER TABLE `sponsor_contest`
  MODIFY `spc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads_admin`
--
ALTER TABLE `uploads_admin`
  MODIFY `upload_admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads_merchants`
--
ALTER TABLE `uploads_merchants`
  MODIFY `upload_merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploads_sponsors`
--
ALTER TABLE `uploads_sponsors`
  MODIFY `upload_sponsor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads_users`
--
ALTER TABLE `uploads_users`
  MODIFY `upload_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_contest`
--
ALTER TABLE `user_contest`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voters_active_contest`
--
ALTER TABLE `voters_active_contest`
  MODIFY `v_c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voter_contest`
--
ALTER TABLE `voter_contest`
  MODIFY `v_c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voter_merchant_contest`
--
ALTER TABLE `voter_merchant_contest`
  MODIFY `v_m_c_id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
