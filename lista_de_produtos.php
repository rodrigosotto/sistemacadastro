<?php require ("header.php"); ?>

<?php include("listar_produto.php"); ?>

<div class="table-responsive-sm table-list-products">
<?php if(count($produtos) > 0) { ?>

    <h1 class="text-center text-black-50">Lista de Produtos Cadastrados</h1>

    <table class="table text-lg-center">
        <tr>
            <th>Cód.</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Valor KG</th>
            <th>Info Adicional</th>
            <th>Data e Hora</th>
            <th>Deletar Produto</th>
        </tr>

        <?php foreach ($produtos as $p):?>
            <tr>
                <th><?php echo $p["codigo"]; ?></th>
                <th><?php echo $p["foto"]; ?></th>
                <th><?php echo $p["nome"]; ?></th>
                <th><?php echo $p["categoria"]; ?></th>
                <th><?php echo $p["valor"]; ?></th>
                <th><?php echo $p["info_adicional"]; ?></th>
                <th><?php echo $p["data_hora"]; ?></th>
                <th><button class="btn-danger btn-sm" onclick="return confirm('produto removido')">Deletar</button> <button class="btn-warning btn-sm">Editar</button></th>
            </tr>

        <?php endforeach; ?>

        <?php }else { ?>
            <div class="alert-danger p-5">
            <h1 class="text-center text-black-50">Nenhum Produto Cadastrado</h1>
            <p class="text-center text-black-50">para cadastrar um novo produto clique no botão abaixo</p><br>
            </div>
        <?php } ?>


    </table>
    <div class="text-center p-3">
    <a href="./dashboard.php" class="btn btn-info" role="button">Voltar para dashboard</a>
    <a href="./cadastrar_produto.php" class="btn btn-info" role="button">Cadastrar um novo produto</a>
    </div>
</div>

<?php include("footer.php"); ?>
