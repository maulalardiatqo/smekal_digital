ALTER TABLE `smekal`.`guru` 
ADD COLUMN `salary_per_hour` DOUBLE NOT NULL DEFAULT 29000 AFTER `tahun_masuk`,
ADD COLUMN `jam_kerja` INT NOT NULL AFTER `salary_per_hour`;