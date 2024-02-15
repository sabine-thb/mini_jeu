<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-jeu</title>
</head>
<body>
    <?php if(isset($_GET['modif'])){
            echo'Le personnage a bien été créé.';
    }; ?>

    <form action="traiteNewPerso.php" method="POST" enctype="multipart/form-data" >
        <p>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom">
        </p>
        <p>
            <label for="atk">Points d'attaque : </label>
            <input id="atk" type="number" name="atk">
        </p>
        <p>
            <label for="pv">Points de pouvoir : </label>
            <input id="pv" type="number" name="pv">
        </p>
        <p>
            <label for="img">Image : </label>
            <input id="img" type="file" name="file">
        </p>
        <p>
            <input type="submit" value="Créer personnage">
        </p>
        
 
    </form>
    
</body>
</html>