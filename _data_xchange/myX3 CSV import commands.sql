/**
 * myX (v.3) CSV import commands
 */

/**
 * countries
 */
LOAD DATA INFILE '/Users/jesteban1972/Sites/myX3/dump_files/2021-11-05-countries.csv'
INTO TABLE `myX`.`countries`
CHARACTER SET 'UTF8MB4'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(id, name, user_id);

/**
 * kinds
 */
LOAD DATA INFILE '/Users/jesteban1972/Sites/myX3/dump_files/2020-03-10-kinds.csv'
INTO TABLE `myX`.`kinds`
CHARACTER SET 'UTF8MB4'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(id, name, user_id);