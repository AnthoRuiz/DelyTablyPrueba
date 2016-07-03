## Prueba Dely Tably

(https://google.com)

Aplicación de Prueba de la empresa Dely Tably,

Esta apliacaión esta realizada con el lenguaje PHP bajo el framework Laravel en su version 5.1

## Documentación de los Servicios

### Datos de la cuenta con perfil Moderador
Correo: anthony@ejemplo.com
clave: 19525295

Los servicios están protegidos por el siguiente api-key: 32m$2y$10$48Fq6EoB1fmM71P3lcdDKOIJgIBuNR0OytD7iNQLxRCYkY8P4/wMy
por consiguiente se deben agregar en el Headers ejemplo:

Headers
key = api-key
value = 32m$2y$10$48Fq6EoB1fmM71P3lcdDKOIJgIBuNR0OytD7iNQLxRCYkY8P4/wMy

##USUARIOS

 Verbo         |  URL        |  Función
 --------------|-------------|-------------------------------------
 GET           | /api/users  |  obtiene la lista de los Usuarios
 POST          | /api/users  |  crea un Usuario
 PUT           | /api/users  |  actualiza un Usuario
 DELETE        | /api/users  |  elimina un Usuario



### Obtener la lista de los Usuarios

Ejemplo de solicitud:

GET   /api/users

Ejemplo del cuerpo de respuesta:
Status: OK
Content-Type: application/json

```
{
  "data": [
    {
      "id": 1,
      "name": "anthony",
      "email": "anthony@ejemplo.com",
      "role_id": 1,
      "created_at": {
        "date": "2016-07-01 01:00:55.000000",
        "timezone_type": 3,
        "timezone": "UTC"
      }
    },
    {
      "id": 10,
      "name": "michelle",
      "email": "michelle@ejemplo.com",
      "role_id": 2,
      "created_at": {
        "date": "2016-07-03 06:27:15.000000",
        "timezone_type": 3,
        "timezone": "UTC"
      }
    }
  ],
  "meta": {
    "pagination": {
      "total": 2,
      "count": 2,
      "per_page": 10,
      "current_page": 1,
      "total_pages": 1,
      "links": []
    }
  }
}
```

### Crear un nuevo Usuario

Ejemplo de solicitud:

POST   /api/users

Content-Type :  application/json

Cuerpo de la solicitud:

```
{
    "name": "alberto",
    "email": "alberto@ejemplo.com",
    "password": "123456789"
}
```

#### Nota: Los Usuarios creados desde el servicio se crearan con rol "lector"

ejemplo del cuerpo de la respuesta:
Status: OK 200
Content-Type: application/json

```
{
  "data": {
    "id": 11,
    "name": "alberto",
    "email": "alberto@ejemplo.com",
    "role_id": 2,
    "created_at": {
      "date": "2016-07-03 08:02:54.000000",
      "timezone_type": 3,
      "timezone": "UTC"
    }
  }
}
```

### Actualizar un Usuario

Ejemplo de solicitud:

PUT   /api/users

Content-Type:   application/json

cuerpo de la solicitud:

```
{
  "name": "alberto alejandro",
  "email": "alberto@ejemplo.com",
  "password":"1234x567"
}
```

Ejemplo del cuerpo de la respuesta:
Status: OK 200
Content-Type: application/json
```
{
  "data": {
    "id": 11,
    "name": "alberto alejandro",
    "email": "alberto@ejemplo.com",
    "role_id": 2,
    "created_at": {
      "date": "2016-07-03 08:02:54.000000",
      "timezone_type": 3,
      "timezone": "UTC"
    }
  }
}
```

### Eliminar un Usuario

Ejemplo de solicitud:

DELETE   /api/users

Content-Type:   application/json

cuerpo de la solicitud:

```
{
  "email": "alberto@ejemplo.com"
}
```


ejemplo del cuerpo de la respuesta:
Status: OK
Content-Type: application/json

{
  "message": "Deleted",
  "status": "200"
}


##CONTENIDOS (POSTS)

 Verbo         |  URL           |  Función
 --------------|----------------|-------------------------------------
 GET           | /api/contents  |  obtiene la lista de los Contenidos
 POST          | /api/contents  |  crea un Contenido
 PUT           | /api/contents  |  actualiza un Contenido
 DELETE        | /api/contents  |  elimina un Contenido



### Obtener la lista de los Contenidos

Ejemplo de solicitud:

GET   /api/contents

Ejemplo del cuerpo de respuesta:
Status: OK
Content-Type: application/json

```
{
  "data": [
    {
      "id": 2,
      "title": "Belleza",
      "description": "tutoriales de belleza",
      "publishing_date": "2016-06-30 00:00:00",
      "exp_date": "2016-09-30 00:00:00",
      "authorEmail": "anthony@ejemplo.com",
      "category": "MUJER"
    },
    {
      "id": 3,
      "title": "Dia de campo",
      "description": "Que hacer en un dia de campo",
      "publishing_date": "2016-06-30 00:00:00",
      "exp_date": "2016-10-30 00:00:00",
      "authorEmail": "anthony@ejemplo.com",
      "category": "FAMILIAR"
    }
  ],
  "meta": {
    "pagination": {
      "total": 2,
      "count": 2,
      "per_page": 10,
      "current_page": 1,
      "total_pages": 1,
      "links": []
    }
  }
}
```

### Crear un nuevo Contenido

Ejemplo de solicitud:

POST   /api/contents

Content-Type :  application/json

Cuerpo de la solicitud:

```
{
    "title": "creado del api",
    "description": "esto fue creado desde el api",
    "publishing_date": "2016/07/03",
    "exp_date": "2016/08/03",
    "authorEmail": "anthony@ejemplo.com",
    "category": "FAMILIAR"
}
```

ejemplo del cuerpo de la respuesta:
Status: OK 200
Content-Type: application/json

```
{
  "data": {
    "id": 15,
    "title": "creado del api",
    "description": "esto fue creado desde el api",
    "publishing_date": {
      "date": "2016-07-03 00:00:00.000000",
      "timezone_type": 3,
      "timezone": "UTC"
    },
    "exp_date": {
      "date": "2016-08-03 00:00:00.000000",
      "timezone_type": 3,
      "timezone": "UTC"
    },
    "authorEmail": "anthony@ejemplo.com",
    "category": "FAMILIAR"
  }
}
```

### Actualizar un Contenido

Ejemplo de solicitud:

PUT   /api/contents

Content-Type:   application/json

cuerpo de la solicitud:

```
{
"id": 2,
"title": "Update del Api",
"description": "esto fue creado desde el api",
"exp_date": "2016/08/03",
"authorEmail": "anthony@ejemplo.com",
"category": "FAMILIAR"
}
```

Ejemplo del cuerpo de la respuesta:
Status: OK 200
Content-Type: application/json
```
{
  "data": {
    "id": 2,
    "title": "Update del Api",
    "description": "esto fue creado desde el api",
    "publishing_date": "2016-06-30 00:00:00",
    "exp_date": "2016/08/03",
    "authorEmail": "anthony@ejemplo.com",
    "category": "FAMILIAR"
  }
}
```

### Eliminar un Usuario

Ejemplo de solicitud:

DELETE   /api/contents

Content-Type:   application/json

cuerpo de la solicitud:

```
{
  "id": 2
}
```


ejemplo del cuerpo de la respuesta:
Status: OK
Content-Type: application/json

{
  "message": "Deleted",
  "status": "200"
}

