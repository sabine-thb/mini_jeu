document.addEventListener("DOMContentLoaded", function() {

    //fonction pour l'affichage de la div de commentaire sur le combat->si la div est vide, alors ne pas l'afficher

    var maDiv = document.querySelector(".commentaire");

    // Vérifiez si le contenu de la div est vide
    if (maDiv.innerHTML.trim() === "") {
        // Si la div est vide, masquez-la en définissant son style sur "none"
        maDiv.style.display = "none";
    } else {
        // Sinon, assurez-vous qu'elle est visible en définissant son style sur "block" ou "inline", selon le cas
        maDiv.style.display = "block"; // ou "inline" ou toute autre valeur de style appropriée
    }
});