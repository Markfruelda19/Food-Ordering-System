🍴 Online Food Ordering System

This project is a PHP & MySQL-based Online Food Ordering System. It allows customers to browse available food, add items to their cart, and place an order online. The system is designed for restaurants or small food businesses that want to digitize their ordering process.

🚀 Features

👨‍🍳 Customer Side
View menu items with details
Add items to cart
Place an order with name, address, and contact info
Receive an order confirmation

🛎️ Admin Side
Admin login panel
Add, update, and delete menu items
Manage food categories
View and manage customer orders
Update order status (Pending, Preparing, Delivered, Completed)
🛠️ Tech Stack

Frontend: HTML & CSS
Backend: PHP (Core PHP, no frameworks)
Database: MySQL
Server: Apache (XAMPP, WAMP, or LAMP recommended)

📂 Installation Guide

Clone the repository

git clone https://github.com/Markfruelda19/Food-Ordering-System

Move the project to server directory

For XAMPP: move the folder to htdocs
For WAMP: move the folder to www

Import the database

Open phpMyAdmin
Create a new database (e.g., food-store)
Import the SQL file included in the project (database.sql)

Configure database connection

Open config.php (or similar file)
Update with your local database credentials:
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "food-store";


Run the system

Start Apache and MySQL in XAMPP/WAMP
Open browser and go to:
http://localhost/food-store

🔑 Default Credentials
Admin Login

Username: admin

Password: admin
