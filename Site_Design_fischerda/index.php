<?php
/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 02.03.2018
 * Time: 08:35
 */

//On démarre la session
session_start();

//On inclut le contrôleur s'il existe et s'il est spécifié
if (!empty($_GET['page']) && is_file('Controlleur/'.$_GET['page'].'.php'))
{
    include 'Controlleur/'.$_GET['page'].'.php';
}
else
{
    include 'Controlleur/Home.php';
}
