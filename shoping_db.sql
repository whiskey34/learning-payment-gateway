/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.17 : Database - shoping_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE `shoping_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `shoping_db`;

/*Table structure for table `order_history` */

DROP TABLE IF EXISTS `order_history`;

CREATE TABLE `order_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `history_id` (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `order_history` */

insert  into `order_history`(`history_id`,`order_id`,`status`,`timestamp`) values 
(1,12,'waiting payment','2023-11-11 17:57:04'),
(2,13,'waiting payment','2023-11-12 10:58:37'),
(3,14,'waiting payment','2023-11-12 11:01:07'),
(4,15,'waiting payment','2023-11-12 11:03:45'),
(5,16,'waiting payment','2023-11-12 11:09:46'),
(6,17,'waiting payment','2023-11-12 11:11:26'),
(7,18,'waiting payment','2023-11-12 11:12:59'),
(8,19,'waiting payment','2023-11-12 15:10:47'),
(9,20,'waiting payment','2023-11-12 15:10:49'),
(10,21,'waiting payment','2023-11-12 16:43:02'),
(66,77,'waiting payment','2023-11-28 11:41:41'),
(67,78,'waiting payment','2023-11-28 11:41:52');

/*Table structure for table `order_items` */

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
  `ord_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` varchar(150) NOT NULL,
  KEY `ord_item_id` (`ord_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `order_items` */

insert  into `order_items`(`ord_item_id`,`order_id`,`product_id`,`quantity`,`price`) values 
(2,2,2,2,'Rp.6000'),
(3,3,17,4,'Rp.2300'),
(4,4,4,2,'Rp.15000'),
(5,4,16,10,'Rp.200'),
(6,5,17,5,'Rp.2300'),
(7,5,4,1,'Rp.15000'),
(8,9,6,1,'0'),
(9,10,4,5,'Rp.15000'),
(10,10,6,1,'Rp.8500'),
(11,11,1,1,'Rp.12000'),
(12,12,17,2,'Rp.2300'),
(13,13,16,1,'Rp.200'),
(14,14,17,3,'Rp.2300'),
(15,15,1,1,'Rp.12000'),
(16,16,16,2,'Rp.200'),
(17,17,4,1,'Rp.15000'),
(18,18,17,1,'Rp.2300'),
(19,19,16,2,'Rp.200'),
(20,20,16,2,'Rp.200'),
(21,21,17,1,'Rp.2300'),
(22,22,2,1,'Rp.6000'),
(23,23,17,2,'Rp.2300'),
(24,24,1,1,'Rp.12000'),
(25,25,1,4,'Rp.12000'),
(26,26,1,2,'Rp.12000'),
(27,27,16,2,'Rp.200'),
(28,28,1,1,'Rp.12000'),
(29,29,2,2,'Rp.6000'),
(30,31,4,1,'Rp.15000'),
(31,32,4,1,'Rp.15000'),
(32,33,16,2,'Rp.200'),
(33,36,16,1,'Rp.200'),
(34,38,2,1,'Rp.6000'),
(35,39,4,1,'Rp.15000'),
(36,40,6,1,'Rp.8500'),
(37,41,2,1,'Rp.6000'),
(38,45,2,1,'Rp.6000'),
(39,45,4,1,'Rp.15000'),
(40,47,1,2,'Rp.12000'),
(41,47,4,1,'Rp.15000'),
(42,48,1,1,'Rp.12000'),
(43,49,1,1,'Rp.12000'),
(44,50,1,2,'Rp.12000'),
(45,51,1,1,'Rp.12000'),
(46,52,1,2,'Rp.12000'),
(47,53,1,2,'Rp.12000'),
(48,54,4,1,'Rp.15000'),
(49,56,1,1,'Rp.12000'),
(50,57,4,1,'Rp.15000'),
(51,58,1,2,'Rp.12000'),
(52,59,1,1,'Rp.12000'),
(53,60,1,3,'Rp.12000'),
(54,61,1,2,'Rp.12000'),
(55,62,1,1,'Rp.12000'),
(56,63,1,1,'Rp.12000'),
(57,64,1,2,'Rp.12000'),
(58,65,1,2,'Rp.12000'),
(59,66,1,2,'Rp.12000'),
(60,67,4,1,'Rp.15000'),
(61,68,1,1,'Rp.12000'),
(62,69,1,1,'Rp.12000'),
(63,70,1,1,'Rp.12000'),
(64,71,1,1,'Rp.12000'),
(65,72,1,2,'Rp.12000'),
(66,73,1,2,'Rp.12000'),
(67,74,1,1,'Rp.12000'),
(68,75,1,1,'Rp.12000'),
(69,76,17,1,'Rp.2300'),
(70,77,16,1,'Rp.200'),
(71,78,16,1,'Rp.200');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `total_amount` varchar(150) NOT NULL,
  `date_order` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(150) NOT NULL,
  `shipping_cost` varchar(200) NOT NULL,
  `postcode` varchar(25) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`created_at`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`user_id`,`first_name`,`last_name`,`total_amount`,`date_order`,`address`,`city`,`shipping_cost`,`postcode`,`status`,`created_at`) values 
(2,2,'delfin','akbar','17','2023-11-11','buraden','bogor','Rp. 5,000','12345',NULL,'2023-11-11 10:04:56'),
(3,7,'delfino','akbar','14','2023-11-11','cakung','jakarta','Rp. 5,000','121212',NULL,'2023-11-11 10:20:01'),
(4,7,'ipang','bery','37','2023-11-11','gdc','depok','Rp. 5,000','102020',NULL,'2023-11-11 10:22:33'),
(5,7,'dipa','barus','31500','2023-11-11','bsd','tanggerang','Rp. 5,000','10203',NULL,'2023-11-11 10:32:45'),
(7,2,'delfin','akbar','22000','2023-11-11','penggilingan','jakarta','Rp. 5,000','12345',NULL,'2023-11-11 16:53:57'),
(8,2,'delfin','akbar','22000','2023-11-11','penggilingan','jakarta','Rp. 5,000','12345',NULL,'2023-11-11 17:06:44'),
(9,2,'delfino','akbar','13500','2023-11-11','penggilingan','bekasi','Rp. 5,000','10101',NULL,'2023-11-11 17:14:21'),
(10,2,'delfin','akbar','88500','2023-11-11','cakung','jakarta','Rp. 5,000','12345',NULL,'2023-11-11 17:34:23'),
(11,2,'kevin','bob','17000','2023-11-11','bikini','bottom','Rp. 5,000','12340','waiting payment','2023-11-11 17:51:20'),
(12,7,'julio','mantap','9600','2023-11-11','matraman','jakarta','Rp. 5,000','12020','waiting payment','2023-11-11 17:57:04'),
(13,2,'reza','akbar','5200','2023-11-12','dramaga','bogor','Rp. 5,000','13134','waiting payment','2023-11-12 10:58:36'),
(14,2,'reza','lagi','11900','2023-11-12','dramaga','bogor','Rp. 5,000','13134','waiting payment','2023-11-12 11:01:07'),
(15,2,'adam','surya','17000','2023-11-12','pakuan','bogor','Rp. 5,000','12342','waiting payment','2023-11-12 11:03:45'),
(16,2,'reza','lagi','5400','2023-11-12','dramaga','bekasi','Rp. 5,000','13134','waiting payment','2023-11-12 11:09:46'),
(17,2,'del','aja','20000','2023-11-12','kuningan','jakarta','Rp. 5,000','13412','waiting payment','2023-11-12 11:11:26'),
(18,7,'adi','kan','7300','2023-11-12','pakuan','bandung','Rp. 5,000','13244','waiting payment','2023-11-12 11:12:59'),
(19,2,'del','fin','5400','2023-11-12','blok m','jakarta','Rp. 5,000','10909','waiting payment','2023-11-12 15:10:47'),
(20,2,'del','fin','5400','2023-11-12','blok m','jakarta','Rp. 5,000','10909','waiting payment','2023-11-12 15:10:49'),
(21,2,'del','fin','7300','2023-11-12','cikreteg','sukabumi','Rp. 5,000','16173','waiting payment','2023-11-12 16:43:01'),
(22,2,'delfin','fin','11000','2023-11-12','caringin','sukabumi','Rp. 5,000','171717','waiting payment','2023-11-12 16:55:39'),
(23,2,'del','del','9600','2023-11-12','cikreteg','bogor','Rp. 5,000','12232','waiting payment','2023-11-12 17:11:17'),
(24,2,'del','fin','17000','2023-11-12','parung','bogor','Rp. 5,000','13240','waiting payment','2023-11-13 11:43:33'),
(25,7,'fin','del','53000','2023-12-12','parung','bekasi','Rp. 5,000','12303','waiting payment','2023-11-13 11:44:59'),
(26,2,'delfin','reza','29000','2023-11-13','rancamaya','ciawi','Rp. 5,000','13402','waiting payment','2023-11-13 11:47:34'),
(27,7,'delfin','reza','5400','2023-11-11','rancamaya','bogor','Rp. 5,000','14230','waiting payment','2023-11-13 11:49:15'),
(28,2,'delfin','akbar','17000','2023-11-13','ciawi','bogor','Rp. 5,000','12322','waiting payment','2023-11-13 16:24:30'),
(29,7,'del','no','17000','2023-11-12','rancamaya','jakarta','Rp. 5,000','12032','waiting payment','2023-11-13 18:12:33'),
(31,2,'delfin','akbar','20000','2023-11-12','kuningan','jakarta','Rp. 5,000','13422','waiting payment','2023-11-14 09:24:55'),
(32,2,'delfin','akbar','20000','2023-11-12','kuningan','jakarta','Rp. 5,000','13422','waiting payment','2023-11-14 09:25:37'),
(33,2,'del','del','5400','2023-11-12','padalarang','bandung','Rp. 5,000','12930','waiting payment','2023-11-14 09:47:38'),
(36,7,'delfin','reza','5200','2023-11-13','kuningan','tangsel','Rp. 5,000','20392','waiting payment','2023-11-14 10:27:44'),
(38,7,'del','no','11000','2023-12-22','matraman','jakarta','Rp. 5,000','12345','waiting payment','2023-11-14 10:32:13'),
(39,7,'del','del','20000','2023-12-23','meikarta','jakarta','Rp. 5,000','12345','waiting payment','2023-11-14 10:33:47'),
(40,7,'delf','ino','13500','2023-11-12','bsd','tangsel','Rp. 5,000','12304','waiting payment','2023-11-14 10:35:08'),
(41,2,'fin','fin','11000','2023-12-13','penggilingan','jakarta','Rp. 5,000','13402','waiting payment','2023-11-14 10:37:12'),
(45,7,'del','no','26000','2023-11-20','jl.bogor','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 09:38:46'),
(47,7,'del','del','44000','2023-11-20','jl.bogor','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 10:02:41'),
(48,7,'del','no','17000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 10:15:23'),
(49,2,'del','no','17000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 10:16:22'),
(50,7,'del','del','29000','2023-11-20','jl.bogor','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 10:34:11'),
(51,2,'aku','doe','17000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 11:02:14'),
(52,2,'del','fino','29000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 12:53:41'),
(53,2,'del','fino','29000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 12:53:46'),
(54,7,'kunto','aji','20000','2023-11-20','rumah ','jogja','Rp. 5,000','1234','waiting payment','2023-11-20 12:55:52'),
(56,2,'del','del','5000','2023-11-20','jl.rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 15:10:44'),
(57,7,'del','del','20000','2023-11-20','rumaku','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 15:34:28'),
(58,2,'del','akbar','29000','2023-11-20','rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-20 15:48:36'),
(59,2,'del','akbar','17000','2023-11-20','rumahku','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 15:50:12'),
(60,7,'del','akbar','41000','2023-11-20','ada','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 15:59:11'),
(61,7,'del','akbar','29000','2023-11-20','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 16:00:33'),
(62,2,'delfin','akbar','17000','2023-11-20','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 16:45:27'),
(63,7,'fin','akbar','17000','2023-11-20','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 17:28:45'),
(64,2,'del','akbar','29000','2023-11-20','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 17:39:12'),
(65,2,'deldel','akbar','29000','2023-11-20','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-20 17:53:10'),
(66,2,'to','me','29000','2023-11-22','rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-22 13:16:33'),
(67,7,'delfin','akbar','20000','2023-11-22','jl.pintas','bogor','Rp. 5,000','12345','waiting payment','2023-11-22 13:23:58'),
(68,2,'del','akbar','5000','2023-11-22','pintas','bogor','Rp. 5,000','12345','waiting payment','2023-11-22 13:27:16'),
(69,2,'del','akbar','17000','2023-11-22','rumah','jakarta','Rp. 5,000','12345','waiting payment','2023-11-22 13:28:21'),
(70,2,'del','del','17000','2023-11-22','bsd','jakarta','Rp. 5,000','12345','waiting payment','2023-11-22 13:43:10'),
(71,2,'del','bar','17000','2023-11-22','rumah','jakarta','Rp. 5,000','123','waiting payment','2023-11-22 13:47:13'),
(72,7,'del','akbar','29000','2023-11-22','idem','jakarta','Rp. 5,000','12345','waiting payment','2023-11-22 13:59:35'),
(73,7,'ak','bar','0','2023-11-22','idem','jakarta','Rp. 5,000','123','waiting payment','2023-11-22 14:12:19'),
(74,2,'del','akbar','0','2023-11-23','rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-23 07:41:49'),
(75,7,'del','akbar','0','2023-11-23','rumah','bogor','Rp. 5,000','12345','waiting payment','2023-11-23 08:04:22'),
(76,2,'delfino','akbar','0','2023-11-23','rumahku','bogor','Rp. 5,000','12345','waiting payment','2023-11-23 08:22:24'),
(77,7,'del','akbar','0','2023-11-28','rumah','bogor','Rp. 2,000','12341','waiting payment','2023-11-28 11:41:40'),
(78,7,'del','akbar','0','2023-11-28','rumah','bogor','Rp. 2,000','12341','waiting payment','2023-11-28 11:41:51');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `payment_amount` int(250) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_method` varchar(155) NOT NULL,
  `payment_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_timestamp`),
  KEY `pay_id` (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `payments` */

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `images` varchar(150) DEFAULT NULL,
  `stock` int(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`created_at`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product` */

insert  into `product`(`product_id`,`name`,`images`,`stock`,`description`,`supplier_id`,`harga`,`created_at`,`updated_at`) values 
(1,'shampoo',NULL,50,'',1,'12000','2023-10-20 08:14:19','2023-11-23 01:21:12'),
(2,'lays',NULL,50,'',1,'6000','2023-10-20 08:15:04','2023-11-23 01:53:56'),
(4,'pepsoden',NULL,11,'keperluan mandi',2,'15000','2023-10-22 11:22:12',NULL),
(6,'cimori baru','',2,'',6,'8500','2023-10-25 20:33:00','2023-10-25 14:27:07'),
(16,'badge',NULL,48,'',1,'200','2023-11-02 09:27:03','2023-11-23 01:54:51'),
(17,'kue','./public/upload_img/b3e2db084a9ac2d8ce0073d5be404a60.jpg',2,'kue',6,'2300','2023-11-02 09:59:45',NULL);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`created`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`supplier_id`,`name`,`phone`,`address`,`description`,`created`,`updated`) values 
(1,'toko A','0212320930','jakarta selatan',NULL,'2023-10-16 08:36:17',NULL),
(2,'toko B','02132342442','jakarta timur','toko grosir serba ada','2023-10-16 08:37:06',NULL),
(6,'toko D','0888232314348','Banten','toko laku laku','2023-10-16 16:34:39','2023-10-20 00:28:25'),
(7,'toko L','021898928980','Jakarta',NULL,'2023-10-16 16:35:02','2023-10-20 00:27:51'),
(10,'toko lama','01222129284','bandung',NULL,'2023-10-25 16:35:02',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1.Admin, 2.Kasir',
  `address` varchar(200) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`password`,`name`,`email`,`level`,`address`) values 
(1,'admindev','40bd001563085fc35165329ea1ff5c5ecbdbbeef','delfin','black.delfino28@gmail.com',1,'bogor'),
(2,'kasir','8691e4fc53b99da544ce86e22acba62d13352eff','aku','email.kasir@email.com',2,'jakarta'),
(7,'kasir2','40bd001563085fc35165329ea1ff5c5ecbdbbeef','lana','kasirdua@email.com',2,'bekasi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
