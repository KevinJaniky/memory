<?php

class GameController
{

    private $_game = null;
    private $_nbCard = 18;
    private $_nbDuo = 14;
    private $_cards = [];


    public function __construct()
    {
        $this->_game = new Game();
    }

    public function saveTimer($timer)
    {
        $this->_game->addTimer($timer);
    }

    public function initGame()
    {
        $this->generateCard();
        return $this->_cards;
    }

    public function getBestTimer()
    {
        return $this->_game->getBestTime();
    }

    private function generateCard()
    {
        // on créer un tableau contenant toute les cartes
        for ($i = 0; $i < $this->_nbCard; $i++) {
            $this->_cards[] = $i;
        }

        // on melange une première fois toutes les cartes
        shuffle($this->_cards);

        // on récupère ensuite le nombre de carte / 2 que le jeu va contenir.
        // Il sera également possible de créer une formulaire de paramètre pour changer ces valeurs.
        $this->_cards = array_slice($this->_cards, 0, $this->_nbDuo);

        // Le jeu nous demande d'avoir 2 fois la même carte, on créer alors un clone du tableau 1.
        $clone = $this->_cards;

        // on regroupe ces deux tableaux.
        $this->_cards = array_merge($this->_cards, $clone);

        // Pour éviter d'avoir un schéma répétitif on mélange une seconde fois le tableau .
        shuffle($this->_cards);


    }

}
