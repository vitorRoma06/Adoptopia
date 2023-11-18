<?php
$filtroStatus = filter_input(INPUT_GET, 'tipo-animal', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['Cachorro', 'Gato']) ? $filtroStatus : '';

$filtroVacinado = filter_input(INPUT_GET, 'vacinado', FILTER_SANITIZE_STRING);
$filtroVacinado = in_array($filtroVacinado, ['Sim', 'Não']) ? $filtroVacinado : '';

$filtroCastrado = filter_input(INPUT_GET, 'castrado', FILTER_SANITIZE_STRING);
$filtroCastrado = in_array($filtroCastrado, ['Sim', 'Não']) ? $filtroCastrado : '';

$filtroSexo = filter_input(INPUT_GET, 'sexo', FILTER_SANITIZE_STRING);
$filtroSexo = in_array($filtroSexo, ['Macho', 'Fêmea']) ? $filtroSexo : '';

$filtroPorte = filter_input(INPUT_GET, 'porte', FILTER_SANITIZE_STRING);
$filtroPorte = in_array($filtroPorte, ['Mini', 'Pequeno', 'Médio', 'Grande', 'Gigante']) ? $filtroPorte : '';

$condicioes = [
    strlen($filtroStatus) ? 'tipo_animal = "' . $filtroStatus . '"' : null,
    strlen($filtroVacinado) ? 'vacinado = "' . $filtroVacinado . '"' : null,
    strlen($filtroCastrado) ? 'castrado = "' . $filtroCastrado . '"' : null,
    strlen($filtroSexo) ? 'sexo = "' . $filtroSexo . '"' : null,
    strlen($filtroPorte) ? 'porte = "' . $filtroPorte . '"' : null,
];

$condicioes = array_filter($condicioes);

$where = implode(' AND ', $condicioes);

?>