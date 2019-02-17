# HOW TO INSTALL:
1) clone repo
2) install composer (check https://getcomposer.org/ and, once installed, don't forget to add php to your $PATH variable)
3) Create an empty database (mysql, psql)
4) Go to repo, open .env and set your DB access and location:
    ```sh
	DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=login
    DB_PASSWORD=password
    ```
5) Inside the repo do: 
    ```sh
	$ composer install
	$ composer require laravel/passport
	$ php artisan passport:install
	$ php artisan migrate:fresh --seed
    ```
    This will install all dependencies, migrate the database and feed its **records** and **users** tables with fake data.
    
# HOW TO USE:
To run the server do:
```sh
$ php artisan serve
```

Once the app set up and the server is running, you will want to register a user with custom password and email:
```sh
$ curl -X POST -H 'Content-Type: application/json' -i http://localhost:8000/api/register --data '{"email": "email","password": "pwd","c_password": "pwd","name": "user Name"}'
```

To get your API key (with the login/password previously registered):
```sh
curl -X POST -H 'Content-Type: application/json' -i http://localhost:8000/api/login --data '{"email": "email","password": "pwd"}'
```

To get records (you will need an api key for this, only 5 records available):
```sh
curl -X GET -H 'Authorization: Bearer YourAPIKey' -i http://localhost:8000/api/records/1
```

To get all records:
```sh
curl -X GET -H -i http://localhost:8000/api/records
```
