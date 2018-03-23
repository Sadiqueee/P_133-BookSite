<?php

/**
 * ETML
 * Auteur : silvestrge
 * Date : 09.02.2018
 * Description : Permet à l'utilisateur de se connecter
 */
//session_start();
class LogIn
{
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";

    public function CheckData(){

        $_SESSION['connected']=false;
        $_SESSION['login']="default";

        if(isset($_POST['submit'])){
            if(isset($_POST['mail']) && isset($_POST['password'])){
                $mail = htmlspecialchars(trim($_POST['mail']));
                $pw = htmlspecialchars(trim($_POST['password']));
                $query = "SELECT DISTINCT useMdp FROM t_user WHERE useMail='".$mail."';";
                $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);
                $hashedPw = $connection->query($query);
                $hashedPw=$hashedPw->fetch(PDO::FETCH_ASSOC);

                if(password_verify($pw,$hashedPw['useMdp'])==1) {
                    echo "<p><script language='JavaScript'>alert('You\'re connected')</script></p>";
                    $_SESSION['connected']=true;
                    $_SESSION['login']=$mail;
                }
                else
                    echo "<p><script language='JavaScript'>alert('Check your data and try again')</script></p>";
            }
        }
    }
}