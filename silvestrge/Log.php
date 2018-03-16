<?php
include("LogIn.php");
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
                <p id="answer"><?php ?></p>
                <a id="link" href="AddBook.php">aasd</a>
            </form>

<?php
if(isset($_POST['submit'])){
    $register=new DoLogIn();
    $register->CheckData();
}
?>
    </section>

</body>
</html> 