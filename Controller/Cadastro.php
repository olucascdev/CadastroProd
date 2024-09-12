<?php 
    include_once 'conexao.php';

    
    if(isset($_POST['Cadastrar']))
    {
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $senhaconfirm = $_POST['senhaconfirm'];

    
    
    
    if($senha === $senhaconfirm){
        $sql= "INSERT INTO user (user_email, user_senha, user_senha2) VALUES ('$email','$senha','$senhaconfirm')";

        if($conn->query($sql) === TRUE){
            echo "
                <script>
                    alert('User cadastrado com sucesso, parabens pelo basico');
                    window.location.href='../cadastroUser.php';
                </script>";
            
        } else {

            
            echo "Erro ao cadastrar, burro: " .$conn->error;
        }
    } else {
        echo "
        <script>
            alert('Senha ta diferente, Animal');
            window.location.href='../cadastroUser.php';
        </script>";
    }
} 

?>