<?php
    include('../db_con.php');
    $id = $_GET['id'];
    $sql = $con->query("SELECT * FROM produtos WHERE prod_id = $id");
    $produto = $sql->fetch_assoc();

    $fornecedores = $con->query("SELECT forn_id, forn_nome FROM fornecedores");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $fornecedor_id = $_POST['fornecedor_id'];

        $con->query("UPDATE produtos SET prod_nome='$nome', prod_desc='$descricao', prod_preco='$preco', forn_id='$fornecedor_id' WHERE prod_id = $id");

        header("Location: ../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
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
        <h1>Editar Produto</h1>
    </header>

    <main>
        <section>
            <form method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $produto['prod_nome']; ?>" placeholder="Nome" required>

                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" placeholder="Descrição" required><?= $produto['prod_desc']; ?></textarea>

                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" value="<?= $produto['prod_preco']; ?>" placeholder="Preço" required>

                <label for="fornecedor_id">Fornecedor:</label>
                <select id="fornecedor_id" name="fornecedor_id" required>
                    <?php while ($fornecedor = $fornecedores->fetch_assoc()): ?>
                        <option value="<?= $fornecedor['forn_id']; ?>" <?= $fornecedor['forn_id'] == $produto['forn_id'] ? 'selected' : ''; ?>>
                            <?= $fornecedor['forn_nome']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit">Salvar</button>
            </form>
        </section>

    </main>
</body>

</html>