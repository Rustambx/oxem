**1. Авторизация пользователя и получение токена**<br>
**Url:** oxem.loc/api/signin
<br>**Request-type:** POST
<br>**Body:**
```json  
{
    "email" : "email пользователя",
    "password" : "password пользователя"
}
```
**Response-type:** json
<br>**Response:**
```json 
{
    "acces_token" : "auth_token",
    "token_type" : "bearer",
    "expires_in" : 3600
}
```
**2. Регистрация пользователя**<br>
**Url:** oxem.loc/api/signup
<br>**Request-type:** POST
<br>**Body:**
```json  
{
    "name" : "Имя пользователя",
    "email" : "email пользователя",
    "password" : "password пользователя",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "status" : "Пользователь успешно зарегистрирован"
}
```
**3. Получения списка всех категорий**<br>
**Url:** oxem.loc/api/user/profile
<br>**Request-type:** GET
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "Список категорий"
}
```
**4. Добавления категорий**<br>
**Url:** oxem.loc/api/category/create
<br>**Request-type:** POST
<br>**Header:** authorization = bearer auth_token
<br>**Body:**
```json  
{
    "name" : "Название",
    "parent_id" : "ID родительской категории",
    "external_id" : "External ID",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "ID Категорий"
}
```
**5. Редактирования категорий**<br>
**Url:** oxem.loc/api/category/update
<br>**Request-type:** POST
<br>**Header:** authorization = bearer auth_token
<br>**Body:**
```json  
{
    "id" : "ID Категорий",
    "name" : "Название",
    "parent_id" : "ID родительской категории",
    "external_id" : "External ID",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "ID Категорий"
}
```
**6. Удаление категорий**<br>
**Url:** oxem.loc/api/category/delete
<br>**Request-type:** POST
<br>**Header:** authorization = bearer auth_token
<br>**Body:**
```json  
{
    "id" : "ID Категорий",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "Категория удалена"
}
```
**7. Получения списка товаров**<br>
**Url:** oxem.loc/api/products/list
<br>**Request-type:** POST
<br>**Body:**
```json  
{
    "price" : "Сортировка (asc, desc)",
    "created_at" : "Сортировка (asc, desc)",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "Список товаров"
}
```
**8. Получение списка товаров в конкретной категории**<br>
**Url:** oxem.loc/api/category/products
<br>**Request-type:** POST
<br>**Body:**
```json  
{
    "name" : "Название категорий",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "Список товаров в конкретной категории"
}
```
**9. Получения конкретного товара**<br>
**Url:** oxem.loc/api/product/show
<br>**Request-type:** POST
<br>**Body:**
```json  
{
    "name" : "Название товара",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "Информация о товаре"
}
```
**10. Добавления товара**<br>
**Url:** oxem.loc/api/product/create
<br>**Request-type:** POST
<br>**Header:** authorization = bearer auth_token
<br>**Body:**
```json  
{
    "name" : "Название",
    "description" : "Описание",
    "price" : "Цена",
    "remaining" : "Остаток товара на складе",
    "external_id" : "External ID",
    "categories" : "ID Категорий",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "ID товара"
}
```
**11. Удаления товара**<br>
**Url:** oxem.loc/api/product/delete
<br>**Request-type:** POST
<br>**Header:** authorization = bearer auth_token
<br>**Body:**
```json  
{
    "id" : "ID Товара",
}
```
<br>**Response-type:** json
<br>**Response:** 
```json 
{
    "success" : "true"
    "payload" : "Продукт удален"
}
```
