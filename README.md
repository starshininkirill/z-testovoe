# 🧾 Тестовое задание «Зебра»

Сервис позволяет:
- Создавать тендера через API;
- Получать список тендеров с фильтрацией по названию и дате;
- Получать данные конкретного тендера;
- Авторизоваться через Laravel Sanctum;
- Просматривать документацию API через Swagger (OpenAPI);
- Импортировать данные из CSV-файла в базу данных.

## 🔧 Стек технологий

| Компонент | Версия |
|----------|--------|
| PHP      | 8.2    |
| Laravel  | 11     |
| MySQL    | 8.0    |
| Laravel Sanctum | 3.x |
| Swagger (l5-swagger) | ^8.5 |
| API | RESTful |

## ✅ Выполненные требования

- [x] Создание тендера через `POST /tenders`
- [x] Получение списка тендеров через `GET /tenders` с фильтрацией (`name`, `date`)
- [x] Получение конкретного тендера через `GET /tenders/{id}`
- [x] Заполнение БД из файла `test_task_data.csv`

## ✅ Дополнительные требования

- [x] Авторизация через Laravel Sanctum
- [x] Документация через Swagger
- [x] Обработка ошибок и валидации
- [x] Фильтрация и пагинация
- [x] Кастомные фильтры через Query Builder
- [x] Регистрация и вход пользователей

## 📦 Установка и запуск

### 1. Клонируй репозиторий:

```bash
git clone https://github.com/starshininkirill/z-testovoe/tree/main
```

### 2. Установи зависимости:

```bash
composer install
```

### 3. Настрой .env файл

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Отредактируй подключение к БД в .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

### 5. Выполни миграции и засей данные

```bash
php artisan migrate:fresh --seed
```

### 6. Запусти сервер

```bash
php artisan serve
```

## 🔧 Основные маршуры

http://localhost:8000/api/documentation

## 📬 Связь

https://t.me/kirill256
