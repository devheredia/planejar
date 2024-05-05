<?php

include_once('../config.php');
session_start();
$user_ID = $_SESSION['usuario']['id'];

function redirecionar($mensagem) {
    header("Location: bate_ponto_view.php?$mensagem=$mensagem");
    exit();
}

function executarConsulta($conexao, $query) {
    $result = mysqli_query($conexao, $query);
    return $result;
}

function inserirBatePonto($conexao, $user_ID, $id_unidade, $entrada, $saida) {
    $query = "INSERT INTO bateponto(id_user, id_unidade, entrada, saida) VALUES ('$user_ID', '$id_unidade', '$entrada', '$saida')";
    return executarConsulta($conexao, $query);
}

function excluirBatePonto($conexao, $identificador) {
    $query = "DELETE FROM bateponto WHERE id = '$identificador'";
    return executarConsulta($conexao, $query);
}

function atualizarBatePonto($conexao, $identificador, $id_unidade, $entrada, $saida) {
    $query = "UPDATE bateponto SET id_unidade = '$id_unidade', entrada = '$entrada', saida = '$saida' WHERE id = '$identificador'";
    return executarConsulta($conexao, $query);
}

if (isset($_POST['submitBatePonto'])) {
    $id_unidade = $_POST['id_unidade'];
    $entrada = $_POST['entrada'];
    $saida = $_POST['saida'];
    $result = inserirBatePonto($conexao, $user_ID, $id_unidade, $entrada, $saida);
    if ($result) {
        redirecionar("sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitExcluirBatePonto'])) {
    $identificador = $_POST['identificador'];
    $result = excluirBatePonto($conexao, $identificador);
    if ($result) {
        redirecionar("sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitAtualizarBatePonto'])) {
    $identificador = $_POST['identificador'];
    $id_unidade = $_POST['id_unidade'];
    $entrada = $_POST['entrada'];
    $saida = $_POST['saida'];
    $result = atualizarBatePonto($conexao, $identificador, $id_unidade, $entrada, $saida);
    if ($result) {
        redirecionar("sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}
mysqli_close($conexao);
?>
