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