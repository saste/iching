-- execute this script with root access

create database if not exists iching;

use iching;

create table if not exists `users` (
  `id` int(16) not null auto_increment,
  `nickname` varchar(64) not null,
  `creation_date` date not null,
  `password` varchar(64) not null,
  primary key (`id`)
);

create table if not exists `questions` (
  `id` int(16) not null auto_increment,
  `user_id` int(16) not null,
  `question` text,
  `question_date` date not null,
  primary key (`id`)
);

-- grant privileges to dedicated user

create user 'iching'@'localhost' identified by 'iching';
grant all on iching.* to 'iching'@'localhost';
