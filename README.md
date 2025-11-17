# E-commerce-site

A mini PHP + MySQL e-commerce demo built for local development (XAMPP). It includes basic product listing, an admin panel (product management), and a registration form. The project uses plain PHP (no framework), MySQL, and vanilla CSS. Recent updates added a pleasant visual theme and subtle UI animations.

## Features

- Product cards (images, description, price)
- Responsive navigation
- User registration (with password hashing)
- Admin UI for managing products (basic CRUD pages)
- Pleasant UI styling (cards, forms, admin header/sidebar)
- Accessibility and performance fallbacks (reduced-motion & backdrop-filter fallbacks)

## Tech stack

- PHP 8
- MySQL (via XAMPP)
- HTML, CSS

Paths reflect the project root: `c:\xampp\htdocs\e-comm-project`.

## Quick setup (Windows + XAMPP)

1. Install XAMPP and start Apache and MySQL from the XAMPP Control Panel.
2. Place the project folder inside `C:\xampp\htdocs` (this repo should already be there).
3. Create the database and tables (via phpMyAdmin or MySQL CLI):

   - Create a database named `php_e-comm`.
   - Create the required tables (examples below). This project no longer creates tables automatically, so run the SQL yourself.

### Example users table SQL

```sql
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  address TEXT,
  usertype VARCHAR(10) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Example contacts table SQL (for `contact.php`)

```sql
CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(50),
  subject VARCHAR(255),
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Open the site in your browser:

   http://localhost/e-comm-project/index.php

   Admin pages (if available) are under `http://localhost/e-comm-project/admin/`.

## Contact page behavior

- `contact.php` validates and sanitizes input and stores submissions in the `contacts` table using a prepared statement.
- The script intentionally does not send email; storing messages in the DB is the default behavior. If you later want email notifications, integrate PHPMailer or similar with SMTP credentials.

## Styling notes

- `style.css` contains the main site styling, including glassmorphism utilities and animation keyframes.
- `admin/admin_style.css` contains styles for the admin sidebar and header, updated to match the glass aesthetic.
- The UI uses `backdrop-filter` (and `-webkit-backdrop-filter`) for the frosted-glass look. There are fallbacks for browsers that don't support it and for users who prefer reduced transparency/motion.

## Security notes

- Passwords in the registration flow are hashed using `password_hash()`.
- Server-side sanitization and prepared statements are used in key places, but some legacy code may still use string-built SQL — convert those to prepared statements before production.
- Database credentials live in PHP files for local development; in production, move them to environment variables or a config file outside webroot.

## Troubleshooting

- If you see errors about missing tables, create `users` and `contacts` using the SQL snippets above via phpMyAdmin or the MySQL CLI.
- Blank pages or PHP errors: enable error reporting during development (see the top of `home/register.php`) or check Apache's error log at `C:\xampp\apache\logs\error.log`.
- CSS not updating: clear your browser cache or perform a hard refresh (Ctrl+F5).

## Contributing

1. Fork or clone the repo.
2. Create a feature branch, implement changes, and test locally (XAMPP).
3. Open a pull request describing your changes.

