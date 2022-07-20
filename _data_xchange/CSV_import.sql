LOAD DATA INFILE '/tmp/2020-03-10-kinds.csv'
    INTO TABLE `myX`.`kinds`
    CHARACTER SET 'UTF8MB4'
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    (id, name, user_id)
;

LOAD DATA INFILE '/tmp/2021-11-05-countries.csv'
    INTO TABLE `myX`.`countries`
    CHARACTER SET 'UTF8MB4'
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    (id, name, user_id)
;

LOAD DATA INFILE '/tmp/2022-07-01-loca.csv'
    INTO TABLE `myX`.`loca`
    CHARACTER SET 'UTF8MB4'
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    (id, @achtung, name, @rating, @is_favorite, @address, country_id, kind_id, @description, @coordinates_exact, @coordinates_generic, @web, user)
    SET
        achtung = IF(@achtung = '', NULL, @achtung),
        rating = IF(@rating = '', 0, @rating),
        is_favorite = IF(@is_favorite = '', NULL, @is_favorite),
        address = IF(@address = '', NULL, @address),
        description = IF(@description = '', NULL, @description),
        coordinates_exact = IF(@coordinates_exact = '', NULL, @coordinates_exact),
        coordinates_generic = IF(@coordinates_generic = '', NULL, @coordinates_generic),
        web = IF (@web = '', NULL, @web)
;

LOAD DATA INFILE '/tmp/2022-07-01-practica.csv'
    INTO TABLE `myX`.`practica`
    CHARACTER SET 'UTF8MB4'
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    (id, @achtung, name, @rating, @is_favorite, locus_id, date, @ordinal, @$description, @tq, @tl, user_id)
    SET
        achtung = IF(@achtung = '', NULL, @achtung),
        rating = IF(@rating = '', 0, @rating),
        is_favorite = IF(@is_favorite = '', NULL, @is_favorite),
        ordinal = IF(@ordinal = '', NULL, @ordinal),
        description = IF(@description = '', NULL, @description),
        tq = IF(@tq = '', NULL, @tq),
        tl = IF(@tl = '', NULL, @tl)
;
LOAD DATA INFILE '/tmp/2022-07-01-amores.csv'
    INTO TABLE `myX`.`amores`
    CHARACTER SET 'UTF8MB4'
    FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    (id, @achtung, alias, @rating, @is_favorite, @genre, description1, @description2, @description3, @description4, @web, @name, @has_photo, @phone, @email, @other, user_id)
    SET
        achtung = IF(@achtung = '', NULL, @achtung),
        rating = IF(@rating = '', 0, @rating),
        is_favorite = IF(@is_favorite = '', NULL, @is_favorite),
        genre = IF(@genre = '', 0, @genre),
        description2 = IF(@description2 = '', NULL, @description2),
        description3 = IF(@description3 = '', NULL, @description3),
        description4 = IF(@description4 = '', NULL, @description4),
        web = IF(@web = '', NULL, @web),
        name = IF(@name = '', NULL, @name),
        has_photo = IF(@has_photo = '', NULL, @has_photo),
        phone = IF(@phone = '', NULL, @phone),
        email = IF(@email = '', NULL, @email),
        other = IF(@other = '', NULL, @other)
;

LOAD DATA INFILE '/tmp/2022-07-01-assignations.csv'
    INTO TABLE `myX`.`assignations`
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    (id, praxis_id, amor_id, user_id)
;