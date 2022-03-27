-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 10:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `dateandtime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `dateandtime`, `username`, `password`, `name`, `contact`, `email`) VALUES
(59, '2021-11-13 22:24:21', 'pradip_l0', '12345', 'pradip', 2147483647, 'pradip.lamichhane1102@gmail.com'),
(60, '2021-11-14 16:36:27', 'rupak_lc', '1234567', 'rupak', 2147483647, 'rupaklc2000@gmail.com'),
(61, '2021-12-09 12:46:01', 'nishesh', '1234567', 'nishesh', 2147483647, 'nishesh@gmail.com'),
(62, '2021-12-18 11:22:50', 'helloworld', 'helloworld', 'helloworld', 1222222222, 'helloworld@gmail.com'),
(63, '2021-12-19 13:51:13', 'anurag_10', 'anurag123', 'anurag', 2147483647, 'anurag@gmail.com'),
(64, '2022-03-27 14:07:00', 'padu123', 'padu123', 'pradip', 2147483647, 'laldld@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `author`, `date`) VALUES
(14, 'Treaking', 'pradip', '2021-11-13 22:27:25'),
(15, 'ascol', 'pradip', '2021-12-09 12:46:31'),
(16, 'hiking', 'pradip', '2021-12-19 13:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `date` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `p_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `date`, `name`, `comment`, `p_id`) VALUES
(1, '2021-12-09 12:48:41', 'nishesh', 'hello nishesh', 29),
(2, '2021-12-19 13:52:04', 'anurag ghimire', 'yeah its beautiful place alluring beauty.', 19),
(3, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(4, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(5, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(6, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(7, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(8, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(9, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(10, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(11, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19),
(12, '2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(3) NOT NULL,
  `dateandtime` varchar(25) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `f_admin` int(5) NOT NULL,
  `likes` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `dateandtime`, `title`, `category`, `author`, `image`, `post`, `username`, `f_admin`, `likes`) VALUES
(19, '2021-11-13 22:36:17', 'Gosaikunda', 'Treaking', 'pradip_l0', 'gosaikunda-lake-and-prayer-flags.jpg', 'After walking for about 3 hours from Dunche, in the evening, we reach Khepdi. The trek is easy; we want to continue, but it is already dark, and we decide not to move any step further- our first night in Khepdi. With us, there are three other guys at the lodge. The lady owner ushers us to a room with 2 beds. After hearing our Dal Bhat order, she returns to the kitchen. \r\n\r\nAs we wait for our hearty Dal Bhat in the communal room, we indulge in conversation with fellow travelers. Glad to hear that we will reach Gosaikunda by tomorrow evening. With the promise to wake up early and hit the trail, we sleep early. After having delicious Dal Bhat, I eagerly dive into the bed, hoping for a good sleep.', 'pradip_l0', 59, 0),
(21, '2021-11-13 22:44:01', 'Panchpokhari', 'Treaking', 'pradip_l0', 'panchpokhari-trek.png', 'Panch Pokhari Trek begins from Chautara of the Sindhupalchok. Various settlements of Sherpa and Tamang people lie on the trail and you have a prospect to know the cultural factors of their lifestyles and incredible hospitality. The landscape is untouched and luring, which signify the freshen sceneries and mystical touch. As the trek walks of up to 4500 meters altitude, you need to have a good physical condition. Highlighting the trek, it includes different significant valleys, waterfalls, gorges and ancient caves. It is, incredibly a journey through the unspoilt trail. The white peak panoramas of the Dorje Lakpa (6966 m), Phurbi Chhyachu (6637 m), Madiya (6257 m), Rolwaling and Langtang range disclose their tranquil eternity. The trekking region of Panch Pokhari is not polluted and densely populated. The enticing trail is dotted by the rhododendron forest, which is extremely spectacular in spring.\r\n\r\nMountain Delights Treks and Expedition company offers suitable Panch Pokhari trekking ', 'pradip_l0', 59, 0),
(22, '2021-11-14 13:20:23', 'Tilicho', 'Treaking', 'pradip_l0', 'Tilicho-Lake-525591-1920px-16x7.jpg', 'On this 12-day journey through Nepal, experience the scenic and challenging Tilicho Lake Trekâ€”one of the highest lakes in the world. Start in Kathmandu to get acquainted with the country, and do some sightseeing. Then, begin the journey through the Annapurna region. Explore villages and stay in teahouses along the way. Make stops in Chame, Pisang, Manang, and Khangsar Village, before reaching Tilicho Base Camp. Then, spend time admiring the Tilicho Lake, before retracing your steps back to Kathmandu.', 'pradip_l0', 59, 0),
(27, '2021-11-14 13:43:56', 'Annapurna Base Camp', 'Treaking', 'pradip_l0', 'Everest-base-Camp.jpg', 'The Annapurna base camp trek is one of the most popular treks in the world. It literally brings you face to face with an eight-thousander â€“ for a moderate-difficult trek, this is incredible! The fascinating Annapurna massif includes the worldâ€™s tenth highest peak. Annapurna I (8,091 m) holds an almost fatal attraction for mountaineers. It has the highest fatality ratio among the eight-thousanders. This formidable aura apart, the ABC trek holds several treasures for the mountain lover.', 'pradip_l0', 59, 0),
(28, '2021-11-14 16:40:23', 'Baglung Panchakot', 'Treaking', 'rupak_lc', 'images (3).jpg', 'Panchakot has turned into one of the main tourist destinations of Baglung district after the establishment of Panchakot Ekikrit Basti in Ward-6 of Baglung Municipality.\r\n\r\nAs some of the construction of infrastructure has been completed that was being built under the leadership of Muktinath Baba, a Hindu sage, the influx of tourists has increased in this area. His dream of changing his hometown into a pilgrimage site is now turning into a reality.\r\n\r\n He said: â€œThis is the only place in this entire world where we can find Shaligram stone. So this is a resident of all gods and I had planned to build a pilgrimage site in this area where people can worship all gods.â€\r\n\r\nPeople of this area are also supporting to fulfill the dream of the sage. First, this was just a dream of Muktinath Baba but as this is related to the development of Baglung, it has now become a dream of all Baglung residents.\r\n\r\nâ€œWe have planned to develop a pilgrimage site of all gods and goddesses in this place so', 'rupak_lc', 60, 0),
(29, '2021-12-09 12:47:37', 'ascol', 'ascol', 'nishesh', 'photo.jpg', 'skajdkajkdjklaldjlkajlkdjlkjdlkajlkdjflkajdlkjflkdjlkajlkfjdlkajdlkjalkjdlkjalkdjflkajdlkjfalkjdlkajlkdjlkajlkdjlkfjalkdjlkajldkjakjlkdjlkajdlkjalkjdlkjalkjdlkadkljflkaj', 'nishesh', 61, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key` (`p_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key` (`f_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`p_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`f_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
