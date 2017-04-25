-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 08:11 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `commentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentstab`
--

CREATE TABLE IF NOT EXISTS `commentstab` (
`cid` int(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `commentstab`
--

INSERT INTO `commentstab` (`cid`, `uid`, `date`, `message`) VALUES
(23, '2', '2016-12-07 18:05:37', 'Yo Your website is super duper awesome!'),
(32, '3', '2016-12-07 22:42:14', 'Nice website!'),
(33, '1', '2016-12-08 13:27:36', 'Thank you everybody. Amazing people!'),
(34, '4', '2016-12-14 18:47:13', 'Your website rocks');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`cid` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `message`) VALUES
(1, 'nishant', 'nishkt@gmail.com', ''),
(2, 'nishant', 'nishkt@gmail.com', ';;;kjl;kj;lkj;lkkj;lkj'),
(3, 'Nish', 'nishkt@gmail.com', 'Yellow!'),
(4, 'aaqib', 'aaqib@gmail.com', 'YO WHTUP'),
(5, 'nish', 'nishkt@gmail.com', 'blah bllaah blah');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
`id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `email`, `startdate`, `enddate`) VALUES
(1, 'nishant.teckchandani@gmail.com', '2017-01-02 00:00:00', '2017-01-28 00:00:00'),
(2, 'nishant.teckchandani@gmail.com', '2017-12-29 00:00:00', '2018-01-30 00:00:00'),
(3, 'aaqib@gmail.com', '2017-10-29 00:00:00', '2017-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
`id` int(11) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uid`, `pwd`, `fname`, `lname`, `email`) VALUES
(1, 'admin', 'whatsup', 'Nishant', 'Teck', 'nishant.teckchandani@gmail.com'),
(2, 'kvajihi', 'yellow', 'hussain', 'vaji', 'kvajihi@gmail.com'),
(3, 'nishkt', 'banana', 'nish', 'teck', 'nishant_kt@hotmail.com'),
(4, 'aaqib1', 'salman', 'aaqib', 'khwaja', 'aaqib@gmail.com'),
(5, 'nishteck', 'nishant', 'nish', 'teck', 'nishkt@gmail.com'),
(6, 'ty', 'ty', 'ty', 'ty', 'ty@gmi.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentstab`
--
ALTER TABLE `commentstab`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentstab`
--
ALTER TABLE `commentstab`
MODIFY `cid` int(128) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `cid` int(128) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
