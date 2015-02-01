drop database DKTDatabase;
create database DKTDatabase;
use DKTDatabase;

create table staff(
	DNI varchar(9) primary key,
	user varchar(20) not null,
	password varchar(20) not null,
	userType enum("Administrator", "Editor") not null
);	

create table usergroup(
 	DNI varchar(9) primary key,
	userName varchar(40) not null,
	userSurname varchar(40) not null,
	password char(20) not null,
	dateBirth date not null,
	address varchar(200) not null,
	phoneNumber int(9) not null,
	email varchar(40) not null,
	nameSport enum("Futbol", "Futbol Sala","Baloncesto") not null,
	image varchar(200) not null
);

create table sport(
	idSport int(2) primary key,
	nameSport enum("Futbol", "Futbol Sala","Baloncesto") not null
);

create table playerSport(
 	idPlayer varchar(9),
	idSport int(2) unsigned,
	idChampionship int(2) unsigned,
	PRIMARY KEY (`idPlayer`, `idSport`,`idChampionship`)
);

create table team(
	idTeam int(4) primary key,
	idSport int(2) not null,
	idChampionship int(2) not null,
	nameTeam varchar(40) not null,
	played int(2) not null,
	points int(4) not null,
	won int(2) not null,
	draw int(2) not null,
	lost int(2) not null,
	scored int(4) not null,
	conceded int(4) not null,
	difference int(4) not null,
	image varchar(200) not null
);

create table prize(
	idPrize int(4) unsigned auto_increment primary key,
	idSport int(2) not null,
	namePrize varchar(40) not null,
	year int(4) not null,
	image varchar(200) not null
);

create table championship(
	idChampionship int(2) primary key,
	idSport int(6) not null,
	nameChampionship varchar(40) not null,
	year int(4) not null
);

create table championshipPlayer{
	idChampionship int(2) unsigned,
	DNI varchar(9),
	position varchar(20) not null,
	dorsal int(2),
	gamesPlayed int(2),
	goals int(2),
	assists int(2),
	yellowCards int(2),
	redCards int(2),
	PRIMARY KEY (`idChampionship`, `DNI`)
}

create table sportDay(
	idSportDay int(4) unsigned auto_increment primary key,
	sportDay int(4) not null,
	dateDay date not null,
	place varchar(40) not null,
	sportName enum("Futbol", "Futbol Sala","Baloncesto") not null,
	firstTeam varchar(40) not null,
	secondTeam varchar(40) not null,
	goalsFirstTeam int(2) not null,
	goalsSecondTeam int(2) not null
);

create table news(
	idNew int(6) unsigned auto_increment primary key,
	sportNew enum("Futbol", "Futbol Sala","Baloncesto") not null,
	dateNew date not null,
	timeNew time not null,
	title varchar(200) not null,
	content text not null,
	image varchar(200) not null
);

create table payment(
	idPayment int(6) unsigned auto_increment primary key,
	idPerson varchar(9) not null,
	months varchar(40) not null
);

create table image(
	idImage int(6) unsigned auto_increment primary key,
	pathImage varchar(200) not null
);

create table comments(
	idComment int(6) unsigned auto_increment primary key,
	idRelated int(6) not null,
	topic varchar(20) not null,
	nickname varchar(20) not null,
	dateComment date not null,
	content text not null
);


create table matches(
	idMatch int(4) primaty key,
	nameMatch
	idChampionship
	firstTeam
	secondTeam
	date
	time	
	place
);