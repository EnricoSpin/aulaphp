<div class="col-sm-12 mb-4">
    
    <div class="card shadow mb-4">

        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Funcionários
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/funcionario"><i class="bi bi-database-fill-add"></i></a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once '../models/Funcionario.php';
                    $func = new Funcionario();
                    $dados = $func->listar(null);
                    foreach($dados as $mostrar) {
                    ?>
                    <tr>
                        <td><?= $mostrar['var_id'] ?></td>
                        <td><?= $mostrar['var_nome'] ?></td>
                        <td><?= $mostrar['var_cidade'] ?></td>
                        <td>
                            <a href="?p=excluir/funcionario&id=<?= $mostrar['id'] ?>"
                            class="btn btn-danger"
                            title="Excluir"
                            onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="bi bi-x-circle"></i>
                            </a>                           
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>