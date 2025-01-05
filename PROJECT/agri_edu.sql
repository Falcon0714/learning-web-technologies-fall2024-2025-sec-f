-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 08:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `instructor_id`, `created_by`, `created_at`) VALUES
(4, 'Organic Farming Basics', 'An introductory course on organic farming practices.', 2, 2, '2025-01-03 20:18:07'),
(5, 'Crop Rotation Strategies', 'Learn how to effectively rotate crops for better yield.', 3, 3, '2025-01-03 20:18:07'),
(6, 'Irrigation Techniques', 'Efficient water management strategies for agriculture.', 4, 4, '2025-01-03 20:18:07'),
(7, 'Advanced Pest Management', 'Advanced techniques for managing pests in agriculture.', 5, 5, '2025-01-03 20:18:07'),
(8, 'Climate-Smart Agriculture', 'Adapt agricultural practices to climate change.', 6, 6, '2025-01-03 20:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','instructor','student') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@agried.edu', 'admin1971', 'admin', '2025-01-03 20:04:56'),
(2, 'Tyrion Lannister', 'theHand@westeros.com', 'IDrinkAndIKnowThings', 'instructor', '2025-01-03 20:05:10'),
(3, 'Sheldon Cooper', 'sheldon@student.com', 'Bazinga!', 'student', '2025-01-03 20:05:24'),
(4, 'Walter White', 'heisenberg@methlab.com', 'SayMyName', 'instructor', '2025-01-03 20:17:20'),
(5, 'Saul Goodman', 'bettercallsaul@lawyered.com', 'BetterCallSaul', 'instructor', '2025-01-03 20:17:20'),
(6, 'Jon Snow', 'jongotsnow@nightwatch.com', 'IKnowNothing', 'instructor', '2025-01-03 20:17:20'),
(7, 'Severus Snape', 'darkarts@slytherin.com', 'Always', 'instructor', '2025-01-03 20:17:20'),
(8, 'Tommy Shelby', 'peaky@blinders.com', 'ByOrderOfThePeakyBlinders', 'instructor', '2025-01-03 20:17:20'),
(9, 'Harry Potter', 'harry.potter@hogwarts.com', 'Expelliarmus', 'student', '2025-01-03 20:31:44'),
(10, 'Tony Stark', 'tony.stark@starkindustries.com', 'IAmIronMan', 'student', '2025-01-03 20:31:44'),
(11, 'Sherlock Holmes', 'sherlock.holmes@221bbaker.com', 'Elementary', 'student', '2025-01-03 20:31:44'),
(12, 'James Bond', 'james.bond@mi6.com', 'ShakenNotStirred', 'student', '2025-01-03 20:31:44'),
(13, 'Yoda', 'yoda@dagobah.com', 'DoOrDoNot', 'student', '2025-01-03 20:31:44'),
(14, 'Bruce Wayne', 'bruce.wayne@wayneenterprises.com', 'ImBatman', 'student', '2025-01-03 20:31:44'),
(15, 'The Doctor', 'the.doctor@tardis.com', 'WibblyWobbly', 'student', '2025-01-03 20:31:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
