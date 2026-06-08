<h3 class="mt-3 text-primary"> Funcionário </h3> 
<div class="card shadow mt-3"> 
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data"> 

        <div class="form-group row"> 
            <label for="txtid" class="col-sm-2 col-form-label"> ID </label> 
            <div class="col-sm-10"> 
                <input type="text" class="form-control" id="txtid" name="txtid" placeholder="ID do funcionário" value="" required> 
            </div> 
        </div>     

        <div class="form-group row"> 
            <label for="txtnome" class="col-sm-2 col-form-label"> Nome </label> 
            <div class="col-sm-10"> 
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Nome do funcionário" value="" required> 
            </div> 
        </div> 
        
        <div class="form-group row"> 
            <label for="txtemail" class="col-sm-2 col-form-label"> Email </label> 
            <div class="col-sm-10"> 
                <input type="email" name="txtemail" id="txtemail" placeholder="email@exemplo.com" class="form-control" required> 
            </div> 
        </div> 
        
        <div class="form-group row"> 
            <label for="txtcargo" class="col-sm-2 col-form-label"> Cargo </label> 
            <div class="col-sm-10"> 
                <input type="text" name="txtcargo" id="txtcargo" placeholder="Cargo do funcionário" class="form-control" required> 
            </div> 
        </div> 
        
        <div class="form-group row"> 
            <div class="col-sm-10 d-flex gap-2"> 
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar"> 
                <a href="?p=funcionarios" class="btn btn-danger"> Cancelar </a> 
            </div> 
        </div> 
        
    </form> 
</div> 

<?php 
// Verificar se o botão btnsalvar foi acionado 
if(filter_input(INPUT_POST, 'btnsalvar')){ 

    $id = filter_input(INPUT_POST, 'txtid');
    $nome = filter_input(INPUT_POST, 'txtnome'); 
    $email = filter_input(INPUT_POST, 'txtemail'); 
    $cargo = filter_input(INPUT_POST, 'txtcargo'); 
    
    // Acesso à classe (em models) 
    include_once '../models/Funcionario.php'; 
    
    // Instanciar a classe 
    $func = new Funcionario(); 
    
    // Enviando os dados do form aos atributos da classe 
    $func->setId($id); 
    $func->setNome($nome); 
    $func->setEmail($email); 
    $func->setCargo($cargo); 
    
    // Efetivar o insert into (salvar) 
    if($func->salvar()) { 
        ?> 
        <div class="alert alert-primary mt-3" role="alert"> 
            Cadastro de funcionário efetuado com sucesso! 
        </div> 
        <meta http-equiv="refresh" content="0.5;URL=?p=funcionarios"> 
        <?php 
    } else { 
        ?> 
        <div class="alert alert-danger mt-3" role="alert"> 
            Erro ao cadastrar funcionário 
        </div> 
        <meta http-equiv="refresh" content="0.5;URL=?p=funcionarios"> 
        <?php 
    } 
} 
?>
