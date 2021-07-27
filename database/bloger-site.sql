-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 12:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloger-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `id_img` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `info`, `id_img`, `id_category`, `date`, `id_user`) VALUES
(1, 'If Podcasts Are the New Blogs, Enjoy the Golden Age While It Lasts', ' Are podcasts the next great storytelling platform? And: should we all be recording podcasts, too?\r\nIt’s the golden age of podcasting, and the format is open to anyone with a laptop, a microphone, and access to a web server. A host of audio producers, many trained by Ira Glass, are creating narrative series with the same quality and creativity as the 20-year-old radio documentary show This American Life. Media companies from TED to The New York Times are piloting shows. Businesses are testing them out as content marketing. And hell, if you want to make a podcast about your stamp-collecting obsession, you can do it. Surely there’s money to be made—and audience to be had—somewhere. It all feels very familiar. As Joshua Benton wrote for NiemanLab, podcasts in 2015 feel a lot like blogs did a decade ago.\r\nLike those blogs of yesteryear, the promise feels huge. But as that brief era also taught us, the golden age doesnt last.', 6, 3, '2021-05-28 09:23:55', 6),
(8, 'Online Shopping – An Alternative to Shopping in the Mall', 'Although shopping in the Internet is somewhat cheaper than in the mall, you will still be spending more time in front of the store. If you are planning to shop for something specific, you may want to look for a general website that offers a wide range of merchandise. Once you get familiar with the online shopping experience, you may feel that shopping in an Internet shop is more comfortable than shopping in the mall.\r\n\r\nAnother reason why many people choose to shop online is because of the convenience of having all the items ready at your fingertips. You can just click the mouse and browse through the different sites of a retailer you like. Also, you can do a search or look for a particular brand and you will be given all the information about the item you are looking for right at your fingertips.', 3, 4, '2021-05-28 09:23:59', 2),
(9, 'Online Shopping – Is It Worth It?', 'There is a difference between shopping online and shopping at an actual shop. If you look online, you will be faced with so many choices of products and discounts that you may have a difficult time deciding what to buy. It’s difficult to make sure that you’re choosing the best products, in the most affordable price and at the best price possible.\r\n\r\nOne of the most difficult things to do when shopping online is to know what to choose. The good news is that online shopping is cheaper than shopping locally. You may find that buying online is better than shopping locally, because you can save a lot of money when buying online.', 7, 4, '2021-05-28 09:24:02', 5),
(10, 'Beet and Burrata Salad with Fried Bread', 'Calling this bowl of beauty “a salad” feels not quite right, because if we’re being honest, salads leave a little to be desired sometimes.\r\n\r\nBut this salad – or maybe I should say, this big bowl of fried bread, juicy beets and oranges, quick vinaigrette, and creamy, luscious burrata – leaves exactly nothing be desired. The golden crispy-salty bites of the bread with the cool creaminess of the burrata and every juicy, vibrant, dressing-soaked bite of beets and oranges – it’s the total package. It’s a partial fork-and-knife, partial just-get-in-there-and-grab-that-bread-with-your-hands type of meal, which is my favorite kind.\r\n\r\nNew life rule: salads always need fried bread.', 1, 5, '2021-05-28 09:24:06', 4),
(11, 'THE EVERYGIRL', 'The Everygirl blog is for every girl – l’m serious. Any young woman looking to live a well-rounded, established and stylish life can benefit from reading the blog.  It offers a wide range of information from career-tips to meal-prep hacks.\r\n\r\nThe blog was founded by Alana Kaczmarski and Danielle Moss. This fabulous duo have created a masterpiece that offers a wealth of knowledge for any women out there, especially those looking to improve their lives.\r\n\r\nFrom ideas on how to launch your first business to being whole as a single person. The creators Alana and Danielle have also ventured out and created a niche blog The Everymom to cater to the specific needs of that audience.', 5, 3, '2021-05-28 09:24:19', 5),
(12, 'A CUP OF JONAS', 'For fashion, beauty or motherhood advice check out A Cup of Jo. The blog also covers certain deep and personal issues from time to time keeping the readers very involved like the post about friendship breakups. She talks about things that we all need to hear being talked about.\r\n\r\nJoanna Goddard or Jo as she makes herself known in the adorable pun that is the name of her blog is an accomplished creator in both the traditional sense and in the online world. She has worked at Glamour, Conde Nast Traveler and Martha Stewart Living.', 4, 4, '2021-06-01 16:15:30', 1),
(13, 'The Braining work for blogs', 'It is one of the most popular blogs among technology. Founded by Michael Arrington, it stands out for many reasons, but one of them is undoubtedly its ability to generate lots of updated content. TechCrunch publishes an average of 5 articles daily in each of its ten news categories. It follows the actuality to the second one and its publications are very dynamic.  It uses an extremely colloquial but very attractive language. So much that at the end of December he published a post titled WTF is Brexit?  TechCrunch bets on two-way communication. He always encourages the collaboration of his followers and does not give him trouble to ask for help to improve the information it offer', 2, 3, '2021-05-28 09:24:29', 4),
(14, 'The best selling book on the Market', 'The best selling book on the Market. Buy today for low discounted price.', 25, 4, '2021-06-09 09:56:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Software'),
(3, 'Lifestyle'),
(4, 'Shopping'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blogs` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_blogs`, `comment`, `date`) VALUES
(1, 1, 1, 'I started reading this blog and i am quite interested in it.', '2021-05-28 09:43:24'),
(2, 3, 1, 'What an extraordinary story i am full of information now. Great job.', '2021-05-28 09:43:29'),
(3, 1, 8, 'Wanderfull writing .I am really a fan of this scenario.', '2021-05-28 09:46:46'),
(11, 8, 1, 'OMG this is so raddd.', '2021-06-08 09:29:54'),
(12, 8, 9, 'There should be a comment online shoping.', '2021-06-08 09:33:18'),
(13, 8, 11, 'The EVERYGIRL is a fabullous post.', '2021-06-08 09:37:17'),
(14, 2, 8, 'Hey this is a awesome blog. ', '2021-06-08 11:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `alt`) VALUES
(1, 'pixels1.jpg', 'blog1'),
(2, 'pixels2.jpg', 'blog2'),
(3, 'pixels3.jpg', 'blog3'),
(4, 'inrt_image_ooks-775998.jpg', 'blog4'),
(5, 'pixels5.jpg', 'blog5'),
(6, 'pixels6.jpg', 'blog6'),
(7, 'pixels7.jpg', 'blog7'),
(8, 'footer1.jpg', 'footer1'),
(9, 'footer2.jpg', 'footer2'),
(10, 'footer3.jpg', 'footer3'),
(11, 'post1.jpg', 'sidepost1'),
(12, 'post2.jpg', 'sidepost2'),
(13, 'post3.jpg', 'sidepost3'),
(14, 'post4.jpg', 'sidepost4'),
(15, 'post5.jpg', 'sidepost5'),
(16, 'updated_author_download.jpg', 'userimage'),
(17, 'author_02.png', 'userimage'),
(18, 'author_03.png', 'userimage'),
(19, 'author_04.jpg', 'userimage'),
(20, 'author_05.jpg', 'userimage'),
(21, 'author_06.jpg', 'userimage'),
(22, 'author_07.jpg', 'userimage'),
(25, 'up_image__crop-smart.jpg', 'insertedblog'),
(27, 'ins_image_ownload (2).jpg', 'insertedblog'),
(28, 'author_default.jpg', 'defaultImage'),
(36, 'updated_author_111.png', 'insertedimage');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Petar Mitic', 'incorporate-nick@reso.com', 'Refound', 'This is a messages send via post-office have fun!'),
(2, 'Petar Nikolic', 'nikolas-john@gmail.com', 'Simple Text', 'there is God i think...');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_img` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `info`, `id_img`, `id_category`, `id_user`, `date`) VALUES
(1, 'Speed up your iPhone typing with some awesome keyboard shortcuts', 'Chances are, you use keyboard shortcuts regularly on your laptop or desktop, but how often do you use them on your iPhone? While the iPhones limited keyboard doesnt offer as many keyboard shortcuts as a computer, there are some nifty keyboard tricks that will make you a faster and more efficient iPhone user, no matter what model of iPhone you own. ', 12, 1, 3, '2021-05-29 19:54:57'),
(2, 'The most bizarre video game I have ever played', 'Ive spent upwards of 35 hours tromping around developer Experiment 101 s beautiful world. Ive listened to thousands of lines of dialogue, leveled up my mutant raccoon-thing with psionics and resistances and custom-crafted gear. Ive felled massive, unusually fluffy bosses, ended a tribal war fueled by dueling and unexpectedly nuanced ideologies, and saved the whole, entire world.', 11, 2, 5, '2021-05-29 19:55:02'),
(3, 'Watch Frances President Macron rock out to death metal thanks to a YouTube bet', 'If you thought a metal version of French national anthem La Marseillaise would never rock the countrys presidential palace grounds, you would be wrong.\r\n\r\nPresident Emanuel Macron recently welcomed YouTubers McFly and Carlito to his stunning home for a chat, some games, and — the main event — a private concert by French death metal band Ultra Vomit. The YouTubers posted a video of the visit Sunday.', 13, 3, 2, '2021-05-29 19:55:18'),
(4, 'Apple says HomePod and HomePod mini will get lossless audio support in the future', '\r\nApples recently announced lossless audio feature on Apple Music was followed by a cold shower: Apples audio gadgets, including the AirPods, AirPods Pro, AirPods Max, HomePod and HomePod mini do not support lossless audio.\r\n\r\nNow, in a new document on its website, Apple has revealed more details about lossless (a form of audio data compression that produces a perfect reconstruction of the original audio data), and tucked away in the FAQ is an interesting bit of news: HomePod and HomePod mini ', 14, 1, 2, '2021-05-29 19:55:22'),
(5, 'How to edit the blur in Portrait Mode on your iPhone', 'So, you took a portrait mode photo on your iPhone. But it isnt...quite...right: The edges are a little blurry. No worries! Theres a hack for that. \r\n\r\nBasically, the trick is super simple — you can edit a portrait mode photo to fix blurry edges. Heres a TikTok showing how to do it, then well walk through a quick step-by-step process. \r\n\r\nOK, so here we go. \r\n\r\n1. Take a photo in portrait mode\r\nI mean, duh. Snap a pic in portrait mode then go into your photos folder. \r\n\r\n2. Select the photo a', 15, 1, 3, '2021-05-29 19:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_role` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `password`, `birthdate`, `about`, `date`, `id_role`, `id_img`) VALUES
(1, 'Glenn Xaviea', 'incorporate-glenn@gmail.com', 'Hereford Royd 5', '3b72e262a496d06a82d5bd7a03746f62', '2021-05-19', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.\r\n', '1997-07-05 22:00:00', 2, 17),
(2, 'Ross Wasingtion', 'incorporate-ross@gmail.com', 'William Cross 111', '6591ed33fcd53c7a73842f0cef47cd9c', '2019-12-11', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.\r\n\r\n', '2021-06-08 11:34:00', 2, 18),
(3, 'Niko Stone', 'incorporate-niko@gmail.com', 'Geary Lane 111', '4417429a1a90315ae514a6122a23658c', '2018-09-19', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.', '2021-05-30 16:07:29', 2, 19),
(4, 'Erasmus Sire', 'incorporate-erasmus@gmail.com', 'Geary Lane', '79ee2948d89b73963a479153c18edc34', '2018-09-11', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.', '2021-05-30 16:07:37', 2, 20),
(5, 'Jade Brown', 'incorporate-jade@gmail.com', 'Hereford Royd 5', 'df49c24197dbf070ed26c9edd4dfcf05', '2016-02-02', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.', '2021-05-30 16:07:41', 2, 21),
(6, 'Djordje Taskovic', 'djordje.mystore@gmail.com', 'Acorn Halls 23', 'a936f00a86cde31705c8384324f62622', '2015-05-05', 'Lamborghini Mercy, Your chick she so thirsty, Im in that two seat Lambo.', '2021-06-07 17:18:54', 1, 22),
(7, 'Nikola Petrovic', 'nikola.pertovic@gmail.com', 'Banningtons 22', 'c51b64cd6c9633ececa1c8e7ef63087c', '2021-06-09', '', '2021-06-07 18:12:03', 2, 28),
(8, 'Nikola Nas', 'nas.nikola@gmail.com', 'Banningtons 22', '0ed0a56a861544b36619f92671f331ab', '2021-06-10', '', '2021-06-08 12:38:33', 2, 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img` (`id_img`),
  ADD KEY `id_type` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_blogs` (`id_blogs`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_slika` (`id_img`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_img` (`id_img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `blogs_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_blogs`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
