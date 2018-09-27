# appServices _by Connexing_

appServices est une application développée pour l'entreprise Connexing afin de d'apporter un service d'aide à la selection de produit pour ces utilisateur.

Les familles de produits vendus par Connexing ont trop souvent des termes spécifiques. Avec appServices, l'accès à la connaissance permettra au utilisateur de répondre à leur besoin en façonnant LEUR solution.


## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__
- Run __php artisan storage:link__
- That's it - load the homepage

## Technologies used

- Laravel
- NPM
- SASS

## Translate

In the directory __ressources/lang__ duplicate a existing directory and rename it with a id of your wish language, for example 'es' = Spanish, 'nl' = Nederland.

Into each files, translate values in your language.

When you are satisfied, update the locale parameters in __config/app.php__. This parameters named __locale__ and give him the id of your wish language.

The parameter __product_price__ need a boolean value, 'true' ou 'false'. If the value is true, the product price is display in single product view.
