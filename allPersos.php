<?php 
include('init.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/personnages.css" rel="stylesheet" />
    <title>Mini-jeu</title>
</head>
<body>
    <?php 
    if(isset($_GET['suppr'])){
        echo'Le personnage a bien été supprimé.';
    };
    if(isset($_GET['modif'])){
        echo'Le personnage a bien été modifié.';
    };

    $personnages= $monManager-> getAllPersonnages();
    ?>
    <table>
        <caption>Les personnages du jeu</caption>
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Points d'attaque</th>
                <th scope="col">Points de pouvoir</th>
                <th scope="col">Image</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>

    
    <?php

    if (empty($personnages)) {
        
        echo "Aucun personnage trouvé.";

    }else{


        foreach ($personnages as $personnage): ?>
            <tr>
                <td scope="col"><?php echo $personnage->getNom(); ?></td>
                <td scope="col"><?php echo $personnage->getAtk(); ?></td>
                <td scope="col"><?php echo $personnage->getPv(); ?></td>
                <td scope="col"><div style="background-image: url(./styles/img/<?php echo $personnage->getId_perso(); ?>.png); width: 150px; height: 150px; background-size: cover;"></div></td>
                <td scope="col">
                    <form action="modifier.php?id=<?php echo $personnage->getId_perso(); ?>" method="POST">
                        <p>
                            <label for="atk">Attaque :</label>
                            <input id="atk" type="number" value="<?php echo $personnage->getAtk(); ?>" name="atk">  
                        </p>
                        <p>
                            <label for="pv">Pouvoir :</label>
                            <input id="pv" type="number" value="<?php echo $personnage->getPv(); ?>" name="pv">
                            

                        </p>
                        <input type="hidden" value="<?php echo $personnage->getNom(); ?>" name="nom">
                        <input type="hidden" value="<?php echo $personnage->getImg(); ?>" name="img">
                        <p>
                            <input type="submit" value="Enregistrer">
                        </p>
                        
                    </form>
                </td>
                <td scope="col"><a href="suppression.php?id=<?php echo $personnage->getId_perso(); ?>"><div class="suppr"></div></a></td>
            </tr>
        <?php endforeach; 
        }?>



    
    </table>

    
</body>
</html>


    



<?php
// $monPerso= new Personnage('Gandalf', 100, 20);
// var_dump($monPerso);

// $monPerso2= new Personnage('Sabine', 80,50);

// $monGuerisseur= new Guerisseur('Riri', 100,10);

// $monPerso->attaquer($monPerso2);

// var_dump($monPerso2);

// if($monPerso->is_alive()){
//     echo"Le personnage est vivant !";
// }else{
//     echo"Le personnage est mort.";
// }

// echo "<p>Vous avez créé ".Personnage::getCompteur()." personnages.</p>";

// echo $monPerso->crier();

// echo "<p>Les pouvoirs de ".$monPerso->getNom()." sont à  ".$monPerso->getPv().".</p>";
// echo "<p>Les pouvoirs de ".$monPerso2->getNom()." sont à  ".$monPerso2->getPv().".</p>";








// $maVoiture->accelerer(0);
// var_dump($maVoiture);




?>