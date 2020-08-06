<?php

/*
	----------------------------------------------------------
	created by Mclean Classic Kasambala, 
	The Polytechnic, University of Malawi...
	on 23 February, 2018
	shekmusic.com DATABASE (music-website);
	
	phone: (+265) 885 6 390 91
	e-mail: mcleankasambala@gmail.com
	----------------------------------------------------------
*/


//changing default charset to utf8
$connections->query("ALTER DATABASE shekmusic CHARACTER SET utf8 COLLATE utf8_general_ci");
	
//Table structure for table `admin`

$connections->query("CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `passcode` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
");
//Table structure for table `tbl_index`

$connections->query("CREATE TABLE IF NOT EXISTS `tbl_index` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
");

//Table structure for table `hot_ten`

 $connections->query("CREATE TABLE IF NOT EXISTS hot_ten (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"

//Table structure for table `tbl_sponser`

$connections->query("CREATE TABLE IF NOT EXISTS `tbl_sponser` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_mime` varchar(55) NOT NULL,
  `file_path` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
");

//Table structure for table `whatsapp_users`

 $connections->query("CREATE TABLE IF NOT EXISTS `whatsapp_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `username` varchar(25) NOT NULL,
  `district` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` int(15) NOT NULL,
  `created_on` timestamp NOT NULL,
  `_status` varchar(24) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
");

//Table structure for table `tbl_video`

 $connections->query("CREATE TABLE IF NOT EXISTS tbl_video (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"
				
//Table structure for table `tbl_audio`

 $connections->query("CREATE TABLE IF NOT EXISTS tbl_audio (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `audio_mime` varchar(12) NOT NULL,
  `audio_path` varchar(55) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"


//Table structure for table `albums`

 $connections->query("CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_mime` varchar(12) NOT NULL,
  `file_path` varchar(55) NOT NULL,
  `genre` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `producer` varchar(25) NOT NULL,
  `created_on` timestamp NOT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;");

//Table structure for table `e_news`

 $connections->query("CREATE TABLE IF NOT EXISTS e_news (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `reporter` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"



//Table structure for table `events`

 $connections->query("CREATE TABLE IF NOT EXISTS events (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `video_mime` varchar(12) NOT NULL,
  `video_path` varchar(55) NOT NULL,
  `sponsors` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"

?>