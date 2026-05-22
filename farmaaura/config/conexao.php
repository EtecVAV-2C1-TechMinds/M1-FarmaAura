<?php

$servidor = "localhost";
$banco = "farmacia_estoque";
$usuario = "root";
$senha = "";

try {
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco",
        $usuario,
        $senha
    );
} catch(PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}

?>