CREATE DATABASE IF NOT EXISTS travelSocial;
USE travelsocial;

CREATE TABLE IF NOT EXISTS userAccount (
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    hashPassword varchar(60) not null,
    email varchar(255) not null UNIQUE,
    fullname varchar(255), 
    phone int(10),
    gender varchar(10),
    avatar varchar(255)
);

CREATE TABLE IF NOT EXISTS resetPassword (
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
   	token varchar(255) not null UNIQUE,
    email varchar(255) not null,
    created datetime not null DEFAULT now(),
    availabel bit not null DEFAULT 1
);

CREATE TABLE IF NOT EXISTS post (
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
   	title varchar(255) not null DEFAULT '',
    content varchar (500) not null DEFAULT '',
    picture varchar(255) not null DEFAULT '',
    user_id int (11) not null,
    FOREIGN KEY (user_id) REFERENCES userAccount(id)
);

INSERT INTO userAccount (email, hashPassword) VALUES ( 'nganlth.devmobile@gmail.com', 
                                                      '$2y$10$LQHrB35bv.PF.JJv8VRbjeJl2rI69OjQn0JDNqfNVfEZt67Ag7IcG'
);