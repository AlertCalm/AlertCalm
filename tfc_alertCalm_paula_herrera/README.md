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


### 1. `GET /meditaciones`

**Descripción:** Obtiene la lista de las meditaciones registradas en el sistema.

- **Método:** GET
- **URL:** `/meditaciones`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Meditaciones encontradas",
  "data": [
    {
      "id": 1,
      "titulo": "Officiis et eos.",
      "categoria": "otra",
      "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
      "duracion": "20:09:48",
      "lenguaje": "es",
      "created_at": "2025-02-15T18:25:50.000000Z",
      "updated_at": "2025-02-15T18:25:50.000000Z"
    },
    {
      "id": 2,
      "titulo": "Ipsam officia minima beatae.",
      "categoria": "relajacion",
      "file_url": "http://www.metz.net/",
      "duracion": "05:11:47",
      "lenguaje": "es",
      "created_at": "2025-02-15T18:25:50.000000Z",
      "updated_at": "2025-02-15T18:25:50.000000Z"
    }
  ]
}
```

### 1. `POST /meditaciones`

**Descripción:** Crea una nueva meditacion en el sistema.
**Método:** POST
- **URL:** `/meditaciones`
- **Parámetros:** 
```json
  {
    "titulo": "sweet.",
    "categoria": "relajacion",
    "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
    "duracion": "20:09:48",
    "lenguaje": "es"
  }
```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Meditación creada con éxito",
  "data": {
    "titulo": "sweet.",
    "categoria": "relajacion",
    "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
    "duracion": "20:09:48",
    "lenguaje": "es",
    "updated_at": "2025-02-23T12:46:08.000000Z",
    "created_at": "2025-02-23T12:46:08.000000Z",
    "id": 12
  }
}
```

### 1. `GET /meditaciones/{id}`

**Descripción:** Encuentra la meditacion según su id.
**Método:** GET
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Meditacion encontrada",
  "data": {
    "id": 12,
    "titulo": "sweet.",
    "categoria": "relajacion",
    "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
    "duracion": "20:09:48",
    "lenguaje": "es",
    "created_at": "2025-02-23T12:46:08.000000Z",
    "updated_at": "2025-02-23T12:46:08.000000Z"
  }
}

```


### 1. `DELETE /meditaciones/{id}`

**Descripción:** Elimina la meditacion encontrada por su id.
**Método:** DELETE
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id meditacion a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Meditación eliminada.",
  "data": {
    "id": 3,
    "titulo": "Facilis in libero neque nam.",
    "categoria": "mindfulness",
    "file_url": "http://kassulke.com/soluta-dicta-ipsa-quisquam-iusto.html",
    "duracion": "12:56:45",
    "lenguaje": "fr",
    "created_at": "2025-02-15T18:25:50.000000Z",
    "updated_at": "2025-02-15T18:25:50.000000Z"
  }
}
```

### 1. `PUT /meditaciones/{id}`

**Descripción:** Actualiza la meditacion encontrado por el id.

 - **Método:** PUT
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a actualizar
```json
{
 "titulo": "sweet actualizada.",
      "categoria": "relajacion",
      "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
      "duracion": "20:09:48",
      "lenguaje": "es"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Meditación actualizada",
  "data": {
    "id": 12,
    "titulo": "sweet actualizada.",
    "categoria": "relajacion",
    "file_url": "http://www.gulgowski.biz/aut-et-esse-voluptate-tempora-sunt-eum",
    "duracion": "20:09:48",
    "lenguaje": "es",
    "created_at": "2025-02-23T12:46:08.000000Z",
    "updated_at": "2025-02-23T12:52:38.000000Z"
  }
}
```

*************************************MUSICA*******************************************



### 1. `GET /musica`

**Descripción:** Obtiene la lista de la musica registrada en el sistema.

- **Método:** GET
- **URL:** `/musica`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Músicas encontrada",
  "data": [
    {
      "id": 1,
      "titulo": "Asperiores autem ab.",
      "categoria": "ansiedad",
      "file_url": "https://www.hand.com/non-quod-quia-commodi-quod-et-ex-commodi",
      "duracion": "23:54:25",
      "lenguaje": "fr",
      "created_at": "2025-02-15T18:32:08.000000Z",
      "updated_at": "2025-02-15T18:32:08.000000Z"
    },
    {
      "id": 2,
      "titulo": "Aut dolores at.",
      "categoria": "meditacion",
      "file_url": "http://www.williamson.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
      "duracion": "08:24:55",
      "lenguaje": "en",
      "created_at": "2025-02-15T18:32:08.000000Z",
      "updated_at": "2025-02-15T18:32:08.000000Z"
    }
  ]
}
```

### 1. `POST /musica`

**Descripción:** Crea una nueva musica en el sistema.
**Método:** POST
- **URL:** `/musica`
- **Parámetros:** 
```json
{
 "titulo": "Apocalypse",
  "categoria": "relajacion",
  "file_url": "http://www.Apocalypse.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
  "duracion": "08:24:55",
  "lenguaje": "en"
}
```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Música creada con éxito",
  "data": {
    "titulo": "Apocalypse",
    "categoria": "relajacion",
    "file_url": "http://www.Apocalypse.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
    "duracion": "08:24:55",
    "lenguaje": "en",
    "updated_at": "2025-02-23T12:57:39.000000Z",
    "created_at": "2025-02-23T12:57:39.000000Z",
    "id": 11
  }
}
```

### 1. `GET /musica/{id}`

**Descripción:** Encuentra la musica según su id.
**Método:** GET
- **URL:** `/musica/{id}`
- **Parámetros:** id de la musica a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Música encontrada",
  "data": {
    "id": 11,
    "titulo": "Apocalypse",
    "categoria": "relajacion",
    "file_url": "http://www.Apocalypse.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
    "duracion": "08:24:55",
    "lenguaje": "en",
    "created_at": "2025-02-23T12:57:39.000000Z",
    "updated_at": "2025-02-23T12:57:39.000000Z"
  }
}
```


### 1. `DELETE /musica/{id}`

**Descripción:** Elimina la musica encontrada por su id.
**Método:** DELETE
- **URL:** `/musica/{id}`
- **Parámetros:** id musica a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Música eliminada.",
  "data": {
    "id": 10,
    "titulo": "Voluptas dolorem minima corrupti.",
    "categoria": "meditacion",
    "file_url": "http://www.schmeler.org/",
    "duracion": "15:57:53",
    "lenguaje": "fr",
    "created_at": "2025-02-15T18:32:08.000000Z",
    "updated_at": "2025-02-15T18:32:08.000000Z"
  }
}
```

### 1. `PUT /musica/{id}`

**Descripción:** Actualiza la musica encontrado por el id.

 - **Método:** PUT
- **URL:** `/musica/{id}`
- **Parámetros:** id de la musica a actualizar
```json
{
 "titulo": "Apocalypse actualizada",
    "categoria": "relajacion",
    "file_url": "http://www.Apocalypse.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
    "duracion": "08:24:55",
    "lenguaje": "en"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Música actualizada",
  "data": {
    "id": 11,
    "titulo": "Apocalypse actualizada",
    "categoria": "relajacion",
    "file_url": "http://www.Apocalypse.com/culpa-quo-non-tempore-odio-soluta-alias-aperiam.html",
    "duracion": "08:24:55",
    "lenguaje": "en",
    "created_at": "2025-02-23T12:57:39.000000Z",
    "updated_at": "2025-02-23T13:00:00.000000Z"
  }
}
```

*************************************NOTIFICACIONES*******************************************

### 1. `GET /notificaciones`

**Descripción:** Obtiene la lista de notificaciones registradas en el sistema.

- **Método:** GET
- **URL:** `/notificaciones`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json

```

### 1. `POST /notificaciones`

**Descripción:** Crea una nueva notificación en el sistema.
**Método:** POST
- **URL:** `/notificaciones`
- **Parámetros:** 
```json

```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /notificaciones/{id}`

**Descripción:** Encuentra la notificación según su id.
**Método:** GET
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id de la notificación a buscar
- **Respuesta Exitosa (200 OK):**

```json


```


### 1. `DELETE /notificaciones/{id}`

**Descripción:** Elimina la notificación encontrada por su id.
**Método:** DELETE
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id notificación a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /notificaciones/{id}`

**Descripción:** Actualiza la notificación encontrada por el id.

 - **Método:** PUT
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id de la notificación a actualizar
```json

```

- **Respuesta Exitosa (200 OK):**
```json

```

*************************************PREMIUM*******************************************

### 1. `GET /meditaciones`

**Descripción:** Obtiene la lista de favoritos registrados en el sistema.

- **Método:** GET
- **URL:** `/meditaciones`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json

```

### 1. `POST /meditaciones`

**Descripción:** Crea una nueva meditacion en el sistema.
**Método:** POST
- **URL:** `/meditaciones`
- **Parámetros:** 
```json

```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /meditaciones/{id}`

**Descripción:** Encuentra la meditacion según su id.
**Método:** GET
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a buscar
- **Respuesta Exitosa (200 OK):**

```json


```


### 1. `DELETE /meditaciones/{id}`

**Descripción:** Elimina la meditacion encontrada por su id.
**Método:** DELETE
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id meditacion a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /meditaciones/{id}`

**Descripción:** Actualiza la meditacion encontrado por el id.

 - **Método:** PUT
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a actualizar
```json

```

- **Respuesta Exitosa (200 OK):**
```json

```

*************************************SESION*******************************************

### 1. `GET /meditaciones`

**Descripción:** Obtiene la lista de favoritos registrados en el sistema.

- **Método:** GET
- **URL:** `/meditaciones`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json

```

### 1. `POST /meditaciones`

**Descripción:** Crea una nueva meditacion en el sistema.
**Método:** POST
- **URL:** `/meditaciones`
- **Parámetros:** 
```json

```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /meditaciones/{id}`

**Descripción:** Encuentra la meditacion según su id.
**Método:** GET
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a buscar
- **Respuesta Exitosa (200 OK):**

```json


```


### 1. `DELETE /meditaciones/{id}`

**Descripción:** Elimina la meditacion encontrada por su id.
**Método:** DELETE
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id meditacion a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /meditaciones/{id}`

**Descripción:** Actualiza la meditacion encontrado por el id.

 - **Método:** PUT
- **URL:** `/meditaciones/{id}`
- **Parámetros:** id de la meditacion a actualizar
```json

```

- **Respuesta Exitosa (200 OK):**
```json

```

*************************************USERS*******************************************
### 1. `GET /users`

**Descripción:** Obtiene la lista de ususarios registrados en el sistema.

- **Método:** GET
- **URL:** `/users`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json

```

### 1. `POST /users`

**Descripción:** Crea un nuevo user en el sistema.
**Método:** POST
- **URL:** `/users`
- **Parámetros:** 
```json

```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /users/{id}`

**Descripción:** Encuentra el user según su id.
**Método:** GET
- **URL:** `/users/{id}`
- **Parámetros:** id del user a buscar
- **Respuesta Exitosa (200 OK):**

```json


```


### 1. `DELETE /users/{id}`

**Descripción:** Elimina el user encontrado por su id.
**Método:** DELETE
- **URL:** `/users/{id}`
- **Parámetros:** id user a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /users/{id}`

**Descripción:** Actualiza el user encontrado por el id.

 - **Método:** PUT
- **URL:** `/users/{id}`
- **Parámetros:** id del user a actualizar
```json

```

- **Respuesta Exitosa (200 OK):**
```json

```
