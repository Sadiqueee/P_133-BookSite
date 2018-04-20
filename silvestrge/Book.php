<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Titre</title>
</head>
<body>
<?php
/**
 * ETML
 * Auteur : silvestrge
 * Date : 16.03.2018
 * Description :
 */ ?>
<form method="post" enctype="multipart/form-data">
    <label for="title">Titre*</label><input id="title" name="title" type="text"><br>
    <label for="category">Catégorie*</label>
    <select  id="category" name="category" type="text">
        <option>Fantasy</option>
        <option>Romance</option>
        <option>Science-fiction</option>
        <option>Polar</option>
        <option>Historique</option>
    </select><br>
    <label for="autor">Auteur*</label><input id="autor"  name="author" type="text"><br>
    <label for="editor">Editeur*</label><input id="editor"  name="editor" type="text"><br>
    <label for="dateEditing">Année d'édition*</label><input id="dateEditing"  name="dateEditing" type="date"><br>
    <label for="part">Extrait*</label><input id="part" name="part" type="text"><br>
    <label for="numberPage">Nombres de pages*</label><input id="numberPage" name="numberPage" type="number"><br>
    <label for="summary">Résumé*</label><textarea name="summary" id="summary" cols="35" rows="5"></textarea><br>
    <label id="covertLabel" for="covert">Image de couverture*</label><input id="file" name="file" type="file"><br>
    <input name="submit" type="submit">
</form>

<?php
include "New_book.php";
if(isset($_POST['submit'])) {
    $book = new New_book();
    $book->test();

}
?>
</body>
</html> 