CREATE DATABASE cadastro

CREATE TABLE aluno (
id INT(10) AUTO_INCREMENT NOT NULL,
nome VARCHAR (50) NOT NULL,
email VARCHAR  (100) NOT NULL,
senha VARCHAR (30) NOT NULL,
PRIMARY KEY(id)
);
