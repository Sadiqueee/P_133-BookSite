<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 09.03.2018
 * Time: 10:55
 */

/***
 * Class Controler
 */
class Controler
{

    private $model;
    private $view;
    public $countBook;

    /***
     * Controler constructor.
     */
    function __construct()
    {
        include ("Modele/basicSkeleton.php");
        include ("Vue/View.php");
        include ("Database.php");
        //créer le model et la vue
        $this->model = new basicSkeleton();
        $this->view = new View();

        $this->Home();
    }



    /***
     * affichage de la page home en récupérant toute les partie qu'il lui faut
     */
    function Home(){
        $head = $this->model->Head();
        $nav = $this->model->HeaderNav();
        $contentHeaderHome = $this->model->ContentHomeHeader();
        $footer = $this->model->Footer();
        $content = $this->model->ContentHome();
        $contentFiveBooks = $this->FiveBooks();

        //envoie à la vue le contenu à afficher
        $this->view->output($head.$nav.$contentHeaderHome.$contentFiveBooks.$content.$footer);
    }


    /***
     * affichage des 5 derniers livres ajoutés
     * @return string contenu des 5 livres
     */
    function FiveBooks()
    {
        //récupère les livres
        $allbooks = $this->ReceiveBooks();
        //compte tout les livres
        $countBooks = count($allbooks);
        //récupère les users
        $allusers = $this->ReceiveUsers();
        //création du contenu des 5 livres
        $content = '<div id="fh5co-main"><div class="fh5co-cards"><div class="container-fluid"><div class="row animate-box"><div class="col-md-12 heading text-center"><h2>Nos derniers Livres</h2></div></div><div  class="row">';
        //boucle for pour afficher les 5 livres
        for ($i = $countBooks-1 ; $i > ( $countBooks-6) ; $i--)
        {
            //récupère l'id du users qui a ajouté le livre sur le site
            $idUser= $allbooks[$i]["idUser"] -1;
            //affichage des infos
            $content.= '<div style="width: 20%" class="col-lg-2-5 col-md-2 col-sm-2 animate-box">
                            <a class="fh5co-card" href="#"><img src="Ressources/images/'.$allbooks[$i]["booFrontPage"].'" alt="Free HTML5 Bootstrap template" class="img-responsive">
                                <div class="fh5co-card-body">
                                    <h3>Titre : ' . $allbooks[$i]["booTitle"] .'</h3>
                                    <h5>Auteur : ' . $allbooks[$i]["booAuthor"] .' </h5>
                                    <h5>Date de Sortie : ' . $allbooks[$i]["booEdiYear"] .' </h5>
                                    <h5>Posté par : ' . $allusers[$idUser]["useSurname"].' '.$allusers[$idUser]["useName"] .'</h5>
                                </div>
                            </a>
                        </div>';
        }

        return $content;
    }


    /***
     * reception de tout les livres
     * @return mixed tableau avec tout les livres
     */
    function ReceiveBooks(){
        $this->daba = new Database();
        $content =  $this->daba->getAllBooks();
        $this->daba->close();
        return $content;
    }


    /***
     * @return mixed tableau avec tout les users
     */
    function ReceiveUsers(){
        $this->daba = new Database();
        $content =  $this->daba->getAllUsers();
        $this->countBook = $this->daba->count;
        $this->daba->close();
        return $content;
    }

}