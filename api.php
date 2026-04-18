<?php
require_once 'src/Domain/GameScoreTracker.php';
require_once 'src/Application/CalculateTournamentWinner.php';

$json = json_decode(file_get_contents('php://input'), true);
$rawText = $json['data'] ?? '';

// Parsing del archivo de texto
$lines = explode("\n", trim($rawText));
$numRounds = (int) array_shift($lines);
$roundsData = [];

foreach ($lines as $line) {
    if (trim($line) === "") continue;
    $roundsData[] = array_map('intval', explode(" ", trim($line)));
}

// Ejecución del Caso de Uso
$useCase = new CalculateTournamentWinner();
echo $useCase->execute($roundsData);