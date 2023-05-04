var prenomValid = /^[A-Z a-z]{2,20}$/;
var emailValid = /^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]­{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$/;
var mdpValid = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

var titreValid = /^[A-Z a-z0-9]{1,75}$/;
var commentaireValid = /^[A-Z a-z0-9]{1,2000}$/;

function validationInscription()
{
    var prenom = document.getElementById("prenom").value;
    var nom = document.getElementById("nom").value;
    var email = document.getElementById("email").value;
    var mdp = document.getElementById("mdp").value;
    var mdpconfirm = document.getElementById("mdpconfirm").value;
    var bouton18 = document.getElementById("bouton18");

    var res = true;

    if (prenom.match(prenomValid) == null)
    {
        document.getElementById("prenom").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("prenom").classList.remove("border_rouge");
    }

    if (nom.match(prenomValid) == null)
    {
        document.getElementById("nom").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("nom").classList.remove("border_rouge");
    }

    if (email.match(emailValid) == null)
    {
        document.getElementById("email").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("email").classList.remove("border_rouge");
    }

    if (mdp.match(mdpValid) == null)
    {
        document.getElementById("mdp").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("mdp").classList.remove("border_rouge");
    }

    if (mdpconfirm != mdp)
    {
        document.getElementById("mdpconfirm").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("mdpconfirm").classList.remove("border_rouge");
    }

    if (bouton18.checked == false)
    {
        document.getElementById("label18").classList.add('text_rouge');
        res = false;
    }
    else
    {
        document.getElementById("label18").classList.remove("text_rouge");
    }

    if (res == false)
    {
        alert("Veuillez entrez les bon éléments dans les cases affichée en rouge" + bouton18.checked);
    }

    return res;
}

function validationConnection()
{
    var email = document.getElementById("email").value;
    var mdp = document.getElementById("mdp").value;

    var res = true;

    if (email.match(emailValid) == null)
    {
        document.getElementById("email").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("email").classList.remove("border_rouge");
    }

    if (mdp.match(mdpValid) == null)
    {
        document.getElementById("mdp").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("mdp").classList.remove("border_rouge");
    }

    if (res == false)
    {
        alert("Veuillez entrez les bon éléments dans les cases affichée en rouge" + bouton18.checked);
    }

    return res;
}

function validationCommentaire()
{
    var titre = document.getElementById("titre").value;
    var commentaire = document.getElementById("commentaire").value;

    var res = true;

    if (titre.match(titreValid) == null)
    {
        document.getElementById("titre").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("titre").classList.remove("border_rouge");
    }

    if (commentaire.match(commentaireValid) == null)
    {
        document.getElementById("commentaire").classList.add('border_rouge');
        res = false;
    }
    else
    {
        document.getElementById("commentaire").classList.remove("border_rouge");
    }

    return res;
}