//Passagem do "hover" dos radio buttons do slide
var contador = 1;
setInterval(function() {
    document.getElementById('radio' + contador).checked = true;
    contador++;
    if (contador > 3) {
        contador = 1;
    }
}, 5000);