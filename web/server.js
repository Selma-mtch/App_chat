const WebSocket = require('ws');

const server = new WebSocket.Server({ port: 8080 });

server.on('connection', (socket) => {
    console.log('Nouvelle connexion établie');

    socket.on('message', (message) => {
        console.log(`Message reçu : ${message}`);
        // Envoyer le message à tous les clients
        server.clients.forEach((client) => {
            if (client.readyState === WebSocket.OPEN) {
                client.send(message);
            }
        });
    });

    socket.on('close', () => {
        console.log('Client déconnecté');
    });
});

console.log('Serveur WebSocket en écoute sur ws://localhost:8080');
