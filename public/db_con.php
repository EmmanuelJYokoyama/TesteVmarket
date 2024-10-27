<?php
    $host = 'localhost'; 
    $db = 'vmarket_teste';
    $user = 'root'; 
    $port = '3306';
    $senha = ''; 

    $con = new mysqli($host, $user, $senha, $db, $port);

    if ($con->connect_error) {
        die("Conexão falhou: " . $con->connect_error);
    }

?>  