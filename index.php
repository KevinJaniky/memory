<!DOCTYPE html>
<html>
<head>
    <title>Memory - Oclock <3 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="time_information">
    <div class="timer">00:00</div>
    <div class="progressbar_container">
        <div class="progressbar"></div>
    </div>
</div>
<div class="other_information">
    <h1 class="state"></h1>
    <p class="found_not_found">0/14</p>
</div>
<div class="container" id="memory">
    <div class="plateau">
        <?php
        function generateCard()
        {
            $nbCard = 18;
            $nbCaseDuo = 14;

            $arrayCards = [];
            for ($i = 0; $i < $nbCard; $i++) {
                $arrayCards[] = $i;
            }
// on melange une premiere fois toute les cartes
            shuffle($arrayCards);

//on recupere les $nbCaseDuo premieres / Dans le cas ou le nbCaseDuo est saisit par l'utilisateur alors vérifier que ce nombre est inferieur a count du tableau nbcard
            $arrayCards = array_slice($arrayCards, 0, $nbCaseDuo);

//on clone le tableau 1 pour avoir les pairs de carte
            $arrayCardsClone = $arrayCards;
            $final = array_merge($arrayCards, $arrayCardsClone);

// on melance une nouvelle fois
            shuffle($final);
            return $final;
        }

        $data = generateCard();

        $i = 0;
        foreach ($data as $item) {

            if ($i % 7 == 0) {
                ?>
                <div class="row">
                <?php
            }

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
</body>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</html>


7 par 4
