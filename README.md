# Rental API

This is a Laravel-based Rental API.

## Installation

### 1. Clone the repository

```sh
git clone <repo_url>
cd rental-api
```

### 2. Install dependencies

```sh
composer install
```

### 3. Setup Environment

Copy the `.env.example` file and update the database credentials:

```sh
cp .env.example .env
```

Update the `.env` file:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run Migrations

```sh
php artisan migrate
```

### 5. Seed the Database

```sh
php artisan db:seed
```

seed example product data:

```sh
php artisan db:seed --class=ProductSeeder
```

## API Routes
### Base URL

```
http://localhost:8000/api/v1/
```

### Endpoints
To find available endpoints. Run this command:
```sh
php artisan route:list
```
## Testing the API

### Using Postman or cURL

You can test the API using Postman or cURL.

#### Example: Get All Products

```sh
curl --location 'localhost:8000/api/v1/products' \
--header 'accept: application/json'
```

### Running PHPUnit Tests

```sh
php artisan test
```

## License

This project is licensed under the MIT License.

