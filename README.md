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
   - Select that database, choose **Import**, select this project's `database\sheights.sql` file, then import it.
4. Create the shop's database user: in phpMyAdmin, open the **SQL** tab (at server level, not inside a database), paste the contents of `database\setup_db.sql`, and run it. This creates the user `shop`, which may only read and change rows in `sheights`.
5. Check the connection settings in `config.php` (project root). By default the shop connects to `sheights` on `localhost` as user `shop` with password `shop_dev_pw`. If you change the password in `setup_db.sql`, change it in `config.php` too.
6. Open `http://localhost/Project/home.php` in your browser. If you used a different folder name under `htdocs`, replace `Project` in the URL with that folder name.

## Other local setups

You can use another PHP-capable web server and MySQL/MariaDB installation instead of XAMPP. Point the web server's document root at the project directory, run `database/setup_db.sql` as the database root user, import `database/sheights.sql` into the `sheights` database, and adjust `config.php` if your host, user, or password differ. Ensure PHP has both MySQL extensions enabled.

On a server, keep the `database/` folder outside the web root so the SQL files cannot be downloaded.

## Project map

- `config.php` — database connection settings, used by every page
- `home.php` — storefront homepage
- `products.php`, `category.php` — product browsing
- `member_login.php`, `Register.php`, `registrtion.php` — customer login and registration
- `cart.php`, `wishlist_cart.php`, `checkout.php` — cart and checkout
- `header\` — shared storefront header
- `dashboard\` — admin panel (admins, members, products, orders)
- `database\` — `sheights.sql` (schema and sample data) and `setup_db.sql` (database user)
- `dashboard\instruments_img\`, `images\`, `css\` — product images, site images, and styles

## Notes

- The site expects the database to be named exactly `sheights`.
- Product image values are resolved from `dashboard\instruments_img\`; ensure referenced image files are present there.
- The shop never loads anything from the internet (fonts and icons are served locally), so it also works on an isolated network.
- This project is a deliberately vulnerable training target for the SUASecLab. Do not deploy it on a public server.
