CREATE TABLE IF NOT EXISTS `task_item` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`item` VARCHAR(255) NOT NULL,
	`completed` BOOLEAN NOT NULL,
	`task` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(100) NOT NULL,
	`user` INT NOT NULL,
	`due_date` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(100) NOT NULL UNIQUE,
	`uname` varchar(100) NOT NULL UNIQUE,
	`passw` varchar(120) NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `task_item` ADD CONSTRAINT `task_item_fk0` FOREIGN KEY (`task`) REFERENCES `task`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk0` FOREIGN KEY (`user`) REFERENCES `users`(`id`);

