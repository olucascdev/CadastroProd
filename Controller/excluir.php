<?php 
include_once 'conexao.php';

// Recebe o valor do parâmetro 'codigo' da URL e o sanitiza para evitar XSS (Cross-Site Scripting)
$codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_NUMBER_INT);

if ($codigo) {
    // Cria a consulta SQL para recuperar o nome da imagem associada ao produto
    $sql = "SELECT prod_imagem FROM produto WHERE prod_id = $codigo";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && $linha = mysqli_fetch_assoc($resultado)) {
        // Obtém o nome da imagem
        $imagem = $linha['prod_imagem'];

        // Define o caminho completo para a imagem
        $caminhoImagem = '../img/' . $imagem;

        // Exclui o registro do banco de dados
        $sqlDelete = "DELETE FROM produto WHERE prod_id = $codigo";
        if (mysqli_query($conn, $sqlDelete)) {
            // Verifica se o arquivo da imagem existe e exclui
            if (file_exists($caminhoImagem)) {
                unlink($caminhoImagem);
            }

            // Exibe mensagem de sucesso e redireciona
            echo "
                <script>
                    alert('Registro excluído com sucesso');
                    window.location.href='../index.php';
                </script>
            ";
        } else {
            // Se a exclusão do banco falhar
            echo "
                <script>
                    alert('Erro ao excluir registro do banco de dados');
                    window.location.href='../index.php';
                </script>
            ";
        }
    } else {
        // Se não encontrar o produto
        echo "
            <script>
                alert('Produto não encontrado');
                window.location.href='../index.php';
            </script>
        ";
    }
} else {
    // Se o ID não for válido
    echo "
        <script>
            alert('ID inválido');
            window.location.href='../index.php';
        </script>
    ";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
