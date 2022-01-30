-- MySQL Workbench Synchronization
-- Generated: 2022-01-27 11:11
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: erick

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `employeev2` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `employeev2`.`admin` (
  `usersId` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`usersId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `employeev2`.`employees` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `lastName` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `gender` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `streetAddress` INT(11) NULL DEFAULT NULL,
  `state` VARCHAR(45) NULL DEFAULT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `postalCode` INT(11) NULL DEFAULT NULL,
  `phoneNumber` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

USE employeev2;

INSERT INTO admin (name, password, email) VALUES("admin", "$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC","admin@assemblerschool.com");


INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age, postalCode, phoneNumber) VALUES
('Rack', 'Lei', 'jackson@network.com', 'man', 'San Jose', 126, 'CA', 24, 394221, 738362762),
('Brad', 'Simpson', 'brad@foo.com', 'man', 'Atlanta', 128, 'GEO', 40, 394221, 68546345),
('John', 'Doe', 'jhohndoe@foo.com', 'man', 'New York', 89, 'WA', 34, 9889, 1283645645),
('Leila', 'Mills', 'mills@leila.com', 'woman', 'San Diego', 29, 'CA', 29, 98765, 2147483647),
('Susan', 'Smith', 'susanmith@baz.com', 'woman', 'Louisville', 28, 'KNT', 43, 445321, 2147483647),
('Neil', 'Walker', 'walkerneil@baz.com', 'man', 'Nashville', 42, 'TN', 23, 90143, 2147483647)
;






