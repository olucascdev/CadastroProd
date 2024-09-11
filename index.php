<?php 
    include_once 'Controller/conexao.php';

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastro Produtos</title>
</head>
<body>
    <div class="container">
        <form action="Controller/salvar.php" method="post" enctype="multipart/form-data">

            <h1>Cadastre seu Produto</h1>
            <!-- CODIGO -->
            <label for="codigo">Código: </label><br>
            <input type="number" id="codigo" name="codigo" readonly value="<?php 
                        echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>"><br>
            <!-- NOME DO PRODUTO -->
            <label for="nome">Nome do Produto: </label><br>
            <input type="text" id="nome" name="nome" required value="<?php 
                        echo filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>"><br>
            <!-- VALOR -->
            <label for="valor">Valor: </label><br>
            <input type="text" id="valor" name="valor" required value="<?php 
                        echo filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>"> <br>
            <!-- QUANTIDADE -->
            <label for="quantidade">Quantidade: </label><br>
            <input type="number" id="qtd" name="qtd" required value="<?php 
                        echo filter_input(INPUT_GET, "qtd", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>"> <br>
                        
            <!-- IMAGEM -->
            <label for="imagem">Imagem do Produto: </label><br>
            <input type="file" id="imagem" name="imagem" value="<?php 
                        echo filter_input(INPUT_GET, "imagem", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>"> <br>

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
            <div class="col m-5">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tabela para exibir produtos cadastrados -->
                <table class="table table-light table-hover m-5" border = 1 cellspacing = 0 cellpadding = 10>
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
                    <tbody>
                    <?php 
                        $i = 1;
                        $rows = mysqli_query($conn, "SELECT * FROM produto ORDER BY prod_id asc");
                        ?>
                        <?php foreach($rows as $row) : ?>
                        <tr>
                           <td><?php echo $i++; ?></td>
                           <td><?php echo $row["prod_nome"]; ?></td> <!-- Mudar o nome para name caso der erro-->
                           <td><?php echo $row["prod_valor"]; ?></td>
                           <td><?php echo $row["prod_qtd"]; ?></td>
                           <td><img src="img/<?php echo $row['prod_imagem']; ?>"  width="64px" title="<?php echo $row['prod_imagem']; ?>"> </td>     
                           <td>
                                    <!-- Botão de Editar -->
                                    <a href="?
                                    &codigo=<?php echo $row['prod_id']; ?>&nome=<?php echo $row['prod_nome']; ?>&valor=<?php echo $row['prod_valor']; ?>&qtd=<?php echo $row['prod_qtd']; ?>">
                                    <img src="styles/imagens/editar.png" alt="Editar" width="32px">
                                </a>
                            </td>
                            <td>
                                <a href="Controller/excluir.php?codigo=<?php echo $row['prod_id']; ?>"><img src="styles/imagens/excluir.png" alt="" width="32px">
                            </a>
                            </td>

                        </tr>
                        <?php endforeach;?>                              

                           
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>