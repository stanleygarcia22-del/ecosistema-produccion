# Next.js Docker Activity

Este proyecto contiene una aplicación **Next.js** contenerizada utilizando **Docker** mediante construcciones en múltiples etapas (*multi-stage builds*) para optimizar el tamaño de la imagen y garantizar un entorno de desarrollo portable e aislado.

## 🚀 Requisitos Previos

- [Node.js](https://nodejs.org/) (v20 o superior)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo.

## 🛠️ Construir la imagen de Docker

Para construir la imagen de Docker utilizando el `Dockerfile` configurado, ejecuta el siguiente comando en la raíz del proyecto:

```bash
docker build -t next-docker-app .