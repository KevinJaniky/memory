<?php

class  Game extends App
{

    public function __construct()
    {
        parent::__construct();
    }


    public function addTimer($timer)
    {
        $sql = 'INSERT INTO best_time (timer) VALUES (:timer)';
        $query = $this->bdd->prepare($sql);
        $query->execute([
            'timer' => intval(htmlentities(trim($timer)))
        ]);
        return true;
    }

    public function getBestTime(){
        $sql = 'SELECT * FROM best_time ORDER BY timer ASC';
        $query = $this->bdd->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
