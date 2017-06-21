#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `TP2` CHARACTER SET 'utf8';
USE `TP2`;

#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        id               int (11) Auto_increment  NOT NULL ,
        lastName         Varchar (50) NOT NULL ,
        firstName        Varchar (50) NOT NULL ,
        birthDate        Date NOT NULL ,
        address          Text NOT NULL ,
        zipCode          Char (5) NOT NULL ,
        phoneNumber      Char (10) NOT NULL ,
        id_statutMarital Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: statutMarital
#------------------------------------------------------------

CREATE TABLE statutMarital(
        id     int (11) Auto_increment  NOT NULL ,
        statut Varchar (50) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: credit
#------------------------------------------------------------

CREATE TABLE credit(
        id           int (11) Auto_increment  NOT NULL ,
        organization Varchar (50) NOT NULL ,
        amount       DECIMAL (15,3)  NOT NULL ,
        id_client    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;

ALTER TABLE client ADD CONSTRAINT FK_client_id_statutMarital FOREIGN KEY (id_statutMarital) REFERENCES statutMarital(id);
ALTER TABLE credit ADD CONSTRAINT FK_credit_id_client FOREIGN KEY (id_client) REFERENCES client(id);
INSERT INTO statutMarital (statut) VALUES('Célibataire'), ('Concubinage'), ('Divorcé'), ('Marié'), ('Veuf');
