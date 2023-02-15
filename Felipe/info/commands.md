1 - Criar uma base de dados com o nome projeto_cadastro.

CREATE DATABASE
    projeto_cadastro
DEFAULT CHARACTER SET
    utf8
DEFAULT COLLATE
    utf8_general_ci;

2 - Tabelas usuários e produtos

CREATE TABLE
    projeto_cadastro.tb_users ( id_user int NOT NULL AUTO_INCREMENT, nome varchar(50) NOT NULL, login varchar(50), senha varchar(50), ativo int, data_nascimento date, data_criacao datetime, PRIMARY KEY (id_user) )
DEFAULT CHARSET = utf8;

ALTER TABLE projeto_cadastro.tb_usuarios MODIFY COLUMN data_criacao timestamp DEFAULT current_timestamp NULL;

CREATE TABLE
    projeto_cadastro.tb_products ( id_product int NOT NULL AUTO_INCREMENT, nome_produto varchar(50) NOT NULL, categoria varchar(50), ativo int, data_criacao datetime, PRIMARY KEY (id_product) )
DEFAULT CHARSET = utf8;

ALTER TABLE projeto_cadastro.tb_produtos MODIFY COLUMN data_criacao timestamp DEFAULT CURRENT_TIMESTAMP NULL;
