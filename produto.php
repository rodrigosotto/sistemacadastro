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
            <div class="form-group">
                <label for="fotoProduto">Enviar Foto do Produto</label>
                <input type="file" name="fotoProduto" class="form-control-file" id="fotoProduto" placeholder="envie uma foto com no maximo 1MB de tamanho">
            </div>
            <div class="form-group">
                <label for="infoProduto">Informações adicionais</label>
                <textarea class="form-control-plaintext" id="infoProduto" name="infoProduto" rows="4"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Adicionar itens"/>
            <?php if (isset($inseridoSucesso)) : ?>
                <div class="alert alert-success <?= $inseridoSucesso["style"] ?>">
                    <?php echo $inseridoSucesso["msg"]; ?>
                </div>
            <?php endif; ?>
        </form>

<div class="table-responsive-sm table-list-products">

    <h1 class="text-center text-black-50">Lista de Produtos Cadastrados</h1>

    <table class="table">
            <tr>
                <th>Cód.</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Info Adicional</th>
                <th>Data e Hora</th>
            </tr>

        <?php foreach ($produtos as $produto): ?>

            <tr>
                <th><?php $produto["codigo"]; ?></th>
                <th><?php $produto["foto"]; ?></th>
                <th><?php $produto["nome"]; ?></th>
                <th><?php $produto["categoria"]; ?></th>
                <th><?php $produto["valor"]; ?></th>
                <th><?php $produto["info_adicional"]; ?></th>
                <th><?php $produto["data_hora"]; ?></th>
            </tr>
            <?php endforeach; ?>
        </table>
</div>

    </div>

<?php include("footer.php"); ?>