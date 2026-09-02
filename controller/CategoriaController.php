<?php //não precisa fechar quando só tem php 
//Controller é o gerente que controla como intermediário entre o model, dao e o view


//exige/obriga a tipificação dos atributos e métodos (pode cair na prova)
declare(strict_types=1);

require_once "../model/Categoria.php";
require_once "../dao/CategoriaDAO.php";

class CategoriaController
{
    private Categoria $categoria;
    private CategoriaDAO $dao;

    public function __construct()
    {
        $this->categoria = new Categoria();
        $this->dao = new CategoriaDAO();
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function salvar(): bool
    {
        $this->categoria->setNome(filter_input(INPUT_POST, "txtnome"));
        $this->categoria->setInformacoes(filter_input(INPUT_POST, "txtinformacoes"));

        return $this->dao->salvar($this->categoria);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->exlcuir($id)
    }
}