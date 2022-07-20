/**
 * myX DB schema
 * @author Joaquin Javier ESTEBAN MARTINEZ <jesteban1972@me.com>
 * last update: 2022-07-09
 */

CREATE DATABASE myX
    DEFAULT CHARACTER SET 'utf8'
    DEFAULT COLLATE 'utf8_general_ci';

/* table 'users' */
CREATE TABLE `myX`.`users` (
   `id` INTEGER NOT NULL,
   `username` VARCHAR(255) NOT NULL,
   `password` VARCHAR(255) NOT NULL,
   `email` VARCHAR(255) NOT NULL,
   `birthdate` DATE NOT NULL,
   `defaultGenre` INTEGER,
   `description1` VARCHAR(255),
   `description2` VARCHAR(255),
   `description3` VARCHAR(255),
   `description4` VARCHAR(255),
   `guiLanguage` INTEGER DEFAULT 1,
   `resultsPerPage` INTEGER DEFAULT 25,
   `listsOrder` INTEGER DEFAULT 1,
   `userKind` INTEGER DEFAULT 2,
   CONSTRAINT users_pk PRIMARY KEY (id)
) ENGINE = InnoDB;

/* table 'usersLoggedIn' */
CREATE TABLE `myX`.`usersLoggedIn` (
    `sessionID` VARCHAR(100) NOT NULL,
    `user` INTEGER NOT NULL,
    `lastUpdate` DATETIME NOT NULL,
    CONSTRAINT usersLoggedIn_pk PRIMARY KEY (sessionID),
    CONSTRAINT usersLoggedIn_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

/* table 'countries' */
CREATE TABLE `myX`.`countries` (
    `id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `user` INTEGER NOT NULL,
    CONSTRAINT countries_pk PRIMARY KEY (id),
    CONSTRAINT countries_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* table 'kinds' */
CREATE TABLE `myX`.`kinds` (
    `id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `user` INTEGER NOT NULL,
    CONSTRAINT kinds_pk PRIMARY KEY (id),
    CONSTRAINT kinds_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* table 'loca' */
CREATE TABLE `myX`.`loca` (
    `id` INTEGER NOT NULL,
    `achtung` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `rating` INTEGER,
    `favorite` INTEGER,
    `address` VARCHAR(510),
    `country` INTEGER,
    `kind` INTEGER,
    `description` MEDIUMTEXT,
    `coordinatesdExact` VARCHAR(255),
    `coordjnatesGeneric` VARCHAR(255),
    `web` VARCHAR(255),
    `user` INTEGER NOT NULL,
    INDEX (name),
    CONSTRAINT loca_pk PRIMARY KEY (id),
    CONSTRAINT loca_country_fk FOREIGN KEY (country) REFERENCES `myX`.`countries` (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT loca_kind_fk FOREIGN KEY (kind) REFERENCES `myX`.`kinds` (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT loca_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
/* CHECK constraint not implemented in mySQL, using a trigger instead*/
DELIMITER //
CREATE TRIGGER `myX`.`loca_rating_ck`
    BEFORE INSERT ON `myX`.`loca` FOR EACH ROW
BEGIN
    IF NEW.rating < 0 OR NEW.rating > 5 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Cannot add or update row: values not in range';
    END IF;
END;
// DELIMITER ;

/* table 'practica' */
CREATE TABLE `myX`.`practica` (
    `id` INTEGER NOT NULL,
    `achtung` VARCHAR(765),
    `name` VARCHAR(255) NOT NULL,
    `rating` INTEGER,
    `favorite` INTEGER,
    `locus` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    `ordinal` VARCHAR(1),
    `description` MEDIUMTEXT,
    `tq` INTEGER,
    `tl` INTEGER,
    `user` INTEGER NOT NULL,
    INDEX (date, ordinal),
    CONSTRAINT practica_pk PRIMARY KEY (id),
    CONSTRAINT practica_locus_fk FOREIGN KEY (locus) REFERENCES `myX`.`loca` (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT practica_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
/* CHECK constraint not implemented in mySQL, using a trigger instead*/
DELIMITER //
CREATE TRIGGER `myX`.`practica_rating_ck`
    BEFORE INSERT ON `myX`.`practica` FOR EACH ROW
BEGIN
    IF NEW.rating < 0 OR NEW.rating > 5 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Cannot add or update row: values not in range';
    END IF;
END;
// DELIMITER ;

/* table 'amores' */
CREATE TABLE `myX`.`amores` (
    `id` INTEGER NOT NULL,
    `achtung` VARCHAR(255),
    `alias` VARCHAR(255) NOT NULL,
    `rating` INTEGER,
    `favorite` INTEGER,
    `genre` INTEGER,
    `description1` VARCHAR(510),
    `description2` VARCHAR(510),
    `description3` VARCHAR(510),
    `description4` VARCHAR(510),
    `web` VARCHAR(255),
    `name` VARCHAR(255),
    `photo` INTEGER,
    `phone` VARCHAR(255),
    `email` VARCHAR(255),
    `other` VARCHAR(255),
    `user` INTEGER NOT NULL,
    INDEX (alias),
    CONSTRAINT amores_pk PRIMARY KEY (id),
    CONSTRAINT amores_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
/* CHECK constraint not implemented in mySQL, using a trigger instead*/
DELIMITER //
CREATE TRIGGER `myX`.`amores_rating_ck`
    BEFORE INSERT ON `myX`.`amores` FOR EACH ROW
BEGIN
    IF NEW.rating < 0 OR NEW.rating > 5 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Cannot add or update row: values not in range';
    END IF;
END;
// DELIMITER ;

/* table 'assignations' */
CREATE TABLE `myX`.`assignations` (
    `id` INTEGER NOT NULL,
    `praxis` INTEGER NOT NULL,
    `amor` INTEGER NOT NULL,
    `user` INTEGER NOT NULL,
    CONSTRAINT assignations_pk PRIMARY KEY (id),
    CONSTRAINT assignations_praxis_fk FOREIGN KEY (praxis) REFERENCES `myX`.`practica` (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT assignations_amor_fk FOREIGN KEY (amor) REFERENCES `myX`.`amores` (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT assignations_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

/* table 'queries' */
CREATE TABLE `myX`.`queries` (
    `id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `descr` VARCHAR(510) NOT NULL,
    `queryString` VARCHAR(510),
    `user` INTEGER NOT NULL,
    CONSTRAINT queries_pk PRIMARY KEY (id),
    CONSTRAINT queries_user_fk FOREIGN KEY (user) REFERENCES `myX`.`users` (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;