CREATE DATABASE testdb;

USE testdb;

CREATE TABLE category (
  id INT NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE product (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  price DECIMAL(10, 2),
  category_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES category(id)
);


CREATE TABLE cart (
  cart_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  qty INT NOT NULL,
  PRIMARY KEY (cart_id)
);