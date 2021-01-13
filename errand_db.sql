-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 06:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `errand_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_user_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_body` text NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_user_id`, `project_name`, `project_body`, `data_created`) VALUES
(2, 0, 'JAVASCRIPT', 'Java script is a framework', '2020-12-05 18:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_body`, `date_created`) VALUES
(1, 'task php course 1', 'php course ahmad lesson this week', '2020-12-07 07:17:44'),
(2, 'JAVA SCRIPT ', 'JAVA SCRIPT Manhood lesson this week ', '2020-12-07 07:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `register_date`, `username`, `password`) VALUES
(1, '', '', '', '2020-12-03 10:12:16', 'atefah', '123'),
(2, '', '', '', '2020-12-03 10:12:16', 'ati', '1234'),
(3, 'wajieha', 'niazi', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:40:29', '123', '0'),
(4, 'wajieha', 'ati', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:47:42', 'Wajieha', '0'),
(5, 'wajieha', 'ahamdy', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:48:55', 'wajieha', '0'),
(6, 'wajieha', 'ahamdy', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:50:00', '123', '$2y$12$HPaP.bHDjWJQLY6reSYQnOpNCgeY3ujAWs/mE6qLwX0LrdmqdLGg.'),
(7, 'wajieha', 'ahamdy', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:51:21', 'wajieha', '$2y$12$l8naUBUblvwt1Eo4H0fY1uqxBBthyCAgte2scnFBkN9Dj7H6YFZg6'),
(8, 'wajieha', 'ahamdy', 'Wajiehaniazi204@gmail.com', '2020-12-07 08:51:48', 'wajieha', '$2y$12$zoNSmBU31UnWq1PkkwtcsuF/imf6zfxhXaVtK/BJ2dKC9TxR8jfIa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
