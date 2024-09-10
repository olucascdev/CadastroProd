<?php 
    include_once 'Controller/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
</head>
<body>
    <div class="container">
        <form action="Controller/salvar.php" method="post" enctype="multipart/form-data">

            <h1>Cadastre seu Produto</h1>
            <!-- CODIGO -->
            <label for="codigo">Código: </label><br>
            <input type="number" id="codigo" name="codigo" readonly><br>
            <!-- NOME DO PRODUTO -->
            <label for="nome">Nome do Produto: </label><br>
            <input type="text" id="nome" name="nome" required><br>
            <!-- VALOR -->
            <label for="valor">Valor: </label><br>
            <input type="text" id="valor" name="valor" required><br>
            <!-- QUANTIDADE -->
            <label for="quantidade">Quantidade: </label><br>
            <input type="number" id="qtd" name="qtd" required><br>
            <!-- IMAGEM -->
            <label for="imagem">Imagem do Produto: </label><br>
            <input type="file" id="imagem" name="imagem"><br>

            <!-- NOVO -->
            <a href="index.php">
                <button type="button">Novo</button>
            </a>
            <!-- SALVAR -->
            <button type="submit">Salvar</button>


        </form>


    </div>
    <!-- Seção de lista de produtos cadastrados -->
    <div class="container2">
        <div class="row">
            <div class="col">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tabela para exibir produtos cadastrados -->
                <table class="table table-light table-hover" border = 1 cellspacing = 0 cellpadding = 10>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Valor</th>
                            <th>Quantidade</th>
                            <th>Imagem</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                            
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

    </div>
</body>
</html>