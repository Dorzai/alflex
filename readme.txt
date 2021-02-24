-----
Setup
-----

- Install PHP >= 7.2 on your system
- Install mysql/mariaDb/SQLite (or another one)
- Install composer

- Create database with the name: alflex_assessment
- Copy .env.example and rename to .env
- Configure .env to setup the connection to your database
- Run 'composer install'
- Run 'php artisan migrate --seed' (or 'migrate:fresh --seed' when database tables are already created)

- Start PHP's built in web server (or use your own web server): 'php artisan serve --port=8010'
- Check if the homepage is working
