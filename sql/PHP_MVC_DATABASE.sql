-- Active: 1738672053968@@127.0.0.1@5432@PHP_MVC_DB
CREATE DATABASE php_mvc_db;

SELECT * from users;
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    email VARCHAR(60) UNIQUE NOT NULL,
    username VARCHAR(60) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role TEXT CHECK (role IN ('student', 'teacher', 'admin')) NOT NULL,
    status TEXT CHECK (status IN ('active', 'suspended', 'pending')) NOT NULL DEFAULT 'active',
    joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE article (
    id SERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT,
    status TEXT CHECK (status IN ('pending', 'active', 'draft')) NOT NULL DEFAULT 'active',
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (name, email, username, password, role) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'alicej', 'password123', 'author'),
('Bob Smith', 'bob.smith@example.com', 'bobsmith', 'securepassword456', 'admin'),
('Charlie Brown', 'charlie.brown@example.com', 'charlieb', 'charliepass789', 'author'),
('Diana Ross', 'diana.ross@example.com', 'dianar', 'dianapass101', 'author'),
('Eve Black', 'eve.black@example.com', 'eveblack', 'evepassword102', 'admin');

INSERT INTO articles (title, slug, content, status, author_id) VALUES
('How to Learn PHP MVC', 'how-to-learn-php-mvc', 'In this article, we will go through the basics of the PHP MVC framework...', 'active', 1),
('The Future of Web Development', 'future-of-web-development', 'Web development is rapidly evolving, and we need to keep up with the latest trends...', 'active', 2),
('Creating a Simple CRUD Application in PHP', 'simple-crud-application-in-php', 'This article explains how to build a basic CRUD app using PHP...', 'draft', 3),
('Exploring the MVC Architecture', 'exploring-the-mvc-architecture', 'MVC is a design pattern that is widely used in web development...', 'active', 4),
('Understanding SQL Joins', 'understanding-sql-joins', 'SQL Joins allow us to combine records from two or more tables...', 'pending', 5);
