-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `Q_id`, `user_id`) VALUES
(1, 'Potential energy', 12, 1),
(2, 'Potential energy\" is a fundamental concept in physics. It refers to the energy an object possesses due to its position, condition, or state, rather than its motion. ', 12, 1),
(3, ' g', 12, 1),
(4, 'g', 12, 1),
(5, 'g', 12, 1),
(6, 'fdshgsdhg', 12, 1),
(7, 'fdg', 12, 1);

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`) VALUES
(2, 'computers'),
(5, 'food'),
(4, 'general'),
(7, 'history'),
(1, 'laptops'),
(3, 'Programming'),
(6, 'science');

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `catagory_id`, `user_id`) VALUES
(1, 'what is a computer?', 'define it', 2, 2),
(2, 'do you know about computer\'s history?', 'tell us in short...', 2, 1),
(11, 'What is the capital of France?', 'Consider the most widely recognized capital city of France. No need for historical context unless explicitly stated.', 1, 3),
(12, 'Explain the concept of potential energy.', 'answer in brief...', 6, 5),
(13, 'Discuss the main causes of the French Revolution.', 'The French Revolution', 7, 4),
(14, 'What are the three states of matter ?', 'Matter commonly exists in three distinct states: solid, liquid, and gas. ', 4, 4),
(15, 'what do you understand by OOPs Programming ?', 'define its features...', 3, 3);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(1, 'aman', 'aman719941@gmail.com', '123', '123'),
(2, 'ramu', 'olevel0001@gmail.com', '123', '233'),
(3, 'savi', 'savi@test.com', '123', '123'),
(4, 'ravi', 'ravi@test.com', '123', '123'),
(5, 'vimal', 'vimal@test.com', '123', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
