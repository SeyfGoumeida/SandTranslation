form1 = function() {

    document.getElementsByClassName('box')[0].style.display = 'block'

}
form2 = function() {
    document.getElementsByClassName('box')[1].style.display = 'block'

}


function Readmore2() {
    var dots = document.getElementById("dots2");
    var moreText = document.getElementById("more2");
    var btnText = document.getElementById("myBtn2");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

function Readmore1() {
    var dots = document.getElementById("dots1");
    var moreText = document.getElementById("more1");
    var btnText = document.getElementById("myBtn1");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

function Readmore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
//-----------------Assermente (justificatif)---------------------
function Assermente() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var justif = document.getElementById("Justif");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        justif.style.display = "block";
    } else {
        justif.style.display = "none";
    }
}
/*-------------popup box DossierOnTraitement()--------------*/
function DossierOnTraitement() {
    alert("Votre demande de recrutement est en traitement , vous avez un compte client jusqu'a ce que votre demande sera validé , merci !");
}
/*-----------------captcha-------------------*/
// Captcha Script
/*-----------------traducteur-------------------*/

function gettraducteur() {
    document.getElementById("text").innerHTML =
        document.getElementById("mySelect").selectedIndex;
}

function getclient() {
    document.getElementById("textclient").innerHTML =
        document.getElementById("mySelectclient").selectedIndex;
}