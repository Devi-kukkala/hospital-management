# Hospital Management System

## Overview
This project is a simple **Hospital Management System** designed to maintain patient details, primarily for Out-Patients (OPs), in the hospital front office. It provides basic functionalities like patient registration, login, and data management. The system is built using **PHP, HTML, CSS, and MySQL (phpMyAdmin DBMS)** and runs on a **XAMPP server**.

## Features
- Admins Registration & Login
- Admin Dashboard for Managing Patient Records
- View, Update, and Delete Patient Details
- Secure Authentication System
- Responsive UI with HTML & CSS

## Technologies Used
- **Frontend:** HTML, CSS
- **Backend:** PHP
- **Database:** MySQL (phpMyAdmin)
- **Server:** XAMPP

## Installation & Setup

### Prerequisites
- Install **XAMPP** ([Download here](https://www.apachefriends.org/download.html))
- Ensure **Apache** and **MySQL** services are running in XAMPP

### Steps
1. **Clone or Extract the Project:**
   a. git clone https://github.com/Devi-kukkala/hospital-management.git
   b.Copy the extracted folder to the `htdocs` directory inside your XAMPP installation.

2. **Database Setup:**
   - Open `phpMyAdmin` in your browser (`http://localhost/phpmyadmin`)
   - Create a new database (e.g., `hospital_db`)
   - Execute the Schema creation queries mentioned in ./sql/"sql script for schema load.txt"
3. **Run the Project:**
   - Open your browser and visit:  
     http://localhost/hospital-managment/

## Folder Structure

/hospital-managment
│── admin_dashboard.html
│── home.html
│── login.html
│── registration.html
│── sql/
│   ├── sql script for schema load.txt
│── backend/
│   ├── delete_patient.php
│   ├── get_patient.php
│   ├── list_patients.php
│   ├── login.php
│   ├── logout.php
│── assets/ (Images & CSS)


## Usage
- **New patients can register** and log in to manage their records.
- **Admins can view, edit, or delete patient details** via the admin dashboard.

## Contributions & Support
For any issues or feature requests, feel free to contribute or reach out to devikukkala2244@gmail.com

---
© 2025 Hospital Management System | All Rights Reserved

