<?php
// init session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// On vérifie si l'utilisateur est connecté
if (!empty($_SESSION) and array_key_exists('users', $_SESSION)) {
    // Validation de la query string dans l'URL.
    if (!array_key_exists('id', $_GET) or !ctype_digit($_GET['id'])
        and !array_key_exists('table', $_GET) or !ctype_alpha($_GET['table'])) {
        header('Location: ../index.php');
        exit();
    }
    
    // Dépendance : Connexion Bdd
    require_once '../conf/Database.php';
    $db = new Database();
    
    $table = $_GET['table'];
    $page = $_GET['page'];
    
    // Suppression d'un element du site
    try {
        $query =
        "DELETE FROM
                $table
            WHERE
                id = :id
        ";
        $ex = $db->executeSql($query, [
            ':id' => $_GET['id']
        ]);
        header('Location: '.$page.'.php');
        exit();
    } catch (PDOException $e) {
        echo "Message d'erreur : $e->getMessage()";
    }
    // Redirection vers le panneau d'administration.
    header('Location: /admin.php');
    exit();
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
    exit();
}