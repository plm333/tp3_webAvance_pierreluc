-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema eLibrary2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eLibrary2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eLibrary2` DEFAULT CHARACTER SET utf8 ;
USE `eLibrary2` ;

-- -----------------------------------------------------
-- Table `eLibrary2`.`editeur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`editeur` (
  `id` INT NOT NULL,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(25) NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(10) NULL,
  `telephone` VARCHAR(25) NULL,
  `courriel` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`livre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`livre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `isbn` VARCHAR(45) NULL,
  `titre` VARCHAR(45) NOT NULL,
  `auteur` VARCHAR(45) NULL,
  `prix` VARCHAR(15) NULL,
  `editeur_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_livre_editeur1_idx` (`editeur_id` ASC),
  CONSTRAINT `fk_livre_editeur1`
    FOREIGN KEY (`editeur_id`)
    REFERENCES `eLibrary2`.`editeur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`privilege` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`log` (
  `id` INT NOT NULL,
  `adresse_ip` VARCHAR(45) NULL,
  `username` VARCHAR(45) NOT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`membre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`membre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(25) NOT NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(10) NULL,
  `telephone` VARCHAR(25) NULL,
  `courriel` VARCHAR(45) NOT NULL,
  `date_naissance` DATE NULL,
  `date_inscription` DATE NULL,
  `username` VARCHAR(45) NULL,
  `privilege_id` INT NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `log_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_membre_privilege1_idx` (`privilege_id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  INDEX `fk_membre_log1_idx` (`log_id` ASC),
  CONSTRAINT `fk_membre_privilege1`
    FOREIGN KEY (`privilege_id`)
    REFERENCES `eLibrary2`.`privilege` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_membre_log1`
    FOREIGN KEY (`log_id`)
    REFERENCES `eLibrary2`.`log` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`employe` (
  `id` INT NOT NULL,
  `num_employe` VARCHAR(25) NOT NULL,
  `job_titre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_employe_membre1_idx` (`id` ASC),
  CONSTRAINT `fk_employe_membre1`
    FOREIGN KEY (`id`)
    REFERENCES `eLibrary2`.`membre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`etudiant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`etudiant` (
  `id` INT NOT NULL,
  `code_permanent` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_etudiant_membre1_idx` (`id` ASC),
  CONSTRAINT `fk_etudiant_membre1`
    FOREIGN KEY (`id`)
    REFERENCES `eLibrary2`.`membre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`emprunt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`emprunt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_emprunt` DATE NOT NULL,
  `employe_id` INT NOT NULL,
  `etudiant_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_emprunt_employe1_idx` (`employe_id` ASC),
  INDEX `fk_emprunt_etudiant1_idx` (`etudiant_id` ASC),
  CONSTRAINT `fk_emprunt_employe1`
    FOREIGN KEY (`employe_id`)
    REFERENCES `eLibrary2`.`employe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprunt_etudiant1`
    FOREIGN KEY (`etudiant_id`)
    REFERENCES `eLibrary2`.`etudiant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eLibrary2`.`livre_emprunt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eLibrary2`.`livre_emprunt` (
  `livre_id` INT NOT NULL,
  `emprunt_id` INT NOT NULL,
  `date_retour` DATE NULL,
  PRIMARY KEY (`livre_id`, `emprunt_id`),
  INDEX `fk_livre_has_emprunt_emprunt1_idx` (`emprunt_id` ASC),
  INDEX `fk_livre_has_emprunt_livre_idx` (`livre_id` ASC),
  CONSTRAINT `fk_livre_has_emprunt_livre`
    FOREIGN KEY (`livre_id`)
    REFERENCES `eLibrary2`.`livre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livre_has_emprunt_emprunt1`
    FOREIGN KEY (`emprunt_id`)
    REFERENCES `eLibrary2`.`emprunt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;