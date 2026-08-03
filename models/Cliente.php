<?php

include_once "Conn.php";

class Cliente{

    private $id;
    private $nome;
    private $email;
    private $conn;
    private $tabela = "cliente";

    public function getId() {return $this->id; } 
    public function getNome() {return $this->nome;}
    public function getEmail() {return $this->email;}

    public function setId($id) {$this->id = $id; return $this;}
    public function setNome($nome) {$this->nome = $nome; return $this;}
    public function setEmail($email) {$this->email = $email; return $this;}

    public function salvar() {
        try {
            $this->conn = new Conn();
            $sql = "CALL salvar_cliente(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->email));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function listar($var_id)
    {
        try {
            $this->conn = new Conn();
            $sql = "CALL listar_cliente(?)";
            $executar = $this->conn->prepare($sql);
            $executar -> bindValue(1, $var_id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    //métodos sem procedure

    public function excluir()
    {
        try {
            $this->conn = new Conn();
            $sql = "DELETE FROM {$this->tabela} WHERE var_id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
    
     public function inserir()
    {
        try {
            $this->conn = new Conn();
            $sql = "INSERT INTO {$this->tabela} VALUES (?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this -> id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->email));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function alterar()
    {
        try {
            $this->conn = new Conn();
            $sql = "UPDATE {$this->tabela}
                    SET nome = ?, email = ?
                    WHERE id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, mb_strtoupper($this->nome));
            $executar->bindValue(2, mb_strtoupper($this->email));
            $executar->bindValue(3, $this -> id);
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function listarSemProcedure()
    {
        try {
            $this->conn = new Conn();
            $sql = "SELECT * FROM {$this->tabela} ORDER BY nome";
            $executar = $this->conn->prepare($sql);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function consultarPorId()
    {
        try {
            $this->conn = new Conn();
            $sql = "SELECT * FROM {$this->tabela} WHERE id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function crudPhp($opcao) {
        try{
            $this->conn = new Conn();
            switch ($opcao) {
                case 'I':
                    $sql = "INSERT INTO {$this->tabela} 
                        (nome, email) VALUES (?,?)";
                    $executar=$this->conn->prepare($sql);
                    $executar->bindValue(1, mb_strtoupper($this->nome));
                    $executar->bindValue(2, mb_strtoupper($this->email));
                    break;

                case 'A':
                    $sql = "UPDATE {$this->tabela}
                            SET nome = ?
                            email = ?
                            WHERE id = ?";
                    $executar=$this->conn->prepare($sql);
                    $executar->bindValue(1, mb_strtoupper($this->nome));
                    $executar->bindValue(2, mb_strtoupper($this->email));
                    $executar->bindValue(3, $this->id);
                    break;

                case 'E':
                    $sql = "DELETE FROM {$this->tabela}
                            WHERE id = ?";
                    $executar = $this->conn->prepare($sql);
                    $executar->bindValue(1, $this->id);
                    break;

                default:
                    return false;
            }
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }    
}
?>