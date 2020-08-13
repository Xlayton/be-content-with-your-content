-- Create database --------------------------------------------------------
create database if not exists site_generator_db;

-- Use created database ---------------------------------------------------
use site_generator_db;

-- Create tables ----------------------------------------------------------
create table if not exists websiteUsers(
    id int not null auto_increment primary key,
    Name varchar(20) not null,
    IsAdmin tinyInt,
    IsLoggedIn tinyInt
);

create table if not exists websiteTemplates(
    id int not null auto_increment primary key,
    PageTitle varchar(25) Not null,
    PageHeader text,
    PageTextContent text,
    ParentPage int default 0,
    SortOrder int default 2,
    IsEnabled tinyInt 
);

-- Create user to use database instead of root user -----------------------
create user if not exists 'contentUser'@'localhost' identified by 'imNotActuallyContent';
grant all privileges on site_generator_db.* to contentUser@localhost;
flush privileges;

-- insert filler data -----------------------------------------------------
insert into websiteUsers (Name,isAdmin,IsLoggedIn)
values ('Admin', 1, 0)
on duplicate key update
Name='Admin', IsAdmin=1, IsLoggedIn=0;

insert into websiteUsers (Name,isAdmin,IsLoggedIn)
values ('User', 0, 1)
on duplicate key update
Name='User', IsAdmin=0, IsLoggedIn=1;

-- Main web pages ---------------------------------------------------------
insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Home", "Home Page", "Choose a page or subpage to see what our website can do",0,0,1)
on duplicate key update
PageTitle="Home", PageHeader="Home Page", PageTextContent="Choose a page or subpage to see what our website can do", ParentPage=0,
SortOrder=0, IsEnabled=1;

insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("About", "About Us", "Learn more about us in the subpages",0,1,1)
on duplicate key update
PageTitle="About", PageHeader="About Us", PageTextContent="Learn more about us in the subpages", ParentPage=0,
SortOrder=1, IsEnabled=1;

insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Contact", "Contact Us", "Find our contact info on one of the subpages",0,2,1)
on duplicate key update
PageTitle="Contact", PageHeader="Contact Us", PageTextContent="Find our contact info on one of the subpages", ParentPage=0,
SortOrder=2, IsEnabled=1;

-- About sub pages ---------------------------------------------------------
insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Who We Are", "Who We Are", "This site was made by Eric, Clayton, Lua, Lene, and Logan",2,1,1)
on duplicate key update
PageTitle="Who We Are", PageHeader="Who We Are", PageTextContent="This site was made by Eric, Clayton, Lua, Lene, and Logan", ParentPage=2,
SortOrder=1, IsEnabled=1;

insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Inspiration", "Why We Made This", "This was made for our 'Be Content with Your Content' assignment",2,2,1)
on duplicate key update
PageTitle="Inspiration", PageHeader="Why We Made This", PageTextContent="This was made for our 'Be Content with Your Content' assignment", 
ParentPage=2, SortOrder=2, IsEnabled=1;

-- Contact sub pages --------------------------------------------------------
insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Contact By Phone", "Contact By Phone", "Call us at (555)-444-9876",3,1,1)
on duplicate key update
PageTitle="Contact By Phone", PageHeader="Contact By Phone", PageTextContent="Call us at (555)-444-9876", ParentPage=3,
SortOrder=1, IsEnabled=1;

insert into websiteTemplates (PageTitle,PageHeader,PageTextContent,ParentPage,SortOrder,IsEnabled)
values ("Contact By Email", "Contact By Email", "Email us at johndoe@example.com",3,2,1)
on duplicate key update
PageTitle="Contact By Email", PageHeader="Contact By Email", PageTextContent="Email us at johndoe@example.com", ParentPage=3,
SortOrder=2, IsEnabled=1;