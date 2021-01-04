
# CRUD du board. 


Tant qu'un utilisateur n'est pas connecté il ne voit aucun board. 

!!! question Comment sait-on qu'un utilisateur est connecté ? 

    Réponse : comme il faut.

Une fois connecté, on affiche tous board dans son dashboard ? 

Si il navigue sur la route /boards : il voit tous les boards auxquels il participe. 

Quelles vont être nos routes : 
 - /boards : pour tous les boards auxquels il participe
 - /myboards : tous les board dont il est le propriétaire
 - /boards/create : pour créer un board dont il sera le proprio
 - ... les autres définira directement dans routes. 


Le processus de création d'un crud : 
- créer le contrôleur
- il faut définir les routes. 
 - À une route on associe une méthode de contrôleur, et on nomme la route. On peut rajouter s'il faut être identifié pour accéder à cette route. 
- On rempli la méthode de contrôleur que l'on vient d'associer. 
- On créé la vue qui sera renvoyée par la méthode de contrôleur. 

!!! important Il faut toujours valider les données des formulaires. 
    Il existe plusieurs façon de faire cela, https://laravel.com/docs/8.x/validation
    Pour l'instant on se contente d'utiliser le tableau validatedData avec la méthode valide de l'objet Request. 

Cas des formulaires : 
    - il faut préciser la méthode (POST, PUT, DELETE)
    - il faut donner un jeton csrf pour éviter les faille csrf