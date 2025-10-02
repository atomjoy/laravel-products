# Laravel Product Variants

Product variants in an e-commerce store with Laravel (products, skus, attributes, properties, images).

## Baza Mysql

```sql
-- Tabels
CREATE DATABASE IF NOT EXISTS dev_products CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE DATABASE IF NOT EXISTS dev_products_testing CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Optional
GRANT ALL PRIVILEGES ON *.* TO root@localhost IDENTIFIED BY 'toor' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO root@127.0.0.1 IDENTIFIED BY 'toor' WITH GRANT OPTION;
```

## Run

```sh
php artisan migrate:fresh --seed

php artisan serve

http://127.0.0.1:8000/shop/1
```
