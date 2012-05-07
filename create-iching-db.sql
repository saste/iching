-- execute this script with root access

create database if not exists iching;

use iching;

create table if not exists `users` (
  `id` int(16) not null auto_increment,
  `nickname` varchar(64) not null unique,
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

-- to add an entry - manually:
-- insert into users (nickname, creation_date, password) values("barfoo", CURRENT_DATE(), "foobar");
