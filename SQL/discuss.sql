-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 07:45 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `answer` mediumtext NOT NULL,
  `Q_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `Q_id`, `user_id`) VALUES
(1, 'A computer is an electronic device that processes data.', 1, 1),
(2, 'Early computers were very large and used vacuum tubes.', 2, 2),
(3, 'Paris is the capital of France.', 11, 3),
(4, 'Potential energy is energy stored due to an object\'s position.', 12, 4),
(5, 'Social inequality and economic hardship were major causes.', 13, 5),
(6, 'The three states are solid, liquid, and gas.', 14, 1),
(7, 'OOPs uses objects, classes, inheritance, and polymorphism.', 15, 2),
(8, 'I am an AI, I don\'t have a name!', 16, 3),
(9, 'Pizza is a popular food worldwide.', 17, 4),
(10, 'Why did the coffee file a police report? It got mugged!', 18, 5),
(11, 'Algorithms are sets of rules for solving problems.', 19, 1),
(12, 'Photosynthesis converts light energy into chemical energy.', 20, 2),
(13, 'Abraham Lincoln was the 16th US President.', 21, 3),
(14, 'Exercise improves physical and mental health.', 22, 4),
(15, 'AI simulates human intelligence in machines.', 23, 5),
(16, 'HTML is a markup language for web pages.', 24, 1),
(17, 'Databases store and manage information efficiently.', 25, 2),
(18, 'The Roman Empire was a vast and influential civilization.', 26, 3),
(19, 'RAM, ROM, and cache are types of computer memory.', 27, 4),
(20, 'Renewable energy comes from natural resources that replenish.', 28, 5),
(21, 'Green tea is rich in antioxidants.', 29, 1),
(22, 'The sky is blue due to Rayleigh scattering of sunlight.', 30, 2),
(23, 'Laptops are portable computers.', 31, 3),
(24, 'Gravity is a force that attracts objects with mass.', 32, 4),
(25, 'Thomas Edison invented the practical light bulb.', 33, 5),
(26, 'Fruits and vegetables are generally healthy foods.', 34, 1),
(27, 'Why was the computer cold? It left its Windows open!', 35, 2),
(28, 'Binary code uses 0s and 1s to represent data.', 36, 3),
(29, 'It\'s an electronic computing machine.', 1, 4),
(30, 'Computers have evolved greatly since their inception.', 2, 5),
(31, 'Rome is the capital of Italy.', 11, 1),
(32, 'Energy due to position or state.', 12, 2),
(33, 'Financial crisis and social unrest were key.', 13, 3),
(34, 'Solids have definite shape, liquids flow, gases expand.', 14, 4),
(35, 'Encapsulation, abstraction, inheritance, polymorphism.', 15, 5),
(36, 'It\'s not appropriate for me to guess your name.', 16, 1),
(37, 'My favorite food is fresh fruit.', 17, 2),
(38, 'What do you call a fake noodle? An impasta!', 18, 3),
(39, 'Algorithms are crucial for problem-solving.', 19, 4),
(40, 'Plants convert light into energy.', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`) VALUES
(2, 'computers'),
(5, 'food'),
(8, 'funny'),
(4, 'general'),
(7, 'history'),
(1, 'laptops'),
(3, 'Programming'),
(6, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `catagory_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `catagory_id`, `user_id`) VALUES
(1, 'what is a computer?', 'Define it briefly.', 2, 2),
(2, 'do you know about computer\'s history?', 'Tell us in short.', 2, 1),
(11, 'What is the capital of France?', 'Which city is France\'s capital?', 4, 3),
(12, 'Explain the concept of potential energy.', 'Briefly explain potential energy.', 6, 5),
(13, 'Discuss the main causes of the French Revolution.', 'What caused the French Revolution?', 7, 4),
(14, 'What are the three states of matter ?', 'Name the states of matter.', 4, 4),
(15, 'what do you understand by OOPs Programming ?', 'Describe OOPs features.', 3, 3),
(16, 'what is my name?', 'Guess my name.', 4, 3),
(17, 'tell me about ypur fvrt food ?', 'Your favorite food?', 5, 3),
(18, 'ask a  funny question?', 'Can you ask a funny question?', 8, 2),
(19, 'What is the role of algorithms in programming?', 'Algorithms in programming?', 3, 1),
(20, 'How does photosynthesis work?', 'Explain photosynthesis.', 6, 2),
(21, 'Who was Abraham Lincoln?', 'Tell about Abraham Lincoln.', 7, 3),
(22, 'What are the benefits of exercise?', 'Benefits of exercise?', 4, 5),
(23, 'Explain the concept of artificial intelligence.', 'What is AI?', 2, 4),
(24, 'What is HTML?', 'Define HTML.', 3, 2),
(25, 'What is the purpose of a database?', 'Purpose of a database?', 2, 1),
(26, 'Tell me about the Roman Empire.', 'History of Roman Empire?', 7, 5),
(27, 'What are the different types of computer memory?', 'Types of computer memory?', 2, 3),
(28, 'What is renewable energy?', 'Define renewable energy.', 6, 4),
(29, 'What are the health benefits of green tea?', 'Green tea benefits?', 5, 1),
(30, 'Why is the sky blue?', 'Reason for blue sky?', 6, 3),
(31, 'What is the difference between a laptop and a desktop?', 'Laptop vs desktop?', 1, 3),
(32, 'Explain the concept of gravity.', 'What is gravity?', 6, 4),
(33, 'Who invented the light bulb?', 'Light bulb inventor?', 7, 5),
(34, 'What is the healthiest food?', 'Healthiest food?', 5, 1),
(35, 'Tell me a joke about computers.', 'Computer joke?', 8, 2),
(36, 'What is binary code?', 'Define binary code.', 3, 3);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(1, 'alpha_user', 'alpha@test.com', 'pass123', '101 Test St'),
(2, 'beta_tester', 'beta@test.com', 'pass123', '202 Test Ave'),
(3, 'gamma_dev', 'gamma@test.com', 'pass123', '303 Test Rd'),
(4, 'delta_qa', 'delta@test.com', 'pass123', '404 Test Blvd'),
(5, 'epsilon_admin', 'epsilon@test.com', 'pass123', '505 Test Ln'),
(6, 'zeta_member', 'zeta@test.com', 'pass123', '606 Test Ct'),
(7, 'eta_moderator', 'eta@test.com', 'pass123', '707 Test Pl'),
(8, 'theta_guest', 'theta@test.com', 'pass123', '808 Test Way'),
(9, 'iota_contributor', 'iota@test.com', 'pass123', '909 Test Dr'),
(10, 'kappa_viewer', 'kappa@test.com', 'pass123', '1010 Test Cir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `answers` ADD FULLTEXT KEY `answer` (`answer`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;