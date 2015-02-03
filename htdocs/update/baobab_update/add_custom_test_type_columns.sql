SET FOREIGN_KEY_CHECKS=0; 

CREATE TABLE IF NOT EXISTS `container_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description`VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `department`  (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`test_category_id` int(11),
	`active` tinyint DEFAULT 0,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`)	
) ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS `location`  (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`department_id` VARCHAR(255) NOT NULL,
	`device_mac_addr` VARCHAR(255),
	`active` tinyint DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS `state` (
	`state_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`state_id`)
) ENGINE=innoDB;

DROP TABLE IF EXISTS `activity_state`;
CREATE TABLE IF NOT EXISTS `activity_state` (
	`activity_state_id` int(11) NOT NULL AUTO_INCREMENT,
	`state_id` int(11) NOT NULL,
	`test_id` int(11),
	`specimen_id` int(11),
	`date` datetime DEFAULT NULL,
	`reason` VARCHAR(255),
	`location` VARCHAR(255),
	`user_id` int(11),
	`doctor` VARCHAR(255),
	`comments` VARCHAR(255),
	PRIMARY KEY (`activity_state_id`)
) ENGINE=innoDB;


ALTER TABLE `test_type` ADD COLUMN `loinc_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `description`;
ALTER TABLE `test_type` ADD COLUMN `test_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `loinc_code`;
ALTER TABLE `test_type` ADD COLUMN `container_type` int(11) NOT NULL FOREIGN KEY REFERENCES container_type(`id`);
ALTER TABLE 'department' ADD FOREIGN KEY (`test_category_id`) REFERENCES test_category(`test_category_id`);
ALTER TABLE `location` ADD FOREIGN KEY (`department_id`) REFERENCES department(`id`)
set FOREIGN_KEY_CHECKS=1;
