/*
SQLyog Community v12.18 (64 bit)
MySQL - 5.6.21 : Database - proyecto_bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto_bd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `proyecto_bd`;

/*Table structure for table `ages` */

DROP TABLE IF EXISTS `ages`;

CREATE TABLE `ages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `min_age` tinyint(3) unsigned NOT NULL,
  `max_age` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ages` */

insert  into `ages`(`id`,`min_age`,`max_age`,`name`) values
(1,15,17,'Cadete'),
(2,18,19,'Junior'),
(3,20,23,'Sub 23'),
(4,24,39,'Absoluto'),
(5,40,49,'Veterano 1'),
(6,50,59,'Veterano 2'),
(7,60,255,'Veterano 3');

/*Table structure for table `athletes` */

DROP TABLE IF EXISTS `athletes`;

CREATE TABLE `athletes`
(
  `id` Int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` Varchar(100) NOT NULL,
  `sex` Enum('F','M') NOT NULL,
  `date_of_birth` Date NOT NULL,
  `CI` Int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `athletes` ADD UNIQUE `CI` (`CI`)
;

/*Data for the table `athletes` */

insert  into `athletes`(`CI`,`name`,`sex`,`date_of_birth`) values
(111111,'N','M','1965-02-02'),
(6508327,'José','M','1965-08-23'),
(8532691,'Engracia','F','1962-06-12'),
(12345678,'Sara','F','1970-03-12'),
(22824486,'Daniel','M','1994-05-13'),
(24035930,'Rusben','M','1995-09-24'),
(24411211,'Jesús','M','1995-01-04'),
(24560595,'Libny','F','1995-08-18'),
(26138934,'Zuri','F','1997-05-30');

/*Table structure for table `athletes_teams` */

DROP TABLE IF EXISTS `athletes_teams`;

CREATE TABLE `athletes_teams` (
  `athlete_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`athlete_id`,`team_id`),
  KEY `Relationship25` (`team_id`),
  CONSTRAINT `Relationship24` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Relationship25` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `athletes_teams` */

insert  into `athletes_teams`(`athlete_id`,`team_id`) values
(6,1),
(7,1),
(1,2),
(2,2);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sex` enum('M','F') DEFAULT NULL,
  `age_id` int(10) unsigned DEFAULT NULL,
  `distance_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IX_Relationship37` (`age_id`),
  KEY `IX_Relationship38` (`distance_id`),
  CONSTRAINT `Relationship37` FOREIGN KEY (`age_id`) REFERENCES `ages` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `Relationship38` FOREIGN KEY (`distance_id`) REFERENCES `distances` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`sex`,`age_id`,`distance_id`) values
(1,'F',NULL,1),
(2,'F',NULL,2),
(3,'F',NULL,3),
(4,'F',NULL,4),
(5,'F',NULL,5),
(6,'F',NULL,6),
(7,'F',NULL,7),
(8,'F',NULL,8),
(9,'F',NULL,9),
(10,'F',NULL,10),
(11,'M',NULL,1),
(12,'M',NULL,2),
(13,'M',NULL,3),
(14,'M',NULL,4),
(15,'M',NULL,5),
(16,'M',NULL,6),
(17,'M',NULL,7),
(18,'M',NULL,8),
(19,'M',NULL,9),
(20,'M',NULL,10),
(21,NULL,1,1),
(22,NULL,1,2),
(23,NULL,1,3),
(24,NULL,1,4),
(25,NULL,1,5),
(26,NULL,1,6),
(27,NULL,1,7),
(28,NULL,1,8),
(29,NULL,1,9),
(30,NULL,1,10),
(31,NULL,2,1),
(32,NULL,2,2),
(33,NULL,2,3),
(34,NULL,2,4),
(35,NULL,2,5),
(36,NULL,2,6),
(37,NULL,2,7),
(38,NULL,2,8),
(39,NULL,2,9),
(40,NULL,2,10),
(41,NULL,3,1),
(42,NULL,3,2),
(43,NULL,3,3),
(44,NULL,3,4),
(45,NULL,3,5),
(46,NULL,3,6),
(47,NULL,3,7),
(48,NULL,3,8),
(49,NULL,3,9),
(50,NULL,3,10),
(51,NULL,4,1),
(52,NULL,4,2),
(53,NULL,4,3),
(54,NULL,4,4),
(55,NULL,4,5),
(56,NULL,4,6),
(57,NULL,4,8),
(58,NULL,4,7),
(59,NULL,4,9),
(60,NULL,4,10),
(61,NULL,5,1),
(62,NULL,5,2),
(63,NULL,5,3),
(64,NULL,5,4),
(65,NULL,5,5),
(66,NULL,5,6),
(67,NULL,5,7),
(68,NULL,5,8),
(69,NULL,5,9),
(70,NULL,5,10),
(71,NULL,6,1),
(72,NULL,6,2),
(73,NULL,6,3),
(74,NULL,6,4),
(75,NULL,6,5),
(76,NULL,6,6),
(77,NULL,6,7),
(78,NULL,6,8),
(79,NULL,6,9),
(80,NULL,6,10),
(81,NULL,7,1),
(82,NULL,7,2),
(83,NULL,7,3),
(84,NULL,7,4),
(85,NULL,7,5),
(86,NULL,7,6),
(87,NULL,7,7),
(88,NULL,7,8),
(89,NULL,7,9),
(90,NULL,7,10);

/*Table structure for table `categories_events_modes` */

DROP TABLE IF EXISTS `categories_events_modes`;

CREATE TABLE `categories_events_modes` (
  `mode_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `hour` time NOT NULL,
  PRIMARY KEY (`mode_id`,`category_id`,`event_id`),
  KEY `Posee` (`category_id`),
  KEY `Evento_Modalidad_Categoria` (`event_id`),
  CONSTRAINT `Evento_Modalidad_Categoria` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Posee` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `Tiene` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `categories_events_modes` */

insert  into `categories_events_modes`(`mode_id`,`category_id`,`event_id`,`hour`) values
(1,8,1,'00:00:00'),
(1,8,2,'00:12:02'),
(7,6,2,'00:12:02'),
(7,13,1,'00:12:01');

/*Table structure for table `clubs` */

DROP TABLE IF EXISTS `clubs`;

CREATE TABLE `clubs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `clubs` */

insert  into `clubs`(`id`,`name`) values
(1,'Club A'),
(2,'Club B'),
(3,'Club C'),
(4,'Club D');

/*Table structure for table `disciplines` */

DROP TABLE IF EXISTS `disciplines`;

CREATE TABLE `disciplines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Atletismo','Ciclismo','Natación') NOT NULL,
  `sub_type` enum('Carrera','Caminata','De ruta','Asfalto','Montaña','Piscina','Aguas abiertas') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `disciplines` */

insert  into `disciplines`(`id`,`type`,`sub_type`) values
(1,'Atletismo','Caminata'),
(2,'Atletismo','Carrera'),
(3,'Ciclismo','Asfalto'),
(4,'Ciclismo','De ruta'),
(5,'Ciclismo','Montaña'),
(6,'Natación','Aguas abiertas'),
(7,'Natación','Piscina');

/*Table structure for table `disciplines_modes` */

DROP TABLE IF EXISTS `disciplines_modes`;

CREATE TABLE `disciplines_modes` (
  `discipline_id` int(10) unsigned NOT NULL,
  `mode_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`discipline_id`,`mode_id`),
  KEY `Relationship15` (`mode_id`),
  CONSTRAINT `Relationship14` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `Relationship15` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `disciplines_modes` */

insert  into `disciplines_modes`(`discipline_id`,`mode_id`) values
(2,1),
(3,1),
(1,2),
(4,2),
(6,2),
(2,3),
(4,3),
(5,3),
(7,3),
(1,4),
(7,4),
(5,5),
(6,5),
(2,6),
(3,6),
(1,7),
(4,7),
(6,7),
(2,8),
(4,8),
(5,8),
(7,8),
(1,9),
(7,9),
(5,10),
(6,10);

/*Table structure for table `distances` */

DROP TABLE IF EXISTS `distances`;

CREATE TABLE `distances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `distance_1` mediumint(9) NOT NULL,
  `distance_2` mediumint(9) NOT NULL,
  `distance_3` mediumint(9) NOT NULL,
  `distance_4` mediumint(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `distances` */

insert  into `distances`(`id`,`distance_1`,`distance_2`,`distance_3`,`distance_4`,`name`) values
(1,750,20000,5000,0,'Sprint Triatlón'),
(2,1500,40000,10000,0,'Larga Triatlón'),
(3,2500,10000,10000,50000,'Corta Tetratlón'),
(4,5000,2000,20000,100000,'Larga Tetratlón'),
(5,2500,1000,0,0,'Corta Acuatlón'),
(6,5000,2000,0,0,'Larga Acuatlón'),
(7,10000,40000,5000,0,'Corta Duatlón'),
(8,14000,60000,7000,0,'Larga Duatlón'),
(9,400000,1500,0,0,'Corta Aquabike'),
(10,45000,2000,0,0,'Larga Aquabike');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`name`,`date`) values
(1,'Evento 1','2016-01-07'),
(2,'Evento 2','2016-02-03'),
(3,'Evento 3','2016-01-19'),
(4,'Evento 4','2016-02-17'),
(5,'Duatlon UCab','0000-00-00');

/*Table structure for table `individual_participations` */

DROP TABLE IF EXISTS `individual_participations`;

CREATE TABLE `individual_participations` (
  `position` smallint(5) unsigned DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(10) unsigned NOT NULL,
  `mode_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `composed_unique_2` (`event_id`,`athlete_id`,`mode_id`,`category_id`),
  KEY `IX_Relationship26` (`athlete_id`),
  KEY `IX_Relationship27` (`mode_id`,`category_id`,`event_id`),
  CONSTRAINT `Relationship26` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Relationship27` FOREIGN KEY (`mode_id`, `category_id`, `event_id`) REFERENCES `categories_events_modes` (`mode_id`, `category_id`, `event_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `individual_participations` */

insert  into `individual_participations`(`position`,`id`,`athlete_id`,`mode_id`,`category_id`,`event_id`) values
(2,1,8,1,8,2),
(3,2,5,1,8,2),
(1,3,9,1,8,2),
(NULL,4,4,1,8,1);

/*Table structure for table `modes` */

DROP TABLE IF EXISTS `modes`;

CREATE TABLE `modes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `number_of_disciplines` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `modes` */

insert  into `modes`(`id`,`type`,`number_of_disciplines`) values
(1,'Duatlón',2),
(2,'Triatlón',3),
(3,'Tetratlón',4),
(4,'Acuatlón',2),
(5,'Aquabike',2),
(6,'Duatlón-Equipo',2),
(7,'Triatlón-Equipo',3),
(8,'Tetratlón-Equipo',4),
(9,'Acuatlón-Equipo',2),
(10,'Aquabike-Equipo',2);

/*Table structure for table `team_participations` */

DROP TABLE IF EXISTS `team_participations`;

CREATE TABLE `team_participations` (
  `position` smallint(5) unsigned DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `mode_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `composed_unique_1` (`event_id`,`team_id`,`mode_id`,`category_id`),
  KEY `IX_Relationship28` (`team_id`),
  KEY `IX_Relationship29` (`mode_id`,`category_id`,`event_id`),
  CONSTRAINT `Relationship28` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Relationship29` FOREIGN KEY (`mode_id`, `category_id`, `event_id`) REFERENCES `categories_events_modes` (`mode_id`, `category_id`, `event_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `team_participations` */

insert  into `team_participations`(`position`,`id`,`team_id`,`mode_id`,`category_id`,`event_id`) values
(NULL,1,1,7,13,1),
(NULL,2,2,7,13,1),
(NULL,6,2,7,6,2);

/*Table structure for table `teams` */

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `club_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IX_Relationship17` (`club_id`),
  KEY `IX_Relationship39` (`category_id`),
  CONSTRAINT `Relationship17` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Relationship39` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `teams` */

insert  into `teams`(`id`,`name`,`club_id`,`category_id`) values
(1,'Equipo 1',2,13),
(2,'Equipo 3',3,8),
(3,'Equipo 2',1,13),
(4,'Equipo 4',4,3);

/*Table structure for table `times` */

DROP TABLE IF EXISTS `times`;

CREATE TABLE `times` (
  `time_1` time(2) DEFAULT NULL,
  `time_2` time(2) DEFAULT NULL,
  `time_3` time(2) DEFAULT NULL,
  `time_4` time(2) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `individual_participation_id` int(10) unsigned DEFAULT NULL,
  `team_participation_id` int(10) unsigned DEFAULT NULL,
  `time_total` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IX_Relationship33` (`individual_participation_id`),
  KEY `IX_Relationship35` (`team_participation_id`),
  CONSTRAINT `Relationship33` FOREIGN KEY (`individual_participation_id`) REFERENCES `individual_participations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Relationship35` FOREIGN KEY (`team_participation_id`) REFERENCES `team_participations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `times` */

insert  into `times`(`time_1`,`time_2`,`time_3`,`time_4`,`id`,`individual_participation_id`,`team_participation_id`,`time_total`) values
('01:25:00.00','01:13:54.00',NULL,NULL,1,1,NULL,'02:38:54'),
('01:31:01.00','01:13:49.00',NULL,NULL,2,2,NULL,'02:44:50'),
('01:23:58.00','01:22:32.00',NULL,NULL,3,3,NULL,'02:20:00'),
('00:00:10.00','00:00:11.00','00:00:12.00',NULL,4,NULL,1,'00:00:33'),
('00:00:12.00','00:00:13.00','00:00:09.00',NULL,5,NULL,2,'00:00:34'),
(NULL,NULL,NULL,NULL,6,4,NULL,'00:00:02');

/*Table structure for table `winners` */

DROP TABLE IF EXISTS `winners`;

CREATE TABLE `winners` (
  `gold_id` Int UNSIGNED,
  `silver_id` Int,
  `bronze_id` Int,
  `mode_id` Int UNSIGNED NOT NULL,
  `category_id` Int UNSIGNED NOT NULL,
  `event_id` Int UNSIGNED NOT NULL,
  CONSTRAINT `Relationship40` FOREIGN KEY (`mode_id`, `category_id`, `event_id`) REFERENCES `categories_events_modes` (`mode_id`, `category_id`, `event_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

ALTER TABLE `winners` ADD  PRIMARY KEY (`mode_id`,`category_id`,`event_id`)
;

/*Data for the table `winners` */

insert  into `winners`(`gold_id`,`silver_id`,`bronze_id`,`mode_id`,`category_id`,`event_id`) values
(1,2,3,1,8,2);

/* Trigger structure for table `athletes_teams` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_team_member` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_team_member` BEFORE INSERT ON `athletes_teams` FOR EACH ROW BEGIN

    DECLARE category_sex CHAR;
    DECLARE sex CHAR;
    DECLARE min_age TINYINT;
    DECLARE max_age TINYINT;
    DECLARE athlete_age TINYINT;
    DECLARE team_category INT;

    DECLARE ammount TINYINT DEFAULT 0;

    SELECT T.category_id INTO team_category
    FROM teams T
    WHERE T.id = NEW.team_id;

    IF (team_category < 21) THEN

        SELECT C.sex INTO category_sex
        FROM categories C, teams T
        WHERE T.id = NEW.team_id AND
              C.id = T.category_id;

        SELECT A.sex INTO sex
        FROM athletes A
        WHERE A.id = NEW.athlete_id;

        IF (sex != category_sex) THEN
            SET NEW.athlete_id = NULL;
            SET NEW.team_id = NULL;
        END IF;

    ELSE

        SELECT A.min_age, A.max_age
        INTO min_age, max_age
        FROM ages A, categories C
        WHERE T.id = NEW.team_id AND
              C.id = T.category_id AND
              A.id = C.age_id;

        SELECT age(NEW.athlete_id) INTO athlete_age;

        IF ((athlete_age < min_age) OR (athlete_age > max_age)) THEN
            SET NEW.athlete_id = NULL;
            SET NEW.team_id = NULL;
        END IF;
    end if;


    SELECT COUNT(*) INTO ammount
    FROM athletes_teams ATeams
    WHERE ATeams.team_id = NEW.team_id
    GROUP BY (ATeams.team_id);

    IF ( ammount >= 4) THEN
        SET NEW.team_id = NULL;
        SET NEW.athlete_id = NULL;
    END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `categories_events_modes` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_insert_winners_row` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_insert_winners_row` AFTER INSERT ON `categories_events_modes` FOR EACH ROW BEGIN
    INSERT INTO `proyecto_bd`.`winners` (
      `gold_id`,
      `silver_id`,
      `bronze_id`,
      `mode_id`,
      `category_id`,
      `event_id`
    )
    VALUES
      (
        NULL,
        NULL,
        NULL,
        mode_id,
        category_id,
        event_id
      ) ;
    END */$$


DELIMITER ;

/* Trigger structure for table `individual_participations` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_athlete_participation_category` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_athlete_participation_category` BEFORE INSERT ON `individual_participations` FOR EACH ROW BEGIN
    DECLARE category_sex CHAR;
    DECLARE sex CHAR;
    DECLARE min_age TINYINT;
    DECLARE max_age TINYINT;
    DECLARE athlete_age TINYINT;

    IF (new.category_id < 21) THEN
        SELECT C.sex INTO category_sex
        FROM categories C
        WHERE C.id = NEW.category_id;

        SELECT A.sex INTO sex
        FROM athletes A
        WHERE A.id = NEW.athlete_id;

        IF (sex != category_sex) THEN
            SET NEW.id = NULL;
        END IF;

    ELSE

        SELECT A.min_age, A.max_age
        INTO min_age, max_age
        FROM ages A, categories C
        WHERE C.id = NEW.category_id AND
              A.id = C.age_id;

        SELECT age(NEW.athlete_id) INTO athlete_age;

        IF ((athlete_age < min_age) OR (athlete_age > max_age)) THEN
            SET NEW.id = NULL;
        END IF;

    END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `individual_participations` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_individual_participation_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_individual_participation_update` AFTER UPDATE ON `individual_participations` FOR EACH ROW BEGIN

    IF ( OLD.position = NULL) THEN
        IF ( NEW.position = 1 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `gold_id` = NEW.athlete_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;

        ELSEIF ( NEW.position = 2 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `silver_id` = NEW.athlete_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;

        ELSEIF ( NEW.position = 3 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `bronze_id` = NEW.athlete_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;
        END IF;
    END IF;

    END */$$


DELIMITER ;

/* Trigger structure for table `team_participations` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_team_participation_category` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_team_participation_category` BEFORE INSERT ON `team_participations` FOR EACH ROW BEGIN
    DECLARE team_cat SMALLINT;

    SELECT T.category_id INTO team_cat
    FROM teams T
    WHERE T.id = NEW.team_id;

    IF (team_cat != NEW.team_id) THEN
        SET NEW.id = NULL;
    END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `team_participations` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_team_participation_after_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_team_participation_after_update` AFTER UPDATE ON `team_participations` FOR EACH ROW BEGIN

    IF ( OLD.position = NULL) THEN
        IF ( NEW.position = 1 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `gold_id` = NEW.team_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;

        ELSEIF ( NEW.position = 2 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `silver_id` = NEW.team_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;

        ELSEIF ( NEW.position = 3 ) THEN

            UPDATE
              `proyecto_bd`.`winners`
            SET
              `bronze_id` = NEW.team_id
            WHERE `mode_id` = NEW.mode_id
              AND `category_id` = NEW.category_id
              AND `event_id` = NEW.event_id ;

        END IF;
    END IF;

    END */$$


DELIMITER ;

/* Function  structure for function  `age` */

/*!50003 DROP FUNCTION IF EXISTS `age` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `age`(id INT) RETURNS tinyint(4)
BEGIN

    DECLARE age TINYINT;
    DECLARE birthdate DATE;

    SELECT TRUNCATE( (DATEDIFF( CURDATE(), A.date_of_birth ) / 365) , 0) INTO age
    FROM athletes A
    WHERE A.id = id;

    RETURN age;

    END */$$
DELIMITER ;

/* Function  structure for function  `best_time` */

/*!50003 DROP FUNCTION IF EXISTS `best_time` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `best_time`(mode_id INT, event_id INT) RETURNS int(11)
BEGIN
    DECLARE btime_id INT;

    IF ((mode_id > 0) && (mode_id < 6)) THEN
        SELECT I.athlete_id INTO btime_id
        FROM individual_participations I, times T
        WHERE I.id = T.individual_participation_id AND
              I.event_id = event_id AND
              T.individual_participation_id IS NOT NULL AND
              T.time_total IN (SELECT MIN(T.time_total)
                       FROM individual_participations I, times T
                       WHERE I.id = T.individual_participation_id AND
                         I.event_id = event_id AND
                         T.individual_participation_id IS NOT NULL);

    ELSEIF ((mode_id > 5) && (mode_id < 11)) THEN
        SELECT Te.team_id INTO btime_id
        FROM team_participations Te, times T
        WHERE Te.id = T.team_participation_id AND
              Te.event_id = event_id AND
              T.team_participation_id IS NOT NULL AND
              T.time_total IN (SELECT MIN(T.time_total)
                       FROM team_participations Te, times T
                       WHERE Te.id = T.team_participation_id AND
                         Te.event_id = event_id AND
                         T.team_participation_id IS NOT NULL);
    END IF;

    RETURN btime_id;

    END */$$
DELIMITER ;

/* Procedure structure for procedure `assign_position` */

/*!50003 DROP PROCEDURE IF EXISTS  `assign_position` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `assign_position`(mode_id INT, cat_id INT, event_id INT)
BEGIN

    DECLARE done INT DEFAULT FALSE;
    DECLARE id INT;
    DECLARE i INT DEFAULT 1;

    DECLARE curI CURSOR FOR SELECT T.individual_participation_id
        FROM times T, individual_participations IP
        WHERE T.individual_participation_id = IP.id AND
              IP.mode_id = mode_id AND
              IP.category_id = cat_id AND
              IP.event_id = event_id
        ORDER BY T.time_total asc;

    DECLARE curT CURSOR FOR SELECT T.team_participation_id
        FROM times T, team_participations TP
        WHERE T.team_id = TP.id AND
              TP.mode_id = mode_id AND
              TP.category_id = cat_id AND
              TP.event_id = event_id
        ORDER BY T.time_total asc;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    IF ( (mode_id > 0) && (mode_id < 6) ) THEN

        OPEN curI;
        read_loop: LOOP

        FETCH curI INTO id;
        IF done THEN
            LEAVE read_loop;
        END IF;

        UPDATE individual_participations IP
        SET IP.position = i
        WHERE IP.id = id;

        SET i = i + 1;

        END LOOP;
        CLOSE curI;

    ELSEIF ( (mode_id > 5) && (mode_id < 11) ) THEN

        OPEN curT;
        read_loop_team: LOOP

        FETCH curT INTO id;
        IF done THEN
            LEAVE read_loop_team;
        END IF;

        UPDATE team_participations TP
        SET TP.position = i
        WHERE TP.id = id;

        SET i = i + 1;

        END LOOP;
        CLOSE curT;

    END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `test_fill` */

/*!50003 DROP PROCEDURE IF EXISTS  `test_fill` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `test_fill`()
BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE j INT DEFAULT 1;
    DECLARE k INT DEFAULT 1;

    WHILE ( i < 11) DO

        WHILE ( j < 91) DO

            WHILE ( k < 5) DO

                INSERT INTO `proyecto_bd`.`categories_events_modes` (
                  `mode_id`,
                  `category_id`,
                  `event_id`,
                  `hour`
                )
                VALUES
                  (
                    i,
                    j,
                    k,
                    1200 + k
                  ) ;

                SET k = k + 1;
            END WHILE;

            set k = 1;
            SET j = j + 1;
        END WHILE;

        set j = 1;
        SET i = i + 1;
    END WHILE;

    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
