# Sistema de Crud laravel com Ajax

é uma sistema de crud que utilizando os laravel na versão 10 e o jquery


## Requisitos
`PHP 8.1`
`COMPOSER`
`MYSQL`
### Clone do repositorio
```
  https://github.com/TalissonSouzaDev/api_crud_laravel
```
### Clone do env.example
```
  cp env.example .env
```

### instalar o vendor 
```
  composer install
```
### Configurar variavel de ambiente
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=er_sistema_crud
DB_USERNAME=root
DB_PASSWORD=
```

### Criar um chave Key
```
php artisan gerenate:key
```

### subir as tabelas
```
php artisan migrate
```
### Rodar o projeto
```
php artisan server
```

## Documentação da API

#### Retorna um item

```http
  GET /api/ersistemas/{id}
```

#### Criar um item

```http
  POST /api/ersistemas/create
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string` |  O nome  que você quer |
| `phone`      | `string` | O telefone/whatsapp que você quer |
| `phone2`      | `string` | O telefone  que você quer |
| `cpf`      | `string` |  O cpf do item que você quer |
| `cep`      | `string` |  O cep você quer |
| `opcao`      | `string` | O opções(Facebook,Instagram) do item que você quer |

#### Atualizar um item

```http
  PUT /api/ersistemas/update/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string` |  O nome  que você quer |
| `phone`      | `string` | O telefone/whatsapp que você quer |
| `phone2`      | `string` | O telefone  que você quer |
| `cpf`      | `string` |  O cpf do item que você quer |
| `cep`      | `string` |  O cep você quer |
| `opcao`      | `string` | O opções(Facebook,Instagram) do item que você quer |

#### Deleta um item

```http
  DELETE /api/ersistemas/delete/{id}
```


