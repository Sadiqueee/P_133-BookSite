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
    const rgxPw = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/";
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";

    /**
     * Permet à l'utilisateur de créer un compte tout en vériiant ses données
     */
    public function CreateAccount()
    {
        $allOK=true;
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $surname = htmlspecialchars(trim($_POST['surname']));
            $mail = htmlspecialchars(trim($_POST['mail']));
            $pw = htmlspecialchars(trim($_POST['password']));
            $pw2 = htmlspecialchars(trim($_POST['passwordAgain']));

            if (!preg_match(self::rgxName, $name)) {
                echo "<script language=javascript>alert('Veuillez rentrer un prénom valide')</script>";
                $allOK=false;
                exit();
            } else if (!preg_match(self::rgxName, $surname)) {
                echo "<script language=javascript>alert('Veuillez rentrer un nom valide')</script>";
                $allOK=false;
                exit();
            } else if (!preg_match(self::rgxMail, $mail)) {
                echo "<script language=javascript>alert('Veuillez rentrer une adresse mail valide')</script>";
                $allOK=false;
                exit();
            }

            if (preg_match(self::rgxPw, $pw)) {
                if ($pw !== $pw2) {
                    echo "<script language=javascript>alert('Les mots de passe de correspondent pas')</script>";
                    $allOK=false;
                    exit();
                } else
                    echo "<a href = 'Log.php'>Se connecter</a>";
            } else {
                echo "<p><script language=javascript>alert('Votre mot de passe doit contenir un caractère spécial, une majuscule, un chiffre et doit faire au moins 8 caractères de long')</script></p>";
                $allOK=false;
            }
        }

        if($allOK) {
            if($this->CheckEmail()) {
                $this->InsertData();
            }
        }
    }

    /**
     * rentre les données du user dans la BDD
     */
    private function InsertData(){
        $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);
        $date=date("Y-m-d");
        $password=$_POST["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query="INSERT INTO t_user VALUES (NULL,'".$_POST["name"]."','".$_POST["surname"]."','".$_POST["mail"]."','".$password."',0,'".$date."',0);";

        try {
            $connection->query($query);
            echo "<p><script language='JavaScript'>alert('New record created successfully')</script></p>";
        }
        catch(PDOException  $e){
            echo "<p><script language='JavaScript'>alert('Failed to add the data')</script></p>";
        }
    }

    /**
     * @return bool
     * vérifie que l'adresse mail spécifiée ne soit pas déjà prise
     */
    private function CheckEmail(){
        $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);
        $query = "SELECT DISTINCT useMail FROM t_user";
        $allMail="";

        try{
            $allMail=$connection->query($query);
            $allMail=$allMail->fetch(PDO::FETCH_ASSOC);
            foreach ($allMail as $mail) {
                if(htmlspecialchars(trim($_POST['mail']))==$mail){
                    echo "<p><script language='JavaScript'>alert('That email address is already taken')</script></p>";
                    return false;
                }
            }
            return true;
        }
        catch(PDOException $e){
            echo "<p><script language='JavaScript'>alert('There was a problem retrieving all the mail addresses')</script></p>";
            return false;
        }
    }
}

