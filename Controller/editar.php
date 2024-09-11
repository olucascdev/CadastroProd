<?php 
    include_once 'conexao.php';
    
    // Recebe os dados do formulário e sanitiza
    $codigo = filter_input(INPUT_POST, "codigo", FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
    $qtd = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_NUMBER_INT);
    
    // Verifica se há uma nova imagem enviada
    if (!empty($_FILES["imagem"]["name"])) {
        $nomeImagem = $_FILES["imagem"]["name"];
        $nometmp = $_FILES["imagem"]["tmp_name"];

        // Validação de extensão da imagem
        $validarImagem = ['jpg', 'png', 'jpeg'];
        $imagemExtensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
        
        if (in_array($imagemExtensao, $validarImagem)) {
            $novoNomeImagem = uniqid() . '.' . $imagemExtensao;
            move_uploaded_file($nometmp, '../img/' . $novoNomeImagem);
        } else {
            echo "
                <script>
                    alert('Extensão de imagem inválida');
                    window.location.href='editar.php?codigo=$codigo';
                </script>
            ";
            exit;
        }
    }

    // Verifica se está atualizando um produto existente
    if ($codigo > 0) {
        // Se há uma nova imagem, inclui na query, caso contrário, apenas atualiza os outros dados
        if (!empty($novoNomeImagem)) {
            $query = "UPDATE produto SET prod_nome='$nome', prod_qtd=$qtd, prod_valor=$valor, prod_imagem='$novoNomeImagem' WHERE prod_id=$codigo;";
        } else {
            $query = "UPDATE produto SET prod_nome='$nome', prod_qtd=$qtd, prod_valor=$valor WHERE prod_id=$codigo;";
        }
    }

    // Executa a consulta
    if (mysqli_query($conn, $query)) {
        echo "
            <script>
                alert('Editado com Sucesso');
                window.location.href='../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Erro ao editar');
                window.location.href='../index.php';
            </script>
        ";
    }

    // Fecha a conexão
    mysqli_close($conn);
?>
