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
        <h1>Editar Produto</h1>

<?php
$dsn = "mysql:host=localhost;dbname=farmacia_estoque;charset=utf8";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

$idParaAlterar = $_GET['id'] ?? null;

if (!$idParaAlterar) {
    die("ID do produto inválido ou não fornecido.");
}

$sqlBusca = "SELECT * FROM produtos WHERE id = :id"; 
$stmtBusca = $pdo->prepare($sqlBusca);
$stmtBusca->execute([':id' => $idParaAlterar]);
$produto = $stmtBusca->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoNome = $_POST['nome'];
    $novoFabricante = $_POST['fabricante'];
    $novoPreco = $_POST['preco'];
    $novoEstoque = $_POST['estoque'];

    $sql = "UPDATE produtos SET 
                nome = :novo_nome, 
                fabricante = :novo_fab, 
                preco = :novo_preco, 
                estoque = :novo_estoque 
            WHERE id = :id";
            
    $stmt = $pdo->prepare($sql);

    $sucesso = $stmt->execute([
        ':novo_nome'    => $novoNome,
        ':novo_fab'     => $novoFabricante,
        ':novo_preco'   => $novoPreco,
        ':novo_estoque' => $novoEstoque,
        ':id'           => $idParaAlterar
    ]);

    if ($sucesso) {
        header("Location: alterar.php?mensagem=sucesso");
        exit;
    } else {
        echo "Erro ao tentar atualizar o produto.";
    }
}
?>

    <form method="POST" class="formulario-editar">
    
    <div class="campo-grupo">
        <label for="nome">Nome do produto:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
    </div>
    
    <div class="campo-grupo">
        <label for="fabricante">Fabricante:</label>
        <input type="text" id="fabricante" name="fabricante" value="<?php echo htmlspecialchars($produto['fabricante']); ?>" required>
    </div>

    <div class="campo-grupo">
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
    </div>

    <div class="campo-grupo">
        <label for="estoque">Estoque:</label>
        <input type="number" id="estoque" name="estoque" value="<?php echo htmlspecialchars($produto['estoque']); ?>" required>
    </div>

    <div class="botoes-grupo">
        <button type="submit" class="btn-salvar">Salvar alterações</button>
        <a href="index.php" class="btn-cancelar">Cancelar</a>
    </div>

</form>

</main>

     <?php include 'includes/footer.php'; ?>
    </form>
    
</body>
</html>