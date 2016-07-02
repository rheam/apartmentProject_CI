-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for electiveapp
CREATE DATABASE IF NOT EXISTS `electiveapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `electiveapp`;


-- Dumping structure for table electiveapp.boardersroom
CREATE TABLE IF NOT EXISTS `boardersroom` (
  `bid` int(4) NOT NULL AUTO_INCREMENT,
  `id` int(4) NOT NULL,
  `roomid` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`),
  KEY `id` (`id`),
  KEY `roomid` (`roomid`),
  CONSTRAINT `FK__user` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_boardersroom_rooms` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`roomid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table electiveapp.boardersroom: ~7 rows (approximately)
DELETE FROM `boardersroom`;
/*!40000 ALTER TABLE `boardersroom` DISABLE KEYS */;
INSERT INTO `boardersroom` (`bid`, `id`, `roomid`, `date`) VALUES
	(2, 1, 4, '2016-04-08 16:43:04'),
	(4, 27, 2, '2016-04-08 17:27:16'),
	(6, 29, 14, '2016-04-08 17:30:22'),
	(10, 28, 13, '2016-04-08 22:10:06'),
	(11, 30, 1, '2016-04-08 22:10:29'),
	(14, 17, 5, '2016-04-08 22:52:23');
/*!40000 ALTER TABLE `boardersroom` ENABLE KEYS */;


-- Dumping structure for table electiveapp.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomid` int(4) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `rooms_status` enum('available','occupied') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`roomid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table electiveapp.rooms: ~10 rows (approximately)
DELETE FROM `rooms`;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`roomid`, `room_number`, `price`, `rooms_status`) VALUES
	(1, '001', 1500, 'available'),
	(2, '002', 300, 'available'),
	(3, '003', 400, 'available'),
	(4, '004', 600, 'available'),
	(5, '005', 388, 'available'),
	(6, '006', 100, 'available'),
	(7, '007', 100, 'available'),
	(8, '008', 800, 'available'),
	(9, '009', 100, 'available'),
	(10, '010', 200, 'available'),
	(11, '012', 1000, 'available'),
	(12, '011', 1500, 'available'),
	(13, '013', 2000, 'available'),
	(14, '014', 3000, 'available');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;


-- Dumping structure for table electiveapp.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact` varchar(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` enum('boarder','admin') NOT NULL DEFAULT 'boarder',
  `payment_status` enum('paid','unpaid','blocked') NOT NULL DEFAULT 'unpaid',
  `dateofreg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table electiveapp.user: ~6 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `contact`, `username`, `password`, `user_type`, `payment_status`, `dateofreg`) VALUES
	(1, 'Raymon', 'Filosopo', 'male', '0', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'unpaid', '2016-04-09'),
	(17, 'Rico', 'Rico', 'male', '0', 'rico', 'be89e250d8388c5e7ded2f1630e5daa4', 'boarder', 'blocked', '2016-04-09'),
	(27, 'Leo ', 'Messi', 'male', '09123123123', 'Barca 10', 'cd2158f023ff0ff278df92a54a26b131', 'boarder', 'paid', '2016-04-09'),
	(28, 'Rock', 'NRoll', 'male', '09067360537', 'test_u', 'cd2158f023ff0ff278df92a54a26b131', 'boarder', 'paid', '2016-04-09'),
	(29, 'Loki', 'Thor', 'male', '09865756756', 'Thorn', 'cd2158f023ff0ff278df92a54a26b131', 'boarder', 'paid', '2016-04-09'),
	(30, 'Anne', 'Voing', 'female', '09091021212', 'asdasd', 'cd2158f023ff0ff278df92a54a26b131', 'boarder', 'paid', '2016-04-09');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for view electiveapp.all_boarders
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `all_boarders` (
	`id` INT(4) NOT NULL,
	`firstname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`lastname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`gender` ENUM('male','female') NOT NULL COLLATE 'latin1_swedish_ci',
	`contact` VARCHAR(11) NOT NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`user_type` ENUM('boarder','admin') NOT NULL COLLATE 'latin1_swedish_ci',
	`payment_status` ENUM('paid','unpaid','blocked') NOT NULL COLLATE 'latin1_swedish_ci',
	`dateofreg` DATE NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.boarders_not_yet
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `boarders_not_yet` (
	`id` INT(4) NOT NULL,
	`firstname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`lastname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.boarders_room
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `boarders_room` (
	`contact` VARCHAR(11) NOT NULL COLLATE 'latin1_swedish_ci',
	`price` DOUBLE NOT NULL,
	`room_number` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`id` INT(4) NOT NULL,
	`firstname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`lastname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`dateofreg` DATE NOT NULL,
	`payment_status` ENUM('paid','unpaid','blocked') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.joined_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `joined_view` (
	`id` INT(4) NOT NULL,
	`firstname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`lastname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.select_room
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `select_room` (
	`roomid` INT(4) NOT NULL,
	`room_number` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`price` DOUBLE NOT NULL,
	`rooms_status` ENUM('available','occupied') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.select_unavailable_rooms
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `select_unavailable_rooms` (
	`roomid` INT(4) NOT NULL,
	`room_number` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`price` DOUBLE NOT NULL,
	`rooms_status` ENUM('available','occupied') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view electiveapp.toberemove
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `toberemove` (
	`id` INT(4) NOT NULL,
	`firstname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`lastname` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`room_number` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`payment_status` ENUM('paid','unpaid','blocked') NOT NULL COLLATE 'latin1_swedish_ci',
	`dateofreg` DATE NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for procedure electiveapp.calc_rent
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `calc_rent`()
select
boardersroom.roomid,rooms.roomid,
sum(rooms.price) as total_income
from boardersroom,rooms,user
where boardersroom.roomid = rooms.roomid
and boardersroom.id = user.id//
DELIMITER ;


-- Dumping structure for view electiveapp.all_boarders
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `all_boarders`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `all_boarders` AS SELECT * from user where payment_status = 'paid' or payment_status = 'unpaid' and user_type != 'admin' ;


-- Dumping structure for view electiveapp.boarders_not_yet
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `boarders_not_yet`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `boarders_not_yet` AS select id, firstname, lastname from user where id NOT IN 
(select user.id from boardersroom,user,rooms where user.id = boardersroom.id and user_type !='blocked') ;


-- Dumping structure for view electiveapp.boarders_room
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `boarders_room`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `boarders_room` AS select user.contact,rooms.price,rooms.room_number,user.username,`user`.`id` AS `id`,`user`.`firstname` AS `firstname`,`user`.`lastname` AS `lastname`,`user`.`dateofreg` AS `dateofreg`,`user`.`payment_status` AS `payment_status` from ((`user` join `rooms`) join `boardersroom`) where ((`boardersroom`.`roomid` = `rooms`.`roomid`) and (`boardersroom`.`id` = `user`.`id`) and (`user`.`payment_status` <> 'blocked')and user_type!='admin') ;


-- Dumping structure for view electiveapp.joined_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `joined_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `joined_view` AS select id, firstname, lastname from user where id IN (select user.id from boardersroom,user,rooms where user.id = boardersroom.id ) ;


-- Dumping structure for view electiveapp.select_room
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `select_room`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `select_room` AS select roomid,room_number,price,rooms_status from rooms where roomid NOT IN (select roomid from boardersroom,user where user.id = boardersroom.id 
and boardersroom.roomid = rooms.roomid) ;


-- Dumping structure for view electiveapp.select_unavailable_rooms
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `select_unavailable_rooms`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `select_unavailable_rooms` AS select roomid,room_number,price,rooms_status from rooms where roomid IN (select roomid from boardersroom,user where user.id = boardersroom.id 
and boardersroom.roomid = rooms.roomid) ;


-- Dumping structure for view electiveapp.toberemove
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `toberemove`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `toberemove` AS SELECT user.id,firstname,lastname,room_number,payment_status,dateofreg 
from user,rooms,boardersroom
where boardersroom.roomid = rooms.roomid and boardersroom.id = user.id
and payment_status = 'blocked' ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
