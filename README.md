# README
Le blog à été réalisé par Meghnous Malak et Djouad Asma. 

### Accès administrateur :
login : meghnousmalak@gmail.com
password : 11061994

### fonctionnalités :
le blog affiche différents articles,permet à un adminstrateur de se connecter afin de pouvoir effectuer les opérations suivantes: supprimer, modifier ou ajouter d’autres articles.

la validation des formulaires a été prise en charge.

Nous avons utilisé les Bundles suivants : 
   #### StofDoctrineExtensionsBundle : 
   Pour générer automatiquement les slugs en utilisant la caractéristique Sluggable.
   Pour la mise à jour des dates lors de la création et la modification de l'article.
   #### le SecurityBundle de Symfony :
   pour la gestion de d'authentification et d'autorisation  ainsi que pour la protection des routes CRUD (Role-Admin).
   #### le fixtureBundle de Symfony :
   pour charger un «faux» ensemble de données dans une base de données.
   

Nous avons publié notre api (exposant les 5 récents articles).
Nous avons consommé l'api de : CHAILLY-DEJESUSMARTINS (Api Externe).

### Lien de déploiement: 
pour faire déployer on a essayé plusieurs fois avec une bdd mysql et une bdd postgreSQL, mais ça n'a pas marché due à une erreur de permission de serveur pour lire les fichiers, on est encore entrain d'essayer de résoudre le problème... 
le site sera mise à jour sur ce lien:https://djouad-meghnous-blogg.herokuapp.com/

### Lien vers la base de donnée: 
https://drive.google.com/drive/folders/1POr2mv47CLtlorUin6oxSZN6jkreNIHF?usp=sharing
