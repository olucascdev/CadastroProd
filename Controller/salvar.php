<?php 
    include_once 'conexao.php';

    // atribuição de valores
    // filter_input(tipo_entrada, variável, filtro, opções);
    $codigo = filter_input(INPUT_POST,"codigo",FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST,"valor", FILTER_SANITIZE_SPECIAL_CHARS);
    $qtd = filter_input(INPUT_POST,"qtd", FILTER_SANITIZE_SPECIAL_CHARS);

    if (!is_null($valor)) {
        $valor = str_replace(",", ".", $valor);
    }

    // Validação para a adição da imagem ao banco de dados
    if($_FILES["imagem"]["name"] == ""){

        echo"<script> alert('Imagem nao existe'); document.location.href = 'salvar.php';</script>";
       
        }else{
    
        $nomeImagem = $_FILES["imagem"]["name"];
        $tamanhoImagem = $_FILES["imagem"]["size"];
        $nometmp = $_FILES["imagem"]["tmp_name"];
        
        $validarImagem = ['jpg','png','jpeg'];
        $imagemExtensao = explode('.',$nomeImagem);
        $imagemExtensao = strtolower(end($imagemExtensao));
    
        }if(!in_array($imagemExtensao,$validarImagem)){
        echo"<script> alert('extensão invalida'); document.location.href = 'salvar.php';</script>";
    
        }else{ 
        if ($tamanhoImagem > 10000000000){
        echo"<script> alert('muitao grande, meninao'); document.location.href = 'salvar.php';</script>";
    
        }else{
           

        
        $novoNomeImagem = uniqid();
        $novoNomeImagem .= '.' . $imagemExtensao;
        move_uploaded_file($nometmp,'../img/'. $novoNomeImagem);


        if (!empty($nome) && !empty($valor) && !empty($qtd)) {
            // Verifica se é uma atualização ou inserção
            if ($codigo > 0) {
                // Atualiza o produto existente
                $query = "UPDATE produto SET prod_nome='$nome',prod_qtd=$qtd, prod_valor=$valor, prod_imagem='$novoNomeImagem' WHERE prod_id=$codigo;";
            } else {
                // Insere um novo produto
                $query = "INSERT INTO produto (prod_nome, prod_qtd, prod_valor, prod_imagem) VALUES ('$nome', $qtd, $valor, '$novoNomeImagem')";
                
            }
        }
    }   
        }
        
        mysqli_query($conn, $query);

        if ($query) {
            echo "
                <script>
                    alert('Salvo com sucesso');
                    window.location.href='../index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Erro ao Salvar');
                    window.location.href='../index.php';
                </script>
            ";
        }
    
        mysqli_close($conn);
?>