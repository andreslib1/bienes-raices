# Proyecto Bienes raices

## Descripción
El Proyecto Bienes raices es una plataforma básica enfocada en el ámbito de la finca raíz, diseñada para alojar publicaciones de casas en venta con descripciones detalladas. Incluye un sistema de acceso para administradores encargados de las publicaciones, operando dinámicamente con una base de datos para la gestión de propiedades y usuarios.

## Tecnologías y Herramientas Utilizadas
- PHP v8
- HTML
- CSS
- Bootstrap v5
- JavaScript

# Base de datos
- Mysql v8

## Características y Funcionalidades
- **Sistema de Autenticación:** Directorio `/admin/login.php` para la autenticación de usuarios, con encriptación de contraseñas.

- **Secuencia de Publicaciones (Administrador):**
<div style="text-align: center;">
 <img src="/img_readme/diagrama-de-secuencia-administrador.png" width="500">
</div>
 - **Secuencia usuarios:**
<div style="text-align: center;">
  <img src="/img_readme/diagrama-secuencia-usuarios.png" width="500">
</div>
# Base de datos
<div style="text-align: center;">
 <img src="/img_readme/diagrama-entidad-relacion.png" width="500">
</div>
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
El proyecto cuenta con una estructura personalizada que soporta la gestión de usuarios, propiedades, y la interacción con la base de datos, asegurando una experiencia de usuario fluida y eficiente.
<div style="text-align: center;">
 <img src="/img_readme/estructura-proyecto.png" width="500">
 </div>