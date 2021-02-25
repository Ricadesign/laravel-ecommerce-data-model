# laravel-ecommerce-data-model
Laravel migrations, models and Nova resources for the creation of an ecommerce site

## Installation
Begin by pulling in the package through Composer.

```bash
composer require ricadesign/laravel-ecommerce-data-model
```

## Publishing everything
```bash
php artisan vendor:publish --tag=ricadesign/laravel-ecommerce-data-model
```

Add fields to create_features_table migration. Edit other migrations as needed before running them.

## Using seeders
If needed, call the following seeders from your main seeder. Make sure to add the relationships below on your User model before doing so:
```bash
$this->call([
    CategorySeeder::class,
    ProductSeeder::class,
    OrderSeeder::class,
]);
```

```bash
public function addresses()
{
    return $this->hasMany(Address::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}
```
