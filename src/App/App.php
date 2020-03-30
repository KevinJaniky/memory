<?php

/**
 * Class App
 */
class App
{

    /**
     * @var PDO
     * Variable contenant la connexion en base de données
     */
    protected $bdd;

    /**
     * App constructor.
     */
    public function __construct()
    {
        try {
            //Dans un cas réel, il est important de créer un fichier de conf et de ne pas giter les informations de la base de données
            // Le fichier de conf sera gitignorer et permettra donc de modifier / ajouter les informations liés au serveur
            $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

}
