<?php
include_once('login_functions.php');
include_once('../config.php');
if (isset($_POST['submit'])) {

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $data_array = explode("/", $data_nascimento);
    $data_formato_americano = $data_array[2] . "-" . $data_array[0] . "-" . $data_array[1];

    $senha = $_POST['senha'];

    $query_verifica_nick = "SELECT * FROM usuarios WHERE usuario_nome = '$nickname'";
    $resultado_verifica_nick = mysqli_query($conexao, $query_verifica_nick);

    if (mysqli_num_rows($resultado_verifica_nick) > 0) {
        echo "Esse login já está em uso. Por favor, escolha outro.";
        header("Location: login_view.php?error=nickname_exist");
    exit();
    } else {
        $query_inserir_usuario = "INSERT INTO usuarios(usuario_nome, email, data_nascimento, senha, permissao) VALUES ('$nickname', '$email', '$data_formato_americano', '$senha', 0)";
        echo $query_inserir_usuario;
        $result = mysqli_query($conexao, $query_inserir_usuario);
        if ($result) {
            header("Location: login_view.php");
        } else {
            echo "Erro ao inserir dados no banco de dados.";
        }
    }
}
