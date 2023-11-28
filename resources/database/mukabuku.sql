DROP DATABASE IF EXISTS mukabuku;

CREATE DATABASE mukabuku;

USE mukabuku;

DROP TABLE IF EXISTS akun;

CREATE TABLE akun (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  username varchar(50) NOT NULL
);

INSERT INTO akun (email, pass, username) VALUES ('fern@gmail.com','fern12345','Fern Aerell');
INSERT INTO akun (email, pass, username) VALUES ('eric@gmail.com','eric12345','Eric Ramadhan');
INSERT INTO akun (email, pass, username) VALUES ('niko@gmail.com','niko12345','Niko Nikonik');

DROP TABLE IF EXISTS chat_global;

CREATE TABLE chat_global (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) NOT NULL,
  isi_chat varchar(1000) NOT NULL
);

INSERT INTO chat_global (username, isi_chat) VALUES ('Admin','Selamat datang di chat global, chat ini di refresh setiap 5 detik...');