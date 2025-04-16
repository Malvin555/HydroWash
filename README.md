
# 💧 HydroWash - Laundry Web 🧺

HydroWash is a powerful, modern, and user-friendly web application built with Laravel, designed to streamline and digitize laundry services. Whether you're managing a small laundry shop or a large operation, HydroWash helps you keep everything organized — from orders to deliveries.


## 🚀 Features

- ✅ User Registration & Login (with role-based access)
- 📋 Order Management (Create, View, Update, Track Orders)
- 🧑‍💼 Admin Panel for Managing Services, Users, and Orders
- 🧾 Dynamic Pricing Based on Laundry Type & Weight
- 📦 Pickup & Delivery Tracking System
- 🎨 VERY COOL UI

---

## 📸 Preview

> Coming soon...

---

## ⚙️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade + Bootstrap/Tailwind CSS
- **Database:** MariaDB

---

## 📁 Installation

Clone the project:

```bash
git clone https://github.com/Malvin555/hydrowash.git
cd hydrowash
```

Install dependencies:

```bash
composer install
npm install && npm run dev
```

Copy and set up `.env` file:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`, then run migrations:

```bash
php artisan migrate --seed
```

Start the development server:

```bash
php artisan serve
```

---

## 🔐 Default Login Credentials

| Role  | Email             | Password |
|-------|-------------------|-----------|
| Admin | admin@hydro.com   | admin123  |
| Staff | staff@hydro.com   | staff123  |
| User  | user@hydro.com    | user123   |

> ⚠️ Please change the passwords after your first login for security.

---

## 📌 Folder Structure Highlights

- `app/Http/Controllers/` - All main controllers
- `resources/views/` - Blade view templates
- `routes/web.php` - Route definitions
- `database/seeders/` - Seeders for roles & sample users

---

## 🙌 Contributing

Want to contribute? Awesome! Fork the repo, make your changes, and submit a pull request. Make sure your code follows Laravel best practices.

---

## 🧼 About HydroWash

HydroWash was created to help local laundries go digital — improving customer experience, increasing efficiency, and offering transparency. Designed with simplicity and scalability in mind.

---

## 📃 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👨‍💻 Developer

**HydroWash Team**

> Follow us on GitHub to stay updated with new features and improvements!

```

---

Let me know if you'd like to customize it further — like adding badges, screenshots, or linking it with a live demo.
