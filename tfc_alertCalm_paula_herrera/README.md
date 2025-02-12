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


*************************************LIBROS*******************************************

### 1. `GET /alertas`

**Descripción:** Obtiene la lista de alertas registradas en el sistema.

- **Método:** GET
- **URL:** `/alertas`
- **Parámetros:** Ninguno.
- **Respuesta Exitosa (200 OK):**
  ```json
  [
    
  ]
  ```

### 1. `POST /alertas`

**Descripción:** Crea una nueva alerta en el sistema.
**Método:** POST
- **URL:** `/alertas`
- **Parámetros:** 
```json
 [
    
 ]
```

- **Respuesta Exitosa (201 Created):** 
```json
[
    
]
```
### 1. `DELETE /alertas/{id}`

**Descripción:** Elimina la alerta encontrado por su id.
**Método:** DELETE
- **URL:** `/alertas/{id}`
- **Parámetros:** id a eliminar
- **Respuesta Exitosa (200 OK):**

 ```json
 [
   
 ]
```

### 1. `PUT /alertas/{id}`

**Descripción:** Actualiza la alerta encontrado por el id.

 - **Método:** PUT
- **URL:** `/alertas/{id}`
- **Parámetros:** id de la alerta a actualizar
```json
[
 
]
```

- **Respuesta Exitosa (200 OK):**
  ```json
  [
    
  ]
  ```