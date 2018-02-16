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

    /**
     * ajoute un livre à la BDD après quelques vérifications
     */
    public function addBook()
    {
        if (isset($_SESSION['connected'])) {
            if ($_SESSION['connected']) {
                if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['author']) && isset($_POST['editor']) && isset($_POST['dateEditing']) && isset($_POST['part']) && isset($_POST['numberPage']) && isset($_POST['summary']) && isset($_POST['covert']) && isset($_POST['part'])) {
                    if ($_POST['title'] && $_POST['category'] && $_POST['author'] && $_POST['editor'] && $_POST['dateEditing'] && isset($_POST['part']) && $_POST['numberPage'] && $_POST['summary'] && $_POST['covert'] && $_POST['part']) {
                        $connection = new PDO("mysql:host=" . self::bddServer . ";dbname=" . self::bddName . ";charset=utf8", self::bddUserName, self::bddPassword);

                        $queryID = "SELECT DISTINCT idUser FROM t_user WHERE useMail='geraud@peyredieu.fr';";
                        $id = $connection->query($queryID);
                        $id = $id->fetch(PDO::FETCH_ASSOC);
                        $query = "INSERT INTO t_book VALUES (NULL,'" . $_POST["title"] . "','" . $_POST["numberPage"] . "','" . $_POST["part"] . "','" . $_POST['summary'] . "','" . $_POST['covert'] . "','" . $id['idUser'] . "\')');";
                        $connection->query($query);

                    }
                }
            }
        }
    }




    /**
     * ajoute une catégorie au livre
     */
    public function addCategory(){
        if(isset($_POST['category'])) {
            $queryCat = "SELECT DISTINCT idCategory from t_category WHERE catName='" . $_POST['category'] . "';";
            $queryBook = "SELECT DISTINCT "
            $connection = new PDO("mysql:host=" . self::bddServer . ";dbname=" . self::bddName . ";charset=utf8", self::bddUserName, self::bddPassword);

            $idCat=$connection->query($queryCat);
            $idCat=$idCat->fetch(PDO::FETCH_ASSOC);
        }
    }
}