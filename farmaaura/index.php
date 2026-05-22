<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php 
    include 'includes/header.php';
?>
<link rel="stylesheet" href="css/style.css?v=1">
</head>

<body>
    <main>
        <h1>Gerenciador do Estoque</h1>
    
    <div class="gallery">
        
        <a href="alterar.php" class="gallery-item">
            <img src="images/stock.png" alt="Alterar produtos">
            <div class="desc">Alterar produtos</div>
        </a>

        <a href="estoque.php" class="gallery-item">
            <img src="images/products.png" alt="Visualizar o estoque">
            <div class="desc">Visualizar o estoque</div>
        </a>
        
    </div>
</main>

     <?php include 'includes/footer.php'; ?>

</body>
</html> 