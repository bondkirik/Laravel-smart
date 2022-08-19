# Installation:

Clone the project from git repository:

`git clone ...`

Install dependencies:

`composer install`
`npm install`

Copy ".env.example" to ".env" file:

`cp .env.example .env`

Start docker file:

`docker-compose build`
`docker-compose up -d`

Generate new application security token:

`php artisan key:generate`

Run database migrations:
`docker exec -it project_app bash`
`php artisan migrate`

Seed the database:
`docker exec -it project_app bash`
`php artisan db:seed`

Server: `localhost:8876`

Admin:
email `admin@gmail.com`
password `Qwerty_1`

Shop where user can buy service

Admin can add,edit,remove categories and service
Admin have all orders.

users can register or place your order without registration
if user register user have self orders


