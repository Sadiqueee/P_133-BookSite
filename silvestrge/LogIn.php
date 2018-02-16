<?php

/**
 * ETML
 * Auteur : silvestrge
 * Date : 09.02.2018
 * Description : Permet à l'utilisateur de se connecter
 */
session_start();
class LogIn
{
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";

    /**
     * vérifie que les données correspondent bien à l'adresse mail
     */
    public function CheckData(){

        $_SESSION['connected']=false;
        $_SESSION['login']="default";

        if(isset($_POST['submit'])){
            if(isset($_POST['mail']) && isset($_POST['password'])){
                $mail = htmlspecialchars(trim($_POST['mail']));
                $pw = htmlspecialchars(trim($_POST['password']));
                $queryGetPW = "SELECT DISTINCT useMdp FROM t_user WHERE useMail='".$mail."';";
                $queryGetRole = "SELECT DISTINCT useRole FROM t_user WHERE useMail='".$mail."';";
                $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);
                $hashedPw = $connection->query($queryGetPW);
                $hashedPw=$hashedPw->fetch(PDO::FETCH_ASSOC);

                if(password_verify($pw,$hashedPw['useMdp'])==1) {
                    $role = $connection->query($queryGetRole);
                    $role=$role->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['role']=$role['useRole'];
                    $_SESSION['connected']=true;
                    $_SESSION['login']=$mail;
                    echo "<p><script language='JavaScript'>alert('You\'re connected')</script></p>";
                }
                else
                    echo "<p><script language='JavaScript'>alert('Check your data and try again')</script></p>";
            }
        }
    }
}