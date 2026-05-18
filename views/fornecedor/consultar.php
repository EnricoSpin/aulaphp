<div class="col-sm-12 mb-4">
    
    <div class="card shadow mb-4">

        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Fornecedores
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/fornecedor"><i class="bi bi-database-fill-add"></i></a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once '../models/Fornecedor.php';
                    $forn = new Fornecedor();
                    $dados = $forn->listar();
                    foreach($dados as $mostrar) {
                    ?>
                    <tr>
                        <td><?= $mostrar['var_id'] ?></td>
                        <td><?= $mostrar['var_nome'] ?></td>
                        <td><?= $mostrar['var_cidade'] ?></td>
                        <td>Editar e Excluir</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>