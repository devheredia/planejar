<?php
session_start();

function redirect($location) {
    header("Location: $location");
    exit;
}

function login($conexao, $nickname, $senha) {
    $sql = "SELECT 
                id,
                usuario_nome,
                email,
                data_nascimento,
                senha,
                permissao,
                data_envio 
            FROM 
                usuarios 
            WHERE 
                usuario_nome = ? 
            AND 
                senha = ? 
            AND 
                permissao = 0 
            AND 
                permissao != 3
            ";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nickname, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        redirect("login_view.php?error=invalido");
    } else {
        $usuario = $result->fetch_assoc();
        $_SESSION['usuario'] = $usuario;
        redirect("login_sistema.php");
    }
}

if (isset($_SESSION['usuario'])) {
    redirect("login_sistema.php");
}

if (isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['senha'])) {
    include_once('../config.php');
    login($conexao, $_POST['nickname'], $_POST['senha']);
} else {
    redirect("login_view.php");
}
mysqli_close($conexao);
?>