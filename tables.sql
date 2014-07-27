-- This is the users table, the rest of the tables are the same.
-- The password hash table was made longer than needs to be, 
-- so in case we change the hashing algorithm later, the hash will still fit.

CREATE TABLE IF NOT EXISTS users (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  firstname varchar(20) NOT NULL,
  lastname varchar(20) NOT NULL,
  user_name varchar(32) NOT NULL,
  user_email varchar(50) NOT NULL,
  password_hash varchar(128) NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE KEY user_name (user_name),
  UNIQUE KEY user_email (user_email)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1; 


CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `tbl_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `tbl_inventory` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `rating` int(5) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;