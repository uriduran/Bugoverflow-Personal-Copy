-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bugoverflow_database
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bugoverflow_database
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bugoverflow_database` DEFAULT CHARACTER SET latin1 ;
USE `bugoverflow_database` ;

-- -----------------------------------------------------
-- Table `bugoverflow_database`.`adminsettings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bugoverflow_database`.`adminsettings` ;

CREATE TABLE IF NOT EXISTS `bugoverflow_database`.`adminsettings` (
  `readonly` INT(11) NOT NULL,
  `mapaccess` INT(11) NOT NULL,
  `login` INT(11) NOT NULL,
  `root` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`readonly`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bugoverflow_database`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bugoverflow_database`.`users` ;

CREATE TABLE IF NOT EXISTS `bugoverflow_database`.`users` (
  `UserId` INT(11) NOT NULL AUTO_INCREMENT,
  `UserName` VARCHAR(777) NOT NULL,
  `Email` VARCHAR(777) NOT NULL,
  `Password` VARCHAR(777) NOT NULL,
  `IsAdmin` INT(11) NOT NULL,
  PRIMARY KEY (`UserId`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bugoverflow_database`.`answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bugoverflow_database`.`answers` ;

CREATE TABLE IF NOT EXISTS `bugoverflow_database`.`answers` (
  `AnswerId` INT(11) NOT NULL,
  `QuestionId` INT(11) NOT NULL,
  `UserId` INT(11) NOT NULL,
  `Answer` VARCHAR(777) NULL DEFAULT NULL,
  PRIMARY KEY (`AnswerId`),
  INDEX `UserId` (`UserId` ASC),
  CONSTRAINT `answers_ibfk_1`
    FOREIGN KEY (`UserId`)
    REFERENCES `bugoverflow_database`.`users` (`UserId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bugoverflow_database`.`questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bugoverflow_database`.`questions` ;

CREATE TABLE IF NOT EXISTS `bugoverflow_database`.`questions` (
  `QuestionId` INT(11) NOT NULL AUTO_INCREMENT,
  `UserId` INT(11) NOT NULL,
  `Title` VARCHAR(777) NULL DEFAULT NULL,
  `Question` VARCHAR(777) NULL DEFAULT NULL,
  `location` VARCHAR(500) NULL DEFAULT NULL,
  `Latitude` DECIMAL(11,8) NULL DEFAULT NULL,
  `Longitude` DECIMAL(11,8) NULL DEFAULT NULL,
  PRIMARY KEY (`QuestionId`),
  INDEX `UserId` (`UserId` ASC),
  CONSTRAINT `questions_ibfk_1`
    FOREIGN KEY (`UserId`)
    REFERENCES `bugoverflow_database`.`users` (`UserId`))
ENGINE = InnoDB
AUTO_INCREMENT = 55627442
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
