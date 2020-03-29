<?php

/**
 * Class GameController
 * Fonctionnalité de la game
 */
class GameController
{

    /**
     * @var Game|null
     * variable contenant le model Game
     */
    private $_game = null;

    /**
     * @var int
     */
    private $_nbCard = 18;

    /**
     * @var int
     */
    private $_nbDuo = 14;

    /**
     * @var array
     */
    private $_cards = [];


    /**
     * GameController constructor.
     */
    public function __construct()
    {
        // On récupère le model
        $this->_game = new Game();
    }

    /**
     * @param $timer
     */
    public function saveTimer($timer)
    {
        $this->_game->addTimer($timer);
    }

    /**
     * @return array
     */
    public function initGame()
    {
        $this->generateCard();
        return $this->_cards;
    }

    /**
     * @return array
     */
    public function getBestTimer()
    {
        return $this->_game->getBestTime();
    }

    /**
     * Génération des cartes dans un ordre RANDOM
     */
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
