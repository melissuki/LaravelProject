# Laravel E-Commerce Project

This project is an e-commerce web application developed as part of the Advanced Web Programming course. It includes a fully functional user cart system, order checkout, and a secure admin panel for product management (CRUD operations).

## 👩‍💻 Developer Information
* **Name:** Melis Su Kaya
* **University:** Istanbul Nişantaşı University - Software Engineering (3rd Year)
* **Student ID:** 20222022421

## 🚀 Technologies & Development Environment
This project was developed and tested on a modern **macOS** environment using the following tools:
* **Framework:** Laravel 11.x
* **Local Environment:** Laravel Herd
* **Database Management:** DBngin (MySQL)
* **IDE:** PhpStorm


## ⚙️ How to Install and Run the Project

1. **Clone the repository:** `git clone https://github.com/melissuki/Laravel-Project.git`


2. **Navigate to the project directory:** `cd Laravel-Project`


3. **Install dependencies:** `composer install`


4. **Environment setup:** Copy the environment file using `cp .env.example .env`


5. **Generate application key:** `php artisan key:generate`


6. **Run database migrations:** `php artisan migrate`


7. **Start the local server:** `php artisan serve`


🔐 Admin Panel Access

The project includes a secure admin panel to manage products and view orders.
Admin Login URL: http://127.0.0.1:8000/admin/login

Username: user123

Password: 12345

Note: Unauthorized users are strictly redirected to the login page via custom middleware.
