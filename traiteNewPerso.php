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

// // Vérifier si une image a été uploadée
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $file = $_FILES['file'];  

//     // Vérifier s'il n'y a pas d'erreur lors de l'upload
//     if($file['error'] === UPLOAD_ERR_OK) {

        
//         // Données du nouveau personnage à partir du formulaire
//         $data_nouveau_personnage = array(
//             'nom' => $_POST["nom"],
//             'pv' => $_POST["pv"],
//             'atk' => $_POST["atk"]
//         );

//         // Création d'une instance de Personnage avec les données du formulaire
//         $newPersonnage = new Personnage($data_nouveau_personnage);

//         // Ajout du personnage à la base de données
//         $insert_perso = $monManager->addPersonnage($newPersonnage);

//         // Vérification si l'insertion du personnage a réussi
//         if ($insert_perso !== false) {
//             // Chemin de destination pour l'image avec l'ID du personnage
//             $id_personnage = $monManager->getLastIdPerso();

//             $new_filename = $id_personnage . ".png";
//             $destination = "./styles/img/$new_filename";

//             // Conversion de l'image au format PNG
//             if (imageConvertToPNG($file['tmp_name'], $destination)) {

//                 header('Location: newPerso.php?newPerso=ok');
//             } else {
//                 header('Location: newPerso.php?newPerso=err');
//             }
//         } else {
//             header('Location: newPerso.php?newPerso=err');
//         }
//     } else {
//         header('Location: newPerso.php?newPerso=err');
//     }
// }else{
//     header('Location: newPerso.php?newPerso=err');
// }

// Taille maximale autorisée en octets (500 ko)
$maxFileSize = 500 * 1024;

// Vérifier si une image a été uploadée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['file'];

    // Vérifier s'il n'y a pas d'erreur lors de l'upload et que la taille est inférieure à la limite
    if ($file['error'] === UPLOAD_ERR_OK && $file['size'] <= $maxFileSize) {
        // Données du nouveau personnage à partir du formulaire

        if ($_POST["pv"] > 100 || $_POST["atk"] > 100) {
            header('Location: newPerso.php?err=atkPv');
        } else {
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
                    header('Location: newPerso.php?newPerso=ok');
                } else {
                    header('Location: newPerso.php?newPerso=err');
                }
            } else {
                header('Location: newPerso.php?newPerso=err');
            }
        }
    } else {
        header('Location: newPerso.php?newPerso=err_size');
    }
} else {
    header('Location: newPerso.php?newPerso=err');
}



?>










