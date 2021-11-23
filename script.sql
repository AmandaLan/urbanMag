CREATE DATABASE urban;

USE urban;

CREATE TABLE users (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(255) NOT NULL
);

CREATE TABLE passeword_reset (
    id INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL,
	token VARCHAR(100) NOT NULL
);