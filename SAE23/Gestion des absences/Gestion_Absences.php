<!--
    Fichier : absence_management.html
    Description : Ce fichier contient la structure HTML (HyperText Markup Language)
    de l'interface utilisateur pour la gestion des absences. Il définit la mise en page
    des éléments visuels de la page web.
    Cette version intègre le JavaScript directement dans le fichier HTML
    et fait référence à un fichier CSS externe pour les styles.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!--
        Balise <meta charset="UTF-8"> : Spécifie l'encodage des caractères du document.
        UTF-8 est un encodage universel qui permet d'afficher correctement
        une grande variété de caractères, y compris les accents français.
    -->
    <meta charset="UTF-8">
    <!--
        Balise <meta name="viewport" content="width=device-width, initial-scale=1.0"> :
        Cruciale pour le design réactif (responsive design).
        - `width=device-width` : Définit la largeur de la fenêtre (viewport) à la largeur de l'appareil.
        - `initial-scale=1.0` : Définit le niveau de zoom initial lorsque la page est chargée.
        Cela garantit que la page s'adapte bien aux différentes tailles d'écran (mobiles, tablettes, ordinateurs de bureau).
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Absences</title>

    <!--
        Lien vers le CDN (Content Delivery Network) de Tailwind CSS.
        Tailwind CSS est un framework CSS "utility-first" qui fournit des classes prédéfinies
        pour styliser rapidement les éléments HTML sans écrire de CSS personnalisé.
        C'est une commande "peu commune" dans le sens où ce n'est pas du CSS écrit manuellement,
        mais une bibliothèque de classes.
    -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!--
        Balise <style> : Contient les règles CSS (Cascading Style Sheets) qui définissent
        l'apparence et la mise en page des éléments HTML de la page.
        Ces styles sont spécifiques à cette page et complètent ou outrepassent les styles de Tailwind.
    -->
    <style>
        /*
            Fichier : Styles CSS intégrés
            Description : Ce bloc contient les styles CSS (Cascading Style Sheets)
            personnalisés pour l'interface de gestion des absences. Il complète les
            classes utilitaires de Tailwind CSS et définit des styles spécifiques
            pour les composants de l'application, y compris le design réactif.
        */

        /*
            Règle CSS pour le corps du document (body).
            Ces styles définissent l'apparence globale de la page.
        */
        body {
            /*
                `font-family: 'Inter', sans-serif;` : Définit la police de caractères principale.
                'Inter' est une police moderne et lisible. `sans-serif` est une police de secours
                générique si 'Inter' n'est pas disponible.
            */
            font-family: 'Inter', sans-serif;
            /*
                `background-color: #f0f4f8;` : Définit la couleur de fond de la page.
                C'est un gris très clair, doux pour les yeux.
            */
            background-color: #f0f4f8;
            /*
                `color: #333;` : Définit la couleur de texte par défaut pour l'ensemble du corps.
                Un gris foncé pour une bonne lisibilité.
            */
            color: #333;
        }

        /*
            Règle CSS pour la div avec la classe `container`.
            Cette classe est utilisée pour centrer le contenu principal de la page et lui donner
            une largeur maximale, ce qui améliore la lisibilité sur les grands écrans.
        */
        .container {
            /*
                `max-width: 1200px;` : La largeur maximale du conteneur sera de 1200 pixels.
                Au-delà de cette largeur, le conteneur ne grandira plus.
            */
            max-width: 1200px;
            /*
                `margin: 2rem auto;` : Définit les marges extérieures.
                - `2rem` : Marge de 2 fois la taille de la police de base (environ 32px) en haut et en bas.
                - `auto` : Centre le bloc horizontalement dans son parent disponible.
            */
            margin: 2rem auto;
            /*
                `padding: 1.5rem;` : Ajoute un remplissage interne de 1.5 fois la taille de la police de base
                (environ 24px) sur tous les côtés du conteneur.
            */
            padding: 1.5rem;
            /*
                `background-color: #ffffff;` : Définit le fond du conteneur en blanc.
            */
            background-color: #ffffff;
            /*
                `border-radius: 1rem;` : Arrondit les coins du conteneur avec un rayon de 1 fois la taille
                de la police de base (environ 16px).
            */
            border-radius: 1rem;
            /*
                `box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);` : Ajoute une ombre douce au conteneur.
                - `0` : Décalage horizontal de l'ombre.
                - `4px` : Décalage vertical de l'ombre.
                - `12px` : Rayon de flou de l'ombre.
                - `rgba(0, 0, 0, 0.1)` : Couleur de l'ombre (noir avec 10% d'opacité).
            */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /*
            Règles CSS pour les éléments `table`.
            Ces styles définissent l'apparence générale de toutes les tables.
        */
        table {
            /*
                `width: 100%;` : La table prend 100% de la largeur de son conteneur parent.
            */
            width: 100%;
            /*
                `border-collapse: separate;` : Empêche la fusion des bordures de cellules.
                C'est une commande "peu commune" dans le sens où `collapse` est plus fréquent pour les tables.
                Ici, `separate` est utilisé spécifiquement pour permettre l'application de `border-radius`
                sur les cellules individuelles et sur la table elle-même sans problèmes de chevauchement.
            */
            border-collapse: separate;
            /*
                `border-spacing: 0;` : Supprime l'espace entre les cellules de la table.
                Nécessaire avec `border-collapse: separate` pour un aspect compact.
            */
            border-spacing: 0;
            /*
                `overflow: hidden;` : Cache tout contenu qui dépasse les limites de la table.
                Ceci est crucial pour que le `border-radius` appliqué à la table soit visible
                et que les coins des cellules ne dépassent pas.
            */
            overflow: hidden;
            /*
                `border-radius: 0.75rem;` : Arrondit les coins de la table elle-même.
            */
            border-radius: 0.75rem;
            /*
                `box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);` : Ajoute une ombre légère à la table.
            */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /*
            Règles CSS pour les cellules d'en-tête (`th`) et les cellules de données (`td`) de la table.
        */
        th, td {
            /*
                `padding: 1rem;` : Ajoute un remplissage interne de 16px sur tous les côtés des cellules.
            */
            padding: 1rem;
            /*
                `text-align: left;` : Aligne le texte à gauche dans les cellules.
            */
            text-align: left;
            /*
                `border-bottom: 1px solid #e2e8f0;` : Ajoute une ligne de séparation de 1px solide
                en bas de chaque cellule, de couleur gris clair.
            */
            border-bottom: 1px solid #e2e8f0;
        }

        /*
            Règle CSS pour les cellules d'en-tête (`th`).
        */
        th {
            /*
                `background-color: #4a90e2;` : Couleur de fond bleu plus prononcée pour l'en-tête de la table.
            */
            background-color: #4a90e2;
            /*
                `color: white;` : Couleur de texte blanche pour l'en-tête.
            */
            color: white;
            /*
                `font-weight: 600;` : Texte semi-gras pour l'en-tête.
            */
            font-weight: 600;
            /*
                `text-transform: uppercase;` : Met tout le texte de l'en-tête en majuscules.
            */
            text-transform: uppercase;
            /*
                `font-size: 0.875rem;` : Taille de police légèrement plus petite pour l'en-tête.
            */
            font-size: 0.875rem;
        }

        /*
            Règle CSS pour la dernière ligne de la table (`tr:last-child`).
            Sélectionne la dernière ligne d'un tableau et supprime la bordure inférieure de ses cellules.
        */
        tr:last-child td {
            /*
                `border-bottom: none;` : Supprime la bordure inférieure pour les cellules de la dernière ligne,
                afin d'éviter une double bordure ou une bordure inutile en bas de la table.
            */
            border-bottom: none;
        }

        /*
            Règle CSS pour les cellules qui représentent l'état d'absence (`.absence-cell`).
            Ces divs sont les "cases à cocher" interactives.
        */
        .absence-cell {
            /*
                `cursor: pointer;` : Change le curseur en une main (pointeur) au survol,
                indiquant que l'élément est cliquable.
            */
            cursor: pointer;
            /*
                `transition: background-color 0.2s ease-in-out;` : Ajoute une transition douce
                (animation) sur la propriété `background-color` sur une durée de 0.2 secondes
                avec une fonction d'accélération `ease-in-out` (démarre et finit lentement).
            */
            transition: background-color 0.2s ease-in-out;
            /*
                `border-radius: 0.5rem;` : Arrondit légèrement les coins de ces cellules interactives.
            */
            border-radius: 0.5rem;
            /*
                `display: flex;` : Utilise Flexbox pour l'alignement du contenu.
            */
            display: flex;
            /*
                `justify-content: center;` : Centre le contenu horizontalement à l'intérieur de la cellule.
            */
            justify-content: center;
            /*
                `align-items: center;` : Centre le contenu verticalement à l'intérieur de la cellule.
            */
            align-items: center;
            /*
                `height: 2.5rem;` : Hauteur fixe de la cellule.
            */
            height: 2.5rem;
            /*
                `width: 2.5rem;` : Largeur fixe de la cellule, créant un carré.
            */
            width: 2.5rem;
            /*
                `margin: auto;` : Centrer la cellule elle-même à l'intérieur de son conteneur `<td>`.
                C'est une utilisation courante de `margin: auto` pour centrer un bloc.
            */
            margin: auto;
        }

        /*
            Règle CSS pour les cellules d'absence de type ABI (`.absence-cell.absent-abi`).
            Ces classes sont ajoutées dynamiquement par JavaScript.
        */
        .absence-cell.absent-abi {
            /*
                `background-color: #f87171;` : Couleur de fond rouge clair pour indiquer une absence non justifiée.
            */
            background-color: #f87171;
            /*
                `color: white;` : Texte blanc pour un bon contraste sur le fond rouge.
            */
            color: white;
        }

        /*
            Règle CSS pour les cellules d'absence de type ABJ (`.absence-cell.absent-abj`).
        */
        .absence-cell.absent-abj {
            /*
                `background-color: #fbbf24;` : Couleur de fond orange pour indiquer une absence justifiée.
            */
            background-color: #fbbf24;
            /*
                `color: white;` : Texte blanc pour un bon contraste sur le fond orange.
            */
            color: white;
        }

        /*
            Règle CSS pour les cellules d'absence annulées (`.absence-cell.cancelled`).
        */
        .absence-cell.cancelled {
            /*
                `background-color: #cbd5e0;` : Couleur de fond gris clair pour une absence annulée.
            */
            background-color: #cbd5e0;
            /*
                `color: #64748b;` : Couleur de texte gris plus foncé.
            */
            color: #64748b;
            /*
                `text-decoration: line-through;` : Ajoute une ligne à travers le texte,
                indiquant que l'absence est annulée.
            */
            text-decoration: line-through;
        }

        /*
            Règle CSS pour l'état de survol (hover) des cellules d'absence non colorées.
        */
        .absence-cell:hover {
            /*
                `background-color: #e2e8f0;` : Change la couleur de fond en gris très clair au survol,
                indiquant l'interactivité.
            */
            background-color: #e2e8f0;
        }

        /*
            Règles CSS pour l'état de survol des cellules d'absence colorées (ABI ou ABJ).
        */
        .absence-cell.absent-abi:hover, .absence-cell.absent-abj:hover {
            /*
                `opacity: 0.9;` : Réduit légèrement l'opacité au survol pour un effet visuel subtil.
            */
            opacity: 0.9;
        }

        /*
            Règle CSS pour la classe générique `button`.
        */
        .button {
            /*
                `padding: 0.75rem 1.5rem;` : Remplissage interne de 0.75rem en haut/bas et 1.5rem à gauche/droite.
            */
            padding: 0.75rem 1.5rem;
            /*
                `border-radius: 0.5rem;` : Coins arrondis pour les boutons.
            */
            border-radius: 0.5rem;
            /*
                `font-weight: 600;` : Texte semi-gras.
            */
            font-weight: 600;
            /*
                `transition: background-color 0.2s;` : Transition douce sur la couleur de fond.
            */
            transition: background-color 0.2s;
            /*
                `cursor: pointer;` : Curseur pointeur au survol.
            */
            cursor: pointer;
        }

        /*
            Règle CSS pour la classe de bouton primaire (`.button-primary`).
        */
        .button-primary {
            /*
                `background-color: #4a90e2;` : Couleur de fond bleue pour les boutons principaux.
            */
            background-color: #4a90e2;
            /*
                `color: white;` : Texte blanc.
            */
            color: white;
        }

        /*
            Règle CSS pour l'état de survol du bouton primaire.
        */
        .button-primary:hover {
            /*
                `background-color: #357bd8;` : Couleur de fond bleu plus foncé au survol.
            */
            background-color: #357bd8;
        }

        /*
            Requête média pour le design réactif (`@media`).
            Ces styles s'appliquent lorsque la largeur de l'écran est de 768px ou moins (par exemple, tablettes et mobiles).
            C'est une commande "peu commune" dans le sens où elle permet de modifier le comportement des éléments
            en fonction de la taille de l'écran, ce qui est essentiel pour le responsive design.
        */
        @media (max-width: 768px) {
            /*
                Ajustements pour le conteneur principal sur les petits écrans.
            */
            .container {
                /*
                    `padding: 1rem;` : Réduit le padding pour économiser de l'espace.
                */
                padding: 1rem;
                /*
                    `margin: 1rem;` : Réduit la marge extérieure.
                */
                margin: 1rem;
            }

            /*
                Transformation de la table pour un affichage "empilé" sur les petits écrans.
                Ceci est une technique courante pour rendre les tables lisibles sur mobile.
                Chaque `<tr>` devient un bloc, et chaque `<td>` devient un bloc.
            */
            table, thead, tbody, th, td, tr {
                /*
                    `display: block;` : Force les éléments à se comporter comme des blocs,
                    chacun prenant une nouvelle ligne.
                */
                display: block;
            }

            /*
                Masque l'en-tête de la table (`<thead>`) sur les petits écrans,
                car les en-têtes seront affichés via les attributs `data-label` sur les `<td>`.
            */
            thead tr {
                /*
                    `position: absolute;` : Positionne l'élément absolument.
                    `top: -9999px;` et `left: -9999px;` : Déplace l'élément hors de la zone visible
                    de l'écran sans le masquer avec `display: none;` (ce qui pourrait poser problème
                    pour les lecteurs d'écran).
                */
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            /*
                Styles pour chaque ligne de la table sur les petits écrans.
            */
            tr {
                /*
                    `border: 1px solid #e2e8f0;` : Ajoute une bordure autour de chaque "ligne" empilée.
                */
                border: 1px solid #e2e8f0;
                /*
                    `margin-bottom: 0.75rem;` : Ajoute un espace entre chaque ligne empilée.
                */
                margin-bottom: 0.75rem;
                /*
                    `border-radius: 0.75rem;` : Coins arrondis pour chaque ligne empilée.
                */
                border-radius: 0.75rem;
                /*
                    `overflow: hidden;` : Cache le contenu qui dépasse les bords arrondis.
                */
                overflow: hidden;
            }

            /*
                Styles pour chaque cellule de données (`td`) sur les petits écrans.
            */
            td {
                /*
                    `border: none;` : Supprime les bordures internes des cellules.
                */
                border: none;
                /*
                    `position: relative;` : Définit la position relative pour permettre le positionnement
                    absolu des pseudo-éléments (`::before`).
                */
                position: relative;
                /*
                    `padding-left: 50%;` : Ajoute un grand padding à gauche pour laisser de la place
                    au label qui sera inséré via `::before`.
                */
                padding-left: 50%;
                /*
                    `text-align: right;` : Aligne le contenu réel de la cellule à droite.
                */
                text-align: right;
            }

            /*
                Pseudo-élément `::before` pour les cellules de données (`td::before`).
                C'est une commande "peu commune" qui permet d'insérer du contenu généré par CSS
                avant le contenu réel de l'élément. Ici, il est utilisé pour afficher le label
                de la colonne (ex: "Nom Prénom", "Créneau 1") sur mobile.
            */
            td::before {
                /*
                    `content: attr(data-label);` : Insère le contenu de l'attribut `data-label`
                    de l'élément `<td>`. C'est ainsi que les en-têtes de colonne sont affichés
                    sur mobile.
                */
                content: attr(data-label);
                /*
                    `position: absolute;` : Positionne le pseudo-élément absolument par rapport
                    à son parent (`<td>`).
                */
                position: absolute;
                /*
                    `left: 0;` : Positionne le pseudo-élément au bord gauche de la cellule.
                */
                left: 0;
                /*
                    `width: 45%;` : Largeur du label.
                */
                width: 45%;
                /*
                    `padding-left: 1rem;` : Padding à gauche pour le label.
                */
                padding-left: 1rem;
                /*
                    `font-weight: 600;` : Texte semi-gras pour le label.
                */
                font-weight: 600;
                /*
                    `text-align: left;` : Aligne le label à gauche.
                */
                text-align: left;
                /*
                    `color: #4a90e2;` : Couleur bleue pour le label.
                */
                color: #4a90e2;
            }

            /*
                Ajustements pour les cellules d'absence interactives sur les petits écrans.
            */
            .absence-cell {
                /*
                    `margin: 0.5rem 0;` : Marge verticale réduite, pas de marge horizontale.
                */
                margin: 0.5rem 0;
                /*
                    `width: 100%;` : La cellule prend toute la largeur disponible dans son `<td>`.
                */
                width: 100%;
                /*
                    `height: auto;` : La hauteur s'adapte au contenu.
                */
                height: auto;
                /*
                    `padding: 0.5rem;` : Padding réduit.
                */
                padding: 0.5rem;
            }
        }
    </style>
</head>
<!--
    Balise <body> : Contient tout le contenu visible de la page web.
    Classes Tailwind appliquées au corps :
    - `bg-gray-100` : Définit une couleur de fond gris très clair.
    - `p-4` : Ajoute un padding (remplissage) de 16px (4 * 4px) sur tous les côtés.
-->
<body class="bg-gray-100 p-4">
    <!--
        Div principale qui enveloppe tout le contenu de l'application.
        Classes Tailwind :
        - `container` : Une classe personnalisée définie dans `absence_management.css` pour centrer
          le contenu et lui donner une largeur maximale.
    -->
    <div class="container">
        <!--
            Titre principal de la page.
            Classes Tailwind :
            - `text-3xl` : Taille de police très grande.
            - `font-bold` : Texte en gras.
            - `text-center` : Centre le texte horizontalement.
            - `text-blue-700` : Couleur de texte bleu foncé.
            - `mb-6` : Margin-bottom (marge inférieure) de 24px (6 * 4px).
        -->
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Gestion des Absences</h1>

        <!--
            Section affichant les informations du module, de la date et de l'heure.
            Classes Tailwind :
            - `mb-6` : Marge inférieure.
            - `p-4` : Padding sur tous les côtés.
            - `bg-blue-50` : Couleur de fond bleu très clair.
            - `rounded-lg` : Bords arrondis de grande taille.
            - `shadow-sm` : Ombre légère.
        -->
        <div class="mb-6 p-4 bg-blue-50 rounded-lg shadow-sm">
            <!--
                Paragraphes pour afficher les informations.
                Classes Tailwind :
                - `text-lg` : Grande taille de police.
                - `font-semibold` : Texte semi-gras.
                - `text-blue-800` : Couleur de texte bleu très foncé.
                Les `<span>` avec des IDs (`moduleRef`, `currentDate`, `currentTime`)
                seront mis à jour dynamiquement par JavaScript.
            -->
            <p class="text-lg font-semibold text-blue-800">Module: <span id="moduleRef">R209</span></p>
            <p class="text-lg font-semibold text-blue-800">Date: <span id="currentDate"></span></p>
            <p class="text-lg font-semibold text-blue-800">Heure: <span id="currentTime"></span></p>
        </div>

        <!--
            Sous-titre pour la section de saisie des absences.
            Classes Tailwind :
            - `text-2xl` : Taille de police grande.
            - `font-semibold` : Texte semi-gras.
            - `text-blue-600` : Couleur de texte bleu.
            - `mb-4` : Marge inférieure.
        -->
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Saisie des Absences</h2>

        <!--
            Conteneur pour la table des absences.
            Classes Tailwind :
            - `overflow-x-auto` : Permet le défilement horizontal si le contenu de la table
              dépasse la largeur de son conteneur (utile sur les petits écrans).
            - `rounded-lg` : Bords arrondis pour le conteneur.
        -->
        <div class="overflow-x-auto rounded-lg">
            <!--
                Table HTML pour afficher la liste des étudiants et les créneaux d'absence.
                Classes Tailwind :
                - `min-w-full` : La table prend au moins 100% de la largeur disponible.
                - `bg-white` : Couleur de fond blanche pour la table.
            -->
            <table class="min-w-full bg-white">
                <!--
                    <thead> : Section de l'en-tête de la table.
                -->
                <thead>
                    <tr>
                        <!--
                            <th> : Cellule d'en-tête de table.
                            Classes Tailwind :
                            - `rounded-tl-lg` : Arrondit le coin supérieur gauche de la cellule.
                        -->
                        <th class="rounded-tl-lg">Nom Prénom</th>
                        <th>08h30 - 10h00</th>
                        <th>10h - 11h30</th>
                        <th>13h00 - 14h30</th>
                        <th>14h30 - 16h00</th>
                        <th>16h00 - 17h30</th>
                        <th class="rounded-tr-lg">17h30 - 19h</th> </tr>
                </thead>
                <!--
                    <tbody> : Section du corps de la table.
                    L'ID `absenceTableBody` est utilisé par JavaScript pour insérer
                    dynamiquement les lignes d'étudiants et leurs cellules d'absence.
                -->
                <tbody id="absenceTableBody">
                    </tbody>
            </table>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Vue Globale / Par Étudiant (À implémenter)</h2>
            <p class="text-gray-700">
                Cette section serait dédiée aux vues globales et par étudiant. Pour une implémentation complète,
                il faudrait une base de données pour stocker toutes les absences, et des requêtes PHP pour
                afficher les données agrégées sur une période donnée ou pour un étudiant spécifique.
                Des filtres de date et des sélecteurs d'étudiants seraient ajoutés ici.
            </p>
            <button class="button button-primary mt-4">Afficher la Vue Globale</button>
            <button class="button button-primary mt-4 ml-4">Afficher la Vue par Étudiant</button>
        </div>
    </div>

    <!--
        Balise <script> : Contient le code JavaScript qui gère l'interactivité de la page.
        Il est placé juste avant la fermeture de </body>. C'est une pratique courante
        et recommandée car cela garantit que tout le contenu HTML est chargé et disponible
        dans le DOM avant que le script ne tente de le manipuler. Cela évite les erreurs
        du type "élément non trouvé".
    -->
    <script>
        // Fichier : JavaScript intégré
        // Description : Ce bloc contient le code JavaScript pour gérer les interactions
        // de l'interface de saisie des absences, comme la mise à jour de la date/heure,
        // le rendu dynamique de la table des étudiants, et la gestion des clics
        // sur les cellules d'absence.

        // --- Définition des données initiales ---

        // Tableau d'objets représentant les étudiants.
        // En production, cette liste proviendrait généralement d'une base de données via PHP.
        const students = [
            { id: 1, name: "Dupont", firstName: "Jean" },
            { id: 2, name: "Martin", firstName: "Sophie" },
            { id: 3, name: "Bernard", firstName: "Luc" },
            { id: 4, name: "Petit", firstName: "Marie" },
            { id: 5, name: "Durand", firstName: "Pierre" },
            { id: 6, name: "Leroy", firstName: "Camille" },
            { id: 7, name: "Moreau", firstName: "Antoine" },
            { id: 8, name: "Simon", firstName: "Laura" }
        ];

        // Nombre de créneaux horaires par jour pour la saisie des absences.
        // MODIFIÉ : Passé de 5 à 6 créneaux.
        const numSlots = 6;

        // Objet `absences` : Stocke l'état actuel des absences.
        // C'est une structure de données JavaScript qui simule le stockage en base de données.
        // Format :
        // {
        //     studentId: {
        //         slotIndex: {
        //             status: 'absent-abi' | 'absent-abj' | 'present', // Statut de l'absence
        //             category: 'ABI' | 'ABJ' | null,                   // Catégorie (Justifiée/Injustifiée)
        //             cancelled: boolean                               // Vrai si l'absence est annulée
        //         }
        //     }
        // }
        // En production, cet objet serait synchronisé avec une base de données.
        let absences = {};

        // --- Fonctions de l'application ---

        /**
         * @function setDateTime
         * @description Met à jour l'affichage de la date et de l'heure courantes sur la page.
         * Cette fonction est appelée au chargement de la page et répétée chaque seconde.
         */
        function setDateTime() {
            // Crée un nouvel objet Date représentant la date et l'heure actuelles.
            const now = new Date();

            // Options de formatage pour la date (année, mois en toutes lettres, jour).
            // `toLocaleDateString('fr-FR', ...)` : Formate la date selon les conventions françaises.
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            // Options de formatage pour l'heure (heures et minutes à deux chiffres).
            // `toLocaleTimeString('fr-FR', ...)` : Formate l'heure selon les conventions françaises.
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

            // Met à jour le contenu textuel des éléments HTML avec les IDs 'currentDate' et 'currentTime'.
            document.getElementById('currentDate').textContent = now.toLocaleDateString('fr-FR', dateOptions);
            document.getElementById('currentTime').textContent = now.toLocaleTimeString('fr-FR', timeOptions);
        }

        /**
         * @function renderAbsenceTable
         * @description Génère et affiche la table des absences dans le DOM.
         * Cette fonction parcourt la liste des étudiants et crée une ligne de tableau pour chacun,
         * avec des cellules interactives pour chaque créneau horaire.
         */
        function renderAbsenceTable() {
            // Récupère l'élément <tbody> de la table où les lignes d'étudiants seront insérées.
            const tableBody = document.getElementById('absenceTableBody');
            // `innerHTML = '';` : Efface tout le contenu existant dans le <tbody>.
            // Cela permet de reconstruire la table à chaque appel de `renderAbsenceTable`,
            // assurant que l'affichage est toujours à jour avec l'état `absences`.
            tableBody.innerHTML = '';

            // `forEach` : Méthode de tableau qui exécute une fonction pour chaque élément du tableau `students`.
            students.forEach(student => {
                // Génère le HTML pour toutes les cellules de créneau d'un étudiant.
                // Cette partie a été extraite pour améliorer la lisibilité et éviter des problèmes de parsing.
                const slotsHtml = Array(numSlots).fill('').map((_, slotIndex) => {
                    // Récupère l'état d'absence pour l'étudiant et le créneau actuels.
                    // Si l'absence n'existe pas encore dans l'objet `absences`, elle est initialisée à 'present'.
                    const absenceState = absences[student.id] && absences[student.id][slotIndex] ? absences[student.id][slotIndex] : { status: 'present', category: null, cancelled: false };

                    let cellClass = 'absence-cell'; // Classe de base pour toutes les cellules d'absence.
                    let cellText = ''; // Texte affiché dans la cellule (vide par défaut).

                    // Conditionnels pour ajouter des classes CSS et du texte en fonction de l'état de l'absence.
                    if (absenceState.cancelled) {
                        cellClass += ' cancelled'; // Ajoute la classe 'cancelled' si l'absence est annulée.
                        cellText = 'Annulé';       // Affiche "Annulé".
                    } else if (absenceState.status === 'absent-abi') {
                        cellClass += ' absent-abi'; // Ajoute la classe 'absent-abi' si l'absence est ABI.
                        cellText = 'ABI';           // Affiche "ABI".
                    } else if (absenceState.status === 'absent-abj') {
                        cellClass += ' absent-abj'; // Ajoute la classe 'absent-abj' si l'absence est ABJ.
                        cellText = 'ABJ';           // Affiche "ABJ".
                    }

                    // Retourne la chaîne HTML pour une cellule de créneau.
                    // `data-student-id`, `data-slot-index`, `data-status`, `data-category`, `data-cancelled` :
                    // Ces attributs `data-*` sont des attributs HTML personnalisés. Ils sont une commande "peu commune"
                    // mais très utile pour stocker des données directement sur les éléments HTML.
                    // JavaScript peut y accéder facilement via la propriété `dataset` de l'élément (ex: `element.dataset.studentId`).
                    return `
                        <td data-label="Créneau ${slotIndex + 1}">
                            <div class="${cellClass}"
                                 data-student-id="${student.id}"
                                 data-slot-index="${slotIndex}"
                                 data-status="${absenceState.status}"
                                 data-category="${absenceState.category || ''}"
                                 data-cancelled="${absenceState.cancelled}">
                                ${cellText}
                            </div>
                        </td>
                    `;
                }).join('');

                // Crée un nouvel élément `<tr>` (ligne de tableau) pour l'étudiant actuel.
                const row = document.createElement('tr');

                // Définit le contenu HTML de la ligne en utilisant la variable `slotsHtml`.
                row.innerHTML = `
                    <td data-label="Nom Prénom" class="font-medium text-gray-900">${student.name} ${student.firstName}</td>
                    ${slotsHtml}
                `;
                // Ajoute la ligne complète (<tr>) au corps de la table (<tbody>).
                tableBody.appendChild(row);
            });

            // Appelle la fonction pour ajouter les écouteurs d'événements aux nouvelles cellules créées.
            addCellEventListeners();
        }

        /**
         * @function addCellEventListeners
         * @description Attache les écouteurs d'événements (clic simple et double clic)
         * à toutes les cellules d'absence générées dans la table.
         * C'est une fonction cruciale pour l'interactivité de l'interface.
         */
        function addCellEventListeners() {
            // `document.querySelectorAll('.absence-cell')` : Sélectionne tous les éléments du DOM
            // qui ont la classe `absence-cell`. Cette commande retourne une NodeList (similaire à un tableau).
            // `forEach` : Parcourt chaque élément sélectionné.
            document.querySelectorAll('.absence-cell').forEach(cell => {
                // --- Gestion du clic simple (pour basculer l'absence ou changer de catégorie) ---
                // `addEventListener('click', ...)` : Attache un écouteur d'événement 'click' à chaque cellule.
                // La fonction de rappel (callback) sera exécutée lorsque la cellule est cliquée.
                cell.addEventListener('click', (event) => {
                    // `parseInt(event.currentTarget.dataset.studentId)` :
                    // `event.currentTarget` : Référence à l'élément sur lequel l'écouteur d'événement est attaché (la cellule `div`).
                    // `.dataset.studentId` : Accède à la valeur de l'attribut `data-student-id` de l'élément.
                    // `parseInt()` : Convertit la chaîne de caractères (issue de l'attribut `data-`) en un nombre entier.
                    const studentId = parseInt(event.currentTarget.dataset.studentId);
                    const slotIndex = parseInt(event.currentTarget.dataset.slotIndex);
                    // Récupère le statut et la catégorie actuels de la cellule à partir de ses attributs `data-`.
                    let currentStatus = event.currentTarget.dataset.status;
                    let currentCategory = event.currentTarget.dataset.category;
                    // `event.currentTarget.dataset.cancelled === 'true'` : Convertit la chaîne 'true' ou 'false'
                    // en un booléen JavaScript.
                    let isCancelled = event.currentTarget.dataset.cancelled === 'true';

                    // Initialise l'entrée pour l'étudiant et le créneau dans l'objet `absences` si elle n'existe pas.
                    // Ceci est important pour éviter les erreurs si l'on clique sur une cellule non encore enregistrée.
                    if (!absences[studentId]) {
                        absences[studentId] = {};
                    }
                    if (!absences[studentId][slotIndex]) {
                        absences[studentId][slotIndex] = { status: 'present', category: null, cancelled: false };
                    }

                    // Si la cellule est déjà marquée comme annulée, un clic simple ne fait rien.
                    // On pourrait ajouter une logique pour la réactiver ici si désiré.
                    if (isCancelled) {
                        return; // Quitte la fonction.
                    }

                    // Logique de basculement de l'état d'absence :
                    if (currentStatus === 'present') {
                        // Si l'étudiant était présent, le marquer comme absent (ABI par défaut).
                        absences[studentId][slotIndex].status = 'absent-abi';
                        absences[studentId][slotIndex].category = 'ABI';
                    } else if (currentStatus === 'absent-abi') {
                        // Si l'étudiant était ABI, le changer en ABJ.
                        absences[studentId][slotIndex].status = 'absent-abj';
                        absences[studentId][slotIndex].category = 'ABJ';
                    } else if (currentStatus === 'absent-abj') {
                        // Si l'étudiant était ABJ, le remettre à présent.
                        absences[studentId][slotIndex].status = 'present';
                        absences[studentId][slotIndex].category = null; // Réinitialise la catégorie.
                    }

                    // Enregistrer l'état (simulé ici, enverrait à la BD en réel)
                    console.log(`Absence pour étudiant ${studentId}, créneau ${slotIndex}:`, absences[studentId][slotIndex]);
                    // Re-render la table pour que les changements de classes CSS (couleur, texte) soient appliqués.
                    renderAbsenceTable();
                });

                // Double clic: Annule l'absence
                cell.addEventListener('dblclick', (event) => {
                    const studentId = parseInt(event.currentTarget.dataset.studentId);
                    const slotIndex = parseInt(event.currentTarget.dataset.slotIndex);

                    if (!absences[studentId]) {
                        absences[studentId] = {};
                    }
                    if (!absences[studentId][slotIndex]) {
                        absences[studentId][slotIndex] = { status: 'present', category: null, cancelled: false };
                    }

                    // Basculer l'état annulé
                    absences[studentId][slotIndex].cancelled = !absences[studentId][slotIndex].cancelled;

                    // Si annulé, réinitialiser le statut et la catégorie pour la clarté (ou les conserver si l'annulation est temporaire)
                    if (absences[studentId][slotIndex].cancelled) {
                        absences[studentId][slotIndex].status = 'present'; // Le statut visuel sera 'Annulé'
                        absences[studentId][slotIndex].category = null;
                    } else {
                        // Si on désannule, on pourrait revenir à l'état précédent ou à 'present'
                        absences[studentId][slotIndex].status = 'present';
                        absences[studentId][slotIndex].category = null;
                    }

                    // Enregistrer l'état (simulé ici)
                    console.log(`Absence pour étudiant ${studentId}, créneau ${slotIndex} annulée/réactivée:`, absences[studentId][slotIndex]);
                    renderAbsenceTable(); // Re-rendre la table
                });
            });
        }

        // Initialisation de l'application
        window.onload = () => {
            setDateTime();
            renderAbsenceTable();
            // Mettre à jour la date et l'heure toutes les secondes
            setInterval(setDateTime, 1000);
        };
    </script>
</body>
</html>
