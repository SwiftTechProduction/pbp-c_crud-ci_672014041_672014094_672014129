-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 07, 2016 at 01:58 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `crud`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `albums`
-- 

CREATE TABLE `albums` (
  `id` int(11) NOT NULL auto_increment,
  `idAlbum` varchar(10) NOT NULL,
  `namaAlbum` varchar(20) NOT NULL,
  `deskripsiAlbum` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `albums`
-- 

INSERT INTO `albums` VALUES (1, 'a11', 'Melangkah', 'Album Noah');
INSERT INTO `albums` VALUES (2, 'a12', 'Berlari', 'Album 2009');

-- --------------------------------------------------------

-- 
-- Table structure for table `songs`
-- 

CREATE TABLE `songs` (
  `id` int(11) NOT NULL auto_increment,
  `idLagu` varchar(10) NOT NULL,
  `namaLagu` varchar(20) NOT NULL,
  `albumLagu` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `songs`
-- 

INSERT INTO `songs` VALUES (1, 'a1', 'Pelangi', 'Indah');
INSERT INTO `songs` VALUES (2, 'a2', 'Ruang S', 'Tulus');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, '672014129', 'admin');
INSERT INTO `users` VALUES (2, '672014094', 'admin');
INSERT INTO `users` VALUES (3, '672014041', 'admin');
