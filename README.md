<h1 align="center"> GPM Challenge </h1>

<div align="center">
    <a href="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=main">
        <img src="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=main" alt="CI main">
    </a>
    <a href="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=develop">
        <img src="https://github.com/mariolucasdev/gpm-challenge-backend/actions/workflows/laravel.yml/badge.svg?branch=develop" alt="CI develop">
    </a>
</div>

## Api Endoints

## Brands

| Método | Endpoint   | Parâmetros | Descrição              | Retorno |
| ------ | ---------- | ---------- | ---------------------- | ------- |
| `GET`  | api/brands | ---        | Busca lista de marcas. | 200     |

### GET - api/brands

```json
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
        ...
    ]
}
```

## Home Appliances

| Método | Endpoint      | Parâmetros                                   | Descrição              | Status     |
| ------ | ------------- | -------------------------------------------- | ---------------------- | ---------- |
| `POST` | api/appliance | name, description, eletric_tension, brand_id | Busca lista de marcas. | 201 or 422 |

### POST - api/appliance

```json
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
