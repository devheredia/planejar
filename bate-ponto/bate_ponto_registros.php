<?php
include 'includes.php';
$titulo = 'Registros';

function calcularTempoDiurnoNoturno($entrada, $saida) {
    $inicioNoturno = new DateTime($entrada->format('Y-m-d 22:00:00'));
    $fimNoturno = new DateTime($saida->format('Y-m-d 05:00:00'));
    $fimNoturno->modify('+1 day'); 

    if ($entrada < $fimNoturno && $saida > $inicioNoturno) {
        $intervaloDiurno = $entrada->diff($inicioNoturno);
        $intervaloNoturno = $saida->diff($inicioNoturno);
        return [
            'tempoDiurno' => $intervaloDiurno->format('%H:%I:%S'),
            'tempoNoturno' => $intervaloNoturno->format('%H:%I:%S')
        ];
    } else {
        return [
            'tempoDiurno' => $entrada->diff($saida)->format('%H:%I:%S'),
            'tempoNoturno' => '00:00:00'
        ];
    }
}

function processarBatePonto($conexao) {
    $htmlResultados = ""; 

    $sql = "SELECT entrada, saida FROM bateponto";
    $resultadoSql = $conexao->query($sql);

    if ($resultadoSql->num_rows > 0) {
        while ($row = $resultadoSql->fetch_assoc()) {
            $entrada = new DateTime($row["entrada"]);
            $saida = new DateTime($row["saida"]);

            $tempos = calcularTempoDiurnoNoturno($entrada, $saida);

            $htmlResultados .= "Entrada: " . $entrada->format('H:i:s') . " - Saída: " . $saida->format('H:i:s') . " - Tempo diurno: " . $tempos['tempoDiurno'] . " - Tempo noturno: " . $tempos['tempoNoturno'] . "<br>";
        }
    } else {
        $htmlResultados = "0 results";
    }

    return $htmlResultados;
}

$resultados = processarBatePonto($conexao);
mysqli_close($conexao);
?>

<div class="inicializador">
<?php include 'menu.php'; ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $resultados; ?> 
        </div>
    </div>
</div>
