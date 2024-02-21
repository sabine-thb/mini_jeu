<?php 
include('init.php');
$personnages= $monManager-> getAllPersonnages();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-jeu</title>
    <link href="styles/fonts.css" rel="stylesheet" />
    <link href="styles/formCombat.css" rel="stylesheet" />
</head>
<body>
    <a href="index.php" class="retour">Retour</a>
    <h1 class="mario multicolor title">Combat !</h1>
    <form action="combatEnCours.php" class="formCombat" method="POST">  

        <div class="combat">
            <div class="perso1">
                <p>
                    <label for="perso1">Personnage 1 :</label>
                    <select  name="perso1" id="perso1" value="">
                        <?php foreach ($personnages as $personnage): ?>
                        <option value="<?php echo $personnage->getId_perso(); ?>" ><?php echo $personnage->getNom(); ?></option>
                        <?php endforeach;?>
                    </select>

                </p>
                
                <div class="card1">
                    <div class="circle"></div>
                    <img src="" class="img1" alt="">
                </div>
            </div>
            <div class="mario versus">VS</div>
            <div class="perso2">
                <p>
                    <label for="perso2">Personnage 2 :</label>
                    <select name="perso2" id="perso2" value="">
                        <?php foreach ($personnages as $personnage): ?>
                        <option value="<?php echo $personnage->getId_perso(); ?>" ><?php echo $personnage->getNom(); ?></option>
                        <?php endforeach;?>
                    </select>
                </p>
            
             
                <div class="card2">
                    <div class="circle"></div>
                    <img src="" class="img2" alt="">
                </div>

            </div>
            
        </div>
        
        
        <p class="pSubmit">
            <input type="submit" class="submit" value="Commencer" >
        </p>   
    </form>

    



    <!-- <?php if(isset($_GET['combat'])){

        session_start();

        var_dump($_POST);

        $perso1=$monManager->GetOnePersonnageById($_POST['perso1']);
        $perso2=$monManager->GetOnePersonnageById($_POST['perso2']);

        $_SESSION['perso1'] = $perso1;
        $_SESSION['perso2'] = $perso2;


    }; ?> -->



    <script src="js/combatChoice.js"></script>
    <script src="js/script.js"></script>
</body>
</html>