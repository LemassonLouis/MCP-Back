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
```

- Migrate the migrations :

```
symfony console make:migration
symfony console d:m:m --no-interaction
```

- Load the fixtures :

```
symfony console d:f:l --no-interaction
```

## Run the server :

```
php -S 127.0.0.1:XXXX -t public
```

If you want to see the API URL available add `/api` to the URL
