<?php 
    include_once 'config.php';

    if ($conn->connect_errno) {
        // Se houver um erro de conexão, exibe uma mensagem de erro e encerra o script
        echo "Falha na conexão: " . $conn->connect_error;
        exit();
    }



?>