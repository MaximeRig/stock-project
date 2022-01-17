# Stock project

Stock project est un outil permettant de savoir si des produits commerciaux, comme les consoles de jeux vidéo, sont disponibles en stock sur les différents sites marchands.

Ce projet a pour but de me faire pratiquer le PHP vanilla sans l'aide de framework. C'est la raison pour laquelle, j'utiliserai le moins possible de librairies.

## Fonctionnement

Le fonctionnement est simple : une tache CRON tourne à heures régulières et envoie une notification par email à l'utilisateur pour l'informer du retour en stock d'un produit.

## Stack technique

- PHP
- Docker
- CRON
- Mailer

## Utilisation

- Lancer le conteneur docker. Depuis `./docker`, lancer la commande `docker-compose up -d`
- Créer le fichier `./.env.local` qui sera une copie de `./env` et remplir les valeurs des variables