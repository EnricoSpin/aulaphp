<?php

declare(strict_types=1)

class Cliente
{
    //Esses são os atributos da classe.
    //Atributo é basicamente uma variável que pertence ao objeto.
    private ?int $id;
    private string $nome;
    private string $email;

    public function getId() : ?int 
    {
        return $this->id; 
        }

    public function setId(?int $id) : self 
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
    
    public function getEmail() : string
    {
        return $this->email;
        }

    public function setEmail(string $email) : self 
    {
        $this->email = $email; 
        return $this;
        }
}
