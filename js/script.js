

document.addEventListener("DOMContentLoaded", function() {
    var multiElements = document.querySelectorAll('.multicolor');
  
    multiElements.forEach(function(element) {
        var text = element.textContent;
        element.textContent = ''; // Efface le contenu original
        
        
        for (var i = 0; i < text.length; i++) {
            var char = text[i];
            var span = document.createElement('span');
            span.textContent = char;
            span.style.color = getColor(i); // Appliquer la couleur directement au style
            element.appendChild(span);
        }
    });
  
    function getColor(index) {
        var colors = ['#099DD6', '#FACF07', '#E52927', '#45AF4B', '#FACF07', '#E52927', '#45AF4B', '#FACF07', '#099DD6', '#45AF4B']; // Ajoutez plus de couleurs si nécessaire
        var colorIndex = index % colors.length;
        return colors[colorIndex];
    }


    
});

  
  