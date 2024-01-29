
/*
const express = require('express');
const net = require('net'); // Ajout du module net
const app = express();
*/
/*
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
*/



// server.js
const WebSocket = require('ws');
const express = require('express');
const http = require('http');
const cors = require('cors');
const dataStore = require('/home/debian/serverweb/dataStore.js');

// ... (le reste du code)

// Gérer la connexion d'un client WebSocket
wss.on('connection', (ws) => {
  console.log('Nouvelle connexion WebSocket établie');

  const welcomeMessage = "Je suis connecté hassan et ca marche!";
  ws.send(welcomeMessage);

  // Ajouter l'observateur WebSocket pour recevoir les mises à jour
  const observer = (newData) => {
    ws.send(JSON.stringify({ gpsData: newData }));
  };
  dataStore.addObserver(observer);

  // Envoyer les données GPS stockées au client WebSocket lors de la connexion
  const storedData = dataStore.getReceivedData();
  if (storedData) {
    ws.send(JSON.stringify({ gpsData: storedData }));
  }

  // Gérer les messages reçus du client WebSocket
  ws.on('message', (message) => {
    console.log(`Message reçu : ${message}`);

    // Vous pouvez ajouter ici le code pour traiter le message selon vos besoins
    // Envoyer un message de réponse au client
    const responseMessage = `Message reçu : ${message}. Réponse du serveur.`;
    ws.send(responseMessage);
  });

  // Gérer la déconnexion du client WebSocket
  ws.on('close', () => {
    // Retirer l'observateur WebSocket lorsque le client se déconnecte
    dataStore.removeObserver(observer);
  });
});

// ...  (le reste du code)
















/*
const WebSocket = require('ws');
const express = require('express');
const http = require('http');
const cors = require('cors');
const dataStore = require('/home/debian/serverweb/dataStore.js');

// Créer une application Express
const app = express();
const port = 3055;

// Créer un serveur HTTP
const server = http.createServer(app);

// Créer un serveur WebSocket attaché au serveur HTTP
const wss = new WebSocket.Server({ server });

app.use(cors());

// Route pour obtenir les données GPS via HTTP
app.get('/gpsdata', (req, res) => {
  const data = dataStore.getReceivedData() || 'Aucune donnée reçue';
  res.json({ gpsData: data });
});

// Gérer la connexion d'un client WebSocket
wss.on('connection', (ws) => {
  console.log('Nouvelle connexion WebSocket établie');

  const welcomeMessage = "Je suis connecté hassan et ca marche!";
  ws.send(welcomeMessage);

  // Envoyer les données GPS stockées au client WebSocket lors de la connexion
  const storedData = dataStore.getReceivedData();
  if (storedData) {
    ws.send(JSON.stringify({ gpsData: storedData }));
  }

  // Gérer les messages reçus du client WebSocket
  ws.on('message', (message) => {
    console.log(`Message reçu : ${message}`);

    // Vous pouvez ajouter ici le code pour traiter le message selon vos besoins
    // Envoyer un message de réponse au client
    const responseMessage = `Message reçu : ${message}. Réponse du serveur.`;
    ws.send(responseMessage);
  });
});

// Démarrer le serveur HTTP
server.listen(port, () => {
  console.log(`Serveur HTTP démarré sur http://localhost:${port}`);
});*/


















/*

const express = require('express');
const http = require('http');
const WebSocket = require('ws');
const cors = require('cors');
const dataStore = require('/home/debian/serverweb/dataStore.js');


const server = http.createServer(app);
const port = 8080;

const wss = new WebSocket.Server({ server });

app.use(cors());

// Route pour obtenir les données GPS via WebSocket
app.get('/gpsdata', (req, res) => {
  const data = dataStore.getReceivedData() || 'Aucune donnée reçue';
  res.json({ gpsData: data });
});

// Gérer la connexion d'un client WebSocket
wss.on('connection', (ws) => {
  console.log('Nouvelle connexion WebSocket établie');

  const welcomeMessage = "Je suis connecté hassan et ça marche!";
  ws.send(welcomeMessage);

  // Vous pouvez également sauvegarder la référence du client ws pour un usage ultérieur

  // Envoyer les données GPS stockées au client WebSocket lors de la connexion
  const storedData = dataStore.getReceivedData();
  if (storedData) {
    ws.send(JSON.stringify({ gpsData: storedData }));
  }

  // Gérer les messages reçus du client WebSocket
  ws.on('message', (message) => {
    console.log(`Message reçu : ${message}`);

    // Vous pouvez ajouter ici le code pour traiter le message selon vos besoins
    // Envoyer un message de réponse au client
    const responseMessage = `Message reçu : ${message}. Réponse du serveur.`;
    ws.send(responseMessage);
  });
});

server.listen(port, () => {
  console.log(`Serveur WebSocket démarré sur http://localhost:${port}`);
});
*/