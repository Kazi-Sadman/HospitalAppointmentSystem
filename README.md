# 🏥 Hospital Appointment Booking System

A complete web-based hospital appointment management system built with PHP, MySQL, HTML, CSS, JavaScript, and AJAX, following the MVC architectural pattern.

---

## 📌 Table of Contents
* [Problem Statement](#-problem-statement)
* [Our Solution](#-our-solution)
* [Project Overview](#-project-overview)
* [Architecture](#-architecture)
* [User Roles](#-user-roles)
* [Features](#-features)
* [Technology Stack](#-technology-stack)
* [Folder Structure](#-folder-structure)
* [Naming Convention](#-naming-convention)
* [Database Schema](#-database-schema)
* [Security Features](#-security-features)
* [Installation Guide](#-installation-guide-xampp)
* [Demo Accounts](#-demo-accounts)
* [How to Test Each Module](#-how-to-test-each-module)
* [AJAX Features](#-ajax-features)

---

## 📌 Problem Statement
In many hospitals and clinics, appointment scheduling is still done manually via phone calls, walk-ins, or paper registers. This leads to:

* **Double-booking** and scheduling conflicts
* **Long waiting times** and poor patient experience
* **Lack of transparency** – patients cannot see doctor availability
* **Inefficient record-keeping** – doctors and admins struggle to track appointments and medical notes
* **No centralised system** for managing doctors, specialisations, and patient records

---

## 🎯 Our Solution
This project solves these problems by providing a centralised, role-based online appointment booking system that allows:

* **Patients** to book, view, and cancel appointments anytime, anywhere, and rate/review doctors post-appointment.
* **Doctors** to manage their schedules, accept/reject requests, and record consultation notes.
* **Admins** to oversee the entire system including doctors, specialisations, patients, and all appointments.
* **Secure Authentication** via password hashing and Role-Based Access Control (RBAC).

---

## 🧩 Project Overview
This is a full-stack web application developed as a university group assignment. It consists of three distinct modules, each built by a different team member, but all sharing a common database and authentication system.

---

## 🏗️ Architecture

The project follows the MVC (Model–View–Controller) architecture:

Layer	Directory	Responsibility
Model	models/	Handles database operations and application data
View	views/	Handles user interface and page presentation
Controller	controllers/	Processes requests and controls application flow
AJAX	ajax/	Handles asynchronous requests without full-page reloads
Config	config/	Contains database and application configuration
Database	database/	Contains SQL scripts and database structure
Includes	includes/	Contains reusable UI components
Assets	assets/	Contains CSS and JavaScript resources

## 👥 User Roles

| Role | Responsibilities | File Suffix |
| :--- | :--- | :---: |
| **Patient** | Register, browse doctors, book/cancel appointments, view notes, rate doctors | `S` |
| **Doctor** | Manage appointments, add consultation notes, view patient history | `M` |
| **Admin** | Manage doctors, specialisations, view all appointments, manage patients | `Z` |

---

## ✨ Features

### 👤 Patient Module (Suffix S)
| Feature | Description |
| :--- | :--- |
| **🔐 Register** | Create a new patient account |
| **🔑 Login/Logout** | Secure session-based authentication |
| **👤 Profile** | View and update personal information (name, phone) |
| **🔍 Browse Doctors** | View all doctors with specialization, fee, and experience |
| **🔎 Live Search** | Search doctors by name or specialization using AJAX |
| **📅 Book Appointment** | Book appointment with date, time, and reason |
| **📋 My Appointments** | View all appointments with status (*pending/accepted/completed/cancelled*) |
| **❌ Cancel Appointment**| Cancel pending appointments |
| **📝 Consultation Notes**| View doctor's diagnosis and prescription |
| **⭐ Rate & Review** | Rate doctors (1–5 stars) and leave reviews after completed appointments |

### 👨‍⚕️ Doctor Module (Suffix M)
| Feature | Description |
| :--- | :--- |
| **🔑 Login/Logout** | Secure session-based authentication |
| **📊 Dashboard** | View appointment statistics (*total, pending, accepted, completed*) |
| **📋 Appointments** | View all assigned appointments with patient details |
| **✅ Accept/Reject** | Accept or reject appointments instantly via AJAX |
| **📝 Consultation Notes**| Add diagnosis and prescription – automatically marks appointment as completed |
| **📜 Patient History** | View complete appointment history of any patient |
| **👤 Profile** | Update profile (*name, phone, consultation fee*) |

### 🛠️ Admin Module (Suffix Z)
| Feature | Description |
| :--- | :--- |
| **🔑 Login/Logout** | Secure session-based authentication |
| **📊 Dashboard** | System statistics (*total doctors, patients, appointments, pending/completed*) |
| **👨‍⚕️ Manage Doctors** | Add, edit, and delete doctors with live AJAX search |
| **🏷️ Manage Specializations** | Add, edit, and delete medical specializations |
| **📋 All Appointments** | View every appointment in the system |
| **👤 Manage Patients** | View and delete patient accounts |

---

## 🛠️ Technology Stack

### Backend
* **PHP 7.4+**: Server-side scripting (procedural, no frameworks)
* **MySQL 5.7+**: Database management
* **Prepared Statements**: SQL injection prevention

### Frontend
* **HTML5**: Structure
* **CSS3**: Styling (custom CSS, no Bootstrap/Tailwind)
* **JavaScript (Vanilla)**: Client-side interactivity
* **AJAX (XMLHttpRequest)**: Asynchronous requests without page reloads (no jQuery)

### Security
* **Password Hashing**: `password_hash()` with `bcrypt`
* **Authentication**: Session-based (`$_SESSION`)
* **Authorization**: Role-Based Access Control (RBAC)
* **Validation**: Dual-layer client-side (JS) and server-side (PHP) validation

### Environment
* **Server**: Apache (XAMPP)
* **Database Tool**: phpMyAdmin
* **Version Control**: Git / GitHub

---
🔄 Application Flow
User
 │
 ▼
index.php / View
 │
 ▼
Controller
 │
 ├──────────────► Model
 │                   │
 │                   ▼
 │               MySQL Database
 │
 ▼
View / Response

For asynchronous operations:

User Action
     │
     ▼
JavaScript
     │
     ▼
AJAX Endpoint
     │
     ▼
Controller / Model
     │
     ▼
MySQL Database
     │
     ▼
JSON Response
     │
     ▼
Updated UI

📂 Project Structure
HospitalAppointmentSystem/
│
├── 📁 ajax/                         # AJAX endpoints
│   ├── 📄 adminAjaxZ.php            # Admin AJAX operations
│   ├── 📄 doctorAjaxM.php           # Doctor AJAX operations
│   └── 📄 patientAjaxS.php          # Patient AJAX operations
│
├── 📁 assets/                       # Static frontend assets
│   ├── 📁 css/                      # Custom CSS stylesheets
│   └── 📁 js/                       # Custom JavaScript files
│
├── 📁 config/                       # Application configuration
│   └── 📄 database.php              # MySQL database connection
│
├── 📁 controllers/                  # MVC Controller layer
│   ├── 📄 adminControllerZ.php      # Admin request handling
│   ├── 📄 authController.php        # Authentication handling
│   ├── 📄 doctorControllerM.php     # Doctor request handling
│   ├── 📄 logoutController.php      # Logout handling
│   └── 📄 patientControllerS.php    # Patient request handling
│
├── 📁 database/                     # Database scripts
│   └── 📄 hospital.sql              # Database schema and sample data
│
├── 📁 includes/                     # Reusable UI components
│   ├── 📄 footer.php                # Common footer
│   ├── 📄 header.php                # Common header
│   └── 📄 navbar.php                # Navigation bar
│
├── 📁 models/                       # MVC Model layer
│   ├── 📄 adminModelZ.php           # Admin database operations
│   ├── 📄 doctorModelM.php          # Doctor database operations
│   └── 📄 patientModelS.php         # Patient database operations
│
├── 📁 views/                        # MVC View layer
│   ├── 📁 admin/                    # Admin interface/pages
│   ├── 📁 doctor/                   # Doctor interface/pages
│   ├── 📁 patient/                  # Patient interface/pages
│   └── 📁 shared/                   # Shared pages
│       ├── 📄 login.php             # Login page
│       └── 📄 register.php          # Registration page
│
├── 📄 home.php                      # Landing / Home page
├── 📄 patientDashboardS.php         # Patient dashboard
├── 📄 index.php                     # Main application entry point
└── 📄 README.md                     # Project documentation
