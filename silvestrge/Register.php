<?php
/**
 * ETML
 * Auteur : silvestrge
 * Date : 02.02.2018
 * Description : Page pour la création d'une page utilisateur
 */
class Register
{
    const rgxMail = "/^.*@.*\.[a-z]{2,5}$/";
    const rgxName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/";
    const rgxPw = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/";
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";

    /**
     * Permet à l'utilisateur de créer un compte tout en vériiant ses données
     */
    public function checkData()
    {
        $allOK = true;
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) || isset($_POST['surname']) || isset($_POST['mail']) || isset($_POST['password']) || isset($_POST['passwordAgain'])) {

                //récupère les données
                $name = htmlspecialchars(trim($_POST['name']));
                $surname = htmlspecialchars(trim($_POST['surname']));
                $mail = htmlspecialchars(trim($_POST['mail']));
                $pw = htmlspecialchars(trim($_POST['password']));
                $pw2 = htmlspecialchars(trim($_POST['passwordAgain']));

                //vérifie que toutes les données respectent la mise en forme
                if (!preg_match(self::rgxName, $name)) {
                    $allOK = false;
                    return 1;
                }
                if (!preg_match(self::rgxName, $surname)) {
                    $allOK = false;
                    return 2;
                }
                if (!preg_match(self::rgxMail, $mail)) {
                    $allOK = false;
                    return 3;
                }
                if (preg_match(self::rgxPw, $pw)) {
                    if ($pw !== $pw2) {
                        $allOK = false;
                        return 4;
                    }
                } else {

                    $allOK = false;
                    return 5;
                }

                if($allOK)
                    return 6;
            }
            else{
                return 0;
            }
        }
    }
}

