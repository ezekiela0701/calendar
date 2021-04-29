# cloner le projet en faisant
git clone https://github.com/ezekiela0701/calendar.git

# install composer
composer install

# create database
 php bin/console doctrine:database:create
 
# creer table de base de donnees
php bin/console d:s:u --force

# clear cache
php bin/console c:c

# launch server
php bin/console server:run

#vous pouvez creer un virtual host pour eviter de ne pas lancer le serveur a chaque utilisation de l'application
