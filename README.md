# Installation:

Clone the project from git repository:

`git clone ...`

Install dependencies:

`composer install`

Copy ".env.example" to ".env" file:

`cp .env.example .env`

Start docker file:

`docker-compose build`
`docker-compose up -d`

Generate new application security token:

`php artisan key:generate`

Server: `localhost:8876`



