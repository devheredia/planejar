<?php
include 'includes.php';

function selecioneUnidadesAtivas($conexao)
{
    $sql = "SELECT id, unidade FROM unidades WHERE status = '1'";
    $resultadoUnidade = $conexao->query($sql);
    return $resultadoUnidade;
}

function exibirAlerta()
{
    if (isset($_GET['sucesso']) && $_GET['sucesso'] === "sucesso") {
        return ["Operação realizada.", "alert-success"];
    } elseif (isset($_GET['error']) && $_GET['error'] === "error") {
        return ["O membro já faz parte do departamento.", "alert-danger"];
    }
    return [null, null];
}

function obterUsuarioNome()
{
    return $_SESSION['usuario']['usuario_nome'] ?? null;
}

$resultadoUnidade = selecioneUnidadesAtivas($conexao);
list($alert_message, $alert_class) = exibirAlerta();
$user_ID = obterUsuarioNome();
$titulo = 'Bate-Ponto';
?>

<div class="inicializador">
    <?php include 'menu.php'; ?>
    <div class="row mt-4">
        <div class="col-md-12" id="toast-menu-div">
            <div class="toast-alert-div">
                <?php if (!empty($alert_message)) : ?>
                    <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
                        <?php echo $alert_message; ?>
                        <button class="bin-button">
                            <svg class="bin-top" viewBox="0 0 39 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
                                <line x1="12" y1="1.5" x2="26.0357" y2="1.5" stroke="white" stroke-width="3"></line>
                            </svg>
                            <svg class="bin-bottom" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-inside-1_8_19" fill="white">
                                    <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                                </mask>
                                <path d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z" fill="white" mask="url(#path-1-inside-1_8_19)"></path>
                                <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
                                <path d="M21 6V29" stroke="white" stroke-width="4"></path>
                            </svg>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="formulario">
                <form class="form" action='batePonto_data.php' method='POST'>
                    <div class="row" style="display: none;">
                        <div class="col-md-12">
                            <input type="text" name="identificador" id="identificador" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-container">
                                <input id="nome" placeholder="Nome" type="text" readonly style="background-color: #dfdddd !important; cursor: not-allowed !important;" value="<?php echo isset($user_ID) ? $user_ID : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if ($resultadoUnidade->num_rows > 0) : ?>
                                <div class="input-container">
                                    <select name="id_unidade" required>
                                        <option value="" disabled selected hidden>Unidade</option>
                                        <?php while ($row = $resultadoUnidade->fetch_assoc()) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['unidade'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            <?php else : ?>
                                <p>Nenhuma unidade encontrada</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-container">
                                <input name="entrada" type="text" placeholder="Entrada" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-container">
                                <input name="saida" type="text" placeholder="Saída" required>
                            </div>
                        </div>
                    </div>
                    <div class="botoes" id="botoesEnvio">
                        <a href="../cadastro/home.php" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 12">
                                <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z" />
                            </svg>
                            Voltar
                        </a>
                        <button type="button" name="submitBatePonto" value="submitBatePonto" class="btn btn-success" onclick="rp_swall(this, 'Enviar', ' Deseja enviar esse bate-ponto?', 'success', 60000, true)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 12">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                            </svg>
                            Enviar
                        </button>
                    </div>

                    <div class="botoes" id="botoesUpdate" style="display: none;">
                        <button type="button" name="submitExcluirBatePonto" value="submitExcluirBatePonto" class="btn btn-danger" onclick="rp_swall(this, 'Enviar', ' Deseja deletar esse bate-ponto?', 'warning', 60000, true)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 12">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg>
                            Excluir
                        </button>
                        <button type="button" name="submitAtualizarBatePonto" value="submitAtualizarBatePonto" class="btn btn-success" onclick="rp_swall(this, 'Enviar', ' Deseja atualizar esse bate-ponto?', 'success', 60000, true)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 12">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                            </svg>
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="dataTable">
                <table id="listar-batePontos" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Unidade</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Data de Aplicação</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var timeInputs = $('input[placeholder="Entrada"], input[placeholder="Saída"]');
        timeInputs.on('click', function() {
            if ($(this).attr('type') !== 'time') {
                // Change the type to "time"
                $(this).attr('type', 'time');
                $(this).focus();
            }
        });
    });

    $(document).ready(function() {
        var table = $('#listar-batePontos').DataTable({
            ajax: 'listar_batePontos.php',
            processing: true,
            serverSide: true,
            language: {
                "sProcessing": "Processando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Não foram encontrados resultados",
                "sEmptyTable": "Nenhum registro disponível",
                "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Pesquisar:",
                "sUrl": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "Carregando...",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast": "Último",
                    "sNext": "Próximo",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            createdRow: function(row, data, dataIndex) {
                if (dataIndex % 2 === 0) {
                    $(row).addClass('linha-azul');
                } else {
                    $(row).addClass('linha-verde');
                }
            },
            order: [
                [6, 'desc']
            ]
        });

        $('#listar-batePontos tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var identificador = data[0];
            var nome = data[1];
            var unidade = data[2];
            var entrada = data[3];
            var saida = data[4];

            $('input#identificador').val(identificador).removeAttr('disabled').prop('readonly', true);
            $('input#nome').val(nome);

            $('select[name="id_unidade"] option').each(function() {
                if ($(this).text() === unidade) {
                    $(this).prop('selected', true);
                }
            });

            $('input[name="entrada"]').val(entrada);
            $('input[name="saida"]').val(saida);

            $('#botoesUpdate').css('display', 'flex');
            $('#botoesEnvio').css('display', 'none');
        });




        $('.bin-button').click(function() {
            $('#toast-menu-div').css('display', 'none');
        });
    });
</script>