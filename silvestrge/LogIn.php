<?php
/**
 * ETML
 * Auteur : silvestrge
 * Date : 09.02.2018
 * Description : Permet à l'utilisateur de se connecter
 */
class LogIn
{
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";

    /**
     * @return bool
     * vérifie que les données correspondent bien à l'adresse mail
     */
    public function CheckData(){

        //détruit la session existante
        session_unset();

        if(isset($_POST['submit'])){
            if(isset($_POST['mail']) && isset($_POST['password'])){
                $mail = htmlspecialchars(trim($_POST['mail']));
                $pw = htmlspecialchars(trim($_POST['password']));

                //requêtes SQL
                $queryGetPW = "SELECT DISTINCT useMdp FROM t_user WHERE useMail=:mail;";
                $queryGetRole = "SELECT DISTINCT useStatut FROM t_user WHERE useMail=:mail;";

                //connection à la BDD
                $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);

                //effectue les requêtes et récupère les données
                $getPW = $connection->prepare($queryGetPW);
                $getPW->bindValue(':mail',$mail,PDO::PARAM_STR);
                $hashedPw=$getPW->execute();
                $hashedPw=$hashedPw->fetch(PDO::FETCH_ASSOC);

                //si le mot de passe est bon, récupère le rôle de l'utilisateur et le connecte
                if(password_verify($pw,$hashedPw['useMdp'])) {
                    $getRole = $connection->prepare($queryGetRole);
                    $getRole->bindValue(':mail',$mail,PDO::PARAM_STR);
                    $role=$getRole->execute();
                    $role=$role->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['role']=$role['useStatut'];
                    $_SESSION['connected']=true;
                    $_SESSION['login']=$mail;
                    return true;
                }
            }
        }
    }
}