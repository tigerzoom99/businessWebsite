#-------------------------------------/
# database for Sunrise Cafe
# Author: Tyler Chilcote
# Date: 1-16-2020 Initial Deployment
#-------------------------------------/

DROP DATABASE IF EXISTS sunrise;
CREATE DATABASE sunrise;

USE sunrise;

#create employees table
CREATE TABLE IF NOT EXISTS employees (
	empNo			INT				NOT NULL 	AUTO_INCREMENT,
	fName			VARCHAR(255)	NOT NULL,
	lName			VARCHAR(255)	NOT NULL,
	companyPosition	VARCHAR(255)	NOT NULL,
	PRIMARY KEY(empNo) #sets empNo as Primary Key
);

#create contact table
CREATE TABLE IF NOT EXISTS contact (
	visitorID		INT				NOT NULL	AUTO_INCREMENT,
	visitorName 	VARCHAR(255)	NOT NULL,
	visitorEMail	VARCHAR(255)	NOT NULL,
	visitorPhone	VARCHAR(25)		NOT NULL,
	visitorDate		DATE			NOT NULL,
	contactReason	VARCHAR(10)		NOT NULL,
	woodchuckAnswer	VARCHAR(3)		NOT NULL,
	visitorComment	VARCHAR(500)	NOT NULL,
	empNo			INT				NOT NULL	REFERENCES employees(empNo), #sets empNo as Foreign Key
	PRIMARY KEY (visitorID) #sets visitorID as Primary Key
);

#insert test employees
INSERT INTO `employees` (`fName`, `lName`, `companyPosition`) VALUES
('Tyler', 'Chilcote', 'Company President'),
('Chris', 'Jorgensen', 'Co-President'),
('Joshua', 'Anderson', 'Co-President'),
('Sally', 'Smith', 'HR Manager'),
('Maxwell', 'Star', 'Head Chef'),
('Mabel', 'Smith', 'Recruiter'),
('Wander', 'Severson', 'Head Spokeperson'),
('Janice', 'Hooper', 'January Supervisor'),
('Ferby', 'Niles', 'Februrary Supervisor'),
('Michigan', 'Martinez', 'March Supervisor'),
('Charlie', 'Rexidol', 'April Supervisor'),
('Emily', 'Lyn', 'May Supervisor'),
('Ryan', 'Allan', 'June Supervisor'),
('Reese', 'Howell', 'July Supervisor'),
('Jacob', 'Masters', 'August Supervisor'),
('Sarah', 'Cook', 'September Supervisor'),
('Dante', 'Inferno', 'October Supervisor'),
('Poe', 'Anders', 'November Supervisor'),
('Ariana', 'Skye', 'December Supervisor'),
('Phoebe', 'Walker', 'Permanent Grounds Custodian');

#insert test visitors and comments
INSERT INTO `contact` (`visitorName`, `visitorEMail`, `visitorPhone`, `visitorDate`, `contactReason`, `woodchuckAnswer`, `visitorComment`, `empNo`) VALUES
('Bob', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Nick M', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '7'),
('anonymous', 'test@gmail.com', '9163333333', '2020-01-01', 'review', 'yes', 'Lorem ipsum', '12'),
('William William', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '3'),
('Martha232', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Bert', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Dean', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Carole', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Bonnie H', 'test@gmail.com', '9163333333', '2020-01-01', 'complaint', 'yes', 'Lorem ipsum', '4'),
('Brian U', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '14'),
('HerbertDaBear', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Shmee', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '11'),
('Captain Hook', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '5'),
('PileOfTrash', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('BruceWayneNotBatman', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('Linda', 'test@gmail.com', '9163333333', '2020-12-03', 'other', 'yes', 'Lorem ipsum', '4'),
('anonymous', 'test@gmail.com', '9163333333', '2020-01-01', 'praise', 'yes', 'Lorem ipsum', '5'),
('anon', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '4'),
('anonymous', 'test@gmail.com', '9163333333', '2020-01-01', 'other', 'yes', 'Lorem ipsum', '8'),
('Xander Smith', 'test@gmail.com', '9163333333', '2020-01-02', 'other', 'no', 'Lorem ipsum', '2');