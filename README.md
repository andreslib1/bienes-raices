# Proyecto Bienes raices

## Descripción
El Proyecto de Bienes Raíces constituye una plataforma elemental diseñada específicamente para el sector de ventas de viviendas. Esta plataforma está equipada para presentar anuncios de casas en venta, acompañados de breves descripciones. Asimismo, incorpora un sistema de acceso exclusivo para los administradores responsables de gestionar dichas publicaciones, operando de manera dinámica con una base de datos destinada a la administración de propiedades y usuarios.

link administradores:
https://bienesraices.nexoweblabs.com/admin/login.php

##Usuario

gmail: testuser@gmail.com

pass: 123

## Tecnologías y Herramientas Utilizadas
- PHP v8
- HTML
- CSS
- Bootstrap v5
- JavaScript

# Base de datos
- Mysql v8

## Características y Funcionalidades
- **Sistema de Autenticación:**
El proyecto incluye un **Sistema de Autenticación** ubicado dentro del directorio `/admin/login.php`. Este sistema permite a los usuarios autenticarse utilizando credenciales preestablecidas. Se destacan los siguientes puntos:

- **Usuarios Predefinidos**: Existen tres usuarios creados por defecto con contraseñas encriptadas.
- **Encriptación de Contraseñas**: Las contraseñas se almacenan de manera encriptada en la base de datos, asegurando una mayor seguridad.
- **Acceso Restringido**: Solo los usuarios que han iniciado sesión pueden acceder a las rutas administrativas del sistema.

Este mecanismo de autenticación garantiza que solo usuarios autorizados puedan acceder a la aplicación.

- **Secuencia de Publicaciones (Administrador):**
<p align="center">
 <img src="/img_readme/diagrama-de-secuencia-administrador.png" width="500">
</p>

 - **Secuencia usuarios:**

<p align="center">
  <img src="/img_readme/diagrama-secuencia-usuarios.png" width="500">
<p>

# Base de datos

<p align="center">
 <img src="/img_readme/diagrama-entidad-relacion.png" width="500">
<p>

## Entidades y Atributos Principales
# Bienes Raíces - Esquema de Base de Datos

## Tabla: PROPIEDADES

- **COD_PROPIEDAD**: Clave primaria, entero no nulo. Identifica cada propiedad de forma única.
- **COD_VENDEDOR**: Entero, clave foránea que enlaza a la tabla de vendedores. Asigna vendedor a propiedad.
- **TITULO**: Texto (varchar, máximo 100 caracteres). Título o nombre breve de la propiedad.
- **PRECIO**: Numérico (decimal). Precio de la propiedad.
- **IMAGEN**: Texto (varchar, máximo 200 caracteres). URL o referencia de imagen.
- **DESCRIPCION**: Texto largo (longtext). Descripción detallada.
- **HABITACIONES**: Entero. Número de habitaciones.
- **BAÑOS**: Entero. Número de baños.
- **ESTACIONAMIENTO**: Entero. Espacios de estacionamiento disponibles.
- **FECHA_CREACION**: Fecha. Fecha de adición de la propiedad a la base.

## Tabla: VENDEDORES

- **COD_VENDEDOR**: Clave primaria, entero no nulo. Identifica a cada vendedor de forma única.
- **NOMBRE**: Texto (varchar). Nombre del vendedor.
- **APELLIDO**: Texto (varchar). Apellido del vendedor.
- **TELEFONO**: Numérico (int). Número de teléfono.
- **EMAIL**: Texto (varchar). Correo electrónico del vendedor.


## Estructura del Proyecto

<p align="center">
 <img src="/img_readme/estructura-proyecto.png" width="500">
 <p>
