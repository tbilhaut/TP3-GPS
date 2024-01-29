/*// dataStore.js
let receivedData = '';

module.exports = {
  getReceivedData: () => receivedData,
  setReceivedData: (data) => {
    receivedData = data;
    console.log('Données GPS stockées :', receivedData);
  }
};*/
// dataStore.js
let receivedData = '';
const observers = [];

module.exports = {
  getReceivedData: () => receivedData,
  setReceivedData: (data) => {
    receivedData = data;
    console.log('Données GPS stockées :', receivedData);

    // Notifier tous les observateurs avec les nouvelles données
    observers.forEach(observer => observer(receivedData));
  },
  addObserver: (observer) => {
    observers.push(observer);
  },
  removeObserver: (observer) => {
    const index = observers.indexOf(observer);
    if (index !== -1) {
      observers.splice(index, 1);
    }
  }
};
