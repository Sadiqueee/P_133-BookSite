<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 09.03.2018
 * Time: 10:55
 */
class Controler
{

    private $model;
    private $view;
    private $daba;
    public $countBook;
    function __construct()
    {
        include ("Modele/basicSkeleton.php");
        include ("Vue/View.php");
        include ("Database.php");
        $this->model = new basicSkeleton();
        $this->view = new View();

        $this->Home();
    }


    function Home(){
        $head = $this->model->Head();
        $nav = $this->model->HeaderNav();
        $contentHeaderHome = $this->model->ContentHomeHeader();
        $footer = $this->model->Footer();
        $content = $this->model->ContentHome();
        $contentFiveBooks = $this->FiveBooks();


        $this->view->output($head.$nav.$contentHeaderHome.$contentFiveBooks.$content.$footer);
    }
    function FiveBooks()
    {
        $allbooks = $this->ReceiveBooks();
        $countBooks =
        $allusers = $this->ReceiveUsers();
        $content = '<div id="fh5co-main"><div class="fh5co-cards"><div class="container-fluid"><div class="row animate-box"><div class="col-md-12 heading text-center"><h2>Nos derniers Livres</h2></div></div><div  class="row">';
        for ($i = $countBooks ; $i > $countBooks-5 ; $i--)
            $content.= '<div style="width: 20%" class="col-lg-2-5 col-md-2 col-sm-2 animate-box">
                            <a class="fh5co-card" href="#"><img src="Ressources/images/Origine.jpg" alt="Free HTML5 Bootstrap template" class="img-responsive">
                                <div class="fh5co-card-body">
                                    <h3>Titre : ' . $allbooks[$i]["booTitle"] .'</h3>
                                    <h5>Auteur : ' . $allbooks[$i]["booAuthor"] .' </h5>
                                    <h5>Date de Sortie : ' . $allbooks[$i]["booEdiYear"] .' </h5>
                                    <h5>Posté par : ' . $allusers[$allbooks[$i]["idUser"]]["useSurname"].' '.$allusers[$allbooks[$i]["idUser"]]["useName"] .'</h5>
                                </div>
                            </a>
                        </div>';
        return $content;
    }

    function ReceiveBooks(){
        $this->daba = new Database();
        $content =  $this->daba->getAllBooks();
        $this->daba->close();
        return $content;
    }
    function ReceiveUsers(){
        $this->daba = new Database();
        $content =  $this->daba->getAllBooks();
        $this->countBook = $this->daba->count;
        $this->daba->close();
        return $content;
    }

}