<?php 
include('init.php');
session_start();

        $_SESSION['perso1']->attaquer($_SESSION['perso2']);
        $_SESSION['perso2']->attaquer($_SESSION['perso1']);

        
        header("Location: combatEnCours.php?atk=ok");
?>