# GETTING STARTED
    
Install node dependencies

    npm install

then install PHP dependencies

    composer install

then create the .env file from .env.example

    cp .env.example .env

Link your database and run

    php artisan migrate:fresh --seed

then generate the Laravel Application key

    php artisan key:generate

and then run

    php artisan serve
