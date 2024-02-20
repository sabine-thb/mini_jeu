document.addEventListener("DOMContentLoaded", function() {

        // On met en place l'ouverture des popups
    var lienPopup = document.querySelectorAll(".btnModif");

    lienPopup.forEach(function (element) {
        element.addEventListener('click', function() {
            var popupId = element.dataset.popup; // On obtient l'ID du popup à partir de l'attribut de données
            var popup = document.getElementById(popupId); // On sélectionne le popup correspondant
            popup.classList.add('popup-visible');
            popup.classList.remove('popup-invisible');
        });
    });  

    //On met en place la fermeture des popups
    var cancel =document.querySelectorAll(".cancel");

    cancel.forEach(function (element) {
        element.addEventListener('click', function() {
            var popupElement = element.closest('.popup');
            // Ciblez l'élément avec l'ID correspondant
            var popupId = popupElement.id;
            var popup = document.getElementById(popupId); // On sélectionne le popup correspondant
            popup.classList.add('popup-invisible');
            popup.classList.remove('popup-visible');
        });
    });   

});
