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

    if (rguser === true && rgmail === true && rgpass === true ) {

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
    var regle = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

    if (regle.test(email))
    {
        surligne(email, false);
        return true;

    } else if (email.value === "") {
        alert("Please enter a real email");
        surligne(email, true);
        return false;
    } else
    {
       
        surligne(email, true);
        return false;
    }
}

function Testpass(pass, pass2) {

    if (pass.value !== pass2.value && pass.value === '' || pass2.value === '') {

        alert("Please enter a password");
        surligne(user, true);
        return false;

    } else {
        surligne(user, false);
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