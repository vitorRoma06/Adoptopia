<?php
$filtroStatus = filter_input(INPUT_GET, 'tipo-animal', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['Cachorro', 'Gato']) ? $filtroStatus : '';

$filtroVacinado = filter_input(INPUT_GET, 'vacinado', FILTER_SANITIZE_STRING);
$filtroVacinado = in_array($filtroVacinado, ['S', 'N']) ? $filtroVacinado : '';

$condicioes = [
    strlen($filtroStatus) ? 'tipo_animal = "' . $filtroStatus . '"' : null,
    strlen($filtroVacinado) ? 'vacinado = "' . $filtroVacinado . '"' : null
];

$condicioes = array_filter($condicioes);

$where = implode(' AND ', $condicioes);

?>