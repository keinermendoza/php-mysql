CREATE TABLE `authors` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255),
    `email` VARCHAR(255)
);

ALTER TABLE `jokes` ADD COLUMN (
	`author_id` INT 
);

UPDATE jokes SET author_id=1 WHERE id < 50;

INSERT INTO authors (`name`, `email`) VALUES 
( 'pepe', 'pepe@gmail.com'),
( 'paco', 'paco@gmail.com');

CREATE TABLE jokes_categories (
	`category_id`  INT NOT NULL,
    `joke_id`  INT NOT NULL,
	PRIMARY KEY (`category_id`, `joke_id` )
);

INSERT INTO `categories` (`name`)
VALUES ('toc-toc'), ('cross the road'), ('abogados');    

INSERT INTO `jokes_categories` (`joke_id`,`category_id`) 
VALUES (1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 3);

SELECT * FROM jokes;
SELECT * FROM authors;
