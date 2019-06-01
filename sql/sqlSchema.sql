CREATE TABLE `pacientes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255) NOT NULL,
	`apellido` VARCHAR(255) NOT NULL,
	`creado` DATE NOT NULL,
	`estado` INT NOT NULL DEFAULT '1',
	`fecha_nac` DATE NOT NULL,
	`usuario_id` INT NOT NULL,
	`foto` VARCHAR(255),
	`dni` VARCHAR(255),
	`telefono` VARCHAR(255),
	`referencia` VARCHAR(255),
	`notas` VARCHAR(255),
	`direccion` VARCHAR(255),
	`telefono2` VARCHAR(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `consultas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`paciente_id` INT,
	`nota` VARCHAR(255),
	`creado` DATE NOT NULL,
	`usuario_id` INT NOT NULL,
	`tipo_consulta` VARCHAR(255),
	`fecha_consulta` DATE,
	`fecha_consulta` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `sec_usuario` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(255) NOT NULL,
	`pass` VARCHAR(255) NOT NULL,
	`estado` INT NOT NULL DEFAULT '1',
	`creado` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `pacientes` ADD CONSTRAINT `pacientes_fk0` FOREIGN KEY (`usuario_id`) REFERENCES `sec_usuario`(`id`);

ALTER TABLE `consultas` ADD CONSTRAINT `consultas_fk0` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes`(`id`);

ALTER TABLE `consultas` ADD CONSTRAINT `consultas_fk1` FOREIGN KEY (`usuario_id`) REFERENCES `sec_usuario`(`id`);

