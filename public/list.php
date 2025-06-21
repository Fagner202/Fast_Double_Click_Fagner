<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$storageFile = __DIR__ . '/../data/times.json';

// Se o arquivo não existir, retorna lista vazia
if (!file_exists($storageFile)) {
    echo json_encode([]);
    exit;
}

// Lê os dados
$data = json_decode(file_get_contents($storageFile), true);

// Ordenação opcional por timestamp (asc ou desc)
$sort = $_GET['sort'] ?? null;

if ($sort === 'asc') {
    usort($data, fn($a, $b) => strcmp($a['timestamp'], $b['timestamp']));
} elseif ($sort === 'desc') {
    usort($data, fn($a, $b) => strcmp($b['timestamp'], $a['timestamp']));
}

// Filtro por data inicial e final (parâmetros ?from=...&to=...)
$from = $_GET['from'] ?? null;
$to = $_GET['to'] ?? null;

if ($from || $to) {
    $data = array_filter($data, function ($item) use ($from, $to) {
        $timestamp = strtotime($item['timestamp']);
        return (!$from || $timestamp >= strtotime($from)) &&
               (!$to || $timestamp <= strtotime($to));
    });
}

// Retorna os dados filtrados/ordenados
echo json_encode(array_values($data), JSON_PRETTY_PRINT);
