CREATE DATABASE IF NOT EXISTS `tp1` CHARACTER SET 'utf8';
USE `tp1`;
CREATE TABLE IF NOT EXISTS `departments`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  , `departmentName` VARCHAR(50)
  , `details` VARCHAR(100)
  , PRIMARY KEY(id)
)ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS `users`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  , `lastname` VARCHAR(50)
  , `firstname` VARCHAR(50)
  , `birthdate` DATE
  , `address` TEXT
  , `zipCode` VARCHAR(5)
  , `phone` VARCHAR(10)
  , `department` INT UNSIGNED NOT NULL
-- clé étrangere qui permet de lier explicitement 2 tables 
  , CONSTRAINT `fkDepartmentId`
    FOREIGN KEY (`department`)
    REFERENCES `departments`(`id`)
  , PRIMARY KEY(id)
)ENGINE=InnoDB;
INSERT INTO `departments` (`departmentName`, `details`)
  VALUES('Maintenance', 'Les spécialistes du Hardware')
  , ('Web Developer', 'Pour eux tout est code')
  , ('Web Designer', 'Y a que le CSS dans la vie')
  , ('Reférenceur', 'Regarde les Serps Google du matin au soir et du soir au matin');
