<?php

class App
{

    protected $bdd;

    public function __construct()
    {
        try {
            //Dans un cas réel, il est important de créer un dossier de conf et de ne pas giter les informations de la base de données
            // Le fichier de conf sera gitignorer et permettra donc de modifier / ajouter les informations liés au serveur
            $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        } catch (Exception $e) {
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
