#Installation du projet

`git clone https://github.com/KevinJaniky/memory.git
`
- Créer la base de données 
``DROP TABLE IF EXISTS `best_time`;
CREATE TABLE IF NOT EXISTS `best_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `timer` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
``

- Node modules : 

`npm install` à la racine du projet

- Configuration :

Créer un fichier `config.php` via `config_sample.php` et renseigner les informations de connexion.

Lancer le jeu sur votre serveur et c'est partie
