# Library System Management

run docker-compose as database

```
docker-compose up -d
```

change .env

```
DB_CONNECTION=mysql
DB_HOST=11.1.2.10
DB_PORT=3306
DB_DATABASE=library-db
DB_USERNAME=root
DB_PASSWORD=secret
```

install package

```
composer install
```

run artisan

```
php artisan key:generate
php artisan migrate
```