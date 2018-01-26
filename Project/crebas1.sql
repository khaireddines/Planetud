/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  23/01/2018 3:04:49 PM                    */
/*==============================================================*/


drop table if exists AnneeUniversitaire;

drop table if exists Classe;

drop table if exists Cours;

drop table if exists Depatement;

drop table if exists Enseignant;

drop table if exists Etudiant;

drop table if exists Formation;

drop table if exists Groupe;

drop table if exists Matiere;

drop table if exists Niveau;

drop table if exists Semestre;

drop table if exists Session;

drop table if exists Tp;

drop table if exists UniteD_enseignement;

drop table if exists association1;

drop table if exists association4;

drop table if exists association9;

/*==============================================================*/
/* Table : AnneeUniversitaire                                   */
/*==============================================================*/
create table AnneeUniversitaire
(
   idSession            int not null,
   primary key (idSession)
);

/*==============================================================*/
/* Table : Classe                                               */
/*==============================================================*/
create table Classe
(
   idClass              int not null,
   idNiv                int not null,
   nb                   int,
   primary key (idClass)
);

/*==============================================================*/
/* Table : Cours                                                */
/*==============================================================*/
create table Cours
(
   idMat                int not null,
   primary key (idMat)
);

/*==============================================================*/
/* Table : Depatement                                           */
/*==============================================================*/
create table Depatement
(
   idDept               int not null,
   nomDept              varchar(254),
   primary key (idDept)
);

/*==============================================================*/
/* Table : Enseignant                                           */
/*==============================================================*/
create table Enseignant
(
   idEns                int not null,
   nomEns               varchar(254),
   prenomEns            varchar(254),
   cinEns               int,
   emailEns             varchar(254),
   telEns               int,
   primary key (idEns)
);

/*==============================================================*/
/* Table : Etudiant                                             */
/*==============================================================*/
create table Etudiant
(
   idEtud               int not null,
   idGroupe             int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   cin                  int,
   dateNais             datetime,
   adresse              varchar(254),
   email                varchar(254),
   primary key (idEtud)
);

/*==============================================================*/
/* Table : Formation                                            */
/*==============================================================*/
create table Formation
(
   idForm               int not null,
   idSession            int not null,
   idDept               int not null,
   nomForm              varchar(254),
   abrForm              smallint,
   descriptionForm      varchar(254),
   primary key (idForm)
);

/*==============================================================*/
/* Table : Groupe                                               */
/*==============================================================*/
create table Groupe
(
   idGroupe             int not null,
   idClass              int not null,
   nb                   int,
   nomGroupe            varchar(254),
   primary key (idGroupe)
);

/*==============================================================*/
/* Table : Matiere                                              */
/*==============================================================*/
create table Matiere
(
   idMat                int not null,
   nomMat               varchar(254),
   coef                 int,
   creditMat            int,
   vomHCours            int,
   volHTd               int,
   volHTp               int,
   primary key (idMat)
);

/*==============================================================*/
/* Table : Niveau                                               */
/*==============================================================*/
create table Niveau
(
   idNiv                int not null,
   idForm               int not null,
   nomNiv               varchar(254),
   primary key (idNiv)
);

/*==============================================================*/
/* Table : Semestre                                             */
/*==============================================================*/
create table Semestre
(
   idSession            int not null,
   primary key (idSession)
);

/*==============================================================*/
/* Table : Session                                              */
/*==============================================================*/
create table Session
(
   idSession            int not null,
   nomSession           varchar(254),
   primary key (idSession)
);

/*==============================================================*/
/* Table : Tp                                                   */
/*==============================================================*/
create table Tp
(
   idMat                int not null,
   primary key (idMat)
);

/*==============================================================*/
/* Table : UniteD_enseignement                                  */
/*==============================================================*/
create table UniteD_enseignement
(
   idUnite              int not null,
   nomUnite             varchar(254),
   natureUnite          varchar(254),
   elementUe            varchar(254),
   totalVolumeHorairre  int,
   creditUe             int,
   coefUe               int,
   primary key (idUnite)
);

/*==============================================================*/
/* Table : association1                                         */
/*==============================================================*/
create table association1
(
   idEns                int not null,
   idDept               int not null,
   primary key (idEns, idDept)
);

/*==============================================================*/
/* Table : association4                                         */
/*==============================================================*/
create table association4
(
   For_idForm           int not null,
   Uni_idUnite          int not null,
   idUnite              int,
   idForm               int,
   primary key (For_idForm, Uni_idUnite)
);

/*==============================================================*/
/* Table : association9                                         */
/*==============================================================*/
create table association9
(
   idMat                int not null,
   idNiv                int not null,
   primary key (idMat, idNiv)
);

alter table AnneeUniversitaire add constraint FK_Generalisation_1 foreign key (idSession)
      references Session (idSession) on delete restrict on update restrict;

alter table Classe add constraint FK_association5 foreign key (idNiv)
      references Niveau (idNiv) on delete restrict on update restrict;

alter table Cours add constraint FK_Generalisation_3 foreign key (idMat)
      references Matiere (idMat) on delete restrict on update restrict;

alter table Etudiant add constraint FK_association7 foreign key (idGroupe)
      references Groupe (idGroupe) on delete restrict on update restrict;

alter table Formation add constraint FK_association2 foreign key (idDept)
      references Depatement (idDept) on delete restrict on update restrict;

alter table Formation add constraint FK_association8 foreign key (idSession)
      references Session (idSession) on delete restrict on update restrict;

alter table Groupe add constraint FK_association6 foreign key (idClass)
      references Classe (idClass) on delete restrict on update restrict;

alter table Niveau add constraint FK_association3 foreign key (idForm)
      references Formation (idForm) on delete restrict on update restrict;

alter table Semestre add constraint FK_Generalisation_2 foreign key (idSession)
      references Session (idSession) on delete restrict on update restrict;

alter table Tp add constraint FK_Generalisation_4 foreign key (idMat)
      references Matiere (idMat) on delete restrict on update restrict;

alter table association1 add constraint FK_association1 foreign key (idDept)
      references Depatement (idDept) on delete restrict on update restrict;

alter table association1 add constraint FK_association1 foreign key (idEns)
      references Enseignant (idEns) on delete restrict on update restrict;

alter table association4 add constraint FK_association4 foreign key (For_idForm)
      references Formation (idForm) on delete restrict on update restrict;

alter table association4 add constraint FK_association4 foreign key (Uni_idUnite)
      references UniteD_enseignement (idUnite) on delete restrict on update restrict;

alter table association9 add constraint FK_association9 foreign key (idMat)
      references Matiere (idMat) on delete restrict on update restrict;

alter table association9 add constraint FK_association9 foreign key (idNiv)
      references Niveau (idNiv) on delete restrict on update restrict;

