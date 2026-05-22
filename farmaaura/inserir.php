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
        <h1>Cadastrar Produtos</h1>

<?php

$nome = $_POST['nome'];
$fabricante = $_POST['fabricante'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO produtos (nome, fabricante, preco, estoque) VALUES (:nome, :fabricante, :preco, :estoque)";

$stmt = $conexao->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':fabricante' => $fabricante,
    ':preco' => $preco,
    ':estoque' => $estoque
]);

if ($conexao->lastInsertId()) {
    echo "<p class='texto-confirmacao'>Sucesso! O contato foi salvo com o ID: " . $conexao->lastInsertId() . "</p>";
}
?>
    
    <div style="display: flex; justify-content: center; margin-top: 25px; width: 100%;">
        <a href="alterar.php" class="btn-sofi">Voltar</a>
    </div>

</main>

     <?php include 'includes/footer.php'; ?>

</body>
</html>