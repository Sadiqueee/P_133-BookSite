<?php
session_start();
include("database.php");
/**
 * ETML
 * Auteur : silvestrge
 * Date : 09.02.2018
 * Description : Page permettant à l'utilisateur de se connecter
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Se connecter</title>
</head>
<body>
    <section>
            <form method="POST">
                <label for="mail">Adresse mail </label><input name="mail"/>
                <label for="password">Mot de passe </label><input name="password" type="password"/>
                <input id="validate" type="submit" name="submit" value="Valider"/>
            </form>

<?php
if(isset($_POST['submit'])){
    $data=new database();
    if($data->logIn()){
        echo "<p><script language='JavaScript'>alert('You\'re connected')</script></p>";
        header('location: Accueil.php');
    }
    else{
        echo "<p><script language='JavaScript'>alert('Check your data and try again')</script></p>";
    }
}
?>
    </section>

</body>
</html> 