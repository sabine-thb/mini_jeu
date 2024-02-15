<?php 
include('init.php');

session_start();
        $perso1=$monManager->GetOnePersonnageById($_POST['perso1']);
        $perso2=$monManager->GetOnePersonnageById($_POST['perso2']);

        $_SESSION['perso1'] = $perso1;
        $_SESSION['perso2'] = $perso2;


        $_SESSION['perso1']->reinitPV($perso1);
        $_SESSION['perso2']->reinitPV($perso2);



        header("Location: combatEnCours.php?atk=ok");
?>