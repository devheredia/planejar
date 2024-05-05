<?php

include_once('../config.php');
session_start();
function redirecionar($localizacao) {
    header("Location: $localizacao");
    exit();
}

function verificarUnidadeExistente($conexao, $identificadorStringUnidade) {
    $sql = "SELECT COUNT(*) AS total FROM unidades WHERE unidade = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $identificadorStringUnidade);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return $total;
}

function inserirUnidade($conexao, $identificadorStringUnidade, $userID) {
    $sql = "INSERT INTO unidades (unidade, inseridor) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $identificadorStringUnidade, $userID);
    mysqli_stmt_execute($stmt);
    $linhasAfetadas = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $linhasAfetadas;
}

function atualizarUnidade($idunidade, $unidade, $status) {
    global $conexao;

    $sql = "UPDATE unidades SET unidade = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $unidade, $status, $idunidade);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        return false;
    }
}

function processarAcaoUnidade($idUnidade, $unidade, $status) {
    return atualizarUnidade($idUnidade, $unidade, $status);
}

if (isset($_SESSION['usuario']['id']) && isset($_POST['submitInserirUnidade'])) {
    $userID = $_SESSION['usuario']['id'];
    $identificadorStringUnidade = $_POST['unidade'];

    $totalUnidades = verificarUnidadeExistente($conexao, $identificadorStringUnidade);

    if ($totalUnidades > 0) {
        redirecionar("cadastro_unidades.php?error=error");
    }

    $linhasAfetadas = inserirUnidade($conexao, $identificadorStringUnidade, $userID);

    if ($linhasAfetadas > 0) {
        redirecionar("cadastro_unidades.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitDesativarUnidade'])) {
    $idUnidade = $_POST['identificadorUnidade'];
    $unidade = $_POST['unidade'];

    if (processarAcaoUnidade($idUnidade, $unidade, 2)) {
        redirecionar("cadastro_unidades.php?desativado=desativado");
    } else {
        echo "Erro ao atualizar unidade.";
    }
}

if (isset($_POST['submitAtivarUnidade'])) {
    $idUnidade = $_POST['identificadorUnidade'];
    $unidade = $_POST['unidade'];

    if (processarAcaounidade($idUnidade, $unidade, 1)) {
        redirecionar("cadastro_unidades.php?atualizado=atualizado");
    } else {
        echo "Erro ao atualizar unidade.";
    }
}
mysqli_close($conexao);
?>