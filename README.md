<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ОБЩЕЕ ОПИСАНИЕ ПРОЕКТА

API для каталога товаров. Приложение содержит:
•	Категории товаров
•	Конкретные товары, которые принадлежат к какой-то категории (один товар может принадлежать нескольким категориям)
•	Пользователей, которые могут авторизоваться
Возможные действия:
•	Получение списка всех категорий, 
•	Получение списка товаров в конкретной категории,
•	Авторизация пользователей
•	Добавление/Редактирование/Удаление категории (для авторизованных пользователей)
•	Добавление/Редактирование/Удаление товара (для авторизованных пользователей)
ИНСТРУКЦИЯ ЗАПУСКА ПРОЕКТА

Склонируйте проект в директорию с сервером 
•	git clone https://github.com/Normawka/Api.catalog.git

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру:
•	DB_CONNECTION=mysql
•	DB_HOST=127.0.0.1
•	DB_PORT=3306
•	DB_DATABASE=backendTest
•	DB_USERNAME=root
•	DB_PASSWORD= root
В открытой консоли директории проекта введите команду для генерации таблиц базы данных:
•	php artisan migrate
В той же консоли для запуска сайта по адресу http://localhost:8000 введите команду:
•	php artisan serve
Далее нам потребуется Postman.
Список адресов:
Метод POST, URL:http://localhost:8000/api/register регистрация пользователя
Метод POST, URL:http://localhost:8000/api/login Авторизация  пользователя
Метод GET, URL:http://localhost:8000/api/categories выведет все категории.
Метод GET, URL:http://localhost:8000/api/categories /{id} выведет определенную категорию.
