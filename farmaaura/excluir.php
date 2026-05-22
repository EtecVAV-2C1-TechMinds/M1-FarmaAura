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
           <h1>Excluir Produto</h1>
        <?php
$dsn = "mysql:host=localhost;dbname=farmacia_estoque;charset=utf8"; 
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

$idParaExcluir = $_GET['id'] ?? null;

if (!$idParaExcluir) {
    die("ID do produto inválido ou não fornecido.");
}

$sqlBusca = "SELECT * FROM produtos WHERE id = :id";
$stmtBusca = $pdo->prepare($sqlBusca);
$stmtBusca->execute([':id' => $idParaExcluir]);
$produto = $stmtBusca->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlDeletar = "DELETE FROM produtos WHERE id = :id";
    $stmtDeletar = $pdo->prepare($sqlDeletar);
    $sucesso = $stmtDeletar->execute([':id' => $idParaExcluir]);

    if ($sucesso) {
        header("Location: alterar.php?mensagem=excluido");
        exit;
    } else {
        echo "Erro ao tentar excluir o produto.";
    }
}
?>

        <div class="formulario-editar">
            <p class="texto-confirmacao">
                Você tem certeza que deseja excluir o seguinte item do estoque?
            </p>

            <div class="campo-grupo">
                <label>Nome do produto:</label>
                <input type="text" value="<?php echo htmlspecialchars($produto['nome']); ?>" disabled class="campo-bloqueado">
            </div>

            <div class="campo-grupo">
                <label>Fabricante:</label>
                <input type="text" value="<?php echo htmlspecialchars($produto['fabricante']); ?>" disabled class="campo-bloqueado">
            </div>

            <form method="POST">
                <div class="botoes-grupo">
                    <button type="submit" class="btn-excluir">Sim, Excluir</button>
                    <a href="index.php" class="btn-cancelar">Não, Cancelar</a>
                </div>
            </form>
        </div>
   
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>