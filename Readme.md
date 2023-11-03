# Makerz 
projet permettant de participer au sondage du mois en votant pour 1 vidéo parmis 3 videos présentent, 
et ainsi la vidéo ayant le plus de vote est diffusée.

## installation
pour installer ce projet, suivez les étapes suivantes :
1. clonez le dépot à l'aide de git clone
2. installez PHP
3. installez MySql
4. installez la Cli Symfony : https://symfony.com/download
5. executez la commande : composer install
6. creer le fichier .env.local et le parametrer
7. creer la base de donnée avec la ligne de commande : php bin/console doctrine:database:create
8. creation des fichiers de migrations : php bin/console make:migration
9. migrer les données : php bin/console doctrine:migration:migrate

## utilisation

## contribution
les contributions viennent de ....(participant au stage)
pour signaler des bugs, ou soumettre des pulls request veuillez contacter ....

## techno utilisées
symfony 8.0, etc...

## Pré-requis : 
Avoir PHP >=8.1 installé. 
Avoir installé composer 
Avoir installé le CLI symfony

Pour vérifier vos versions :
php -v
composer -v

## ressources
liens vers composer, ...lien vers le cli symfony...