<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 16.03.2018
 * Time: 08:25
 */
include ("Modele/basicSkeleton.php");
include ("Vue/View.php");
include("Do_LogIn.php");

if(isset($_POST['submit'])){
    $register=new Do_LogIn();
    $register->CheckData();
}

        $model = new basicSkeleton();
        $view = new View();

    $head = $model->Head();
    $nav = $model->HeaderNav();
    $contentHeader = $model->ContentLogInHeader();
    $content = $model->ContentLogIn();

    $footer = $model->Footer();
    $view->output($head.$nav.$contentHeader.$content.$footer);




