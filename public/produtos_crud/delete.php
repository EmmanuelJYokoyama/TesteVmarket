<?php
    include('../db_con.php');
    $id = $_GET['id'];

    $con->query("DELETE FROM produtos WHERE prod_id = $id");
    
    header("Location: ../index.php");
    
?>