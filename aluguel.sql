drop database if exists alugueis;
create database alugueis;
use alugueis;

create table usuario(
	idUser			int not null auto_increment primary key, 
    nome			varchar(40),
    email			varchar(40),
    senha			varchar(40)
    
);

create table casa(
	idCasa 			int not null auto_increment primary key, 
    morador			varchar(40),
    moradores		int,
    numero			int,
    localizacao 	text,
    aluguel			int    
);
create table conta(
	idConta 		int not null auto_increment primary key, 
	valor			float,
    idCasa			int not null,
    stats			varchar(10),
    vencimento		date,
    pago			date,
    foreign key(idCasa) references casa(idCasa)
);
select * from casa;

#agua: total de moradores da casa
#luz: nós(65) + rampa(35)
#internet: 30