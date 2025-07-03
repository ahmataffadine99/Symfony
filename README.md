Ce guide fournit les étapes nécessaires pour installer et démarrer le projet
localement, ainsi que des informations sur les comptes de test et le processus de
validation.

1. Prérequis
Assurez vous que les éléments suivants sont installés sur votre machine :

PHP : Version 8.1 ou supérieure.
Composer : Gestionnaire de dépendances PHP.
Node.js & npm / Yarn
Environnement d'exécution JavaScript et gestionnaire de paquets (pour les dépendances frontend).
Client Git : Pour cloner le dépôt.
Symfony CLI (recommandé) : Outil en ligne de commande de Symfony pour le
serveur web, etc.
Serveur de base de données: MyS
QL ou équivalent (ou SQLite pour un démarrage
rapide sans configuration de serveur).

2. Installation Locale

Suivez ces étapes pour installer et configurer le projet sur votre machine locale :

1. **Cloner le dépôt Git :**
```bash
git clone [URL_DU_DEPOT_
cd [NOM_DU_DOSSIER_DU_PROJET]

2. **Installer les dépendances PHP (Composer) :**
```bash```bash
composer installcomposer install
``````
3. **Configurer la base de données :**

* Copiez le fichier d'environnement :* Copiez le fichier d'environnement :
```bash```bash
cp .env .env.localcp .env .env.local
``````
* Ouvrez le fichier `.env.local` et configurez la variable `DATABASE_URL` avec les * Ouvrez le fichier `.env.local` et configurez la variable `DATABASE_URL` avec les identifiants de votre base de données.identifiants de votre base de données.
*Exemple pour MySQL :* *Exemple pour MySQL :* `DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_na`DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverme?serverVersion=8.0.32&charset=utf8mb4"`Version=8.0.32&charset=utf8mb4"`
*Exemple pour SQLite (si préféré pour la simplicité) :* *Exemple pour SQLite (si préféré pour la simplicité) :* `DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"``DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"`

4. **Créer la base de données (si non existante) :**
```bash```bash
php bin/console docphp bin/console doctrine:database:createtrine:database:create
``````
5. **Exécuter les migrations Doctrine :**

Cela créera les tables nécessaires dans votre base de données.Cela créera les tables nécessaires dans votre base de données.
```bash```bash
php bin/console doctrine:migrations:migratephp bin/console doctrine:migrations:migrate
``````
Confirmez l'exécution si demandé.Confirmez l'exécution si demandé.

6. **Charger les données de test (Fixtures) :****Charger les données de test (Fixtures) :**
Pour peupler la base de données avec des utilisateurs et des objets de collection Pour peupler la base de données avec des utilisateurs et des objets de collection fictifs.fictifs.
```bash```bash
php bin/console doctrine:fixtures:loadphp bin/console doctrine:fixtures:load
``````
Confirmez si demandé.Confirmez si demandé.

7. **Installer les dépendances frontend (npm/Yarn) :**dépendances frontend (npm/Yarn) :**
```bash```bash
npm install # ou yarn installnpm install # ou yarn install
``````
8. **Compiler les assets frontend :**

Pour le développement (mode watch pour la modification en direct) :Pour le développement (mode watch pour la modification en direct) :
```bash```bash
npm run dev # ou yarn dev (si tu utilinpm run dev # ou yarn dev (si tu utilises Webpack Encore)ses Webpack Encore)
# ou# ou
npm run watch # ou yarn watch (si tu utilises Vite, ce qui était notre dernière npm run watch # ou yarn watch (si tu utilises Vite, ce qui était notre dernière discussion)discussion)
``````
Pour la production (optimisation des assets) :Pour la production (optimisation des assets) :
```bash```bash
npm run build # ou yarn buildnpm run build # ou yarn build
``````
## 3. Démarrage du Projetu Projet
Une fois toutes les étapes d'installation terminées :
Une fois toutes les étapes d'installation terminées :

1. **Démarrer le serveur web Symfony :**
```bash```bash
symfony servesymfony serve
``````
Le projet sera accessible généralement à l'adresse `http://127.0.0.1:8000` (le port Le projet sera accessible généralement à l'adresse `http://127.0.0.1:8000` (le port peut varier).peut varier).

2. **Démarrer le serveur de développement Vite (si utilisé) :****Démarrer le serveur de développement Vite (si utilisé) :**
Si tu as utilisé `npm run watch` (ou `yarn watch`), le serveur Vite sera déjà en Si tu as utilisé `npm run watch` (ou `yarn watch`), le serveur Vite sera déjà en cours d'exécution et écoutera les modifications de tes assets.cours d'exécution et écoutera les modifications de tes assets.

## 4. Comptes de Test

Les fixtures chargées devraient créer les comptes de test suivants :evraient créer les comptes de test suivants :

* **Administrateur :**
* **Email :** `admin@example.com`* **Email :** `admin@example.com`
* **Mot de passe :** `password` (ou `testpass` selon comment tu as configuré ta * **Mot de passe :** `password` (ou `testpass` selon comment tu as configuré ta fixture `UserFixtures`)fixture `UserFixtures`)
* **Rôle :** `ROLE_ADMIN` et `ROLE_U* **Rôle :** `ROLE_ADMIN` et `ROLE_USER`SER`

(Vérifie dans `src/DataFixtures/UserFixtures.php` pour les mots de passe exacts si ceuxceux--ci ne fonctici ne fonctionnent pas.)onnent pas.)

## 5. Processus de Validation / Comment Tester le Projet

Pour valider le bon fonctionnement de l'application :

1. **Navigation générale :**
* Accéder à la page d'accueil (`/`).* Accéder à la page d'accueil (`/`).
* Tenter de naviguer vers "Ma Collection" sans être * Tenter de naviguer vers "Ma Collection" sans être connecté (redirection vers le connecté (redirection vers le login attendue).login attendue).

2. **Test des comptes de test :**

* Se connecter avec `user@example.com`.
* Se connecter avec `admin@example.com`.

3. **Gestion des collections (avec un utilisateur connecté) :**

* **Ajouter :** **Ajouter :** Essayer d'ajouter un Livre, un Vinyle et un Jeu Vidéo. Remplir tous * Essayer d'ajouter un Livre, un Vinyle et un Jeu Vidéo. Remplir tous les champs.les champs.
* **Modifier :** Sélectionner un objet existant (que tu as ajouté ou via les fixtures) * **Modifier :** Sélectionner un objet existant (que tu as ajouté ou via les fixtures) et modifier ses informations.et modifier ses informations.
* **Supprimer :** Sélectionner un objet existant * **Supprimer :** Sélectionner un objet existant et le supprimer (vérifier qu'il et le supprimer (vérifier qu'il disparaît de la liste).disparaît de la liste).
* **Vérifier les détails :** Cliquer sur un objet pour voir sa page de détails.* **Vérifier les détails :** Cliquer sur un objet pour voir sa page de détails.

4. **Fonctionnalités de recherche et de filtrage :**
* Utiliser la barre de recherche avec différents * Utiliser la barre de recherche avec différents motsmots--clés.clés.
* Appliquer des filtres par type, statut, catégorie, emplacement, tags.* Appliquer des filtres par type, statut, catégorie, emplacement, tags.
* Tester les options de tri (par nom, date d'ajout).* Tester les options de tri (par nom, date d'ajout).

5. **Vérification de l'API (avec le navigateur) :**
* Accéder à l'URL pour lister toutes les collections :* Accéder à l'URL pour lister toutes les collections : `http://localhost:8000/api/collections``http://localhost:8000/api/collections`
* Accéder à l'URL pour un objet spécifique (remplacer `ID_DE_L_OBJET` par un * Accéder à l'URL pour un objet spécifique (remplacer `ID_DE_L_OBJET` par un vrai ID) : `http://localhost:8000/api/collections/ID_DE_L_OBJET`vrai ID) : `http://localhost:8000/api/collections/ID_DE_L_OBJET`
* Vérifier que le JSON est correctement affiché et contient les d* Vérifier que le JSON est correctement affiché et contient les données attendues.onnées attendues.

6. **Vérification des rôles et autorisations :**
* Tenter de modifier/supprimer un objet créé par un autre utilisateur (si cette * Tenter de modifier/supprimer un objet créé par un autre utilisateur (si cette fonctionnalité est visible). L'action devrait être refusée (Forbidden).fonctionnalité est visible). L'action devrait être refusée (Forbidden).
* Si un utilisateur est `RO* Si un utilisateur est `ROLE_ADMIN`, il devrait pouvoir modifier/supprimer LE_ADMIN`, il devrait pouvoir modifier/supprimer n'importe quel objet.n'importe quel objet.

7. **Responsive Design :**
* Redimensionner la fenêtre du navigateur ou utiliser les outils de développement * Redimensionner la fenêtre du navigateur ou utiliser les outils de développement (mode appareil mobile) pour vérifier l'affichage sur différentes (mode appareil mobile) pour vérifier l'affichage sur différentes tailles d'écran.tailles d'écran
