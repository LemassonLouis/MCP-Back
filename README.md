# MCP API

## Installation

- Install dependencies :

```
composer install
```

## Database configuration

- Copy the `.env` to make a `.env.local`, uncomment a `DATABASE_URL` line and replace informations.
- Create the database :

```
symfony console doctrine:database:create
or
php bin/console doctrine:database:create
```

- Migrate the migrations :

```
symfony console make:migration
symfony console d:m:m --no-interaction
or
php bin/console make:migration
php bin/console d:m:m --no-interaction
```

- Load the fixtures :

```
symfony console d:f:l --no-interaction
or
php bin/console d:f:l --no-interaction
```

## Run the server :

```
php -S xxx.xxx.xxx.xxx:XXXX -t public
```

## Other things :

- If you want to see the API URL available add `/api` to the URL.

## Test :

- Change the DATABASE_URL variable in the .env.test

- Database creation : 

```
php bin/console --env=test doctrine:database:create 
``` 

- Creation of schemas : 

```
php bin/console --env=test doctrine:schema:create
```

- Load the fixtures : 
```
symfony console d:m:m --env=test
```

- Run all tests : php bin/phpunit
