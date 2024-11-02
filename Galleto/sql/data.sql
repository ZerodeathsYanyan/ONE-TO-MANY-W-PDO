create table Chefs (
	chef_ID INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	date_of_birth DATE,
    specialization VARCHAR(50),
	date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
create table Dishes (
	dishes_ID INT AUTO_INCREMENT PRIMARY KEY,
	nameofdish VARCHAR(50),
	typeofdish VARCHAR(50),
	ratings INT,
    chef_ID VARCHAR(50)
);