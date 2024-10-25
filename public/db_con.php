<?php
    $host = 'localhost'; 
    $db   = 'teste_crud';
    $user = 'root'; 
    $port = '3306';
    $pass = ''; 


    $con = new mysqli($host, $user, $pass, $db, $port);

    if ($con->connect_error) {
        die("Conexão falhou: " . $con->connect_error);
    }


?>  