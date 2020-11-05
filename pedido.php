<?php require('header.php'); ?>

<div class="container">

    <h1>Escolher itens do pedido</h1>

    <form method="POST" action="cadastrar_pedido.php">
        <div class="form-group">
            <label for="nomeProduto">Nome do produto</label>
            <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" aria-describedby="produtoHelp">
        </div>
        <div class="form-group">
            <label for="qtdProduto">Quantidade</label>
            <input type="number" name="qtdProduto" class="form-control" id="qtdProduto">
        </div>
        <div class="form-group">
            <label for="precoProduto">Preço</label>
            <input type="text" name="precoProduto" class="form-control" id="precoProduto">
        </div>
        <div class="form-group">
            <label for="obsProduto">Observações</label>
            <textarea class="form-control-plaintext" id="obsProduto" name="obsProduto" rows="10"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar produto"/>
        <?php if (isset($inseridoSucesso)) : ?>
            <div class="alert alert-success <?= $inseridoSucesso["style"] ?>">
                <?php echo $inseridoSucesso["msg"]; ?>
            </div>
        <?php endif; ?>
    </form>
    
</div>


<?php require('footer.php'); ?>
