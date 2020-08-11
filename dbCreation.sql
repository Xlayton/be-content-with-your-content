-- Create database
create database if not exists site_generator_db;

-- Use created database
use site_generator_db;

-- Create tables
create table if not exists websiteUsers(
    id int not null auto_increment primary key,
    Name varchar(20) not null,
    IsAdmin tinyInt,
    IsLoggedIn tinyInt
);

create table if not exists websiteTemplates(
    id int not null auto_increment primary key,
    PageTitle varchar(25) Not null,
    PageHeader varchar(25),
    PageTextContent varchar(225),
    ParentPage int default 0,
    SortOrder int default 2,
    IsEnabled tinyInt 
);

-- Create user to use database instead of root user
create user 'contentUser'@'localhost' identified by 'imNotActuallyContent';
grant all privileges on site_generator_db.* to contentUser@localhost;
flush privileges;

-- insert filler data
