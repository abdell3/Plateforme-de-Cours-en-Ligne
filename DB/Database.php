create database Youdemy ;
use Youdemy ; 
create table roles (id int auto_increment primary key , title varchar(30) unique not null   , description text not null ) ; 
create table users (id int auto_increment primary key , prenom varchar(30) not null , nom varchar(30) not null , 
email varchar(100) not null unique , motDePasse varchar(50)  not null, image varchar(150) not null  , status varchar(30) not null  ,
 role_id int  , foreign key (role_id) references roles(id) );
 drop table cours ;
 create table categories (id int auto_increment primary key , nom varchar (20) unique not null , smallDescription text  not null, logo varchar(255));
 create table cours (id int auto_increment primary key , titre varchar(50) not null , description text not null , contenue text   not null ,
 photo varchar(200) not null , categorie_id int, user_id int  ,  foreign key (categorie_id) references categories(id));
 create table tags (id int auto_increment primary key , nom varchar (20) unique not null , smallDescription text  not null, logo varchar(255) );
 create table tagcours(  tag_id int , cour_id int , foreign key (tag_id ) references tags(id) , 
  foreign key (cour_id ) references cours(id) on DELETE CASCADE , CONSTRAINT PK_tagscours PRIMARY KEY (cour_id, tag_id)); 
  create table inscription (user_id int, cours_id int , FOREIGN KEY (user_id) REFERENCES users(id) on DELETE CASCADE ,
FOREIGN KEY (cours_id) REFERENCES cours(id)  on  DELETE  CASCADE, CONSTRAINT PK_coursetudiant PRIMARY KEY(cours_id, user_id) );