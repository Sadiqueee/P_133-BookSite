<?php
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
                <p>Nom </p><input name="name"/>
                <p>Prénom </p><input name="surname"/>
                <p>Adresse mail </p><input name="mail"/>
                <p>Mot de passe </p><input name="password" type="password"/>
                <p>Réentrer votre mot de passe</p><input name="passwordAgain" type="password"/></br></br>
                <input id="validate" type="submit" name="submit" value="Valider"/>
                <p id="answer"><?php ?></p>
                <a id="link" href="https://www.etml.ch/"></a>
                </form>

            <?php
            include("Register.php");

            if(isset($_POST['submit'])){
                $register=new Register();
                $register->CreateAccount();
            }
            ?>
        </section>
    </body>
    </html>