use admin;

CREATE TABLE IF NOT EXISTS `articles` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `contents` text NOT NULL,
    `category_id` bigint(20) unsigned,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `articles` (`title`, `contents`, `category_id`) VALUES
    ('blog1', 'contentscontents', 1),
    ('blog2', 'contentscontents', 1),
    ('blog3', 'contentscontents', 2),
    ('blog4', 'contentscontents', 2),
    ('blog5', 'contentscontents', 2),
    ('blog6', 'contentscontents', 2),
    ('blog7', 'contentscontents', 2),
    ('blog8', 'contentscontents', 3),
    ('blog9', 'contentscontents', 4),
    ('blog10', 'contentscontents', 3);