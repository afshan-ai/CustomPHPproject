-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql.appsforcompany.com
-- Generation Time: Jul 24, 2020 at 12:25 AM
-- Server version: 5.7.29-log
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developer_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_admin`
--

CREATE TABLE `dentalsb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_admin`
--

INSERT INTO `dentalsb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '940b98f37d94243ec9fca8e3c7fa7a59');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_appointment`
--

CREATE TABLE `dentalsb_appointment` (
  `id` int(11) NOT NULL,
  `appointment_type` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment` varchar(250) NOT NULL,
  `office` varchar(250) NOT NULL,
  `scheduled_time` varchar(250) NOT NULL,
  `new_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_appointment`
--

INSERT INTO `dentalsb_appointment` (`id`, `appointment_type`, `provider_id`, `note`, `appointment_date`, `appointment_time`, `status`, `user_id`, `appointment`, `office`, `scheduled_time`, `new_user`) VALUES
(136, 1, 1, '', '2020-07-22', 'Before 12 P.M.(Morning)', 'approved', 53, 'In Person', 'Mississauga Office', '9.00 am', 0),
(137, 2, 1, 'Jc Jc', '2020-07-22', 'Before 12.00 pm', 'approved', 55, 'In Person', 'Office', '9.00 am', 0),
(138, 1, 1, 'Freed', '2020-07-22', '12.00 pm - 4.00 pm', 'approved', 56, 'In Person', 'Office', '9.00 am', 0),
(139, 1, 1, '', '2020-07-28', 'Before 12 P.M.(Morning)', 'approved', 58, 'In Person', 'Mississauga Office', '9.00 am', 0),
(140, 1, 1, 'Dfgd', '2020-07-22', 'Before 12.00 pm', 'approved', 59, 'In Person', 'Office', '9.00 am', 0),
(141, 3, 1, 'Sdgsd', '2020-07-21', 'Before 12.00 pm', 'approved', 60, 'In Person', 'Office', '9.00 am', 0),
(142, 1, 1, '', '2020-07-30', 'Before 12 P.M.(Morning)', 'approved', 61, 'In Person', 'Mississauga Office', '9.00 am', 0),
(143, 1, 1, '', '2020-07-29', 'Before 12 P.M.(Morning)', 'approved', 61, 'In Person', 'Mississauga Office', '9.00 am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_appointment_type`
--

CREATE TABLE `dentalsb_appointment_type` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_appointment_type`
--

INSERT INTO `dentalsb_appointment_type` (`id`, `title`, `duration`) VALUES
(1, 'New Patient Exam', 'Approx 60 Min'),
(2, 'Dental Emergency', 'Approx 30 - 60 Min'),
(3, 'Dental Consultation', 'Approx 30 Min');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_category`
--

CREATE TABLE `dentalsb_category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_category`
--

INSERT INTO `dentalsb_category` (`id`, `title`) VALUES
(1, 'Dentist'),
(2, 'Dental Hygienist'),
(3, 'Office Manager');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_chat`
--

CREATE TABLE `dentalsb_chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dt` datetime NOT NULL,
  `from_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_chat`
--

INSERT INTO `dentalsb_chat` (`id`, `user_id`, `message`, `dt`, `from_user`) VALUES
(1, 10, 'hi', '2020-06-16 02:20:13', 0),
(2, 10, 'hello', '2020-06-16 02:24:01', 0),
(3, 0, 'Test', '2020-06-16 02:30:20', 10),
(4, 10, 'Test Chat', '2020-06-16 02:36:03', 0),
(5, 10, 'Test Chat', '2020-06-16 02:36:41', 0),
(6, 10, 'I am testing', '2020-06-16 02:39:42', 0),
(7, 10, 'hi John', '2020-06-16 02:44:32', 0),
(8, 10, 'hh', '2020-06-16 02:44:44', 0),
(9, 10, 'I am good', '2020-06-16 02:52:52', 0),
(10, 0, 'I have a query', '2020-06-16 05:02:22', 10),
(11, 10, 'Yes tell me', '2020-06-16 03:10:38', 0),
(12, 0, 'I have a query', '2020-06-16 05:15:43', 10),
(13, 10, 'What is your query', '2020-06-16 03:26:26', 0),
(14, 0, 'I have a query', '2020-06-16 05:26:33', 10),
(15, 0, 'Hi', '2020-06-16 10:45:13', 10),
(16, 0, 'Hi', '2020-06-16 10:47:49', 11),
(17, 10, 'hello', '2020-06-16 08:48:00', 0),
(18, 11, 'Hello', '2020-06-16 08:54:18', 0),
(19, 0, 'I have a query', '2020-06-16 10:55:01', 11),
(20, 11, 'Please tell me', '2020-06-16 08:55:08', 0),
(21, 11, 'ok', '2020-06-16 09:02:23', 0),
(22, 11, 'ok', '2020-06-16 09:24:29', 0),
(23, 0, 'ok hi', '2020-06-16 11:46:40', 1),
(24, 1, 'yes tell me', '2020-06-16 11:37:23', 0),
(25, 0, 'hello testing 1 2 3 4 5 6', '2020-06-17 12:08:21', 1),
(26, 1, 'hi test message', '2020-06-16 11:40:04', 0),
(27, 1, 'hi', '2020-06-16 11:40:53', 0),
(28, 0, 'connecting', '2020-06-17 12:12:53', 1),
(29, 1, 'yes connected', '2020-06-16 11:43:24', 0),
(30, 0, 'further testing', '2020-06-17 12:18:32', 1),
(31, 1, 'calling', '2020-06-16 11:48:40', 0),
(32, 0, 'is it fine', '2020-06-17 12:25:48', 1),
(33, 0, 'ok now looks fine', '2020-06-17 12:28:46', 1),
(34, 1, 'ok thank you', '2020-06-16 12:06:33', 0),
(35, 0, 'hi admin , are you here?', '2020-06-17 12:36:37', 1),
(36, 0, 'hi hello now 12.47', '2020-06-17 12:47:37', 1),
(37, 0, 'it\'s take little long', '2020-06-17 12:47:50', 1),
(38, 1, 'Ki chai', '2020-06-16 12:25:39', 0),
(39, 0, 'check', '2020-06-17 12:56:50', 1),
(40, 0, 'check', '2020-06-17 12:57:20', 1),
(41, 1, 'what?', '2020-06-16 12:28:35', 0),
(42, 1, 'Type something', '2020-06-16 12:28:52', 0),
(43, 1, 'I am testing', '2020-06-16 12:29:00', 0),
(44, 0, 'ok msg is coming smoothly,, no problem\n', '2020-06-17 01:08:16', 1),
(45, 1, 'Thank you', '2020-06-16 12:39:36', 0),
(46, 0, 'ok,, welcome', '2020-06-17 01:10:33', 1),
(47, 1, 'hi', '2020-06-17 12:38:23', 0),
(48, 1, 'hi', '2020-06-17 12:41:19', 0),
(49, 1, 'hi', '2020-06-17 12:41:33', 0),
(50, 0, 'good morning', '2020-06-17 01:12:01', 1),
(51, 1, 'Morning', '2020-06-17 12:42:17', 0),
(52, 1, 'hi', '2020-06-17 12:43:28', 0),
(53, 1, 'hi', '2020-06-17 12:43:36', 0),
(54, 11, 'hi', '2020-06-17 12:44:06', 0),
(55, 1, 'hello', '2020-06-17 01:36:45', 0),
(56, 1, 'hi', '2020-06-17 01:37:05', 0),
(57, 0, 'Check', '2020-06-17 08:28:10', 1),
(58, 0, 'Hey', '2020-06-17 08:28:41', 1),
(59, 2, 'hi', '2020-06-17 07:59:52', 0),
(60, 1, 'hi', '2020-06-17 08:01:37', 0),
(61, 1, 'what\'s next?', '2020-06-17 08:03:29', 0),
(62, 0, 'chat test ', '2020-06-17 08:33:35', 1),
(63, 1, 'done?', '2020-06-17 08:03:43', 0),
(64, 12, 'Hi', '2020-06-17 09:32:23', 0),
(65, 1, 'hi', '2020-06-17 11:48:30', 0),
(66, 13, 'hi', '2020-06-17 06:09:05', 0),
(67, 13, 'hi\\', '2020-06-17 06:09:17', 0),
(68, 24, 'hi', '2020-06-18 10:01:21', 0),
(69, 24, 'hi', '2020-06-18 11:15:02', 0),
(70, 0, 'test', '2020-06-19 07:57:43', 24),
(71, 0, 'Bbn', '2020-06-21 04:22:43', 10),
(72, 0, 'ok it\'s tested', '2020-06-22 03:37:17', 1),
(73, 0, 'Hi', '2020-06-24 02:01:20', 10),
(74, 0, 'Hi', '2020-06-24 02:01:21', 10),
(75, 24, 'Hi William', '2020-06-24 02:40:14', 0),
(76, 24, 'hi', '2020-06-24 02:57:04', 0),
(77, 24, 'hello', '2020-06-24 04:57:35', 0),
(78, 24, 'hj', '2020-06-24 05:00:05', 0),
(79, 24, 'hhjjh', '2020-06-24 05:01:04', 0),
(80, 24, 'Hi William', '2020-06-24 05:02:01', 0),
(81, 24, 'Hi William', '2020-06-24 05:02:57', 0),
(82, 24, 'hello', '2020-06-24 05:04:27', 0),
(83, 24, 'Test chat', '2020-06-24 05:05:51', 0),
(84, 24, 'testing notification', '2020-06-24 05:35:31', 0),
(85, 24, 'Hi', '2020-06-24 05:57:26', 0),
(86, 24, 'test', '2020-06-24 06:01:53', 0),
(87, 0, 'hi', '2020-06-24 12:16:44', 13),
(88, 10, 'hi', '2020-06-28 10:12:25', 0),
(89, 0, 'Hi', '2020-06-29 10:29:32', 10),
(90, 10, 'hello', '2020-06-28 10:00:08', 0),
(91, 10, 'good morning', '2020-06-28 10:00:43', 0),
(92, 10, 'morning', '2020-06-28 10:25:53', 0),
(93, 0, 'Hi', '2020-06-29 11:07:25', 4),
(94, 4, 'hello', '2020-06-28 10:38:19', 0),
(95, 0, 'Hi', '2020-06-29 11:08:47', 10),
(96, 0, 'Hi', '2020-06-29 11:08:48', 10),
(97, 4, 'hi jack', '2020-06-28 10:46:43', 0),
(98, 4, 'check', '2020-06-28 10:50:39', 0),
(99, 4, 'hi', '2020-06-28 10:56:24', 0),
(100, 4, 'text', '2020-06-28 10:57:22', 0),
(101, 4, 'check', '2020-06-28 10:59:05', 0),
(102, 4, 'check', '2020-06-28 11:02:56', 0),
(103, 4, 'hello', '2020-06-28 11:05:48', 0),
(104, 4, 'hello', '2020-06-28 11:08:42', 0),
(105, 4, 'test', '2020-06-28 11:09:38', 0),
(106, 24, 'test', '2020-06-29 03:38:54', 0),
(107, 30, 'hi', '2020-06-29 10:50:55', 0),
(108, 30, 'hello', '2020-06-29 10:53:02', 0),
(109, 10, 'hello', '2020-06-29 10:55:35', 0),
(110, 30, 'hi', '2020-06-29 11:01:51', 0),
(111, 0, 'Hi', '2020-07-03 10:42:52', 5),
(112, 5, 'Good morning', '2020-07-02 10:21:50', 0),
(113, 5, 'whats up', '2020-07-03 03:40:26', 0),
(114, 5, 'hello', '2020-07-03 03:41:00', 0),
(115, 0, 'hi\n', '2020-07-03 05:39:41', 5),
(116, 0, 'hi', '2020-07-03 05:41:24', 5),
(117, 0, 'check', '2020-07-03 05:41:50', 5),
(118, 0, 'hi', '2020-07-03 05:43:39', 5),
(119, 0, 'Hello', '2020-07-03 07:58:38', 5),
(120, 0, 'Good', '2020-07-03 07:59:01', 5),
(121, 0, 'Fg', '2020-07-03 08:00:32', 5),
(122, 0, 'Hellogdds', '2020-07-05 04:19:49', 10),
(123, 0, 'Hi', '2020-07-05 04:22:11', 0),
(124, 0, 'User', '2020-07-05 04:22:33', 0),
(125, 0, 'Admin', '2020-07-05 04:23:03', 10),
(126, 0, '', '2020-07-05 04:23:04', 10),
(127, 0, 'Username ', '2020-07-05 04:23:41', 0),
(128, 0, 'Username', '2020-07-05 04:24:17', 0),
(129, 0, 'Gah\nFghkgjkjk\nJhfhjfhfhj\nJggk', '2020-07-05 04:24:52', 0),
(130, 0, 'Fghji', '2020-07-05 04:25:29', 10),
(131, 0, 'Fghji', '2020-07-05 04:25:30', 10),
(132, 0, 'Fvnjk\nHhgjkg\nHggffjj\nHffgh', '2020-07-05 04:25:44', 10),
(133, 0, 'Fvnjk\nHhgjkg\nHggffjj\nHffgh', '2020-07-05 04:25:45', 10),
(134, 0, 'Lhlhklllio', '2020-07-05 04:26:15', 0),
(135, 0, 'Kfgjkj', '2020-07-05 04:40:25', 10),
(136, 0, 'Xvfgdzdfg', '2020-07-05 04:40:42', 10),
(137, 0, 'Sdgsdfgs', '2020-07-05 04:40:46', 10),
(138, 0, 'Sdgsdgdfgdfh', '2020-07-05 04:40:52', 10),
(139, 0, 'Jghjghjgh', '2020-07-05 04:40:52', 10),
(140, 0, 'Ghjghjgh', '2020-07-05 04:40:54', 10),
(141, 0, 'Gdfgdfgdfgdfg', '2020-07-05 04:41:10', 10),
(142, 0, 'Fjfg', '2020-07-05 04:45:09', 10),
(143, 0, 'Thfgh', '2020-07-05 04:45:18', 10),
(144, 0, 'Rgrdgr', '2020-07-05 04:45:25', 10),
(145, 0, 'Dhfgh', '2020-07-05 04:45:57', 10),
(146, 0, 'Sad sdfsd', '2020-07-05 04:49:00', 10),
(147, 0, 'Ghfgh', '2020-07-05 09:03:12', 10),
(148, 0, 'Ffjhkutuoto', '2020-07-05 09:03:24', 10),
(149, 0, 'Kggjkg', '2020-07-05 09:04:31', 10),
(150, 0, 'Hi', '2020-07-05 11:27:30', 41),
(151, 0, 'Hi', '2020-07-09 01:37:35', 41),
(152, 0, 'Fsdf', '2020-07-13 12:33:12', 10),
(153, 0, 'Sertwe', '2020-07-13 12:33:23', 10),
(154, 0, 'I am user', '2020-07-13 12:33:45', 10),
(156, 45, 'Y29va3NkdGxhcHAjMl45aGk=', '2020-07-13 04:24:44', 0),
(157, 45, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 04:24:49', 0),
(158, 45, 'Y29va3NkdGxhcHAjMl45aGk=', '2020-07-13 04:36:43', 0),
(160, 0, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 05:14:50', 45),
(161, 0, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 05:14:54', 45),
(162, 0, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 05:15:02', 45),
(163, 0, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 05:15:06', 45),
(164, 0, 'Y29va3NkdGxhcHAjMl45SGk=', '2020-07-13 05:16:20', 45),
(165, 45, 'Y29va3NkdGxhcHAjMl45aGVsbG8=', '2020-07-13 04:50:01', 0),
(166, 45, 'Y29va3NkdGxhcHAjMl45cG9sbA==', '2020-07-13 04:50:05', 0),
(167, 0, 'Y29va3NkdGxhcHAjMl45Q2hlY2s=', '2020-07-13 05:20:39', 45),
(168, 0, 'Y29va3NkdGxhcHAjMl45dGVzdGluZw==', '2020-07-13 05:36:04', 45),
(169, 45, 'Y29va3NkdGxhcHAjMl45eWVz', '2020-07-13 05:06:52', 0),
(170, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSGkgRG9jdG9y', '2020-07-14 01:49:11', 46),
(171, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSSB3YW50IGFuIGFwcG9pbnRtZW50', '2020-07-14 01:49:28', 46),
(172, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSGk=', '2020-07-14 01:50:14', 46),
(173, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSGVsbG8=', '2020-07-14 01:50:41', 46),
(174, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSGk=', '2020-07-14 01:53:29', 46),
(175, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3Nz', '2020-07-14 01:53:40', 46),
(176, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3Nz', '2020-07-14 01:53:45', 46),
(177, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSSBhbSBBZG1pbg==', '2020-07-14 01:27:04', 0),
(178, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSSBhbSB1c2Vy', '2020-07-14 01:57:43', 46),
(179, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSSBhbSB1c2VyMQ==', '2020-07-14 01:59:59', 46),
(180, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSSBhbSBhZG1pbjE=', '2020-07-14 01:30:08', 0),
(181, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSGkK', '2020-07-14 02:02:46', 46),
(182, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRmdkZmc=', '2020-07-14 02:05:15', 46),
(183, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcXFx', '2020-07-14 01:35:27', 0),
(184, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRHNmc2Q=', '2020-07-14 02:10:48', 46),
(185, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWE=', '2020-07-14 01:41:30', 0),
(186, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZHNm', '2020-07-14 01:43:05', 0),
(187, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', '2020-07-14 02:19:14', 46),
(188, 46, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptd3c=', '2020-07-14 01:49:33', 0),
(189, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2dm', '2020-07-14 02:21:16', 46),
(190, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptaGk=', '2020-07-16 04:35:24', 48),
(191, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpta2luZGx5IGFwcHJvdmUgbXkgYXBwb2ludG1lbnQ=', '2020-07-16 04:36:09', 48),
(192, 48, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVzIGFwcHJvdmVk', '2020-07-16 04:19:38', 0),
(193, 0, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptaGk=', '2020-07-16 11:26:08', 53),
(194, 53, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptaGVsbG8=', '2020-07-16 11:50:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_checkin_status`
--

CREATE TABLE `dentalsb_checkin_status` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `checkin_status` varchar(250) NOT NULL,
  `checkin_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_checkin_status`
--

INSERT INTO `dentalsb_checkin_status` (`id`, `appointment_id`, `checkin_status`, `checkin_note`) VALUES
(1, 29, 'Running Late', 'I am ruuning late.'),
(2, 1, 'Check In', 'check'),
(3, 1, 'Check In', ''),
(4, 1, 'Check In', 'tre'),
(5, 1, 'Check In', 'testt'),
(6, 1, 'Check In', ''),
(7, 1, 'Check In', 'check'),
(8, 1, 'Check In', '\n\n'),
(9, 1, 'Check In', ''),
(10, 1, 'Check In', ''),
(11, 1, 'Check In', 'test '),
(12, 1, 'Check In', 'test'),
(13, 1, 'Check In', ''),
(14, 1, 'Check In', ''),
(15, 1, 'Check In', ''),
(16, 1, 'Check In', 'check'),
(17, 1, 'Check In', 'test'),
(18, 1, 'Check In', 'hh');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_dentalxchange`
--

CREATE TABLE `dentalsb_dentalxchange` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_dentalxchange`
--

INSERT INTO `dentalsb_dentalxchange` (`id`, `description`) VALUES
(1, '<p><span dir=\"ltr\">We are committed to serving the needs of dentists, and we will empower your practice with innovative online services that increase efficiency, lower costs and help your practice grow.</span></p>\r\n\r\n<p><span dir=\"ltr\">Our aim is to become the one-stop solution for dental providers nationwide who wish to stay at the forefront of technology. We strive to be the best in the dental industry.</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_gallery`
--

CREATE TABLE `dentalsb_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_gallery`
--

INSERT INTO `dentalsb_gallery` (`id`, `title`, `image`) VALUES
(5, 'Gallery7', '1594010378gallery7.jpg'),
(6, 'gallery6', '1594010416gallery6.jpg'),
(7, 'g5', '1594010435gallery5.jpg'),
(8, 'g4', '1594010468gallery4.jpg'),
(9, 'g3', '1594010486gallery3.jpg'),
(10, 'g2', '1594010540gallery2.jpg'),
(11, 'g1', '1594010569gallery1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_history_form`
--

CREATE TABLE `dentalsb_history_form` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL,
  `question9` text NOT NULL,
  `question10` text NOT NULL,
  `question11` text NOT NULL,
  `question12` text NOT NULL,
  `question13` text NOT NULL,
  `question14` text NOT NULL,
  `question15` text NOT NULL,
  `question16` text NOT NULL,
  `questiond1` text NOT NULL,
  `questiond2` text NOT NULL,
  `questiond3` text NOT NULL,
  `questiond4` text NOT NULL,
  `questiond5` text NOT NULL,
  `questiond6` text NOT NULL,
  `questiond7` text NOT NULL,
  `questiond8` text NOT NULL,
  `questiond9` text NOT NULL,
  `questiond10` text NOT NULL,
  `questiond11` text NOT NULL,
  `questiond12` text NOT NULL,
  `questiond13` text NOT NULL,
  `questiond14` text NOT NULL,
  `questiond15` text NOT NULL,
  `questiond16` text NOT NULL,
  `questiond17` text NOT NULL,
  `questiond18` text NOT NULL,
  `salutation` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `home_phone` varchar(250) NOT NULL,
  `work_phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `notify` text NOT NULL,
  `notify_name` varchar(250) NOT NULL,
  `notify_email` varchar(250) NOT NULL,
  `notify_phone` varchar(250) NOT NULL,
  `notify_relation` varchar(250) NOT NULL,
  `primary_name` varchar(250) NOT NULL,
  `primary_dob` varchar(250) NOT NULL,
  `primary_realtion` varchar(250) NOT NULL,
  `primary_other` varchar(250) NOT NULL,
  `primary_id` varchar(250) NOT NULL,
  `primary_company` varchar(250) NOT NULL,
  `primary_policy` varchar(250) NOT NULL,
  `primary_sector` varchar(250) NOT NULL,
  `primary_familiar` varchar(250) NOT NULL,
  `secondary_name` varchar(250) NOT NULL,
  `secondary_dob` varchar(250) NOT NULL,
  `secondary_realtion` varchar(250) NOT NULL,
  `secondary_other` varchar(250) NOT NULL,
  `secondary_id` varchar(250) NOT NULL,
  `secondary_company` varchar(250) NOT NULL,
  `secondary_policy` varchar(250) NOT NULL,
  `secondary_sector` varchar(250) NOT NULL,
  `secondary_familiar` varchar(250) NOT NULL,
  `initial` varchar(250) NOT NULL,
  `dt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_history_form`
--

INSERT INTO `dentalsb_history_form` (`id`, `appointment_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`, `question12`, `question13`, `question14`, `question15`, `question16`, `questiond1`, `questiond2`, `questiond3`, `questiond4`, `questiond5`, `questiond6`, `questiond7`, `questiond8`, `questiond9`, `questiond10`, `questiond11`, `questiond12`, `questiond13`, `questiond14`, `questiond15`, `questiond16`, `questiond17`, `questiond18`, `salutation`, `fname`, `lname`, `home_phone`, `work_phone`, `email`, `dob`, `gender`, `notify`, `notify_name`, `notify_email`, `notify_phone`, `notify_relation`, `primary_name`, `primary_dob`, `primary_realtion`, `primary_other`, `primary_id`, `primary_company`, `primary_policy`, `primary_sector`, `primary_familiar`, `secondary_name`, `secondary_dob`, `secondary_realtion`, `secondary_other`, `secondary_id`, `secondary_company`, `secondary_policy`, `secondary_sector`, `secondary_familiar`, `initial`, `dt`) VALUES
(1, 20, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'yes', 'no', 'no', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'yes', 'no', 'no', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'yes', 'yes', 'yes', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 2, 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 2, 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 2, 'no', 'no', 'no', 'yes', 'no', 'yes', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 2, 'no', 'yes', 'no', 'yes', 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', 'yes', 'no', 'yes', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 2, 'yes', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', '', 'no', '', 'yes', '', '', 'yes', '', '', 'yes', 'no', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 64, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'yes', 'yes', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mr.', 'John', 'Doe', '614-56789', '614-57789', 'a@gmail.com', '24/06/1990', 'Male', 'Lorem Ipsum', 'Jane Doe', 'jane@gmail.com', '9830000000', 'daughter', 'abc', '25/06/1990', 'spouse', 'cv', '123', 'CD', '456', 'dn', 'no', 'dsf', '21/06/1990', 'self', 'no', '65', 'hh', '6567', 'bgh', 'yes', 'M.P.', '24/06/2020'),
(16, 50, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', 'joye', '123456', '123456', 'william@gmail.com', '2020-6-23', 'Male', 'kindly note', 'jack', 'sd@g.com', '1234566', '123456', 'willam jack', '', 'Self', 'bro', '123456', 'national', '123456', '2344', 'Yes', '', '', '', '', '', '', '', '', '', 'md', '23-6-2020'),
(17, 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', '', '123456', '', 'william@gmail.com', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'iii', '23-6-2020'),
(18, 64, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mr.', 'John', 'Doe', '614-56789', '614-57789', 'a@gmail.com', '24/06/1990', 'male', 'Lorem Ipsum', 'Jane Doe', 'jane@gmail.com', '9830000000', 'daughter', 'abc', '25/06/1990', 'spouse', 'cv', '123', 'CD', '456', 'dn', 'no', 'dsf', '21/06/1990', 'self', 'no', '65', 'hh', '6567', 'bgh', 'yes', 'M.P.', '24/06/2020'),
(19, 64, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mr.', 'John', 'Doe', '614-56789', '614-57789', 'a@gmail.com', '24/06/1990', 'male', 'Lorem Ipsum', 'Jane Doe', 'jane@gmail.com', '9830000000', 'daughter', 'abc', '25/06/1990', 'spouse', 'cv', '123', 'CD', '456', 'dn', 'no', 'dsf', '21/06/1990', 'self', 'no', '65', 'hh', '6567', 'bgh', 'yes', 'M.P.', '24/06/2020'),
(20, 50, 'no', 'yes', 'no', 'yes', 'yes', 'no', 'yes', 'yes', '', 'yes', 'no', 'no', 'no', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', '', '123456', '', 'william@gmail.com', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdsd', '23-6-2020'),
(21, 64, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mr.', 'John', 'Doe', '614-56789', '614-57789', 'a@gmail.com', '24/06/1990', 'male', 'Lorem Ipsum', 'Jane Doe', 'jane@gmail.com', '9830000000', 'daughter', 'abc', '25/06/1990', 'spouse', 'cv', '123', 'CD', '456', 'dn', 'no', 'dsf', '21/06/1990', 'self', 'no', '65', 'hh', '6567', 'bgh', 'yes', 'M.P.', '24/06/2020'),
(22, 64, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mr.', 'John', 'Doe', '614-56789', '614-57789', 'a@gmail.com', '24/06/1990', 'male', 'Lorem Ipsum', 'Jane Doe', 'jane@gmail.com', '9830000000', 'daughter', 'abc', '25/06/1990', 'spouse', 'cv', '123', 'CD', '456', 'dn', 'no', 'dsf', '21/06/1990', 'self', 'no', '65', 'hh', '6567', 'bgh', 'yes', 'M.P.', '24/06/2020'),
(23, 48, '', 'no', 'no', '', '', 'no', 'no', 'no', '', '', '', 'no', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'Chandf', '', '6474470955', '', 'chandradip.ghosh@gmail.com', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'CG', '24-6-2020'),
(24, 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', '', '123456', '', 'william@gmail.com', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25-6-2020'),
(25, 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', '', '123456', '', '', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '29-6-2020'),
(26, 50, 'yes', 'no', 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr.', 'william', 'Tet', '123456', '123456', 'william@gmail.com', '2020-7-1', 'Male', 'Jimmy comnt', 'Jimmy', 'jimmy@gmail.com', '123456', 'Friend', 'National Insurance', '2020-7-1', 'Self', 'sdsd', '1223', 'xcxcxc', 'sdsdsd', 'sdffe', 'Yes', '', '', '', '', '', '', '', '', '', 'MDP', '1-7-2020'),
(27, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ' Date of Birth', '', 'Notify', '', '', '', '', '', '  Date Of Birth', '', '', '', '', '', '', '', '', '  Date Of Birth', '', '', '', '', '', '', '', '', ''),
(28, 0, '', '', '', '', '', '', '', '', '', '', '', '', 'Yes', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ' Date of Birth', '', 'Notify', '', '', '', '', '', '  Date Of Birth', '', '', '', '', '', '', '', '', '  Date Of Birth', '', '', '', '', '', '', '', 'hhh', '584'),
(29, 128, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXIu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUG9sbA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ29saW5z', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcG9sbEBnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTEz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRW1lcmdlbmN5', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFjaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFja0BnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYnJv', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTmF0aW9uYWwgaW5zdXJhbmM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTEz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGRkZGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamRkZA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIzMzNlZA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGRkZGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGNkY2Rj', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTEz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY2Rj', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGRjZGRj', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbXA=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTMtNy0yMDIw'),
(30, 133, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXIu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF1bCA=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ2FsbGluZ3M=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bEBnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTE2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcHJvYmxlbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFjaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFja0BnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZnJpZW5k', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptam9obg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTE2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZnJpZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTI0MzY2Mw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RzZA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RzZHNk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RzZHM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTYtNy0yMDIw'),
(31, 136, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXIu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFjaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzMw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9tQGdtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTE2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RAZy5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIy', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteng=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZmQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTYtNy0yMDIw'),
(32, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWRkcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptICBEYXRlIE9mIEJpcnRo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWRkcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWZh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWRkcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFkYQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptaGFk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(33, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ2hpbGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptICBEYXRlIE9mIEJpcnRo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(34, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ2hpbGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptICBEYXRlIE9mIEJpcnRo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rnc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(35, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ2hpbGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptICBEYXRlIE9mIEJpcnRo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rnc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(36, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ2hpbGQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptICBEYXRlIE9mIEJpcnRo', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rnc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(37, 140, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFkcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNDIzNDczNzQ5', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuQG1haWwuY29t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2Rmcw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYUBtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWRk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjA=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYXNkYXM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQmFzaXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(38, 139, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXIu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGlw', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGlwQGdtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTIy', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdGVzdA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYW1pdA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYW1pdEBnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcmVzdA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptSmFjaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTIy', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhdHVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdHJlc3Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteXJkeQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2c=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTIy', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdGVzcg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZm', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdHJ0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2dn', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZmRk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjItNy0yMDIw'),
(39, 140, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNDIzNDczNzQ5', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFhYQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuQG1haWwuY29t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU2VsZg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(40, 141, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXJz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuMg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUnlkZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU3MDIzNDU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZXJ0ZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuMkBtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIERhdGUgb2YgQmlydGg=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRmVtYWxl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRGVhZGZhbGw=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMjE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptIDIwMjAtMDctMTQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptU3BvdXNl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnIGRmaA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZGY=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZm9nIGRmZw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjIvMDcvMjAyMA=='),
(41, 142, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpteWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTXIu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptVGlt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29va0BnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTIz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWFsZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZWVy', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptamFjaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RAZy5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDM0', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptd2Vl', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjAyMC03LTIz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZHNkc2Q=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2Rk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjMtNy0yMDIw');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_insurance`
--

CREATE TABLE `dentalsb_insurance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `insurance_id` varchar(250) NOT NULL,
  `dental_amount` varchar(250) NOT NULL,
  `vision_amount` varchar(250) NOT NULL,
  `total_coverage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_insurance`
--

INSERT INTO `dentalsb_insurance` (`id`, `user_id`, `insurance_id`, `dental_amount`, `vision_amount`, `total_coverage`) VALUES
(7, 10, 'Sunlife Insurance1', '7000', '6000', '1001'),
(8, 24, 'gNational Insurace', '400', '200', '12'),
(9, 5, 'National Insurance', '3434', '', '43'),
(10, 1, 'NA', '520', '952', '4521'),
(11, 41, '', '180000', '', '1500000000'),
(12, 48, 'National Insurance', '200', '', '300'),
(13, 53, 'Life In', '100', '', '200');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_insurance_provider`
--

CREATE TABLE `dentalsb_insurance_provider` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_insurance_provider`
--

INSERT INTO `dentalsb_insurance_provider` (`id`, `title`, `description`) VALUES
(1, ' Manulife Financial', 'Manulife Financial Corporation is a Canadian multinational insurance company and financial services provider headquartered in Toronto, Ontario, Canada. The company operates in Canada and Asia as \"Manulife\" and in the United States primarily through its John Hancock Financial division.'),
(2, ' Sunlife Financial', 'Sun Life Financial, Inc. is a Canadian financial services company; it is primarily known as a life insurance company. It is one of the largest life insurance companies in the world; it is also one of the oldest, with a history spanning back to 1865.'),
(3, 'GreatWest Life', 'Canada Life Assurance Company, or, simply, Canada Life, is a life insurance company. The brand is the product of the 2020 merger of the Great-West Life Assurance, Canada Life Financial, and London Life Insurance companies. Its headquarters are in Winnipeg, Manitoba. ');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_key`
--

CREATE TABLE `dentalsb_key` (
  `id` int(11) NOT NULL,
  `salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_key`
--

INSERT INTO `dentalsb_key` (`id`, `salt`) VALUES
(1, '5)C@DD*rbc9qsvEXU(muQB$0');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_location`
--

CREATE TABLE `dentalsb_location` (
  `id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(11) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_location`
--

INSERT INTO `dentalsb_location` (`id`, `location`, `address`, `city`, `state`, `zip`) VALUES
(3, 'Mississauga', '47 Dundas St W Mississauga', 'Mississauga', 'Ontario', 'L5B 1H2');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_notification`
--

CREATE TABLE `dentalsb_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_type` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `notification_date` varchar(250) NOT NULL,
  `notification_attr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_notification`
--

INSERT INTO `dentalsb_notification` (`id`, `user_id`, `notification_type`, `message`, `notification_date`, `notification_attr`) VALUES
(1, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 08:32:22am', 'approved'),
(2, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 08:35:12am', 'approved'),
(3, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 08:38:38am', 'completed'),
(4, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:47:28am', 'approved'),
(5, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 08:57:46pm', 'approved'),
(6, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 08:59:56pm', 'approved'),
(7, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 09:00:40pm', 'completed'),
(8, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 09:14:15pm', 'approved'),
(9, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 09:36:33pm', 'completed'),
(10, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 09:40:48pm', 'completed'),
(11, 24, 'Appointment', 'Admin has cancelled your appointment.', '2020-06-23 09:47:48pm', 'cancelled'),
(12, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 10:02:19pm', 'completed'),
(13, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:08:45pm', 'approved'),
(14, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 10:17:27pm', 'completed'),
(15, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:20:32pm', 'approved'),
(16, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 10:21:02pm', 'completed'),
(17, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:25:34pm', 'approved'),
(18, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 10:29:53pm', 'completed'),
(19, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:30:36pm', 'approved'),
(20, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 10:34:02pm', 'completed'),
(21, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-23 10:41:48pm', 'approved'),
(22, 24, 'Appointment', 'The scheduled appointment is completed.', '2020-06-23 11:42:02pm', 'completed'),
(23, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-24 01:30:28am', 'approved'),
(24, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-24 02:57:48am', 'approved'),
(30, 24, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-24 08:09:42am', 'approved'),
(31, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-28 10:28:05pm', 'approved'),
(32, 10, 'Appointment', 'The scheduled appointment is completed.', '2020-06-29 10:54:24pm', 'completed'),
(33, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-30 01:06:49am', 'approved'),
(34, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-30 01:07:13am', 'approved'),
(35, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-30 01:07:58am', 'approved'),
(36, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-30 01:08:25am', 'approved'),
(37, 10, 'Appointment', 'Admin has successfully approved your appointment.', '2020-06-30 01:09:14am', 'approved'),
(38, 5, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-01 10:36:24pm', 'approved'),
(39, 5, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-01 10:36:33pm', 'approved'),
(42, 5, '86', 'You have an appointment tomorrow', '2020-07-03 02:26:16pm', 'upcoming'),
(43, 5, 'Appointment', 'The scheduled appointment is completed.', '2020-07-03 03:41:52am', 'completed'),
(44, 5, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-03 03:43:35am', 'approved'),
(45, 5, '91', 'You have an appointment tomorrow', '2020-07-03 04:13:46pm', 'upcoming'),
(46, 41, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-09 09:17:25am', 'approved'),
(47, 41, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-09 09:17:32am', 'approved'),
(48, 41, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-09 09:18:30am', 'approved'),
(49, 45, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-13 05:35:51am', 'approved'),
(50, 45, '128', 'You have an appointment tomorrow', '2020-07-13 06:07:02pm', 'upcoming'),
(51, 46, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-13 08:55:55am', 'approved'),
(52, 48, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-16 04:11:01am', 'approved'),
(53, 48, '133', 'You have an appointment tomorrow', '2020-07-16 04:41:14pm', 'upcoming'),
(54, 53, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-16 11:17:12am', 'approved'),
(55, 53, '136', 'You have an appointment tomorrow', '2020-07-16 11:47:40pm', 'upcoming'),
(56, 55, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-22 02:44:53am', 'approved'),
(57, 56, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-22 03:04:45am', 'approved'),
(58, 58, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-22 04:02:36am', 'approved'),
(59, 59, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-22 04:17:14am', 'approved'),
(60, 60, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-22 04:39:11am', 'approved'),
(61, 61, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-23 01:35:14am', 'approved'),
(62, 61, 'Appointment', 'Admin has successfully approved your appointment.', '2020-07-23 01:53:42am', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_offer`
--

CREATE TABLE `dentalsb_offer` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_offer`
--

INSERT INTO `dentalsb_offer` (`id`, `title`, `code`, `description`) VALUES
(1, 'No Offer', 'No offer', 'Currently there are no offers.');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_patient_acknowledge_form`
--

CREATE TABLE `dentalsb_patient_acknowledge_form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL,
  `question9` text NOT NULL,
  `question10` text NOT NULL,
  `question11` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_patient_acknowledge_form`
--

INSERT INTO `dentalsb_patient_acknowledge_form` (`id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`) VALUES
(1, 2, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', ''),
(2, 2, 'yes', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(3, 24, 'William', 'william', 'william', 'willam', 'william', 'willaim', 'willam', 'willam', '', '', ''),
(4, 24, 'wee', 'wewewqqw', 'wwee', 'wewe', 'wewe', 'wewe', 'wewe', 'wewew', 'wewe', 'wewe', 'wewe'),
(5, 24, '', '', '', '', '', '', '', '', '', '', ''),
(6, 24, 'dd', 'dfdfd', 'ddf', 'dfdf', 'fdf', 'ddf', 'dfdfdf', 'ddf', 'vcv', 'cvcv', 'cvc'),
(7, 24, '', '', '', '', '', '', '', '', '', '', 'dfdf'),
(8, 24, 'Im', 'sdsd', 'dsd', 'ssdsd', 'dggd', 'gdgdg', 'dgdgg', 'dgdgd', 'dfd', 'dfdf', 'dfdf'),
(9, 24, '', '', '', '', '', '', '', '', '', '', ''),
(10, 13, 'cg', 'ch', 'cg', 'cg', 'CG', 'CG', 'CG', 'CG', 'test', 'Cg', 'gg'),
(11, 24, '', '', '', '', '', '', '', '', '', '', 'ddd'),
(12, 24, '', '', '', '', 'u', '', '', '', '', '', ''),
(13, 10, '', '', '', '', '', '', '', '', '', '', ''),
(14, 10, '', '', '', '', '', '', '', '', '', '', ''),
(15, 0, '', '', '', '', '', '', '', '', '', '', ''),
(16, 128, 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45UG9sbA=='),
(17, 133, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bA=='),
(18, 136, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t'),
(19, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWhh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGZnZA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RnZnNk'),
(20, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYWFh'),
(21, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6'),
(22, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6eg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptenp6'),
(23, 139, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTUQ='),
(24, 138, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMQ=='),
(25, 139, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYg=='),
(26, 139, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptYw=='),
(27, 140, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWFudWFs', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGFuZGV5', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQmlqb3k=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptS0s=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWl0cmE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWl0cmE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWl0cmE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTWl0cmE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptRHM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc2RnZnNk', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQXNzYWTigJlz'),
(28, 142, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_patient_screening_form`
--

CREATE TABLE `dentalsb_patient_screening_form` (
  `id` int(11) NOT NULL,
  `staff` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `other` varchar(250) NOT NULL,
  `question1` varchar(250) NOT NULL,
  `question2` varchar(250) NOT NULL,
  `question3` varchar(250) NOT NULL,
  `answered` varchar(250) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_patient_screening_form`
--

INSERT INTO `dentalsb_patient_screening_form` (`id`, `staff`, `name`, `age`, `email`, `phone`, `other`, `question1`, `question2`, `question3`, `answered`, `appointment_id`, `question4`, `question5`, `question6`, `question7`, `question8`) VALUES
(1, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 23, '', '', '', '', ''),
(2, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 22, '', '', '', '', ''),
(3, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 21, '', '', '', '', ''),
(4, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 20, '', '', '', '', ''),
(6, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 24, '', '', '', '', ''),
(7, 'staff screener', 'mangal', '25', 'a@gmail.com', '9038209876', 'Nothing to say', 'yes', 'yes', 'no', 'patient', 25, 'no', 'no', 'no', 'no', 'no'),
(8, '', 'Mangaldip', '25', 'sd.c@gmail.com', '12345', 'yyty', 'Yes', 'Yes', 'Yes', 'Patient', 18, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(9, '', 'tes24', '23', 'sd.c@gmail.com', '12345678', 'test', 'Yes', 'Yes', 'Yes', 'Patient', 18, 'Yes', 'Yes', 'Yes', 'No', 'No'),
(10, '', 'tesr', '23', 's.c@gmail.com', '1233', 'trr', 'Yes', 'Yes', 'Yes', 'Patient', 18, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(11, '', 'test', '23', 'sd.c@g.com', '12345678', 'adad', 'Yes', 'Yes', 'Yes', 'Patient', 18, 'Yes', 'Yes', 'Yes', 'Yes', ''),
(12, '', 'sdd', '12', 'sd.c@g.com', '123456', '1233', 'Yes', 'Yes', 'Yes', 'Patient', 18, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(13, '', 'pa', '25', 'ffg@gmail.com', '123456778', 'dd', 'Yes', 'No', 'No', 'Patient', 100, 'Yes', 'No', 'Yes', 'No', 'Yes'),
(14, '', 'thomas', '24', 'thomas@gmail.com', '1234', 'wee', 'Yes', 'Yes', 'Yes', 'Patient', 31, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(15, '', 'jhon', '52', 'patient@gmail.com', '5638456', '', 'No', 'Yes', 'No', 'Patient', 18, 'Yes', 'No', 'No', 'Yes', 'No'),
(16, '', 'sgg', '24', 's.c@g.com', '234', '', '', '', '', 'Patient', 51, '', '', '', '', ''),
(17, '', 'william', '24', 'william@gmail.com', '123456', 'Yes', 'Yes', 'No', 'No', 'Patient', 53, 'No', 'Yes', 'Yes', 'Yes', 'Yes'),
(18, '', 'william', '23', 'sd@g.com', '123456', '1212', 'Yes', 'Yes', 'Yes', 'Patient', 50, 'No', 'Yes', 'Yes', 'Yes', 'Yes'),
(19, '', 'Chandf', '23', '', '6474470955', '', '', '', '', 'Patient', 48, '', '', '', '', ''),
(20, '', 'william', '24', 'william@gmail.com', '123456', '', '', '', '', 'Patient', 50, '', '', '', '', ''),
(21, '', 'william', '23', 'william@gmail.com', '123456', '', '', '', '', 'Patient', 50, '', '', '', '', ''),
(22, '', 'rr', '36', 'thomas@gmail.com', '37977', 'hahhs', '', '', '', 'Patient', 44, '', '', '', '', ''),
(23, 'staff screener', 'high', '25', 'fghfg', 'fghf', 'fghfg', 'Yes', 'Yes', '', 'patient', 0, '', '', '', '', 'No'),
(24, 'staff screener', 'high', '25', 'fghfg', 'fghf', 'fghfg', 'Yes', 'Yes', '', 'patient', 0, '', '', '', '', 'No'),
(25, 'Y29va3NkdGxhcHAjMl45', 'Y29va3NkdGxhcHAjMl45UG9sbA==', 'Y29va3NkdGxhcHAjMl45MjU=', 'Y29va3NkdGxhcHAjMl45cG9sbEBnbWFpbC5jb20=', 'Y29va3NkdGxhcHAjMl45MTIzNDU2Nzg=', 'Y29va3NkdGxhcHAjMl45', 'Y29va3NkdGxhcHAjMl45WWVz', 'Y29va3NkdGxhcHAjMl45Tm8=', 'Y29va3NkdGxhcHAjMl45', 'Y29va3NkdGxhcHAjMl45UGF0aWVudA==', 128, 'Y29va3NkdGxhcHAjMl45WWVz', 'Y29va3NkdGxhcHAjMl45WWVz', 'Y29va3NkdGxhcHAjMl45WWVz', 'Y29va3NkdGxhcHAjMl45Tm8=', 'Y29va3NkdGxhcHAjMl45Tm8='),
(26, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF1bCBDYWxsaW5ncw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjc=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptcGF1bEBnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 9, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz'),
(27, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMzA=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9tQGdtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 9, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(28, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9tQGdtYWlsLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 136, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(29, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2ho', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz'),
(30, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMzQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuQG1haWwuY29t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNDIzNDczNzQ5', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 140, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(31, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29va0BnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2Mg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 142, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz'),
(32, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjQ=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29va0BnbWFpbC5jb20=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 143, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz'),
(33, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2g=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(34, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2g=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(35, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2g=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8='),
(36, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2ho', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz'),
(37, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptc3RhZmYgc2NyZWVuZXI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZ2ho', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptUGF0aWVudA==', 137, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptTm8=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptWWVz');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_provider`
--

CREATE TABLE `dentalsb_provider` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `page` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_provider`
--

INSERT INTO `dentalsb_provider` (`id`, `cat_id`, `title`, `bio`, `page`, `image`) VALUES
(1, 1, 'Dr. Christie L. Gamo', 'Dr. Christina L. Gamo is practicing Family Dentistry at Mississauga, Ontario since September, 2000. She is the owner and chief dentist at Dentistry@Cooksville.\r\n\r\nShe studied dentistry at UERMMM Philippines. She is a member of Alpha Phi Omega Sorority. She has around 20 years of experience in the dental field and with her many years of extensive training and her clinical expertise in general &amp; family dentistry, Dr. Gamo delivers care with great skill, competence and consistency.', '1', '15924036512020-06-17.png');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_question`
--

CREATE TABLE `dentalsb_question` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_question`
--

INSERT INTO `dentalsb_question` (`id`, `cat_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`) VALUES
(1, 1, 'Question 1', 'answer1', 'answer1', 'answer1', 'answer1'),
(2, 2, 'Question 2', 'answer1', 'answer1', 'answer1', 'answer1'),
(3, 1, 'Question 3', 'answer1', 'answer1', 'answer1', 'answer1'),
(4, 1, 'Question 4', 'answer1', 'answer1', 'answer1', 'answer1'),
(5, 2, 'Question 5', 'answer1', 'answer1', 'answer1', 'answer1'),
(6, 2, 'Question 6', 'answer1', 'answer', 'answer3', 'answer 4');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_questionnaire`
--

CREATE TABLE `dentalsb_questionnaire` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `question_id` varchar(250) NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_referral`
--

CREATE TABLE `dentalsb_referral` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_referral`
--

INSERT INTO `dentalsb_referral` (`id`, `name`, `email`, `message`, `user_id`) VALUES
(4, 'Julie Mathew', 'julie@gmail.com', 'I am reffering you', 24),
(5, 'Jack', 'jack@gmail.com', 'Please install it', 24),
(7, 'hu', 'hu@gmail.com', 'drr', 53);

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_review`
--

CREATE TABLE `dentalsb_review` (
  `provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_sterilization`
--

CREATE TABLE `dentalsb_sterilization` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_sterilization`
--

INSERT INTO `dentalsb_sterilization` (`id`, `title`, `description`) VALUES
(1, 'WHY A REGULAR DENTAL CHECK UP IS IMPORTANT', '<p>A regular dental checkup is important because they help keep your teeth and gums healthy. You should have a regular dental visit at least every 6 months or as recommended by your dental professional.</p>\r\n\r\n<p><strong>What happens at your dental visit?</strong></p>\r\n\r\n<p>&nbsp;There are 2 parts to a regular dental visit &ndash; checkup, or examination and the cleaning, or oral prophylaxis.</p>\r\n\r\n<p>At the dental check up your dental professional will check for cavities. X-rays might be taken to detect cavities between your teeth. The exam will also include a check for plaque and tartar on your teeth. Plaque is a clear, sticky layer of bacteria. If it is not removed, it can harden and become tartar. You cannot remove tartar with brushing and flossing. If plaque and tartar build up on your teeth, they can cause oral diseases.</p>\r\n\r\n<p>Next, your gums will be checked. This will be done with a special tool to measure the depth of the spaces between your teeth and gums. With healthy gums, the spaces are shallow. When people have gum disease, the spaces may become deeper.</p>\r\n\r\n<p>The check-up should also include a careful examination of your tongue, throat, face, head, and neck. This is to look for any signs of trouble - swelling, redness, or possible signs of cancer.</p>\r\n\r\n<p>Your teeth will also be cleaned at your visit. Brushing and flossing help clean the plaque from your teeth, but you can&#39;t remove tartar at home. During the cleaning, your dental professional will use special tools to remove tartar. This is called&nbsp;scaling<strong>.</strong></p>\r\n\r\n<p>After your teeth are scaled, they may be polished. In most cases, a gritty paste is used for this. It helps to remove any surface stains on your teeth. The final step is flossing. Your dental professional will use floss to make sure the areas between your teeth are clean.</p>\r\n\r\n<p><strong>What you should do between each dental visit</strong></p>\r\n\r\n<p>Be sure to take care of your teeth and gums between regular dental visits. Plaque is always forming on your teeth, but you can manage it by brushing and flossing regularly.&nbsp;</p>\r\n'),
(2, '5 Reasons Why You Should Be Brushing Your Teeth Twice A Day', '<p>Brushing your teeth at least twice a day should be an integral part of your day, just as its vital you eat. There are many reasons why it&rsquo;s important that you brush your teeth twice a day, some of the reasons are obvious whilst others are less commonly known. Here are eight reasons why you should be brushing your teeth everyday:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Maintaining a fresh breath: When you don&rsquo;t brush your teeth regularly, bacteria build up occurs in the mouth which can cause a variety of problems. To prevent bacteria building up, make sure to brush your teeth twice a day as well as chewing sugar free gum after each meal.</p>\r\n	</li>\r\n	<li>\r\n	<p>Prevents gum disease: You are at risk of plaque build-up on the teeth when you don&rsquo;t brush often. Plaque is an accumulation of bacteria and food that occurs in everyone&rsquo;s mouth. However, this plaque can lead to Gingivitis, a yellow lining on the base of the tooth that meets the gum. This is often the first stage of gum disease which causes inflammation of the gums and bleeds when you brush them.</p>\r\n	</li>\r\n	<li>\r\n	<p>Removes teeth stains&nbsp;&ndash; Toothpaste contains mild abrasives that removes debris and surface stains such as include calcium carbonate, aluminium oxides dehydrated silica gels, phosphate salts hydrated and silicates.</p>\r\n	</li>\r\n	<li>\r\n	<p>&nbsp;Reduces your chances of getting a heart attack or stroke&nbsp;&ndash; The Bacteria build-up from your mouth can travel down into the bloodstream, increasing the likelihood of cholesterol build up in the arteries. This can therefore elevate the chances of getting a stroke or heart attack.</p>\r\n	</li>\r\n	<li>\r\n	<p>Saves you money&nbsp;&ndash; Curing is always more expensive than the cure, and is usually a lot more hard work! Brushing your teeth twice a day will not only improve the your gum and teeth health, but it will help in preventing problems in the future, ultimately leaving you with reduced dental bills.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Those 3 minutes of brushing, twice a day can really save your life and prevent many serious diseases!</p>\r\n'),
(3, 'Why Drinking Water Is Good For Your Oral Health?', '<p>We all know that drinking water is healthy for our bodies. It&rsquo;s the healthiest drink out there! It keeps us hydrated, which by extension keeps our skin and other organs healthy. It&rsquo;s also good for losing weight since there are no calories in water. But did you know that drinking water is beneficial for your oral health? Not many people do, but as if you&rsquo;d need another reason to drink more water!</p>\r\n\r\n<p>So it&rsquo;s no secret just how good water is for us. Our bodies are 60% made up of water, for goodness sakes. Staying hydrated keeps nutrients traveling through our bodies get rid of waste, gives your skin elasticity and glow, and keeps your muscles moving well. Drinking water constantly throughout the day is good for your health, and it&rsquo;s perfect if it&rsquo;s fluoridated. Let&rsquo;s look at some of the ways that water is good for your teeth!</p>\r\n\r\n<p><strong>It strengthens teeth</strong></p>\r\n\r\n<p>Fluoride is &ldquo;nature&rsquo;s cavity fighter&rdquo; and is one of the best things for your teeth. Thankfully, fluoride is also easy to get ahold of and ingest.&nbsp;Fluoride is a natural element that mixes with tooth enamel in growing teeth that helps prevent tooth decay. Fluoride is also helpful after teeth are formed. Fluoride works with saliva to help prevent against plaque. There have been studies on whether or not fluoride in water is helpful.</p>\r\n\r\n<p><strong>It keeps your mouth clean</strong></p>\r\n\r\n<p>Drinking anything will help you wash down your food, but drinks like soda, juice, sweetened tea, and sports drinks only leave unwanted sugars behind on your teeth. Your enamel is always fighting against sugars and acids. There are bacteria in your mouth that feeds on the sugars you get from food and drinks. When it eats the sugar, this bacteria produces acid that eats away at enamel.&nbsp;</p>\r\n\r\n<p><strong>It keeps your mouth from being dry</strong></p>\r\n\r\n<p>Tooth decay is something that thrives from dry mouth. That&rsquo;s because saliva is a big defense against tooth decay. There are minerals in saliva like calcium and phosphate that help your teeth fight against tooth decay. It also helps wash away food and other residues that might have been left behind on your teeth.</p>\r\n\r\n<p><strong>Helps fight against bad breath</strong></p>\r\n\r\n<p>Did you ever think of water helping fight against bad breath? It does a lot to help against bad breath. &ldquo;Morning breath&rdquo; is caused by dry mouth, and drinking water throughout the day naturally helps with that. It also washes away food particles and tooth decay that can also contribute towards bad breath and it keeps bad breath from forming in the first place.</p>\r\n'),
(4, '5 WAYS TO KEEP YOUR TEETH CAVITY-FREE', '<p>To prevent cavities and maintain good oral health, your diet -- what you eat and how often you eat -- are important factors. Changes in your mouth start the minute you eat certain foods. Bacteria in the mouth convert sugars and carbohydrates from the foods you eat to acids, and it&#39;s the acids that begin to attack the enamel on teeth, starting the decay process. The more often you eat and snack, the more frequently you are exposing your teeth to the cycle of decay.</p>\r\n\r\n<p><a name=\"_GoBack\"></a> Mentioned below are five tips about oral health and nutrition:</p>\r\n\r\n<p>TIP #1: STICK WITH WATER.</p>\r\n\r\n<p>Water is your healthiest drink option&mdash;especially tap water, which typically contains fluoride. Plus, staying hydrated is good for your whole body.</p>\r\n\r\n<p>Not only is water devoid of sugar, but it helps wash away food particles that can get stuck to your teeth. These food particles feed bacteria in your mouth&mdash;leading to the formation of plaque and, ultimately, cavities.</p>\r\n\r\n<p>TIP #2: DAIRY, VEGETABLES, AND FRUIT ARE GOOD FOR YOU&mdash;AND THAT INCLUDES YOUR TEETH.</p>\r\n\r\n<p>In addition to water, milk (without added sugars) is a healthy drink choice for your oral health and overall health. Dairy products such as milk, yogurt, and cheese contain calcium, an important nutrient for healthy teeth and bones.</p>\r\n\r\n<p>TIP #3: SOME SNEAKY FOODS AND DRINKS SEEM HEALTHY, BUT ACTUALLY HARM OUR TEETH.</p>\r\n\r\n<p>We know that soda isn&rsquo;t good for us, but juice must be healthy because it&rsquo;s fruit&mdash;right? Many parents don&rsquo;t realize the amount of sugar in juices. Even 100 percent juice has a lot of natural sugar in it. &nbsp;Children under 6 years of age should only have four to six ounces of juice a day&mdash;or the equivalent of one small juice box. Other seemingly healthy foods can be problematic because they end up stuck to our teeth.</p>\r\n\r\n<p>TIP #4: IT&rsquo;S NOT JUST WHAT YOU EAT&mdash;IT&rsquo;S WHEN YOU EAT.</p>\r\n\r\n<p>Some nutritional advice calls for eating smaller meals throughout the day or snacking between meals to keep up your metabolism. But when it comes to oral health, constant snacking can cause trouble. Dental health depends less on what we eat and more on how often we eat. In other words, snacking on sugary foods and drinks all day long&mdash;whether it is cookies or grapes&mdash;means that we&rsquo;re constantly feeding the cavity-causing germs that live in our mouths.</p>\r\n\r\n<p>TIP #5: OPT FOR CHOCOLATE INSTEAD OF GUMMY BEARS</p>\r\n\r\n<p>Caramel, gummies, and other sticky candies can wreak havoc on our mouths. Not only are they loaded with sugar, but they get stuck to your teeth, increasing your chances for tooth decay. Sour candies, which are acidic, can also be troublesome for your teeth as acid erodes enamel.</p>\r\n\r\n<p>Chocolate, on the other hand, is less sticky and acidic. Dark chocolate is your best bet&mdash;it often contains less sugar than milk chocolate and offers antioxidants that can keep bacteria from sticking to your teeth, which in turn can prevent tooth decay and gum infections.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_user`
--

CREATE TABLE `dentalsb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `total_coverage` varchar(250) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `registration_date` date NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_user`
--

INSERT INTO `dentalsb_user` (`id`, `username`, `email`, `password`, `fullname`, `phone`, `total_coverage`, `profile_pic`, `registration_date`, `token`) VALUES
(53, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9tQGdtYWlsLmNvbQ==', 'a3c4ff9c947cd287eeaa43c50272e4a6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptdG9t', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMTIzNDU2', '', '15949222326099.jpg', '2020-07-16', '159498729353'),
(54, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTFAbWFpbC5jb20=', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTE=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMzk0NzQ3NDc=', '', '', '2020-07-16', '159514114054'),
(55, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZUBtLmNvbQ==', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZQ==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzY1NA==', '', '', '2020-07-22', '159551356855'),
(56, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTJAbWFpbC5jb20=', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTI=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNzQ4NDg0', '', '', '2020-07-22', '159541218556'),
(57, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTM=', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptbWlrZTM=', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNDczNzM3', '', '', '2020-07-22', '159540554757'),
(58, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGlw', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', 'a3c4ff9c947cd287eeaa43c50272e4a6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGlw', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', '', '', '2020-07-22', '159549227958'),
(59, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuQG1haWwuY29t', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFu', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptNDIzNDczNzQ5', '', '', '2020-07-22', '159541659859'),
(60, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuMg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuMkBtYWlsLmNvbQ==', 'afcb28d65ecfe94819c7f7016f9df492', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptZGFuMg==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptMjU3MDIzNDU=', '', '', '2020-07-22', '159541789360'),
(61, 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptY29va0BnbWFpbC5jb20=', 'a3c4ff9c947cd287eeaa43c50272e4a6', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGptQ29vaw==', 'OUA0YjJta04kXilNKkh6Y15pKEBzcGpt', '', '', '2020-07-23', '159549244161');

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_user_answer`
--

CREATE TABLE `dentalsb_user_answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dentalsb_user_device`
--

CREATE TABLE `dentalsb_user_device` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` text NOT NULL,
  `device_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalsb_user_device`
--

INSERT INTO `dentalsb_user_device` (`id`, `user_id`, `device_id`, `device_type`) VALUES
(1, 24, 'cXH0-05JbME:APA91bGNcfpiSdg0hF3-Pbfv7J59k2f4DzggcQLdM3ODItpBuo3ZO7qoavK5kkjEekfr0ar-SX2_v43ihgpxXPDHaD0Id1VrV5biygBMxWIgh95hdzTbGPG-e_Ct927iMPHo0wPjxESL', 'android'),
(2, 24, 'ddit2K_qQf4:APA91bHbTooIsjhTP0QJ4Tv8HZ2t8_eilHn9uLgNy2O3N34KsS5wtCBa9lmmFq4s7AhJWUd_9KEPka9c2-fYKfZxZ-_cpnVP-qeD-NVlVKUErIH4EUAfQc6ecSA955xU7c4uOho2WqgZ', 'android'),
(3, 24, 'c7JZrgB1uVI:APA91bFtiJbmxA2h-wH3UPC2mG2GP8QaFrqIdXOFHBgbL_E-GYytSI35aL9w0tDsXN9pXsXo2OAg2VJsGaL7BxMZrD27EvrFs6WQ2c9JLz_dEByILCrcE2yaziktC1Y324wKmoFED8FD', 'android'),
(4, 24, 'd9WPHzIGMh8:APA91bHXVDPumS4IC7kmlFegb7uWSMSae4Etpckkj_Hdb3f53HkOGVI_cpU4dXMAwiN5p7EHBZXsJnrpysRSWhbhBuFoGdLcTg5wCtdCRNZ8WugsGkdHf6Ct-TqUlLFgLFzhiXc7dLRi', 'android'),
(5, 24, 'eXh1Ghv05Uk:APA91bHLLJ9rvF5TNMEDQAjYXKSmu9YtEzRbSUcyEThCWUDdM5rRHWfbZcgrG0fFhIRKFZ5xLP9jSEKEt6ij2QGwTD-a1lncNQeOpXmhTLJNVBICyQEf_jH7s8Q7ODh2shnC9lEWqtjt', 'android'),
(6, 24, 'cV3oRsH8Qd4:APA91bHxUsx-ZjkXW57wVDbqA-2irw7_-4G-9cUfhbBvMN416x0skbsJLnBdec3708A41MbUBLUyw9eTu40k3zartsnOMgFfQ2WQFv4b8cgARI18ixWWDSIiZasV5hI9JUQMCyIAgIIu', 'android'),
(7, 24, 'd8gAkQQTRH8:APA91bF4TlBAVo3y_W7F_h_b6jyWAP-I1106Z7UKfjmpSjRkqB3OBjtbdqXk6ERJcEKtgSlnrzarG2H055pTfs6DYMXoV5Nu6GiKk7etxQ1Jvj_gp2St9wlz7Ilejckq3wAW1K02rzQV', 'android'),
(8, 4, 'fbCLJc9-3Xo:APA91bEgokS3DDWCd6cp60SeyH1M76rB4_hbPCEDz8dE0cjdzSFq_bs84jqIAGOw2CvCY0ZNGa_1Dpk2O5cou0Q3x6_sx-Gmt2cB0gpux_HG65ys0I9Rnbc-zLJJvPuCxf4zTx7soUbz', 'android'),
(9, 24, 'c_9vHvOBj28:APA91bG539PR6KKAQEXdicKvfMj8cv5fmqR3mPTUlaypB6_dRtKV_70Uh-oSRpW_OXoQpOc0jRZ4aJ_kI1coldgEdYWLCGPi-HLbdrEdZGV9viqjD9SZbFQVTyU7_11f6KDsa3NbWPPt', 'android'),
(10, 10, 'cnqc3Ln_JVg:APA91bH6D3uWHgvOSNpDxGVR5Mp_fvhj_CsSn-ECurJ66rgeknKcgjWzFCtsxfOFg5Yno8g-g_qdO7zx7W-ObKMM4II3Uw1MaOI5r5YydYH2lFLwH3bbWHATqiXTz35sup0XDNNj37PX', 'android'),
(11, 24, 'ff8gbV6817s:APA91bFMhFjvLVbMeTpYcWU0My_Nxc1upXCybf69lRsUvuI8Kphbw-hC_WiJt115Ah0w8hsXuASubCuhqClhi22xy5zVxQ-oInJCIfNC4JyAnyWf2SOMgHFqN6RgJTf7BAwvtPJImh7x', 'android'),
(12, 10, 'eqRLg3zrPaY:APA91bGtsZoOBpZtNilbTPqomr8R5Bmdgv0zr4GJNpDAEpnlR9vwQuU6qhcq2t_ursKYUr08BAG4p4_hnq3qWPgxbw4ivu5HS-H4AvnPP88vey1bglSo6vBI7nYRrgNMIAdYL1skj-mk', 'android'),
(13, 10, '123', 'ios'),
(14, 30, 'fdK9B9JZqFU:APA91bEPw4p2hi2gRe-1LZ8zTHKH9p4bGVI1mIQj6NXYS5dpSgJ8kY-G7-_9xeak87fBhAYbcviP7NWldROy0Qfufg8KBWvUS04eLmaiEEDWE6UX92GIeIGVhbfsRi79XW8Zh5W1BXe-', 'android'),
(15, 24, 'flIyN2NdZns:APA91bFv7uQbAYDiA1LMJ5-W9g-QUszIcxWQ1Ms36TAGx5gWCyHRHQuZAoSG-0lOxSwvfkOppWGIg7xO-bJXz8WVwR42eTsLtB7RaO5j7aBXNLmlRknL2-fP_04yXloz_mGvo1fWcKeb', 'android'),
(16, 24, 'd5mypKmUFJM:APA91bH-LRw_0DxUP76AMHPC17jOZceix-0J53q5Ty_DrIjDG13Dtkm1rhb_Hlh4bfCkallUwjEoqA0sK08deeMphdXu1VMlIS3pt4nmQyGKgayVy2h7immY5iKOdzmWeyfUifZbZB6a', 'android'),
(17, 24, 'f3A57SyFmLQ:APA91bEXMH0j_iYKO12w6JpW27LsEne_MHYEm8zIccaI8BdYvuvZidvkL36FNMQhq1IZcTU03LSlSD3j5W5YxTHGMqZI_3d_HkJWwXCXFBTDnbXOA3V3avPVPgSvE3SoiuMeVtBUG8sV', 'android'),
(18, 30, 'eJ2i9VTjtaI:APA91bFiKBoOzD3VtdPsoftkTfCsaZV01HUgju6d9bPjQkCd__tmPuVjmbgBbR9yihK6KsJKaJaji1DPtGwcPy_crVnEiNS051-JdSR0bA-GI62hr-Bj6-y9DWtnXxm3YPa0EffFFRRx', 'android'),
(19, 55, '', 'ios'),
(20, 5, 'eHpposRXrhU:APA91bH4vNfZ1RkOLDe3eAVG-_x7mEks0emAWgmFm1nRLcUH6u5Y-z7yGr1o1BAnOPjDGV_as4fhAJl-9Z4BFO5K2K88XIMQT7lshASvpixFWtEZOW8ZKw5AcM2a20lfCItzmOLYh1hF', 'android'),
(21, 10, '24FC698F46D14FC3CBEFD2FCB554B9644A007551903B904E1E004EBB268598B8', 'ios'),
(22, 10, '48CF23DFA53E006CFB41FC81466A0801DD5739C3F64442A0DB551050A7B14BCB', 'ios'),
(23, 5, 'eZN51YzPHjU:APA91bGg-WhmxMcYiCnlYZfBKJuu3vxV4nyoNTRcc_hpVqP9reEeCSulmBV72FFoZebHFEzQ1i15n_JyeympIBd6oMRUdYI7a4ZERPfrvBMb0q3byU2f4W6RyZdjqEtsXku5vt_ofJql', 'android'),
(24, 5, 'dcbGKUVCDk0:APA91bEMTOpYgw-zG7VSui46m9xqMuqGTY_jKPYlNDhBEws_vzqGsYtcyW5ltOVBFU0MRC0BwrpDwjTpU4VbojidShWd9tOLGpymm9tG23jdVfOm0Nr7kEwtWok4hCPn694zErxFB5Is', 'android'),
(25, 5, 'fJcyb5jhxpY:APA91bHUelcT6mKbzHD3h-S9Uiwx2nA8KUNSwvIWra6Dzz43ZANNMxFQ74ZchXTjUqYkT6xoXLZjxShRoXFLkyLn_ONf3a4YRZw80WnwOE17sMSh-0yc1lOwqWaNF-UJSRfl-AaveljL', 'android'),
(26, 40, 'C01AFFCD0E6E50792FD337EE49A6C7C45D3842DB2C83C7F0732D990CF69AB83B', 'ios'),
(27, 5, 'cWEldK3ZCdE:APA91bF1wSwfAxUlMY1gP-kyVWb3V8E8DDQptpZe3rNT0FAgSvZGAMRz_kdi1tn8q4dq2DCnOXDLwu-XgKRWcRV1CZKneQ02u6clX8UcWoy7o1_U22_FttGkgK9U-hc68n4CvE5Bc5Zj', 'android'),
(28, 5, 'dKYIkBqIrcs:APA91bGhNmOC53P9ZrTgcsAQnLxmhKusfFh096-kiwEVBMrlbhB8f12V0XcsVz-sl_giSyZVsCXRJu0PfE1fGh-5Qt5fwM7PoWxKYkxebOO3sDtlTxiVd6UvdhMCv3DbYg5OOq8zkIV2', 'android'),
(29, 24, 'cmfI3VAu9nw:APA91bHbkU5gWlB_JOUThtdMEQzQ99V3ZXbar8PVTdPa9Mo5GhozRMYDUfSj8mqwBlblDTHwAw6Cg17VdDJQ1-X5ud1sn7Vx0lqBUCpRWfhQakeJbGZ1Ng1et99Yab8Z3mJwMye7WfMP', 'android'),
(30, 24, 'fePAgg_9SVo:APA91bGNYsIZpwAkPE1OKUYbQqY9fU0TA_IeLEW7xsAOAajfCDJKvfIx9zAzuXzwQD8Vc2Sv6z6XESL5uQY69H_fdmyEnXSIsggQYV9ZW3ugsJ0hF2d4UGMtAl5mVocwIoMFalWwm2jR', 'android'),
(31, 5, 'cOcIZXz3BFs:APA91bElWIzVVqyOodvfl3rvRppVvmZ4XZEQ_FY6PQaHpZ9o9gdlclROFsqB77JhhQbj5hT8UgIq4iupYx69O8123SD9-VZEIS-C7oQGiNDG_2GVEw7K1Y0n31OWyF1LaxsuUgOGGVKa', 'android'),
(32, 45, 'eZeMtnJiWMA:APA91bEG0U_hY4QEmIvbIBqw9sScwwkjpP3WTxeeH84yY6zTT2O-6aTj4EJjeH6qKfZLsCV0nYkjHuHsLIQKsdOZB0ly1DhaxszK9Nzt_3hynJKk-cjd5hSsRW8b8GBsyzJkvilJusCY', 'android'),
(33, 5, 'e-nheGhRZLk:APA91bHFFPaJveVWfpTS7efihfkr_Eq30paN4cFL05BptcC398xpaNu44KwX_IeqhuO__-TbmiCOKi-FDVPk37S3aQBujW0AUUAKT8Wua2QfYVwgbYGB5NRuzsVrg7sZwhLVVcmBnXH4', 'android'),
(34, 53, 'dlJE1EWt-Kw:APA91bGbfRwG0mLr9Iz9DH9w5JOhh5sIkYRfF9nFcAn9IUfA3cWfnFURTIymPbbz8VSz6sfBxM3-8VRRMoFtUIVf6rnye-13X9bcJnxscY6cvzYNxTFrTi-N_Ys5YZ_HmwGNBNpzqP6V', 'android'),
(35, 53, 'ds5UNvRVfrg:APA91bFaJYJDAX442XIwYRSNRraYgFaFat24U3HF4hn3pshe33adstmE68Y3r2t4VRbgNKwTTI4e7782_LpCvbgU3KyIbydetqEb-CjOxyOq-sBOl5SLV3APMnQV1BHGupyZU5pfgSJ8', 'android'),
(36, 54, '959869CC5846D0D926744AB704094DD0B312D8F6EBDD79315F76705F4C25E135', 'ios'),
(37, 56, 'cOUXMw5o2EvXqSUooBXAko:APA91bE-3AZq19DVwR2u0iag08rwmTlqAIWlhOpV0829NTCeevJ_rBzjpH5K7V90zaCuX4xYYpkbYzfYtErgrhy27vu8ONGRipjO8VcZut7dqhKh2TFeVYSMbWmtiyB3wZMPGo_elet7', 'ios'),
(38, 55, 'dM59kBXrSEtIjL9QQMJR8y:APA91bF6Yig1oO0Svoi2CFtPOSU_tfH9KTY6lTn2Q64mLI3li5JWoVmEhApVu4yGG2o5hIDIR4wyTkupp8HCfPW8y-BGus4HuzDFwpnRm8TvzpTkDZ1ffxCJC00T5tEKeEFJDvoagyLt', 'ios'),
(39, 55, 'cMI_Q5cAI0e2jtHNpIrDKF:APA91bGrmYMhEhvG3ZGhiahz3iWcMvlVHvqDEa51PMLuolzdgdCGuHtg6gG4yj916IGg33VM4nAkszHE6XhdozCxySLdxNAMvijBVvAeTK3c3gK69eC0AMtbo4uHDpI8V84BwakkDR2l', 'ios'),
(40, 56, 'ck_9P_4wyE31ihWZ-ENelP:APA91bFndKPSduugyBW2p-SYC9CNWos_9gk63l1jmb9CdybmuMmqUr_OEu6-nK8x_8SL9Hzpa0Toxzd6k4UNUp3W5iPIaqLlusQy4UdbBTYt8pMzAgFjRPhHP5viqrIH9dptae8Qthei', 'ios'),
(41, 55, 'fxKZBYqC5kU:APA91bFtXq6JdgliDFFWuOh-pqgT4bmEtYhe1zWjbEyKhgQ6qmcKpzCr-8fB1BrNZOdZmCIkN4Np6DPRHoTE2dMnNT5kBuGJVuPhJSk52u_iDDFiMoM8ErLcByG4mGyAI-DeK18oAbtA', 'android'),
(42, 58, 'du2nn7-kUp4:APA91bE1kPkkuvVqodBCBcSOBr5q65W2_x94E9wxoYPjIza_275JVns6AufWW2ysrIBngd9uhO9dBJLF3u2BY_cY06VCz3MJHjd5YOK7UnyDLw2FskjLrHNftU06HSK8u7TNpeun5EdR', 'android'),
(43, 61, 'fcQO2Y37u-c:APA91bHp1daS7xVqJQ_WfTby4ZzEse442D6w3ylvgeHszBjzPeH0kvuPxfzRvS3LX5uz_gNNLYkA03iroVTx04wHRjVY6SAshlUAQiSmpFGdrQ3t1hWL01IdpN8ZcnH46rUm3aq8NSnh', 'android');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dentalsb_admin`
--
ALTER TABLE `dentalsb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_appointment`
--
ALTER TABLE `dentalsb_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_appointment_type`
--
ALTER TABLE `dentalsb_appointment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_category`
--
ALTER TABLE `dentalsb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_chat`
--
ALTER TABLE `dentalsb_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_checkin_status`
--
ALTER TABLE `dentalsb_checkin_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_dentalxchange`
--
ALTER TABLE `dentalsb_dentalxchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_gallery`
--
ALTER TABLE `dentalsb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_history_form`
--
ALTER TABLE `dentalsb_history_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_insurance`
--
ALTER TABLE `dentalsb_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_insurance_provider`
--
ALTER TABLE `dentalsb_insurance_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_key`
--
ALTER TABLE `dentalsb_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_location`
--
ALTER TABLE `dentalsb_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_notification`
--
ALTER TABLE `dentalsb_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_offer`
--
ALTER TABLE `dentalsb_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_patient_acknowledge_form`
--
ALTER TABLE `dentalsb_patient_acknowledge_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_patient_screening_form`
--
ALTER TABLE `dentalsb_patient_screening_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_provider`
--
ALTER TABLE `dentalsb_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_question`
--
ALTER TABLE `dentalsb_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_questionnaire`
--
ALTER TABLE `dentalsb_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_referral`
--
ALTER TABLE `dentalsb_referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_review`
--
ALTER TABLE `dentalsb_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_sterilization`
--
ALTER TABLE `dentalsb_sterilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_user`
--
ALTER TABLE `dentalsb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_user_answer`
--
ALTER TABLE `dentalsb_user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalsb_user_device`
--
ALTER TABLE `dentalsb_user_device`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dentalsb_admin`
--
ALTER TABLE `dentalsb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalsb_appointment`
--
ALTER TABLE `dentalsb_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `dentalsb_appointment_type`
--
ALTER TABLE `dentalsb_appointment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dentalsb_category`
--
ALTER TABLE `dentalsb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dentalsb_chat`
--
ALTER TABLE `dentalsb_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `dentalsb_checkin_status`
--
ALTER TABLE `dentalsb_checkin_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dentalsb_dentalxchange`
--
ALTER TABLE `dentalsb_dentalxchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalsb_gallery`
--
ALTER TABLE `dentalsb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dentalsb_history_form`
--
ALTER TABLE `dentalsb_history_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `dentalsb_insurance`
--
ALTER TABLE `dentalsb_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dentalsb_insurance_provider`
--
ALTER TABLE `dentalsb_insurance_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dentalsb_key`
--
ALTER TABLE `dentalsb_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalsb_location`
--
ALTER TABLE `dentalsb_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dentalsb_notification`
--
ALTER TABLE `dentalsb_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `dentalsb_offer`
--
ALTER TABLE `dentalsb_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalsb_patient_acknowledge_form`
--
ALTER TABLE `dentalsb_patient_acknowledge_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dentalsb_patient_screening_form`
--
ALTER TABLE `dentalsb_patient_screening_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dentalsb_provider`
--
ALTER TABLE `dentalsb_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalsb_question`
--
ALTER TABLE `dentalsb_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dentalsb_questionnaire`
--
ALTER TABLE `dentalsb_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentalsb_referral`
--
ALTER TABLE `dentalsb_referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dentalsb_review`
--
ALTER TABLE `dentalsb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dentalsb_sterilization`
--
ALTER TABLE `dentalsb_sterilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dentalsb_user`
--
ALTER TABLE `dentalsb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `dentalsb_user_answer`
--
ALTER TABLE `dentalsb_user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentalsb_user_device`
--
ALTER TABLE `dentalsb_user_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
