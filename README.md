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

7) Installing GRAPHQL dependencies:
    ```sh
    $ composer require webonyx/graphql-php
    $ composer require rebing/graphql-laravel
    $ php artisan vendor:publish --provider="Rebing\GraphQL\GraphQLServiceProvider"
    ```
# HOW TO RUN:
To run the server do:
```sh
$ php artisan serve
```

# USING REST ENDPOINTS
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

# USING GRAPHQL ENDPOINTS:
To get users through a GraphQL query:
```sh
    GET to localhost:8000/graphl with input:
    query FetchUsers {
        users {
            id
            email
        }
    }
```

To update a user password through a GraphQL mutation:
```sh
    GET to localhost:8000/graphl with input:
    mutation users {
        updateUserPassword(id: "1", password: "newpassword") {
            id
            email
        }
    }
```

# UNIT TESTS:
To run unit tests, from the project directory:
```sh
$ ./vendor/bin/phpunit
```
