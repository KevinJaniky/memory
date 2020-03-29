<?php
// on ajoute le fichier de config pour avoir acces au variable global de php lié au serveur
require_once 'config.php';

/* Il y a trois solutions pour autoloader nos classes PHP.
 * - Utiliser composer pour pouvoir bénéficier de PSR4 ( une norme PHP )
 * - Utiliser la fonction spl_autoload
 * - Ajouter les classe une a une
 *
 * Dans notre cas nous allons utiliser la dernière méthode, car on a simplement 3 petites classes a ajouter.
 */


require_once 'src/App/App.php';
require_once 'src/Game/Game.php';
require_once 'src/Game/GameController.php';
