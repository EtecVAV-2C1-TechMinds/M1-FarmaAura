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
           <h1>Cadastrar Produto</h1>

        <form method="POST" action="inserir.php" class="formulario-editar">
            
            <div class="campo-grupo">
                <label for="nome">Nome do produto:</label>
                <input type="text" id="nome" name="nome" placeholder="Nome do Medicamento" required>
            </div>
            
            <div class="campo-grupo">
                <label for="fabricante">Fabricante:</label>
                <input type="text" id="fabricante" name="fabricante" placeholder="Fabricante" required>
            </div>

            <div class="campo-grupo">
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" id="preco" name="preco" placeholder="Preço (R$)" required>
            </div>

            <div class="campo-grupo">
                <label for="estoque">Estoque:</label>
                <input type="number" id="estoque" name="estoque" placeholder="Qtd em Estoque" required>
            </div>

            <div class="botoes-grupo">
                <button type="submit" class="btn-salvar">Salvar no Sistema</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>

        </form>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>