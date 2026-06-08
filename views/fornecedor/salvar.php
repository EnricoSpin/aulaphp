<h3 class="mt-3 text-primary">Fornecedor</h3>

<div class="card shadow mt-3">
    <form method="post" name="formSalvar" id="formSalvar" class="m-3">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtid" placeholder="ID">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtnome" placeholder="Nome">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cidade</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtcidade" placeholder="Cidade">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 d-flex gap-2">
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar">
                <a href="?p=fornecedores" class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
</div>

<?php
if(filter_input(INPUT_POST, 'btnsalvar')){
    $id = filter_input(INPUT_POST, 'txtid');
    $nome = filter_input(INPUT_POST, 'txtnome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'txtcidade', FILTER_SANITIZE_SPECIAL_CHARS);
    
    include_once '../models/Fornecedor.php';

    $forn = new Fornecedor();
    $forn->setId($id);
    $forn->setNome($nome);
    $forn->setCidade($cidade);

    if($forn->salvar()){
?>
        <div class="alert alert-primary mt-3">Fornecedor cadastrado com sucesso</div>
        <meta http-equiv="refresh" content="0.2;URL=?p=fornecedores">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3">Erro ao cadastrar fornecedor</div>
        <meta http-equiv="refresh" content="0.2;URL=?p=fornecedores">
<?php
    }
}
?>