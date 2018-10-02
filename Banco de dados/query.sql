use sys;

drop database TCC;

create database TCC;

use TCC;



create table TbEmpresas(
IdEmpresa int NOT NULL AUTO_INCREMENT,
NmUsuario varchar(100)NOT NULL,
Senha varchar(100)NOT NULL,
Email varchar(150)NOT NULL,
NmEmpresa varchar(100)NOT NULL,
CNPJ varchar(14)NOT NULL,
Razao varchar(100)NOT NULL,
CEP int NOT NULL,
Estado varchar(100)NOT NULL,
Cidade varchar(100)NOT NULL,
Bairro varchar(100)NOT NULL,
Endereco varchar(225)NOT NULL,
Numero int,
Complemento char(1),
primary key (IdEmpresa)
)default charset = utf8;

create table TbCandidatos(
IdCandidato int NOT NULL AUTO_INCREMENT,
NmUsuario varchar(100)NOT NULL,
Senha varchar(100)NOT NULL,
NmCandidato varchar(100) NOT NULL,
Email varchar(150)NOT NULL,
primary key (IdCandidato)
)default charset = utf8;

create table TbMensagens(
IdMensagem int NOT NULL AUTO_INCREMENT,
fk_IdContato int,
foreign key(fk_IdContato) references TbContatos(IdContato),
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
Mensagem varchar(225),
primary key (IdMensagem)
)default charset = utf8;

create table TbContatos(
IdContato int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
primary key (IdContato)
);

insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,Complemento)
values('EmpresaUsuario','SenhaEmpresa','Empresa@teste1','NeoService','12345678910111','Testerazao',00000001,'São Paulo','São Paulo','TesteBairro','TesteEndereço',1,'A');

insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,Complemento)
values('EmpresaUsuario','SenhaEmpresa','Empresa@teste2','eEmpresa Teste','12345678910111','Testerazao',00000001,'São Paulo','São Paulo','TesteBairro','TesteEndereço',1,'A');


insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email)
values('CandidatoUsuario','SenhaCandidato','Antonio','candidato@teste');


insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email)
values('Candidato2','Senha2','Douglas','candidato@teste2');



insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(1,1);
insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(1,2);
insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(2,2);

insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,1,null,'Essas mensagens');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,1,null,'Já estavam inseridas');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,1,null,'No Banco de dados');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,null,1,'Inclusive a minha');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,null,1,'O candidato');


insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(2,1,null,'Teste de mensagens');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(2,1,null,'2 contato');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(2,null,2,'com a 1 empresa');
insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(2,null,2,'e o 2 candidato');

select * from TbContatos;


select a.NmEmpresa,
b.NmCandidato,
c.IdContato,
d.Mensagem

from TbEmpresas a
inner join TbContatos c
on a.IdEmpresa = c.fk_IdEmpresa
inner join TbCandidatos b
on b.IdCandidato = c.fk_IdCandidato
inner join TbMensagens d
on d.fk_IdContato = c.IdContato;



select a.NmEmpresa,
b.NmCandidato

from TbEmpresas a
inner join TbContatos c
on a.IdEmpresa = c.fk_IdEmpresa
inner join TbCandidatos b
on b.IdCandidato = c.fk_IdCandidato
where a.IdEmpresa = 1;

select * from tbmensagens;

select a.NmEmpresa,
b.NmCandidato,
c.fk_IdEmpresa,
c.fk_IdCandidato,
c.Mensagem,
d.IdContato

from TbEmpresas a inner join
tbcontatos d
on a.IdEmpresa = d.fk_IdEmpresa
inner join TbCandidatos b 
on b.IdCandidato = d.fk_IdCandidato
inner join TbMensagens c
on c.fk_idcontato = d.idcontato
 
where d.IdContato =1
;

select * from tbmensagens;

select a.Email,
a.Senha

from tbempresas a;

select * from tbempresas;

DELETE FROM TbEmpresas where IdEmpresa = 3;

select b.Email,
b.Senha

from tbcandidatos b;

select * from tbcandidatos;
select * from tbempresas;

