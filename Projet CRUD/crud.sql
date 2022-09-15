DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud;

USE crud;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS messages;

CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    firstname            VARCHAR(255)    NOT NULL,
    lastname            VARCHAR(255)    NOT NULL,
    email               VARCHAR(255)    NOT NULL UNIQUE,
    pass                TEXT            NOT NULL,
         
    PRIMARY KEY (id)
);

CREATE TABLE messages (
    id              INT             NOT NULL AUTO_INCREMENT,
    id_expediteur   INT             NOT NULL,
    id_destinataire INT             NOT NULL,
    messages        VARCHAR(200)            NOT NULL,

    PRIMARY KEY (id)
);






