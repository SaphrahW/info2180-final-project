SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bugmedatabase`
--
DROP SCHEMA IF EXISTS schemaDB;
CREATE SCHEMA schemaDB;
USE schemaDB;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
DROP TABLE IF EXISTS 'Users';
CREATE TABLE `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FirstName` varchar(15) DEFAULT NULL,
  `LastName` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date_joined` date(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Users (ID, FirstName, LastName, password, email, date_joined)
VALUES ('1', 'Admin', 'User', 'password123', 'admin@bugme.com', '1993-05-15');

DROP TABLE IF EXISTS 'Issues';
CREATE TABLE `Issues` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Title` varchar(25) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Priority` varchar(10) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL
  `assigned_to` varchar(30) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created` date(15) DEFAULT NULL,
  `updated` date(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
