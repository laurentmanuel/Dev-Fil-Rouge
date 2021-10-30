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
        mdp_user Varchar (100),
        is_admin Int);

#------------------------------------------------------------
# Table: news
#------------------------------------------------------------

CREATE TABLE news(
        id_news Int auto_increment primary key not null,
        title_news varchar(50),
        text_news Longtext,
        createdOn timestamp NOT NULL DEFAULT current_timestamp,
        id_user Int);

/*ajout foreign key*/
alter table news
add constraint fk_id_user_users
foreign key(id_user)
references users(id_user) on delete cascade; 

#------------------------------------------------------------
# Table: reservations
#------------------------------------------------------------

CREATE TABLE reservations(
        id_reserv Int auto_increment primary key not null,
        date_reserv Date,
        nb_people Int,
        id_user Int,
        createdOn timestamp NOT NULL DEFAULT current_timestamp);
        
/*ajout foreign key*/
alter table reservations
add constraint fk_id_user
foreign key(id_user)
references users(id_user) on delete cascade;
	
#------------------------------------------------------------
# Table: avis
#------------------------------------------------------------

CREATE TABLE avis(
        id_avis Int auto_increment primary key not null,
        note Int,
        title_avis varchar(100),
        comments Text NOT NULL,
        id_user Int,
        createdOn timestamp NOT NULL DEFAULT current_timestamp);
        
/*ajout foreign key*/
alter table avis
add constraint fk_avis_id_user
foreign key(id_user)
references users(id_user) on delete cascade;