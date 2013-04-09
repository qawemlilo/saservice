DROP TABLE IF EXISTS `#__category_listing`;

CREATE TABLE IF NOT EXISTS `#__ss_category_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `#__ss_categories` (`category_id`),
  KEY `#__ss_listings` (`listing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;