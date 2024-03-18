# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.3-MariaDB-1:11.2.3+maria~ubu2204)
# Database: cards-collector
# Generation Time: 2024-03-18 12:35:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `release_year` varchar(4) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `sport` varchar(50) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `img_link` varchar(200) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `logo_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;

INSERT INTO `cards` (`id`, `first_name`, `last_name`, `release_year`, `brand`, `sport`, `value`, `img_link`, `deleted`, `logo_link`)
VALUES
	(1,'Michael','Jordan','1986','Fleer','Basketball',58000,'https://jordancards.com/static/238ce09809c0d108a54e0ed002374826/5dc64/96-97-fleer-michael-jordan-rookie-decade-of-excellence.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(2,'Tom','Brady','2000','Playoff Contenders','American Football',35000,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2017/02/2000-Contenders-Tom-Brady-RC.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(3,'Barry','Bonds','1986','Topps','Baseball',375,'https://cdn.theathletic.com/app/uploads/2022/05/11135210/8-Barry-Bonds-1986-Topps-Traded.jpeg',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(4,'Jerry','Rice','1986','Topps','American Football',248.99,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2020/01/1986-Topps-Jerry-Rice-RC.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(5,'Drew','Brees','2001','Playoff Contenders','American Football',1699.99,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2018/09/2001-Playoff-Contenders-Drew-Brees-Rookie-Card-Autograph.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(6,'Wilt','Chamberlain','1961','Fleer','Basketball',3899,'https://www.cardboardconnection.com/wp-content/uploads/2013/04/1961-62-Fleer-Basketball-8-Wilt-Chamberlain-RC.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(7,'Darryl','Strawberry','1984','Fleer','Baseball',155.99,'https://img.beckett.com/news/news-content/uploads/2022/02/1984-Fleer-Darryl-Strawberry-RC.jpg',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(8,'Giannis','Antetokounmpo','2013','Prizm','Basketball',3933,'https://img.beckett.com/news/news-content/uploads/2020/12/2013-14-Panini-Prizm-Giannis-Antetokounmpo-RC.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(9,'Nikola','Jokic','2015','Prizm','Basketball',900,'https://img.beckett.com/news/news-content/uploads/2020/08/2015-16-Panini-Prizm-Nikola-Jokic-Rookie-Card-1.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(10,'Mickey','Mantle','1952','Topps','Baseball',12600000,'https://www.oldsportscards.com/wp-content/uploads/2023/02/1952-Topps-311-Mickey-Mantle-Baseball-Card-1.webp',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(11,'Jerry','West','1961','Topps','Basketball',1299,'https://www.cardboardconnection.com/wp-content/uploads/2013/10/1961-62-Fleer-Jerry-West-RC-43.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(12,'Joe','Montana','1981','Topps','American Football',179.84,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2020/01/1981-Topps-Joe-Montana-Rookie-Card.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(13,'Randy','Johnson','1989','Fleer','Baseball',1275,'https://cdn.theathletic.com/app/uploads/2022/05/11135235/3-Randy-Johnson-1989-Fleer.jpg',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(14,'Randy','Moss','1998','Playoff Contenders','American Football',5500,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2017/12/1998-Playoff-Contenders-Randy-Moss-Rookie-Ticket-Autograph.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(15,'Derek','Jeter','1993','Topps','Baseball',475,'https://cdn.theathletic.com/app/uploads/2022/05/11135220/5-1993-Topps-Derek-Jeter.jpg',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(16,'Tim','Duncan','1997','Topps','Basketball',8000,'https://www.cardboardconnection.com/wp-content/uploads/2013/04/1997-98-Topps-Chrome-Tim-Duncan-RC-115.jpg',0,'https://images.purevpn-tools.com/public/images/NBA-right-Image.png'),
	(17,'Ken','Griffey Jr','2022','Prizm','Baseball',999.99,'https://commondatastorage.googleapis.com/images.pricecharting.com/ref410f4cef28a5c16c7b1f8d072e7d15ca5df5bc43e9b1712b96a4c753d64fb8c7/240.jpg',0,'https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png'),
	(18,'Walter','Payton','1976','Topps','American Football',499.99,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2020/01/1976-Topps-Walter-Payton-RC.jpg',0,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png'),
	(19,'Test','Test','1990','Prizm','American Football',12000,'https://beckett-www.s3.amazonaws.com/news/news-content/uploads/2019/12/1976-Topps-Jack-Lambert-RC.jpg',1,'https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png');

/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
