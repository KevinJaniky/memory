<?php
class App {

    protected $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=memory_oclock','root','');
        }catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

}

/*
 * TODO : Commenter le code
 * TODO : Publier l'app
 * TODO : mettre sur github
 */
