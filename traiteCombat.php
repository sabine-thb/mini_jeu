<?php 
include('init.php');
session_start();

if ( $_SESSION['perso1']->getPv()==0 ||  $_SESSION['perso2']->getPv()==0){
        if ($_SESSION['perso1']->getPv() == 0) {
                header("Location: combatEnCours.php?dead=perso1");
            }else{
                header("Location: combatEnCours.php?dead=perso2");
            }
}else{
        $_SESSION['perso1']->attaquer($_SESSION['perso2']);
        $_SESSION['perso2']->attaquer($_SESSION['perso1']);

        


        header("Location: combatEnCours.php?atk=ok");
}



        



        
       
?>