<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 09.03.2018
 * Time: 10:55
 */
class Controler
{
    function __construct()
    {
        include ("Modele/basicSkeleton.php");
        include ("Vue/View.php");


    }

    function __



    function SignIn(){
        $model = new basicSkeleton();
        $view = new View();

        $head = $model->Head();
        $nav = $model->HeaderNav();
        $footer = $model->Footer();
        $view->output($head.$nav.$footer);
    }

    function Home(){
        $model = new basicSkeleton();
        $view = new View();

        $head = $model->Head();
        $nav = $model->HeaderNav();
        $footer = $model->Footer();
        $content = $model->ContentHome();

        $view->output($head.$nav.$content.$footer);
    }
}