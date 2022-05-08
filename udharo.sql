CREATE DATABASE udharo;

CREATE TABLE `accounts` (
  `uid` int(255) DEFAULT NULL,
  `aid` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
);

CREATE TABLE `balance` (
  `bid` int(255) NOT NULL AUTO_INCREMENT,
  `aid` int(255) DEFAULT NULL,
  `balance` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `bDate` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `aid` (`aid`),
  CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`)
);

CREATE TABLE `connectedEmails` (
  `eid` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`eid`)
);

CREATE TABLE `users` (
  `uid` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
);

create table logs (
  lid int(255) primary key auto_increment not null,
  details varchar(255) not null,
  uid int(255),
  foreign key (uid) references users(uid)
);