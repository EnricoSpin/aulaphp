    <?php
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        include_once '../models/Fornecedor.php';
        $forn = new Fornecedor();
        $forn->setId($id);

        if ($forn->crudphp('E')) {
    ?>
            <div class="alert alert-primary" role="alert">
                Excluído com sucesso
            </div>
    <?php
        }
    }
    ?>
    <meta http-equiv="refresh" CONTENT="1;URL=?p=fornecedores">