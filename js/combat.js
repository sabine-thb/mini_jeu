document.addEventListener("DOMContentLoaded", function() {

    // Récupérer la valeur sélectionnée initialement
    var selectedValue1 = document.getElementById('perso1').value;
    var selectedValue2 = document.getElementById('perso2').value;


    //j'affiche les deux images initiales
    document.querySelector(".img1").style.backgroundImage = "url('./styles/img/" + selectedValue1 + ".png')";

    document.querySelector(".img2").style.backgroundImage = "url('./styles/img/" + selectedValue2 + ".png')";

    // Afficher la valeur initiale dans la console
    console.log(selectedValue1);
    console.log(selectedValue2);

    // Ajouter les écouteurs d'événements pour détecter les changements
    document.getElementById('perso1').addEventListener('change', function() {
        // Récupérer la nouvelle valeur sélectionnée
        selectedValue1 = this.value;
        console.log(selectedValue1); // Afficher la nouvelle valeur dans la console
        // Mettre à jour l'image de fond de perso1
        document.querySelector(".img1").style.backgroundImage = "url('./styles/img/" + selectedValue1 + ".png')";
    });

    document.getElementById('perso2').addEventListener('change', function() {
        // Récupérer la nouvelle valeur sélectionnée
        selectedValue2 = this.value;
        console.log(selectedValue2); // Afficher la nouvelle valeur dans la console
        // Mettre à jour l'image de fond de perso2
        document.querySelector(".img2").style.backgroundImage = "url('./styles/img/" + selectedValue2 + ".png')";
    });

});

