# Mini.fy
This project is based on Laravel framework and allows guests and registered users to generate minified urls


## Requirements:
- Composer
- NPM
- PHP 7.1 or higher
- MySql

## Project Setup Instructions

- Download or clone the project
- Install dependencies using **npm install**
- Then run **composer install**
- Rename .env-example to .env and update your app name and database credentials
- Run **php artisan migrate** to create tables
- Add mini.fy to your hosts file if you wish to run the project as it is
- /config/minifyurl.php contains the config for minifying urls. Change the prefix to match your localhost url
- Generate a new key using **php artisan key:generate**

## License

[MIT license](https://opensource.org/licenses/MIT).