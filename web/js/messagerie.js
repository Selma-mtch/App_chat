// Établir la connexion WebSocket avec le serveur
const socket = new WebSocket('ws://localhost:8080'); // Assurez-vous que le serveur écoute sur ce port

// Fonction pour faire défiler automatiquement vers le bas
function scrollToBottom() {
    var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
    messageDisplayAreaUser.scrollTop = messageDisplayAreaUser.scrollHeight;
}

// Fonction pour envoyer un message via WebSocket
function envoyerMessage() {
    var messageInput = document.getElementById('messageInput');
    var messageText = messageInput.value.trim();

    if (messageText !== "") {
        // Envoi du message au serveur via WebSocket
        socket.send(messageText);

        var newMessage = document.createElement('div');
        newMessage.classList.add('message', 'sent');

        var messageContent = document.createElement('p');
        messageContent.textContent = messageText;
        newMessage.appendChild(messageContent);

        var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
        messageDisplayAreaUser.appendChild(newMessage);

        // Fait défiler vers le bas de manière fluide
        scrollToBottom();

        messageInput.value = '';
    }
}

// Ajouter un événement pour détecter l'appui sur Entrée
document.getElementById('messageInput').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        envoyerMessage();
    }
});

// Gestion des messages reçus via WebSocket
socket.onmessage = function (event) {
    var messageData = event.data;

    // Vérifier si le message est un Blob
    if (messageData instanceof Blob) {
        // Lire le Blob comme du texte
        var reader = new FileReader();
        reader.onload = function () {
            var messageText = reader.result;
            afficherMessage(messageText, 'received');
        };
        reader.readAsText(messageData);
    } else {
        // Si ce n'est pas un Blob, c'est une chaîne
        afficherMessage(messageData, 'received');
    }
};

// Fonction pour afficher un message dans la zone de discussion
function afficherMessage(messageText, type) {
    var newMessage = document.createElement('div');
    newMessage.classList.add('message', type); // type sera 'sent' ou 'received'

    var messageContent = document.createElement('p');
    messageContent.textContent = messageText;
    newMessage.appendChild(messageContent);

    var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
    messageDisplayAreaUser.appendChild(newMessage);

    // Fait défiler vers le bas de manière fluide
    scrollToBottom();
}

// Ajouter un défilement automatique au chargement de la page
window.addEventListener('load', scrollToBottom);