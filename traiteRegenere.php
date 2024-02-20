<?php 
include('init.php');
session_start();

        $perso1_id = $_POST['perso1'];
        $perso2_id = $_POST['perso2'];

        // Récupération des personnages depuis la base de données
        $perso1 = $monManager->GetOnePersonnageById($perso1_id);
        $perso2 = $monManager->GetOnePersonnageById($perso2_id);

        // // Réinitialisation des personnages
        // $_SESSION['perso1']->reinitPV($perso1);
        // $_SESSION['perso2']->reinitPV($perso2);

        // $_SESSION['perso1']->reinitPV($_SESSION['perso1']);
        // $_SESSION['perso2']->reinitPV($_SESSION['perso2']);

        $_SESSION['perso1']->setPv($perso1->getPv());
        $_SESSION['perso2']->setPv($perso2->getPv());

        

        

        

header("Location: combatEnCours.php?reinit=ok");


?>