<?php

$dia = $_GET['campo_dia'];
$mes = $_GET['campo_mes'];
$ano = $_GET['campo_ano'];

function somatorio($n){
    $soma = 0;
    for($i = 1; $i <= $n; $i++){
        $soma += $i;
    }
    return $soma;
}

function somaDigitos($numero){
    $soma = 0;

    while($numero > 0){
        $soma += $numero % 10;
        $numero = intdiv($numero, 10);
    }

    return $soma;
}

function safadao($dia, $mes, $ano){

    $valor_safadeza = somatorio($mes) + (somaDigitos($ano) * (50 - $dia) / 10);

    if($valor_safadeza > 100){
        $valor_safadeza = 100;
    }

    if($valor_safadeza < 0){
        $valor_safadeza = 0;
    }

    $valor_anjo = 100 - $valor_safadeza;

    return [
        "anjo" => $valor_anjo,
        "safadeza" => $valor_safadeza
    ];
}

$resultado = safadao($dia, $mes, $ano);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

<h2>
Não anjo: <?= number_format($resultado["safadeza"], 1) ?>% <br>
Anjo: <?= number_format($resultado["anjo"], 1) ?>%
</h2>

</body>
</html>