<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php 
    include 'includes/header.php'; 
    include 'config/conexao.php';
?>
<link rel="stylesheet" href="css/style.css?v=1">
</head>

<body>
    <main>
        <h1>Alterar Produtos</h1>
        <a href="cadastro.php" class="btn-sofi">Cadastrar novo produto</a><br><br><br>

        <?php
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($produtos): ?>
    <div class="tabela-wrap">
        <table class="tabela-produtos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Medicamento</th>
                    <th>Fabricante</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Alterar</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $registro): ?>
                    <tr>
                        <td><?php echo $registro['id']; ?></td>
                        <td><?php echo htmlspecialchars($registro['nome']); ?></td>
                        <td><?php echo htmlspecialchars($registro['fabricante']); ?></td>
                        <td>R$ <?php echo number_format($registro['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $registro['estoque']; ?></td>
                        
                        <td class="acoes">
                            <a href="editar.php?id=<?php echo $registro['id']; ?>" class="acao-editar" title="Editar">✏️</a>
                            <a href="excluir.php?id=<?php echo $registro['id']; ?>" class="acao-excluir" title="Excluir">🗑️</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <p>Nenhum produto cadastrado.</p>
<?php endif; ?>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>