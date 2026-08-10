<h3 class="mt-3 text-primary">Cliente</h3>

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
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="txtemail" placeholder="Email">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 d-flex gap-2">
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar">
                <a href="?p=clientes" class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>
</div>

<?php
if(filter_input(INPUT_POST, 'btnsalvar')){
    $id = filter_input(INPUT_POST, 'txtid');
    $nome = filter_input(INPUT_POST, 'txtnome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'txtemail', FILTER_SANITIZE_EMAIL);

    include_once '../models/Cliente.php';

    $cli = new Cliente();
    $cli->setId($id);
    $cli->setNome($nome);
    $cli->setEmail($email);

    if($cli->inserir()){
?>
        <div class="alert alert-primary mt-3">Cliente cadastrado com sucesso</div>
        <meta http-equiv="refresh" content="0.2;URL=?p=clientes">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3">Erro ao cadastrar cliente</div>
        <meta http-equiv="refresh" content="0.2;URL=?p=clientes">
<?php
    }
}
?>