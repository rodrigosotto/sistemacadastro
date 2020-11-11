<?php require ("header.php"); ?>

    <div class="container container-produtos">

        <h1 class="title-produtos text-black-50 text-center">Cadastro de Produtos</h1>

        <form enctype="multipart/form-data" method="POST" action="cadastrar_produto.php">
            <div class="form-group">
                <label for="nomeProduto">Nome do produto</label>
                <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" aria-describedby="produtoHelp">
            </div>
            <div class="form-group">
                <label for="categoriaProduto">Categoria</label>
                <input type="text" name="categoriaProduto" class="form-control" id="categoriaProduto" placeholder="Digite a categoria do produto">
            </div>
            <div class="form-group">
                <label for="valorProduto">Valor unitário (R$)</label>
                <input type="text" name="valorProduto" class="form-control" id="valorProduto">
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="situacao" name="situacao" value="on">
                <label class="form-check-label" for="situacao">HABILITADO</label> -->
            <div class="form-group mt-3">
                <label for="fotoProduto">Enviar Foto do Produto</label>
                <input type="file" name="fotoProduto" class="form-control-file" id="fotoProduto" placeholder="envie uma foto com no maximo 1MB de tamanho">
            </div>
            <div class="form-group">
                <label for="infoProduto">Informações adicionais</label>
                <textarea class="form-control-plaintext border" id="infoProduto" name="infoProduto" rows="4"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Adicionar itens"/>
            <a href="./dashboard.php" class="btn btn-info" role="button">Voltar para dashboard</a>
            <?php if (isset($inseridoSucesso)) : ?>
                <div class="alert alert-success <?= $inseridoSucesso["style"] ?>">
                    <?php echo $inseridoSucesso["msg"]; ?>
                </div>
            <?php endif; ?>
        </form>

    </div>

<?php include("footer.php"); ?>