<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
$db = new Database();

// Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
$query =
'SELECT
        id,
        city,
        text_card
    FROM
        cours;';

$carte_cours = $db->findAll($query, []);
if (empty($_POST)) {
    // Sélection et affichage du template PHTML.
    $template = 'login';
    include '../layout.phtml';
} else {
    // Dépendance : Connexion Bdd
    require_once '../conf/Database.php';
    $db = new Database();
    $query =
    'SELECT
            id,
            name,
            password
        FROM
            users
        WHERE
            name = :name
    ';
    $users = $db->findOne($query, [
        ':name' => $_POST['name']
    ]);

    // On vérifie si l'utilisateur existe
    if(empty($users))
    {
        throw new DomainException
        (
            header('Location: ../controllers/login.php?mdpE=1')
        );
    }

    // On vérifie que le mot de passe est le bon
    $mdp = md5($_POST['password']);

    if($mdp !== $users['password'])
    {
        throw new DomainException
        (
            header('Location: ../controllers/login.php?mdpE=2')
        );

    }

    // Création de la session
    // Init session
    if(session_status() == PHP_SESSION_NONE)
    {
        // Démarrage du module PHP de gestion deas sessions.
        // Ce qui donne accès à $_SESSION
        session_start();
    }

    $_SESSION['users'] = [];

    $_SESSION['users']['id'] = $users['id'];
    $_SESSION['users']['name'] = $users['name'];

    // Retour à la page d'accueil une fois que l'utilisateur s'est connecté
    header('Location: ../index.php');
    exit();
}
