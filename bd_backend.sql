CREATE DATABASE aula_php;
USE aula_php;

CREATE TABLE categoria(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_informacoes VARCHAR(255),
);

CREATE TABLE cliente(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_email VARCHAR(255) NOT NULL
);

CREATE TABLE fornecedor(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_cidade VARCHAR(50) NOT NULL
);

DELIMITER $$
CREATE PROCEDURE salvar_categoria(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_informacoes VARCHAR(255),
)
BEGIN
    INSERT INTO categoria(var_id, var_nome, var_informacoes)
    VALUES (var_id, var_nome, var_informacoes);
END$$
DELIMITER;

DELIMITER $$
CREATE PROCEDURE salvar_cliente(
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_email VARCHAR(255)
)
BEGIN
    INSERT INTO cliente(var_id, var_nome, var_email)
    VALUES(var_id, var_nome, var_email);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE salvar_fornecedor(
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_cidade VARCHAR(50)
)
BEGIN
    INSERT INTO fornecedor(var_id, var_nome, var_cidade)
    VALUES(var_id, var_nome, var_cidade);
END$$
DELIMITER ;

DELIMITER$$
CREATE PROCEDURE listar_categoria()
BEGIN
    SELECT var_id, var_nome, var_informacoes FROM categoria;
END$$
DELIMITER;

DELIMITER $$
CREATE PROCEDURE listar_cliente()
BEGIN
    SELECT var_id, var_nome, var_email FROM cliente;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE listar_fornecedor()
BEGIN
    SELECT var_id, var_nome, var_cidade FROM fornecedor;
END$$
DELIMITER ;

CALL salvar_categoria(100, 'Veículos', 'Carros');
CALL salvar_categoria(200, 'Produtos', 'Alimentos');

CALL salvar_cliente(1, 'João', 'joao@email.com');
CALL salvar_cliente(2, 'Pedro', 'pedro@email.com');

CALL salvar_fornecedor(123, 'Fornecedor De Alimentos', 'Salto');
CALL salvar_fornecedor(234, 'Fornecedor de Peças Automotivas ', 'Sorocaba');

CALL listar_categoria();
CALL listar_cliente();
CALL listar_fornecedor();