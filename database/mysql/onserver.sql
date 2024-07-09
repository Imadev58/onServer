CREATE DATABASE IF NOT EXISTS `onserver`;


USE `onserver`;


CREATE TABLE IF NOT EXISTS `Users` (
    `UserID` INT AUTO_INCREMENT PRIMARY KEY,
    `Email` VARCHAR(255) NOT NULL UNIQUE,
    `FirstName` VARCHAR(100) NOT NULL,
    `LastName` VARCHAR(100) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `Address` VARCHAR(255),
    `PostalCode` VARCHAR(20),
    `City` VARCHAR(100),
    `Country` VARCHAR(100),
    `LastLoggedIn` DATETIME,
    `UserType` ENUM('customer', 'support', 'admin') NOT NULL
);


CREATE TABLE IF NOT EXISTS `Products` (
    `ProductID` INT AUTO_INCREMENT PRIMARY KEY,
    `ProductName` VARCHAR(255) NOT NULL,
    `Price` DECIMAL(10, 2) NOT NULL,
    `Status` ENUM('active', 'inactive') NOT NULL,
    `MonthlyBilling` BOOLEAN NOT NULL DEFAULT FALSE,
    `RenewalDate` DATE
);


CREATE TABLE IF NOT EXISTS `Invoices` (
    `InvoiceID` INT AUTO_INCREMENT PRIMARY KEY,
    `Price` DECIMAL(10, 2) NOT NULL,
    `UserID` INT NOT NULL,
    `InvoiceDate` DATE NOT NULL,
    `DueDate` DATE NOT NULL,
    `RenewalReminderDate` DATE NOT NULL,
    `Status` ENUM('PAID', 'IN PROGRESS', 'UNPAID') NOT NULL
);
