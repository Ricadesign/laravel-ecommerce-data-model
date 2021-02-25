# laravel-ecommerce-data-model
Laravel migrations, models and Nova resources for the creation of an ecommerce site

## Installation
Begin by pulling in the package through Composer.

```bash
composer require ricadesign/laravel-ecommerce-data-model
```

## Publishing everything
```bash
php artisan vendor:publish --tag=ecommerce-data-model
```

Add fields to create_features_table migration. Edit other migrations as needed before running them.

## Using seeders
If needed, add the following seeders to your main seeder:
```bash
CategorySeeder::class,
ProductSeeder::class,
OrderSeeder::class,
```
