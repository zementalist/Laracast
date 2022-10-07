# Laracast
Laravel 9 Project (Blog) from my course on YouTube <a href="https://www.youtube.com/watch?v=MYyJ4PuL4pY">{Arabic} Laravel 9 Full Course</a>


![laracast](https://user-images.githubusercontent.com/50156227/194515497-2949ddc0-0ac0-4127-8f32-07802d93da82.png)

<h1>How to Run</h1>
<ol>
<li>Clone project<br>
```
git clone https://github.com/zementalist/Laracast
```
</li>
<li>Go to the folder application using cd command on your cmd or terminal</li>
<li>Run ``` composer install ``` on your cmd or terminal</li>
<li>Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or ```cp .env.example .env``` if using terminal, Ubuntu</li>
<li>Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.</li>
<li>Generate App Key <br> ```php artisan key:generate ```</li>
<li>Migrate Database <br> ```php artisan migrate```</li>
<li>RUn <br> ```php artisan serve```</li>
<li>Go to http://localhost:8000/</li>
<ol>
