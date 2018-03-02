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
        idUser       Int ,
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
        useMdp         Varchar (500) ,
        useNmbrComment Int ,
        useEntryDate   Date ,
        useNmbrPosted  Int ,
		useRole 	   VARCHAR (50),	
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_category
#------------------------------------------------------------

CREATE TABLE t_category(
        idCategory int (11) Auto_increment  NOT NULL ,
        catName    Varchar (50) ,
        PRIMARY KEY (idCategory )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_author
#------------------------------------------------------------

CREATE TABLE t_author(
        idAuthor   int (11) Auto_increment  NOT NULL ,
        autName    Varchar (50) ,
        autSurname Varchar (50) ,
        PRIMARY KEY (idAuthor )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_editor
#------------------------------------------------------------

CREATE TABLE t_editor(
        idEditor int (11) Auto_increment  NOT NULL ,
        ediName  Varchar (50) ,
        PRIMARY KEY (idEditor )
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
# Table: t_define
#------------------------------------------------------------

CREATE TABLE t_define(
        idCategory Int NOT NULL ,
        idBook     Int NOT NULL ,
        PRIMARY KEY (idCategory ,idBook )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_edit
#------------------------------------------------------------

CREATE TABLE t_edit(
        ediYear  Year ,
        idBook   Int NOT NULL ,
        idAuthor Int NOT NULL ,
        PRIMARY KEY (idBook ,idAuthor )
)ENGINE=InnoDB;

INSERT INTO `t_user` (`idUser`, `useNom`, `usePrenom`, `useMail`, `useMdp`, `useNmbrComment`, `useEntryDate`, `useNmbrPosted`,`useRole`) VALUES
(1, 'Default', 'Default', 'default@default.default', 'Default', NULL, '2018-02-01', NULL , 'admin');

#------------------------------------------------------------
# Table: t_create
#------------------------------------------------------------

CREATE TABLE t_create(
        idBook   Int NOT NULL ,
        idEditor Int NOT NULL ,
        PRIMARY KEY (idBook ,idEditor )
)ENGINE=InnoDB;

ALTER TABLE t_book ADD CONSTRAINT FK_t_book_idUser FOREIGN KEY (idUser) REFERENCES t_user(idUser);
ALTER TABLE t_comment ADD CONSTRAINT FK_t_comment_idBook FOREIGN KEY (idBook) REFERENCES t_book(idBook);
ALTER TABLE t_comment ADD CONSTRAINT FK_t_comment_idUser FOREIGN KEY (idUser) REFERENCES t_user(idUser);
ALTER TABLE t_define ADD CONSTRAINT FK_t_define_idCategory FOREIGN KEY (idCategory) REFERENCES t_category(idCategory);
ALTER TABLE t_define ADD CONSTRAINT FK_t_define_idBook FOREIGN KEY (idBook) REFERENCES t_book(idBook);
ALTER TABLE t_edit ADD CONSTRAINT FK_t_edit_idBook FOREIGN KEY (idBook) REFERENCES t_book(idBook);
ALTER TABLE t_edit ADD CONSTRAINT FK_t_edit_idAuthor FOREIGN KEY (idAuthor) REFERENCES t_author(idAuthor);
ALTER TABLE t_create ADD CONSTRAINT FK_t_create_idBook FOREIGN KEY (idBook) REFERENCES t_book(idBook);
ALTER TABLE t_create ADD CONSTRAINT FK_t_create_idEditor FOREIGN KEY (idEditor) REFERENCES t_editor(idEditor);
