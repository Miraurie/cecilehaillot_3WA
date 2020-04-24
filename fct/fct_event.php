<?php
include 'fct_strpos.php';
function uploadResa($file)
{
    if ((!empty($file["reservation"])) && ($file['reservation']['error'] == 0)) {
        //Vérifie si le fichier est une image PDF et sa taille est inférieure à 2Mo
        $filename = $file['reservation']['name'];
        $ext = after_last('.', $filename);
        if (($ext == "pdf") && ($file["reservation"]["type"] == "application/pdf") &&
      ($file["reservation"]["size"] < 2000000)) {
            //Déterminez le chemin dans lequel nous voulons enregistrer ce fichier
            $newname = '../files/'.$filename;
            //Vérifiez si le fichier du même nom existe déjà sur le serveur
            if (!file_exists($newname)) {
                //Essayez de déplacer le fichier téléchargé vers son nouvel emplacement
                if ((move_uploaded_file($file['reservation']['tmp_name'], $newname))) {
                    echo "Le fichier a été envoyé : ".$newname.'<br>';
                    $fResa = before_last('.', $filename);
                    return $fResa;
                } else {
                    echo "Erreur : Un problème est survenu lors de l'envoi du fichier <br>";
                }
            } else {
                echo "Erreur: le fichier  ".$file["reservation"]["name"]." extiste déjà <br>";
            }
        } else {
            echo "Erreur : Seul les fichiers .pdf en dessous de 2Mo sont acceptés <br>";
        }
    } else {
        echo "Erreur : Le fichier n'a pas été envoyé <br>";
    }
}

function uploadPlay($file)
{
    if ((!empty($file["playlist"])) && ($file['playlist']['error'] == 0)) {
        //Vérifie si le fichier est une image PDF et sa taille est inférieure à 2Mo
        $filename = $file['playlist']['name'];
        $ext = after_last('.', $filename);
        if (($ext == "pdf") && ($file["playlist"]["type"] == "application/pdf") &&
      ($file["playlist"]["size"] < 2000000)) {
        //Déterminez le chemin dans lequel nous voulons enregistrer ce fichier
            $newname = '../files/'.$filename;
            //Vérifiez si le fichier du même nom existe déjà sur le serveur
            if (!file_exists($newname)) {
                //Essayez de déplacer le fichier téléchargé vers son nouvel emplacement
                if ((move_uploaded_file($file['playlist']['tmp_name'], $newname))) {
                    echo "Le fichier a été envoyé : ".$newname.'<br>';
                    $fPlay = before_last('.', $filename);
                    return $fPlay;
                } else {
                    echo "Erreur : Un problème est survenu lors de l'envoi du fichier <br>";
                }
            } else {
                echo "Erreur: le fichier  ".$file["playlist"]["name"]." extiste déjà <br>";
            }
        } else {
            echo "Erreur : Seul les fichiers .pdf en dessous de 2Mo sont acceptés <br>";
        }
    } else {
        echo "Erreur : Le fichier n'a pas été envoyé <br>";
    }
}