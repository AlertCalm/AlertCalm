# 🚀 AlertCalm API

## 📌 Descripción
AlertCalm es una API para la gestión de alertas y usuarios en una plataforma de emergencias.

## Índice

- [Introducción](#introducción)
- [Base URL](#base-url)
- [Endpoints](#endpoints)
- [Errores Comunes](#errores-comunes)
- [Autenticación](#autenticación)
- [Testeo con Thunder Client](#testeo-con-thunder-client)

---

## Introducción

Esta es la documentación para la API de AlertCalm. Esta API permite interactuar con el sistema a través de peticiones HTTP y soporta operaciones de lectura y escritura.

---

## Base URL

La base URL para todas las peticiones es: http://127.0.0.1:8000/api/

## Endpoints




*************************************ALERTAS*******************************************

### 1. `GET /alertas`

**Descripción:** Obtiene la lista de alertas registradas en el sistema.

- **Método:** GET
- **URL:** `/alertas`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Alertas encontradas",
  "data": [
    {
      "id": 1,
      "titulo": "Tempestad eléctrica inminente.",
      "descripcion": "Se ha detectado una fuerte tormenta eléctrica con ráfagas de viento y posible granizo. Se recomienda tomar precauciones.",
      "tipo": "tormenta",
      "localizacion": {
        "lat": 40.712776,
        "lng": -74.005974
      },
      "peligro": "media",
      "created_at": "2025-02-12T10:34:20.000000Z",
      "updated_at": "2025-02-12T10:34:20.000000Z"
    },
    {
      "id": 5,
      "titulo": "Calor extremo en el bosque",
      "descripcion": "Un incendio forestal se ha iniciado en el norte.",
      "tipo": "incendio",
      "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
      },
      "peligro": "alta",
      "created_at": "2025-02-12T10:56:36.000000Z",
      "updated_at": "2025-02-12T10:57:10.000000Z"
    }
  ]
}
```

### 1. `POST /alertas`

**Descripción:** Crea una nueva alerta en el sistema.
**Método:** POST
- **URL:** `/alertas`
- **Parámetros:** 
```json
{
    "titulo": "Calor extremo en el bosque",
    "descripcion": "Un incendio forestal se ha iniciado en el norte.",
    "tipo": "incendio",
    "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
    },
    "peligro": "baja"
}
```

- **Respuesta Exitosa (201 Created):** 
```json
{
    "success": "Alerta creado con éxito",
    "data": {
        "titulo": "Calor extremo en el bosque",
        "descripcion": "Un incendio forestal se ha iniciado en el norte.",
        "tipo": "incendio",
        "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
        },
        "peligro": "baja",
        "updated_at": "2025-02-12T10:49:07.000000Z",
        "created_at": "2025-02-12T10:49:07.000000Z",
        "id": 4
    }
}
```

### 1. `GET /alertas/{id}`

**Descripción:** Encuentra la alerta según su id.
**Método:** GET
- **URL:** `/alertas/{id}`
- **Parámetros:** id de la alerta a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
    "success": "Alerta encontrada",
    "data": {
        "id": 1,
        "titulo": "Tempestad eléctrica inminente.",
        "descripcion": "Se ha detectado una fuerte tormenta eléctrica con ráfagas de viento y posible granizo. Se recomienda tomar precauciones.",
        "tipo": "tormenta",
        "localizacion": {
        "lat": 40.712776,
        "lng": -74.005974
        },
        "peligro": "media",
        "created_at": "2025-02-12T10:34:20.000000Z",
        "updated_at": "2025-02-12T10:34:20.000000Z"
    }
}
```


### 1. `DELETE /alertas/{id}`

**Descripción:** Elimina la alerta encontrado por su id.
**Método:** DELETE
- **URL:** `/alertas/{id}`
- **Parámetros:** id alerta a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
    "success": "Alerta eliminada.",
    "data": {
        "id": 3,
        "titulo": "Calor extremo en el bosque",
        "descripcion": "Un incendio forestal se ha iniciado en el norte.",
        "tipo": "incendio",
        "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
        },
        "peligro": "baja",
        "created_at": "2025-02-12T10:37:56.000000Z",
        "updated_at": "2025-02-12T10:43:08.000000Z"
    }
}
```

### 1. `PUT /alertas/{id}`

**Descripción:** Actualiza la alerta encontrado por el id.

 - **Método:** PUT
- **URL:** `/alertas/{id}`
- **Parámetros:** id de la alerta a actualizar
```json
{
    "titulo": "Calor extremo en el bosque",
    "descripcion": "Un incendio forestal se ha iniciado en el norte.",
    "tipo": "incendio",
    "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
    },
    "peligro": "alta"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
    "success": "Alerta encontrada",
    "data": {
        "id": 5,
        "titulo": "Calor extremo en el bosque",
        "descripcion": "Un incendio forestal se ha iniciado en el norte.",
        "tipo": "incendio",
        "localizacion": {
        "lat": 78.076033,
        "lng": 177.821238
        },
        "peligro": "alta",
        "created_at": "2025-02-12T10:56:36.000000Z",
        "updated_at": "2025-02-12T10:57:10.000000Z"
    }
}
```



----------------------------------------------------------------------------------------------

*************************************GATEGORÍAS*******************************************

*************************************FAVORITOS*******************************************

*************************************MEDITATIONS*******************************************

*************************************MUSICA*******************************************

*************************************NOTIFICACIONES*******************************************

*************************************PREMIUM*******************************************

*************************************SESION*******************************************

*************************************USERS*******************************************