<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Offer project [CRUD]</h1>
    <br>
</p>

## УСТАНОВКА

### ТРЕБОВАНИЯ

PHP 7.2
MySql 8.0
Composer

### СЕРВЕР

Для тестирования (локально):
OpenServer 5.4.3 +
Apache 2.4 (PHP 7.2 - 7.4)
MySql 8.0
Порты по умолчанию, домен должен вести в папку "web" - index.php

### КЛОНИРОВАНИЕ РЕПОЗИТОРИЯ 

1. Скопируйте URL репозитория с GitHub.
2. Откройте терминал и выполните команду:

   ```bash
   git clone https://github.com/Yan-Bolmelcer/offer_app.git
   cd ваш_репозиторий
   ```

### УСТАНОВКА ЗАВИСИМОСТЕЙ

```bash
composer install
```

### БАЗА ДАННЫХ

Отредактируйте файл `config/db.php` с реальными данными, например:

```php
return [
'class' => 'yii\db\Connection',
'dsn' => 'mysql:host=localhost;dbname=offer_crm',
'username' => 'root',
'password' => '1234',
'charset' => 'utf8',
];
```

**ПРИМЕЧАНИЕ:**

- Yii не создаст базу данных за вас, это нужно сделать вручную, прежде чем вы сможете получить к ней доступ. Для этого можно воспользоваться phpMyAdmin и с помощью SQL запросов создать БД и заполнить тестовыми данными. Пример:

Создание БД:

```sql
CREATE DATABASE offer_crm;
USE offer_crm;
```

Создание таблицы offers:

```sql
CREATE TABLE offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    offer_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Заполнение таблицы тестовыми данными:

```sql
INSERT INTO offers (name, email, phone) VALUES
('Offer 1', 'rep1@example.com', '1234567890'),
('Offer 2', 'rep2@example.com', '2345678901'),
('Offer 3', 'rep3@example.com', '3456789012'),
('Offer 4', 'rep4@example.com', '4567890123'),
('Offer 5', 'rep5@example.com', '5678901234'),
('Offer 6', 'rep6@example.com', '6789012345'),
('Offer 7', 'rep7@example.com', '7890123456'),
('Offer 8', 'rep8@example.com', '8901234567'),
('Offer 9', 'rep9@example.com', '9012345678'),
('Offer 10', 'rep10@example.com', '0123456789'),
('Offer 11', 'rep11@example.com', '1112345670'),
('Offer 12', 'rep12@example.com', '2223456781'),
('Offer 13', 'rep13@example.com', '3334567892'),
('Offer 14', 'rep14@example.com', '4445678903'),
('Offer 15', 'rep15@example.com', '5556789014');

```

- В корне проекта будет помещен файл для импорта БД (offer_crm.sql)

### ЗАПУСК

Запуск производится любым удобным способом.

- Через OpenServer
- ```bash
  php yii serve
  ```
