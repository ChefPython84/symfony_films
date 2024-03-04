# Projet Symfony Dockerisé - Movie Hub 🎬

![PHP](https://img.shields.io/badge/PHP-8.x-blue.svg)
![Symfony](https://img.shields.io/badge/Symfony-6.x-brightgreen.svg)
![Docker](https://img.shields.io/badge/Docker-Compose-blue.svg)

Auteur : Erwan Couturier TP E

Projet Symfony de gestion de films avec une configuration Docker.

## Table des Matières

- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)

## Prérequis

- Docker
- Docker Compose

## Installation

**Clonez le projet depuis le dépôt Git :**

    ```bash
    git clone https://github.com/ChefPython84/symfony_films.git
    cd symfony_films
    ```

**Modifiez le fichier `.env` avec vos configurations.**

3.**Lancez Docker Compose pour construire les conteneurs :**

    ```bash
    docker-compose up -d
    ```

4.**Installez les dépendances Symfony via Composer :**

    ```bash
    docker-compose exec php composer install
    ```

5.**Exécutez les migrations pour créer la base de données :**

    ```bash
    docker-compose exec php bin/console doctrine:migrations:migrate
    ```

## Configuration

Ports exposés :

- **serveur web** : [http://localhost:8000](http://localhost:8000)
- **serveur PhpMyAdmin** : [http://localhost:8080](http://localhost:8080)

#### Connexion PhpMyAdmin

- **Utilisateur** : root
- Pas de mot de passe pour l'utilisateur root


## Utilisation

- Accédez à l'application Symfony dans le navigateur : [http://localhost:8000](http://localhost:8000)
- Accédez à PhpMyAdmin pour gérer la base de données : [http://localhost:8080](http://localhost:8080)
- Pour arrêter les conteneurs Docker : `docker-compose down`
- Pour arrêter les conteneurs Docker et supprimer les volumes : `docker-compose down -v`
- Pour accéder à un conteneur : `docker exec -ti <nom-du-service> /bin/bash`
- Pour voir les logs des conteneurs : `docker-compose logs -f`
