<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
<header>
        <nav class="navbar bg-gray-500 p-5">
            <div class="container mx-auto flex justify-between items-center">
                <a href="index.php" class="text-white text-4xl font-bold">HOME</a>

                <div class="hidden md:flex space-x-4 pr-10" id="navbar-links">
                    <a href="fornecedores_crud/create.php" class="text-white text-2xl">Fornecedor</a>
                    <a href="produtos_crud/create" class="text-white text-2xl">Produtos</a>
                </div>
            </div>
        </nav>
    </header>

    <section class="h-screen flex flex-col justify-center items-center">

    <div class="container">
        <?php
        include "db_con.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_usuario = $_POST['nome'];
            $email_usuario = $_POST['email'];
            $senha_usuario = $_POST['senha'];

            $stmt = $con->prepare("INSERT INTO usuario (usuario_nome, usuario_login, usuario_senha) VALUES (?, ?, md5(?))");

            if (!$stmt) {
                die("Erro: " . $con->error);
            }
    
            $stmt->bind_param("sss", $nome_usuario, $email_usuario, $senha_usuario);

            if ($stmt->execute()) {
                echo "Usuário adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar usuário: " . $stmt->error; 
            }
            $stmt->close();
        }

        $con->close();
        ?>

        <form method="post">
            Nome: <input type="text" name="nome" required>
            Email: <input type="email" name="email" required>
            Senha: <input type="password" name="senha" required>
            <input type="submit" value="Adicionar Usuário">
        </form>

    </div>

    </section>


    
</body>

</html>
