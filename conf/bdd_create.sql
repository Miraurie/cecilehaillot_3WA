-- On créé la table cours
CREATE TABLE `cours`(
    `id` TINYINT(10) NOT NULL,
    `city` VARCHAR(120) NOT NULL,
    `adress` VARCHAR(120) NOT NULL,
    `day` VARCHAR(8) NOT NULL,
    `hour_1` TINYINT(10) DEFAULT NULL,
    `hour_2` TINYINT(10) DEFAULT NULL,
    `hour_3` TINYINT(10) DEFAULT NULL,
    `info` TEXT NOT NULL,
    `text_card` VARCHAR(140) NOT NULL,
    `id_img` SMALLINT(255) DEFAULT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; 

-- On créé la table events
CREATE TABLE `events`(
    `id` TINYINT(50) NOT NULL,
    `date` DATE NOT NULL,
    `type` VARCHAR(120) DEFAULT NULL,
    `place` VARCHAR(120) DEFAULT NULL,
    `who` VARCHAR(120) DEFAULT NULL,
    `reservation` SMALLINT(255) DEFAULT NULL,
    `playlist` SMALLINT(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table faq
CREATE TABLE `faq`(
    `id` TINYINT(255) NOT NULL,
    `question` VARCHAR(255) NOT NULL,
    `answer` TEXT NOT NULL,
    `id_img` SMALLINT(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table files
CREATE TABLE `files`(
    `id` SMALLINT(255) NOT NULL,
    `title` VARCHAR(120) NOT NULL,
    `extension` VARCHAR(5) NOT NULL,
    `id_page` TINYINT(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table images
CREATE TABLE `images`(
    `id` SMALLINT(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `extension` VARCHAR(5) NOT NULL,
    `alt` VARCHAR(120) NOT NULL,
    `id_page` TINYINT(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table links
CREATE TABLE `links`(
    `id` TINYINT(255) NOT NULL,
    `src` VARCHAR(255) NOT NULL,
    `id_page` TINYINT(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table pages
CREATE TABLE `pages`(
    `id` TINYINT(20) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `label` VARCHAR(50) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table texts
CREATE TABLE `texts`(
    `id` SMALLINT(255) NOT NULL,
    `contents` TEXT NOT NULL,
    `id_pages` TINYINT(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table time
CREATE TABLE `time`(
    `id` TINYINT(10) NOT NULL,
    `hour` TIME NOT NULL,
    `level` VARCHAR(255) NOT NULL,
    `descr` TEXT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On créé la table users
CREATE TABLE `users`(
    `id` TINYINT(1) NOT NULL,
    `name` VARCHAR(25) NOT NULL,
    `password` VARCHAR(32) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- On ajoute les clés et contraintes à la table cours
ALTER TABLE
    `cours` ADD PRIMARY KEY(`id`),
    ADD KEY `id_img`(`id_img`),
    ADD KEY `hour_1`(`hour_1`),
    ADD KEY `hour_2`(`hour_2`),
    ADD KEY `hour_3`(`hour_3`),
    MODIFY `id` TINYINT(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table events
ALTER TABLE
    `events` ADD PRIMARY KEY(`id`),
    ADD KEY `id_file`(`reservation`, `playlist`),
    ADD KEY `playlist`(`playlist`),
    MODIFY `id` TINYINT(50) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table faq
ALTER TABLE
    `faq` ADD PRIMARY KEY(`id`),
    ADD KEY `id_img`(`id_img`),
    MODIFY `id` TINYINT(255) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table files
ALTER TABLE
    `files` ADD PRIMARY KEY(`id`),
    ADD KEY `id_page`(`id_page`),
    MODIFY `id` SMALLINT(255) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table images
ALTER TABLE
    `images` ADD PRIMARY KEY(`id`),
    ADD KEY `id_page`(`id_page`),
    MODIFY `id` SMALLINT(255) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table links
ALTER TABLE
    `links` ADD PRIMARY KEY(`id`),
    ADD KEY `id_page`(`id_page`),
    MODIFY `id` TINYINT(255) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table pages
ALTER TABLE
    `pages` ADD PRIMARY KEY(`id`);

-- On ajoute les clés et contraintes à la table texts
ALTER TABLE
    `texts` ADD PRIMARY KEY(`id`),
    ADD KEY `id_pages`(`id_pages`),
    MODIFY `id` SMALLINT(255) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table time
ALTER TABLE
    `time` ADD PRIMARY KEY(`id`),
    MODIFY `id` TINYINT(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

-- On ajoute les clés et contraintes à la table users
ALTER TABLE
    `users` ADD PRIMARY KEY(`id`);