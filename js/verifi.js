/* 
<<<<<<< HEAD
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
=======
 * Valentin Bru
 * 
>>>>>>> 97b49c556d3010ed4e69de98c1d71ea1be32dc25
 */

window.addEventListener("load", function() {
    window.document.querySelector("#login-form").addEventListener("type", function() {
        if (window.document.querySelector("#lg_username").value === "" && window.document.querySelector("#lg_username").length >2 && window.document.querySelector("#lg_username").length < 25) {
            alert("You have to enter the username"); // On affiche un message
        }
        else if (window.document.querySelector("#reg_email").value === "" && window.document.querySelector("#reg_email").length >4 && Testmail(window.document.querySelector("#reg_email")=== false)) {
            alert("Please enter a real email"); // On affiche un message
        }
        
        else if(window.document.querySelector("#reg_username").value === "" && window.document.querySelector("#reg_username").length >2 && window.document.querySelector("#reg_username").length <25 ){
            alert("You have to enter the username"); // On affiche un message
        }
        
        else{
             var question = "Souhaitez-vous réellement utiliser l'adresse suivante : " + window.document.querySelector("#i_email").value;
             if (confirm(question)) {
                 window.document.querySelector("#form_contact").submit(); // OK envoyer
             }
        }
    }, false);
}, false);



function Testmail(email){
    var regle = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
 
    if(regle.test(email))
      {
		return(true);
      }
    else
      {
		return(false);
      }
}