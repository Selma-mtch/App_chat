# 📬 Application de Messagerie avec Annotations par Émoji

Ce projet est une application de messagerie en temps réel qui permet aux utilisateurs d'envoyer et de recevoir des messages après avoir sélectionné une émoji en tant qu'annotation. L'application utilise **WebSockets** pour une communication en temps réel et une **base de données** pour stocker les messages et les annotations.

## 🚀 Fonctionnalités

- **Messagerie en temps réel** : Les messages sont envoyés et reçus instantanément grâce aux WebSockets.
- **Annotations par émoji** : Avant chaque envoi de message, l'utilisateur doit sélectionner une émoji pour annoter son message.
- **Gestion des utilisateurs** : Les utilisateurs peuvent s'identifier pour commencer une session de chat.
- **Historique des messages** : Les messages et leurs annotations sont stockés dans une base de données pour permettre un historique de conversation.
- **Interface conviviale** : Une interface utilisateur simple et intuitive, optimisée pour les interactions rapides.

## 📦 Architecture du Projet

1. **Back-end** : Développé en **Node.js** avec **WebSocket** pour gérer la communication en temps réel.
2. **Front-end** : Interface utilisateur en **HTML,Php, CSS et JavaScript** pour envoyer, recevoir, et annoter les messages.
3. **Base de données** : Utilisation de **Pgadmin** pour stocker les utilisateurs, messages et annotations.

## 📋 Pré-requis

- **Node.js** (v14 ou plus récent)
- **Pgadmin** (ou une autre base de données NoSQL/SQL)
- **NPM** (ou Yarn pour la gestion des dépendances)

## 🔧 Installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/votre-utilisateur/nom-du-projet.git
   cd nom-du-projet
