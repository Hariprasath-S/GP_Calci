<?php
//SEM2
CREATE TABLE `test`.`sem3` ( `roll` VARCHAR(7) NOT NULL DEFAULT '0' , `ptas` VARCHAR(2) NOT NULL DEFAULT '0' , `dld` VARCHAR(2) NOT NULL DEFAULT '0' , `ece` VARCHAR(2) NOT NULL DEFAULT '0' , `mpmc` VARCHAR(2) NOT NULL DEFAULT '0' , `dsalab` VARCHAR(2) NOT NULL DEFAULT '0' , `dsa` VARCHAR(2) NOT NULL DEFAULT '0' ,`oops` VARCHAR(2) NOT NULL DEFAULT '0' `gpa`,`ese` VARCHAR(2) NOT NULL DEFAULT '0' FLOAT(4) NOT NULL DEFAULT '0' ) ENGINE = InnoDB;

//SEM3
CREATE TABLE `test`.`sem3` ( 
	`roll` VARCHAR(7) NOT NULL DEFAULT '0' , 
	`ptas` VARCHAR(2) NOT NULL DEFAULT '0' , 
	`dld` VARCHAR(2) NOT NULL DEFAULT '0' , 
	`ece` VARCHAR(2) NOT NULL DEFAULT '0' , 
	`mpmc` VARCHAR(2) NOT NULL DEFAULT '0' , 
	`dsalab` VARCHAR(2) NOT NULL DEFAULT '0' , 
	`dsa` VARCHAR(2) NOT NULL DEFAULT '0' ,
	`oops` VARCHAR(2) NOT NULL DEFAULT '0' 
	`ese` VARCHAR(2) NOT NULL DEFAULT '0' 
	`gpa`, FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;

//SEM4
CREATE TABLE `test`.`sem4` ( 
    `roll` VARCHAR(7) NOT NULL,
    `rmt` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `eds` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `coa` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `ddm` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `oslab` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `ict` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `os` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `coi` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `ddmlab` VARCHAR(2) NOT NULL DEFAULT '0', 
    `gpa` FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;

//sem5
CREATE TABLE `test`.`sem5` ( 
    `roll` VARCHAR(7) NOT NULL,
    `tech` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `web` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `dcn` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `ada` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `pe1` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `oe1` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `dcnlab` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `weblab` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `gpa` FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;

//sem6
CREATE TABLE `test`.`sem6` ( 
    `roll` VARCHAR(7) NOT NULL,
    `ml` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `soft` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `dsp` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `pe2` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `oe2` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `oe3` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `mllab` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `ostlab` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `gpa` FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;

//sem7
CREATE TABLE `test`.`sem7` ( 
    `roll` VARCHAR(7) NOT NULL,
    `ethics` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `cns` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `iot` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `pe3` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `pe4` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `oe4` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `iotlab` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `mini` VARCHAR(2) NOT NULL DEFAULT '0' ,
    `gpa` FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;

//sem8
CREATE TABLE `test`.`sem8` ( 
    `roll` VARCHAR(7) NOT NULL,
    `pe5` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `pe6` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `project` VARCHAR(2) NOT NULL DEFAULT '0' , 
    `gpa` FLOAT(4) NOT NULL DEFAULT '0' ) 
ENGINE = InnoDB;
?>