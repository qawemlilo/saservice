CREATE TABLE IF NOT EXISTS `#__ss_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(40) NOT NULL,
  `color` varchar(7) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `color` (`color`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__ss_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `color` varchar(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__ss_listings` (
  `id` int(11) NOT NULL auto_increment,
  `area_id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `slogan` varchar(140) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL default '',
  `cell` int(12) default NULL,
  `phone` int(13) NOT NULL,
  `fax` int(13) default NULL,
  `city` varchar(40) NOT NULL default '',
  `province` varchar(40) NOT NULL default '',
  `address` text NOT NULL,
  `description` text NOT NULL,
  `aboutus` text NOT NULL default '',
  `facebook` varchar(40) NOT NULL default '',
  `twitter` varchar(40) NOT NULL default '',
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `areacode` varchar(10) NOT NULL,
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `#__category_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__ss_showcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `img_src` varchar(40) NOT NULL,
  `text` text NOT NULL,
   PRIMARY KEY  (`id`),
   UNIQUE KEY `img_src` (`img_src`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__ss_styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `headingsfont` varchar(100) NOT NULL,
  `headingscolor` int(6) NOT NULL,
  `fontcolor` int(6) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;