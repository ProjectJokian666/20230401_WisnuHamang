/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_potlot
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_potlot` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_potlot`;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`,`updated_at`) values 
('admin@gmail.com','$2y$10$kjIc8WbWCd6JEHzs3iG8vusitvJ.YUKtzw1ohOFjUPtn2xVAWX7F2','2022-09-27 13:09:52','2022-09-27 20:09:52');

/*Table structure for table `tb_cart` */

DROP TABLE IF EXISTS `tb_cart`;

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gambar` int(11) DEFAULT NULL,
  `id_cust` int(11) DEFAULT NULL,
  `id_pemasar` int(11) DEFAULT NULL,
  `harga` float DEFAULT 0,
  `promo` int(11) DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pesan',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_cart` */

insert  into `tb_cart`(`id`,`id_gambar`,`id_cust`,`id_pemasar`,`harga`,`promo`,`status`,`created_at`,`updated_at`) values 
(9,5,6,4,11.5,0,'dibayar','2022-11-30 16:19:52','2022-11-30 16:19:52'),
(10,5,6,4,11.5,0,'pesan','2022-11-30 16:19:52','2022-11-30 16:19:52'),
(11,7,6,7,98999,0,'pesan','2022-11-30 16:36:43','2022-11-30 16:36:43'),
(12,5,6,7,0.23,0,'pesan','2022-12-11 19:57:52','2022-12-11 19:57:52'),
(13,2,6,7,1000,1,'pesan','2022-12-21 01:44:55','2022-12-21 01:44:55');

/*Table structure for table `tb_custom` */

DROP TABLE IF EXISTS `tb_custom`;

CREATE TABLE `tb_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasar` int(11) DEFAULT NULL,
  `id_cust` int(11) DEFAULT NULL,
  `sampel` text DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `canvas` int(11) DEFAULT NULL,
  `harga` float DEFAULT 0,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `status` varchar(55) DEFAULT 'pesan',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_custom` */

insert  into `tb_custom`(`id`,`id_pemasar`,`id_cust`,`sampel`,`nama`,`canvas`,`harga`,`gambar1`,`gambar2`,`gambar3`,`gambar4`,`status`,`created_at`,`updated_at`) values 
(1,7,2,'1667962259.jpg','hmmm',46,3,'1670190297.png',NULL,NULL,NULL,'pesan','2022-11-09 09:50:59','2022-11-09 09:50:59'),
(2,7,6,'1670195078.jpg','hmmm',67,1,'1670195374.jpg','1670197021.png',NULL,'1670411410.png','pesan','2022-12-05 06:04:38','2022-12-05 06:04:38'),
(3,7,6,'1670763550.jpg','mona',79,120000,'1670763621.jpg',NULL,NULL,'1670763661.png','pesan','2022-12-11 19:59:10','2022-12-11 19:59:10'),
(4,4,6,'1671549829.jpg','hhh',1218,0,NULL,NULL,NULL,NULL,'pesan','2022-12-20 22:23:49','2022-12-20 22:23:49'),
(5,4,6,'1671549829.jpg','hhh',912,0,NULL,NULL,NULL,NULL,'pesan','2022-12-20 22:23:49','2022-12-20 22:23:49'),
(6,7,6,'1671552257.jpg','xxxxxxxxxxxxxxxxxxxx',79,0,NULL,NULL,NULL,NULL,'pesan','2022-12-20 23:04:17','2022-12-20 23:04:17'),
(7,7,6,'1671751377.jpg','ccc',912,0,NULL,NULL,NULL,NULL,'pesan','2022-12-23 06:22:57','2022-12-23 06:22:57');

/*Table structure for table `tb_custom_chat` */

DROP TABLE IF EXISTS `tb_custom_chat`;

CREATE TABLE `tb_custom_chat` (
  `id_custom` int(11) DEFAULT NULL,
  `id_pengirim` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_custom_chat` */

insert  into `tb_custom_chat`(`id_custom`,`id_pengirim`,`id_penerima`,`isi`,`created_at`) values 
(3,6,7,'rego 11000','2022-12-11 19:59:56');

/*Table structure for table `tb_gaji` */

DROP TABLE IF EXISTS `tb_gaji`;

CREATE TABLE `tb_gaji` (
  `id_user` int(11) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `tgl_gaji` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_gaji` */

insert  into `tb_gaji`(`id_user`,`gaji`,`tgl_gaji`) values 
(1,1,'2022-12-21 04:00:12'),
(1,1,'2022-12-21 04:45:50'),
(1,200,'2022-12-21 04:45:56');

/*Table structure for table `tb_gambar` */

DROP TABLE IF EXISTS `tb_gambar`;

CREATE TABLE `tb_gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` text DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `promo` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_gambar` */

insert  into `tb_gambar`(`id`,`gambar`,`nama`,`keterangan`,`harga`,`kategori`,`promo`,`created_at`,`updated_at`) values 
(2,'1664712435.jpg','coba','hhh',1000,NULL,1,'2022-10-02 19:07:15','2022-10-02 19:07:15'),
(3,'1664713988.jpg','khoiuser','aaaa',100,NULL,99,'2022-10-02 19:33:08','2022-10-02 19:33:08'),
(5,'1666506906.jpg','ck','ck',23,NULL,99,'2022-10-23 13:35:06','2022-10-23 13:35:06'),
(6,'1666691232.png','cekadmin','cekadmin',9999,NULL,50,'2022-10-25 16:47:12','2022-10-25 16:47:12'),
(7,'1666691961.jpg','cekmarkt','cekmarkt',99999,NULL,99,'2022-10-25 16:59:21','2022-10-25 16:59:21'),
(8,'1666691962.jpg','cekmarkt','cekmarkt',99999,NULL,30,'2022-10-25 16:59:22','2022-10-25 16:59:22'),
(9,'1667934364.jpg','coba  test','coba test',100000000,NULL,50,'2022-11-09 02:06:04','2022-11-09 02:06:04'),
(10,'1669387219.jpg','gweihdq;dl','sndks',1,NULL,0,'2022-11-25 21:40:19','2022-11-25 21:40:19');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'customer',
  `alamat` text DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `verif` enum('login','tidak') DEFAULT 'tidak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role`,`alamat`,`no_hp`,`verif`,`created_at`,`updated_at`) values 
(0,'pemilik','pemilik@gmail.com','$2y$10$NEdidpjIjsSGaQ20bxakJuC.t0YSP5spxw7YFb9U34RtSEwuGejRm','pemilik',NULL,NULL,'login','2022-12-20 23:06:48','2022-12-20 23:06:52'),
(1,'admin','admin@gmail.com','$2y$10$WEZwhGml9T8ir5he3hdWVuqBGviCgwm9rpAHUeBSu.DYNlwX0lMrS','admin',NULL,NULL,'login','2022-09-04 15:51:51','2022-09-04 15:51:51'),
(2,'customer','customer@gmail.com','$2y$10$XAdwOIR.b8U.IiuGVCg3yOoIxLWEn5v.PTtxeIzQJdKcQEjQUQnku','customer',NULL,NULL,'login','2022-09-27 13:35:18','2022-09-27 13:35:18'),
(3,'marketing`','marketing@gmail.com','$2y$10$pTqz7ZY6zi8H6n8643PCcuppvOxlP0KFQWbXrzHlTG8/hRHyqW8MG','anggota',NULL,NULL,'login','2022-09-27 13:25:37','2022-09-27 13:25:37'),
(4,'market','market@gmail.com','$2y$10$RtNi6.dZuc8Z.OQOaHeOf.i9FuZRIGR9fL7UkR4KUoG0FAGZyGQ2O','anggota',NULL,NULL,'login','2022-09-27 21:03:54','2022-09-27 21:03:54'),
(5,'anggot','anggota@gmail.com','$2y$10$CqSt.nPRq6sKnYAQliJ0buxkOCXGzl84mH9ZwotKayqE4A/tSP7HK','anggota',NULL,NULL,'tidak','2022-10-23 13:14:06','2022-10-23 13:14:06'),
(6,'customer','cust@gmail.com','$2y$10$XiOS7uMmvGWXBF57KmIFKum19B3lx4cVOSC1xE9SmYLpup2LLjUP2','customer',NULL,NULL,'login','2022-10-23 06:15:14','2022-10-23 06:15:14'),
(7,'markt','markt@gmail.com','$2y$10$0PKoYRz7wnkDaajnN9peau8/ARMRgYqzDFTGCfGWqFLD0qLx4XLJi','anggota',NULL,NULL,'login','2022-10-23 06:15:46','2022-10-23 06:15:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
