/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.addEventListener("load", function () {
    
//login
    window.document.querySelector("#login-form").addEventListener("click", function() {

    
    
        
    }, false);
}, false);  



function Testsubmit(f){
    var lguser = Testuser(f.lg_username);
    
    if (  lguser === true ) {
        
        return true; // OK envoyer
    } 
    else {
        
        alert("Ooops enter all the fields please!");
        return false;
        }
    
}

function Testuser(user) {

    if(user.value.length < 2 || user.value.length > 25)
   {
      surligne(user, true);
      return false;
   }
   else
   {
      surligne(user, false);
      return true;
   }


}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}