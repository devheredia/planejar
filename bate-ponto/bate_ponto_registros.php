<?php 
include 'includes.php';
?>
<div class="inicializador">
    <div class="row">
        <div class="col-md-12">
        <?php

// Função para calcular horas diurnas e noturnas
function calcularHoras($entrada, $saida) {
    $entrada = strtotime($entrada);
    $saida = strtotime($saida);

    // Se a hora de saída for menor que a hora de entrada, adiciona um dia ao horário de saída
    if ($saida < $entrada) {
        $saida += 86400; // Adiciona 24 horas em segundos
    }

    $horaInicialNoturna = strtotime("22:00"); // Hora inicial do período noturno
    $horaFinalNoturna = strtotime("05:00");   // Hora final do período noturno

    $horasDiurnas = 0;
    $horasNoturnas = 0;

    // Calcula as horas trabalhadas
    while ($entrada < $saida) {
        $horaAtual = date("H", $entrada);
        if (($horaAtual >= 5 && $horaAtual < 22) ||
            ($horaAtual >= 0 && $horaAtual < 5 && $entrada < $horaFinalNoturna)) {
            $horasDiurnas++;
        } else {
            $horasNoturnas++;
        }
        $entrada = strtotime('+1 hour', $entrada);
    }

    return array($horasDiurnas, $horasNoturnas);
}



// Consulta ao banco de dados para obter os períodos de trabalho
$sql = "SELECT entrada, saida FROM bateponto";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    // Inicializa totalizadores
    $totalHorasDiurnas = 0;
    $totalHorasNoturnas = 0;

    // Itera sobre os resultados
    while ($row = $resultado->fetch_assoc()) {
        // Calcula horas diurnas e noturnas para cada período
        list($horasDiurnas, $horasNoturnas) = calcularHoras($row["entrada"], $row["saida"]);

        // Incrementa totalizadores
        $totalHorasDiurnas += $horasDiurnas;
        $totalHorasNoturnas += $horasNoturnas;
    }

    // Exibe os resultados
    echo "Total de horas diurnas trabalhadas: " . $totalHorasDiurnas . " horas<br>";
    echo "Total de horas noturnas trabalhadas: " . $totalHorasNoturnas . " horas";
} else {
    echo "Nenhum resultado encontrado";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

        </div>
    </div>
</div>