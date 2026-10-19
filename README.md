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

## Mailtrap password-reset testing

The application is configured to use SMTP in `.env.example` for Mailtrap Email
Testing. To enable it locally:

1. Create a Mailtrap account and an Email Testing inbox.
2. Open the inbox's SMTP credentials and copy its Laravel or SMTP credentials.
3. Put the credentials in your local `.env` file:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

4. Clear the cached configuration:

```bash
php artisan config:clear
```

5. Open `/forgot-password`, submit a registered email address, and inspect the
   message in the Mailtrap inbox.

Keep the Mailtrap username and password only in `.env`; never commit them.

## Testing

```bash
php artisan test
```

The local `.env` file and SQLite database are intentionally excluded from version control. Use `.env.example` as the configuration template.
