<?php

declare(strict_types=1)

require_once '../model/Conn.php';
require_once '../model/Fornecedor.php';

class FornecedorDAO 
{
    private PDO $conn;
    private string $tabela = "fornecedor"

    public function __construct()
    {
        $this->conn = new Conn()
    }

    private function texto(string $texto): string
    {
        return mb_strtoupper(trim($texto));
    }
    
    public function salvar(Fornecedor $fornecedor) : bool
    {
        if ($fornecedor->getId() == null)
            {
                $sql = "INSERT INTO fornecedor (nome, cidade) VALUES (?, ?)";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(1, $this->texto($fornecedor->getNome()));
                $stmt->bindValue(2, $this->texto($fornecedor->getCidade()));
            } else {
                
                $sql = "UPDATE fornecedor SET nome = ?, cidade = ? WHERE id = ?"

                $stmt = $this->conn->prepare($sql)
                $stmt->bindValue(1, $this->texto($fornecedor->getNome()));
                $stmt->bindValue(2, $this->texto($fornecedor->getCidade()));
                $stmt->bindValue(3, $fornecedor->getId())
            }
            return $stmt->execute();
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM {$this->tabela} ORDER BY var_nome";
        $executar = $this->conn->query($sql);
        return $executar->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarPorId(int $id): ?Fornecedor
    {
        $sql = "SELECT * FROM {$this->tabela} WHERE var_id = ?";
        $executar->bindValue(1, $id);
        $executar->execute();
        $dados = $executar->fetchAll(PDO::FETCH_ASSOC);

        if(!$dados){
                return null;
            }

        $fornecedor = new Fornecedor();
        $fornecedor->setId($dados["id"]);
        $fornecedor->setNome($dados["nome"]);
        $fornecedor->setCidade($dados["cidade"]);  
        
        return $fornecedor
    }

    public function excluir(int $id) : bool
    {
        $sql = "DELETE FROM {$this->tabela} ORDER BY var_nome";
        $executar = $this->conn->prepare($sql);
        $executar->bindValue(1, $id);
        return $executar->execute();
    }  

}
