function verifcheck(event) {
    event.preventDefault();

    const checkbox = document.getElementById('politique');

    if (!checkbox.checked) {
        alert("Vous devez accepter les conditions générales(politique de confidentialité) pour continuer");
        return false ;
    }

    window.location.href = "accueil.html";

    

return true ;
}

document.getElementById('submit').addEventListener('click', verifcheck );