<?php
/**
 * ETML
 * Auteur : silvestrge
 * Date : 14.03.2018
 * Description : Gère la connexion et les requêtes à la BDD
 */

include_once "config.php";

class database
{
    //déclaration des constantes
    private $bddServer;
    private $bddUserName;
    private $bddPassword;
    private $bddName;
    private $bddCharset;
    private $connection = null;
    private $query = null;

    /**
     * constructeur
     */
    public function __construct()
    {
        $this->bddServer = $GLOBALS['CONFIG']['database']['bddServer'];
        $this->bddUserName = $GLOBALS['CONFIG']['database']['bddUserName'];
        $this->bddPassword = $GLOBALS['CONFIG']['database']['bddPassword'];
        $this->bddName = $GLOBALS['CONFIG']['database']['bddName'];
        $this->bddCharset = $GLOBALS['CONFIG']['database']['bddCharset'];

        //connection à la BDD
        $this->connection = new PDO("mysql:host=" . $this->bddServer . ";dbname=" . $this->bddName . ";charset=" . $this->bddCharset, $this->bddUserName, $this->bddPassword);
    }

    /**
     * ferme la connexion
     */
    public function close()
    {
        $this->connection = null;
    }

    /**
     * retourne un tableau associatif contenant toutes les données
     * @param $query requête
     * @return mixed
     */
    private function fetchAssoc($query)
    {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * prepare et execute une requete
     * @param $request requête sql
     */
    private function executeQuery($request, $value = NULL)
    {
        $this->query = $this->connection->prepare($request);

        if ($value != NULL) {
            foreach ($value as $row) {
                $this->query->bindValue($row['champ'], $row['value'], $row['type']);
            }
        }
        $this->query->execute();
    }

    /**
     * ajoute un livre dans la BDD en récupérant l'id user et l'id du livre
     */
    public function addBook($path)
    {
        $queryCat = "SELECT DISTINCT idCategory from t_category WHERE catName=:category;";
        $queryID = "SELECT DISTINCT idUser FROM t_user WHERE useMail=:useMail;";

        //récupère les id de la catégorie
        $valueCat = array(
            "0" => array(
                "champ" => "category",
                "value" => $_POST['category'],
                "type" => PDO::PARAM_STR
            )
        );
        $this->executeQuery($queryCat, $valueCat);

        $idCat = $this->fetchAssoc($this->query);

        //récupère l'id de l'utilisateur
        $valueID = array(
            "0" => array(
                "champ" => "useMail",
                "value" => $_SESSION['login'],
                "type" => PDO::PARAM_INT
            )
        );

        $this->executeQuery($queryID, $valueID);
        $id = $this->fetchAssoc($this->query);

        //ajoute le livre à la BDD
        $add = "INSERT INTO t_book VALUES (NULL,:title,:numberPage,:part,:summary,:covert,:author,:editor,:dateEditing,:idUser,:idCategory);";

        $valueAdd = array(
            "0" => array(
                "champ" => "title",
                "value" => $_POST['title'],
                "type" => PDO::PARAM_STR
            ),
            "1" => array(
                "champ" => "numberPage",
                "value" => $_POST['numberPage'],
                "type" => PDO::PARAM_INT
            ),
            "2" => array(
                "champ" => "part",
                "value" => $_POST['part'],
                "type" => PDO::PARAM_STR
            ),
            "3" => array(
                "champ" => "summary",
                "value" => $_POST['summary'],
                "type" => PDO::PARAM_STR
            ),
            "4" => array(
                "champ" => "covert",
                "value" => $path,
                "type" => PDO::PARAM_STR
            ),
            "5" => array(
                "champ" => "author",
                "value" => $_POST['author'],
                "type" => PDO::PARAM_STR
            ),
            "6" => array(
                "champ" => "editor",
                "value" => $_POST['editor'],
                "type" => PDO::PARAM_STR
            ),
            "7" => array(
                "champ" => "dateEditing",
                "value" => $_POST['dateEditing'],
                "type" => PDO::PARAM_STR
            ),
            "8" => array(
                "champ" => "idUser",
                "value" => $id[0]['idUser'],
                "type" => PDO::PARAM_INT
            ),
            "9" => array(
                "champ" => "idCategory",
                "value" => $idCat[0]['idCategory'],
                "type" => PDO::PARAM_INT
            )
        );

        $this->executeQuery($add, $valueAdd);
    }


    /**
     * vérifie que le livre mail spécifié ne soit pas déjà sur le site
     * @return bool dit si le livre a déjà été ajouté ou non
     */
    public function checkBook(){
        //requêtes et variables
        $check = "SELECT booTitle FROM t_book";
        $this->executeQuery($check);

        $allBooks=$this->fetchAssoc($this->query);

        //récupère et vérifie les titres des livres
        try {
            foreach($allBooks as $row)
                if (htmlspecialchars($_POST['title']) == $row['booTitle']) {
                    return false;
                }
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }


    /**
     * rentre les données du user dans la BDD
     */
    public function addUser(){
        //récupère les données ayant besoin d'être modifiée
        $date=date("Y-m-d");
        $password=$_POST["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);

        //requête
        $add="INSERT INTO t_user VALUES (NULL,:name,:surname,:mail,:pw,0,:date,0,'common');";

        //essaie de faire la requête
        try {
            $valueAdd = array(
                "0" => array(
                    "champ" => "name",
                    "value" => $_POST['name'],
                    "type" => PDO::PARAM_STR
                ),
                "1" => array(
                    "champ" => "surname",
                    "value" => $_POST['surname'],
                    "type" => PDO::PARAM_STR
                ),
                "2" => array(
                    "champ" => "mail",
                    "value" => $_POST['mail'],
                    "type" => PDO::PARAM_STR
                ),
                "3" => array(
                    "champ" => "pw",
                    "value" => $password,
                    "type" => PDO::PARAM_STR
                ),
                "4" => array(
                    "champ" => "date",
                    "value" => $date,
                    "type" => PDO::PARAM_STR
                ),
            );
            $this->executeQuery($add,$valueAdd);
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
    public function checkEmail(){
        //requêtes et variables
        $query = "SELECT useMail FROM t_user";

        //récupère et vérifie les adresses mails
        try {
            $this->executeQuery($query);
            $allMail=$this->fetchAssoc($this->query);

            foreach($allMail as $row){
                if($_POST['mail']==$row['useMail']){
                    return false;
                }
            }
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

    /**
     * vérifie que les données correspondent bien à l'adresse mail puis connecte le user
     * @return bool
     */
    public function logIn(){

        //détruit la session existante
        session_unset();

        if(isset($_POST['submit'])){
            if(isset($_POST['mail']) && isset($_POST['password'])){
                $mail = htmlspecialchars(trim($_POST['mail']));
                $pw = htmlspecialchars(trim($_POST['password']));

                //requêtes SQL
                $queryGetPW = "SELECT DISTINCT useMdp FROM t_user WHERE useMail=:mail;";
                $queryGetRole = "SELECT DISTINCT useStatut FROM t_user WHERE useMail=:mail;";

                //effectue les requêtes et récupère les données
                $valuePW=array(
                    "0"=>array(
                        "champ"=>"mail",
                        "value"=>$mail,
                        "type"=>PDO::PARAM_STR
                    )
                );
                $this->executeQuery($queryGetPW,$valuePW);
                $getPW=$this->fetchAssoc($this->query);
                $hashedPw=$getPW[0]['useMdp'];

                //si le mot de passe est bon, récupère le rôle de l'utilisateur et le connecte
                if(password_verify($pw,$hashedPw)) {
                    $valueRole=array(
                        "0"=>array(
                            "champ"=>"mail",
                            "value"=>$mail,
                            "type"=>PDO::PARAM_STR
                        )
                    );
                    $this->executeQuery($queryGetRole,$valueRole);
                    $role=$this->fetchAssoc($this->query);
                    $_SESSION['role']=$role[0]['useStatut'];
                    $_SESSION['connected']=true;
                    $_SESSION['login']=$mail;
                    return true;
                }
            }
        }
    }

    /**
     * @return bool
     * Vérifie que le user est bel et bien connecté
     */
    public function checkConnection(){
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

    /**
     * ajoute un commentaire à un livre dans la BDD
     * @return bool retourne si ça a marché ou non
     */
    public function addComment()
    {
        try {
            $add = "INSERT INTO t_comment VALUES(NULL,:eval,:text,:date,:idBook,:idUser)";
            $queryID = "SELECT DISTINCT idUser FROM t_user WHERE useMail=:useMail;";
            $queryBook = "SELECT DISTINCT idBook FROM t_book WHERE booTitle=:name";

            //récupère l'id de l'utilisateur
            $valueID = array(
                "0" => array(
                    "champ" => "useMail",
                    "value" => $_SESSION['login'],
                    "type" => PDO::PARAM_STR
                )
            );
            $this->executeQuery($queryID, $valueID);
            $idUser = $this->fetchAssoc($this->query);

            //récupère l'id du livre
            $valueBook = array(
                "0" => array(
                    "champ" => "name",
                    "value" => $_GET['booName'],
                    "type" => PDO::PARAM_STR
                )
            );
            $this->executeQuery($queryBook, $valueBook);
            $idBook = $this->fetchAssoc($this->query);

            $valueAdd = array(
                "0" => array(
                    "champ" => "eval",
                    "value" => $_POST['grade'],
                    "type" => PDO::PARAM_INT
                ),
                "1" => array(
                    "champ" => "text",
                    "value" => $_POST['comment'],
                    "type" => PDO::PARAM_STR
                ),
                "2" => array(
                    "champ" => "date",
                    "value" => date("Y-m-d"),
                    "type" => PDO::PARAM_STR
                ),
                "3" => array(
                    "champ" => "idBook",
                    "value" => $idBook[0]['idBook'],
                    "type" => PDO::PARAM_INT
                ),
                "4" => array(
                    "champ" => "idUser",
                    "value" => $idUser[0]['idUser'],
                    "type" => PDO::PARAM_INT
                )
            );

            $this->executeQuery($add, $valueAdd);

            return true;
        }catch(Exception $e){ return false;}

    }
}