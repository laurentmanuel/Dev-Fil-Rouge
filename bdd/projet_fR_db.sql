#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

create database projet_fR_db;

use projet_fR_db;

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user int auto_increment primary key not null,
        name_user Varchar (50),
        first_name_user Varchar (50),
        email_user Varchar (50),
        mdp_user Varchar (100));/*,
        admin_user Bool);*/

#------------------------------------------------------------
# Table: news
#------------------------------------------------------------

CREATE TABLE news(
        id_news int auto_increment primary key not null,
        text_news Longtext,
        date_news Date,
        id_user Int);

/*ajout foreign key*/
alter table news
add constraint fk_id_user_users
foreign key(id_user)
references users(id_user);

#------------------------------------------------------------
# Table: attractions
#------------------------------------------------------------

CREATE TABLE attractions(
        id_attraction int auto_increment primary key not null,
        age_min_attraction Int,
        max_people_attraction Int);

#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
        id_order int auto_increment primary key not null,
        date_order Date,
        nb_people int,
        id_user int,
        createdOn timestamp NOT NULL DEFAULT current_timestamp,
        updatedOn timestamp NOT NULL DEFAULT current_timestamp);
        
/*ajout foreign key*/
alter table orders
add constraint fk_id_user
foreign key(id_user)
references users(id_user);
	
#------------------------------------------------------------
# Table: avis
#------------------------------------------------------------

CREATE TABLE avis(
        id_avis int auto_increment primary key not null,
        note_attraction Int NOT NULL,
        comment_attraction Text NOT NULL,
        id_attraction Int);
        
/*ajout foreign key*/
alter table avis
add constraint fk_id_attraction
foreign key(id_attraction)
references attractions(id_attraction);