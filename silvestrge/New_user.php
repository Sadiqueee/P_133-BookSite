<?php
include_once ("Register.php");
include_once ("database.php");
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
                $data=new database();

                if($data->checkEmail()) {
                    $temp=$register->checkData();

                    // gère toutes les erreurs possibles
                    switch ($temp){
                        case 0 :
                            /*echo "<script language=javascript>alert('Nouvel utilisateur crée avec succés')</script>";
                            echo "<a href=\"Log.php\">Se connecter</a>";
                            break;*/
                            echo "<script language=javascript>alert('Veuillez ne pas toucher aux noms de mes objets svp')</script>";
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

                        case 6:
                            if($data->addUser()) {
                                echo "<script language = javascript > alert('L\'utilisateur a été crée')</script >";
                                echo "<a href='Log.php'>Se connecter</a>";
                                }
                    }
                }else{
                    echo "Cette adresse mail est déjà prise";
                }
            }
            ?>
        </section>
    </body>
    </html>