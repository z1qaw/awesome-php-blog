# My awesome PHP blog

## About (EN)

Just my simple PHP blog engine that I'm writing based on my increasing PHP skills.

## Current features

- Post creation with category pick (only directly from phpMyAdmin) and read
- Categories creation (only directly from phpMyAdmin) and read
- Specific category posts read

## TODO (EN)

- CRUD for all models (Session, User, Post, PostComment, Category)
- Translation based on User system language and his pick on settings page
- Session auth based on https://developer.mozilla.org/en-US/docs/Web/HTTP/Session paper. (Automatic session creation for anonimous users too)
- Users login and register implementation with hashed password store in DB.
- Admin panel for admin users
- Automatic DB migrations

---

## О проекте (RU)

Мой простой блог на PHP, который я пишу по мере увеличения моих знаний в PHP.

## Возможности

- Создание поста с выбором категории (пока только через БД) и его чтение
- Создание категорий (пока только через БД) и их просмотр
- Просмотр постов в отдельной категории

## TODO (EN)

- CRUD для всех моделей (Session, User, Post, PostComment, Category)
- Возможность перевода, основываясь на системном языке пользователя и его выбора на странице настроек
- Реализация сессий, основываясь на статье https://developer.mozilla.org/ru/docs/Web/HTTP/Session
- Автоматическое создание сессий для анонимных пользователей
- Реализация входа и регистрации с хранением хешированных паролей в БД.
- Панель администратора для пользователей с правами админа
- Автоматические миграции для новых БД
