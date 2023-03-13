CREATE DATABASE book_store_db;

USE book_store_db;
CREATE TABLE `user` (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(50),
  password VARCHAR(50),
  phone VARCHAR(50),
  PRIMARY KEY (id)
);
CREATE TABLE category (
  id INT NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE product (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  description	TEXT,
  publisher varchar(50),
  author varchar(50),
  first_publish varchar(50),
  language varchar(50),
  page INT,
  image VARCHAR(100),
  price DECIMAL(10, 2),
  category_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE orders (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  total_price DECIMAL(10, 2),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id)
);


CREATE TABLE cart (
  cart_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  qty INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  order_id INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (product_id) REFERENCES product(id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE slides (
  slide_number INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255),
  content TEXT,
  image VARCHAR(255),
  showSlide boolean
);
-- Create the visitors table
CREATE TABLE visitors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  ip_address VARCHAR(45),
  page VARCHAR(255),
  user_agent TEXT,
  date DATETIME,
);


CREATE TABLE product_comments (
    comment_id INT AUTO_INCREMENT,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    comment_text TEXT NOT NULL,
    created_date DATETIME NOT NULL ,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (product_id) REFERENCES product (id),
    FOREIGN KEY (user_id) REFERENCES user (id)
);


INSERT INTO `category`(`id`, `category_name`) VALUES ('1','popular');
INSERT INTO `category`(`id`, `category_name`) VALUES ('2','motivation');

INSERT INTO user(id, first_name, last_name, email, password, phone) VALUES ('1','test','lg','test@example','123','12345678');