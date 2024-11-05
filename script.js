// script.js

// Connexion au serveur WebSocket
const socket = new WebSocket('ws://localhost:3000');

// Écoute des événements WebSocket
socket.onopen = () => console.log('Connexion WebSocket ouverte');
socket.onclose = () => console.log('Connexion WebSocket fermée');
socket.onerror = error => console.error('Erreur WebSocket:', error);

// Gestion de l'arrivée de messages
socket.onmessage = event => {
    const messageData = JSON.parse(event.data);
    displayMessage(messageData.user, messageData.message, messageData.emoji);
};

// Fonction pour afficher un message dans l'interface
function displayMessage(user, message, emoji) {
    const messageDisplayArea = document.getElementById('messageDisplayArea');
    const messageElement = document.createElement('p');
    messageElement.textContent = `${emoji} ${user}: ${message}`;
    messageDisplayArea.appendChild(messageElement);
    messageDisplayArea.scrollTop = messageDisplayArea.scrollHeight; // Faire défiler vers le bas
}

// Fonction pour envoyer un message
function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const emojiSelector = document.getElementById('emojiSelector');
    const message = messageInput.value;
    const emoji = emojiSelector.value;

    if (message.trim() !== '') {
        // Créer l'objet message avec l'émoji sélectionnée
        const messageData = {
            user: 'Utilisateur', // Nom de l'utilisateur à remplacer par un nom dynamique
            message: message,
            emoji: emoji
        };

        // Envoyer le message au serveur WebSocket
        socket.send(JSON.stringify(messageData));

        // Afficher le message dans l'interface
        displayMessage('Vous', message, emoji);

        // Réinitialiser le champ de message
        messageInput.value = '';
    }
}
