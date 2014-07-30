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



CREATE TABLE IF NOT EXISTS inventory (
  item_id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  item_title varchar(32) NOT NULL,
  item_price decimal(10, 2) NOT NULL,
  item_description varchar(500) NOT NULL,
  item_image_ref varchar(255),
  rating int(5),
  PRIMARY KEY (item_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS orders (
  order_num int(11) NOT NULL,
  user_id int(11) NOT NULL,
  item_id int(11) NOT NULL,
  item_title varchar(32) NOT NULL,
  item_price decimal(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE orders MODIFY COLUMN item_title VARCHAR(32);

SELECT * FROM inventory WHERE item_id = 3

ALTER TABLE orders ADD COLUMN order_date DATETIME NOT NULL;

ALTER TABLE orders ALTER COLUMN order_date TYPE varchar(16);