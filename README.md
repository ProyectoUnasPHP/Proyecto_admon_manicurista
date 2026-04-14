# 💅 Proyecto Administración Manicurista - Laravel

Este proyecto está desarrollado con **Laravel** y utiliza **MySQL** como base de datos.

---

# 🚀 Requisitos

Antes de comenzar, asegúrate de tener instalado:

* PHP >= 8.2
* Composer
* Node.js y npm
* MySQL (XAMPP recomendado)

---

# 📥 Clonar el proyecto

```bash
git clone https://github.com/juandapuerta1/Proyecto_admon_manicurista.git
cd Proyecto_admon_manicurista
```

---

# 📦 Instalar dependencias

```bash
composer install
npm install
```

---

# ⚙️ Configuración del entorno

## 1. Crear archivo de entorno

```bash
cp .env.example .env
```

---

## 2. Generar clave de aplicación

```bash
php artisan key:generate
```

---

# 🗄️ Configuración de base de datos (MySQL)

## 1. Crear base de datos

Abrir en el navegador:

```text
http://localhost/phpmyadmin
```

Crear una base de datos con el siguiente nombre:

```text
spa_citas_db
```

---

## 2. Configurar conexión en `.env`

Abrir el archivo `.env` y modificar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spa_citas_db
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ Nota: Si tu MySQL tiene contraseña, agrégala en `DB_PASSWORD`.

---

## 3. Limpiar caché de configuración

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 4. Ejecutar migraciones

```bash
php artisan migrate
```

Esto creará las tablas necesarias en la base de datos.

---

# ▶️ Ejecutar el proyecto

## 1. Levantar servidor Laravel

```bash
php artisan serve
```

---

## 2. Ejecutar frontend

En otra terminal:

```bash
npm run dev
```

---

# 🌐 Acceder a la aplicación

Abrir en el navegador:

```text
http://127.0.0.1:8000
```

---

# 🧪 Comandos útiles

```bash
php artisan route:list
php artisan migrate
php artisan config:clear
```

---

# ⚠️ Notas importantes

* El archivo `.env` **no se sube al repositorio**
* La carpeta `vendor/` se genera con `composer install`
* La carpeta `node_modules/` se genera con `npm install`

---

# 👩‍💻 Flujo de trabajo recomendado

* `main` → versión estable
* `develop` → integración
* `feature/*` → desarrollo de funcionalidades

---

# 📌 Autor

Proyecto académico - Administración de Manicuristas 💅
