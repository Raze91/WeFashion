# We Fashion #

Site Vitrine réalisé avec le framework php Laravel

## Installation du projet ##

#### Installation des dépendances ####
```
composer install
```

#### Lancez votre serveur local xampp (ou autre) et créez votre base de donnée mysql  ####

#### Faites une copie du fichier .env.example ####

```
cp .env.example .env
```

#### Configurez votre .env ####
```
DB_DATABASE=<Nom de votre base de donnée>
```

#### Générez une nouvelle clée d'application ####

```
php artisan key:generate
```

#### Lancez les migrations avec les seeds ####

```
php artisan migrate --seed
```

#### Lancez le projet ####

```
php artisan serve
```

## Utilisateurs disponibles ##

#### Administrateur ####

```
Mail : edouard@admin.fr
Mot de passe : admin
```

#### Utilisateur visiteur ####

```
Mail : user@user.fr
Mot de passe : user
```
