CREATE TABLE `smekal`.`tagihan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `jumlah` DOUBLE NULL,
  `tanggal_input` DATETIME NULL,
  `tanggal_tenggang` DATETIME NULL,
  `desc` TEXT NULL,
  PRIMARY KEY (`id`));
