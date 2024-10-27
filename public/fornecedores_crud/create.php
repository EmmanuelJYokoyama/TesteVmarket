<?php
    include('../db_con.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        $con->query("INSERT INTO fornecedores (forn_nome, forn_email, forn_tel, forn_end) VALUES ('$nome', '$email', '$telefone', '$endereco')");

        
    }

    $fornecedores = $con->query("SELECT forn_id, forn_nome, forn_email, forn_tel, forn_end FROM fornecedores");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Novo Fornecedor</title>
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
                    <a href="../produtos_crud/create.php" class="text-white text-2xl">Produtos</a>
                </div>
            </div>
        </nav>
    </header>


    <main>
        <header>
            <h1>Novo Fornecedor</h1>
        </header>

        <section>
            <form method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" required>

                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>

                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>

                <button type="submit">Cadastrar</button>
            </form>
        </section>

        <section class="fornecedoresLista">
            <header>
                <h2>Lista de Fornecedores</h2>
            </header>
            <?php if ($fornecedores->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fornecedor = $fornecedores->fetch_assoc()): ?>
                            <tr>
                                <td><?= $fornecedor['forn_id']; ?></td>
                                <td><?= $fornecedor['forn_nome']; ?></td>
                                <td><?= $fornecedor['forn_email']; ?></td>
                                <td><?= $fornecedor['forn_tel']; ?></td>
                                <td><?= $fornecedor['forn_end']; ?></td>
                                <td>
                                    <a href="update.php?id=<?= $fornecedor['forn_id']; ?>">Editar</a> |
                                    <a href="delete.php?id=<?= $fornecedor['forn_id']; ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Não há fornecedores cadastrados.</p>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>