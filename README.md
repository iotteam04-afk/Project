# sHeights Music Store

sHeights is a PHP-based music-instrument store backed by a MySQL/MariaDB database. This guide describes a local development setup.

## Requirements

- PHP with the `pdo_mysql` and `mysqli` extensions enabled
- MySQL or MariaDB
- A local web server, such as Apache (included with XAMPP)
- A browser

On Windows, XAMPP is a straightforward way to install Apache, PHP, and MariaDB together.

## Setup with XAMPP on Windows

1. Install and open XAMPP. Start **Apache** and **MySQL**.
2. Put the project in XAMPP's web root, usually `C:\xampp\htdocs`.
   - **Recommended (Git):** Open PowerShell and run:
     ```powershell
     cd C:\xampp\htdocs or wherever your xampp folder is located
     git clone https://github.com/iotteam04-afk/Project.git
     ```
     This creates `C:\xampp\htdocs\Project`. If Git is not installed, install Git for Windows first. If the repository is private, GitHub will ask you to authenticate.
   - **Without Git:** Copy the project folder into `C:\xampp\htdocs` and make sure the PHP files (including `home.php`) are directly inside `C:\xampp\htdocs\Project`, not in an extra nested `Project` folder.
3. Create the database:
   - Open `http://localhost/phpmyadmin`.
   - Create a database named `sheights`.
   - Select that database, choose **Import**, select this project's `sheights.sql` file, then import it.
4. Check the database connection settings in both `dashboard\config.php` and `dashboard\dbconfig.php`. They currently expect MySQL on `localhost`, database `sheights`, username `root`, and an empty password. Update both files if your local MySQL credentials differ.
5. Open `http://localhost/Project/home.php` in your browser. If you used a different folder name under `htdocs`, replace `Project` in the URL with that folder name.

## Other local setups

You can use another PHP-capable web server and MySQL/MariaDB installation instead of XAMPP. Point the web server's document root at the project directory, create the `sheights` database, import `sheights.sql`, and update both connection files with your database host, name, username, and password. Ensure PHP has both MySQL extensions enabled.

## Project map

- `home.php` — storefront homepage
- `products.php`, `category.php`, `guitars.php`, `violins.php`, `percussion.php` — product browsing
- `member_login.php`, `Register.php` — customer login and registration pages
- `cart.php`, `checkout.php` — cart and checkout
- `dashboard\` and `admin_page\` — admin-related pages and assets
- `sheights.sql` — database schema and sample data
- `instruments_img\`, `images\`, `css\` — product images, site images, and styles

## Notes

- The site expects the database to be named exactly `sheights`.
- Product image values are resolved from `dashboard\instruments_img\`; ensure referenced image files are present there.
- The repository contains two admin-related directories and more than one database connection file. Keep their database settings in sync when changing credentials.
- This project appears intended for local/demo use. Review authentication, input handling, and database security before deploying it to a public server.
