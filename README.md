# E-commerce-site

A small PHP + MySQL e-commerce demo built for local development (XAMPP). It includes basic product listing, an admin panel (product management), and a registration form. The project uses plain PHP (no framework), MySQL, and vanilla CSS. Recent updates added a glassmorphism visual theme and subtle UI animations.

## Features

- Product cards (images, description, price)
- Responsive navigation
- User registration (with password hashing)
- Admin UI for managing products (basic CRUD pages)
- Glassmorphism UI styling (cards, forms, admin header/sidebar)
- Accessibility and performance fallbacks (reduced-motion & backdrop-filter fallbacks)

## Tech stack

- PHP 7.x / 8.x
- MySQL (MariaDB via XAMPP)
- HTML, CSS
- No external server-side frameworks

## File / folder overview

```
index.php
style.css
images/
home/
  └─ register.php
admin/
  ├─ admin_style.css
  └─ update_product.php
database/
  └─ create_tables.php   (helper script - may exist or you can run SQL directly)
README.md
```

Note: paths above reflect the project root `c:\xampp\htdocs\e-comm-project`.

## Quick setup (Windows + XAMPP)

1. Install XAMPP and start Apache and MySQL from the XAMPP Control Panel.
2. Place the project folder inside `C:\xampp\htdocs` (already in that location in this repo).
3. Create the database (two options):

  A) Use the included setup script (recommended for quick setup):

     - Open a browser and visit:

       http://localhost/e-comm-project/database/create_tables.php

     - The script will create a `users` table (and other helper objects if included).

  B) Or create the DB manually via phpMyAdmin (http://localhost/phpmyadmin):

     - Create a database named `php_e-comm`.
     - Run a SQL statement to create the `users` table (example below).

Example users table SQL:

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

4. Open the site in your browser:

   http://localhost/e-comm-project/index.php

   Admin pages (if available) will be under `http://localhost/e-comm-project/admin/`.

## Registration flow

- The registration form (`home/register.php`) submits to itself via POST.
- Inputs are sanitized and the password is stored hashed using `password_hash()`.
- If a table is missing you may see errors; use the create_tables script or the SQL above to create the table.

## CSS / Styling notes

- `style.css` contains the main site styles, including product cards and the registration form.
- `admin/admin_style.css` contains admin UI styles for the sidebar, header and tables.
- Glassmorphism: recent updates add `backdrop-filter` blur, semi-transparent backgrounds and subtle borders to create a "frosted glass" effect. Fallbacks are included for browsers that do not support `backdrop-filter` and for users who prefer reduced motion/transparency.
- Animations: subtle entrance animations, hover translations, and focus transitions were added to improve UX. These respect `prefers-reduced-motion`.

## Security notes

- Passwords are hashed with `password_hash()`.
- Input sanitization is applied with `mysqli_real_escape_string()` in examples, but you should use prepared statements (PDO or MySQLi prepared statements) to prevent SQL injection in production.
- Database credentials are stored in plain text in PHP files — for production, move configuration to environment variables or a protected config file outside the webroot.

## Troubleshooting

- "Table 'php_e-comm.users' doesn't exist": create the table with the script above or run `database/create_tables.php` in the browser.
- Blank pages / PHP errors: enable error reporting during development (see the top of `home/register.php`) or check Apache's error log (`C:\xampp\apache\logs\error.log`).
- CSS not updating: perform a hard refresh (Ctrl+F5) or clear your browser cache.

## Recommended next steps

- Replace string-built SQL with prepared statements (PDO or MySQLi prepared statements).
- Add server-side validation and client-side validation for better UX and security.
- Add pagination and better product storage (images with uploads, unique filenames).
- Add authentication for the admin panel and protect admin routes with sessions.
- Improve responsive layout for very small screens.

## Contributing

This repo is a simple demo. If you want to extend it:

1. Fork / clone the repo
2. Implement features in a feature branch
3. Test locally with XAMPP

## License

MIT — feel free to use and adapt for educational projects.
