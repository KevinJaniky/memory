<?php

/**
 * Class Game
 * Model de Game
 */
class  Game extends App
{

    /**
     * Game constructor.
     */
    public function __construct()
    {
        // On appelle le constructeur de la class App pour bénéficier de la connexion bdd
        parent::__construct();
    }


    /**
     * @param $timer
     * @return bool
     */
    public function addTimer($timer)
    {
        $sql = 'INSERT INTO best_time (timer) VALUES (:timer)';
        $query = $this->bdd->prepare($sql);
        $query->execute([
            'timer' => intval(htmlentities(trim($timer)))
        ]);
        return true;
    }

    /**
     * @return array
     */
    public function getBestTime(){
        $sql = 'SELECT * FROM best_time ORDER BY timer DESC LIMIT 5';
        $query = $this->bdd->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
