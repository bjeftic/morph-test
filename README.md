# Morph
Morph test

# About

This is PHP API created in Laravel 8. This system can be used to manage Library database. Currently, we only have two entities (Author and Book models) but can be added a lot more...

# How to use
* Clone the repository with git clone
* Rename .env.example file to .env and set user credentials for Database
* Create database with DDL code provided in Database section
* Open terminal
* Run ```composer install```
* Run ```php artisan key:generate```
* Run ```php artisan migrate --seed``` (it has some seeded data for your testing)
* Run ```php artisan serve --port=8000```
* Open browser and go to ```http://127.0.0.1:8000/```

# Database

DDL code for creating database named morph_test:

```CREATE SCHEMA `morph_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; ```

# Available Http methods
You can get list of available urls by running command ``` php artisan route:list ```

![image](https://user-images.githubusercontent.com/25004798/132738634-db887135-51cd-4628-9716-9403c1c5154a.png)





# Testing
You can run ``` php artisan test ``` to run test

I have created three methods to test Author:

```get all authors```
```get random author```
```delete author```


![image](https://user-images.githubusercontent.com/25004798/132735998-2f8b60a4-3395-4cc1-a7ca-2e44ad221742.png)


