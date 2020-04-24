<?php
include 'fct_strpos.php';
function uploadImg($file)
{
    
    if ((!empty($file["img"])) && ($file['img']['error'] == 0)) {
        // Vérifie si le fichier est une image JPEG, JPG ou PNG et sa taille est inférieure à 5Mo
        $filename = $file['img']['name'];
        $ext = after_last('.', $filename);
        if (($ext == "jpg")|| ($ext == "JPG") || ($ext == "png") || ($ext == "PNG") || ($ext == "jpeg") || ($ext == "JPEG") && ($file["img"]["type"] == "image/jpg") || ($file["img"]["type"] == "image/png") &&
      ($file["img"]["size"] < 5000000)) {
            // Déterminez le chemin dans lequel nous voulons enregistrer ce fichier
            $newname = '../img/cours/'.$filename;
            // Vérifier si le fichier du même nom existe déjà sur le serveur
            if (!file_exists($newname)) {
                //Essaye de déplacer le fichier téléchargé vers son nouvel emplacement
                if ((move_uploaded_file($file['img']['tmp_name'], $newname))) {
                    echo "Le fichier a été envoyé : ".$newname.'<br>';
                    $fImg = before_last('.', $filename);
                    $img = [
                        'nom' => $fImg,
                        'ext' => $ext
                    ];
                    return $img;
                } else {
                    echo "Erreur : Un problème est survenu lors de l'envoi du fichier <br>";
                }
            } else {
                echo "Erreur: le fichier  ".$file["img"]["name"]." extiste déjà <br>";
            }
        } else {
            echo "Erreur : Seul les fichiers .pdf en dessous de 2Mo sont acceptés <br>";
        }
    } else {
        echo "Erreur : Le fichier n'a pas été envoyé <br>";
    }
}