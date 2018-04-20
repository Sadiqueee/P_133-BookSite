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
/** vérifie si on a appuyé sur le bouton se connecter puis lance la procédure */
if(isset($_POST['submit'])){
    $register=new Do_LogIn();
    $register->CheckData();
}
/** création du model et de la vue*/
$model = new basicSkeleton();
$view = new View();
/** création du contenu de la page de login */
$head = $model->Head();
$nav = $model->HeaderNav();
$contentHeader = $model->ContentLogInHeader();
$content = $model->ContentLogIn();
$footer = $model->Footer();
/** envoye le contenu de la page à la vue pour l'afficher */
$view->output($head.$nav.$contentHeader.$content.$footer);




