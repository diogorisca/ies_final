var expanded = false;

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}


function notaBG() {
    var checkBox = document.getElementById("checkBG");
    var text = document.getElementById("scoreBG");

    if (checkBox.checked == true) {
        text.style.display = "inline-block";
    } else { // if (checkBox.checked == false) {
        text.style.display = "none";
    }
}

function notaFQ() {
    var checkBox = document.getElementById("checkFQ");
    var text = document.getElementById("scoreFQ");

    if (checkBox.checked == true) {
        text.style.display = "inline-block";
    } else {
        text.style.display = "none";
    }
}

function notaMatA() {
    var checkBox = document.getElementById("checkMatA");
    var text = document.getElementById("scoreMatA");

    if (checkBox.checked == true) {
        text.style.display = "inline-block";
    } else {
        text.style.display = "none";
    }
}

function notaPT() {
    var checkBox = document.getElementById("checkPT");
    var text = document.getElementById("scorePT");

    if (checkBox.checked == true) {
        text.style.display = "inline-block";
    } else {
        text.style.display = "none";
    }
}

function notaGeometria() {
    var checkBox = document.getElementById("checkGeo");
    var text = document.getElementById("scoreGeo");

    if (checkBox.checked == true) {
        text.style.display = "inline-block";
    } else {
        text.style.display = "none";
    }
}