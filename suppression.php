<?php 
include('init.php');

$id_perso=$_GET["id"];

$monManager->deletePersonnage($id_perso);

header('Location: allPersos.php?suppr=ok');

?>