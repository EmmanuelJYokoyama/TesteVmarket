<?php
    include('../db_con.php');
    $id = $_GET['id'];
    $sql = $con->query("SELECT * FROM fornecedores WHERE forn_id = $id");

    $fornecedor = $sql->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['forn_nome'];
        $email = $_POST['forn_email'];
        $telefone = $_POST['forn_tel'];
        $endereco = $_POST['forn_end'];

        $con->query("UPDATE fornecedores SET forn_nome='$nome', forn_email='$email', forn_tel='$telefone', forn_end='$endereco' WHERE forn_id = $id");

        header("Location: create.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <nav class="navbar bg-gray-500 p-5">
            <div class="container mx-auto flex justify-between items-center">
                <a href="../../public/index.php" class="text-white text-4xl font-bold">HOME</a>

                <div class="hidden md:flex space-x-4 pr-10" id="navbar-links">
                    <a href="fornecedores_crud/create.php" class="text-white text-2xl">Fornecedor</a>
                    <a href="produtos_crud/create.php" class="text-white text-2xl">Produtos</a>
                </div>
            </div>
        </nav>
    </header>

    <header>
        <h1>Editar Fornecedor</h1>
    </header>

    <main>
        <section>
            <form method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="forn_nome" value="<?= $fornecedor['forn_nome']; ?>" placeholder="Nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="forn_email" value="<?= $fornecedor['forn_email']; ?>" placeholder="Email" required>

                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="forn_tel" value="<?= $fornecedor['forn_tel']; ?>" placeholder="Telefone" required>

                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="forn_end" value="<?= $fornecedor['forn_end']; ?>" placeholder="Endereço" required>

                <button type="submit">Salvar</button>
            </form>
        </section>

        <section>
            <a href="delete.php?id=<?= $fornecedor['forn_id']; ?>">
                <button type="button">Excluir</button>
            </a>
            <a href="create.php">
                <button type="button">Voltar</button>
            </a>
        </section>
    </main>
</body>

</html>