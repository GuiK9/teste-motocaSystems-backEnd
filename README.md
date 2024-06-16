## Requisitos
 * PHP 8.3 ou superior 
 * Postgressql 14 ou superior 
 * Composer

 ## Como rodar o projeto

 Duplicar o arquivo ".env.example" e renomear para ".env".
 Alterar no arquivo .env as credenciais do banco de dados

 Instalar as dependencias do PHP
 ```
 composer install
 ```

 Gerar a chave no arquivo .env
 ```
 php artisan key:generate
 ```

 Executar as migration
 ```
 php artisan migrate
 ```
 
  Executar as seeds
 ```
 php artisan db:seed
 ```

 ## Sequencia para criar o projeto

 Criar o projeto com laravel
 ```
 composer create-project laravel/laravel .
 ```

Alterar no arquivo .env as credenciais do banco de dados

Criar o arquivo de rotas para a API
```
php artisan install:api
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Para acessar a API, é recomendado utilizar o Postman para simular requisições à API.
```
http://127.0.0.1:8000/api/users
```

Criar a seed 
```
php artisan make:seeder NomeDaSeeder
php artisan make:seeder UserSeeder
```

Executar as seeds
```
php artisan db:seed
```





