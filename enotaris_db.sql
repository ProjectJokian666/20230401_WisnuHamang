/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - enotaris
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`enotaris` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `enotaris`;

/*Table structure for table `aphb_temps` */

DROP TABLE IF EXISTS `aphb_temps`;

CREATE TABLE `aphb_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aphb_temps` */

insert  into `aphb_temps`(`id`,`idTrx`,`tanggal`,`nik`,`status`,`fcKtpAhliWaris`,`fcKtpPenerima`,`fcKkAhliWaris`,`fcKkPenerima`,`sertifikatAsli`,`pbbTerbaru`,`fotoLokasi`,`koordinatLokasi`,`created_at`,`updated_at`) values 
(1,'2167','11/10/2021','3506257005570001','2','1633946177.pdf','1633946177.pdf','1633946177.pdf','1633946177.pdf','1633946177.pdf','1633946177.pdf','1633946177.pdf','1633946177.pdf','2021-10-11 09:56:17','2021-10-11 09:56:17');

/*Table structure for table `aphbs` */

DROP TABLE IF EXISTS `aphbs`;

CREATE TABLE `aphbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aphbs` */

insert  into `aphbs`(`id`,`tanggal`,`nik`,`status`,`fcKtpAhliWaris`,`fcKtpPenerima`,`fcKkAhliWaris`,`fcKkPenerima`,`sertifikatAsli`,`pbbTerbaru`,`fotoLokasi`,`koordinatLokasi`,`notif`,`created_at`,`updated_at`) values 
(3,'25/08/2021','3506257005670001','1','1629864577.pdf','1629864577.pdf','1629864577.pdf','1629864577.pdf','1629864577.pdf','1629864577.pdf','1629864577.pdf','1629864577.pdf','b','2021-08-25 04:09:37','2022-06-17 13:39:08');

/*Table structure for table `cv_temps` */

DROP TABLE IF EXISTS `cv_temps`;

CREATE TABLE `cv_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cv_temps` */

/*Table structure for table `cvs` */

DROP TABLE IF EXISTS `cvs`;

CREATE TABLE `cvs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cvs` */

insert  into `cvs`(`id`,`tanggal`,`nik`,`status`,`fcKKPengurus1`,`fcKtpPengurus1`,`fcKKPengurus2`,`fcKtpPengurus2`,`npwp`,`notif`,`created_at`,`updated_at`) values 
(2,'15/05/2022','3506257005570006','2','1652614521.pdf','1652614521.pdf','1652614521.pptx','1652614521.pdf','1652614521.pptx','b','2022-05-15 11:36:08','2022-05-15 11:36:08');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `hibah_temps` */

DROP TABLE IF EXISTS `hibah_temps`;

CREATE TABLE `hibah_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemberi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemberi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukuNikahPemberi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hibah_temps` */

/*Table structure for table `hibahs` */

DROP TABLE IF EXISTS `hibahs`;

CREATE TABLE `hibahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemberi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemberi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukuNikahPemberi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hibahs` */

insert  into `hibahs`(`id`,`tanggal`,`nik`,`status`,`fcKtpPenerima`,`fcKtpPemberi`,`fcKkPenerima`,`fcKkPemberi`,`bukuNikahPemberi`,`sertifikatAsli`,`pbbTerbaru`,`fotoLokasi`,`koordinatLokasi`,`notif`,`created_at`,`updated_at`) values 
(2,'13/10/2021','3506257005670001','1','1634139594.docx','1634139594.jpeg','1634139594.pdf','1634139594.jpeg','1634139594.docx','1634139594.docx','1634139594.docx','1634139594.pdf','1634139594.docx','b','2021-10-13 15:39:54','2021-10-21 14:51:57'),
(3,'13/10/2021','3506257005570001','1','1634141085.png','1634141085.png','1634141085.png','1634141085.png','1634141085.jpg','1634141085.jpg','1634141085.jpg','1634141085.jpg','1634141085.jpg','b','2021-10-13 16:05:30','2021-10-22 03:01:12'),
(4,'13/10/2021','3506257005570001','2','1634141903.png','1634141903.png','1634141903.png','1634141903.png','1634141903.jpg','1634141903.jpg','1634141903.jpg','1634141903.jpg','1634141903.jpg','b','2021-10-13 16:18:34','2021-10-13 16:18:34'),
(5,'22/10/2021','3606257005670001','2','1634871896.docx','1634871896.xlsx','1634871896.pptx','1634871896.jpeg','1634871896.jpeg','1634871896.jpeg','1634871896.pptx','1634871896.pdf','1634871896.docx','b','2021-10-22 03:04:56','2021-10-22 03:04:56'),
(6,'22/10/2021','3606257005670001','2','1634871903.docx','1634871903.xlsx','1634871903.pptx','1634871903.jpeg','1634871903.jpeg','1634871903.jpeg','1634871903.pptx','1634871903.pdf','1634871903.docx','b','2021-10-22 03:05:03','2021-10-22 03:05:03');

/*Table structure for table `jual_beli_temps` */

DROP TABLE IF EXISTS `jual_beli_temps`;

CREATE TABLE `jual_beli_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenjual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenjual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukuNikahPenjual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcSertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jual_beli_temps` */

/*Table structure for table `jual_belis` */

DROP TABLE IF EXISTS `jual_belis`;

CREATE TABLE `jual_belis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPenjual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPenjual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukuNikahPenjual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcSertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jual_belis` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_07_27_050213_jual_beli',1),
(5,'2021_07_30_101044_hibah',1),
(6,'2021_07_30_192513_jual_beli_temporary',1),
(7,'2021_07_31_180149_hibah_temporary',1),
(8,'2021_07_31_180327_a_p_h_b',1),
(9,'2021_07_31_180406_a_p_h_b_temporary',1),
(10,'2021_07_31_180713_waris',1),
(11,'2021_07_31_180728_waris_temporary',1),
(12,'2021_07_31_200132_roya',1),
(13,'2021_07_31_200152_roya_temp',1),
(14,'2021_07_31_200558_pecah_sertifikat',1),
(15,'2021_07_31_200619_pecah_sertifikat_temp',1),
(16,'2021_07_31_200916_peta_bidang',1),
(17,'2021_07_31_200931_peta_bidang_temp',1),
(18,'2021_07_31_200958_peryertifikatan',1),
(19,'2021_07_31_201003_peryertifikatan_temp',1),
(20,'2021_07_31_201016_p_t',1),
(21,'2021_07_31_201020_p_t_temp',1),
(22,'2021_07_31_201026_c_v',1),
(23,'2021_07_31_201030_c_v_temp',1),
(24,'2021_07_31_201037_s_i_u_p',1),
(25,'2021_07_31_201041_s_i_u_p_temp',1),
(26,'2021_07_31_201048_n_i_b',1),
(27,'2021_07_31_201051_n_i_b_temp',1);

/*Table structure for table `nib_temps` */

DROP TABLE IF EXISTS `nib_temps`;

CREATE TABLE `nib_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nib_temps` */

/*Table structure for table `nibs` */

DROP TABLE IF EXISTS `nibs`;

CREATE TABLE `nibs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nibs` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pecah_sertifikat_temps` */

DROP TABLE IF EXISTS `pecah_sertifikat_temps`;

CREATE TABLE `pecah_sertifikat_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pecah_sertifikat_temps` */

/*Table structure for table `pecah_sertifikats` */

DROP TABLE IF EXISTS `pecah_sertifikats`;

CREATE TABLE `pecah_sertifikats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pecah_sertifikats` */

/*Table structure for table `penyertifikatan_temps` */

DROP TABLE IF EXISTS `penyertifikatan_temps`;

CREATE TABLE `penyertifikatan_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kematian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penyertifikatan_temps` */

/*Table structure for table `penyertifikatans` */

DROP TABLE IF EXISTS `penyertifikatans`;

CREATE TABLE `penyertifikatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kematian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penyertifikatans` */

/*Table structure for table `peta_bidang_temps` */

DROP TABLE IF EXISTS `peta_bidang_temps`;

CREATE TABLE `peta_bidang_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoPatok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `peta_bidang_temps` */

/*Table structure for table `peta_bidangs` */

DROP TABLE IF EXISTS `peta_bidangs`;

CREATE TABLE `peta_bidangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkPemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoPatok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `peta_bidangs` */

insert  into `peta_bidangs`(`id`,`tanggal`,`nik`,`status`,`fcSurat`,`fcKtpPemohon`,`fcKkPemohon`,`pbbTerbaru`,`fotoLokasi`,`fotoPatok`,`notif`,`created_at`,`updated_at`) values 
(2,'18/08/2021','3506257005570001','1','1629267203.pdf','1629267203.pdf','1629267203.pdf','1629267203.pdf','1629267203.pdf','1629267203.pdf','b','2021-08-18 06:13:30','2021-08-18 06:28:20');

/*Table structure for table `pt_temps` */

DROP TABLE IF EXISTS `pt_temps`;

CREATE TABLE `pt_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pt_temps` */

/*Table structure for table `pts` */

DROP TABLE IF EXISTS `pts`;

CREATE TABLE `pts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pts` */

/*Table structure for table `roya_temps` */

DROP TABLE IF EXISTS `roya_temps`;

CREATE TABLE `roya_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratPermohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratLunas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktpPetugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roya_temps` */

/*Table structure for table `royas` */

DROP TABLE IF EXISTS `royas`;

CREATE TABLE `royas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratPermohonan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratLunas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktpPetugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `royas` */

/*Table structure for table `siup_temps` */

DROP TABLE IF EXISTS `siup_temps`;

CREATE TABLE `siup_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siup_temps` */

insert  into `siup_temps`(`id`,`idTrx`,`tanggal`,`nik`,`status`,`fcKKPengurus1`,`fcKtpPengurus1`,`fcKKPengurus2`,`fcKtpPengurus2`,`npwp`,`created_at`,`updated_at`) values 
(3,'4854','11/10/2021','3506257005570009','2','1633946423.pdf','1633946423.pdf','1633946423.docx','1633946423.pdf','1633946423.pdf','2021-10-11 10:00:23','2021-10-11 10:00:23');

/*Table structure for table `siups` */

DROP TABLE IF EXISTS `siups`;

CREATE TABLE `siups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKKPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpPengurus2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siups` */

insert  into `siups`(`id`,`tanggal`,`nik`,`status`,`fcKKPengurus1`,`fcKtpPengurus1`,`fcKKPengurus2`,`fcKtpPengurus2`,`npwp`,`notif`,`created_at`,`updated_at`) values 
(4,'25/08/2021','3606257005670001','1','1629861959.pdf','1629861959.pdf','1629861959.pdf','1629861959.pdf','1629861959.pdf','b','2021-08-25 03:25:59','2021-08-25 03:26:09'),
(5,'11/10/2021','3506257005570001','2','1633945217.pdf','1633945217.pdf','1633945217.pdf','1633945217.pdf','1633945217.pdf','b','2021-10-11 09:40:28','2021-10-11 09:40:28');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nik_unique` (`nik`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nik`,`name`,`email`,`email_verified_at`,`password`,`level`,`remember_token`,`created_at`,`updated_at`) values 
(1,'3506257005670001','Admin','admin@gmail.com',NULL,'$2y$10$/7N4Af0EwnJoByBjHBQ9He48jFH7fPu9p1P41.Y7/eU833BDqm9BK','99',NULL,'2021-08-12 04:43:49','2021-08-12 04:43:49'),
(4,'3506257005570009','New Admin','newadmin@gmail.com',NULL,'$2y$10$zwO5zNd5DH8wE1KKYfHFdeHggP3.fCTSFCrcw.qf7vMNwGGmHkida','99',NULL,'2021-10-11 09:45:59','2021-10-11 09:45:59'),
(5,'3506257005670008','Ardi','ardiadmin@gmail.com',NULL,'$2y$10$GRK8XZNsB2MHrKKGZtlpzuz7Coa/nl4bFMCbs6fnoZ6Y0CFgwJ21y','99',NULL,'2021-10-11 10:06:35','2021-10-11 10:06:35'),
(6,'3506257005570006','User','user@gmail.com',NULL,'$2y$10$IMYRafVc4.rfmaT2F8w7.ujEgq25T1sxJsfMbyrGHuh57CjKJeXwu','1',NULL,'2021-10-17 12:15:31','2021-10-17 12:15:31'),
(7,'35062570056700088','hamang','hamang69@gmail.com',NULL,'$2y$10$S31OEBeK0B/4eAb3kL92vOKhSP/ahQIjXOjMWGsN8Dl21YKBonLE6','99',NULL,'2021-10-21 14:49:46','2021-10-21 14:49:46'),
(8,'3506257005670010','Wisnu','wisnu32@gmail.com',NULL,'$2y$10$vYmQQ3umQ7a9lauWzDQBO.Dcc3LsK5RQSEgQh26DPAQj7SEdNTqFy','99',NULL,'2021-10-22 02:38:26','2021-10-22 02:40:46'),
(9,'12987198279187','khoi','khoi@gmail.com',NULL,'$2y$10$Asx5r3Lhjn4G9KePiv4nbua1DBKEQkQXhUAzaM3pHOLIMD0QsJL1e','99',NULL,'2022-06-04 02:49:29','2022-06-04 02:49:29');

/*Table structure for table `waris` */

DROP TABLE IF EXISTS `waris`;

CREATE TABLE `waris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratPernyataan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratKematian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('y','b') COLLATE utf8mb4_unicode_ci DEFAULT 'b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `waris` */

insert  into `waris`(`id`,`tanggal`,`nik`,`status`,`fcKtpAhliWaris`,`fcKkAhliWaris`,`suratPernyataan`,`suratKematian`,`sertifikatAsli`,`pbbTerbaru`,`fotoLokasi`,`koordinatLokasi`,`notif`,`created_at`,`updated_at`) values 
(1,'17/08/2021','3506257005670002','1','1629207914.pdf','1629207914.pdf','1629207914.pdf','1629207914.pdf','1629207914.pdf','1629207914.pdf','1629207914.pdf','1629207914.pdf','b','2021-08-17 13:45:14','2021-08-18 06:28:35');

/*Table structure for table `waris_temps` */

DROP TABLE IF EXISTS `waris_temps`;

CREATE TABLE `waris_temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKtpAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcKkAhliWaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratPernyataan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratKematian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikatAsli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbbTerbaru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinatLokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `waris_temps` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
