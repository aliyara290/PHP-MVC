-- Active: 1738672053968@@127.0.0.1@5432@PHP_MVC_DB
CREATE DATABASE php_mvc_db;
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    email VARCHAR(60) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role TEXT CHECK (role IN ('admin', 'author')) DEFAULT 'author',
    joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (name, email, password, role) VALUES
('Ali Yara', 'ali.yara@example.com', 'hashedpassword1', 'admin'),
('Sara Khalid', 'sara.khalid@example.com', 'hashedpassword2', 'author'),
('Omar Naji', 'omar.naji@example.com', 'hashedpassword3', 'author'),
('Fatima Zahra', 'fatima.zahra@example.com', 'hashedpassword4', 'author'),
('Mohamed Amine', 'mohamed.amine@example.com', 'hashedpassword5', 'admin');

INSERT INTO articles (title, content, author_id) VALUES
('Introduction to PHP MVC', 'This article explains the basics of the PHP MVC pattern.', 2),
('Understanding SQL Joins', 'A deep dive into different types of SQL joins with examples.', 3),
('Building a REST API with Laravel', 'Learn how to build a RESTful API using Laravel framework.', 2),
('The Future of Web Development', 'Discussing upcoming trends in web development.', 4),
('Getting Started with Docker', 'An introductory guide to using Docker for containerization.', 5),
('Mastering Tailwind CSS', 'Learn how to efficiently use Tailwind CSS for styling.', 3),
('Optimizing Database Performance', 'Techniques for improving database query performance.', 5);
