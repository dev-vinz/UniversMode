# HOW TO Laravel

## Table of contents

-   [HOW TO Laravel](#how-to-laravel)
    -   [Table of contents](#table-of-contents)
    -   [Prerequisites](#prerequisites)
    -   [First installation](#first-installation)
    -   [The project structure](#the-project-structure)
    -   [The MVC pattern](#the-mvc-pattern)
    -   [The Blade templating engine](#the-blade-templating-engine)
    -   [The database](#the-database)
    -   [The commands](#the-commands)
        -   [NPM pre-configured commands](#npm-pre-configured-commands)
        -   [Artisan commands](#artisan-commands)
        -   [NPM commands](#npm-commands)
        -   [Composer commands](#composer-commands)
    -   [Steps after each pull request](#steps-after-each-pull-request)

## Prerequisites

-   PHP v8.2
-   Composer v2.7
-   Node v22.6
-   NPM v10.8

## First installation

1. Clone the repository
2. Run `npm install`
3. Run `composer install`
4. Run `cp .env.example .env`, then edit the `.env` file and set
    1. `DB_CONNECTION`
    2. `SESSION_DRIVER` to `database`, with setting `SESSION_CONNECTION`
5. Run `php artisan key:generate`

## The project structure

-   `app/` - contains the application logic, such as controllers and models
-   `bootstrap/` - contains the application bootstrapping
-   `config/` - contains the configuration files
-   `database/` - contains the database migrations and seeds
-   `node_modules/` - contains the Node.js dependencies
-   `public/` - contains the public files, such as images, CSS, and JavaScript
-   `resources/` - contains the views and assets, as well as compiled CSS and JavaScript
-   `routes/` - contains the routes of the application
-   `storage/` - contains the logs, cache, and sessions
-   `tests/` - contains the tests
-   `vendor/` - contains the Composer dependencies

## The MVC pattern

The Laravel framework follows the MVC pattern, which stands for Model-View-Controller. The Model is responsible for the data, the View is responsible for the presentation, and the Controller is responsible for the logic.

## The Blade templating engine

Laravel uses the Blade templating engine, which is a lightweight templating engine that allows you to write clean and readable code. Blade provides a set of directives that allow you to write PHP code in your views.

## The database

The database use a system of migrations and seeds. Migrations are used to create and modify the database schema, while seeds are used to populate the database with initial data. The migrations, once they are created, **<u>mustn't be modified</u>**, but you can create new migrations to modify the schema.

## The commands

### NPM pre-configured commands

-   `npm run clear` - clears the cache
-   `npm run db:update` - updates the database schema by running the migrations
-   `npm run db:refresh` - resets the database by dropping all tables and running the migrations, then runs the seeds
-   `npm run db:deploy` - "deploys" the application by optimizing the routes, the configuration, and the views in the cache
-   `npm run log` - displays the logs
-   `npm run start` - starts the development server

### Artisan commands

-   `php artisan make:controller <NameController>` - creates a new controller
    ```bash
    php artisan make:controller UserController
    ```
-   `php artisan make:model <Name>` - creates a new model
    ```bash
    php artisan make:model User
    ```
-   `php artisan make:view <Folder.Name>` - creates a new view
    ```bash
    php artisan make:view user.index
    ```
-   `php artisan make:migration <Description>` - creates a new migration
    ```bash
    php artisan make:migration create_users_table
    ```
-   `php artisan migrate` - runs the pending migrations

### NPM commands

-   `npm install` - installs the dependencies
-   `npm update` - updates the dependencies

### Composer commands

-   `composer install` - installs the dependencies
-   `composer update` - updates the dependencies

## Steps after each pull request

1. Run `npm install` if the `package.json` file has been modified
2. Run `composer install` if the `composer.json` file has been modified
3. Run `npm run db:update`
