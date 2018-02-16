<?php
include("Register.php");
/**
 * ETML
 * Auteur : Géraud Silvestri
 * Date : 19.01.2018
 * Description : permet de créer un nouvel utilisateur
 */
?>
<DOCTYPE !html>
    <html lang = "fr">
    <head>
        <meta charset="utf-8"/>
        <title>Ajouter un nouvel utilisateur</title>
        <link rel="shortcut icon" href="icon.ico">
    </head>

    <body>
        <section>
            <form method="POST">
                <label for="name">Nom </label><input name="name"/><br>
                <label for="surname">Prénom </label><input name="surname"/><br>
                <label for="mail">Adresse mail </label><input name="mail"/><br>
                <label for="password">Mot de passe </label><input name="password" type="password"/><br>
                <label for="passwordAgain">Réentrer votre mot de passe</label><input name="passwordAgain" type="password"/></br></br>
                <input id="validate" type="submit" name="submit" value="Valider"/>
                <p id="answer"><?php ?></p>
                </form>

            <?php
            if(isset($_POST['submit'])){
                $register=new Register();
                $register->CreateAccount();
            }
            ?>
        </section>
    </body>
    </html>