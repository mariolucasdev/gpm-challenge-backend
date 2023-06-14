<h1 align="center"> 
    GPM Challenge

</h1>

<div align="center">
    <img src="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=main" alt="main">
    <img src="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=develop" alt="develop">
</div>

# Api Endoints

## **Marcas**

| Método | Endpoint   | Parâmetros | Descrição              | Retorno |
| ------ | ---------- | ---------- | ---------------------- | ------- |
| `GET`  | api/brands | ---        | Busca lista de marcas. | 200     |

## _GET - api/brands_

```javascript
// Headers
// Content-Type: application/json
// Accept: application/json

// Retorno
{
    "data": [
        {
            "id": 1,
            "name": "Electrolux"
        },
        {...},
        {...}
    ]
}
```

## **Eletrodomésticos**

| Método   | Endpoint          | Parâmetros                                   | Descrição                         | Status          |
| -------- | ----------------- | -------------------------------------------- | --------------------------------- | --------------- |
| `POST`   | api/appliance     | name, description, eletric_tension, brand_id | Busca lista de marcas.            | 201 or 422      |
| `GET`    | api/appliance     | ------                                       | Listagem de Eletrodomésticos.     | 200             |
| `GET`    | api/appliance/:id | ------                                       | Exibir 1 eletrodoméstico pelo id. | 200 ou 404      |
| `PUT`    | api/appliance/:id | name, description, eletric_tension, brand_id | Editar eletrodoméstico.           | 200, 404 or 422 |
| `DELETE` | api/appliance/:id | ------                                       | Excluir um Eletrodomésticos.      | 200 ou 404      |

## _POST - api/appliance_

```javascript
// Headers
// Content-Type: application/json
// Accept: application/json

// Envio
{
	"name" : "Geladeira Frost Free",
	"description": "Produto versátil.",
	"eletric_tension" : "220v",
	"brand_id" : 1
}

// Retorno
{
	"name": "Geladeira Frost Free",
	"description": "Produto versátil.",
	"eletric_tension": "220v",
	"brand_id": 1,
	"updated_at": "2023-06-14T01:17:33.000000Z",
	"created_at": "2023-06-14T01:17:33.000000Z",
	"id": 8
}
```

## _GET - api/appliance_

```javascript
// Headers
// Accept: application/json

// Retorno
[
    {
        "id": 1,
        "name": "Geladeira Frost Free",
        "description": "Produto versátil.",
        "eletric_tension": "220v",
        "brand_id": 1,
        "created_at": "2023-06-14T00:59:21.000000Z",
        "updated_at": "2023-06-14T00:59:21.000000Z"
    },
    {...},
    {...}
]
```

## _GET - api/appliance/:id_

```javascript
// Headers
// Accept: application/json

// Retorno
{
	"id": 30,
	"name": "Geladeira Frost Free",
	"description": "Produto versátil.",
	"eletric_tension": "220v",
	"brand_id": 1,
	"created_at": "2023-06-14T03:14:03.000000Z",
	"updated_at": "2023-06-14T03:14:03.000000Z"
}
```

## _PUT - api/appliance/:id_

```javascript
// Headers
// Content-Type: application/json
// Accept: application/json

// Envio
{
	"name" : "Cooktop",
	"description": "05 bocas.",
	"eletric_tension" : "110v",
	"brand_id" : 1
}

// Retorno
{
	"name": "Cooktop",
	"description": "05 bocas.",
	"eletric_tension": "110v",
	"brand_id": 1,
	"updated_at": "2023-06-14T01:17:33.000000Z",
	"created_at": "2023-06-14T01:17:33.000000Z",
	"id": 8
}
```
