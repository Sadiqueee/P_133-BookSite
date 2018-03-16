<?php

/**
 * ETML
 * Auteur : silvestrge
 * Date : 09.03.2018
 * Description : ajoute un commentaire sur un livre
 */
class AddComment
{
    /**
     * @return bool
     * Vérifie que le user est bel et bien connecté
     */
    public function CheckConnection(){
        //vérifie que l'on est connecté
        if (isset($_SESSION['connected'])) {
            if ($_SESSION['connected']) {
                return true;
            }
        }
        else{
            return false;
        }
    }
}