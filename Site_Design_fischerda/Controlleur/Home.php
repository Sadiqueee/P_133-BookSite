<?php
/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 02.03.2018
 * Time: 08:46
 */


include ("Modele/basicSkeleton.php");
include ("Vue/View.php");


$model = new basicSkeleton();
$view = new View();

$head = $model->Head();
$nav = $model->HeaderNav();
$footer = $model->Footer();
$content = $model->ContentHome();

echo'<?php echo "salut"; ?>'
//$view->output($head.$nav.$content.$footer);

?>