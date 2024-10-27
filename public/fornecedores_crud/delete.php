<?php
    include('../db_con.php');
    $id = $_GET['id'];
    $con->query("DELETE FROM fornecedores WHERE forn_id = $id");
    header("Location: ../index.php");
    
?>