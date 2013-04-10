CREATE TABLE IF NOT EXISTS `#__ss_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default 0,
  `name` varchar(140) NOT NULL UNIQUE,
  PRIMARY KEY  (`id`),
  KEY `#__ss_categories` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__ss_listings` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(140) NOT NULL,
  `slogan` varchar(140) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL default '',
  `cell` int(12) default NULL,
  `phone` int(13) NOT NULL,
  `fax` int(13) default NULL,
  `province` varchar(100) NOT NULL,
  `locality` varchar(140) NOT NULL,
  `sublocality` varchar(140) NOT NULL default '',
  `formatted_address` text NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `postal_code` int(4) NOT NULL,
  `facebook` varchar(40) NOT NULL default '',
  `twitter` varchar(40) NOT NULL default '',
  `services_offered` text NOT NULL,
  `aboutus` text NOT NULL default '',
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `#__ss_category_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `#__ss_categories` (`category_id`),
  KEY `#__ss_listings` (`listing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


INSERT INTO `#__ss_categories` (`name`) VALUES ('Electricians'), ('Plumbing / Geyser'), ('Satellite'), ('Pool Services'), ('Garden Services'), ('Security'), ('Airconditioning'), ('Auto Glass'), ('Courier'), ('Attorneys'), ('Gyaenacologists'), ('Orthodontists'), ('Paeditricians'), ('Kitchen'), ('Home Automation'), ('Interior Decorators'), ('Blinds & Curtains'), ('Veternerian'), ('Dog Parlour'), ('Transport'), ('Computers'), ('Wedding Planners'), ('Car Sales'), ('Painting Companies'), ('Developers'), ('Buliding Contractors'), ('Paving'), ('Aluminium Windows'), ('Roofing'), ('Tiler'), ('Electric Fencing '), ('Fencing'), ('Conveyancers'), ('Electronics'), ('Bond Originators'), ('Pest Control'), ('Hygeine'), ('Plan Drawers'), ('Architect'), ('Quantity Survayors'), ('Escourt Agencies'), ('Scafolding'), ('Carport'), ('Landscaping'), ('Shipping'), ('Flooring'), ('Insurance'), ('Website Designers'), ('Corporate Gifts'), ('Advertising '), ('Printing'), ('Loan Companies'), ('Travel Agencies'), ('Lighting'), ('Party Planners'), ('IT Companies'), ('Day Care / Creche'), ('Tyres'), ('Furniture'), ('Engineering '), ('Bed & Breakfast'), ('Lodges'), ('Guarding'), ('Cctv'), ('Flowers'), ('Driving Schools'), ('Catorers'), ('Forklift'), ('Local Papers'), ('Private Tutors'), ('Dermatologists'), ('Gyms'), ('Personal Trainers'), ('Dietician'), ('Radiologists'), ('Photography'), ('Audio Companies'), ('Spas'), ('Cardiologists'), ('Service Garages'), ('Shuttle / Tours'), ('Rental Agencies'), ('Estate Agents'), ('Panel Beaters'), ('Letting Agencies'), ('Managing Agents'), ('Car Rental'), ('Glass Companies'), ('Tool Hire'), ('Accountants'), ('Gate Automation'), ('Appliance Repairs'), ('Taxi'), ('Locksmiths'), ('Retirement Homes'), ('Kitchen Fittings'), ('Cab Services'), ('Safety Clothing'), ('Funeral Houses'), ('Halaal Restuarants'), ('Private Schools'), ('Carpeting');
