<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



# Guía de Configuración de la Aplicación

Esta guía proporciona los comandos necesarios para configurar y ejecutar la aplicación.

## Requisitos Previos

- Node.js y npm instalados
- Composer instalado
- PHP instalado
# Instalar composer  en ubuntu de forma global (local)
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" && \
php composer-setup.php && \
sudo mv composer.phar /usr/local/bin/composer && \
php -r "unlink('composer-setup.php');"
```

## Dependencia requerida 

```bash
sudo apt-get install php-xml

```
# Configuración del Archivo `.env` en Producción

Pasos para configurar el archivo `.env` de la aplicación para producción.

---

## Pasos Básicos

1. **Copiar el Archivo `.env.example`**:
   ```bash
   cp .env.example .env
   ```

2. **Generar la Clave de la Aplicación**:
   ```bash
   php artisan key:generate
   ```

3. **Editar el Archivo con nano solo en linux desde el servidor`.env`**:
   ```bash
   nano .env
   ```

---

## Variables Clave a Configurar desde aplicación

### Configuración General
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_KEY=base64:clave_generada` (generado con `php artisan key:generate`)
- `APP_URL=https://dominio.com`

### Base de Datos
- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=nombre_de_la_base`
- `DB_USERNAME=usuario`
- `DB_PASSWORD=contraseña`

### Correo Electrónico
- `MAIL_MAILER=smtp`
- `MAIL_HOST=mailtrap.io`
- `MAIL_PORT=2525`
- `MAIL_USERNAME=null`
- `MAIL_PASSWORD=null`
- `MAIL_FROM_ADDRESS=correo@dominio.com`
- `MAIL_FROM_NAME="Nombre de la App"`

### Almacenamiento
- `FILESYSTEM_DISK=public`
- `QUEUE_CONNECTION=sync`

---

## Ejemplo de `.env` para Producción

```env
APP_NAME=MiApp
APP_ENV=production
APP_KEY=base64:tu_clave_generada
APP_DEBUG=false
APP_URL=https://tudominio.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_la_base
DB_USERNAME=usuario
DB_PASSWORD=contraseña

MAIL_MAILER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS=correo@dominio.com
MAIL_FROM_NAME="${APP_NAME}"

FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
```

## Instalación

### Instalar modules de Node

Para instalar los módulos de Node.js requeridos, ejecuta el siguiente comando:

```bash
npm i
```

### Actualizar Dependencias de Composer

Para instalar o actualizar las dependencias de Composer, usa el siguiente comando:

```bash
composer install
```

## Compilación de Recursos

### Compilar Recursos de Vite para Producción

Para compilar los recursos de Vite para producción, ejecuta el siguiente comando:

```bash
npm run build
```

## Enlazar Recursos de Almacenamiento

Para crear un enlace simbólico desde el directorio `public/storage` al directorio `storage/app/public`, ejecuta:

```bash
php artisan storage:link
```
## Comandos para Cache en Laravel (Producción)

### Cachear para producción
```bash
php artisan config:cache  # Cachea configuración  
php artisan route:cache   # Cachea rutas  
php artisan view:cache    # Cachea vistas  
```

## Revertir cache (para desarrollo o actualizaciones)
```bash
php artisan config:clear 
php artisan route:clear  
php artisan view:clear
```

**Nota:** Ejecuta los comandos de cache solo en producción. Para desarrollo o después de hacer cambios, usa los comandos clear para asegurar que los cambios se reflejen inmediatamente, y luego correr comandos para cache producción denuevo.

## Ejecutar la Aplicación

Después de completar los pasos anteriores, puedes iniciar la aplicación utilizando 
```bash
php artisan serve
```


