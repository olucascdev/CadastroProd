<?php 
    include_once 'Controller/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
   <div>
        <form action="Controller/Cadastro.php" method="post">
            <h1>Cadastrar</h1>
            <label for="email">Email: </label><br>
            <input type="email" name="email" id="email" placeholder="Email"><br>
            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" id="senha" placeholder="Senha"><br>
            <label for="senhaconfirm">Confirmar Senha: </label><br>
            <input type="password" name="senhaconfirm" id="senhaconfirm" placeholder="Confirmar Senha"><br>

            <input type="submit" name="Cadastrar" id="Cadastrar" placeholder="Cadastrar" value="Cadastrar">


        </form>

   </div> 
    <a href="home.php">Voltar</a>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>