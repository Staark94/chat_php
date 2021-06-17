-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 17, 2021 at 07:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(3) UNSIGNED NOT NULL,
  `to` int(3) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `send` tinyint(1) NOT NULL DEFAULT 1,
  `retrive` tinyint(1) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `readDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `from` (`from`,`to`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `from`, `to`, `content`, `send`, `retrive`, `date`, `readDate`) VALUES
(1, 1, 2, 'blabla', 1, 0, '2021-06-17 11:48:39', '0000-00-00 00:00:00'),
(2, 1, 2, 'blablakdguyasdbgdkas', 1, 0, '2021-06-17 11:50:28', '0000-00-00 00:00:00'),
(3, 1, 2, 'salut', 1, 0, '2021-06-17 11:51:18', '0000-00-00 00:00:00'),
(4, 1, 2, 'salut', 1, 0, '2021-06-17 11:51:36', '0000-00-00 00:00:00'),
(5, 1, 2, '', 1, 0, '2021-06-17 12:06:40', '0000-00-00 00:00:00'),
(6, 1, 2, 'jldaladsadlasd/', 1, 0, '2021-06-17 12:15:10', '0000-00-00 00:00:00'),
(7, 1, 2, 'This is some content from a media component. You can replace this with any content and adjust it as needed.', 1, 0, '2021-06-17 12:42:36', '0000-00-00 00:00:00'),
(8, 1, 2, 'Set the direction of flex items in a flex container with direction utilities. In most cases you can omit the horizontal class here as the browser default is row. However, you may encounter situations where you needed to explicitly set this value (like responsive layouts).', 1, 0, '2021-06-17 12:43:44', '0000-00-00 00:00:00'),
(9, 2, 1, 'Testing', 1, 0, '2021-06-17 12:48:13', '0000-00-00 00:00:00'),
(10, 2, 1, 'Hello, that is a new message', 1, 0, '2021-06-17 12:53:40', '0000-00-00 00:00:00'),
(11, 2, 1, 'I like that chat', 1, 0, '2021-06-17 12:54:20', '0000-00-00 00:00:00'),
(12, 1, 2, 'Yeah, an nice chat php', 1, 0, '2021-06-17 13:19:13', '0000-00-00 00:00:00'),
(13, 1, 2, 'Bye, see you', 1, 0, '2021-06-17 13:19:31', '0000-00-00 00:00:00'),
(14, 2, 1, 'Ok, thank you have a good day', 1, 0, '2021-06-17 13:19:37', '0000-00-00 00:00:00'),
(15, 1, 2, 'Bye, see you', 1, 0, '2021-06-17 13:21:37', '0000-00-00 00:00:00'),
(16, 1, 2, 'ByBybYE', 1, 0, '2021-06-17 13:54:51', '0000-00-00 00:00:00'),
(17, 1, 2, 'I am looking for your next templates', 1, 0, '2021-06-17 13:55:28', '0000-00-00 00:00:00'),
(18, 2, 1, 'Ok, thank you have a good day', 1, 0, '2021-06-17 13:56:01', '0000-00-00 00:00:00'),
(19, 1, 2, 'Hi !', 1, 0, '2021-06-17 18:03:58', '0000-00-00 00:00:00'),
(20, 2, 1, 'Hii, nice see you :)', 1, 0, '2021-06-17 18:06:31', '0000-00-00 00:00:00'),
(21, 1, 2, 'You are ok ? :)', 1, 0, '2021-06-17 18:07:28', '0000-00-00 00:00:00'),
(22, 1, 2, 'Yes, i\'m fine, you?', 1, 0, '2021-06-17 18:15:28', '0000-00-00 00:00:00'),
(23, 1, 2, 'Ajax refrech', 1, 0, '2021-06-17 18:38:10', '0000-00-00 00:00:00'),
(24, 1, 2, 'Ajax ajax', 1, 0, '2021-06-17 18:39:05', '0000-00-00 00:00:00'),
(25, 2, 1, 'Nice work Staark :)', 1, 0, '2021-06-17 18:43:08', '0000-00-00 00:00:00'),
(26, 1, 2, 'Thanks Sir.', 1, 0, '2021-06-17 18:47:05', '0000-00-00 00:00:00'),
(27, 1, 3, 'Hi, you are ok?', 1, 0, '2021-06-17 19:13:13', '0000-00-00 00:00:00'),
(28, 3, 1, 'Yes, thanks !', 1, 0, '2021-06-17 19:13:40', '0000-00-00 00:00:00'),
(29, 1, 3, 'That is your project?', 1, 0, '2021-06-17 19:15:00', '0000-00-00 00:00:00'),
(30, 1, 2, 'Hii, i have an question', 1, 0, '2021-06-17 19:16:38', '0000-00-00 00:00:00'),
(31, 2, 1, 'Yes?', 1, 0, '2021-06-17 19:16:45', '0000-00-00 00:00:00'),
(32, 1, 2, 'I like that chat?', 1, 0, '2021-06-17 19:17:14', '0000-00-00 00:00:00'),
(33, 2, 1, 'Yes, i like your work :)', 1, 0, '2021-06-17 19:17:28', '0000-00-00 00:00:00'),
(34, 3, 1, 'Yes is my work :)', 1, 0, '2021-06-17 19:18:31', '0000-00-00 00:00:00'),
(35, 1, 3, 'Nice, where found the source?', 1, 0, '2021-06-17 19:19:00', '0000-00-00 00:00:00'),
(36, 3, 1, 'Check my github page :)', 1, 0, '2021-06-17 19:19:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`) VALUES
(1, 'Admin', 'https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg', 'admin@chat.mvc.dev'),
(2, 'Test', 'https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg', 'test@mvc.dev'),
(3, 'Demo', 'https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg', 'test@mvc.dev');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
