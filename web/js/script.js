// Connexion au serveur WebSocket
const socket = new WebSocket('ws://localhost:3000');

socket.onopen = () => console.log('Connexion WebSocket ouverte');
socket.onclose = () => console.log('Connexion WebSocket fermée');
socket.onerror = error => console.error('Erreur WebSocket:', error);

// Réception des messages du serveur
socket.onmessage = event => {
    const messageData = JSON.parse(event.data);
    displayMessage(messageData.content, messageData.emojis, messageData.timestamp);
};

// Fonction pour afficher un message dans l'interface
function displayMessage(message, emojis, timestamp) {
    const messageDisplayArea = document.getElementById('messageDisplayArea');
    const messageElement = document.createElement('p');
    messageElement.textContent = `${timestamp} - ${emojis.join(' ')}: ${message}`;
    messageDisplayArea.appendChild(messageElement);
    messageDisplayArea.scrollTop = messageDisplayArea.scrollHeight;
}

// Limite le nombre de sélection d'émojis à 3
function limitEmojiSelection() {
    const checkboxes = document.querySelectorAll('#emojiSelector input[type="checkbox"]');
    const selectedCheckboxes = document.querySelectorAll('#emojiSelector input[type="checkbox"]:checked');

    // Si 3 émojis sont sélectionnés, désactiver les autres cases non cochées
    checkboxes.forEach(checkbox => {
        checkbox.disabled = selectedCheckboxes.length >= 3 && !checkbox.checked;
    });
}

// Fonction pour envoyer un message
function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const emojiCheckboxes = document.querySelectorAll('#emojiSelector input[type="checkbox"]:checked');
    const message = messageInput.value;

    // Récupérer les émojis sélectionnés
    const emojis = Array.from(emojiCheckboxes).map(checkbox => checkbox.value);

    // Vérifier qu'un message et au moins un émoji sont sélectionnés
    if (message.trim() && emojis.length > 0) {
        // Créer l'objet message avec le contenu et les émojis sélectionnés
        const messageData = {
            content: message,
            emojis: emojis
        };

        // Envoyer le message au serveur WebSocket
        socket.send(JSON.stringify(messageData));

        // Afficher le message dans l'interface
        displayMessage(message, emojis, new Date().toLocaleTimeString());

        // Réinitialiser le champ de message et les cases à cocher
        messageInput.value = '';
        emojiCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
            checkbox.disabled = false; // Réactiver toutes les cases pour la prochaine sélection
        });
    } else {
        alert("Veuillez entrer un message et sélectionner au moins un émoji.");
    }
}
