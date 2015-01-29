ALTER TABLE `test_type` ADD COLUMN `loinc_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `description` ;
ALTER TABLE `test_type` ADD COLUMN `test_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `loinc_code` ;
ALTER TABLE `user` ADD COLUMN `active_status` TINYINT NULL DEFAULT 0;
UPDATE user SET active_status = 1;
