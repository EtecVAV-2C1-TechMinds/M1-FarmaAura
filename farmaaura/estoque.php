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
        <h1>Visualizar o Estoque</h1>

        <div>
    <form action="" method="GET">
        <input type="number" name="id_busca" placeholder="Procurar por ID..." 
               value="<?php echo isset($_GET['id_busca']) ? htmlspecialchars($_GET['id_busca']) : ''; ?>">
        
        <?php if (!isset($_GET['id_busca']) || $_GET['id_busca'] === ''): ?>
            <button type="submit">Buscar</button>
        <?php endif; ?>
        
        <?php if (isset($_GET['id_busca']) && $_GET['id_busca'] !== ''): ?>
            <button type="button" onclick="window.location.href='?'">Limpar</button>
        <?php endif; ?>
    </form>
</div>

       <?php
        if (isset($_GET['id_busca']) && $_GET['id_busca'] !== '') {
            $id_busca = $_GET['id_busca'];
            $sql = "SELECT * FROM produtos WHERE id = :id ORDER BY id DESC";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id_busca, PDO::PARAM_INT);
        } else {
            $sql = "SELECT * FROM produtos ORDER BY id DESC";
            $stmt = $conexao->prepare($sql);
        }

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
                    <th>Estoque</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $registro): ?>
                    <tr>
                        <td><?php echo $registro['id']; ?></td>
                        <td><?php echo htmlspecialchars($registro['nome']); ?></td>
                        <td><?php echo htmlspecialchars($registro['fabricante']); ?></td>
                        <td>R$ <?php echo number_format($registro['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $registro['estoque']; ?></td>
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