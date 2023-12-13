# Projet de Gestion des Présences Étudiantes

## Description

Ce projet vise à développer une application web de gestion dématérialisée des présences des étudiants en séances de cours. L'application, accessible sur des appareils mobiles, utilise les technologies suivantes :

### Technologies Utilisées

- **Laravel** : Framework PHP pour le backend.
- **Vue.js** : Framework JavaScript pour le frontend.
- **MySQL** : Système de gestion de base de données relationnelle.

### Fonctionnalités

#### 1. Enseignants
   - Consultation des cours associés.
   - Gestion des présences : liste des inscrits, pointage individuel/groupé, liste des présents/absents par séance.
   - Totaux de présence par cours.

#### 2. Gestionnaires
   - Gestion des étudiants : ajout, mise à jour, suppression.
   - Gestion des séances de cours : création, mise à jour, suppression.
   - Associations des étudiants et enseignants aux cours.
   - Statistiques : listes paginées, recherche d'étudiants, listes des cours et séances.
   - Liste détaillée des présences.

#### 3. Utilisateurs (Enseignant ou Gestionnaire)
   - Gestion du compte : création, changement de mot de passe, modification du nom/prénom.

#### 4. Administrateur
   - Gestion des utilisateurs : liste, filtre par type, recherche, acceptation/refus d'un utilisateur, création, modification, suppression.
   - Gestion des cours : création, liste, recherche, modification, suppression.

### Base de Données

La base de données suit les conventions de nommage de Laravel avec les tables :
- **users** : Utilisateurs (id, nom, prenom, login, mdp, type).
- **etudiants** : Étudiants (id, nom, prenom, noet, created_at, updated_at).
- **cours** : Cours (id, intitule, created_at, updated_at).
- **cours_users** : Associations cours-utilisateurs (cours_id, user_id).
- **cours_etudiants** : Associations cours-étudiants (cours_id, etudiant_id).
- **seances** : Séances de cours (id, cours_id, date_debut, date_fin).
- **presences** : Présences des étudiants (etudiant_id, seance_id).

### Installation

1. Clonez le dépôt : `git clone https://github.com/votre-utilisateur/ProjetGestionPresences.git`
2. Installez les dépendances : `composer install`
3. Copiez le fichier `.env.example` en `.env` et configurez votre base de données.
4. Générez une clé d'application : `php artisan key:generate`
5. Exécutez les migrations : `php artisan migrate`
6. Exécutez les Seeders pour remplir la base de données avec des données factices : `php artisan db:seed`

## Remarques

- Le compte administrateur (admin:admin) est précréé dans la base initiale.
- Les utilisateurs inactifs ont un type=null et doivent être validés par l'administrateur.
