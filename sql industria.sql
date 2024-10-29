Create DataBase db_Industrias;

create table Pecas(
       pec_codigo             int primary key auto_increment,
       numero                 varchar(45),
       peso                   varchar(45),
       cor                    varchar(45)
);

create table Deposito(
       dep_codigo             int primary key auto_increment,
       numero                 varchar(45),
       endereco               varchar(45)
);

create table Fornecedor(
       for_codigo             int primary key auto_increment,
       numero                 varchar(45),
       endereco               varchar(45)
);

create table Projeto(
       pro_codigo             int primary key auto_increment,
       numero                 varchar(45),
       orcamento              varchar(45)
);

create table Funcionario(
       fun_codigo             int primary key auto_increment,
       numero                 varchar(45),
       salario                varchar(45),
       telefone               varchar(45)
);

create table Departamento(
       dep_codigo             int primary key auto_increment,
       numero                 varchar(45),
       setor                  varchar(45)
);

create table ItensDoProjeto(
       ite_codigo             int primary key auto_increment,
       dta_inicio             varchar(45),
       horas                  varchar(45)
);

create table usuarios(
       usu_codigo             int primary key auto_increment,
       senha                  varchar(45),
       username               varchar(45)
);    

alter table Pecas
add column for_codigo int,
add constraint fk_for_codigo foreign key (for_codigo) references Fornecedor (for_codigo); 

alter table Pecas
add column dep_codigo int,
add constraint fk_dep_codigo foreign key (dep_codigo) references Departamento (dep_codigo); 

alter table Projeto
add column fun_codigo int,
add constraint fk_fun_codigo foreign key (fun_codigo) references Funcionario (fun_codigo); 

alter table ItensDoProjeto
add column pro_codigo int,
add constraint fk_pro_codigo foreign key (pro_codigo) references Projeto (pro_codigo);

alter table ItensDoProjeto
add column pec_codigo int,
add constraint fk_pec_codigo foreign key (pec_codigo) references Pecas (pec_codigo);  

alter table Funcionarios
add column dep_codigo int,
add constraint fk_dep_codigo foreign key (dep_codigo) references Departamento (dep_codigo);





       



       
       
