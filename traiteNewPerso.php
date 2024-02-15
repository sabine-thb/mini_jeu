<?php 
include('init.php');
var_dump($_POST);

$file = $_FILES["file"];

var_dump($file);

// Fonction pour convertir une image en PNG
function imageConvertToPNG($source, $destination) {
    // Ouvrir l'image source
    $image = imagecreatefromstring(file_get_contents($source));
    
    if ($image !== false) {
        // Créer une image PNG à partir de l'image source
        $success = imagepng($image, $destination);
        
        // Libérer la mémoire
        imagedestroy($image);
        
        return $success;
    }
    
    return false;
}

// Vérifier si une image a été uploadée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['file'];  

    // Vérifier s'il n'y a pas d'erreur lors de l'upload
    if($file['error'] === UPLOAD_ERR_OK) {

        
        // Données du nouveau personnage à partir du formulaire
        $data_nouveau_personnage = array(
            'nom' => $_POST["nom"],
            'pv' => $_POST["pv"],
            'atk' => $_POST["atk"]
        );

        // Création d'une instance de Personnage avec les données du formulaire
        $newPersonnage = new Personnage($data_nouveau_personnage);

        // Ajout du personnage à la base de données
        $insert_perso = $monManager->addPersonnage($newPersonnage);

        // Vérification si l'insertion du personnage a réussi
        if ($insert_perso !== false) {
            // Chemin de destination pour l'image avec l'ID du personnage
            $id_personnage = $monManager->getLastIdPerso();

            $new_filename = $id_personnage . ".png";
            $destination = "./styles/img/$new_filename";

            // Conversion de l'image au format PNG
            if (imageConvertToPNG($file['tmp_name'], $destination)) {

                echo "Personnage créé avec succès ! L'image a été uploadée et convertie.";
            } else {
                echo "Erreur lors de la conversion de l'image.";
            }
        } else {
            echo "Erreur lors de l'ajout du personnage.";
        }
    } else {
        echo "Erreur lors de l'upload de l'image.";
    }
}else{
    echo"Veuillez choisir une image.";
}

header('Location: newPerso.php?newPerso=ok');
?>







