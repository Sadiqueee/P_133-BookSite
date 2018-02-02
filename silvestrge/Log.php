<?php
    if(isset($_POST['submit']))
    {
        $rgxMail = "/^.*@.*\.[a-z]{2,5}$/";
        $rgxName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/";
        $rgxPw = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/";

        $name = htmlspecialchars(trim($_POST['name']));
        $surname = htmlspecialchars(trim($_POST['surname']));
        $mail = htmlspecialchars(trim($_POST['mail']));
        $pw = htmlspecialchars(trim($_POST['password']));
        $pw2 = htmlspecialchars(trim($_POST['passwordAgain']));

        if(!preg_match($rgxName, $name)){
            echo "<script language=javascript>alert('Veuillez rentrer un prénom valide')</script>";
            exit();
        }
        else if(!preg_match($rgxName, $surname)){
            echo "<script language=javascript>alert('Veuillez rentrer un nom valide')</script>";
            exit();
        }
        else if(!preg_match($rgxMail, $mail)){
            echo "<script language=javascript>alert('Veuillez rentrer une adresse mail valide')</script>";
            exit();
        }

        if (preg_match($rgxPw, $pw)) {
            if ($pw !== $pw2) {
                echo "<script language=javascript>alert('Les mots de passe de correspondent pas')</script>";
                exit();
            }
            else
                echo "<p>Votre compte a été créer.</p></br><a>Se connecter</a>";
        } else {
            echo "<p><script language=javascript>alert('Votre mot de passe doit contenir un caractère spécial, une majuscule, un chiffre et doit faire au moins 8 caractères de long')</script></p>";

        }
    }
?>