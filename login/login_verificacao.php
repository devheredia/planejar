<?php
session_start();
if (isset($_SESSION['nickname'])) {
    $user_id = $_SESSION['nickname']['id'];
    header("Location: login_sistema.php?");
    exit;
}

if (isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['senha'])) {
    include_once('../config.php');

    $sql = "SELECT * FROM usuarios WHERE usuario_nome = ? AND senha = ? AND permissao = 0 AND permissao != 3";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $_POST['nickname'], $_POST['senha']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        header("Location: login_view.php?error=invalido");
        exit;
    } else {
        $usuario = $result->fetch_assoc();
        $_SESSION['usuario'] = $usuario;

        $user_id = $usuario['id'];

        header("Location: login_sistema.php?");
        exit;
    }
} else {
    header("Location: login_view.php?");
    exit;
}
