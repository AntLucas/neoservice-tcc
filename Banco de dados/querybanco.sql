use sys;

drop database neoservice;

create database neoservice;

use neoservice;

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
biografia varchar(150) null,
foto varchar(50)not null,
primary key (IdEmpresa)
)default charset = utf8;

create table TbCandidatos(
IdCandidato int NOT NULL AUTO_INCREMENT,
NmUsuario varchar(100)NOT NULL,
Senha varchar(100)NOT NULL,
NmCandidato varchar(100) NOT NULL,
Email varchar(150)NOT NULL,
bdat date NOT NULL,
cep varchar(10) NOT NULL,
estado varchar(2)NOT NULL,
cidade varchar(50)NOT NULL,
bairro varchar(100)NOT NULL,
rua varchar(225)NOT NULL,
biografia varchar(150) NULL,
xp varchar(150) NULL,
ingles varchar(30) NULL,
formacao varchar (150) NULL,
profissao varchar (50) NULL,
foto varchar(50)not null,
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

create table TbSolicitacao(
IdSolicitacao int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
primary key (IdSolicitacao)
);

create table TbCompetencias(
IdCompetencia int NOT NULL AUTO_INCREMENT,
competencia varchar(50) null,
primary key (IdCompetencia)
);

create table TbCompetenciaRelacao(
IdRelacao int NOT NULL AUTO_INCREMENT,
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
fk_IdCompetencia int,
foreign key(fk_IdCompetencia) references TbCompetencias(IdCompetencia),
primary key (IdRelacao)
);

create table TbVagas(
IdVaga int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
vaga varchar(50) not null,
salario decimal(10,2) not null,
horario varchar(50) not null,
descricao varchar(100) not null,
primary key (IdVaga)
);

update tbvagas set vaga = 'aeeeee', salario = '120.00', horario = '10:00' , descricao = 'dificil' where fk_IdEmpresa = 1;

select * from tbvagas;

insert into TbVagas(fk_IdEmpresa,vaga,salario,horario,descricao)
values(1,'Programador','130.00','06:00','dificil');




select * from TbContatos where fk_IdCandidato = '1' and fk_IdEmpresa='2';
insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,biografia,foto)
values('EmpresaUsuario','SenhaEmpresa','Empresa@teste1','NeoService','12345678910111','Testerazao',00000001,'SP','São Paulo','TesteBairro','TesteEndereço',1,'','user.jpg');

insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,biografia,foto)
values('EmpresaUsuario2','SenhaEmpresa','Empresa@teste2','eEmpresa Teste','12345678910111','Testerazao',00000001,'SP','São Paulo','TesteBairro','TesteEndereço',1,'','user.jpg');




insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,bdat,cep,estado,cidade,bairro,rua,biografia,xp,ingles,formacao,profissao,foto)
values('CandidatoUsuario','SenhaCandidato','Antonio','candidato@teste','2018-11-05','08090211','SP','São Paulo','Jardim Helena','Rua das Avenidas','Edite esse campo','Edite esse campo','Edite esse campo','Edite esse campo','Edite esse campo','user.jpg');


insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,bdat,cep,estado,cidade,bairro,rua,biografia,xp,ingles,formacao,profissao,foto)
values('Candidato2','Senha2','Douglas','candidato@teste2','2018-11-05','03570480','SP','São Paulo','Parque Savoy City','Rua Julia Antonieta Tepedino Guerra','Nascido no Ceará no dia 07/12/2001, ensino médio completo na escola *** e está  Cursando na universidade **** Contabilidade',
'nenhuma','Avançado','Ensino fundamental completo, Ensino médio completo, Cursando na universidade **** Contabilidade','Técnico de informática','user.jpg');

insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,bdat,cep,estado,cidade,bairro,rua,biografia,xp,ingles,formacao,profissao,foto)
values('Candidato3','SenhaCandidato','Bruno','candidato@testes','2018-11-05','03575480','SP','São Paulo','Bairro Teste','Teste','Nascido são paulo no dia 07/03/1983, ensino médio completo na escola **** e está cursando Admninistração na ETEC Zona Leste',
'Atendente de supermercado','Intermediário','Ensino fundamental completo, Ensino médio completo, Cursanddo na ETEC Zona Leste o curso de ADM','Empresário','user.jpg');

insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,bdat,cep,estado,cidade,bairro,rua,biografia,xp,ingles,formacao,profissao,foto)
values('Candidato4','SenhaCandidato','Felipe','candidato@testess','2018-11-05','03515480','SP','São Paulo','Bairro Teste','Teste','Nenhuma',
'Nenhuma','Nenhuma','Nenhuma','Nenhuma','user.jpg');

insert into TbCompetencias(competencia)
values('Informatica');
insert into TbCompetencias(competencia)
values('Relacionamento com o cliente');
insert into TbCompetencias(competencia)
values('Vendas');
insert into TbCompetencias(competencia)
values('Atendimento');


insert into TbCompetenciaRelacao (fk_IdCandidato,fk_IdCompetencia)
values(1,1);

insert into TbCompetenciaRelacao (fk_IdCandidato,fk_IdCompetencia)
values(1,3);

insert into TbCompetenciaRelacao (fk_IdCandidato,fk_IdCompetencia)
values(2,1);

insert into TbCompetenciaRelacao (fk_IdCandidato,fk_IdCompetencia)
values(4,4);




insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(1,1);
insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(1,2);
insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(2,2);

insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(2,3);

insert into TbContatos(fk_IdEmpresa,fk_IdCandidato)
values(1,4);

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

select * from tbcandidatos;
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

select * from TbCandidatos where NmUsuario = 'CandidatoUsuario';

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

select a.IdEmpresa,
				a.NmEmpresa,
				b.IdCandidato,
				b.NmCandidato,
				c.IdContato
		

				from TbEmpresas a
				inner join TbContatos c
				on a.IdEmpresa = c.fk_IdEmpresa
				inner join TbCandidatos b
				on b.IdCandidato = c.fk_IdCandidato where a.IdEmpresa = 1;

select * from Tbmensagens where IdContato = 1;
select * from tbmensagens where fk_IdEmpresa=2;
select max(IdMensagem) from Tbmensagens where fk_IdContato = 5;
select a.Email,
a.Senha

from tbempresas a;

select * from tbempresas;

select b.Email,
b.Senha

from tbcandidatos b;
select * from Contatos where fk_IdCandidato = 1 and fk_IdEmpresa=1;
delete from Tbsolicitacao where fk_idempresa =1 and fk_idCandidato = 1;
select * from tbsolicitacao;
insert into TbSolicitacao(fk_IdEmpresa,fk_IdCandidato) values(1,1);
select * from tbcontatos;

Select * from TbCompetencias;
Select * from TbCompetenciaRelacao;

select a.NmCandidato,
b.Competencia

from TbCandidatos a
inner join tbcompetenciaRelacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbcompetencias b
on b.IdCompetencia = c.fk_IdCompetencia;


Select * from tbsolicitacao;
Select * from TbContatos where fk_IdEmpresa = 1 and fk_IdCandidato= 1;
select * from tbempresas;
select * from tbcandidatos;
select * from TbVagas;
select * from TbCompetencias;
select * from TbCompetenciarelacao;
select * from tbmensagens where fk_IdEmpresa = 2;
select * from tbmensagens where fk_IdCandidato = 4;

insert into tbmensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(3,2,null,'Oi');

insert into tbmensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(4,2,null,'Oi');

select a.NmCandidato,
b.NmEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa;




select a.NmCandidato,
b.Competencia

from TbCandidatos a
inner join tbcompetenciaRelacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbcompetencias b
on b.IdCompetencia = c.fk_IdCompetencia
where IdCandidato = 2;