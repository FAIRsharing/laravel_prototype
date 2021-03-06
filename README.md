# HOW TO INSTALL:
1) clone repo
2) install composer (check https://getcomposer.org/)
3) Create an empty database (mysql, psql)
4) Run your database server
5) Go to repo, open .env and set your DB access and location:
    ```sh
	DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=login
    DB_PASSWORD=password
    ```
6) Inside the repo do: 
    ```sh
	$ composer install
	$ composer require laravel/passport
	$ php artisan migrate:fresh --seed
	$ php artisan passport:install	
    ```
    This will install all dependencies, migrate the database and feed its **records** and **users** tables with fake data.
    
# HOW TO USE:
To run the server do:
```sh
$ php artisan serve
```

To get all records:
```sh
$ curl -X GET -H -i http://localhost:8000/api/records
```

Once the app set up and the server is running, you will want to register a user with custom password and email:
```sh
$ curl -X POST -H 'Content-Type: application/json' -i http://localhost:8000/api/register --data '{"email": "email","password": "pwd","c_password": "pwd","name": "user Name"}'
```

To get your API key (with the login/password previously registered):
```sh
$ curl -X POST -H 'Content-Type: application/json' -i http://localhost:8000/api/login --data '{"email": "email","password": "pwd"}'
```

To get a specific record (you will need an api key for this, only 5 records available) using its ID:
```sh
$ curl -X GET -H 'Authorization: Bearer YourAPIKey' -i http://localhost:8000/api/records/1
```

To run unit tests, from the project directory:
```sh
$ ./vendor/bin/phpunit
```
