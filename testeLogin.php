<?php 
    session_start();
    include_once 'Controller/conexao.php';

    

    if(isset($_POST['entrar']) && !empty($_POST['email'] && !empty($_POST['senha'])))
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM user WHERE user_email = '$email' and user_senha = '$senha'";

        $result = $conn->query($sql);

        print_r($sql);
        print_r($result);

        if(mysqli_num_rows($result) < 1 )
        { //caso nao exista
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: home.php ');
            

        }else{ //caso exista
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php ');
        }
    }
?>