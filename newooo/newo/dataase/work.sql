-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- Schema test
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
-- -----------------------------------------------------

USE `test` ;

-- -----------------------------------------------------
-- Table `test`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`ticket` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uniqueNo` VARCHAR(30) NOT NULL,
  `TDate` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `test`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`service` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `problem` VARCHAR(30) NOT NULL,
  `device_model` VARCHAR(30) NOT NULL,
  `device_os` VARCHAR(50) NOT NULL,
  `user` VARCHAR(30) NOT NULL,
  `ticket_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_service_ticket1_idx` (`ticket_id` ASC) VISIBLE,
  CONSTRAINT `fk_service_ticket1`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `test`.`ticket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `test`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`status` (
  `status_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_name` VARCHAR(30) NOT NULL,
  `status_description` VARCHAR(30) NOT NULL,
  `ticket_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`status_id`),
  INDEX `fk_status_ticket1_idx` (`ticket_id` ASC) VISIBLE,
  CONSTRAINT `fk_status_ticket1`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `test`.`ticket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `test`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `age` INT NULL DEFAULT NULL,
  `location` VARCHAR(50) NULL DEFAULT NULL,
  `date` TIMESTAMP NULL DEFAULT NULL,
  `service_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_service_idx` (`service_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_service`
    FOREIGN KEY (`service_id`)
    REFERENCES `test`.`service` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 35
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
