<?php
function saveArrayToJsonFile($fileName, $data)
{
    $filePath = __DIR__ . '/../../data/' . $fileName; // Caminho completo para o arquivo dentro de /data

    $directory = dirname($filePath);

    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    $file = fopen($filePath, 'w');
    if ($file === false) {
        die("Erro ao abrir o arquivo $filePath para escrita.");
    }

    fwrite($file, json_encode($data, JSON_PRETTY_PRINT));

    fclose($file);
}
