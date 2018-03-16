<?php
session_start();
/**
 * ETML
 * Auteur : silvestrge
 * Date : 16.02.2018
 * Description : ajoute un livre dans la BDD en vérifiant que l'utilisateur soit bien connecté
 */

class New_book
{
    const bddServer="localhost";
    const bddUserName="root";
    const bddPassword="root";
    const bddName="db_book";
    private $title;
    private $pages;
    private $part;
    private $summary;
    private $covert;
    private $author;
    private $editor;
    private $dateEditing;
    private $user;
    private $category;

    /**
     * ajoute un livre à la BDD
     */
    public function addBook()
    {
        //connection à la BDD
        $connection = new PDO("mysql:host=" . self::bddServer . ";dbname=" . self::bddName . ";charset=utf8", self::bddUserName, self::bddPassword);

        $queryCat = "SELECT DISTINCT idCategory from t_category WHERE catName=:category;";
        $queryID = "SELECT DISTINCT idUser FROM t_user WHERE useMail=:useMail;";

        //récupère les id de la catégorie
        $queryCat = $connection->prepare($queryCat);
        $queryCat->bindValue(':category',$this->category,PDO::PARAM_STR);
        $idCat=$queryCat->execute();
        $idCat = $idCat->fetch(PDO::FETCH_ASSOC);

        //récupère l'id de l'utilisateur
        $queryID = $connection->prepare($queryID);
        $queryID->bindValue(':useMail',$this->user,PDO::PARAM_STR);
        $id=$queryID->execute();
        $id = $id->fetch(PDO::FETCH_ASSOC);

        //ajoute le livre à la BDD
        $query = "INSERT INTO t_book VALUES (NULL,:title,:numberPage,:part,:summary,:covert,:author,:editor,:dateEditing,:idUser,:idCategory);";
        $request=$connection->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        //lie les données à la requête
        $request->bindValue(':title',$this->title,PDO::PARAM_STR);
        $request->bindValue(':numberPage',$this->pages,PDO::PARAM_INT);
        $request->bindValue(':part',$this->part,PDO::PARAM_STR);
        $request->bindValue(':summary',$this->summary,PDO::PARAM_STR);
        $request->bindValue(':covert',$this->covert,PDO::PARAM_STR);
        $request->bindValue(':author',$this->author,PDO::PARAM_STR);
        $request->bindValue(':editor',$this->editor,PDO::PARAM_STR);
        $request->bindValue(':dateEditing',$this->dateEditing,PDO::PARAM_STR);
        $request->bindValue(':idUser',$id,PDO::PARAM_INT);
        $request->bindValue(':idCategory',$idCat,PDO::PARAM_INT);
        $request->execute();
        return true;
    }


    /**
     * @return bool
     * vérifie que tout les champs existent et ont été remplis
     */
    public function CheckFields()
    {
        if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['author']) && isset($_POST['editor']) && isset($_POST['dateEditing']) && isset($_POST['part']) && isset($_POST['numberPage']) && isset($_POST['summary']) && isset($_POST['covert']) && isset($_POST['part'])) {
            if ($_POST['title'] && $_POST['category'] && $_POST['author'] && $_POST['editor'] && $_POST['dateEditing'] && isset($_POST['part']) && $_POST['numberPage'] && $_POST['summary'] && $_POST['covert'] && $_POST['part']) {
                //récupère toutes les données
                $this->title=$_POST['title'];
                $this->covert=$_POST['covert'];
                $this->author=$_POST['author'];
                $this->editor=$_POST['editor'];
                $this->dateEditing=$_POST['dateEditing'];
                $this->part=$_POST['part'];
                $this->pages=$_POST['numberPage'];
                $this->summary=$_POST['summary'];
                $this->user=$_SESSION['login'];
                $this->category=$_POST['category'];
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @return bool
     * vérifie que le livre mail spécifié ne soit pas déjà sur le site
     */
    public function CheckBook(){
        //connection à la base de donnée
        $connection = new PDO("mysql:host=".self::bddServer.";dbname=".self::bddName.";charset=utf8",self::bddUserName,self::bddPassword);

        //requêtes et variables
        $query = "SELECT booTitle FROM t_book";

        //récupère et vérifie les titres des livres
        try {
            $allBooks = $connection->query($query);
            $allBooks->fetchAll(PDO::FETCH_ASSOC);

                foreach($allBooks as $row)
                    if (htmlspecialchars($_POST['title']) == $row) {
                        return false;
                    }

            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

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

    /**
     * Vérifie que le fichier est une image
     * @return bool
     */
    public function CheckImage(){
        $regex="/^.*\.(JPG|Tif|PNG|jpg|png|tif|jpeg)$/";
        $regexName="/^[A-Za-z\.]*$/";
        if(isset($_FILES['covert'])) {
            if ($_FILES['covert']['name'] != "") {
                echo $_FILES['covert']['name'];
                if (preg_match($regexName, $_FILES['covert']['name'])) {
                    if (preg_match($regex, $_FILES['covert']['name'])) {
                        if ($_FILES['covert']['error'] == 0) {
                            $originalName = $_FILES['covert']['name'];
                            $originalPath = pathinfo($originalName);
                            $addedDate = gmdate("d.M.y h.i.s", time());
                            $strSource = $_FILES['covert']['tmp_name'];
                            $strPath = "./images/";
                            $strDestination = $addedDate . " " . $_FILES['covert']['name'];
                            move_uploaded_file($strSource, $strPath . $strDestination);
                            return true;
                        }
                    }
                }
            }
        }
    }
}