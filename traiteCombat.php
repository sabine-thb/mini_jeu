<?php 
include('init.php');
session_start();
        $perso1=$monManager->GetOnePersonnageById($_POST['perso1']);
        $perso2=$monManager->GetOnePersonnageById($_POST['perso2']);

        $_SESSION['perso1'] = $perso1;
        $_SESSION['perso2'] = $perso2;


        $perso1->attaquer($perso2);
        $perso2->attaquer($perso1);


        // echo "<form id='redirectForm' action='combatEnCours.php' method='POST'>
        //         <input type='hidden' name='perso1' value='{$_POST['perso1']}'>
        //         <input type='hidden' name='perso2' value='{$_POST['perso2']}'>
        //         </form>";


        header("Location: combatEnCours.php?atk=ok");
?>