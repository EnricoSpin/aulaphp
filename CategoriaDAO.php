<?php 

// Todos os métodos e acessos ao banco de dados

declare(strict_types=1);

require_once '../model/Conn.php';
require_once '../model/Categoria.php';

class CategoriaDAO 
{
    private PDO $conn; //atributo que faz conexão com o banco

    private string $tabela = "categoria";

    public function __construct()
    {
        $this->conn = new Conn()    
    }

    private function texto(string $texto): string //auxilio para cadastrar um texto e devolve uma string
    {
        return mb_srtoupper(trim($texto)); //mb_srtoupper deixa a string em maisculo
    }

     public function excluir(int $id): bool
    {
            //a conexão agora está no __construct()
            $sql = "DELETE FROM {$this->tabela} WHERE var_id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $id);
            return $executar->execute();    
    }

    public function listar(): array
    {
            $sql = "SELECT * FROM {$this->tabela} ORDER BY var_nome";
            $executar = $this->conn->query($sql);
            return $executar->fetchAll(PDO::FETCH_ASSOC); //fetchAll faz retornar tudo
    }

    public function consultarPorId(int $id): ?Categoria
    {
            $sql = "SELECT * FROM {$this->tabela} WHERE var_id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $id);
            $executar->execute();
            $dados = $executar->fetch(PDO::FETCH_ASSOC); //fetch faz retornar apenas um registro

            if (!$dados){
                return null;
            }

            $categoria = new Categoria();
            $categoria->setId($dados["id"]);
            $categoria->setNome($dados["nome"]);
            $categoria->setInformacoes($dados["informacoes"]);

            return $categoria;

    }

   public function salvar(Categoria $categoria): bool
    {
        if ($categoria->getId() == null) {

            $sql = "INSERT INTO categoria
                    (nome,informacoes)
                    VALUES
                    (?,?)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(1, $this->texto($categoria->getNome()));
            $stmt->bindValue(2, $this->texto($categoria->getInformacoes()));
        } else {

            $sql = "UPDATE categoria
                       SET nome=?,
                           informacoes=?
                     WHERE id=?";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(1, $this->texto($categoria->getNome()));
            $stmt->bindValue(2, $this->texto($categoria->getInformacoes()));
            $stmt->bindValue(3, $categoria->getId());
        }

        return $stmt->execute();
    }
}