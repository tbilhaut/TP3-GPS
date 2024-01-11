const express = require('express');
const net = require('net'); // Ajout du module net
const app = express();
const portHTTP = 3002; // Le port sur lequel votre serveur HTTP écoutera
const portTCP = 3005; // Le port sur lequel votre serveur TCP écoutera

// Route d'exemple pour le serveur HTTP
app.get('/', (req, res) => {
  res.send('Bonjour, ceci est un serveur web simple en utilisant Node.js et Express.js');
});

// Démarrer le serveur HTTP
app.listen(portHTTP, () => {
  console.log(`Le serveur HTTP est en écoute sur le port ${portHTTP}`);
});

// Créer le serveur TCP
const tcpServer = net.createServer((socket) => {
  // Événement lorsque le serveur reçoit des données
  socket.on('data', (data) => {
    console.log(`Données reçues du client TCP: ${data}`);
    // Vous pouvez ajouter ici le traitement des données reçues
     // Envoyer un message de confirmation au client
     const confirmationMessage = "Le serveur a bien reçu les données.";
     socket.write(confirmationMessage);
   
  });

  // Événement lorsque la connexion TCP est terminée
  socket.on('end', () => {
    console.log('Connexion TCP terminée');
  });
});


// Démarrer le serveur TCP
tcpServer.listen(portTCP, () => {
  console.log(`Le serveur TCP est en écoute sur le port ${portTCP}`);
});




//test

// Importer le module WebSocket
const WebSocket = require('ws');

// Créer un serveur WebSocket
const wss = new WebSocket.Server({ port: 8080 });

// Gérer la connexion d'un client WebSocket
wss.on('connection', (ws) => {
  console.log('Nouvelle connexion WebSocket établie');

  // Vous pouvez également sauvegarder la référence du client ws pour un usage ultérieur
   // Gérer les messages reçus du client WebSocket
   ws.on('message', (message) => {
    console.log(`Message reçu : ${message}`);

    // Vous pouvez ajouter ici le code pour traiter le message selon vos besoins
    // Envoyer un message de réponse au client
    const responseMessage = `Message reçu : ${message}. Réponse du serveur.`;
    ws.send(responseMessage);
  });
});


