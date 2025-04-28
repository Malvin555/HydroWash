<p align="center">
  <img src="public/img/logo.png" alt="HydroWash Logo" width="200"/>
</p>

# 💧 HydroWash - Laundry Management Web App 🧺

**HydroWash** is a modern, intuitive web application built with Laravel to streamline and digitize laundry service operations. Whether you run a cozy neighborhood shop or a large-scale laundry business, HydroWash keeps everything organized — from order tracking to delivery management — all in one place.

---

## 🚀 Features

- 🔐 **Secure Authentication & Role-Based Access**
- 📦 **Order Management** — Create, update, and track laundry orders with ease
- 🧑‍💼 **Admin Dashboard** — Manage services, pricing, users, and orders
- 💸 **Dynamic Pricing** — Tailored pricing based on laundry item type
- 🎨 **Responsive Modern UI** — Built with mobile-first design and smooth UX

---

## 📸 Live Preview

<p align="center">
  <img src="public/img/preview.png" alt="HydroWash App Preview" width="600"/>
</p>

---

## ⚙️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade, Bootstrap / Tailwind CSS
- **Database:** MariaDB

---

## 📁 Getting Started

### 🔧 Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Malvin555/hydrowash.git
   cd hydrowash
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configure environment variables:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set up your database in `.env`, then run:**

   ```bash
   php artisan migrate --seed
   ```

5. **Start the local development server:**

   ```bash
   php artisan serve
   ```

---

## 🔐 Default Login Credentials

| Role  | Email              | Password  |
|-------|--------------------|-----------|
| Admin | admin@example.com   | admin123  |

> ⚠️ **Note:** For security, **update default credentials** immediately after your first login.

---

## 📂 Project Structure Overview

- `app/Http/Controllers/` — Application logic and request handling
- `resources/views/` — Blade templates for UI
- `routes/web.php` — Web routes for the app
- `database/seeders/` — Default role and user seeders

---

## 🙌 Contributing

Contributions are welcome and appreciated!  
To contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add your feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

Please follow Laravel's best practices and coding standards when contributing.

---

## 🧼 Why Choose HydroWash?

HydroWash empowers laundries to embrace digital transformation, enhancing operational efficiency, customer experience, and service transparency — all through a single, easy-to-use platform.

---

## 📃 License

Licensed under the [MIT License](LICENSE).

---

## 👨‍💻 Built with ❤️ by

**The HydroWash Team**

> ⭐ If you like this project, give it a star to show your support!

---
