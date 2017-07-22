# Demo app used during LARACON 2017

**Warning**: Do not use this app in production

## Install

### Install php dependencies

```bash
composer install
```

### Install javascript dependencies

```bash
npm install
```

### Create a database

You need to create a database in order to use the app.

### Create .env file

Create a `.env` file with the following content:

```
APP_ENV=local
APP_KEY=base64:ir2CqjChvxV0tkGYRBfSXgAIsNZc0JLsKiH4IlhRkiA=
APP_DEBUG=true
APP_LOG_LEVEL=debug

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

ALGOLIA_APP_ID=
ALGOLIA_SECRET=
```

`ALGOLIA_APP_ID`, and `ALGOLIA_SECRET` can be found in the Algolia Dashboard after creating an account.
`DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` need to be filled as well with your database credentials

### Set up the db

```
php artisan migrate
```

```
php artisan db:seed
```

### Index the speakers into Algolia

```
php artisan scout:import "App\Speaker"
```

## Run

### Compile javascript on save

```
npm run watch
```

### Run the laravel app

You can use 

```
php artisan serve
```

or any other way like Laravel Valet.
