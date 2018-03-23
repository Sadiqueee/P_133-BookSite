<?php
session_start();
include_once ("database.php");
/**
 * ETML
 * Auteur : silvestrge
 * Date : 16.02.2018
 * Description : ajoute un livre dans la BDD en vérifiant que l'utilisateur soit bien connecté
 */

class New_book
{
    /**
     * Vérifie que le fichier est une image
     * @return mixed retourne le chemin de l'image
     */
    public function CheckImage(){
        $regex="/^.*\.(JPG|Tif|PNG|jpg|png|tif|jpeg)$/";
        $regexName="/^[A-Za-z\.]*$/";

        if(isset($_FILES['file'])) {
            if ($_FILES['file']['name'] != "") {
                if (preg_match($regexName, $_FILES['file']['name'])) {
                    if (preg_match($regex, $_FILES['file']['name'])) {
                        if ($_FILES['file']['error'] == 0) {
                            $originalName = $_FILES['file']['name'];
                            $originalPath = pathinfo($originalName);
                            $fileExtension = $originalPath['extension'];
                            echo $fileExtension;
                            $addedDate = gmdate("d.M.y h.i.s", time());
                            $strSource = $_FILES['file']['tmp_name'];
                            $strPath = "./images/";
                            $strDestination = $addedDate . " " . $_FILES['file']['name'];
                            move_uploaded_file($strSource, $strPath . $strDestination);
                            return $strPath . $strDestination;
                        }
                    }
                }
            }
        }
    }

    /**
     * vérifie que tout les champs soient remplis
     * @return bool false si non, true si oui
     */
    public function checkFields()
    {
        $check = false;

        if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['author']) && isset($_POST['editor']) && isset($_POST['dateEditing']) && isset($_POST['part']) && isset($_POST['numberPage']) && isset($_POST['summary']) && isset($_FILES['file']) && isset($_POST['part'])) {
            if ($_POST['title'] != "" && $_POST['category'] != "" && $_POST['author'] != "" && $_POST['editor'] != "" && $_POST['dateEditing'] != "" && $_POST['numberPage'] != "" && $_POST['summary'] != "" && $_FILES['file']['name'] != "" && $_POST['part'] != "") {
                return true;
            }
        }

        return false;
    }
}