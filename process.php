<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './src/external_sort.php';
require_once './src/input_generator.php';
require_once './src/utils/save_array_to_json.php';

$inputFile = 'input.json';
$inputFileDir = 'data/input.json';
$outputFile = 'output.json';
$arrayToJson = 'saveArrayToJsonFile';

createInputFile($inputFile, $arrayToJson);

$runSize = 5;
$order = isset($_POST['output-order']) ? $_POST['output-order'] : 'asc';
externalSort($inputFileDir, $outputFile, $runSize, $arrayToJson, $order);

echo "Ordenação externa concluída. Verifique o arquivo '$outputFile'.\n";
