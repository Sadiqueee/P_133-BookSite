<?php
/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 16.03.2018
 * Time: 08:54
 */



include ("Modele/basicSkeleton.php");
include ("Vue/View.php");
include ("Register.php");


/** création de la vue et du model */
$model = new basicSkeleton();
$view = new View();
/** création du contenu de la page d'inscription */
$head = $model->Head();
$nav = $model->HeaderNav();
$contentHeader = $model->ContentSignInHeader();
$content = $model->ContentSignIn();
$footer = $model->Footer();
/** envoie à la vue le contenu à afficher */
$view->output($head.$nav.$contentHeader.$content.$footer);

/** vérifie si on à lancer la procédure d'incription */
if(isset($_POST['submit'])){
    $register=new Register();
    $okay = $register->CheckEmail();
    /** si les données sont correcte on passe à la suite */
    if($okay) {
        /** création du compte */
        $temp=$register->CreateAccount();

        // gère toutes les erreurs possibles
        switch ($temp){
            case 0 :
                echo "<script language=javascript>alert('Nouvel utilisateur crée avec succés')</script>";
                echo '<a href="http://localhost:8080/P_133-BookSite/Site_Design_fischerda/?page=LogIn">Se connecter</a>';
                break;

            case 1 :
                echo "<script language=javascript>alert('Veuillez rentrer un prénom valide')</script>";
                break;

            case 2 :
                echo "<script language=javascript>alert('Veuillez rentrer un nom valide')</script>";
                break;

            case 3 :
                echo "<script language=javascript>alert('Veuillez rentrer une adresse mail valide')</script>";
                break;

            case 4 :
                echo "<script language=javascript>alert('Les mots de passe de correspondent pas')</script>";
                break;

            case 5 :
                echo "<p><script language=javascript>alert('Votre mot de passe doit contenir un caractère spécial, une majuscule, un chiffre et doit faire au moins 8 caractères de long')</script></p>";
                break;

            case 6 :
                echo "<script language=javascript>alert('Veuillez ne pas toucher aux noms de mes objets svp')</script>";
                break;

            case 7 :
                echo "<script language=javascript>alert('L\'ajout n\'as pas pu se faire.')</script>";
                break;
        }

    }else{

        echo "<script language=javascript>alert('Cette adresse mail est déjà prise')</script>";
    }
}
