CREATE DATABASE IF NOT EXISTS madydb;
USE madydb;

CREATE TABLE IF NOT EXISTS test01 (
    id int AUTO_INCREMENT not null,
    nombre varchar(255),
    email varchar(255),
    qr_data varchar(255),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS process (
    id INT NOT NULL AUTO_INCREMENT,
    process VARCHAR(255),
    state VARCHAR(255),
    qr_data VARCHAR(255),
    PRIMARY KEY (id)
);