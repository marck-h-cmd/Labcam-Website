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

## Ejecutar la Aplicación

Después de completar los pasos anteriores, puedes iniciar la aplicación utilizando 
```bash
php artisan serve
```

Visita `http://localhost:8000` en tu navegador para ver la aplicación.
