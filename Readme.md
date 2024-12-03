# Task Manager - Symfony Application

## Description

Cette application de gestion de tâches vous permet de créer, modifier, supprimer et afficher des tâches. Les tâches sont associées à un statut qui peut être "todo", "in_progress" ou "Done". L'application utilise Symfony et Doctrine pour la gestion des entités, des formulaires et des migrations.

## Prérequis

Avant de pouvoir utiliser cette application, vous devez avoir les éléments suivants installés sur votre machine :

- [PHP 8.1+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download) (facultatif mais recommandé)
- [MySQL ou MariaDB](https://www.mysql.com/)

## Installation

Clonez ce dépôt sur votre machine locale :

```bash
git clone https://github.com/N-2001/Projet_task/tree/main.git
cd Projet_task
composer install   
DATABASE_URL="mysql://root:rootpassword@127.0.0.1:3306/db_task"  
symfony server:start


## Choix techniques

- **Doctrine ORM** a été utilisé pour gérer la base de données et effectuer les migrations. Cela permet de facilement manipuler les entités et de gérer l'intégrité des données.
- **Les Enums PHP** ont été utilisés pour gérer les statuts des tâches, garantissant une structure et une validation cohérentes dans l'application.
- **Twig** a été utilisé comme moteur de templates, ce qui permet d'écrire des vues HTML de manière propre et modulaire.
- **Les migrations Doctrine** sont utilisées pour versionner les modifications du schéma de la base de données.
