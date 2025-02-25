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

*************************************USERS*******************************************
### 1. `GET /users`

**Descripción:** Obtiene la lista de ususarios registrados en el sistema.

- **Método:** GET
- **URL:** `/users`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Usuarios encontrados",
  "data": [
    {
      "id": 1,
      "name": "Juan",
      "email": "juan@example.com",
      "email_verified_at": "2025-02-23T20:24:48.000000Z",
      "localizacion": {
        "lat": 40.7128,
        "lng": -74.006
      },
      "edad": 30,
      "preferencias": "Comida",
      "lenguaje": "es",
      "created_at": "2025-02-23T20:24:48.000000Z",
      "updated_at": "2025-02-23T20:24:48.000000Z"
    },
    {
      "id": 3,
      "name": "Paula",
      "email": "paula@example.com",
      "email_verified_at": "2025-02-23T21:18:26.000000Z",
      "localizacion": {
        "lat": -10.31086,
        "lng": -11.734886
      },
      "edad": 24,
      "preferencias": "Musica relajante.",
      "lenguaje": "es",
      "created_at": "2025-02-23T21:18:26.000000Z",
      "updated_at": "2025-02-23T21:18:26.000000Z"
    }
  ]
}
```

### 1. `POST /users`

**Descripción:** Crea un nuevo user en el sistema.
**Método:** POST
- **URL:** `/users`
- **Parámetros:** 
```json
{
  "name": "Paula",
  "email": "paula@herrera2000.com",
  "password": "Ejemplo20!5@",
  "localizacion": {
    "lat": 40.7128,
    "lng": -74.006
  },
  "edad": 24,
  "preferencias": "Música relajante",
  "lenguaje": "es"
}

```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Usuario creado con éxito",
  "data": {
    "name": "Paula",
    "email": "paula@herrera2000.com",
    "localizacion": {
      "lat": 40.7128,
      "lng": -74.006
    },
    "edad": 24,
    "preferencias": "Música relajante",
    "lenguaje": "es",
    "email_verified_at": "2025-02-24T13:10:06.000000Z",
    "updated_at": "2025-02-24T13:10:06.000000Z",
    "created_at": "2025-02-24T13:10:06.000000Z",
    "id": 20
  }
}
```

### 1. `GET /users/{id}`

**Descripción:** Encuentra el user según su id.
**Método:** GET
- **URL:** `/users/{id}`
- **Parámetros:** id del user a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Usuario encontrado",
  "data": {
    "id": 20,
    "name": "Paula",
    "email": "paula@herrera2000.com",
    "email_verified_at": "2025-02-24T13:10:06.000000Z",
    "localizacion": {
      "lat": 40.7128,
      "lng": -74.006
    },
    "edad": 24,
    "preferencias": "Música relajante",
    "lenguaje": "es",
    "created_at": "2025-02-24T13:10:06.000000Z",
    "updated_at": "2025-02-24T13:10:06.000000Z"
  }
}

```


### 1. `DELETE /users/{id}`

**Descripción:** Elimina el user encontrado por su id.
**Método:** DELETE
- **URL:** `/users/{id}`
- **Parámetros:** id user a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Usuaro eliminado",
  "data": {
    "id": 20,
    "name": "Paula",
    "email": "paula@herrera2000.com",
    "email_verified_at": "2025-02-24T13:10:06.000000Z",
    "localizacion": {
      "lat": 40.7128,
      "lng": -74.006
    },
    "edad": 24,
    "preferencias": "Música relajante",
    "lenguaje": "es",
    "created_at": "2025-02-24T13:10:06.000000Z",
    "updated_at": "2025-02-24T13:10:06.000000Z"
  }
}
```

### 1. `PUT /users/{id}`

**Descripción:** Actualiza el user encontrado por el id.

 - **Método:** PUT
- **URL:** `/users/{id}`
- **Parámetros:** id del user a actualizar
```json
{
  "name": "Paula",
  "email": "paula@herrera3.com",
  "password": "ContraActual20!5@",
  "localizacion": {
    "lat": 40.7128,
    "lng": -74.006
  },
  "edad": 24,
  "preferencias": "Música relajante",
  "lenguaje": "es"
}

```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Usuario editado correctamente",
  "data": {
    "id": 19,
    "name": "Paula",
    "email": "paula@herrera3.com",
    "email_verified_at": "2025-02-24T13:05:00.000000Z",
    "localizacion": {
      "lat": 40.7128,
      "lng": -74.006
    },
    "edad": 24,
    "preferencias": "Música relajante",
    "lenguaje": "es",
    "created_at": "2025-02-24T13:05:00.000000Z",
    "updated_at": "2025-02-24T13:12:21.000000Z"
  }
}
```

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
      "user_id": 6,
      "tipo_fav": "music",
      "item_id": 7,
      "created_at": "2025-02-25T11:50:38.000000Z",
      "updated_at": "2025-02-25T11:50:38.000000Z",
      "user": {
        "id": 6,
        "name": "Eileen Marks",
        "email": "bins.daniela@example.org",
        "email_verified_at": "2025-02-24T20:14:53.000000Z",
        "localizacion": {
          "lat": 7.515238,
          "lng": -1.252312
        },
        "edad": 35,
        "preferencias": "Ratione temporibus expedita occaecati ratione. Fugit et vel sed repudiandae expedita. Sint velit porro ea iusto illo ratione. Autem laudantium quaerat placeat eligendi sed occaecati dignissimos.",
        "lenguaje": "es",
        "created_at": "2025-02-24T20:14:53.000000Z",
        "updated_at": "2025-02-24T20:14:53.000000Z"
      },
      "musica": {
        "id": 7,
        "titulo": "A voluptas perspiciatis officiis.",
        "categoria": "meditacion",
        "file_url": "https://www.connelly.net/est-aspernatur-quia-ipsa-nihil-ex-necessitatibus-quia",
        "duracion": "06:48:12",
        "lenguaje": "fr",
        "created_at": "2025-02-24T20:14:55.000000Z",
        "updated_at": "2025-02-24T20:14:55.000000Z"
      }
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
{
   "user_id": "6",
    "tipo_fav": "music",
    "item_id": "7"
}
```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Favorito creado con éxito",
  "data": {
    "user_id": "6",
    "tipo_fav": "music",
    "item_id": "7",
    "user": {
      "id": 6,
      "name": "Eileen Marks",
      "email": "bins.daniela@example.org",
      "email_verified_at": "2025-02-24T20:14:53.000000Z",
      "localizacion": {
        "lat": 7.515238,
        "lng": -1.252312
      },
      "edad": 35,
      "preferencias": "Ratione temporibus expedita occaecati ratione. Fugit et vel sed repudiandae expedita. Sint velit porro ea iusto illo ratione. Autem laudantium quaerat placeat eligendi sed occaecati dignissimos.",
      "lenguaje": "es",
      "created_at": "2025-02-24T20:14:53.000000Z",
      "updated_at": "2025-02-24T20:14:53.000000Z"
    },
    "item": {
      "id": 7,
      "titulo": "A voluptas perspiciatis officiis.",
      "categoria": "meditacion",
      "file_url": "https://www.connelly.net/est-aspernatur-quia-ipsa-nihil-ex-necessitatibus-quia",
      "duracion": "06:48:12",
      "lenguaje": "fr",
      "created_at": "2025-02-24T20:14:55.000000Z",
      "updated_at": "2025-02-24T20:14:55.000000Z"
    }
  }
}
```

### 1. `GET /favoritos/{id}`

**Descripción:** Encuentra el favorito según su id.
**Método:** GET
- **URL:** `/favoritos/{id}`
- **Parámetros:** id del favorito a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Favorito encontrado",
  "data": {
    "id": 20,
    "user_id": 4,
    "item_id": 6,
    "tipo_fav": "meditation",
    "created_at": "2025-02-24T20:14:55.000000Z",
    "updated_at": "2025-02-24T20:14:55.000000Z",
    "user": {
      "id": 4,
      "name": "Thaddeus Kessler",
      "email": "xjacobson@example.com",
      "email_verified_at": "2025-02-24T20:14:52.000000Z",
      "localizacion": {
        "lat": 50.195192,
        "lng": -175.77324
      },
      "edad": 51,
      "preferencias": "Accusamus hic et at non. Cumque dolorem doloribus autem. Nam aspernatur voluptatem et et id.",
      "lenguaje": "es",
      "created_at": "2025-02-24T20:14:52.000000Z",
      "updated_at": "2025-02-24T20:14:52.000000Z"
    },
    "meditacion": {
      "id": 6,
      "titulo": "Exercitationem nobis blanditiis blanditiis qui.",
      "categoria": "dormir",
      "file_url": "http://www.boyle.org/temporibus-voluptatem-in-fugit-sed.html",
      "duracion": "21:08:49",
      "lenguaje": "es",
      "created_at": "2025-02-24T20:14:55.000000Z",
      "updated_at": "2025-02-24T20:14:55.000000Z"
    }
  }
}
```


### 1. `DELETE /favoritos/{id}`

**Descripción:** Elimina el favorito encontrado por su id.
**Método:** DELETE
- **URL:** `/favoritos/{id}`
- **Parámetros:** id favorito a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Favorito eliminado.",
  "data": {
    "id": 10,
    "user_id": 2,
    "tipo_fav": "music",
    "item_id": 5,
    "created_at": "2025-02-24T20:14:55.000000Z",
    "updated_at": "2025-02-24T20:14:55.000000Z",
    "user": {
      "id": 2,
      "name": "Dr. Alexanne Bogisich Sr.",
      "email": "konopelski.tyree@example.net",
      "email_verified_at": "2025-02-24T20:14:52.000000Z",
      "localizacion": {
        "lat": -33.122009,
        "lng": 67.004862
      },
      "edad": 41,
      "preferencias": "Qui vel assumenda aut quia. Error quo impedit cum neque consequuntur sunt ut. Aut omnis qui mollitia aliquid et.",
      "lenguaje": "es",
      "created_at": "2025-02-24T20:14:52.000000Z",
      "updated_at": "2025-02-24T20:14:52.000000Z"
    }
  }
}
```

### 1. `PUT /favoritos/{id}`

**Descripción:** Actualiza el favorito encontrado por el id.

 - **Método:** PUT
- **URL:** `/favoritos/{id}`
- **Parámetros:** id del favorito a actualizar
```json
{
  "user_id": "5",
  "tipo_fav": "meditation",
  "item_id": "7"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Favorito actualizado",
  "data": {
    "id": 1,
    "user_id": "5",
    "item_id": "7",
    "tipo_fav": "meditation",
    "created_at": "2025-02-24T20:14:55.000000Z",
    "updated_at": "2025-02-25T12:20:25.000000Z",
    "user": {
      "id": 5,
      "name": "Dwight Sanford",
      "email": "marks.lisette@example.net",
      "email_verified_at": "2025-02-24T20:14:52.000000Z",
      "localizacion": {
        "lat": -75.535614,
        "lng": -144.379795
      },
      "edad": 38,
      "preferencias": "Et quam qui aut totam ut assumenda dolorem. Dolorem necessitatibus eaque recusandae ut dolor ut magnam.",
      "lenguaje": "es",
      "created_at": "2025-02-24T20:14:53.000000Z",
      "updated_at": "2025-02-24T20:14:53.000000Z"
    },
    "meditacion": {
      "id": 7,
      "titulo": "Fuga dolores et doloremque.",
      "categoria": "respiracion",
      "file_url": "http://smith.com/",
      "duracion": "19:14:03",
      "lenguaje": "en",
      "created_at": "2025-02-24T20:14:55.000000Z",
      "updated_at": "2025-02-24T20:14:55.000000Z"
    }
  }
}
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
{
  "success": "Notificaciones encontradas.",
  "data": [
    { 
      "id": 11,
      "user_id": 6,
      "alert_id": 2,
      "mensaje": "Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo",
      "created_at": "2025-02-24T14:12:43.000000Z",
      "updated_at": "2025-02-24T14:12:43.000000Z",
      "user": {
        "id": 6,
        "name": "Mrs. Vita White",
        "email": "deckow.timothy@example.net",
        "email_verified_at": "2025-02-24T13:21:28.000000Z",
        "localizacion": {
          "lat": 9.05194,
          "lng": 24.257687
        },
        "edad": 63,
        "preferencias": "Eligendi voluptate labore non at eos quibusdam. Enim nemo excepturi deleniti praesentium ipsum praesentium error. Rerum maiores et doloribus animi enim doloribus distinctio.",
        "lenguaje": "es",
        "created_at": "2025-02-24T13:21:28.000000Z",
        "updated_at": "2025-02-24T13:21:28.000000Z"
      },
      "alerta": {
        "id": 2,
        "titulo": "Sunt dicta facilis.",
        "descripcion": "Omnis consequatur commodi voluptate. Minus rem vitae sed.",
        "tipo": "otros",
        "localizacion": {
          "lat": 61.068701,
          "lng": -47.387115
        },
        "peligro": "media",
        "created_at": "2025-02-24T13:21:30.000000Z",
        "updated_at": "2025-02-24T13:21:30.000000Z"
      }
    }
  ]
}

```

### 1. `POST /notificaciones`

**Descripción:** Crea una nueva notificación en el sistema.
**Método:** POST
- **URL:** `/notificaciones`
- **Parámetros:** 
```json
{
      "user_id": "3",
      "alert_id": "10",
      "mensaje": "Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo"
}


```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Notificación creada con éxito.",
  "data": {
    "user_id": "3",
    "alert_id": "10",
    "mensaje": "Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo",
    "updated_at": "2025-02-24T17:51:57.000000Z",
    "created_at": "2025-02-24T17:51:57.000000Z",
    "id": 21,
    "user": {
      "id": 3,
      "name": "Noah Carroll",
      "email": "ypollich@example.net",
      "email_verified_at": "2025-02-24T13:21:27.000000Z",
      "localizacion": {
        "lat": -61.143348,
        "lng": 72.072921
      },
      "edad": 50,
      "preferencias": "Quia labore dignissimos sapiente voluptatibus. Autem saepe numquam est voluptate quo cum. Voluptates ut quis at veritatis. Odit omnis quidem quaerat eligendi enim. Ipsam voluptatem ut ex.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:27.000000Z",
      "updated_at": "2025-02-24T13:21:27.000000Z"
    },
    "alerta": {
      "id": 10,
      "titulo": "Est excepturi aut aut dignissimos.",
      "descripcion": "Rerum sequi aliquam distinctio voluptatem. Omnis id labore et. Nemo quia autem libero eaque quia voluptate.",
      "tipo": "otros",
      "localizacion": {
        "lat": 51.555147,
        "lng": -9.914494
      },
      "peligro": "alta",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z"
    }
  }
}
```

### 1. `GET /notificaciones/{id}`

**Descripción:** Encuentra la notificación según su id.
**Método:** GET
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id de la notificación a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Notificación encontrada.",
  "data": {
    "id": 11,
    "user_id": 6,
    "alert_id": 2,
    "mensaje": "Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo",
    "created_at": "2025-02-24T14:12:43.000000Z",
    "updated_at": "2025-02-24T14:12:43.000000Z",
    "user": {
      "id": 6,
      "name": "Mrs. Vita White",
      "email": "deckow.timothy@example.net",
      "email_verified_at": "2025-02-24T13:21:28.000000Z",
      "localizacion": {
        "lat": 9.05194,
        "lng": 24.257687
      },
      "edad": 63,
      "preferencias": "Eligendi voluptate labore non at eos quibusdam. Enim nemo excepturi deleniti praesentium ipsum praesentium error. Rerum maiores et doloribus animi enim doloribus distinctio.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:28.000000Z",
      "updated_at": "2025-02-24T13:21:28.000000Z"
    },
    "alerta": {
      "id": 2,
      "titulo": "Sunt dicta facilis.",
      "descripcion": "Omnis consequatur commodi voluptate. Minus rem vitae sed.",
      "tipo": "otros",
      "localizacion": {
        "lat": 61.068701,
        "lng": -47.387115
      },
      "peligro": "media",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z"
    }
  }
}

```


### 1. `DELETE /notificaciones/{id}`

**Descripción:** Elimina la notificación encontrada por su id.
**Método:** DELETE
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id notificación a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Notificación eliminada.",
  "data": {
    "id": 21,
    "user_id": 3,
    "alert_id": 10,
    "mensaje": "Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo",
    "created_at": "2025-02-24T17:51:57.000000Z",
    "updated_at": "2025-02-24T17:51:57.000000Z",
    "user": {
      "id": 3,
      "name": "Noah Carroll",
      "email": "ypollich@example.net",
      "email_verified_at": "2025-02-24T13:21:27.000000Z",
      "localizacion": {
        "lat": -61.143348,
        "lng": 72.072921
      },
      "edad": 50,
      "preferencias": "Quia labore dignissimos sapiente voluptatibus. Autem saepe numquam est voluptate quo cum. Voluptates ut quis at veritatis. Odit omnis quidem quaerat eligendi enim. Ipsam voluptatem ut ex.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:27.000000Z",
      "updated_at": "2025-02-24T13:21:27.000000Z"
    },
    "alerta": {
      "id": 10,
      "titulo": "Est excepturi aut aut dignissimos.",
      "descripcion": "Rerum sequi aliquam distinctio voluptatem. Omnis id labore et. Nemo quia autem libero eaque quia voluptate.",
      "tipo": "otros",
      "localizacion": {
        "lat": 51.555147,
        "lng": -9.914494
      },
      "peligro": "alta",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z"
    }
  }
}
```

### 1. `PUT /notificaciones/{id}`

**Descripción:** Actualiza la notificación encontrada por el id.

 - **Método:** PUT
- **URL:** `/notificaciones/{id}`
- **Parámetros:** id de la notificación a actualizar
```json
{
      "user_id": "3",
      "alert_id": "4",
      "mensaje": "Actualizar-Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo"
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Notificación actualizada.",
  "data": {
    "id": 22,
    "user_id": "3",
    "alert_id": "4",
    "mensaje": "Actualizar-Mantengase en casa hasta las 18h de la tarde para evitar el calor extremo",
    "created_at": "2025-02-24T18:00:26.000000Z",
    "updated_at": "2025-02-24T18:16:33.000000Z",
    "user": {
      "id": 3,
      "name": "Noah Carroll",
      "email": "ypollich@example.net",
      "email_verified_at": "2025-02-24T13:21:27.000000Z",
      "localizacion": {
        "lat": -61.143348,
        "lng": 72.072921
      },
      "edad": 50,
      "preferencias": "Quia labore dignissimos sapiente voluptatibus. Autem saepe numquam est voluptate quo cum. Voluptates ut quis at veritatis. Odit omnis quidem quaerat eligendi enim. Ipsam voluptatem ut ex.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:27.000000Z",
      "updated_at": "2025-02-24T13:21:27.000000Z"
    },
    "alerta": {
      "id": 4,
      "titulo": "Impedit ad nostrum.",
      "descripcion": "Perspiciatis possimus omnis dolor nemo consequatur minus excepturi et. Maxime necessitatibus dolorem dicta nobis voluptatem libero commodi.",
      "tipo": "inundacion",
      "localizacion": {
        "lat": 13.35991,
        "lng": -104.053719
      },
      "peligro": "media",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z"
    }
  }
}
```

*************************************PREMIUM*******************************************

### 1. `GET /premium`

**Descripción:** Obtiene la lista de los premium registrados en el sistema.

- **Método:** GET
- **URL:** `/premium`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Suscripciones premium encontradas",
  "data": [
    {
      "id": 1,
      "user_id": 9,
      "activo": 0,
      "fecha_inicio": "2024-04-15 15:17:37",
      "fecha_expiracion": "2025-06-12 00:10:09",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z",
      "user": {
        "id": 9,
        "name": "Taryn McCullough",
        "email": "hintz.johathan@example.com",
        "email_verified_at": "2025-02-24T13:21:29.000000Z",
        "localizacion": {
          "lat": 1.480852,
          "lng": 66.114042
        },
        "edad": 54,
        "preferencias": "Veritatis deserunt similique aut dignissimos. Et repudiandae assumenda minima perspiciatis et sit ab.",
        "lenguaje": "es",
        "created_at": "2025-02-24T13:21:29.000000Z",
        "updated_at": "2025-02-24T13:21:29.000000Z"
      }
    },
    {
      "id": 2,
      "user_id": 6,
      "activo": 0,
      "fecha_inicio": "2024-04-23 09:55:42",
      "fecha_expiracion": "2025-05-16 03:28:41",
      "created_at": "2025-02-24T13:21:30.000000Z",
      "updated_at": "2025-02-24T13:21:30.000000Z",
      "user": {
        "id": 6,
        "name": "Mrs. Vita White",
        "email": "deckow.timothy@example.net",
        "email_verified_at": "2025-02-24T13:21:28.000000Z",
        "localizacion": {
          "lat": 9.05194,
          "lng": 24.257687
        },
        "edad": 63,
        "preferencias": "Eligendi voluptate labore non at eos quibusdam. Enim nemo excepturi deleniti praesentium ipsum praesentium error. Rerum maiores et doloribus animi enim doloribus distinctio.",
        "lenguaje": "es",
        "created_at": "2025-02-24T13:21:28.000000Z",
        "updated_at": "2025-02-24T13:21:28.000000Z"
      }
    }
  ]
}
```

### 1. `POST /premium`

**Descripción:** Crea una nuevo premium en el sistema.
**Método:** POST
- **URL:** `/premium`
- **Parámetros:** 
```json
{
   "user_id": 2,
    "activo": true
}
```

- **Respuesta Exitosa (201 Created):** 
```json
{
  "success": "Suscripción premium creada con éxito.",
  "data": {
    "user_id": 2,
    "activo": true,
    "fecha_inicio": "2025-02-24T19:18:21.403353Z",
    "fecha_expiracion": "2026-02-24T19:18:21.403372Z",
    "updated_at": "2025-02-24T19:18:21.000000Z",
    "created_at": "2025-02-24T19:18:21.000000Z",
    "id": 19,
    "user": {
      "id": 2,
      "name": "Bernadette Hoppe",
      "email": "kiera.monahan@example.com",
      "email_verified_at": "2025-02-24T13:21:27.000000Z",
      "localizacion": "{\"lat\":73.889796,\"lng\":52.455898}",
      "edad": 41,
      "preferencias": "Ullam sit eum saepe quas. Molestias enim consequatur quis recusandae voluptatem repellat.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:27.000000Z",
      "updated_at": "2025-02-24T13:21:27.000000Z"
    }
  }
}
```

### 1. `GET /premium/{id}`

**Descripción:** Encuentra el premium según su id.
**Método:** GET
- **URL:** `/premium/{id}`
- **Parámetros:** id del premium a buscar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Suscripción premium encontrada",
  "data": {
    "id": 1,
    "user_id": 9,
    "activo": 0,
    "fecha_inicio": "2024-04-15 15:17:37",
    "fecha_expiracion": "2025-06-12 00:10:09",
    "created_at": "2025-02-24T13:21:30.000000Z",
    "updated_at": "2025-02-24T13:21:30.000000Z",
    "user": {
      "id": 9,
      "name": "Taryn McCullough",
      "email": "hintz.johathan@example.com",
      "email_verified_at": "2025-02-24T13:21:29.000000Z",
      "localizacion": {
        "lat": 1.480852,
        "lng": 66.114042
      },
      "edad": 54,
      "preferencias": "Veritatis deserunt similique aut dignissimos. Et repudiandae assumenda minima perspiciatis et sit ab.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:29.000000Z",
      "updated_at": "2025-02-24T13:21:29.000000Z"
    }
  }
}

```


### 1. `DELETE /premium/{id}`

**Descripción:** Elimina el premium encontrado por su id.
**Método:** DELETE
- **URL:** `/premium/{id}`
- **Parámetros:** id premium a eliminar
- **Respuesta Exitosa (200 OK):**

```json
{
  "success": "Suscripción premium eliminada.",
  "id": 1
}
```

### 1. `PUT /premium/{id}`

**Descripción:** Actualiza el premium encontrado por el id.

 - **Método:** PUT
- **URL:** `/premium/{id}`
- **Parámetros:** id del premium a actualizar
```json
{
  "user_id": 8,
  "activo": 0
}
```

- **Respuesta Exitosa (200 OK):**
```json
{
  "success": "Suscripción premium actualizada",
  "data": {
    "id": 16,
    "user_id": 8,
    "activo": 0,
    "fecha_inicio": "2025-02-24 20:26:17",
    "fecha_expiracion": "2026-02-24 19:16:54",
    "created_at": "2025-02-24T19:16:54.000000Z",
    "updated_at": "2025-02-24T19:26:21.000000Z",
    "user": {
      "id": 8,
      "name": "Charity Rippin IV",
      "email": "blabadie@example.net",
      "email_verified_at": "2025-02-24T13:21:29.000000Z",
      "localizacion": "{\"lat\":55.611687,\"lng\":-56.342206}",
      "edad": 33,
      "preferencias": "Omnis eius eligendi voluptas et dolorem quisquam. Temporibus ipsa itaque iusto. Officia aliquid fugiat facilis consectetur ducimus harum. Perspiciatis harum sed aut sequi quis.",
      "lenguaje": "es",
      "created_at": "2025-02-24T13:21:29.000000Z",
      "updated_at": "2025-02-24T13:21:29.000000Z"
    }
  }
}
```

*************************************SESION*******************************************

### 1. `GET /sesiones`

**Descripción:** Obtiene la lista de sesiones registradas en el sistema.

- **Método:** GET
- **URL:** `/sesiones`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
```json

```

### 1. `POST /sesiones`

**Descripción:** Crea una nueva sesión en el sistema.
**Método:** POST
- **URL:** `/sesiones`
- **Parámetros:** 
```json


```

- **Respuesta Exitosa (201 Created):** 
```json

```

### 1. `GET /sesiones/{id}`

**Descripción:** Encuentra la sesión según su id.
**Método:** GET
- **URL:** `/sesiones/{id}`
- **Parámetros:** id de la sesión a buscar
- **Respuesta Exitosa (200 OK):**

```json


```


### 1. `DELETE /sesiones/{id}`

**Descripción:** Elimina la sesión encontrada por su id.
**Método:** DELETE
- **URL:** `/sesiones/{id}`
- **Parámetros:** id sesión a eliminar
- **Respuesta Exitosa (200 OK):**

```json

```

### 1. `PUT /sesiones/{id}`

**Descripción:** Actualiza la sesión encontrado por el id.

 - **Método:** PUT
- **URL:** `/sesiones/{id}`
- **Parámetros:** id de la sesión a actualizar
```json


```

- **Respuesta Exitosa (200 OK):**
```json

```

