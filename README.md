# Acitivite1.4
Création à l’aide de PHPMyAdmin une nouvelle base de donnée 'database' et création de la table « articles » structurée comme telle :

id – Integer auto-incrémenté, clef primaire titre – Varchar 255 texte – Text auteur – Varchar 255 date_publication – Date

la fonction « getArticles » lit la base de données plutôt que le fichier articles.json Ajout du boutton "supprimer" et lorsqu'il est cliqué, cela supprime son occurrence dans la base de données.

Ajout de section commentaire Tous les commentaires d’un article doivent être affichés sous celui-ci.

La table « commentaires » est sensiblement la même que la table article :

id – Integer auto-incrémenté, clef primaire texte – Text auteur – Varchar 255 date_publication – Date.

Exportation de cette base de données.
