
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 07:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmm007`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

                       CREATE TABLE `assignment` (
`A_id` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `SubmissionDate` varchar(30) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `coursecode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

                    INSERT INTO `assignment` (`A_id`, `Description`, `SubmissionDate`, `Title`, `coursecode`) VALUES
(1, 'Website Design', '2020-05-01', 'intranet', 'CMM007'),
(2, 'dvjev;weovjd', '2020-04-23', 'intranet', 'CMM020'),
(3, '', '', '', ''),
(4, 'Dataset for coursework ', '2020-05-07', 'CMM535', 'CMM535'),
(5, 'Intranet System', '2020-05-01', 'cmm07', 'CMM020'),
(6, 'fhljm;. vhkm bk', '2020-04-22', 'intranet', ''),
(7, 'Data visualisation', '2020-04-30', 'cmm20', 'CMM020'),
(8, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

                       CREATE TABLE `courses` (
`C_ID` int(11) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Coursecode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

                    INSERT INTO `courses` (`C_ID`, `coursename`, `Coursecode`) VALUES
(1, 'Data Visualisation', 'CMM020'),
(2, 'Intrant System Development', 'CMM007'),
(3, 'Data Science', 'CMM535');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

                       CREATE TABLE `feedbacks` (
`S/No` int(11) NOT NULL,
  `courseworktitle` varchar(30) NOT NULL,
  `studentID` int(30) NOT NULL,
  `Report` varchar(500) NOT NULL,
  `Support Document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

                    INSERT INTO `feedbacks` (`S/No`, `courseworktitle`, `studentID`, `Report`, `Support Document`) VALUES
(1, 'CMM007', 1708893, 'Testing the dev', 'testing the dev');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

                       CREATE TABLE `groups` (
`group_name` varchar(30) NOT NULL,
  `Ass_id` int(11) NOT NULL,
  `group_ID` varchar(11) NOT NULL,
  `UserID` int(30) NOT NULL,
  `users_group` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

                    INSERT INTO `groups` (`group_name`, `Ass_id`, `group_ID`, `UserID`, `users_group`) VALUES
('', 0, '', 0, ''),
('A', 7, '1', 1708893, '1'),
('A', 860, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

                       CREATE TABLE `permissions` (
`perm_id` int(10) UNSIGNED NOT NULL,
  `perm_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

                       CREATE TABLE `role` (
`Admin` varchar(30) NOT NULL,
  `Student` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

                    INSERT INTO `role` (`Admin`, `Student`) VALUES
('1708893', '1708893');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

                       CREATE TABLE `uploads` (
`user_ID` int(11) NOT NULL,
  `courseworktitle` varchar(50) NOT NULL,
  `textarea` varchar(50) NOT NULL,
  `UserID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filelocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

                    INSERT INTO `uploads` (`user_ID`, `courseworktitle`, `textarea`, `UserID`, `name`, `filelocation`) VALUES
(1708893, 'CMM007', 'm\\zj \\ j', 1708893, 'Group A', ' mscsc/;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

                       CREATE TABLE `users` (
`Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

                    INSERT INTO `users` (`Firstname`, `Lastname`, `User_ID`, `E-mail`, `role`, `password1`, `password2`) VALUES
('Adedotun', 'Adebowale', 1708893, 'adebowaledotun2014@gmail.com', 'Admin', 'Adedotun', 'Adedotun');

--
-- Indexes for dumped tables
--

               --
-- Indexes for table `assignment`
--
               ALTER TABLE `assignment`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `courses`
--
               ALTER TABLE `courses`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `feedbacks`
--
               ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `groups`
--
               ALTER TABLE `groups`
  ADD PRIMARY KEY (`Ass_id`);

--
-- Indexes for table `permissions`
--
               ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `uploads`
--
               ALTER TABLE `uploads`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `users`
--
               ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

                      --
-- AUTO_INCREMENT for table `assignment`
--
                      ALTER TABLE `assignment`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;

--
-- AUTO_INCREMENT for table `courses`
--
                      ALTER TABLE `courses`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacks`
--
                      ALTER TABLE `feedbacks`
  MODIFY `S/No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
                      ALTER TABLE `permissions`
  MODIFY `perm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
                      ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708894;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
