use admin;

ALTER TABLE `articles` ADD FOREIGN KEY fk_category_id(`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;