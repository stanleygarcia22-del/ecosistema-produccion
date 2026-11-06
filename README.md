# Ecosistema de Producción Containerizado

Este proyecto implementa un entorno de producción contenerizado utilizando **Docker** y **Docker Compose**, integrando servicios desacoplados para garantizar escalabilidad, seguridad y reproducibilidad en cualquier entorno.

---

## 🏗 Arquitectura del Ecosistema

El sistema consta de tres servicios principales orquestados mediante una red interna de puente (`bridge`), lo que aísla la base de datos de la red pública y permite una comunicación segura:

1. **Servicio Frontend (Next.js 16+)**: 
   - Desarrollado con App Router y optimizado para producción.
   - Expuesto al host en el puerto `3000`.
2. **Servicio Backend (API Laravel con PHP 8.2-FPM)**:
   - Servidor PHP-FPM operando bajo contenedores basados en Alpine Linux.
   - Conectado internamente con la base de datos y expuesto opcionalmente en el puerto `8000`.
3. **Servicio Base de Datos (MySQL 8.0)**[cite: 2]:
   - Contenedor oficial de MySQL con persistencia de datos mediante volúmenes Docker (`db_data`) montados en `/var/lib/mysql`[cite: 2].
   - Configurado mediante variables de entorno seguras[cite: 2].

---

## 📋 Prerrequisitos

Asegúrate de tener instalado en tu sistema operativo:
- [Docker Desktop](https://www.docker.com/) (con soporte para WSL 2 en Windows).
- Docker Compose (incluido por defecto en las versiones modernas de Docker Desktop).

---

## 🚀 Instrucciones de Ejecución

1. **Clonar o preparar el repositorio** con la estructura de carpetas `frontend/` y `backend/` en la raíz.
2. **Configurar las variables de entorno**: Copia el archivo de ejemplo y ajusta los valores si es necesario:
   ```bash
   cp .env.example .env

  - Construir y levantar los contenedores ejecutando el siguiente comando en la raíz del proyecto

  docker compose up --build -d

  - Verificar el estado de los servicios:
  
  docker ps

  Decisiones Técnicas y Optimización de Dockerfiles

frontend
  1. Se implementó una construcción en tres etapas (deps, builder y runner) utilizando imágenes ligeras basadas en node:20-alpine

backend
  2. Se utilizó una etapa inicial con la imagen oficial de composer:2 para compilar e instalar únicamente las dependencias de producción (--no-dev --optimize-autoloader)

  db
  3. Uso de volúmenes persistentes y aislamiento de puertos. El puerto interno 3306 se gestiona exclusivamente a través de la red privada de Docker Compose para los servicios internos, resguardando la seguridad de los datos en producción