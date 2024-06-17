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

## criar usuário e banco de dados com postgresql banco de dados

### Passo 1: Acesse o shell do PostgreSQL

Primeiro, acesse o shell do PostgreSQL como o usuário administrador (postgres):

```
sudo -i -u postgres
psql
```

### Passo 2: Crie o usuário

Crie um novo usuário, por exemplo, api_main e senha 12345678 (recomendável trocar a senha):

```
CREATE USER api_main WITH PASSWORD '12345678';
```

### Passo 3: Crie o banco de dados

Se você ainda não tem um banco de dados, crie um. Por exemplo, honda_database:

```
CREATE DATABASE honda_database;
```

### Passo 4: Conceda permissões no banco de dados

Agora, conceda todas as permissões no banco de dados honda_database ao usuário api_main:

```
GRANT ALL PRIVILEGES ON DATABASE honda_database TO api_main;
```

### Passo 5: Conceda permissões em todas as tabelas existentes

Conceda todas as permissões em todas as tabelas do banco de dados honda_database:

```
\c honda_database
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO api_main;
```

### Passo 6: Conceda permissões em todas as sequências existentes

Conceda permissões para as sequências (SERIAL):

```
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO api_main;
```

### Passo 7: Configure permissões para novas tabelas e sequências automaticamente

Para garantir que futuras tabelas e sequências criadas no banco de dados também tenham permissões apropriadas para api_main, altere o esquema public para incluir permissões padrão:

```
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON TABLES TO api_main;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON SEQUENCES TO api_main;
```



    
