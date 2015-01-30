ALTER TABLE `test_type` ADD COLUMN `loinc_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `description` ;
ALTER TABLE `test_type` ADD COLUMN `test_code` VARCHAR(45) NULL DEFAULT NULL  AFTER `loinc_code` ;
ALTER TABLE `specimen_type` ADD COLUMN `container_type` VARCHAR(45) NULL DEFAULT NULL;

