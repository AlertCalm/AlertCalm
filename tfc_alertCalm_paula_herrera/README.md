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

### 1. `GET /categorias`

**Descripción:** Obtiene la lista de categorias registradas en el sistema.

- **Método:** GET
- **URL:** `/categorias`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Categorias encontradas",
  "data": [
    {
      "id": 6,
      "nombreCategoria": "Relajación",
      "descripcion": "Categoría enfocada en contenido para relajación.",
      "imagenCategoria": "ruta/a/imagen_relajacion.jpg",
      "created_at": "2025-02-15T16:12:30.000000Z",
      "updated_at": "2025-02-15T16:12:30.000000Z"
    },
    {
      "id": 7,
      "nombreCategoria": "Ansiedad",
      "descripcion": "Contenido dirigido a ayudar con la ansiedad.",
      "imagenCategoria": "ruta/a/imagen_ansiedad.jpg",
      "created_at": "2025-02-15T16:12:30.000000Z",
      "updated_at": "2025-02-15T16:12:30.000000Z"
    }
  ]
}
```

### 1. `POST /categorias`

**Descripción:** Crea una nueva categoria en el sistema.
**Método:** POST
- **URL:** `/categorias`
- **Parámetros:** 
```json
{
    "nombreCategoria": "Dormir",
    "descripcion": "Categoría enfocada en contenido para dormirse.",
    "imagenCategoria": "ruta/a/imagen_dormir.jpg"
}
```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Categoria creado con éxito",
  "data": {
    "nombreCategoria": "Dormir",
    "descripcion": "Categoría enfocada en contenido para dormirse.",
    "imagenCategoria": "ruta/a/imagen_dormir.jpg",
    "updated_at": "2025-02-15T16:14:22.000000Z",
    "created_at": "2025-02-15T16:14:22.000000Z",
    "id": 9
  }
}
```

### 1. `GET /categorias/{id}`

**Descripción:** Encuentra la categoria según su id.
**Método:** GET
- **URL:** `/categorias/{id}`
- **Parámetros:** id de la categoria a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Categoria encontrada",
  "data": {
    "id": 8,
    "nombreCategoria": "Mindfulness",
    "descripcion": "Categoría enfocada en la práctica del mindfulness.",
    "imagenCategoria": "ruta/a/imagen_mindfulness.jpg",
    "created_at": "2025-02-15T16:12:30.000000Z",
    "updated_at": "2025-02-15T16:12:30.000000Z"
  }
}
```


### 1. `DELETE /categorias/{id}`

**Descripción:** Elimina la categoria encontrado por su id.
**Método:** DELETE
- **URL:** `/categorias/{id}`
- **Parámetros:** id categoria a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Categoria eliminada.",
  "data": {
    "id": 9,
    "nombreCategoria": "Dormir actualizado",
    "descripcion": "Categoría enfocada en contenido para dormirse.",
    "imagenCategoria": "ruta/a/imagen_dormir.jpg",
    "created_at": "2025-02-15T16:14:22.000000Z",
    "updated_at": "2025-02-15T16:15:12.000000Z"
  }
}
```

### 1. `PUT /categorias/{id}`

**Descripción:** Actualiza la categoria encontrado por el id.

 - **Método:** PUT
- **URL:** `/categorias/{id}`
- **Parámetros:** id de la categoria a actualizar
```json
{
  "nombreCategoria": "Dormir actualizado",
  "descripcion": "Categoría enfocada en contenido para dormirse.",
  "imagenCategoria": "ruta/a/imagen_dormir.jpg"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Categoría actualizada",
  "data": {
    "id": 9,
    "nombreCategoria": "Dormir actualizado",
    "descripcion": "Categoría enfocada en contenido para dormirse.",
    "imagenCategoria": "ruta/a/imagen_dormir.jpg",
    "created_at": "2025-02-15T16:14:22.000000Z",
    "updated_at": "2025-02-15T16:15:12.000000Z"
  }
}
```


*************************************FAVORITOS*******************************************

### 1. `GET /favoritos`

**Descripción:** Obtiene la lista de favoritos registrados en el sistema.

- **Método:** GET
- **URL:** `/favoritos`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Favoritos encontrados",
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "tipo_fav": "meditation",
      "item_id": 4,
      "created_at": "2025-02-15T16:32:02.000000Z",
      "updated_at": "2025-02-15T16:32:02.000000Z"
    },
    {
      "id": 2,
      "user_id": 1,
      "tipo_fav": "music",
      "item_id": 6,
      "created_at": "2025-02-15T16:32:02.000000Z",
      "updated_at": "2025-02-15T16:32:02.000000Z"
    }
  ]
}
```

### 1. `POST /favoritos`

**Descripción:** Crea un nuevo favorito en el sistema.
**Método:** POST
- **URL:** `/favoritos`
- **Parámetros:** 
```json

```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /favoritos/{id}`

**Descripción:** Encuentra el favorito según su id.
**Método:** GET
- **URL:** `/favoritos/{id}`
- **Parámetros:** id del favorito a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Favoritos encontrados",
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "tipo_fav": "meditation",
      "item_id": 4,
      "created_at": "2025-02-15T16:32:02.000000Z",
      "updated_at": "2025-02-15T16:32:02.000000Z",
      "user": {
        "id": 1,
        "username": "lang.ruth",
        "email": "bosco.leanne@example.net",
        "localizacion": "Parisianview",
        "edad": 33,
        "preferencias": "Quas earum maxime ad ad ipsa. Velit quia et eveniet aut quia ut. Magni iure maiores reiciendis facere ipsam labore. Porro accusamus sed veritatis rerum eveniet eius consectetur.",
        "lenguaje": "es",
        "created_at": "2025-02-15T16:26:32.000000Z",
        "updated_at": "2025-02-15T16:26:32.000000Z"
      }
    },
    {
      "id": 2,
      "user_id": 1,
      "tipo_fav": "music",
      "item_id": 6,
      "created_at": "2025-02-15T16:32:02.000000Z",
      "updated_at": "2025-02-15T16:32:02.000000Z",
      "user": {
        "id": 1,
        "username": "lang.ruth",
        "email": "bosco.leanne@example.net",
        "localizacion": "Parisianview",
        "edad": 33,
        "preferencias": "Quas earum maxime ad ad ipsa. Velit quia et eveniet aut quia ut. Magni iure maiores reiciendis facere ipsam labore. Porro accusamus sed veritatis rerum eveniet eius consectetur.",
        "lenguaje": "es",
        "created_at": "2025-02-15T16:26:32.000000Z",
        "updated_at": "2025-02-15T16:26:32.000000Z"
      }
    }
  ]
}
```


### 1. `DELETE /favoritos/{id}`

**Descripción:** Elimina el favorito encontrado por su id.
**Método:** DELETE
- **URL:** `/favoritos/{id}`
- **Parámetros:** id favorito a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /favoritos/{id}`

**Descripción:** Actualiza el favorito encontrado por el id.

 - **Método:** PUT
- **URL:** `/favoritos/{id}`
- **Parámetros:** id del favorito a actualizar
```json

```

- **Respuesta Exitosa (200 OK):**
```json

```

*************************************MEDITATIONS*******************************************

*************************************MUSICA*******************************************

*************************************NOTIFICACIONES*******************************************

*************************************PREMIUM*******************************************

*************************************SESION*******************************************

*************************************USERS*******************************************