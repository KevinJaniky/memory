<?php
require_once './autoload.php';

if (!empty($_GET['timer'])) {
    $game = new GameController();
    $game->saveTimer($_GET['timer']);
    echo json_encode([
        'error' => false,
        'message' => 'Score enregistré'
    ]);
    exit();
} else {
    echo json_encode([
        'error' => true,
        'message' => 'Une erreur est survenue'
    ]);
    exit();
}
