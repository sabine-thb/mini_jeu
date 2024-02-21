<?php 
include('init.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/fonts.css" rel="stylesheet" />
    <link href="styles/combatEnCours.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="./styles/img/favicon.ico"/>
    <title>Mini-jeu</title>
</head>
<body>
    
    <?php 

        if(isset($_POST['perso1']) && isset($_POST['perso2'])) {
                // Récupération des identifiants des personnages
                $perso1_id = $_POST['perso1'];
                $perso2_id = $_POST['perso2'];
                
                // Récupération des personnages depuis la base de données
                $perso1 = $monManager->GetOnePersonnageById($perso1_id);
                $perso2 = $monManager->GetOnePersonnageById($perso2_id);
            
                // Stockage des informations des personnages dans la session
                $_SESSION['perso1'] = $perso1;
                $_SESSION['perso2'] = $perso2;
        }
    ?>
    <a href="index.php" class="retour">Retour</a>
    <h1 class="mario multicolor title">Combat !</h1>
    <div class="combat">
        <!-- <div class="perso1">
            <div class="img1" style='background-image:url(./styles/img/<?php echo $_SESSION['perso1']->getId_perso() ?>.png)' ></div>
            <div class="pv1" >Points de pouvoir : <?php echo $_SESSION['perso1']->getPv() ?></div>
            <div class="atk1">Points d'attaque : <?php echo $_SESSION['perso1']->getAtk() ?></div>
        </div>
        <div class="perso2">
            <div class="img2" style='background-image:url(./styles/img/<?php echo $_SESSION['perso2']->getId_perso(); ?>.png)' ></div>
            <div class="pv1" >Points de pouvoir : <?php echo $_SESSION['perso2']->getPv() ?></div>
            <div class="atk1">Points d'attaque : <?php echo $_SESSION['perso2']->getAtk() ?></div>
        </div> -->

    
        <div class="card perso1">
            <div class="circle"></div>
            <div class="imgContainer">
                <img src="./styles/img/<?php echo $_SESSION['perso1']->getId_perso(); ?>.png" class="imgPerso" alt="">
            </div>
                        
            <h2 class="nom"><?php echo$_SESSION['perso1']->getNom(); ?></h2>
            <div class="allPoints">
                <div class="atk">
                        <h2 class="titlePoints">Attaque</h2>
                        <h2 class="points"><?php echo $_SESSION['perso1']->getAtk(); ?></h2>
                    </div>
                <div class="pv">
                <h2  class="titlePoints">Pouvoir</h2>
                        
                    <h2 class="points" id="powerPointsCharacter1"><?php echo $_SESSION['perso1']->getPv(); ?></h2>
                </div>
            </div>
        </div>
        <div class="mario versus">VS</div>
        <div class="card perso2">
            <div class="circle"></div>
            <div class="imgContainer">
                <img src="./styles/img/<?php echo $_SESSION['perso2']->getId_perso(); ?>.png" class="imgPerso" alt="">
            </div>
                        
            <h2 class="nom"><?php echo$_SESSION['perso2']->getNom(); ?></h2>
            <div class="allPoints">
                <div class="atk">
                        <h2 class="titlePoints">Attaque</h2>
                        <h2 class="points"><?php echo $_SESSION['perso2']->getAtk(); ?></h2>
                    </div>
                <div class="pv">
                <h2  class="titlePoints">Pouvoir</h2>
                        
                    <h2 class="points" id="powerPointsCharacter2"><?php echo $_SESSION['perso2']->getPv(); ?></h2>
                </div>
            </div>
        </div>

                
    </div>

    
    <div class="commentaire">
        <?php 
        if (!$_SESSION['perso1']->getPv() && !$_SESSION['perso2']->getPv()) {
            echo "Égalité ! ". $_SESSION['perso1']->getNom() . " et " . $_SESSION['perso2']->getNom() . " sont morts.";
        } elseif (!$_SESSION['perso1']->getPv()) {
            echo $_SESSION['perso1']->getNom() . " est mort.";
        } elseif (!$_SESSION['perso2']->getPv()) {
            echo $_SESSION['perso2']->getNom() . " est mort.";
        }

        if (isset($_GET['dead'])) {
            echo " Si vous souhaitez rejouer, veuillez régénérer les personnages ou faire une nouvelle partie.";
        }



        ?>
    </div>



    <div class="actions">
        <form action="traiteCombat.php" method="POST">
            <input type="hidden" name="perso1" value="<?php echo $_SESSION['perso1']->getId_perso() ?>">
            <input type="hidden" name="perso2" value="<?php echo $_SESSION['perso2']->getId_perso() ?>">
            <input type="submit" class="submit" value="Combattre">
        </form>
        <form action="traiteRegenere.php" method="POST">
            <input type="hidden" name="perso1" value="<?php echo $_SESSION['perso1']->getId_perso() ?>">
            <input type="hidden" name="perso2" value="<?php echo $_SESSION['perso2']->getId_perso() ?>">
            <input type="submit" class="submit" value="Régénerer">
        </form>
        <a href="combat.php" class="submit">Nouvelle partie</a>
    </div>

    
    

    <script src="./js/script.js"></script>
    <script src="./js/combatEnCours.js"></script>


    
</body>
</html>
