// Fonction pour envoyer ton message
function envoyerMessage() {
    var messageInput = document.getElementById('messageInput');
    var messageText = messageInput.value.trim(); 

    if (messageText !== "") {
        // Creation nv messge
        var newMessage = document.createElement('div');
        newMessage.classList.add('message', 'sent'); 

        // Creer contenu messge
        var messageContent = document.createElement('p');
        messageContent.textContent = messageText;
        newMessage.appendChild(messageContent);

        // Ajouter ds zone affich
        var messageDisplayAreaUser = document.getElementById('messageDisplayAreaUser');
        messageDisplayAreaUser.appendChild(newMessage);

        // permet de defiler vers haut et afficher derniermssge tout le temps
        messageDisplayAreaUser.scrollTop = messageDisplayAreaUser.scrollHeight;

        messageInput.value = '';
    }
}

document.getElementById('messageInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        envoyerMessage(); 
    }
});
