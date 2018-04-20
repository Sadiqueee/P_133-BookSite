<?php
session_start();
include_once ("database.php");
include_once ("AddComment.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Ajouter un commentaire</title>
</head>
<body>
<?php
/**
 * ETML
 * Auteur : silvestrge
 * Date : 02.03.2018
 * Description : Page pour ajouter un commentaire à un livre
 */ ?>

    <form method="post" name="comment">
        <?php
        //vérifie que l'utilisateur ne vient pas via l'url
            if(isset($_GET['booName'])) {
                echo "<h1>Ajouter un commentaire sur le livre :" . $_GET['booName'] . "</h1>";
                ?>
                <label for="comment">Commentaire :</label><textarea name="comment"></textarea><br>
                <label for="grade">Note</label>
                <select name="grade">
                    <option>5.0</option>
                    <option>4.5</option>
                    <option>4.0</option>
                    <option>3.5</option>
                    <option>3.0</option>
                    <option>2.5</option>
                    <option>2.0</option>
                    <option>1.5</option>
                    <option>1.0</option>
                </select>
                <input type="submit" name="submit" value="Ajouter">
                <?php
            }else{
                echo "<script language='JavaScript'>alert('Veuillez sélectionner un livre')</script>";
                echo "<a href=\"Accueil.php\">Retour à la page d'accueil</a>";
            }
        ?>
    </form>

<?php
    if(isset($_POST['submit'])){
        $data=new database();
        $comment=new AddComment();

        if($comment->checkFields()){
            if($data->addComment()) {
                echo "<script language\"JavaScript\">alert('Le commentaire a été ajouté')</script>";
            }
        }
        else{
            echo "<script language\"JavaScript\">alert('Veuillez remplir tout les champs')</script>";
        }
    }
?>
</body>
</html> 