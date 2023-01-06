
## Instalation

Requirements:
```
composer
docker
docker-compose
```

Project structure:

- apps (apps folder)
    - ms-kitchen (lumen app)
    - ms-market (lumen app)
    - ms-warehouse (lumen app)
    - restaurant (laravel app)
- docker (config files)
Install dependencies in the projects:
```
composer install
```

Create environment file (.env copy of .env.example) for all projects

App 'restaurant' generate app key:

```
php artisan key:gen
```

In Apps 'ms-kitchen', 'ms-market', 'ms-warehouse' edit .env with mysql connection data (see docker config for connection data):

Add a (.env) in 'ms-market'
```
SERVICE_BASE_URL=https://recruitment.alegra.com
```
Add a (.env) in 'ms-warehouse'
```
SERVICE_BASE_URL=http://market.restaurant.local
```
Add a (.env) in 'ms-kitchen'
```
SERVICE_BASE_URL=http://warehouse.restaurant.local
```
Add a (.env) in 'restaurant'
```
WAREHOUSE_SERVICE_BASE_URL=http://warehouse.restaurant.local
KITCHEN_SERVICE_BASE_URL=http://kitchen.restaurant.local
MARKET_SERVICE_BASE_URL=http://market.restaurant.local
```
Edit the team's hosts file and add:

```
127.0.0.1 restaurant.local
127.0.0.1 warehouse.restaurant.local
127.0.0.1 kitchen.restaurant.local
127.0.0.1 market.restaurant.local
```

Build and start docker:
```
docker-compose build && docker-compose up -d 
```

Run migrations and/or seeders in the projects:
```
php artisan migrate
php artisan db:seed 
```

Open: http://restaurant.local

