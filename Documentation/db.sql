#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: salle
#------------------------------------------------------------

CREATE TABLE salle(
  id_salle     int (11) Auto_increment  NOT NULL ,
  nom_salle    Varchar (25) ,
  tarif1       Int ,
  tarif2       Int ,
  tarif3       Int ,
  id_categorie Int ,
  PRIMARY KEY (id_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
  id_categorie       int (11) Auto_increment  NOT NULL ,
  nom_categorie      Varchar (25) ,
  horaire_dbt_reserv Time ,
  horaire_fin_reserv Time ,
  PRIMARY KEY (id_categorie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
  id_user     int (11) Auto_increment  NOT NULL ,
  identifiant Varchar (25) ,
  password    Varchar (255) ,
  PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
  id_client      int (11) Auto_increment  NOT NULL ,
  nom            Varchar (25) ,
  prenom         Varchar (25) ,
  raison_sociale Varchar (25) ,
  adresse        Varchar (25) ,
  code_postal    Varchar (25) ,
  ville          Varchar (25) ,
  telephone      Int ,
  PRIMARY KEY (id_client )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

CREATE TABLE reservation(
  id_reservation int (11) Auto_increment  NOT NULL ,
  date_dbt       Datetime ,
  date_fin       Datetime ,
  date_reserv    Datetime ,
  date_annule    Datetime ,
  id_repeat      Int ,
  id_salle       Int ,
  id_user        Int ,
  PRIMARY KEY (id_reservation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: repeat
#------------------------------------------------------------

CREATE TABLE `repeat`(
  id_repeat    int (11) Auto_increment  NOT NULL ,
  date_deb_rep Datetime ,
  date_fin_rep Datetime ,
  pas          Int ,
  PRIMARY KEY (id_repeat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: facturation
#------------------------------------------------------------

CREATE TABLE facturation(
  id_facture int (11) Auto_increment  NOT NULL ,
  date_fact  Datetime ,
  PRIMARY KEY (id_facture )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartient
#------------------------------------------------------------

CREATE TABLE appartient(
  droit     Int ,
  id_client Int NOT NULL ,
  id_user   Int NOT NULL ,
  PRIMARY KEY (id_client ,id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: seance_fact
#------------------------------------------------------------

CREATE TABLE seance_fact(
  id_reservation Int NOT NULL ,
  id_client      Int NOT NULL ,
  id_facture     Int NOT NULL ,
  PRIMARY KEY (id_reservation ,id_client ,id_facture )
)ENGINE=InnoDB;

ALTER TABLE salle ADD CONSTRAINT FK_salle_id_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_repeat FOREIGN KEY (id_repeat) REFERENCES `repeat`(id_repeat);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_salle FOREIGN KEY (id_salle) REFERENCES salle(id_salle);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_user FOREIGN KEY (id_user) REFERENCES user(id_user);
ALTER TABLE appartient ADD CONSTRAINT FK_appartient_id_client FOREIGN KEY (id_client) REFERENCES client(id_client);
ALTER TABLE appartient ADD CONSTRAINT FK_appartient_id_user FOREIGN KEY (id_user) REFERENCES user(id_user);
ALTER TABLE seance_fact ADD CONSTRAINT FK_seance_fact_id_reservation FOREIGN KEY (id_reservation) REFERENCES reservation(id_reservation);
ALTER TABLE seance_fact ADD CONSTRAINT FK_seance_fact_id_client FOREIGN KEY (id_client) REFERENCES client(id_client);
ALTER TABLE seance_fact ADD CONSTRAINT FK_seance_fact_id_facture FOREIGN KEY (id_facture) REFERENCES facturation(id_facture);


#------------------------------------------------------------
# Insertion user admin mdp admin
#------------------------------------------------------------
INSERT INTO user VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997')