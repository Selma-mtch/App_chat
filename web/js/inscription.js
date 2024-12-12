document.addEventListener("DOMContentLoaded", function () {
    const validateLink = document.getElementById("validate-link");
    const form = document.getElementById("formulaire");

    // Expressions régulières pour valider les champs
    const regexPrénom = /^[a-zA-ZÀ-ÿ]{2,}$/;
    const regexNom = /^[a-zA-ZÀ-ÿ]{2,}$/;
    const regexPseudo = /^[a-zA-Z0-9]{3,}$/;
    const regexEmail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const regexPassword = /.{6,}/;

    // Fonction pour vérifier un champ
    function validateField(input, regex) {
        
        //return regex.test(input.value);
    }

    // Fonction pour valider le select
    function validateSelect(input) {
        //return input.value !== "";
    }

    // Fonction pour valider la case à cocher
    function validateCheckbox(checkbox) {
        //return checkbox.checked;
    }

    // Fonction globale pour valider tout le formulaire
    function validateForm() {
        const isPrenomValid = validateField(document.getElementById("prenom"), regexPrénom);
        const isNomValid = validateField(document.getElementById("nom"), regexNom);
        const isPseudoValid = validateField(document.getElementById("pseudo"), regexPseudo);
        const isEmailValid = validateField(document.getElementById("email"), regexEmail);
        const isPasswordValid = validateField(document.getElementById("password"), regexPassword);
        const isGenreValid = validateSelect(document.getElementById("genre"));
        const isPolitiqueChecked = validateCheckbox(document.getElementById("politique"));

        // Retourne si tout est valide
        return isPrenomValid && isNomValid && isPseudoValid && isEmailValid && isPasswordValid && isGenreValid && isPolitiqueChecked;
    }

    // Met à jour l'état du lien de validation
    function updateValidateLinkState() {
        if (validateForm()) {
            validateLink.classList.remove("disabled");
            validateLink.classList.add("enabled");
            validateLink.setAttribute("aria-disabled", "false");
        } else {
            validateLink.classList.remove("enabled");
            validateLink.classList.add("disabled");
            validateLink.setAttribute("aria-disabled", "true");
        }
    }

    // Interception du clic sur le lien
    validateLink.addEventListener("click", function (event) {
        if (validateLink.getAttribute("aria-disabled") === "true") {
            event.preventDefault(); // Empêche la redirection
            alert("Veuillez remplir tous les champs pour valider le formulaire.");
        }
    });

    // Écoute des événements
    form.addEventListener("input", updateValidateLinkState);
    form.addEventListener("change", updateValidateLinkState);

    // Initialisation
    updateValidateLinkState();
});
