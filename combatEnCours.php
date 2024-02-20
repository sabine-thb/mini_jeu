<link href="styles/formCombat.css" rel="stylesheet" />
<?php 
include('init.php');
session_start();


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

<div class="combat">
    <div class="perso1">
        <div class="img1" style='background-image:url(./styles/img/<?php echo $_SESSION['perso1']->getId_perso() ?>.png)' ></div>
        <div class="pv1" >Points de pouvoir : <?php echo $_SESSION['perso1']->getPv() ?></div>
        <div class="atk1">Points d'attaque : <?php echo $_SESSION['perso1']->getAtk() ?></div>
    </div>
    <div class="perso2">
        <div class="img2" style='background-image:url(./styles/img/<?php echo $_SESSION['perso2']->getId_perso() ?>.png)' ></div>
        <div class="pv1" >Points de pouvoir : <?php echo $_SESSION['perso2']->getPv() ?></div>
        <div class="atk1">Points d'attaque : <?php echo $_SESSION['perso2']->getAtk() ?></div>
    </div>
</div>


<?php 
if (!$_SESSION['perso1']->getPv() && !$_SESSION['perso2']->getPv()) {
    echo "Egalité ! ". $_SESSION['perso1']->getNom() . " et " . $_SESSION['perso2']->getNom() . " sont morts.";
} elseif (!$_SESSION['perso1']->getPv()) {
    echo $_SESSION['perso1']->getNom() . " est mort.";
} elseif (!$_SESSION['perso2']->getPv()) {
    echo $_SESSION['perso2']->getNom() . " est mort.";
}
?>


<div class="actions">
    <form action="traiteCombat.php" method="POST">
        <input type="hidden" name="perso1" value="<?php echo $_SESSION['perso1']->getId_perso() ?>">
        <input type="hidden" name="perso2" value="<?php echo $_SESSION['perso2']->getId_perso() ?>">
        <input type="submit" value="Combattre">
    </form>
    <form action="traiteRegenere.php" method="POST">
        <input type="hidden" name="perso1" value="<?php echo $_SESSION['perso1']->getId_perso() ?>">
        <input type="hidden" name="perso2" value="<?php echo $_SESSION['perso2']->getId_perso() ?>">
        <input type="submit" value="Régénerer">
    </form>
</div>