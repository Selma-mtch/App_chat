function envoyerMessage() {
    var messageInput = document.getElementById('messageInput');
    var messageText = messageInput.value;

    if (messageText.trim() !== "") {
        var newMessage = document.createElement('div');
        newMessage.classList.add('message', 'sent'); // Ajoutez la classe 'sent'

        var messageContent = document.createElement('p');
        messageContent.textContent = messageText;
        newMessage.appendChild(messageContent);

        var messagesBox = document.getElementById('messageDisplayArea');
        messagesBox.appendChild(newMessage);

        messagesBox.scrollTop = messagesBox.scrollHeight;

        messageInput.value = '';
    }
}

document.getElementById('messageInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        envoyerMessage();
    }
});
