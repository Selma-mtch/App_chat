// Établir la connexion WebSocket avec le serveur
const socket = new WebSocket('ws://localhost:8080'); // Assurez-vous que le serveur écoute sur ce port

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

        // Permet de faire défiler vers le bas pour voir le dernier message
        messageDisplayAreaUser.scrollTop = messageDisplayAreaUser.scrollHeight;

        messageInput.value = '';
    }
}

document.getElementById('messageInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        envoyerMessage(); 
    }
});

socket.onmessage = function(event) {
    var messageText = event.data;

    var newMessage = document.createElement('div');
    newMessage.classList.add('message', 'received'); // Marqué comme "reçu" par l'autre utilisateur

    var messageContent = document.createElement('p');
    messageContent.textContent = messageText;
    newMessage.appendChild(messageContent);

    var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
    messageDisplayAreaUser.appendChild(newMessage);

    messageDisplayAreaUser.scrollTop = messageDisplayAreaUser.scrollHeight;
};
