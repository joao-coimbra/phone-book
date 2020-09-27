CREATE DATABASE phonebook;

CREATE TABLE `phonebook`.`user` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(200) NOT NULL,
	`email` VARCHAR(200) NOT NULL,
	`phone` INT(11) NOT NULL,
	`password` VARCHAR(32) NOT NULL,
	`date` DATETIME NOT NULL,
	PRIMARY KEY (`user_id`));