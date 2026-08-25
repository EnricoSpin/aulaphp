<?php //não precisa fechar quando só tem php

//exige/obriga a tipificação dos atributos e métodos (pode cair na prova)
declare(strict_types=1)

class Categoria
{
    //tipificação (int, string, etc) nos atributos e métodos
    //a interrogarração indica que pode ser nulo/null
    private ?int $id = null;
    private string $nome;
    private string $informacoes;

    public function getId(): ?int
     {
        return $this->id;
        }
        
    public function setId(?int $id): self  //O método retorna um objeto da própria classe. 
    {
        //$this é o próprio objeto
        $this->id = $id;
        return $this;
        }

    public function getNome(): string
    {
        return $this->nome;
        }
        
    public function setNome(string $nome): self
    {
        $this->nome = trim($nome); //trim tira o espaço do inicio e do final
        return $this;
        }

    public function getInformacoes(): string
    {
        return $this->informacoes;
        }
        
    public function setInformacoes(string $informacoes): self 
    {
        $this->informacoes = trim($informacoes);
        return $this;
        }
}
        
