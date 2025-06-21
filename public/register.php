<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$storageFile = __DIR__ . '/../data/times.json';

// Garante que o arquivo existe
if (!file_exists($storageFile)) {
    file_put_contents($storageFile, json_encode([]));
}

// Gera o registro com timestamp atual
$record = [
    'id' => uniqid(),
    'timestamp' => date('c') // formato ISO 8601
];

// Lê registros atuais
$data = json_decode(file_get_contents($storageFile), true);

// Adiciona novo registro
$data[] = $record;

if (file_put_contents($storageFile, json_encode($data, JSON_PRETTY_PRINT)) !== false) {
    echo json_encode([
        'success' => true,
        'record' => $record
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Falha ao salvar o registro.'
    ]);
}
