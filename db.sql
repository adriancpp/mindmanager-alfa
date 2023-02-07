CREATE TABLE `mind_manager`.`user` (`id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(20) NOT NULL , `nickname` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `routine` (
                           `id` int NOT NULL,
                           `user_id` int NOT NULL,
                           `name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
                           `type` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
                           `created_at` datetime NOT NULL,
                           `updated_at` datetime NOT NULL,
                           `sort` int NOT NULL,
                           `priority` int NOT NULL,
                           `required_amount` int DEFAULT NULL,
                           `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

ALTER TABLE `routine`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `routine`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;