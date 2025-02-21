# Информация о проекте

#### Это тестовое задание для MPFIT на позицию Программист PHP.

#### Используемые технологии:
- PHP 8.2
- Laravel 9


# Описание задачи

## <a href="https://docs.google.com/document/d/1AS9WeZz6Ak9eS5u2UtrRUGcJs1TKskcpH7faURtSaZY">Тестовое задание для программиста PHP</a>

Цель задания: Создать веб-приложение с использованием фреймворка Laravel (https://laravel.com/docs/9.x), которое включает управление товарами и заказами. HTML-верстка не оценивается.

### Функционал приложения:

#### 1 Управление товарами:
- Добавление, редактирование, удаление и просмотр товаров.
- Просмотр списка товаров с сокращенной информацией (например, название, цена, категория).
- Просмотр полной информации о товаре.

#### 2 Управление заказами:
Добавление заказа с возможностью добавления одного наименования товара в количестве 1 штуки или больше.

##### Заказ должен содержать:
- ФИО покупателя (обязательное поле)
- Дату создания (обязательное поле)
- Статус заказа (новый или выполнен; по умолчанию новый).
- Комментарий покупателя

##### Просмотр списка заказов с отображением:
- Номера заказа (ID)
- Даты создания
- ФИО покупателя
- Статуса заказа
- Итоговой цены.

Просмотр заказа (с полной информацией о заказе) с возможностью изменить статус на "выполнен" через кнопку.

#### 3 Категории для товаров:

Создание миграции для таблицы categories, которая должна содержать следующую информацию:
- ID (первичный ключ)
- Название (строка)

Создайте с помощью миграции таблицу categories и заполните ее следующими данными: легкий, хрупкий, тяжелый.

### Связи между таблицами:

Товары должны быть привязаны к категориям (один ко многим).
В заказе может быть только один товар (одно наименование) (один ко многим).

### Требования к товарам:

Каждый товар должен иметь:
- Название (обязательное поле)
- Категорию (товар должен быть обязательно привязан к одной категории)
- Описание
- Цена (валюта - рубли, копейки должны учитываться) (обязательное поле).

### Функциональные требования:

Обеспечьте возможность управления товарами и заказами через веб-интерфейс.
Используйте валидацию данных при создании/редактировании.
