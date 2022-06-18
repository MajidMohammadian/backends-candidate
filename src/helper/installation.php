<?php

global $db;

$table_product = "
CREATE TABLE IF NOT EXISTS `product` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `Product_ID` INT UNSIGNED NOT NULL ,
    `NR` VARCHAR(255) NULL DEFAULT NULL ,
    `Name` VARCHAR(255) NULL DEFAULT NULL ,
    `Product_URL` VARCHAR(500) NULL DEFAULT NULL ,
    `Search_Keywords` VARCHAR(255) NULL DEFAULT NULL , 
    `Description` TEXT NULL DEFAULT NULL ,
    `Category` VARCHAR(255) NULL DEFAULT NULL ,
    `Category_ID` INT NOT NULL DEFAULT '0' ,
    `SubCategory` VARCHAR(255) NULL DEFAULT NULL ,
    `SubCategory_ID` INT NOT NULL DEFAULT '0' ,
    `Brand` VARCHAR(255) NULL DEFAULT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$db->query($table_product);

$table_product_item = "
CREATE TABLE IF NOT EXISTS `product_item` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `product_id` INT UNSIGNED NOT NULL ,
    `SKU` VARCHAR(255) NULL DEFAULT NULL ,
    `Price` DECIMAL(15,2) NOT NULL DEFAULT '0' ,
    `Retail_Price` DECIMAL(15,2) NOT NULL DEFAULT '0' ,
    `Thumbnail_URL` VARCHAR(500) NULL DEFAULT NULL ,
    `Color` VARCHAR(255) NULL DEFAULT NULL ,
    `Color_Family` VARCHAR(255) NULL DEFAULT NULL ,
    `Size` VARCHAR(255) NULL DEFAULT NULL ,
    `Size_Family` VARCHAR(255) NULL DEFAULT NULL ,
    `Occassion` VARCHAR(255) NULL DEFAULT '[]' ,
    `Season` VARCHAR(255) NULL DEFAULT '[]' ,
    `Rating_Avg` DECIMAL(15,2) NOT NULL DEFAULT '0' ,
    `Rating_Count` INT UNSIGNED NOT NULL DEFAULT '0' ,
    `Warehouse` VARCHAR(500) NULL DEFAULT NULL ,
    `Active` VARCHAR(1) NULL DEFAULT '1' ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$db->query($table_product_item);

$table_families = "
CREATE TABLE IF NOT EXISTS `families` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `first_name` VARCHAR(255) NULL DEFAULT NULL ,
    `surname` VARCHAR(255) NULL DEFAULT NULL ,
    `age` INT UNSIGNED NOT NULL DEFAULT '0' ,
    `gender` VARCHAR(255) NULL DEFAULT NULL ,
    `legal_guardian` VARCHAR(1) NULL DEFAULT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$db->query($table_families);

$has_data_family = "SELECT * FROM `families`";
$db->query($has_data_family);

if($db->affected_rows == 0) {
    $data_insert_family = "
    INSERT INTO `families`
        (`id`, `first_name`, `surname`, `age`, `gender`, `legal_guardian`)
    VALUES
        (1 ,'Jochen',    'Meier',    42 ,'male',     1),
        (2 ,'Susanne',   'Meier',    38 ,'female',   1),
        (3 ,'Johannes',  'Meier',    14 ,'male',     0),
        (4 ,'Kia',       'Meier',    10 ,'female',   0),
        (5 ,'Sabine',    'Müller',   33 ,'female',   1),
        (6 ,'Klara',     'Müller',   12 ,'female',   0),
        (7 ,'Klaas',     'Ümser',    3  ,'male',     0),
        (8 ,'Gabi',      'Ümser',    27 ,'female',   1),
        (9 ,'Jochen',    'Ümser',    26 ,'male',     1),
        (10,'Dieter',    'Unger',    72 ,'male',     1),
        (11,'Gertrud',   'Unger',    76 ,'female',   1),
        (12,'Hans',      'Rößler',   38 ,'male',     1),
        (13,'Fritz',     'Waagner',  18 ,'male',     0),
        (14,'Susi',      'Waagner',  44 ,'female',   1),
        (15,'Max',       'Waagner',  50 ,'male',     1),
        (16,'Bambi',     'Waagner',  13 ,'female',   0);
    ";

    $db->query($data_insert_family);
}