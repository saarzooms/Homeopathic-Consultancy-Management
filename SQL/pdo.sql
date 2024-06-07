-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:46 AM
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
(1, 19, ' Blood Test', '2024-05-01', ' All normal', ''),
(2, 19, ' X-Ray', '2024-05-02', ' No issues found', ''),
(3, 20, ' CBC', '2024-06-01', ' Slight anemia', ''),
(4, 20, ' Thyroid Panel', '2024-06-02', ' Thyroid normal', ''),
(5, 20, ' Chest X-Ray', '2024-06-03', ' Clear chest', '');

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

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `fname`, `lname`, `age`, `dob`, `relationship`, `gender`) VALUES
(1, 'jaybhai', 'soni', 69, '2003-12-14', 'Single Never Married', 'jordar maal');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `caseno` int(11) NOT NULL,
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
  `amelioration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`caseno`, `date`, `name`, `gender`, `age`, `dob`, `marital`, `complexion`, `constitution`, `address`, `mobile`, `occupation`, `height`, `weight`, `child`, `bp`, `pulse`, `temperature`, `present`, `past`, `family`, `disease`, `cause`, `mind`, `head`, `eye`, `face`, `nose`, `respiratory`, `cardiac`, `abdomen`, `menses`, `other`, `limb`, `back`, `skin`, `appetite`, `thirst`, `stool`, `urine`, `sleep`, `discharge`, `addiction`, `desire`, `aversion`, `aggravation`, `amelioration`) VALUES
(13, '2024-06-07', '', 'Choose Gender', 0, '0000-00-00', 'Marital Status', '', '', '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '2024-06-07', 'sdfwddddd', 'male', 2, '0000-00-00', 'married', '2', '3', '2', 2, '2', 2, 2, 2, 2, 2, 2, '2', '2', '2', '2', '2', 'Forgetfulness,Suspicious,Sadness,Hot Temprament,Over Proudy', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '22', '2', '2', '2', '2', 'wefeqw', 'erfger', 'wef', 'wefwes'),
(15, '2024-06-07', 'umnag hirani', 'male', 20, '0000-00-00', 'married', 'complexion', 'constitution', 'asd', 543231, 'student', 3, 3, 0, 3, 3, 3, '3', '3rth rsthdx', '33', '34et5wgrthrsdf sgdrgv', '3egrdnbc', 'Forgetfulness,Jealousness,Suspicious,Sadness,Angerness,Proudy', 't4hrdf', '3tfnje5 w4gtrd', 'ghfnv dthr d', 'r dthhgrd greg', 'chest respiratory remarks', 'chest cardiac remarks', 'ytdhgfbcf', 'genitalia other discharge remarks', 'genitalia other discharge remarks', 'hrbfg srtbfx', 'rsb sr er a', ' egsd  eg', ' errbtgs ', 'thirst', 'rsdf', 'bfd', 'gedfs er ', 'er er', ' re', 'tre gg er', ' er ', ' er ', ' aegr'),
(16, '2024-06-07', '', 'Choose Gender', 0, '0000-00-00', 'Marital Status', '', '', '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'Forgetfulness,Timid,Suspicious,Confuse Minded,Sadness,Hot Temprament,Over Proudy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '2024-06-07', '', 'Choose Gender', 0, '0000-00-00', 'Marital Status', '', '', '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'Absent Mind,Forgetfulness,Jealousness,Suspicious,Over Sensitive,Sadness,Angerness,Hot Temprament,Proudy,Over Proudy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '2024-06-07', ' John Doe', ' Male', 30, '1993-01-15', ' Single', ' Fair', ' Average', ' 123 Elm Street, Springfield', 1234567890, ' Engineer', 180, 75, 0, 120, 72, 98.6, ' Healthy', ' None', ' None', ' None', ' N/A', ' Calm, Focused', ' No issues', ' 20/20 vision', ' Clear', ' Normal', ' Normal', ' Normal', ' Normal', ' N/A', ' N/A', ' No issues', ' No issues', ' Clear', ' Good', ' Normal', ' Normal', ' Normal', ' Good', ' None', ' None', ' None', ' None', ' None', ' None'),
(19, '2024-06-07', ' John Doe', ' Male', 30, '1993-01-15', ' Single', ' Fair', ' Average', ' 123 Elm Street, Springfield', 1234567890, ' Engineer', 180, 75, 0, 120, 72, 98.6, ' Healthy', ' None', ' None', ' None', ' N/A', ' Calm, Focused', ' No issues', ' 20/20 vision', ' Clear', ' Normal', ' Normal', ' Normal', ' Normal', ' N/A', ' N/A', ' No issues', ' No issues', ' Clear', ' Good', ' Normal', ' Normal', ' Normal', ' Good', ' None', ' None', ' None', ' None', ' None', ' None'),
(20, '2024-06-07', ' Jane Smith', ' Female', 28, '1995-07-20', ' Married', ' Light', ' Athletic', ' 456 Maple Avenue, Metropolis', 2147483647, ' Teacher', 165, 60, 2, 110, 68, 98.4, ' Mild cold', ' Allergies', ' Hypertension', ' None', ' N/A', ' Anxious, Distracted', ' Occasional headaches', ' Nearsighted', ' Clear', ' Running', ' Normal', ' Normal', ' Normal', ' Regular', ' N/A', ' No issues', ' Minor pain', ' Sensitive', ' Normal', ' Increased', ' Regular', ' Normal', ' Interrupted', ' None', ' None', ' Chocolate', ' Spicy food', ' Dust', ' Rest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caseno` (`caseno`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`caseno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_details`
--
ALTER TABLE `test_details`
  MODIFY `caseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD CONSTRAINT `caseno` FOREIGN KEY (`caseno`) REFERENCES `test_details` (`caseno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
