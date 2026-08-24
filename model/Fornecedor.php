<?php //não precisa fechar

declare(strict_types=1) //exige a tipificação dos atributos e métodos

class Fornecedor 
{
    //a interrogação indica que podew ser null (ex: ?int)  
    private ?int $id = null;
    private string $nome;
    private string $cidade;


    public function getId() : ?int  
    {
         return $this->id; 
         }
         
    public function setId(?int $id) : self //self indica retorno é do próprio objeto
    {
        $this->id = $id; 
        return $this;
        }

    public function getNome() : string
    {
         return $this->nome; 
         }
         
    public function setNome(string $nome) : self 
    {
        $this->nome = $nome; 
        return $this;
        }

    public function getCidade() : string
    {
         return $this->cidade; 
         }

    public function setCidade(string $cidade) : self 
    {
         $this->cidade = $cidade; 
         return $this;
         }
}
