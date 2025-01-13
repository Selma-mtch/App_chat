// Établir la connexion WebSocket avec le serveur
const socket = new WebSocket('ws://192.168.1.208:8080');

// Variable pour suivre si une annotation est en attente
let annotationEnAttente = false;

function scrollToBottom() {
    var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
    messageDisplayAreaUser.scrollTop = messageDisplayAreaUser.scrollHeight;
}

// Fonction pour ajouter un emoji à la liste
function ajouterEmoji(emoji) {
    var emojiList = document.getElementById('emojiList');
    var emojiSpan = document.createElement('span');
    emojiSpan.textContent = emoji;
    emojiSpan.style.cursor = 'pointer';
    emojiSpan.onclick = function () {
        emojiList.removeChild(emojiSpan);
    };
    emojiList.appendChild(emojiSpan);
}

// Fonction pour envoyer un message via WebSocket
function envoyerMessage() {
    var messageInput = document.getElementById('messageInput');
    var emojiList = document.getElementById('emojiList');
    var messageText = messageInput.value.trim();
    var emojis = '';

    // Récupérer tous les emojis sélectionnés
    var emojiSpans = emojiList.getElementsByTagName('span');
    for (var i = 0; i < emojiSpans.length; i++) {
        emojis += emojiSpans[i].textContent;
    }

    // Empêcher l'envoi d'un message si une annotation est en attente
    if (annotationEnAttente) {
        alert("Veuillez le message que vous venez de recevoir pour pouvoir en envoyer un nouveau");
        return;
    }

    // Vérifier si au moins un emoji a été sélectionné et que le message n'est pas vide
    if (emojis !== "" && messageText !== "") {
        var messageData = {
            message: messageText,
            annotations: emojis,
            type: 'sent'
        };

        socket.send(JSON.stringify(messageData));

        afficherMessage(messageData, true);

        messageInput.value = '';
        emojiList.innerHTML = '';
    } else if (messageText === "") {
        alert("Veuillez écrire un message.");
    } else if (emojis === "") {
        alert("Veuillez sélectionner au moins un emoji.");
    }
}

// Gestionnaire d'événement pour la sélection d'un emoji
document.getElementById('emojiSelect').addEventListener('change', function (event) {
    var selectedEmoji = this.value;
    if (selectedEmoji) {
        ajouterEmoji(selectedEmoji);
        this.value = '';
    }
});

// Gestionnaire d'événement pour la touche "Entrée"
document.getElementById('messageInput').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        envoyerMessage();
    }
});

// Gestion des messages reçus via WebSocket
socket.onmessage = function (event) {
    var messageData = JSON.parse(event.data);

    if (messageData.type === 'sent') {
        messageData.type = 'received';
    }

    afficherMessage(messageData, false);

    // Lors de la réception d'un message, on indique qu'une annotation est en attente
    annotationEnAttente = true;
};

// Gestionnaire d'événement pour la connexion établie
socket.onopen = function (event) {
    console.log("Connexion WebSocket établie avec le serveur !");
};

// Gestionnaire d'événement pour les erreurs
socket.onerror = function (error) {
    console.error("Erreur WebSocket :", error);
};

// Fonction pour afficher un message
function afficherMessage(messageData, showAnnotations) {
    var messageContainer = document.createElement('div');
    messageContainer.classList.add('message-container', messageData.type);

    var messageElement = document.createElement('div');
    messageElement.classList.add('message', messageData.type);
    messageElement.textContent = messageData.message;
    messageContainer.appendChild(messageElement);

    if (showAnnotations && messageData.annotations) {
        var annotationContainer = document.createElement('div');
        annotationContainer.classList.add('emoji-annotation');
        for (var i = 0; i < messageData.annotations.length; i++) {
            var emojiSpan = document.createElement('span');
            emojiSpan.textContent = messageData.annotations[i];
            annotationContainer.appendChild(emojiSpan);
        }
        messageContainer.appendChild(annotationContainer);
    }

    if (messageData.type === 'received') {
        var annoterButton = document.createElement('button');
        annoterButton.classList.add('annoter-button');
        annoterButton.textContent = 'Annoter';
        annoterButton.onclick = function () {
            annoterMessageRecu(messageContainer);
        };
        messageContainer.appendChild(annoterButton);
    }

    var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
    messageDisplayAreaUser.appendChild(messageContainer);
    scrollToBottom();
}

// Fonction pour annoter un message reçu
function annoterMessageRecu(messageContainer) {
    var emojiSelect = document.createElement('select');
    emojiSelect.id = 'emojiSelectAnnotation';
    var emojis = ['😡​', '😂', '😍', '😊', '👍'];
    emojis.forEach(function (emoji) {
        var option = document.createElement('option');
        option.value = emoji;
        option.text = emoji;
        emojiSelect.appendChild(option);
    });

    var validerButton = document.createElement('button');
    validerButton.textContent = 'Valider';

    var finAnnotationButton = document.createElement('button');
    finAnnotationButton.textContent = 'Fin annotation';
    finAnnotationButton.disabled = true; // Désactiver initialement

    finAnnotationButton.onclick = function () {
        messageContainer.removeChild(finAnnotationButton);
        messageContainer.removeChild(emojiSelect);
        messageContainer.removeChild(validerButton);
        messageContainer.removeChild(messageContainer.querySelector('.annoter-button'));

        // Signaler au serveur que l'annotation est terminée
        annotationEnAttente = false; // Permet d'envoyer un nouveau message
        socket.send(JSON.stringify({ type: 'annotation-complete' }));
    };

    validerButton.onclick = function () {
        ajouterAnnotations(messageContainer, emojiSelect);

        // Activer le bouton "Fin annotation" après validation
        finAnnotationButton.disabled = false;
    };

    messageContainer.appendChild(emojiSelect);
    messageContainer.appendChild(validerButton);
    messageContainer.appendChild(finAnnotationButton);
}

// Fonction pour ajouter les annotations au message reçu
function ajouterAnnotations(messageContainer, emojiSelect) {
    var selectedEmojis = Array.from(emojiSelect.selectedOptions)
        .map(option => option.value)
        .join('');

    var annotationContainer = document.createElement('div');
    annotationContainer.classList.add('emoji-annotation');

    for (var i = 0; i < selectedEmojis.length; i++) {
        var emojiSpan = document.createElement('span');
        emojiSpan.textContent = selectedEmojis[i];
        annotationContainer.appendChild(emojiSpan);
    }

    var messageElement = messageContainer.querySelector('.message');
    messageContainer.insertBefore(annotationContainer, messageElement.nextSibling);

    var annotationData = {
        messageId: messageContainer.id,
        annotations: selectedEmojis,
        type: 'annotation'
    };
    socket.send(JSON.stringify(annotationData));
}

// Ajouter un défilement automatique au chargement de la page
window.addEventListener('load', scrollToBottom);
