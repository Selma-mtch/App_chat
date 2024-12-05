// Connexion au serveur WebSocket
        const socket = new WebSocket('ws://localhost:8080');

        // Lorsque la connexion est ouverte
        socket.onopen = () => {
            console.log('Connecté au serveur WebSocket');
        };

        // Lorsqu'un message est reçu du serveur
        socket.onmessage = (event) => {
            afficherMessage(event.data, false);
        };

        // Fonction pour envoyer un message
        function envoyerMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value;

            if (message.trim() !== '') {
                // Envoyer le message au serveur
                socket.send(message);

                // Afficher le message dans l'interface utilisateur
                afficherMessage(message, true);

                // Réinitialiser le champ de saisie
                messageInput.value = '';
            }
        }

        // Fonction pour afficher un message dans la boîte de réception
        function afficherMessage(message, isUser) {
            const messageDisplayArea = document.getElementById('messageDisplayArea');
            const messageElement = document.createElement('div');

            // Ajout de classes selon l'expéditeur
            messageElement.classList.add('message');
            messageElement.classList.add(isUser ? 'message-user' : 'message-other');
            messageElement.textContent = message;

            // Ajouter le message à la zone d'affichage
            messageDisplayArea.appendChild(messageElement);

            // Défilement automatique vers le bas
            messageDisplayArea.scrollTop = messageDisplayArea.scrollHeight;
        }

document.getElementById('messageInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        envoyerMessage(); 
    }
});
