# HOW TO INSTALL:
1) clone repo
2) install composer
3) Go to repo, open .env and set your DB access
3) Inside the repo do: 
    ```sh
	$ composer install
	$ composer require laravel/passport
	$ php artisan passport:install
	$ php artisan migrate:fresh --seed
    ```

# HOW TO USE:
To run the server do:
```sh
$ php artisan serve
```

Once the app set up, you will want to register a user:
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