<?php
    include('../db_con.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['produtos'])) {
        $produtosIds = $_POST['produtos'];
        $ids = '';

        foreach ($produtosIds as $index => $id) {
            $ids .= $id;
            if ($index < count($produtosIds) - 1) {
                $ids .= ',';
            }
        }
        
        $stmt = $con->prepare("DELETE FROM produtos WHERE prod_id IN ($ids)");
        $stmt->execute();
        header("Location: ../index.php");
      
    } else {
        header("Location: ../index.php");
        
    }
    
?>
