<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header>
        <nav class="navbar bg-gray-500 p-5">
            <div class="container mx-auto flex justify-between items-center">
                <a href="index.php" class="text-white text-4xl font-bold">HOME</a>

                <div class="hidden md:flex space-x-4 pr-10" id="navbar-links">
                    <a href="fornecedores_crud/create.php" class="text-white text-2xl">Fornecedor</a>
                    <a href="produtos_crud/create.php" class="text-white text-2xl">Produtos</a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- <h1>Produtos</h1>
    <a href="produtos_crud/create.php">Novo Produto</a>
    <a href="fornecedores_crud/create.php">Fornecedor</a> -->

    <table>
        <tr>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Fornecedor</th>
            <th>Ações</th>
        </tr>

        <?php
        include('db_con.php');
        $sql = $con->query("
                SELECT produtos.prod_id, produtos.prod_nome AS produto_nome, produtos.prod_desc, produtos.prod_preco, fornecedores.forn_nome AS fornecedor_nome
                FROM produtos
                JOIN fornecedores ON produtos.forn_id = fornecedores.forn_id
            ");

        if (!$sql) {
            die("");
        }
        while ($produto = $sql->fetch_assoc()): ?>

            <tr>
                <td><?= $produto['produto_nome']; ?></td>
                <td><?= $produto['prod_desc']; ?></td>
                <td>R$ <?= number_format($produto['prod_preco'], 2, ',', '.'); ?></td>
                <td><?= $produto['fornecedor_nome'] ?></td>
                <td>
                    <a href="produtos_crud/update.php?id=<?= $produto['prod_id']; ?>" class="edit">Editar</a> |
                    <a href="produtos_crud/delete.php?id=<?= $produto['prod_id']; ?>" class="delete">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>