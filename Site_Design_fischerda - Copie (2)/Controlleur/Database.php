<?php

/**
 * ETML
 * Auteur : David Fischer
 * Date: 14.03.2018
 * Description : classe gérant toute les actions avec la database
 */

/***
 * Class Database
 */
class Database
{

    private $dbh;
    private $rep;
    public $count;



    private $bddPassword="root";
    private $bddName="root";


    /***
     * Constructeur de la clase qui va créer une connexion avec la base de données
     */
    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=db_book; charset=utf8', $this->bddName, $this->bddPassword  );
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /***
     * Méthode qui va préparer et executer la requête
     * @param $request requête à effectuer
     */
    private function executeQuery($request){
        try {
            $this->rep = $this->dbh->prepare($request);
            $this->rep->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /***
     * Méthode qui va récupérer les données de notre requête en un tableau associatif
     * @return mixed tableau avec le resultat de la requête
     */
    private function fetchAssoc(){
        try {
            $result = $this->rep->fetchAll(PDO::FETCH_ASSOC);
            $this->count = $this->rep->rowCount();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $result;
    }

    /***
     * Méthode qui va récupérer les données de notre requête en un tableau associatif et Indexé
     * @return mixed tableau avec le resultat de la requête
     */
    private function fetchBoth(){
        try {
            $result = $this->rep->fetchAll(PDO::FETCH_BOTH);
            $this->count = $this->rep->rowCount();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $result;
    }

    /***
     * Méthode qui va récupérer les données de notre requête en un tableau indexé
     * @return mixed tableau avec le resultat de la requête
     */
    private function fetchIndex(){
        try {
            $result = $this->rep->fetchAll(PDO::FETCH_NUM);
            $this->count = $this->rep->rowCount();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $result;
    }


    /***
     * Méthode qui va fermer notre connexion à la db
     */
    public function close(){
        try {
            $this->dbh = null;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    /***
     * Méthode qui nous récupère le nom et le surnom de tous les prof
     * @return mixed retourne les livres
     */
    public function getAllBooks(){
        $request = "SELECT * FROM `t_book`";
        $this->executeQuery($request);
        return $this->fetchAssoc();

    }

    /***
     * Méthode qui nous récupère tout les users
     * @return mixed retourne les users
     */
    public function getAllUsers(){
        $request = "SELECT * FROM `t_user`";
        $this->executeQuery($request);
        return $this->fetchAssoc();
    }
}