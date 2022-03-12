DROP DATABASE IF EXISTS ap;
CREATE DATABASE ap;

USE ap;

CREATE TABLE `vendors` (
	`vendorD` INT NOT NULL,
	`vendorName` VARCHAR(45),
	`vendorADdress` VARCHAR(45),
	`vendorCity` VARCHAR(45),
	`vendorState` VARCHAR(45),
	`vendorZipCode` VARCHAR(10),
	`vendorPhone` VARCHAR(20),
	PRIMARY KEY (`vendorD`)
);

CREATE TABLE `Invoices` (
	`invoiceID` INT NOT NULL,
	`vendorID` INT,
	`invoiceNumber` VARCHAR(45),
	`invoiceDate` DATETIME,
	`invoiceTotal` DECIMAL,
	`paymentTotal` DECIMAL,
	PRIMARY KEY (`invoiceID`)
);

CREATE TABLE `lineItems` (
	`lineItemUD` INT(45) NOT NULL,
	`invoiceID` INT NOT NULL,
	`description` VARCHAR(45),
	`quantity` INT,
	`price` INT,
	`lineItemTotal` DECIMAL,
	PRIMARY KEY (`lineItemUD`)
);

CREATE INDEX vendorID
ON Invoices (vendorID);

CREATE INDEX invoiceID
ON lineItems (invoiceID);

CREATE INDEX invoiceNumber
ON Invoices (invoiceNumber);

create USER ap_user IDENTIFIED BY 'sesame';

GRANT SELECT, INSERT, UPDATE
ON ap.* TO ap_user;
