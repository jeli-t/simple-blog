DROP TABLE IF EXISTS `rel_post_tag`;

DROP TABLE IF EXISTS `tag`;

DROP TABLE IF EXISTS `component`;

DROP TABLE IF EXISTS `comment`;

DROP TABLE IF EXISTS `post`;

DROP TABLE IF EXISTS `blog`;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nick` VARCHAR( 15 ),
    `password` VARCHAR( 40 ),
    `permission` INT DEFAULT 1
);

INSERT INTO `user` VALUES ( NULL, 'root', '83353d597cbad458989f2b1a5c1fa1f9f665c858', 9 );
-- password: root -> MD5 -> SHA1 -> 83353d597cbad458989f2b1a5c1fa1f9f665c858

CREATE TABLE `blog`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT,
    `title` VARCHAR( 100 ) DEFAULT "Nowy BLOG",
    `desc` VARCHAR( 1000 ) DEFAULT "Opis bloga.",
    `pagination` INT DEFAULT 5,
    CONSTRAINT `FK_id_user` FOREIGN KEY ( `id_user` ) REFERENCES `user`( `id` )
);

CREATE TABLE `post`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_blog` INT,
    `title` VARCHAR( 100 ),
    `short_desc` VARCHAR( 500 ),
    `add_at` DATETIME DEFAULT NOW(),
    `status` INT(1) DEFAULT 0,
    CONSTRAINT `FK_id_blog` FOREIGN KEY ( `id_blog` ) REFERENCES `blog`( `id` )
);

CREATE TABLE `tag`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR( 20 )
);

CREATE TABLE `rel_post_tag`(
    `id_post` INT,
    `id_tag` INT,
    CONSTRAINT `FK_id_tag_post` FOREIGN KEY ( `id_post` ) REFERENCES `post`( `id` ),
    CONSTRAINT `FK_id_tag` FOREIGN KEY ( `id_tag` ) REFERENCES `tag`( `id` )
);

CREATE TABLE `component`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_post` INT,
    `type` VARCHAR( 10 ),
    `order` INT,
    `content` TEXT,
    CONSTRAINT `FK_id_component_post` FOREIGN KEY ( `id_post` ) REFERENCES `post`( `id` )
);

CREATE TABLE `comment`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_post` INT,
    `id_user` INT,
    `desc` TEXT,
    CONSTRAINT `FK_id_comment_post` FOREIGN KEY ( `id_post` ) REFERENCES `post`( `id` ),
    CONSTRAINT `FK_id_comment_user` FOREIGN KEY ( `id_user` ) REFERENCES `user`( `id` )
);