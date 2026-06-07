CREATE DATABASE aula_php;
USE aula_php;

CREATE TABLE categoria(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_informacoes VARCHAR(255)
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

CREATE TABLE funcionario(
    var_id INT PRIMARY KEY,
    var_nome VARCHAR(100),
    var_email VARCHAR(150) NOT NULL,
    var_cargo VARCHAR(100) NOT NULL
);

DELIMITER $$
CREATE PROCEDURE salvar_categoria(
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_informacoes VARCHAR(255)
)
BEGIN
    INSERT INTO categoria(var_id, var_nome, var_informacoes)
    VALUES (var_id, var_nome, var_informacoes);
END$$
DELIMITER ;

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

DELIMITER $$
CREATE PROCEDURE salvar_funcionario(
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_email VARCHAR(150),
    IN var_cargo VARCHAR(100)
)
BEGIN
    INSERT INTO funcionario(var_id, var_nome, var_email, var_cargo) 
    VALUES (var_id, var_nome, var_email, var_cargo);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE listar_categoria(IN p_id INT)
BEGIN
    SELECT var_id, var_nome, var_informacoes FROM categoria
    WHERE p_id IS NULL OR var_id = p_id;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE listar_cliente(IN p_id INT)
BEGIN
    SELECT var_id, var_nome, var_email FROM cliente
    WHERE p_id IS NULL OR var_id = p_id;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE listar_fornecedor(IN p_id INT)
BEGIN
    SELECT var_id, var_nome, var_cidade FROM fornecedor
    WHERE p_id IS NULL OR var_id = p_id; 
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE listar_funcionario (IN p_id INT)
BEGIN
    SELECT var_id, var_nome, var_email, var_cargo FROM funcionario 
    WHERE p_id IS NULL OR var_id = p_id

CALL salvar_categoria(100, 'Veículos', 'Carros');
CALL salvar_categoria(200, 'Produtos', 'Alimentos');

CALL salvar_cliente(1, 'João', 'joao@email.com');
CALL salvar_cliente(2, 'Pedro', 'pedro@email.com');

CALL salvar_fornecedor(123, 'Fornecedor De Alimentos', 'Salto');
CALL salvar_fornecedor(234, 'Fornecedor de Peças Automotivas ', 'Sorocaba');

CALL salvar_funcionario(011, 'Maria', 'maria@gmail.com', 'Desenvolvedora Front-End')
CALL salvar_funcionario(028, 'Caio', 'caio@gmail.com', 'Analista de Dados')

CALL listar_categoria(null);
CALL listar_cliente(null);
CALL listar_fornecedor(null);
CALL listar_funcionario(null);