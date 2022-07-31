use admin;

CREATE TABLE IF NOT EXISTS `categories` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`name`) VALUES
    ('category1'),
    ('category2'),
    ('category3'),
    ('category4');