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
     * vérifie que tout les champs soient remplis
     * @return bool
     */
    public function checkFields(){
        if(isset($_POST['grade']) && isset($_POST['comment']))
            if($_POST['comment'])
                return true;

        return false;
    }
}