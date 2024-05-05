<?php
include 'includes.php';

function calcularHorasDiurnasNoturnas($registros)
{
    $horasDiurnas = 0;
    $horasNoturnas = 0;

    foreach ($registros as $registro) {
        $horaEntrada = strtotime($registro['entrada']);
        $horaSaida = strtotime($registro['saida']);

        // Verifica se a hora de entrada é depois das 22h ou antes das 5h (considerando o dia seguinte)
        if (date('H', $horaEntrada) >= 22 || date('H', $horaEntrada) < 5) {
            // Calcula as horas noturnas
            $horasNoturnas += (strtotime('00:00') + 3600 * 5 - $horaEntrada) % 86400;
            $horasNoturnas += ($horaSaida - strtotime('00:00')) % 86400;
        } else {
            // Calcula as horas diurnas
            $horasDiurnas += ($horaSaida - $horaEntrada) % 86400;
        }
    }

    return array(
        'horas_diurnas' => gmdate('H:i', $horasDiurnas),
        'horas_noturnas' => gmdate('H:i', $horasNoturnas)
    );
}

// Exemplo de uso:
$registros = array(
    array('entrada' => '2024-05-04 15:00:00', 'saida' => '2024-05-04 23:00:00'),
    array('entrada' => '2024-05-05 19:03:00', 'saida' => '2024-05-06 06:59:00'),
    array('entrada' => '2024-05-06 23:59:00', 'saida' => '2024-05-07 08:02:00')
);

$resultado = calcularHorasDiurnasNoturnas($registros);
echo "Horas diurnas: " . $resultado['horas_diurnas'] . "\n";
echo "Horas noturnas: " . $resultado['horas_noturnas'] . "\n";

?>


<div class="inicializador">
    <div class="row">
        <div class="col-md-12">
            <?php
            echo "Horas diurnas: " . $resultado['horas_diurnas'] . "\n";
            echo "Horas noturnas: " . $resultado['horas_noturnas'] . "\n";
            ?>
        </div>
    </div>
</div>