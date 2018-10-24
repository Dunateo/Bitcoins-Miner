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

window.addEventListener("load", function () {




    //register
    window.document.querySelector("#register-form").addEventListener("click", function () {




    }, false);


}, false);



function Testsubmit(f) {
    var rguser = Testuser(f.reg_username);
    var rgmail = Testmail(f.reg_email);
    var rgpass = Testpass(f.reg_password, f.reg_password_confirm);
    var rgcheck = Testcheck(f.reg_agree);

    if (rguser === true && rgmail === true && rgpass === true && rgcheck === true  ) {

        return true; // OK envoyer
    } else {

        alert("Ooops enter all the fields please!");
        return false;
    }

}

function Testuser(user) {

    if (user.value.length < 2 || user.value.length > 25)
    {
        surligne(user, true);
        return false;
    } else
    {
        surligne(user, false);
        return true;
    }


}
function Testmail(email) {
    var regle =  /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    if (!regle.test(email.value)  )
    {
        alert("Please enter an email like name@name.com");
        surligne(email, true);
        return false;
    }
   else{
       
        surligne(email, false);
        return true;
    }
}

function Testpass(pass, pass2) {

    if (pass.value !== pass2.value && pass.value.length < 8) {

        alert("Please enter a password with 8 letters");
        surligne(pass, true);
        surligne(pass2, true);
        return false;

    } else {
        surligne(pass, false);
        surligne(pass2, false);
        return true;
    }

}

function Testcheck(check){
    if (check.checked === false) {

        alert("You have to accept the general conditions");
        surligne(check, true);
        
        return false;

    } else {
        surligne(check, false);
        return true;
    }
}
function surligne(champ, erreur)
{
    if (erreur)
        champ.style.backgroundColor = "#fba";
    else
        champ.style.backgroundColor = "";
}