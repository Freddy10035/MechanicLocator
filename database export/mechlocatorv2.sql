-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 11:57 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mechlocatorv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `user_id` int(11) NOT NULL,
  `num_plate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`user_id`, `num_plate`) VALUES
(1, 'KBJ 123H'),
(1, 'KCE 112E'),
(3, 'KAA 113B'),
(3, 'KBA 987D'),
(3, 'KDA 123B'),
(4, 'KBA 123A'),
(5, 'KAJ 513G'),
(7, 'kcy 123d'),
(9, 'KDA 321A'),
(10, 'KBB 123A'),
(10, 'KCC 111A'),
(16, 'kdc 505h'),
(17, 'KAJ 514G');

-- --------------------------------------------------------

--
-- Table structure for table `map_details`
--

CREATE TABLE `map_details` (
  `user_id` int(11) NOT NULL,
  `long_cor` text NOT NULL,
  `lat_cor` text NOT NULL,
  `town` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map_details`
--

INSERT INTO `map_details` (`user_id`, `long_cor`, `lat_cor`, `town`) VALUES
(2, '-0.6773', ' 34.7796', 'Kisii'),
(4, '-0.3031', '36.0800', 'Nakuru'),
(5, '-1.35', '37', 'Pridelands'),
(6, '-1.34210162459', '36.76622476', 'Nairobi'),
(7, '-1.379863', '37.6', 'Wamunyu'),
(8, '-1.379863', '36.7', ' Olkeri'),
(11, '-1.43', '37.2', 'Ngelani'),
(12, '-1.13', '36.45', 'Ewaso Kendong'),
(14, '-0.4371', '36.9580', 'Nyeri'),
(15, '-0.4371', '36.9568', 'Nyeri'),
(16, '-1.2833', '36.8166', 'pangani');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`user_id`, `rating`, `message`) VALUES
(3, 3, ''),
(3, 4, 'Great work'),
(3, 4, 'Great work'),
(5, 4, 'Pami is a great mechanic.'),
(5, 5, 'New review'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(2, 5, 'sdfsad'),
(2, 5, 'hurray! it works'),
(6, 3, 'Three stars'),
(2, 1, 'Not accurate'),
(5, 4, 'Good work King\'ori'),
(8, 5, 'Awesome work'),
(8, 4, 'Thanks'),
(8, 1, 'Excellent'),
(8, 1, '4 star'),
(8, 5, 'great'),
(5, 5, 'Pami good job'),
(5, 1, 'trial'),
(7, 4, 'Thanks Bruce'),
(12, 5, 'Great job Kanyiri'),
(16, 5, 'good job'),
(16, 3, 'average'),
(5, 5, 'good work'),
(6, 5, 'Great');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `num_plate` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `cost` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `repair_id` int(11) NOT NULL,
  `seen` varchar(10) NOT NULL DEFAULT 'NO',
  `mech_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`num_plate`, `activity`, `cost`, `date`, `repair_id`, `seen`, `mech_user_id`) VALUES
('KAA 113B', 'Computer diagnosis', 1500, '2021-12-01', 1, 'YES', 0),
('KAA 113B', 'Panel beating', 2000, '2021-12-01', 2, 'YES', 0),
('KAA 113B', 'Differential oil checking', 300, '2021-12-01', 3, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 4, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 5, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 6, 'YES', 0),
('KBA 123A', 'Spark plugs replacement', 1500, '2021-12-01', 7, 'YES', 0),
('KBA 123A', 'Engine pistons replacement', 5000, '2021-12-01', 8, 'YES', 0),
('KBA 123A', 'Wheel alignment', 2000, '2021-12-01', 9, 'YES', 0),
('KAA 113B', 'Brake adjustment', 200, '2021-12-01', 10, 'YES', 0),
('KAA 113B', 'new repair', 500, '2021-12-01', 11, 'YES', 0),
('KBJ 123H', 'Wheel alignment', 2000, '2021-12-01', 12, 'YES', 0),
('KCE 112E', 'Brake adjustment', 400, '2021-12-01', 13, 'YES', 0),
('KBJ 123H', 'new repair', 1000, '2021-12-01', 14, 'YES', 0),
('KCE 112E', 'Comp diagnosis', 1500, '2021-12-01', 15, 'YES', 0),
('KCE 112E', 'Shock absorbers replacement', 3500, '2021-12-01', 16, 'YES', 0),
('KCE 112E', 'activity 1', 2000, '2021-12-01', 17, 'YES', 0),
('KBJ 123H', 'dot added', 100, '2021-12-01', 18, 'YES', 1),
('KBJ 123H', 'hello 1', 88, '2021-12-01', 19, 'YES', 1),
('KBA 987D', 'Wheel alignment', 4999, '2021-12-01', 20, 'YES', 3),
('KBA 987D', 'Rate act', 232, '2021-12-01', 21, 'YES', 3),
('KAA 113B', 'Differential oil checking', 498, '2021-12-01', 22, 'YES', 3),
('KAA 113B', 'Brake service', 2330, '2021-12-01', 23, 'YES', 3),
('KDA 123B', 'Brakes', 1000, '2021-12-01', 24, 'YES', 3),
('KBA 987D', 'Gear oil', 2328, '2021-12-01', 25, 'YES', 3),
('KAA 113B', 'Wheel alignment', 890, '2021-12-01', 26, 'YES', 3),
('KAJ 513G', 'Ball joint replacement', 2500, '2021-12-01', 27, 'YES', 5),
('KCE 112E', 'Wheel alignment', 2345, '2021-12-01', 28, 'YES', 5),
('KCE 112E', 'Ball joint replacement', 2899, '2021-12-01', 29, 'YES', 5),
('KBJ 123H', 'service 1', 2300, '2021-12-02', 30, 'YES', 5),
('KCE 112E', 'Wheel alignment', 1111, '2021-12-02', 31, 'YES', 5),
('KAJ 513G', 'Wheel alignment', 788, '2021-12-02', 32, 'YES', 5),
('KAJ 513G', 'Wheel alignment', 788, '2021-12-02', 33, 'YES', 0),
('KBJ 123H', 'Brake', 324, '2021-12-02', 35, 'YES', 5),
('KBJ 123H', 'new 1', 2343, '2021-12-02', 36, 'YES', 5),
('KCE 112E', 'Wheel alignment', 2000, '2021-12-02', 38, 'YES', 7),
('KBJ 123H', 'Side mirror replacement', 800, '2021-12-02', 39, 'YES', 0),
('KBJ 123H', 'Brake adjustment', 400, '2021-12-02', 40, 'YES', 0),
('KBJ 123H', 'New action', 400, '2021-12-02', 41, 'YES', 5),
('kcy 123d', 'Wheel alignment', 4500, '2021-12-02', 42, 'YES', 7),
('kcy 123d', 'Wheel alignment', 4500, '2021-12-02', 43, 'YES', 0),
('kcy 123d', 'pami activity', 2000, '2021-12-02', 44, 'YES', 5),
('kcy 123d', 'Bushes', 2000, '2021-12-02', 45, 'YES', 5),
('kcy 123d', 'shock absorbers', 2465, '2021-12-02', 46, 'YES', 5),
('kcy 123d', 'hts', 432, '2021-12-02', 47, 'YES', 5),
('KAJ 513G', 'ryfs', 3453, '2021-12-02', 48, 'YES', 2),
('KAJ 513G', 'hrdr', 343, '2021-12-02', 49, 'YES', 2),
('KAJ 513G', 'erger', 345, '2021-12-02', 50, 'YES', 2),
('KAJ 513G', 'nob', 324, '2021-12-02', 51, 'YES', 2),
('KAJ 513G', 'jikori', 322, '2021-12-02', 52, 'YES', 2),
('KAJ 513G', 'IJFII', 434, '2021-12-02', 53, 'YES', 2),
('KAJ 513G', 'rtr', 334, '2021-12-02', 54, 'YES', 2),
('KBJ 123H', 'shock absorbers', 3400, '2021-12-02', 55, 'YES', 2),
('KCE 112E', 'new repair', 2000, '2021-12-02', 56, 'YES', 6),
('KBJ 123H', 'shock absorbers replacement', 2000, '2021-12-02', 57, 'YES', 2),
('KDA 321A', 'Brake adjustment', 2300, '2021-12-03', 58, 'YES', 0),
('KDA 321A', 'Oil seal replacement', 1000, '2021-12-03', 59, 'YES', 0),
('KDA 321A', 'Clutch replacement', 4000, '2021-12-03', 60, 'YES', 5),
('KDA 321A', 'Brake fluid addition', 250, '2021-12-03', 61, 'YES', 8),
('KBB 123A', 'Oil service', 2000, '2021-12-03', 62, 'YES', 8),
('kcc 111a', 'Brake fluid addition', 300, '2021-12-03', 63, 'YES', 8),
('kcc 111a', 'Wheel alignment', 2000, '2021-12-03', 64, 'YES', 8),
('kbj 123h', 'Windscreen repair', 300, '2021-12-05', 65, 'YES', 8),
('kbj 123h', 'New wheel rims', 1800, '2021-12-05', 66, 'YES', 8),
('KBJ 123H', 'self repair', 1200, '2021-12-05', 67, 'YES', 8),
('KBJ 123H', 'self repair', 1200, '2021-12-05', 68, 'YES', 0),
('KBJ 123H', 'new me', 123, '2021-12-05', 69, 'YES', 8),
('KBJ 123H', 'new me', 123, '2021-12-05', 70, 'YES', 0),
('KBJ 123H', 'new 1', 343, '2021-12-05', 71, 'YES', 8),
('KBJ 123H', 'new 1', 343, '2021-12-05', 72, 'YES', 0),
('KCE 112E', 'repair for self', 2334, '2021-12-05', 73, 'YES', 8),
('KCE 112E', 'repair for self', 2334, '2021-12-05', 74, 'YES', 0),
('KBJ 123H', 'self 2', 200, '2021-12-05', 75, 'YES', 0),
('KBJ 123H', 'self rep 1', 234, '2021-12-05', 76, 'YES', 0),
('kbj 123h', 'Pami repair', 2000, '2021-12-05', 77, 'YES', 5),
('KBJ 123H', 'second pami repair', 200, '2021-12-05', 78, 'YES', 5),
('KDA 123B', 'Exhaust pipe replacement', 300, '2021-12-06', 79, 'YES', 0),
('KBA 987D', 'Front shock absorber replacement', 1800, '2021-12-06', 80, 'YES', 7),
('KBA 987D', 'Brake fluid addition', 300, '2021-12-06', 81, 'YES', 7),
('KAJ 513G', 'Main left rear leaf spring replacement', 2000, '2021-12-09', 82, 'YES', 12),
('kdc 505h', 'bulb repair', 120, '2022-01-02', 83, 'YES', 0),
('KBJ 123H', 'successful repaired the bulb', 1423, '2022-01-02', 85, 'YES', 16),
('KBJ 123H', 'Wheel alignment', 120, '2022-01-02', 86, 'YES', 16),
('KAJ 514G', 'Brake pad replacing', 1500, '2022-01-04', 87, 'YES', 0),
('KAJ 514G', 'Total brake fluid', 350, '2022-01-04', 88, 'YES', 0),
('KAJ 514G', 'labour', 500, '2022-01-04', 89, 'YES', 0),
('KAJ 514G', 'Clutch replacement', 3500, '2022-01-04', 90, 'YES', 5),
('KAJ 514G', 'Labour', 1000, '2022-01-04', 91, 'YES', 5),
('KAJ 513G', 'Spring rear replacemtn', 2349, '2022-01-09', 92, 'YES', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_mech` varchar(10) NOT NULL DEFAULT 'NO',
  `user_id` int(11) NOT NULL,
  `availability` varchar(10) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `phone`, `password`, `is_mech`, `user_id`, `availability`) VALUES
('Erick', 'erick@gmail.com', '0712345678', '$2y$10$Bes4LuFtJV3Ms6WwN7EigO/LTMXRVNryKlloRr4Jg76pTFgtykF5m', 'NO', 1, 'YES'),
('admin', 'admin@gmail.com', '07231344543', '$2y$10$IRYqMlbN.lH98oby0yIoKuiFx60KTgKKUqVCUW1NduGNvS0TtC6xy', 'YES', 2, 'YES'),
('John ', 'john@gmail.com', '0712345678', '$2y$10$pHte7vIve8a6pXHfX7G4B.tBs2F89EQCnnlag7A7iqRsdgtdhpWe.', 'NO', 3, 'YES'),
('Jane', 'jane@gmail.com', '072341343', '$2y$10$nA9/JtHUQMCjN59sdQUq6OOMTKJMhGXbhQpK6cOYwPmtw1FNsaFNa', 'YES', 4, 'YES'),
('Paminus King`ori', 'pkmurungi.pm@gmail.com', '0723805386', '$2y$10$P4pXIu.teAPE1MCOks/Wa.F2jxQJhw4ord2hW51E6xw3OUhJcHjSy', 'YES', 5, 'NO'),
('Venna', 'venna@gmail.com', '092338289', '$2y$10$fvPMB8b577InDEp3b7bLu.4SwzXOvzL29hlEBiaB4EpDkO7dUzpZK', 'YES', 6, 'YES'),
('Bruce', 'bruce@gmail.com', '0792743861', '$2y$10$pm5.kidvbp45RaTfnIZqhOTQpIecbPEogqiddR4wj3yOYIm3GhD7a', 'YES', 7, 'YES'),
('mech John', 'mech@gmail.com', '0283298413', '$2y$10$Xe0HZXfuK4sPZlQ3Ly9BM.w1HrJN5T1PKhvNONeTaeIoGGPbL34AC', 'YES', 8, 'YES'),
('George K', 'george@gmail.com', '098923489', '$2y$10$OHVyBzZ/x5M0ik3mwvURD.T6i1s6NCigqIrowKq1bQ5r9wtk10qz2', 'NO', 9, 'YES'),
('Linah', 'linah@gmail.com', '082449494', '$2y$10$hqlsaGtvKjZROSYEn7c0au0UfXCchuLUBqaaNsL0a/EA553mHwNDq', 'NO', 10, 'YES'),
('Jasmine', 'jas@gmail.com', '0712345678', '$2y$10$Sjrm6TgNngP.7vdjUGjZjuHXNExdCUIaXM1gwOdKuZOGvdPfL2oTi', 'YES', 11, 'YES'),
('Kanyiri', 'kanyiri@gmail.com', '0732242234', '$2y$10$KvXgSOBbvdmdwiauHWsXWOIFvUIhfkEjrg43x3V0oagGtGi.RcELK', 'YES', 12, 'YES'),
('Shiru', 'shii@gmail.com', '0711221334', '$2y$10$CtwnAPDbnTVKkRp3su9xvO.BqBW9OHr.zrgCVfbQabdlvdYHLfToW', 'YES', 13, 'YES'),
('Moreen W', 'moreen@gmail.com', '073938923', '$2y$10$QrMWlqDuHvbBhUoh81Hnau/GZzJrceIRgHKPaQRx3/dpoDtQHxPwy', 'YES', 14, 'YES'),
('Explorer', 'ex@gmail.com', '0712345678', '$2y$10$kaSYsqXJM6MVeh3LJzLR.efRYObBQkw09bsoDfcY56ZiJnde..PZC', 'YES', 15, 'YES'),
('francis', 'francis.wangui2000@gmail.com', '0769872627', '$2y$10$6.O20bFU8y00BM0Pve4UTOQpiaRUH.bi3k6MTmFfshUQziM3W6Ixi', 'YES', 16, 'NO'),
('George K', 'georgeK@gmail.com', '0721424546', '$2y$10$zwIohW0ggblHy0ba250nH.7N7HtZhk6lA35I2mCDn3vnu7u1ZE8Bm', 'NO', 17, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`num_plate`),
  ADD KEY `car` (`user_id`);

--
-- Indexes for table `map_details`
--
ALTER TABLE `map_details`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `numPlate` (`num_plate`),
  ADD KEY `user` (`mech_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `repair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `map_details`
--
ALTER TABLE `map_details`
  ADD CONSTRAINT `map_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`num_plate`) REFERENCES `cars` (`num_plate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
