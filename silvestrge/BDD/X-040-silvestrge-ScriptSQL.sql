#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS db_book;
CREATE DATABASE db_book;
USE db_book;
#------------------------------------------------------------
# Table: t_book
#------------------------------------------------------------

CREATE TABLE t_book(
        idBook       int (11) Auto_increment  NOT NULL ,
        booTitle     Varchar (50) ,
        booPages     Int ,
        booExtrait   Varchar (100) ,
        booSummary   Mediumtext ,
        booFrontPage Varchar (50) ,
        booAuthor    Varchar (100) ,
        booEditor    Varchar (100) ,
        booEdiYear   Varchar (100) ,
        idUser       Int ,
        idCategory   Int ,
        PRIMARY KEY (idBook )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_user
#------------------------------------------------------------

CREATE TABLE t_user(
        idUser         int (11) Auto_increment  NOT NULL ,
        useNom         Varchar (50) ,
        usePrenom      Varchar (50) ,
        useMail        Varchar (50) ,
        useMdp         Varchar (50) ,
        useNmbrComment Int ,
        useEntryDate   Date ,
        useNmbrPosted  Int ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_comment
#------------------------------------------------------------

CREATE TABLE t_comment(
        idComment      int (11) Auto_increment  NOT NULL ,
        comEvaluation  Int ,
        comText        Mediumtext ,
        comWritingDate Datetime ,
        idBook         Int ,
        idUser         Int ,
        PRIMARY KEY (idComment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_Category
#------------------------------------------------------------

CREATE TABLE t_Category(
        idCategory int (11) Auto_increment  NOT NULL ,
        catName    Varchar (100) ,
        PRIMARY KEY (idCategory )
)ENGINE=InnoDB;

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1, 'Fantasy'),
(2, 'Romance'),
(3, 'Science-fiction'),
(4, 'Polar'),
(5, 'Historique');

ALTER TABLE t_book ADD CONSTRAINT FK_t_book_idUser FOREIGN KEY (idUser) REFERENCES t_user(idUser);
ALTER TABLE t_book ADD CONSTRAINT FK_t_book_idCategory FOREIGN KEY (idCategory) REFERENCES t_Category(idCategory);
ALTER TABLE t_comment ADD CONSTRAINT FK_t_comment_idBook FOREIGN KEY (idBook) REFERENCES t_book(idBook);
ALTER TABLE t_comment ADD CONSTRAINT FK_t_comment_idUser FOREIGN KEY (idUser) REFERENCES t_user(idUser);
