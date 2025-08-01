# Laravel Products

## Baza Mysql

```sql
-- Tabele
CREATE DATABASE IF NOT EXISTS dev_products CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE DATABASE IF NOT EXISTS dev_products_testing CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Nie wymagane do testu
GRANT ALL PRIVILEGES ON *.* TO root@localhost IDENTIFIED BY 'toor' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO root@127.0.0.1 IDENTIFIED BY 'toor' WITH GRANT OPTION;
```

