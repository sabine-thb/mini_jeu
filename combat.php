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
    <link href="styles/formCombat.css" rel="stylesheet" />
</head>
<body>
    <form action="combatEnCours.php" class="formCombat" method="POST">  
        <div class="flexForm">
            <p>
                <label for="perso1">Personnage 1 :</label>
                <select  name="perso1" id="perso1" value="">
                    <?php foreach ($personnages as $personnage): ?>
                    <option value="<?php echo $personnage->getId_perso(); ?>" ><?php echo $personnage->getNom(); ?></option>
                    <?php endforeach;?>
                </select>
            </p>
            <div>VS</div>
            <p>
                <label for="perso2">Personnage 2 :</label>
                <select name="perso2" id="perso2" value="">
                    <?php foreach ($personnages as $personnage): ?>
                    <option value="<?php echo $personnage->getId_perso(); ?>" ><?php echo $personnage->getNom(); ?></option>
                    <?php endforeach;?>
                </select>
            </p>
        </div>
        
        <p class="pSubmit">
            <input type="submit" value="Faire un combat" >
        </p>   
    </form>

    <div class="combat">
        <div class="perso1">
            <div class="img1"></div>
        </div>
        <div class="perso2">
            <div class="img2"></div>
        </div>
    </div>



    <!-- <?php if(isset($_GET['combat'])){

        session_start();

        var_dump($_POST);

        $perso1=$monManager->GetOnePersonnageById($_POST['perso1']);
        $perso2=$monManager->GetOnePersonnageById($_POST['perso2']);

        $_SESSION['perso1'] = $perso1;
        $_SESSION['perso2'] = $perso2;


    }; ?> -->



    <script src="js/combat.js"></script>
</body>
</html>