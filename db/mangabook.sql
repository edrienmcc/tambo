-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2024 at 02:39 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbl_sementara_mangabook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id_announcement` int(50) NOT NULL,
  `title_announcement` varchar(100) NOT NULL,
  `short_announcement` varchar(250) NOT NULL,
  `desc_announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement_content`
--

CREATE TABLE `tbl_announcement_content` (
  `id_announ_content` int(50) NOT NULL,
  `id_announcement` int(50) NOT NULL,
  `id_user_announcement` int(50) NOT NULL,
  `status_announcement` int(2) NOT NULL,
  `time_announcement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id_author` int(11) NOT NULL,
  `name_author` varchar(222) NOT NULL,
  `image_author` text NOT NULL,
  `short_desc_author` varchar(100) NOT NULL,
  `desc_author` text NOT NULL,
  `author_email` varchar(50) NOT NULL,
  `author_password` varchar(50) NOT NULL,
  `status_author` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id_author`, `name_author`, `image_author`, `short_desc_author`, `desc_author`, `author_email`, `author_password`, `status_author`) VALUES
(5, 'Hajime Isayama', '1625096883_haji.jpg', 'Hajime Isayama is a Japanese manga artist. His first serial, Attack on Titan.', 'Hajime Isayama is a Japanese manga artist. His first serial, Attack on Titan, became one of the best-selling manga series of all time with 100 million copies in circulation as of December 2019.', 'hajimeisayama@gmail.com', 'hajime', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(111) NOT NULL,
  `cat_name` varchar(111) NOT NULL,
  `photo_cat` text NOT NULL,
  `cat_status` int(1) NOT NULL DEFAULT '0',
  `cat_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `photo_cat`, `cat_status`, `cat_background`) VALUES
(1, 'Action', '1625096619_aot.png', 1, '#ff3300'),
(2, 'Children', '1625196143_001.jpg', 1, '#17004d'),
(3, 'Horror', '1625196221_001.jpg', 1, '#c7db61'),
(4, 'Adventure', '1625196221_001.jpg', 1, '#c2c2c2'),
(5, 'Halo', '1678525280_Artboard1.png', 1, '#8f8f94'),
(6, 'This is demo', '1679101919_main_img.png', 1, '#2933c7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection`
--

CREATE TABLE `tbl_collection` (
  `id_collection` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_ebook` int(50) NOT NULL,
  `id_collection_title` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection_title`
--

CREATE TABLE `tbl_collection_title` (
  `id_collection_title` int(50) NOT NULL,
  `collection_title` varchar(100) NOT NULL,
  `collection_title_user_id` int(50) NOT NULL,
  `created_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id_comments` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_book` int(50) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id_packs` int(11) NOT NULL,
  `name` text NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `photo_course` text NOT NULL,
  `category` int(11) NOT NULL,
  `shortdes` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `views` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id_packs`, `name`, `author`, `status`, `photo_course`, `category`, `shortdes`, `description`, `views`) VALUES
(1, 'Attack on Titan Completed Manga - Full Colors', 5, 0, 'edumy_1625101686_aot.png', 1, 'Centuries ago, mankind was slaughtered to near extinction by monstrous humanoid creatures called titans, forcing humans to hide in fear behind enormous concentric walls.', '<p>What makes these giants truly terrifying is that their taste for human flesh is not born out of hunger but what appears to be out of pleasure. To ensure their survival, the remnants of humanity began living within defensive barriers, resulting in one hundred years without a single titan encounter. However, that fragile calm is soon shattered when a colossal titan manages to breach the supposedly impregnable outer wall, reigniting the fight for survival against the man-eating abominations.</p>\r\n', 0),
(2, 'Captain Tsubasa Golder 23 - Complete Full Colors', 5, 1, 'mangabook_1625196353_002.jpg', 2, 'Japanese manga series written and illustrated by Yoichi Takahashi since 1981. The series mainly revolves around the sport of association football focusing on Tsubasa Oozora.', '<p><em><strong>Captain Tsubasa</strong></em>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Japanese_language\">Japanese</a>:&nbsp;ã‚­ãƒ£ãƒ—ãƒ†ãƒ³ç¿¼,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hepburn_romanization\">Hepburn</a>:&nbsp;<em>Kyaputen Tsubasa</em>)&nbsp;is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Manga\">manga</a>&nbsp;series written and illustrated by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Y%C5%8Dichi_Takahashi\">YÅichi Takahashi</a>&nbsp;since 1981.<a href=\"https://en.wikipedia.org/wiki/Captain_Tsubasa#cite_note-AnimaxIndia-2\">[2]</a>&nbsp;The series mainly revolves around the sport of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Association_football\">association football</a>&nbsp;focusing on&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tsubasa_Oozora\">Tsubasa Oozora</a>. The series is characterized by dynamic and exciting football moves, often stylish and implausible. The plot focuses on Tsubasa&#39;s relationship with his friends, rivalries with his opponents, training, competition and the action and outcome of each football match. Across the multiple&nbsp;<em>Captain Tsubasa</em>&nbsp;series, the plot shows Tsubasa&#39;s and his friends&#39; growth as they face new rivals. Takahashi decided to create the manga inspired by the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1978_FIFA_World_Cup\">1978 FIFA World Cup</a>&nbsp;in Argentina.</p>\r\n', 0),
(3, 'Detective Conan Police Academy Arc Wild Police Story', 5, 1, 'mangabook_1625196555_003.jpg', 2, 'Japanese detective manga series written and illustrated by Gosho Aoyama. It has been serialized in Shogakukans Weekly ShÅnen Sunday since January 1994,', '<p><em><strong>Case Closed</strong></em>, also known as&nbsp;<em><strong>Detective Conan</strong></em>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Japanese_language\">Japanese</a>:&nbsp;åæŽ¢åµã‚³ãƒŠãƒ³,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hepburn_romanization\">Hepburn</a>:&nbsp;<em>Meitantei Konan</em>), is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Detective_fiction\">detective</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Manga\">manga</a>&nbsp;series written and illustrated by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gosho_Aoyama\">Gosho Aoyama</a>. It has been serialized in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shogakukan\">Shogakukan</a>&#39;s&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Weekly_Sh%C5%8Dnen_Sunday\">Weekly ShÅnen Sunday</a></em>&nbsp;since January 1994, with its chapters collected in 99&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Tank%C5%8Dbon\">tankÅbon</a></em>&nbsp;volumes as of April 2021. Due to legal problems with the name&nbsp;<em>Detective Conan</em>, the English language releases from Funimation and Viz were renamed to&nbsp;<em>Case Closed</em>. The story follows the high school detective&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shinichi_Kudo\">Shinichi Kudo</a>&nbsp;(renamed as Jimmy Kudo in several English translations) who was transformed into a child while investigating a mysterious organization and solves a multitude of cases while impersonating his childhood best friend&#39;s father and other characters.</p>\r\n', 0),
(4, 'Dragon Ball Episode of Bardock', 5, 1, 'mangabook_1625196797_001.jpg', 1, 'The initial manga, written and illustrated by Toriyama, was serialized in Weekly Shonen Jump from 1984 to 1995, with the 519 individual chapters collected into 42 tankobon volumes', '<p><em><strong>Dragon Ball</strong></em>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Japanese_language\">Japanese</a>:&nbsp;ãƒ‰ãƒ©ã‚´ãƒ³ãƒœãƒ¼ãƒ«,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hepburn_romanization\">Hepburn</a>:&nbsp;<em>Doragon BÅru</em>)&nbsp;is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Media_franchise\">media franchise</a>&nbsp;created by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Akira_Toriyama\">Akira Toriyama</a>&nbsp;in 1984. The&nbsp;<a href=\"https://en.wikipedia.org/wiki/Dragon_Ball_(manga)\">initial manga</a>, written and illustrated by Toriyama, was serialized in&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Weekly_Sh%C5%8Dnen_Jump\">Weekly ShÅnen Jump</a></em>&nbsp;from 1984 to 1995, with the 519 individual chapters collected into 42&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Tank%C5%8Dbon\">tankÅbon</a></em>&nbsp;volumes by its publisher&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shueisha\">Shueisha</a>.&nbsp;<em>Dragon Ball</em>&nbsp;was originally inspired by the classical 16th-century Chinese novel&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Journey_to_the_West\">Journey to the West</a></em>, combined with elements of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hong_Kong_martial_arts_films\">Hong Kong martial arts films</a>. The series follows the adventures of protagonist&nbsp;<a href=\"https://en.wikipedia.org/wiki/Goku\">Son Goku</a>&nbsp;from his childhood through adulthood as he trains in martial arts. He spends his childhood far from civilization until he meets a teen girl named&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bulma\">Bulma</a>, who encourages him to join her quest in exploring the world in search of the seven orbs known as the Dragon Balls, which summon a wish-granting dragon when gathered. Along his journey, Goku makes several other friends, becomes a family man, discovers his alien heritage, and battles a wide variety of villains, many of whom also seek the Dragon Balls.</p>\r\n', 0),
(5, 'Dragon Ball Full Color - Freeza Arc', 5, 1, 'mangabook_1625198775_001.jpg', 5, 'The initial manga, written and illustrated by Toriyama, was serialized in Weekly Shonen Jump from 1984 to 1995, with the 519 individual chapters collected into 42 tankobon volumes by its publisher S', '<p><em><strong>Dragon Ball</strong></em>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Japanese_language\">Japanese</a>:&nbsp;ãƒ‰ãƒ©ã‚´ãƒ³ãƒœãƒ¼ãƒ«,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hepburn_romanization\">Hepburn</a>:&nbsp;<em>Doragon BÅru</em>)&nbsp;is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Media_franchise\">media franchise</a>&nbsp;created by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Akira_Toriyama\">Akira Toriyama</a>&nbsp;in 1984. The&nbsp;<a href=\"https://en.wikipedia.org/wiki/Dragon_Ball_(manga)\">initial manga</a>, written and illustrated by Toriyama, was serialized in&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Weekly_Sh%C5%8Dnen_Jump\">Weekly ShÅnen Jump</a></em>&nbsp;from 1984 to 1995, with the 519 individual chapters collected into 42&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Tank%C5%8Dbon\">tankÅbon</a></em>&nbsp;volumes by its publisher&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shueisha\">Shueisha</a>.&nbsp;<em>Dragon Ball</em>&nbsp;was originally inspired by the classical 16th-century Chinese novel&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Journey_to_the_West\">Journey to the West</a></em>, combined with elements of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hong_Kong_martial_arts_films\">Hong Kong martial arts films</a>. The series follows the adventures of protagonist&nbsp;<a href=\"https://en.wikipedia.org/wiki/Goku\">Son Goku</a>&nbsp;from his childhood through adulthood as he trains in martial arts. He spends his childhood far from civilization until he meets a teen girl named&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bulma\">Bulma</a>, who encourages him to join her quest in exploring the world in search of the seven orbs known as the Dragon Balls, which summon a wish-granting dragon when gathered. Along his journey, Goku makes several other friends, becomes a family man, discovers his alien heritage, and battles a wide variety of villains, many of whom also seek the Dragon Balls.</p>\r\n', 0),
(6, 'Kingdom of Zombie', 5, 1, 'mangabook_1625199318_001.jpg', 3, 'Twenty years after a zombie outbreak Van, a mischievous child, escapes from the house of his grandfather to watch a gladiatorial tournament. ', '<p>Twenty years after a zombie outbreak Van, a mischievous child, escapes from the house of his grandfather to watch a gladiatorial tournament. In his way, Van is asked to deliver a letter to his hero at the gates where the zombies are being held, but a mysterious man kills the guards and lets the zombies escape. Being attacked by the zombies Van shows to have powers and starts to counterattack them.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', 0),
(7, 'One Piece - Digital Colored Comics', 5, 1, 'edumy_1625216481_onepiece.jpg', 1, 'It has been serialized in Shueishas shonen manga magazine Weekly Shonen Jump since July 1997, with its individual chapters compiled into 99 tankobon volumes as of June 2021.', '<p><em><strong>One Piece</strong></em>&nbsp;(stylized as&nbsp;<em><strong>ONE PIECE</strong></em>) is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Manga\">manga</a>&nbsp;series written and illustrated by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Eiichiro_Oda\">Eiichiro Oda</a>. It has been serialized in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shueisha\">Shueisha</a>&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sh%C5%8Dnen_manga\"><em>shÅnen</em>&nbsp;manga</a>&nbsp;magazine&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Weekly_Sh%C5%8Dnen_Jump\">Weekly ShÅnen Jump</a></em>&nbsp;since July 1997, with its individual chapters compiled into 99&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Tank%C5%8Dbon\">tankÅbon</a></em>&nbsp;volumes as of June&nbsp;2021. The story follows the adventures of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Monkey_D._Luffy\">Monkey D. Luffy</a>, a boy whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With his crew of pirates, named the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Straw_Hat_Pirates\">Straw Hat Pirates</a>, Luffy explores the Grand Line in search of the world&#39;s ultimate treasure known as &quot;One Piece&quot; in order to become the next King of the Pirates.</p>\r\n\r\n<p>The manga spawned a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Media_franchise\">media franchise</a>, having been adapted into a festival film produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Production_I.G\">Production I.G</a>, and an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Anime\">anime</a>&nbsp;series produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Toei_Animation\">Toei Animation</a>, which began broadcasting in Japan in 1999. Additionally, Toei has developed fourteen animated feature films, one&nbsp;<a href=\"https://en.wikipedia.org/wiki/Original_video_animation\">OVA</a>&nbsp;and thirteen television specials. Several companies have developed various types of merchandising and media, such as a trading card game and&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_One_Piece_video_games\">numerous video games</a>. The manga series was licensed for an English language release in North America and the United Kingdom by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Viz_Media\">Viz Media</a>&nbsp;and in Australia by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Madman_Entertainment\">Madman Entertainment</a>. The anime series was licensed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/4Licensing_Corporation\">4Kids Entertainment</a>&nbsp;for an English-language release in North America in 2004, before the license was dropped and subsequently acquired by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Funimation\">Funimation</a>&nbsp;in 2007.</p>\r\n', 0),
(8, 'Silver Spoon', 5, 1, 'mangabook_1625199902_001.jpg', 2, 'Japanese coming-of-age manga series written and illustrated by Hiromu Arakawa, serialized in Shogakukans Weekly Shonen Sunday from April 2011 to November 2019', '<p><em><strong>Silver Spoon</strong></em>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Japanese_language\">Japanese</a>:&nbsp;éŠ€ã®åŒ™,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hepburn_romanization\">Hepburn</a>:&nbsp;<em>Gin no Saji</em>)&nbsp;is a Japanese&nbsp;<a href=\"https://en.wikipedia.org/wiki/Coming-of-age_story\">coming-of-age</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Manga\">manga</a>&nbsp;series written and illustrated by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hiromu_Arakawa\">Hiromu Arakawa</a>, serialized in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shogakukan\">Shogakukan</a>&#39;s&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Weekly_Sh%C5%8Dnen_Sunday\">Weekly ShÅnen Sunday</a></em>&nbsp;from April 2011 to November 2019. The story is set in the fictional Ooezo Agricultural High School in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hokkaido\">Hokkaido</a>, and depicts the daily life of Yuugo Hachiken, a high school student from&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sapporo\">Sapporo</a>&nbsp;who enrolled at Ooezo Agricultural High School fleeing from the demands of his strict father. However, he soon learns that life on an agricultural school is not as easy as he initially believed. Unlike his new classmates, he has no intention of following an agricultural career after graduating, although he envies them for already having set goals for their lives and the pursuit of their dreams.</p>\r\n\r\n<p>An&nbsp;<a href=\"https://en.wikipedia.org/wiki/Anime\">anime</a>&nbsp;television series adaptation produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/A-1_Pictures\">A-1 Pictures</a>&nbsp;aired for two seasons between July and September 2013 and January and March 2014 on&nbsp;<a href=\"https://en.wikipedia.org/wiki/Fuji_TV\">Fuji TV</a>&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/NoitaminA\">noitaminA</a>&nbsp;block. A&nbsp;<a href=\"https://en.wikipedia.org/wiki/Live-action\">live-action</a>&nbsp;film based on the manga produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Toho\">Toho</a>&nbsp;was released in March 2014.</p>\r\n', 0),
(9, 'Tales of the Unusual', 5, 1, 'mangabook_1625200310_002.jpg', 3, 'Tales of the Unusual is a horror-thriller anthology webtoon created by Oh Seongdae. Its consisting of standalone, self-contained short stories follows characters through their experiences a strange an', '<p><em><strong>Tales of the Unusual</strong></em>&nbsp;is a horror-thriller anthology&nbsp;<a href=\"https://koreanwebtoons.fandom.com/wiki/Webtoon\">webtoon</a>&nbsp;created by Oh Seongdae. Its consisting of standalone, self-contained short stories follows characters through their experiences a strange and unusual events.</p>\r\n\r\n<p>Some plot elements of each story details with different topics such like real-life events, social issues, viral phenomenon, urban legends, paranormal events, and usually involving bizarre and supernatural occurrences with an unusual and unexpected twist.</p>\r\n', 0),
(10, 'The Barefoot Nina', 5, 1, 'mangabook_1625206592_001.jpg', 2, 'The Barefoot Nina - Tappytoon Comics Official English. When shy and timid Eunseo was forced to transfer to the elite Stella Academy of the Arts,', '<p>The&nbsp;<strong>Barefoot Nina</strong>&nbsp;- Tappytoon Comics | Official English. When shy and timid Eunseo was forced to transfer to the elite Stella Academy of the Arts, she expected lonely school days filled with cutthroat competition. So she&#39;s taken by surprise when the free-spirited Ina takes a sudden liking to her.</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_lecture`
--

CREATE TABLE `tbl_course_lecture` (
  `lec_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `title_chapter` text NOT NULL,
  `file_chapter` text NOT NULL,
  `image_chapter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_lecture`
--

INSERT INTO `tbl_course_lecture` (`lec_id`, `cl_id`, `title_chapter`, `file_chapter`, `image_chapter`) VALUES
(1, 1, 'Attack on Titan - Chapter 1', 'chapter_pdf_1625671979Chapter_1.pdf', 'chapter_img_1625671979005.jpg'),
(2, 1, 'Attack on Titan - Chapter 2', 'chapter_pdf_1625672158Chapter_2.pdf', 'chapter_img_1625672158001.jpg'),
(4, 1, 'Attack on Titan - Chapter 3', 'chapter_pdf_1625672223Chapter_3.pdf', 'chapter_img_1625672223003.jpg'),
(5, 1, 'Attack on Titan - Chapter 4', 'chapter_pdf_1625672281Chapter_4.pdf', 'chapter_img_1625672281006.jpg'),
(6, 2, 'Captain Tsubasa Golder - Chapter 1', 'chapter_pdf_1625672385Chapter_1.pdf', 'chapter_img_1625672385002.jpg'),
(7, 2, 'Captain Tsubasa Golder - Chapter 2', 'chapter_pdf_1625672427Chapter_2.pdf', 'chapter_img_1625672427006.jpg'),
(8, 3, 'Detective Conan - Chapter 1', 'chapter_pdf_1625196615Chapter_1.pdf', 'chapter_img_1625196615001.jpg'),
(9, 3, 'Detective Conan - Chapter 2', 'chapter_pdf_1625196657Chapter_2.pdf', 'chapter_img_1625196657002.jpg'),
(10, 3, 'Detective Conan - Chapter 3', 'chapter_pdf_1625196693Chapter_3.pdf', 'chapter_img_1625196693003.jpg'),
(11, 3, 'Detective Conan - Chapter 4', 'chapter_pdf_1625196724Chapter_4.pdf', 'chapter_img_1625196724004.jpg'),
(12, 4, 'Dragon Ball Episode of Bardock - Chapter 1', 'chapter_pdf_1625672587Chapter_1.pdf', 'chapter_img_1625672587001.jpg'),
(13, 4, 'Dragon Ball Episode of Bardock - Chapter 2', 'chapter_pdf_1625672659Chapter_2.pdf', 'chapter_img_1625672659013.jpg'),
(14, 4, 'Dragon Ball Episode of Bardock - Chapter 3', 'chapter_pdf_1625672704Chapter_3.pdf', 'chapter_img_1625672704014.jpg'),
(15, 5, 'Dragon Ball Freeza Arc - Chapter 1', 'chapter_pdf_1625198871Chapter_1.pdf', 'chapter_img_1625198871001.jpg'),
(16, 5, 'Dragon Ball Freeza Arc - Chapter 2', 'chapter_pdf_1625198943Chapter_2.pdf', 'chapter_img_1625198943007.jpg'),
(17, 5, 'Dragon Ball Freeza Arc - Chapter 3', 'chapter_pdf_1625199009Chapter_3.pdf', 'chapter_img_1625199009008.jpg'),
(18, 5, 'Dragon Ball Freeza Arc - Chapter 4', 'chapter_pdf_1625199095Chapter_4.pdf', 'chapter_img_1625199095011.jpg'),
(19, 5, 'Dragon Ball Freeza Arc - Chapter 5', 'chapter_pdf_1625199161Chapter_5.pdf', 'chapter_img_1625199161012.jpg'),
(20, 5, 'Dragon Ball Freeza Arc - Chapter 6', 'chapter_pdf_1625199236Chapter_6.pdf', 'chapter_img_1625199236013.jpg'),
(21, 6, 'Kingdom of Zombie - Chapter 1', 'chapter_pdf_1625672835Chapter_1.pdf', 'chapter_img_1625672835001.jpg'),
(22, 6, 'Kingdom of Zombie - Chapter 2', 'chapter_pdf_1625672888Chapter_2.pdf', 'chapter_img_1625672888003.jpg'),
(23, 7, 'One Piece - Chapter 1', 'chapter_pdf_1625199683Chapter_2.pdf', 'chapter_img_1625199683040.jpg'),
(24, 7, 'One Piece - Chapter 2', 'chapter_pdf_1625199757Chapter_3.pdf', 'chapter_img_1625199757041.jpg'),
(25, 7, 'One Piece - Chapter 3', 'chapter_pdf_1625199831Chapter_4.pdf', 'chapter_img_1625199831042.jpg'),
(26, 8, 'Silver Spoon - Chapter 1', 'chapter_pdf_1625200030Chapter_2.pdf', 'chapter_img_1625200030001.jpg'),
(27, 8, 'Silver Spoon - Chapter 2', 'chapter_pdf_1625200200Chapter_3.pdf', 'chapter_img_1625200200013.jpg'),
(28, 9, 'Tales of the Unusual - Chapter 1', 'chapter_pdf_1625204978Chapter_1.pdf', 'chapter_img_1625204978014.jpg'),
(29, 9, 'Tales of the Unusual - Chapter 2', 'chapter_pdf_1625205012Chapter_2.pdf', 'chapter_img_1625205012015.jpg'),
(30, 9, 'Tales of the Unusual - Chapter 3', 'chapter_pdf_1625205039Chapter_3.pdf', 'chapter_img_1625205039016.jpg'),
(31, 9, 'Tales of the Unusual - Chapter 4', 'chapter_pdf_1625205069Chapter_4.pdf', 'chapter_img_1625205069017.jpg'),
(32, 10, 'The Barefoot Nina - Chapter 1', 'chapter_pdf_1625206633Chapter_1.pdf', 'chapter_img_1625206633001.jpg'),
(33, 10, 'The Barefoot Nina - Chapter 2', 'chapter_pdf_1625206654Chapter_2.pdf', 'chapter_img_1625206654005.jpg'),
(34, 10, 'The Barefoot Nina - Chapter 3', 'chapter_pdf_1625206674Chapter_3.pdf', 'chapter_img_1625206674007.jpg'),
(35, 10, 'The Barefoot Nina - Chapter 4', 'chapter_pdf_1625206700Chapter_4.pdf', 'chapter_img_1625206700016.jpg'),
(36, 10, 'The Barefoot Nina - Chapter 5', 'chapter_pdf_1625206756Chapter_5.pdf', 'chapter_img_1625206756007.png'),
(37, 10, 'The Barefoot Nina - Chapter 6', 'chapter_pdf_1625206798Chapter_6.pdf', 'chapter_img_1625206798016.jpg'),
(38, 10, 'The Barefoot Nina - Chapter 7', 'chapter_pdf_1625206843Chapter_7.pdf', 'chapter_img_1625206843017.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `id_favorites` int(100) NOT NULL,
  `id_fav_course` int(100) NOT NULL,
  `id_fav_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id_rating` int(100) NOT NULL,
  `id_course_rating` int(10) NOT NULL,
  `id_user_rating` int(10) NOT NULL,
  `ratings` varchar(10) NOT NULL,
  `feedback_rating` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(10) NOT NULL,
  `slider` int(1) NOT NULL DEFAULT '1',
  `ads` int(2) DEFAULT '0',
  `startapplivemode` int(1) NOT NULL DEFAULT '0',
  `startappaccountid` varchar(200) NOT NULL,
  `androidappid` varchar(200) NOT NULL,
  `iosappid` varchar(200) NOT NULL,
  `admobreward` varchar(100) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `interstisial` varchar(100) NOT NULL,
  `unitylivemode` int(1) NOT NULL DEFAULT '0',
  `unitygameid` varchar(50) NOT NULL,
  `unitybanner` varchar(50) NOT NULL,
  `unityinterstisial` varchar(50) NOT NULL,
  `unityreward` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `slider`, `ads`, `startapplivemode`, `startappaccountid`, `androidappid`, `iosappid`, `admobreward`, `banner`, `interstisial`, `unitylivemode`, `unitygameid`, `unitybanner`, `unityinterstisial`, `unityreward`) VALUES
(1, 4, 1, 1, 'yourAccountId', 'yourAndroidAppId', 'yourIosAppId', 'ca-app-pub-3940256099942544/5224354917', 'ca-app-pub-3940256099942544/6300978111', 'ca-app-pub-3940256099942544/1033173712', 1, 'yourGameId', 'Banner_Android', 'Interstitial_Android', 'Rewarded_Android');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(222) NOT NULL,
  `name_user` varchar(222) NOT NULL,
  `email_user` varchar(222) NOT NULL,
  `photo_user` text NOT NULL,
  `password` text NOT NULL,
  `score` bigint(255) NOT NULL,
  `status_user` int(1) NOT NULL,
  `type_user` varchar(50) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indexes for table `tbl_announcement_content`
--
ALTER TABLE `tbl_announcement_content`
  ADD PRIMARY KEY (`id_announ_content`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  ADD PRIMARY KEY (`id_collection`);

--
-- Indexes for table `tbl_collection_title`
--
ALTER TABLE `tbl_collection_title`
  ADD PRIMARY KEY (`id_collection_title`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id_packs`);

--
-- Indexes for table `tbl_course_lecture`
--
ALTER TABLE `tbl_course_lecture`
  ADD PRIMARY KEY (`lec_id`);

--
-- Indexes for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  ADD PRIMARY KEY (`id_favorites`);

--
-- Indexes for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id_announcement` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_announcement_content`
--
ALTER TABLE `tbl_announcement_content`
  MODIFY `id_announ_content` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  MODIFY `id_collection` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_collection_title`
--
ALTER TABLE `tbl_collection_title`
  MODIFY `id_collection_title` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id_comments` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id_packs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_course_lecture`
--
ALTER TABLE `tbl_course_lecture`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  MODIFY `id_favorites` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id_rating` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(222) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
