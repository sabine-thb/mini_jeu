<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-jeu</title>
    <link href="./styles/fonts.css" rel="stylesheet" />  
    <link href="./styles/newPerso.css" rel="stylesheet" />   
    <link rel="shortcut icon" type="image/png" href="./styles/img/favicon.ico"/> 
</head>
<body>

    <a href="index.php" class="link">Retour</a>

    <?php if (isset($_GET['newPerso']) && $_GET['newPerso'] === 'ok') {
    echo "<p class='msg'>Le personnage a bien été créé.</p>";
    }; 
    
    if (isset($_GET['newPerso']) && $_GET['newPerso'] === 'err') {
        echo "<p class='msg'>Il y a eu une erreur lors de la création du personnage.</p>";
    }
    if (isset($_GET['newPerso']) && $_GET['newPerso'] === 'err_size') {
        echo "<p class='msg'>La taille de votre image ne doit pas dépasser 500ko. Veuillez choisir une autre image.</p>";
    }
    if (isset($_GET['err']) && $_GET['err'] === 'atkPv') {
        echo "<p class='msg'>Vous devez saisir des points d'attaque et de pouvoir inférieurs à 100.</p>";
    }
    ?>

    <h1 class="mario multicolor title">Ajouter un personnage :</h1>

    
    <div class="formContainer">
        <form action="traiteNewPerso.php" method="POST" enctype="multipart/form-data" >
            <p>
                <label for="nom">Nom :</label>
                <input id="nom" type="text" name="nom" required>
            </p>
            <p>
                <label for="atk">Points d'attaque : </label>
                <input id="atk" type="number" name="atk" required>
            </p>
            <p>
                <label for="pv">Points de pouvoir : </label>
                <input id="pv" type="number" name="pv" required>
            </p>
            <p>
                <label for="img">Image : </label>
                <input id="img" type="file" name="file" required>
            </p>
            <p>
                <input type="submit"  class="submit" value="Créer personnage">
            </p>
            
    
        </form>

    </div>
    

    <script src="./js/script.js"></script>
    
</body>
</html>