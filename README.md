# Laracast
Laravel 9 Project (Blog) from my course on YouTube "https://www.youtube.com/watch?v=MYyJ4PuL4pY" {Arabic} Laravel 9 Full Course


![laracast](https://user-images.githubusercontent.com/50156227/194515497-2949ddc0-0ac0-4127-8f32-07802d93da82.png)

# How to Run

#Clone project
```
git clone https://github.com/zementalist/Laracast
```

# Install Packages 
``` composer install ```

# Setup Environment
Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or ```cp .env.example .env``` if using terminal, Ubuntu.

# Set DB username and password
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

# Generate App Key
```php artisan key:generate ```
# Migrate Database
```php artisan migrate```
# Run
```php artisan serve```
# Go to http://localhost:8000/

