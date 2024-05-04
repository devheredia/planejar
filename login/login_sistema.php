<?php
session_start();
if(!isset($_SESSION['usuario_nome']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['usuario_nome']);
    unset($_SESSION['senha']);
    header('Location: login_view.php?'); 
}

$logado = $_SESSION['usuario_nome'];
header("Location: ../cadastro/home.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregando...</title>
</head>

<body>
</body>

</html>