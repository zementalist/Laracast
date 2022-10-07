# Laracast
Laravel 9 Project (Blog) from my course on YouTube "https://www.youtube.com/watch?v=MYyJ4PuL4pY" {Arabic} Laravel 9 Full Course


![laracast](https://user-images.githubusercontent.com/50156227/194515497-2949ddc0-0ac0-4127-8f32-07802d93da82.png)

# 
How to Run
Clone project
```
git clone https://github.com/zementalist/Laracast
```

1- Go to the folder application using cd command on your cmd or terminal.
2- Run ``` composer install ``` on your cmd or terminal.
3- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or ```cp .env.example .env``` if using terminal, Ubuntu.
4- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
5- Generate App Key
```php artisan key:generate ```
6- Migrate Database
```php artisan migrate```
8- Run
```php artisan serve```
9- Go to http://localhost:8000/

