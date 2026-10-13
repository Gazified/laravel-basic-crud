# Laravel Product CRUD with Authentication

A product CRUD application built with Laravel and Laravel Breeze authentication.

## Features

- User registration, login, logout, password reset, email verification, and profile management
- List products
- Create products
- Edit products
- Delete products
- Authenticated access to product CRUD operations
- Feature tests for authentication and product CRUD operations

## Requirements

- PHP 8.2 or later
- Composer
- Node.js and npm

## Installation

```bash
git clone https://github.com/your-username/laravel-product-crud.git
cd laravel-product-crud
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

Register an account or log in, then select **Manage products** from the dashboard.

## Testing

```bash
php artisan test
```

The local `.env` file and SQLite database are intentionally excluded from version control. Use `.env.example` as the configuration template.
