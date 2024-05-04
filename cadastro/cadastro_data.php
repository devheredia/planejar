<?php
include_once('../config.php');
session_start();

function redirecionamento($localização) {
    header("Location: $localização");
    exit();
}

function inserirUnidade($conexao, $identificadorStringUnidade, $user_ID) {
    $sql = "INSERT INTO 
                    unidades 
                            (
                                unidade,
                                insersor
                            ) 
                            VALUES 
                                (
                                    ?, 
                                    ?
                                )";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $identificadorStringUnidade, $user_ID);
    mysqli_stmt_execute($stmt);
    $row = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $row;
}

if (isset($_SESSION['usuario']['id']) && isset($_POST['submitInserirUnidade'])) {
    $user_ID = $_SESSION['usuario']['id'];
    $identificadorStringUnidade = $_POST['unidade'];

    $sql = "SELECT 
                COUNT(*) AS total 
            FROM 
                unidades 
            WHERE unidade = ?";
    $check_stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($check_stmt, "s", $identificadorStringUnidade);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_bind_result($check_stmt, $total);
    mysqli_stmt_fetch($check_stmt);
    mysqli_stmt_close($check_stmt);

    if ($total > 0) {
        redirecionamento("cadastro_unidades.php?error=error");
    }

    $row = inserirUnidade($conexao, $identificadorStringUnidade, $user_ID);

    if ($row > 0) {
        redirecionamento("cadastro_unidades.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
} else {
    redirecionamento("../login/login_view.php");
}
?>
