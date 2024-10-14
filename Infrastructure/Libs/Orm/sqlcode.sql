-- Active: 1728934100171@@127.0.0.1@3306
CREATE DATABASE events_web
    DEFAULT CHARACTER SET = 'utf8mb4';



-- Usar la base de datos recién creada
USE events_web;

-- Crear la tabla User
CREATE TABLE User (
  id INT AUTO_INCREMENT PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  last_name VARCHAR(150) NOT NULL,
  role VARCHAR(50) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  phone VARCHAR(20),
  status VARCHAR(20) NOT NULL DEFAULT 'active',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);

-- Crear la tabla Event
CREATE TABLE Event (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  duration FLOAT,
  attendees INT,
  event_date DATE NOT NULL,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES User(id)
);