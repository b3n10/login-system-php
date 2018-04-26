-- drop database first if exists --
DROP DATABASE IF EXISTS reg_login_db;

CREATE DATABASE reg_login_db;

USE reg_login_db;

CREATE TABLE users (
	id int(5) not null AUTO_INCREMENT PRIMARY KEY,
	first_name varchar(256) not null,
	last_name varchar(256) not null,
	email_address varchar(256) not null,
	user_name varchar(256) not null,
	password varchar(256) not null
);

