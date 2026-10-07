# Laravel Product CRUD

A basic product CRUD application built with Laravel.

## Features

- List products
- Create products
- Edit products
- Delete products
- Feature tests for product CRUD operations

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

## Testing

```bash
php artisan test
```

The local `.env` file and SQLite database are intentionally excluded from version control. Use `.env.example` as the configuration template.
