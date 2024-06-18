-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 06:42 AM
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
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `role`, `mobile`) VALUES
(2, 'Ajay', 'Admin', 2210022100);

-- --------------------------------------------------------

--
-- Table structure for table `checkup_remarks`
--

CREATE TABLE `checkup_remarks` (
  `id` int(11) NOT NULL,
  `caseno` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkup_remarks`
--

INSERT INTO `checkup_remarks` (`id`, `caseno`, `date`, `remarks`, `file`) VALUES
(1, 2, '06/17/2024', 'remarks', ''),
(2, 2, '06/17/2024', '', ''),
(3, 2, '06/17/2024', '', ''),
(4, 2, '06/17/2024', '', ''),
(5, 2, '06/17/2024', '', ''),
(6, 2, '06/17/2024', '', ''),
(7, 2, '06/17/2024', '', ''),
(8, 3, '06/15/2024', 'rtjhsrbfd', ''),
(9, 3, '06/17/2024', 'erthrtdryn sbgd ', ''),
(10, 4, '06/17/2024', '', ''),
(11, 2, '06/17/2024', '', ''),
(12, 2, '06/17/2024', '', 'uploads/Screenshot 2024-05-25 131645.png'),
(13, 2, '06/10/2024', '', 'uploads/Screenshot 2024-05-14 204413.png'),
(14, 2, '06/03/2024', 'asdfasdf', 'uploads/Screenshot 2024-05-30 161439.png'),
(15, 2, '06/17/2024', 'asdfasdf', 'uploads/Screenshot 2024-05-30 161439.png'),
(16, 2, '06/17/2024', 'asdfasdf', 'uploads/Screenshot 2024-05-25 131645.png');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(11) NOT NULL,
  `caseno` int(11) NOT NULL,
  `lab` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `caseno`, `lab`, `date`, `remarks`, `file`) VALUES
(2, 2, 'Select Lab Test', '0000-00-00', '', 'uploads/2Screenshot 2024-05-21 235723.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `caseno` int(11) NOT NULL,
  `prev_amt` int(11) NOT NULL DEFAULT 0,
  `present_amt` int(11) NOT NULL DEFAULT 0,
  `paid_amt` int(11) NOT NULL DEFAULT 0,
  `future_amt` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `caseno`, `prev_amt`, `present_amt`, `paid_amt`, `future_amt`) VALUES
(2, 2, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `caseno` int(11) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `dose` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `caseno`, `medicine`, `dose`, `date`) VALUES
(1, 2, 'medicine1', 'dose1', '06/17/2024'),
(2, 2, '', '', '06/17/2024'),
(3, 2, '', '', '06/17/2024'),
(4, 2, 'asdf', 'asdf', '06/17/2024'),
(5, 2, '', '', '06/17/2024'),
(6, 2, 'asdf', 'asdf', '06/17/2024'),
(7, 2, 'asdf', 'asdf', '06/17/2024'),
(8, 3, 'medicine1', '10', '06/15/2024'),
(9, 3, 'capsule2', '5', '06/17/2024'),
(10, 4, '', '', '06/17/2024'),
(11, 2, '', '', '06/17/2024'),
(12, 2, '', '', '06/17/2024'),
(13, 2, '', '', '06/10/2024'),
(14, 2, 'asdf', 'asdf', '06/03/2024'),
(15, 2, 'asdf', 'asdf', '06/17/2024'),
(16, 2, 'asdf', 'asdf', '06/17/2024');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `caseno` int(11) NOT NULL,
  `fileno` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `marital` varchar(255) NOT NULL,
  `complexion` varchar(255) NOT NULL,
  `constitution` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `child` int(11) NOT NULL,
  `bp` float NOT NULL,
  `pulse` float NOT NULL,
  `temperature` float NOT NULL,
  `present` varchar(255) NOT NULL,
  `past` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `mind` varchar(255) NOT NULL,
  `head` varchar(255) NOT NULL,
  `mouth` varchar(255) NOT NULL,
  `eye` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `nose` varchar(255) NOT NULL,
  `respiratory` varchar(255) NOT NULL,
  `cardiac` varchar(255) NOT NULL,
  `abdomen` varchar(255) NOT NULL,
  `menses` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `limb` varchar(255) NOT NULL,
  `back` varchar(255) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `appetite` varchar(255) NOT NULL,
  `thirst` varchar(255) NOT NULL,
  `stool` varchar(255) NOT NULL,
  `urine` varchar(255) NOT NULL,
  `sleep` varchar(255) NOT NULL,
  `discharge` varchar(255) NOT NULL,
  `addiction` varchar(255) NOT NULL,
  `desire` varchar(255) NOT NULL,
  `aversion` varchar(255) NOT NULL,
  `aggravation` varchar(255) NOT NULL,
  `amelioration` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`caseno`, `fileno`, `date`, `name`, `gender`, `age`, `dob`, `marital`, `complexion`, `constitution`, `address`, `mobile`, `occupation`, `height`, `weight`, `child`, `bp`, `pulse`, `temperature`, `present`, `past`, `family`, `disease`, `cause`, `mind`, `head`, `mouth`, `eye`, `face`, `nose`, `respiratory`, `cardiac`, `abdomen`, `menses`, `other`, `limb`, `back`, `skin`, `appetite`, `thirst`, `stool`, `urine`, `sleep`, `discharge`, `addiction`, `desire`, `aversion`, `aggravation`, `amelioration`, `photo`) VALUES
(2, 14, '2024-06-17', 'John Doe', 'male', 29, '0000-00-00', 'married', 'Fair', 'Lean', 'Times Square, New York City, NY', 2147483647, 'Engineer', 6, 70, 1, 90, 80, 97.5, 'Chest Pain', 'None', 'Diabetes', 'None', 'None', 'Confuse Minded,Angerness,Overthinking', 'Normal', '', 'Normal', 'Normal', 'Running', 'Pain', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Interrupted', 'Normal', 'Alcohol', 'Spicy Food', 'None', 'None', 'None', ''),
(3, 14, '2024-06-17', 'Aryan', 'Choose Gender', 0, '0000-00-00', 'Marital Status', '', '', '', 2147483647, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 14, '2024-06-17', 'Umnag Hirani', 'Choose Gender', 0, '0000-00-00', 'Marital Status', '', '', '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `id` int(11) NOT NULL,
  `lab` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `is_disabled` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkup_remarks`
--
ALTER TABLE `checkup_remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseno` (`caseno`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseno` (`caseno`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`caseno`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkup_remarks`
--
ALTER TABLE `checkup_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `test_details`
--
ALTER TABLE `test_details`
  MODIFY `caseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkup_remarks`
--
ALTER TABLE `checkup_remarks`
  ADD CONSTRAINT `caseno_constraint_tk1` FOREIGN KEY (`caseno`) REFERENCES `test_details` (`caseno`);

--
-- Constraints for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD CONSTRAINT `caseno` FOREIGN KEY (`caseno`) REFERENCES `test_details` (`caseno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
