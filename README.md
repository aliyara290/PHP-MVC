# MVC Architecture in PHP

## Overview

This project demonstrates the **MVC (Model-View-Controller)** architecture in PHP. It is designed to showcase how to structure PHP applications in a clean and maintainable way by separating concerns into three components:

- **Model**: Handles data and business logic.
- **View**: Displays the data provided by the Model in a user-friendly format.
- **Controller**: Accepts user input, interacts with the Model, and updates the View.

The project uses PostgreSQL for database interaction and provides a simple example of CRUD (Create, Read, Update, Delete) operations.

## Table of Contents

1. [Project Setup](#project-setup)
2. [Folder Structure](#folder-structure)
3. [How It Works](#how-it-works)
4. [Features](#features)

---

## Project Setup

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/mvc-php.git
```

### 2. Navigate to the Project Folder

```bash
cd mvc-php
```

### 3. Install Dependencies

If you are using Composer to manage PHP dependencies, run:

```bash
composer install
```

### 4. Configure the Database

Create a `.env` file in the root of your project (or copy from `.env.example` if available) and provide your database connection details:

```dotenv
DB_DSN=pgsql:host=your_host_name;dbname=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Ensure your PostgreSQL database is set up, and the connection details are correct.

---

## Folder Structure

The following is the basic structure of the project:

```bash
├── app/
│   ├── controllers/           
│   │   └── 
│   ├── models/                
│   │   └──    
│   ├── views/                 
│   │   └──       
│   ├── core/                  
│   │   ├── Controllers.php     
│   │   ├── Models.php                 
│   │   ├── Security.php         
│   │   ├── Session.php         
│   │   ├── Model.php         
│   │   ├── Validator.php         
│   |   └── View.php      
├── config/                 
│   │   ├── config.php 
│   │   └── Database.php
├── assets/ 
│   │   ├── css/ 
│   │   ├── js/
│   │   └── images/  
├── public/
│   ├── .htaccess 
│   └── index.php 
├── .env
└── README.md 
```

---

## How It Works

1. **Routing**: All incoming requests are directed to `public/index.php`, which serves as the entry point for the application. The router in `index.php` parses the URL and forwards the request to the appropriate controller method.

2. **Controller**: The controller is responsible for handling user requests, processing data, and interacting with the model. It receives input from the view, processes the request, and returns a response to the view.

3. **Model**: The model contains the application's data and business logic. It interacts with the database and returns data to the controller. In this project, the model uses PDO (PHP Data Objects) to interact with a PostgreSQL database.

4. **View**: The view generates the HTML output that is sent to the user's browser. The view templates are responsible for displaying the data passed by the controller.

---

## Features

- **MVC Architecture**: Clear separation of concerns.
- **CRUD Operations**: Example of basic CRUD functionality (Create, Read, Update, Delete).
- **Routing**: Simple routing mechanism to match URLs to controllers.
- **Database Integration**: PostgreSQL database interaction via PDO.
- **Clean Code Structure**: Well-organized folder structure for maintainability.
