create schema task;

create table info(
id int auto_increment not null primary key,
full_name varchar(40),
email varchar(30),
age int(2),
race varchar(30),
height int,
dob date
);

create table login(
password int(5),
Email varchar(30));