<?php
// On appelle notre autoload pour pouvoir utiliser les classes PHP
require_once './autoload.php';
/**
 * @var $game GameController
 */
$game = new GameController();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Memory - Oclock <3 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/lib/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="content">
    <div class="sidebar">
        <div class="info">
            <p class="timer"><i class="fa fa-clock"></i><span class="text_timer">240</span></p>
            <p class="card_state found_not_found">0/14</p>
            <button class="restart">Restart</button>
        </div>
        <div class="game_state">
            <p class="state">Let's Go</p>
        </div>
        <div class="best_time">
            <p>Meilleurs temps</p>

            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Tps</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // On récupère les meilleurs temps
                $best = $game->getBestTimer();
                if (!empty($best)) {
                    foreach ($best as $b) {
                        ?>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($b['created_at'])) ?></td>
                            <td><?php echo(240 - $b['timer']) ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container" id="memory">
        <div class="plateau">
            <?php
            // On instancie notre classe et on appel notre methode magique pour générer nos cartes.
            $data = $game->initGame();
            $i = 0;
            // ON boucle a présent sur chaque carte
            foreach ($data as $item) {
                // On utilise le modulo pour ajouter une ligne toute les 7 cartes.
                if ($i % 7 == 0) {
                    ?>
                    <div class="row">
                    <?php
                }
                // on ajotue une carte , en ajoutant un data-card permettant de travailler facilement la donnée avec Javascript.
                ?>
                <div class="card f<?php echo $item ?>" data-card="<?php echo $item ?>">
                </div>
                <?php
                if ($i % 7 == 6) {
                    ?>
                    </div>
                    <?php
                }
                $i++;
            }
            ?>
        </div>
    </div>
    <div class="progressbar_container">
        <div class="progressbar"></div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</html>
