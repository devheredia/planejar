<?php
include_once('login_functions.php');
include_once('../config.php');

if (isset($_POST['submit'])) {
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $data_nascimento = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_nascimento'])));
    $senha = $_POST['senha'];

    if (verificarNickname($conexao, $nickname)) {
        echo "Esse login já está em uso. Por favor, escolha outro.";
        header("Location: login_view.php?error=nickname_exist");
        exit();
    }

    if (inserirUsuario($conexao, $nickname, $email, $data_nascimento, $senha)) {
        header("Location: login_view.php");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

function verificarNickname($conexao, $nickname) {
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
                usuario_nome = '$nickname'";
    $resultado_verifica_nick = mysqli_query($conexao, $sql);
    return mysqli_num_rows($resultado_verifica_nick) > 0;
}

function inserirUsuario($conexao, $nickname, $email, $data_nascimento, $senha) {
    $sql = "INSERT INTO 
                        usuarios(
                                    usuario_nome, 
                                    email, 
                                    data_nascimento, 
                                    senha, 
                                    permissao
                                ) 
                        VALUES (
                                    '$nickname', 
                                    '$email',
                                    '$data_nascimento', 
                                    '$senha', 
                                    0
                                )";
    $result = mysqli_query($conexao, $sql);
    return $result;
}
mysqli_close($conexao);
?>