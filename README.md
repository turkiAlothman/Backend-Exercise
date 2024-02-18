

## versions

- php version: php8.1
- laravel version: 10.44.0

## drivers

- sqlite -> sudo apt-get install php8-sqlite

### deployment script

- php createDatabase.php -> (required) create testing and production sqlite databases
- php artisan migrate -> (required) apply database changes
- php artisan db:seed -> (optional) insert 20 rows of Properties(fake date) 
