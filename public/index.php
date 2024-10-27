<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../assets/script.js"></script>
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

    <h1 class="text-3xl font-bold text-center mt-5">Lista de Produtos</h1>

    <form method="POST" action="produtos_crud/delete.php" class="mt-5">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300">Selecionar</th>
                    <th class="border border-gray-300">Produto</th>
                    <th class="border border-gray-300">Descrição</th>
                    <th class="border border-gray-300">Preço</th>
                    <th class="border border-gray-300">Fornecedor</th>
                    <th class="border border-gray-300">Ações</th>
                </tr>
            </thead>
            <tbody>
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
                        <td class="border border-gray-300">
                            <input type="checkbox" name="produtos[]" value="<?= $produto['prod_id']; ?>">
                        </td>
                        <td class="border border-gray-300"><?= $produto['produto_nome']; ?></td>
                        <td class="border border-gray-300"><?= $produto['prod_desc']; ?></td>
                        <td class="border border-gray-300">R$ <?= number_format($produto['prod_preco'], 2, ',', '.'); ?></td>
                        <td class="border border-gray-300"><?= $produto['fornecedor_nome'] ?></td>
                        <td class="border border-gray-300">
                            <a href="produtos_crud/update.php?id=<?= $produto['prod_id']; ?>" class="edit">Editar</a> |
                            <a href="produtos_crud/delete.php?id=<?= $produto['prod_id']; ?>" class="delete">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="flex justify-center mt-5 " id="btnExclude">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Excluir Selecionados</button>
        </div>
    </form>
</body>

</html>