var message="";


function validation() {
 testChampVide();
 validerAdresse();
 validerPseudo();
 message="";
}//fin function


function testChampVide() {
 if ((document.getElementById("mail").value ==='') ||
 (document.getElementById("pseudo").value ==='')) {
 alert("Un champ est vide");
 }
}//fin function


function validerAdresse() {
 if (document.getElementById("mail").value === ''){
 var messageName1 = "<br/>Le champ adresse mail est vide est vide.";
 message += messageName1;
 document.getElementById("errordiv").innerHTML = message;
 }//end if
}//fin function


function validerPseudo() {
 if (document.getElementById("pseudo").value === ''){
 var messageAge2 = "<br/>Le champ pseudo est vide.";
 message += messageAge2;
 document.getElementById("errordiv").innerHTML = message;
 }//fin if
}//fin function

