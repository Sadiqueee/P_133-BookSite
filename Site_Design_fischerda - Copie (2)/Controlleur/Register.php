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
    public function CreateAccount()
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

                //vérifie que toutes les données sont ok et si oui appelle les méthodes suivantes
                if ($allOK) {
                    if($this->InsertData()) {
                        return 0;
                    }else{
                        return 7;
                    }
                }
            }
            else{
                return 6;
            }
        }
    }

    /**
     * rentre les données du user dans la BDD
     */
    private function InsertData(){
        //connection à la BDD
        $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);

        //récupère les données ayant besoin d'être modifiée
        $date=date("Y-m-d");
        $password=$_POST["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);

        //requête
        $query="INSERT INTO t_user VALUES (NULL,:name,:surname,:mail,:pw,0,:date,0,'common');";

        //essaie de faire la requête
        try {
            $insert=$connection->prepare($query);
            $insert->bindValue(':name',$_POST["name"],PDO::PARAM_STR);
            $insert->bindValue(':surname',$_POST["surname"],PDO::PARAM_STR);
            $insert->bindValue(':mail',$_POST["mail"],PDO::PARAM_STR);
            $insert->bindValue(':pw',$password,PDO::PARAM_STR);
            $insert->bindValue(':date',$date,PDO::PARAM_STR);
            $insert->execute();
            return true;
        }
        catch(PDOException  $e){
            return false;
        }
    }

    /**
     * @return bool
     * vérifie que l'adresse mail spécifiée ne soit pas déjà prise
     */
    public function CheckEmail(){
        //connection à la base de donnée
        $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);
        $checkM = true;
        //requêtes et variables
        $query = "SELECT useMail FROM t_user";

        //récupère et vérifie les adresses mails
        try {
            $allMail = $connection->query($query);

            while($row = $allMail->fetch(PDO::FETCH_ASSOC)) {
                if($_POST['mail']==$row['useMail']){
                    $checkM = false;
                }
            }

        }
        catch(PDOException $e){
            $checkM = false;
        }
        return $checkM;
    }
}

