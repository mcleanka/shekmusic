-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 12:17 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shekmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'classic', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `sponsors` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `video_mime`, `video_path`, `sponsors`, `description`, `created_on`) VALUES
(4, 'Brett Young - In Case You Didnt Know - YouTube_2 - Copy', 'video/mp4', 'events/VID000004_1520319298.mp4', 'Gig.Tech', 'hie am mclean kasambala', '2018-03-06 06:54:58'),
(5, 'FREDOKISS FT YOUNG KAY MARTSE', 'video/mp4', 'events/VID000005_1522559780.mp4', 'shekmusic', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat\r\n', '2018-04-01 05:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `e_news`
--

CREATE TABLE `e_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `reporter` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_news`
--

INSERT INTO `e_news` (`id`, `title`, `video_mime`, `video_path`, `reporter`, `content`, `created_on`) VALUES
(1, 'Brett Young - In Case You Didnt Know (shekmusic.com)', 'video/mp4', 'news/VID000001_1520320038.mp4', 'GrownUp.com', 'how this can it be hard', '2018-03-06 07:07:18'),
(2, 'Ozil the machine', 'video/mp4', 'news/VID000002_1520320087.mp4', 'hie', 'dyuoxur hfdciduxjn', '2018-03-06 07:08:07'),
(3, 'Brett Young - In Case You Didnt Know - YouTube_2 - Copy', 'video/mp4', 'news/VID000003_1522560504.mp4', 'Chisomo Chilutsi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2018-04-01 05:28:24'),
(4, 'Ozil the machine', 'video/mp4', 'news/VID000004_1522904718.mp4', 'Casablanka@prod', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', '2018-04-05 05:05:18'),
(5, 'FREDOKISS FT YOUNG KAY MARTSE', 'video/mp4', 'news/VID000005_1522904833.mp4', 'Bogasi.int', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', '2018-04-05 05:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `hot_ten`
--

CREATE TABLE `hot_ten` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_ten`
--

INSERT INTO `hot_ten` (`id`, `title`, `video_mime`, `video_path`, `genre`, `producer`, `description`, `created_on`) VALUES
(1, 'Brett Young - In Case You Didnt Know - YouTube_2 - Copy', 'video/mp4', 'hot_ten_videos/VID000001_1520320980.mp4', 'Dancehall', 'kasambala', 'kasaj dskxuh dshxihje ytto drop another track.', '2018-03-06 07:23:00'),
(2, 'Ozil the machine', 'video/mp4', 'hot_ten_videos/VID000002_1520321079.mp4', 'Hip-Hop', 'shekmusic.pro', 'klassic mclean kasambala', '2018-03-06 07:24:39'),
(3, 'Ozil the machine', 'video/mp4', 'hot_ten_videos/VID000003_1520326371.mp4', 'select genre', '', '', '2018-03-06 08:52:51'),
(4, 'vlc-record-2018-02-25-04h39m08s-Brett Young - In Case You Didn', 'video/mp4', 'hot_ten_videos/VID000004_1520326408.mp4', 'select genre', '', '', '2018-03-06 08:53:28'),
(5, 'vlc-record-2018-02-25-04h38m41s-Brett Young - In Case You Didn', 'video/mp4', 'hot_ten_videos/VID000005_1520326448.mp4', 'select genre', '', '', '2018-03-06 08:54:08'),
(6, 'Ozil the machine', 'video/mp4', 'hot_ten_videos/VID000006_1520326515.mp4', 'select genre', '', '', '2018-03-06 08:55:15'),
(7, 'FREDOKISS FT YOUNG KAY MARTSE', 'video/mp4', 'hot_ten_videos/VID000007_1522906861.mp4', 'Gospel', 'Classic.iNT', '				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n', '2018-04-05 05:41:01'),
(8, 'Jidenna__Bambi_1604Ent.com', 'video/mp4', 'hot_ten_videos/VID000008_1522907893.mp4', 'R&B', 'Wonderland Records', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', '2018-04-05 05:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio`
--

CREATE TABLE `tbl_audio` (
  `id` int(11) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `audio_mime` varchar(12) NOT NULL,
  `audio_path` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_audio`
--

INSERT INTO `tbl_audio` (`id`, `artist`, `title`, `audio_mime`, `audio_path`, `producer`, `genre`, `description`, `created_on`) VALUES
(1, 'Ub40', 'Sweet_Cherrie', 'audio/mpeg', 'audios/VID000001_1519663217.mpeg', 'hello', 'Hip-Hop', 'hie there', '2019-03-22 00:07:39'),
(2, 'Ub40', 'BRING ME_1', 'audio/mp3', 'audios/VID000002_1519968375.mp3', 'mclean', 'Afro-pop', 'welu am in mponera so far ndabwera zulo', '2019-03-22 00:07:40'),
(3, 'CHRONIXX', 'ACCESS GRANTED', 'audio/mpeg', 'audios/VID000003_1522556659.mpeg', 'Shekmusic.com', 'Dancehall', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n', '2019-03-22 00:07:40'),
(4, '', 'Alkaline - Things Take Time (Clean)', 'audio/mpeg', 'audios/VID000004_1522557447.mpeg', 'We Are Here prod', 'R&B', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', '2018-04-01 04:37:27'),
(5, '', 'ALKALINE_-_EVERYDAY_(mp3.pm)', 'audio/mpeg', 'audios/VID000005_1522558142.mpeg', 'sjfckhjxcb', 'Dancehall', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2018-04-01 04:49:03'),
(6, '', 'Alkaline_-_Move_Mountains_Things_Mi_Love_(Raw)_32103', 'audio/mpeg', 'audios/VID000006_1522558290.mpeg', 'Kasambala', 'House', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2018-04-01 04:51:30'),
(7, '', 'ALKALINE_-_EVERYDAY_(mp3.pm)', 'audio/mpeg', 'audios/VID000007_1522558480.mpeg', 'Kasambala', 'House', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2018-04-01 04:54:40'),
(8, '', 'Davido-Fall', 'audio/mpeg', 'audios/VID000008_1522559409.mpeg', 'Excusive To Shekmusic', 'R&B', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', '2018-04-01 05:10:10'),
(9, 'Davido', 'Fall', 'audio/mpeg', 'audios/VID000009_1522600395.mpeg', 'Excusive to Naija Vibers', 'R&B', 'koma davido matama ngat umakhoza ndala kapena pa dollar pali khope yako bwanji.... kuziva with chikhope chonyasa si bho... kungoti anat mamuna ndi thumba? hahahaha gather yourself brah kkk', '2019-03-22 00:07:40'),
(10, 'Justin Beiber', 'Love Me | shekmusic.com', 'audio/mpeg', 'audios/VID000010_1522735750.mpeg', 'Khalid', 'Hip-Hop', 'kasjdjsakjds dasdfiahfsn sadd sadfufsiweyqe dskdusdsnduftsw dwdskfsyysdshgc xuyewh ngxyzzawejf ugxjekc vyfteyylxejsdcsgayf gfhree fefhfvjds jasydakf nfyauitewiw chjgiu hydafkj', '2019-03-22 00:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `artist`, `title`, `video_mime`, `video_path`, `producer`, `genre`, `description`, `created_on`) VALUES
(1, '', 'Brett Young - In Case You Didnt Know', 'video/mp4', 'videos/VID000001_1519658393.mp4', 'Classic (shekmusic prod)', 'R&B', 'love issue are hard to understand them... people will always hurt one another however, true love exist.', '2018-02-26 15:19:53'),
(2, '', 'Ozil the machine', 'video/mp4', 'videos/VID000002_1519922942.mp4', 'khujhyj', 'Dancehall', 'hgftd tdsytjutkh htserkfhyg', '2018-03-01 16:49:02'),
(3, '', 'Brett Young - In Case You Didnt Know - YouTube_2 - Copy', 'video/mp4', 'videos/VID000003_1520291592.mp4', 'undefined', 'undefined', 'classic mclean', '2018-03-05 23:13:12'),
(4, '', 'Ozil the machine', 'video/mp4', 'videos/VID000004_1520291718.mp4', 'undefined', 'undefined', 'black or white', '2018-03-05 23:15:18'),
(5, '', 'Brett Young - In Case You Didnt Know - YouTube_2 - Copy', 'video/mp4', 'videos/VID000005_1520292056.mp4', 'undefined', 'undefined', 'yes i am', '2018-03-05 23:20:56'),
(6, 'Brett Young', 'In Case You Didn', 'video/mp4', 'videos/VID000006_1520325073.mp4', 'Nyuxy', 'Local', 'Integer pulvinar leo id risus pellentesque vestibulum.\r\nSed diam libero, sodales eget sapien vel, porttitor bibendum\r\nenim. Donec sed nibh vitae lorem porttitor blandit in nec ante.\r\nPellentesque vitae metus ipsum. Phasellus sed nunc ac sem\r\nmalesuada condimentum. Etiam in aliquam lectus. Nam vel sapien\r\ndiam. Donec pharetra id arcu eget blandit. Proin imperdiet\r\nmattis augue in porttitor. Quisque tempus enim id lobortis\r\nfeugiat. Suspendisse tincidunt risus quis dolor fringilla\r\nblandit. Ut sed sapien at purus lacinia porttitor. Nullam\r\niaculis, felis a pretium ornare, dolor nisl semper tortor, vel\r\nsagittis lacus est consequat eros. Sed id pretium nisl.\r\nCurabitur dol', '2019-03-25 20:02:08'),
(7, '', 'In Case You Didnt Know', 'video/mp4', 'videos/VID000007_1520606229.mp4', 'Classic', 'Dancehall', 'kasambala mphamba my name is what i have typed here so if yu want me please just see my contact me info for more details...\r\nInteger pulvinar leo id risus pellentesque vestibulum.\r\nSed diam libero, sodales eget sapien vel, porttitor bibendum\r\nenim. Donec sed nibh vitae lorem porttitor blandit in nec ante.\r\nPellentesque vitae metus ipsum. Phasellus sed nunc ac sem\r\nmalesuada condimentum. Etiam in aliquam lectus. Nam vel sapien\r\ndiam. Donec pharetra id arcu eget blandit. Proin imperdiet\r\nmattis augue in porttitor. Quisque tempus enim id lobortis\r\nfeugiat. Suspendisse tincidunt risus quis dolor fringilla\r\nblandit. Ut sed sapien at purus lacinia porttitor. Nullam\r\niaculis, felis a pretium ornare, dolor nisl semper tortor, vel\r\nsagittis lacus est consequat eros. Sed id pretium nisl.\r\nCurabitur dol', '2019-03-25 20:02:08'),
(8, 'FREDOKISS FT YOUNG KAY MARTSE', 'Ndimadanaza usilu', 'video/mp4', 'videos/VID000008_1522906061.mp4', 'Sukezi', 'House', '				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>\r\n\r\n', '2019-03-25 20:02:08'),
(9, 'Jidena', 'Bambi', 'video/mp4', 'videos/VID000009_1522908008.mp4', 'Wonderland Records', 'Hip-Hop', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2019-03-25 20:02:08'),
(10, 'Jidenna', 'The Let Out ft. Nana Kwabena (Official Video)', 'video/mp4', 'videos/VID000010_1522908260.mp4', 'Wonderland Records', 'Hip-Hop', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2019-03-25 20:02:08'),
(11, 'Jidenna', 'Bambi - Remix', 'video/mp4', 'videos/VID000011_1523173398.mp4', 'Excusive', 'R&B', 'Jidenna to drop his latest Video and music (mp4 and mp3)... A Nigerian by Home town amd American guy, Jidenna release his track on end of the last month March 28, this year.', '2019-03-25 20:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `phone`, `email`, `genre`, `password`, `sign_up_date`, `activated`) VALUES
(1, 'username', 'full name', '123455', 'mclean@gmail.com', 'afro-pop', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-28', '0'),
(2, 'username', 'Full Name', '0885639091', 'mcleankasambala@gmail.com', 'R and B', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-28', '0'),
(3, 'username', 'fname', '08898287', 'mclean@gmail.com', 'genre', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-28', '0'),
(4, 'classic', 'full name', '08898287', 'mclean@gmail.com', 'afro-pop', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-28', '0'),
(5, 'Pido', 'Peter kasambala', '0885639091', 'peterkasambala@gmail.com', 'local', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-28', '0'),
(6, 'ushervin', 'Mclean Mphamba', '0999 304 701', 'shekmusic@gmail.com', 'Dancehall', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-29', '0'),
(7, 'DMX -Y', 'Sarah Mphamba', '0999 304 701', 'sarahmphamba@gmail.com', 'Hip-Hop', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-29', '0'),
(8, 'kingcp', 'King Nyambosi', '0888 563 9091', 'kingcp@gmail.com', 'Hip-Hop', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-04-07', '0'),
(9, 'M-Lex', 'alex Majamanda', '0999 304 701', 'alexmajamanda@gmail.com', 'Hip-Hop', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-04-07', '0'),
(10, 'ClassicK', 'Classic Kasambala', '08898287', 'classic@gmail.com', 'Dancehall', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-04-07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_users`
--

CREATE TABLE `whatsapp_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `username` varchar(25) NOT NULL,
  `district` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` int(15) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `_status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_news`
--
ALTER TABLE `e_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hot_ten`
--
ALTER TABLE `hot_ten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_audio`
--
ALTER TABLE `tbl_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapp_users`
--
ALTER TABLE `whatsapp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `e_news`
--
ALTER TABLE `e_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hot_ten`
--
ALTER TABLE `hot_ten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_audio`
--
ALTER TABLE `tbl_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
