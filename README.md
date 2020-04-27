<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# ToDo List API

> Laravel 7.8.1 API that uses the API resources. This is an API for a todo list CRUD app

## Quick Start

``` bash
# Install Dependencies
composer install

# Run Migrations
php artisan migrate

# Local Testing
Run  bash  php -S localhost:8081. The port to use is up to you

# If you get an error about an encryption key
php artisan key:generate
```

## Webservice Endpoints

### List all todos for a user
``` bash
GET api/todo
```
### Get single todo
``` bash
GET api/todo/{id}
```

### Delete a todo
``` bash
DELETE api/todo/{id}
```

### Add new todo
``` bash
POST api/todo
{name: "Buy Milk", completed: false, deleted: false, todo_id: 23tufb}
```

### Update todo
``` bash
PUT api/todo
{name: "Buy Milk", completed: true, deleted: true, todo_id: 23tufb}
```


```

## App Info

### Author

Tevin Morake
[Tevin Morake Linkedin Profile](https://www.linkedin.com/in/tevin-morake-56980a103/)

### Version

1.0.0

### License

This project is licensed under the MIT License