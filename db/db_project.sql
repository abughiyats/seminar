/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.21-log : Database - db_seminarueu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `mn_log_pembayaran` */

DROP TABLE IF EXISTS `mn_log_pembayaran`;

CREATE TABLE `mn_log_pembayaran` (
  `code` int(10) NOT NULL AUTO_INCREMENT,
  `profile_code` varchar(100) DEFAULT '',
  `price` decimal(16,2) DEFAULT '0.00',
  `description` text,
  `log_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=1614120496 DEFAULT CHARSET=utf8;

/*Data for the table `mn_log_pembayaran` */

insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120466,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120467,'PRFL-0002',50000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120468,'PRFL-0002',150000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120469,'PRFL-0002',200000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120470,'PRFL-0002',200000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120471,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120472,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120473,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120474,'PRFL-0002',50000.00,'PENAMBAHAN SALDO','1970-01-01 07:00:00');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120475,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','2019-08-20 06:34:20');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120476,'PRFL-0002',150000.00,'PENAMBAHAN SALDO','2019-08-20 06:35:03');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120477,'PRFL-0002',200000.00,'PENAMBAHAN SALDO','2019-08-20 06:35:23');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120478,'PRFL-0002',10000.00,'PENAMBAHAN SALDO || 4781 8117','2019-08-20 06:49:04');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120479,'PRFL-0002',50000.00,'PENAMBAHAN SALDO || 4364 15096','2019-08-20 06:49:54');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120480,'PRFL-0002',10000.00,'13584 10602','2019-08-20 06:57:20');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120481,'PRFL-0002',10000.00,'9981 10103','2019-08-20 06:57:20');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120482,'PRFL-0002',10000.00,NULL,'2019-08-20 07:00:12');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120483,'PRFL-0002',10000.00,NULL,'2019-08-20 07:00:12');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120484,'PRFL-0002',10000.00,'d ','2019-08-20 07:01:42');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120485,'PRFL-0002',10000.00,'R\'','2019-08-20 07:01:43');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120486,'PRFL-0002',10000.00,'&I','2019-08-20 07:01:43');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120487,'PRFL-0002',10000.00,'12467 8182  ==  B%','2019-08-20 07:03:11');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120488,'PRFL-0002',10000.00,'14971 4493  ==  B%','2019-08-20 07:03:11');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120489,'PRFL-0002',10000.00,'16418 9475  ==  B%','2019-08-20 07:03:11');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120490,'PRFL-0002',10000.00,'11435 11384  ==  ','2019-08-20 07:05:55');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120491,'PRFL-0002',10000.00,'4571+3161+  ==  ]a','2019-08-20 07:07:46');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120492,'PRFL-0002',10000.00,'23066863 31917781  ==  470000','2019-08-20 07:08:35');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120493,'PRFL-0002',10000.00,'8627231 550398  ==  470000','2019-08-20 07:10:19');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120494,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','2019-08-20 07:31:33');
insert  into `mn_log_pembayaran`(`code`,`profile_code`,`price`,`description`,`log_date`) values (1614120495,'PRFL-0002',10000.00,'PENAMBAHAN SALDO','2019-08-20 07:53:13');

/*Table structure for table `mn_log_saldo_seminar` */

DROP TABLE IF EXISTS `mn_log_saldo_seminar`;

CREATE TABLE `mn_log_saldo_seminar` (
  `code` varchar(100) NOT NULL DEFAULT '',
  `organisasi_code` varchar(100) DEFAULT '',
  `peserta_code` varchar(100) DEFAULT '',
  `action` varchar(100) DEFAULT '',
  `description` varchar(150) DEFAULT '',
  `log_date` datetime DEFAULT '1900-01-01 00:00:00',
  `payment_type` varchar(100) DEFAULT '',
  `payment_amount` double DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mn_log_saldo_seminar` */

/*Table structure for table `mn_seminar` */

DROP TABLE IF EXISTS `mn_seminar`;

CREATE TABLE `mn_seminar` (
  `code` varchar(100) NOT NULL DEFAULT '',
  `organisasi_code` varchar(100) DEFAULT '',
  `title` varchar(100) DEFAULT '',
  `target_date` datetime DEFAULT '1900-01-01 00:00:00',
  `pembicara` varchar(100) DEFAULT '',
  `open_regist_date` datetime DEFAULT '1900-01-01 00:00:00',
  `close_regist_date` datetime DEFAULT '1900-01-01 00:00:00',
  `qouta` int(10) DEFAULT '0',
  `location` varchar(250) DEFAULT '',
  `price` decimal(18,2) DEFAULT '0.00',
  `certificate_status` tinyint(1) DEFAULT '1',
  `verified_status` tinyint(1) DEFAULT '0',
  `remark` varchar(250) DEFAULT '',
  `created_by` varchar(100) DEFAULT '',
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(100) DEFAULT '',
  `updated_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mn_seminar` */

insert  into `mn_seminar`(`code`,`organisasi_code`,`title`,`target_date`,`pembicara`,`open_regist_date`,`close_regist_date`,`qouta`,`location`,`price`,`certificate_status`,`verified_status`,`remark`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('SMR/ORG-001-00001','ORG-001','Elektro','2019-07-25 00:00:00','Imam','2019-07-17 00:00:00','2019-07-23 00:00:00',12,'kemala',12000.00,1,1,'-','wakhid nur','2019-07-24 18:35:14','Angga Prabowo','2019-08-01 22:22:04');

/*Table structure for table `mn_seminar_detail` */

DROP TABLE IF EXISTS `mn_seminar_detail`;

CREATE TABLE `mn_seminar_detail` (
  `code` varchar(100) NOT NULL DEFAULT '',
  `seminar_code` varchar(100) NOT NULL DEFAULT '',
  `profile_code` varchar(100) NOT NULL DEFAULT '',
  `pending_payment_date` datetime DEFAULT '1900-01-01 00:00:00',
  `payment_type` enum('Apps','Cash') DEFAULT 'Apps',
  `paid_amount` decimal(18,2) DEFAULT '0.00',
  `payment_amount` decimal(18,2) DEFAULT '0.00',
  `certificate` tinyint(1) DEFAULT '0',
  `presence` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) DEFAULT '',
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(100) DEFAULT '',
  `updated_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mn_seminar_detail` */

insert  into `mn_seminar_detail`(`code`,`seminar_code`,`profile_code`,`pending_payment_date`,`payment_type`,`paid_amount`,`payment_amount`,`certificate`,`presence`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('SMR/ORG-001-00001/PRFL-0002','SMR/ORG-001-00001','PRFL-0002','1970-01-01 00:00:00','Cash',12000.00,12000.00,1,1,'Imam Solikhin','2019-07-27 19:24:20','wakhid nur','2019-08-19 22:40:24');
insert  into `mn_seminar_detail`(`code`,`seminar_code`,`profile_code`,`pending_payment_date`,`payment_type`,`paid_amount`,`payment_amount`,`certificate`,`presence`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('SMR/ORG-001-00001/PRFL-0003','SMR/ORG-001-00001','PRFL-0003','1970-01-01 00:00:00','Cash',12000.00,12000.00,1,1,'Muhammad Amrizam','2019-08-19 22:15:02','wakhid nur','2019-08-19 22:40:25');

/*Table structure for table `mst_city` */

DROP TABLE IF EXISTS `mst_city`;

CREATE TABLE `mst_city` (
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` varchar(30) NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `update_by` varchar(30) NOT NULL DEFAULT '',
  `update_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mst_city` */

insert  into `mst_city`(`code`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values ('BKS','BEKASI',1,'','1900-01-01 00:00:00','','1900-01-01 00:00:00');
insert  into `mst_city`(`code`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values ('JKT','JAKARTA',1,'','1900-01-01 00:00:00','','1900-01-01 00:00:00');
insert  into `mst_city`(`code`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values ('TNG','TANGERANG',1,'','1900-01-01 00:00:00','','1900-01-01 00:00:00');

/*Table structure for table `mst_company` */

DROP TABLE IF EXISTS `mst_company`;

CREATE TABLE `mst_company` (
  `code` varchar(15) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `city_code` varchar(10) NOT NULL DEFAULT '',
  `phone1` varchar(20) NOT NULL DEFAULT '',
  `phone2` varchar(20) NOT NULL DEFAULT '',
  `fax` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `contact_person` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` varchar(30) NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `update_by` varchar(30) NOT NULL DEFAULT '',
  `update_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`),
  KEY `city_code` (`city_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mst_company` */

insert  into `mst_company`(`code`,`name`,`address`,`city_code`,`phone1`,`phone2`,`fax`,`email`,`contact_person`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values ('UEU/ORG','ORGANITATION','Jl Arjuna Selatan, Jakarta Barat','JKT','91283081203','19283091283','9808','jkt@gmail.com','Esa Unggul',1,'','2001-01-00 00:00:00','','2001-01-00 00:00:00');

/*Table structure for table `mst_management_organisasi` */

DROP TABLE IF EXISTS `mst_management_organisasi`;

CREATE TABLE `mst_management_organisasi` (
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` varchar(30) NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `update_by` varchar(30) NOT NULL DEFAULT '',
  `update_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mst_management_organisasi` */

insert  into `mst_management_organisasi`(`code`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values ('UEU/ORG-00','123',0,'','1900-01-01 00:00:00','','1900-01-01 00:00:00');

/*Table structure for table `mst_management_peserta` */

DROP TABLE IF EXISTS `mst_management_peserta`;

CREATE TABLE `mst_management_peserta` (
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` varchar(30) NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `update_by` varchar(30) NOT NULL DEFAULT '',
  `update_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mst_management_peserta` */

/*Table structure for table `mst_organisasi` */

DROP TABLE IF EXISTS `mst_organisasi`;

CREATE TABLE `mst_organisasi` (
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `type` enum('MEM','ORG') NOT NULL DEFAULT 'ORG',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(30) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(30) NOT NULL DEFAULT '',
  `updated_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mst_organisasi` */

insert  into `mst_organisasi`(`code`,`name`,`type`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ORG-000','peserta','MEM',1,'ADM','1900-01-01 00:00:00','','1900-01-01 00:00:00');
insert  into `mst_organisasi`(`code`,`name`,`type`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ORG-00001','alam','ORG',1,'Angga Prabowo','2019-08-01 23:31:01','','1900-01-01 00:00:00');
insert  into `mst_organisasi`(`code`,`name`,`type`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ORG-999','ADMIN','ORG',1,'ADM','1900-01-01 00:00:00','','1900-01-01 00:00:00');

/*Table structure for table `rsa` */

DROP TABLE IF EXISTS `rsa`;

CREATE TABLE `rsa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueUrl` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `senderEmail` varchar(255) NOT NULL,
  `recipientName` varchar(255) NOT NULL,
  `recipientEmail` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `modulo` int(11) NOT NULL,
  `publicKey` int(11) NOT NULL,
  `privateKey` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `burnType` tinyint(4) NOT NULL,
  `burnDate` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `rsa` */

/*Table structure for table `sys_menu` */

DROP TABLE IF EXISTS `sys_menu`;

CREATE TABLE `sys_menu` (
  `code` varchar(15) NOT NULL,
  `role_code` varchar(10) DEFAULT NULL,
  `sort_no` int(5) DEFAULT NULL,
  `menu_alias` varchar(15) DEFAULT NULL,
  `name_en` varchar(30) DEFAULT NULL,
  `name_id` varchar(30) DEFAULT NULL,
  `logo` varchar(25) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`code`),
  KEY `module_code` (`menu_alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_menu` */

insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-001','ROLE-002',1,'SMR','Seminar','Seminar','','src/menu/organisasi/Seminar',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-002','ROLE-002',2,'SMR_DET','Seminar_Detail','Pembayaran Seminar','','src/menu/organisasi/Seminar_Detail',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-003','ROLE-002',3,'SMR_ABS','Seminar_Absensi','Absensi Seminar','','src/menu/organisasi/Seminar_Absensi',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-004','ROLE-002',4,'SMR_CRT','Seminar_Certificate','Sertifikat Seminar','','src/menu/organisasi/Seminar_Certificate',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-005','ROLE-003',5,'SMR','Seminar','Seminar','','src/menu/peserta/Seminar',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-006','ROLE-001',4,'MST_ORG','Master Organisasi','Master Organisasi','','src/menu/admin/Master_Organisasi',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-007','ROLE-001',3,'MNG_USR','Management Peserta','Management Peserta','','src/menu/admin/Management_Peserta',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-008','ROLE-003',5,'RIWAYAT_SMR','Riwayat Seminar','Riwayat Seminar','','src/menu/peserta/Riwayat_Seminar',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-009','ROLE-003',5,'RIWAYAT_TRS','Riwayat Transaksi','Riwayat Transaksi','','src/menu/peserta/Riwayat_Transaksi',0);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-010','ROLE-001',5,'TOP_UP','Top Up','Top Up','','src/menu/admin/Top_Up',0);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-011','ROLE-001',5,'VERIFY_SEMINAR','Verification Seminar','Verification Seminar','','src/menu/admin/Verifikasi_Seminar',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-012','ROLE-001',5,'REFUND','Refund ORG','Refund ORG','','src/menu/admin/Refund_Organisasi',0);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-013','ROLE-003',5,'TOPUP','Top Up','Top Up','','Topup',1);
insert  into `sys_menu`(`code`,`role_code`,`sort_no`,`menu_alias`,`name_en`,`name_id`,`logo`,`url`,`status`) values ('MN-014','ROLE-001',3,'MNG_USR','Management Organization','Management Organization','','src/menu/admin/Management_Organization',1);

/*Table structure for table `sys_profile` */

DROP TABLE IF EXISTS `sys_profile`;

CREATE TABLE `sys_profile` (
  `code` varchar(15) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `organisasi_code` varchar(50) DEFAULT NULL,
  `saldo` text,
  `birthdate` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_wa` varchar(15) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text,
  `photo` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_profile` */

insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ORG-999-000-2',NULL,NULL,'ORG-000','0.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ORG-999-00001','asc',NULL,'ORG-00001','0.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('PRFL-0000','Angga','Prabowo','ORG-999','0.00','2005-04-19','angga@gmail.com','081808178118','081808178118',25,'Pria','Jakarta','',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('PRFL-0001','wakhid','nur','ORG-001','0.00','2005-04-19','wakhidnur1994@gmail.com','087871050323','087871050323',25,'Pria','Jakarta','',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('PRFL-0002','Imam','Solikhin','ORG-000','55314901@31478568 2151358@49680759',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_profile`(`code`,`first_name`,`last_name`,`organisasi_code`,`saldo`,`birthdate`,`email`,`phone`,`phone_wa`,`age`,`gender`,`address`,`photo`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('PRFL-0003','Muhammad','Amrizam','ORG-000','0.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');

/*Table structure for table `sys_role` */

DROP TABLE IF EXISTS `sys_role`;

CREATE TABLE `sys_role` (
  `code` varchar(15) NOT NULL,
  `name_en` varchar(25) DEFAULT NULL,
  `name_id` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_role` */

insert  into `sys_role`(`code`,`name_en`,`name_id`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ROLE-001','ADMIN','ADMIN',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_role`(`code`,`name_en`,`name_id`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ROLE-002','ORGANIZATION','ORGANISASI',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_role`(`code`,`name_en`,`name_id`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('ROLE-003','MEMBER','PESERTA',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');

/*Table structure for table `sys_setup` */

DROP TABLE IF EXISTS `sys_setup`;

CREATE TABLE `sys_setup` (
  `code` varchar(5) NOT NULL DEFAULT 'DEVJR',
  `company_code` varchar(15) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `upload` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `document` varchar(50) DEFAULT NULL,
  `ppn` varchar(50) DEFAULT NULL,
  `pph` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `company_code` (`company_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_setup` */

/*Table structure for table `sys_transaction_log` */

DROP TABLE IF EXISTS `sys_transaction_log`;

CREATE TABLE `sys_transaction_log` (
  `code` varchar(250) NOT NULL,
  `menu_alias` varchar(100) DEFAULT NULL,
  `transaction_code` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `profile_code` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_transaction_log` */

insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0000-001','MST_ORG',NULL,'UPDATE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:29:54');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0000-002','MST_ORG',NULL,'UPDATE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:35:19');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-001','SMR_DET',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:11');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-002','SMR_DET',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:13');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-003','SMR_ABS',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:19');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-004','SMR_ABS',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:20');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-005','SMR_CRT',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:24');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG//PRFL-0001-006','SMR_CRT',NULL,'UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-08-19 22:40:25');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/ORG-00001/PRFL-0000-001','MST_ORG','ORG-00001','INSERT_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:31:01');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/ORG-001/PRFL-0000-001','MST_ORG','ORG-001','UPDATE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:36:15');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/ORG-001/PRFL-0000-002','MST_ORG','ORG-001','DELETE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-19 22:32:19');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/ORG-1000/PRFL-0000-001','MST_ORG','ORG-1000','INSERT_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:31:27');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/ORG-1000/PRFL-0000-002','MST_ORG','ORG-1000','DELETE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 23:33:57');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/SMR/ORG-001-00001/PRFL-0000-001','SMR_VRF','SMR/ORG-001-00001','UPDATE_DATA','PRFL-0000','Berhasil','Angga Prabowo','2019-08-01 22:22:04');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/SMR/ORG-001-00001/PRFL-0001-001','SMR','SMR/ORG-001-00001','UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-07-27 19:50:56');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/SMR/ORG-001-00001/PRFL-0001-002','SMR','SMR/ORG-001-00001','UPDATE_DATA','PRFL-0001','Berhasil','wakhid nur','2019-07-27 19:51:02');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/SMR/ORG-001-00001/PRFL-0002/PRFL-0002-001','SMR_DET','SMR/ORG-001-00001/PRFL-0002','INSERT_DATA','PRFL-0002','Berhasil','Imam Solikhin','2019-07-27 19:24:20');
insert  into `sys_transaction_log`(`code`,`menu_alias`,`transaction_code`,`action`,`profile_code`,`description`,`created_by`,`created_date`) values ('LOG/SMR/ORG-001-00001/PRFL-0003/PRFL-0003-001','SMR_DET','SMR/ORG-001-00001/PRFL-0003','INSERT_DATA','PRFL-0003','Berhasil','Muhammad Amrizam','2019-08-19 22:15:02');

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `code` varchar(30) NOT NULL,
  `profile_code` varchar(15) DEFAULT NULL,
  `role_code` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT '1900-01-01 00:00:00',
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT '1900-01-01 00:00:00',
  PRIMARY KEY (`code`),
  KEY `company_code` (`profile_code`),
  KEY `role_code` (`role_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_user` */

insert  into `sys_user`(`code`,`profile_code`,`role_code`,`username`,`password`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('UEU/USR/PRFL-0000','PRFL-0000','ROLE-001','admin','21232f297a57a5a743894a0e4a801fc3',1,'S_ADMIN','1900-01-01 00:00:00','','1900-01-01 00:00:00');
insert  into `sys_user`(`code`,`profile_code`,`role_code`,`username`,`password`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('UEU/USR/PRFL-0001','PRFL-0001','ROLE-002','wakhid1234','21232f297a57a5a743894a0e4a801fc3',1,'S_ADMIN','1900-01-01 00:00:00','','1900-01-01 00:00:00');
insert  into `sys_user`(`code`,`profile_code`,`role_code`,`username`,`password`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('UEU/USR/PRFL-0002','PRFL-0002','ROLE-003','201481039','21232f297a57a5a743894a0e4a801fc3',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');
insert  into `sys_user`(`code`,`profile_code`,`role_code`,`username`,`password`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values ('UEU/USR/PRFL-0003','PRFL-0003','ROLE-003','20160801119','21232f297a57a5a743894a0e4a801fc3',1,NULL,'1900-01-01 00:00:00',NULL,'1900-01-01 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
