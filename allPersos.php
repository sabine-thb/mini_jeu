<?php 
include('init.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/fonts.css" rel="stylesheet" />
    <link href="styles/personnages.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="./styles/img/favicon.ico"/>
    <title>Mini-jeu</title>
</head>
<body>

    <div class="bodyChild">
        <a href="index.php" class="link white">Retour</a>
        <?php 
        if(isset($_GET['suppr'])){
            echo'<p>Le personnage a bien été supprimé.</p>';
        };
        if(isset($_GET['modif'])){
            echo'<p>Le personnage a bien été modifié.</p>';
        };

        $personnages= $monManager-> getAllPersonnages();
        ?>
        <h1 class="mario multicolor title">personnages disponibles :</h1>

        <?php 
        if (isset($_GET['err']) && $_GET['err'] === 'atkPv') {
        echo "<p class='msg'>Vous devez saisir des points d'attaque et de pouvoir inférieurs à 100.</p>";
        }
        ?>
    

        <div class="gridParent">
            <div class="allCards">

            
            <?php

            if (empty($personnages)) {
                
                echo "<p>Aucun personnage trouvé.</p>";

            }else{



            foreach ($personnages as $personnage): ?>

                <div class="card">
                    <div class="circle"></div>
                    <div class="actions">
                        <button class="link btnModif" data-popup="<?php echo $personnage->getId_perso(); ?>">Modifier</button>
                        <a href="suppression.php?id=<?php echo $personnage->getId_perso(); ?>" class="link"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer le personnage <?php echo $personnage->getNom(); ?> ?\n' +
                                'Cette action est définitive !');">Supprimer</a>
                    </div>
                    <div class="imgContainer">
                        <img src="./styles/img/<?php echo $personnage->getId_perso(); ?>.png" class="imgPerso" alt="">
                    </div>
                    
                    <h2 class="nom"><?php echo $personnage->getNom(); ?></h2>
                    <div class="allPoints">
                        <div class="atk">
                            <h2 class="titlePoints">Attaque</h2>
                            <h2 class="points"><?php echo $personnage->getAtk(); ?></h2>
                        </div>
                        <div class="pv">
                            <h2  class="titlePoints">Pouvoir</h2>
                            <h2 class="points"><?php echo $personnage->getPv(); ?></h2>
                        </div>

                    </div>

                </div>

                <div class="popup popup-invisible" id=<?php echo $personnage->getId_perso(); ?>>
                    <div class="popup-background">
                        <div class="popup-content">
                            <div class="cancel">X</div>
                            <form action="modifier.php?id=<?php echo $personnage->getId_perso(); ?>" method="POST" class="forModif">
                                <p class="pForm">
                                    <label for="atk">Nouveaux points d'attaque :</label>
                                    <input id="atk" type="number" value="<?php echo $personnage->getAtk(); ?>" name="atk">  
                                </p>
                                <p class="pForm">
                                    <label for="pv">Nouveaux points de pouvoir :</label>
                                    <input id="pv" type="number" value="<?php echo $personnage->getPv(); ?>" name="pv">
                                    
                                </p>
                                <p class="pForm">
                                    <input type="hidden" value="<?php echo $personnage->getNom(); ?>" name="nom">
                                    <input type="hidden" value="<?php echo $personnage->getImg(); ?>" name="img">

                                </p>
                                    
                                
                                <input type="submit"  class="submit" value="Enregistrer">
                
                                    
                            </form>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; 
            }?>




            </div>

        </div>
        
        
    </div>
    
    
    

    <script src="./js/script.js" ></script>
    <script src="./js/popup.js" ></script>
</body>
</html>


    












