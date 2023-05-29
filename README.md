
## Simple Inventory System

Basic Inventory system for demo purposes, you can clone this and improve for your own use.

Modules:
- Accountabilities
- User groups (not applied yet)
- Users
- Departments
- Employees
- Suppliers
- Items
- Stocks

## Requirements
- PHP 8.1^
- Composer 2.5^
- Webserver (XAMPP)
- RDBMS (MySQL, MariaDB, Postgres, & SQL Server)

## Installation
- Install composer:

```
composer install
```

- copy '.env.example' then create new  '.env '
- create database in IDE of a Database
- Run key generate

```
php artisan key:generate
```

- Add migrations & seeders

```
php artisan migrate --seed
```

- Run locally:

```
php artisan serve
```

## Login Credential

username: admin
password: pogi

site: http://localhost:8000/login

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

