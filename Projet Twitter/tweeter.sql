 CREATE DATABASE twitter;

use twitter;

CREATE TABLE users (

     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     username VARCHAR(20) NOT NULL,
     pass TEXT NOT NULL,
     mail VARCHAR(30) NOT NULL,
     birthdate DATE NOT NULL,
     firstname VARCHAR(30) NOT NULL,
     lastname VARCHAR(30) NOT NULL,
     profile_picture VARCHAR(255) NOT NULL
);
    
CREATE TABLE posts (

     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     id_user INT NOT NULL,
     content TEXT NOT NULL,
     created_at DATETIME NOT NULL,
     image_url VARCHAR(255),
     hashtags TEXT,
     tags TEXT
);
    
    
CREATE TABLE follow (

     from_user INT NOT NULL,
     to_user INT NOT NULL,
     status VARCHAR(1) NOT NULL
);
    

CREATE TABLE messages (
   
     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     from_user INT NOT NULL,
     to_user INT NOT NULL,
     content TEXT NOT NULL,
     created_at DATETIME NOT NULL
);
    
    
CREATE TABLE comments (
   
     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     id_user INT NOT NULL,
     id_post INT NOT NULL,
     content TEXT NOT NULL,
     created_at DATETIME NOT NULL
);