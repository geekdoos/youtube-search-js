**Youtube web app for searching**
=================================
**Sujet**

Développez une application web en Javascript qui permet d'effectuer une recherche sur Youtube en utilisant les APIs Youtube et affiche les vidéos retrouvées dans une liste (titre, lien vers la vidéo, image thumbnail), en donnant la possibilité de parcourir tous les résultats à travers deux boutons "next" et "previous". 

L'application développée doit persister en local -sur la machine de l'utilisateur-  le résultat de la dernière recherche effectuée de façon à permettre sa réutilisation pour afficher les derniers résultats si on quitte puis on réouvre l'application.

**How to use it**
-----------------
Récupéré le fichier .zip avec git clone ou bien le télécharger puis le lancé dans dans un serveur web (apache) a fin de réutilisé et l'afficher les derniers résultats qui sont persister en local avec le fichier **index.php**.

**NB** le schema de la base de donnée se trouve à la racine j'ai nommé youtube.sql

**database schema**

Database name : youtube

Table name : resultas(id, video_id, title, link, thumnail)

--

or

Une utilisation static just en lançant le fichier **index.html** toujours avec un serveur soi nodejs ou apache.

**Features**
--

-- Get the results from youtube inside your app

-- Auto-completion

-- Local storage using a MySQL database

-- Show the result of the last request

**Whats inside**
--
    
-- Youtube API V3

-- jQuery-ui css / js

-- jQuery js

-- Bootstrap css

-- normalize css

-- MySQL

-- PHP 5.6 (PDO)
