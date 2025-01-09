# API Platform Demo for Laravel 11

Welcome to the **API Platform Demo** for Laravel 11! This project demonstrates how to utilize Laravel's API capabilities effectively, while leveraging Docker, database seeding, and optimization commands to maintain a seamless development experience. Additionally, it includes email notifications upon specific actions, visible through the Mailpit service.

---

## Description

This application is a Laravel-based setup designed to showcase API development. It features database migrations and seeding, email notifications on entity changes, and optimization commands. It uses Laravel Sail (Docker-based solution) to ease local development.

---

## Steps to Set Up and Run the Project

### 1. Install Dependencies (Docker Alternative to Local `PHP` Installation)
To install all necessary PHP dependencies using Docker, run the following command:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

---

### 2. Start Docker Services
After installing the dependencies, use the following command to start Laravel Sail services in detached mode (so they run in the background):

```bash
./vendor/bin/sail up -d
```

This will start all required services (like the web server, database, and Mailpit).

---

### 3. Seeding the Database
Ensure the database is seeded with sample data by running the following command:

```bash
./vendor/bin/sail artisan db:seed
```

This will populate the database with the required test data to get started.

---

### 4. Email Notifications (Mailpit Integration)
- **When a book is created or deleted**, an email will be sent as a notification.
- To view these emails, the application is integrated with the **Mailpit service**, which acts as a local email testing server.
- Once Sail is running, open Mailpit at [http://localhost:8025](http://localhost:8025) in your browser to see the email notifications.

---

### 5. Clearing Cache for Changes
If your application changes are not visible, you may need to clear the cache. Use the command below to optimize and clear application caches:

```bash
./vendor/bin/sail artisan optimize:clear
```

This ensures that configuration, route, and application caches are reset.

---

## Additional Notes

- This project is powered by **Laravel Sail** for seamless development with Docker.
- Database credentials can be configured in **`.env`** file if needed.
- Refer to the [Laravel Documentation](https://laravel.com/docs) for more advanced features and guides.

---

Enjoy exploring and building with Laravel 11!
