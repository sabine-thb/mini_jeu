<?php 

function chargerClasse($classe){
    require ''.$classe . '.php';
}

spl_autoload_register('chargerClasse');

$db= new PDO('mysql:host=localhost;dbname=mini_jeu', 'root','');

$monManager = new PersonnageManager($db);

?>