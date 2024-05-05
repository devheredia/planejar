<?php
include_once('../config.php');

$dados_requisicao = $_REQUEST;

$pagina = isset($dados_requisicao['start']) ? $dados_requisicao['start'] / $dados_requisicao['length'] + 1 : 1;
$tamanho_pagina = isset($dados_requisicao['length']) ? $dados_requisicao['length'] : 10;

$ordenacao = isset($dados_requisicao['order'][0]['column']) ? $dados_requisicao['columns'][$dados_requisicao['order'][0]['column']]['data'] : 'id';
$direcao = isset($dados_requisicao['order'][0]['dir']) ? $dados_requisicao['order'][0]['dir'] : 'DESC';
$termo = isset($dados_requisicao['search']['value']) ? $dados_requisicao['search']['value'] : '';

$sql_total = "SELECT COUNT(id) AS total FROM bateponto";
$resultado_total = $conexao->query($sql_total);
$total_registros = $resultado_total->fetch_assoc()['total'];

$query_usuarios = "SELECT
                        bp.id as identificador,
                        bp.id_user,
                        bp.id_unidade,
                        bp.entrada,
                        bp.saida,
                        bp.data_envio,
                        u.id,
                        u.usuario_nome,
                        un.id,
                        un.unidade
                    FROM
                        bateponto bp
                    LEFT JOIN
                        usuarios u ON bp.id_user = u.id
                    LEFT JOIN
                        unidades un ON bp.id_unidade = un.id
                    WHERE
                        CONCAT_WS(' ', bp.id_user, bp.id_unidade, bp.entrada, bp.saida, u.usuario_nome, un.unidade) LIKE '%$termo%'
                    ORDER BY
                            bp.data_envio $direcao
                    LIMIT
                        $tamanho_pagina OFFSET " . (($pagina - 1) * $tamanho_pagina);

$resultado_usuarios = $conexao->query($query_usuarios);

if (!$resultado_usuarios) {
    die("Erro na query: " . $conexao->error);
}

$dados = array();
while ($row = $resultado_usuarios->fetch_assoc()) {
    $registro = array();
    $registro[] = $row['identificador'];
    $registro[] = $row['usuario_nome'];
    $registro[] = $row['unidade'];
    $registro[] = $row['entrada'];
    $registro[] = $row['saida'];
    $data_formatada = date('d/m/Y', strtotime($row['data_envio']));
    $registro[] = $data_formatada;
    $dados[] = $registro;
}

$resposta = array(
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($total_registros),
    "recordsFiltered" => intval($total_registros),
    "data" => $dados
);

header('Content-Type: application/json');

echo json_encode($resposta);

$conexao->close();
