<?php 
include('init.php');

// Définir les données du nouveau personnage

if ($_POST["pv"] > 100 || $_POST["atk"] > 100) {
    header('Location: allPersos.php?err=atkPv');
}else{
    $data_nouveau_personnage = array(
        'id_perso' => $_GET["id"],
        'nom' => $_POST["nom"],
        'pv' => $_POST["pv"],
        'atk' => $_POST["atk"],
        'img' => $_POST["img"]
    );

    // Instancier un nouveau personnage en utilisant l'hydratation
    $newPersonnage = new Personnage($data_nouveau_personnage);

    $monManager->modifyPersonnage($newPersonnage);



    header('Location: allPersos.php?modif=ok');
}



?>