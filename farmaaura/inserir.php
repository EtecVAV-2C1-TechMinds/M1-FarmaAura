<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php 
    require_once 'includes/header.php'; 
    require_once 'conexao.php';
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
    echo "Sucesso! O contato foi salvo com o ID: " . $conexao->lastInsertId();
}
?>
    
</div>

<div class="botoes-grupo">
                
                <a href="alterar.php" class="btn-cancelar">Voltar</a>
            </div>


</main>

     <?php require_once 'includes/footer.php'; ?>

</body>
</html>