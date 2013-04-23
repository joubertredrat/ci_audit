-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2013 at 11:38 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `code`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `id_audit` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(255) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `query` text NOT NULL,
  `date_operation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `initial_state` text,
  `final_state` text,
  `session` text NOT NULL,
  PRIMARY KEY (`id_audit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
