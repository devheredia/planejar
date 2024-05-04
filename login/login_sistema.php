<?php
if (!isset($_SESSION['usuario']['usuario_nome'], $_SESSION['usuario']['senha'])) {
    unset($_SESSION['usuario']['usuario_nome']);
    unset($_SESSION['usuario']['senha']);
    header('Location: login_view.php');
}

$logado = $_SESSION['usuario_nome'];
header('Location: ../cadastro/home.php');
?>
