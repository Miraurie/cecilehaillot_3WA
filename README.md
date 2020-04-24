# Projet de fin d'études Cécile Haillot ![alt text](https://img.shields.io/badge/Version-1.0-red "Version 1.0")
Il s'agit d'un projet  de site web réalisé après une formation de 3 mois à la 3WAcademy. Le projet utilise l'auto-entreprise de Cécile Haillot comme sujet.

## Installation

Un serveur local comme XAMP ou MAMP est recommandé afin d'effectuer les différents tests.

Dans un premier temps il est demandé d'importer la base de données sur un serveur local ou en ligne MySQL, de créé une base de donnée nommée `cecilehailot` et d'y importer le fichier `bdd_create.sql` puis `bdd_insert.sql`.

Puis il faudra mettre les fichier dans le dossier que votre serveur utilisera.

## Utilisation

La partie administration est cachée afin que un utilisateur ne faisant pas partie de l'administration n'y accède pas. Il faudra d'abord vous connecter en entrant dans l'url `http://localhost/cecilehaillot/controlers/login.php`

Attention, si vous utilisez MAMP, il faudra rajouter `:8888` après `http://localhost`

Pour ce test, l'utilisateur porte le pseudo `test` et le mot-de-passe `blep` or bien évidemment lors de la livraison au client, pensez à le changer dans la base de donnée

Certaines pages ne seront pas accessible par l'utilisateur si il n'est pas connecté

## Credits
[LaurieH](http://laurieh.fr)
