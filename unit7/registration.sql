CREATE DATABASE IF NOT EXISTS registration;

USE registration;

#DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
	user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(255) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	province VARCHAR(2) NOT NULL,
	PRIMARY KEY(user_id)
);

#INSERT INTO users (Name,Email,Phone,Province)
#	VALUES
#	("Whoopi","Etiam.bibendum.fermentum@feugiatSed.net","(604) 925-5268","BC"),
#	("Ima","ac@DonecfringillaDonec.com","(709) 791-0182","NL"),
#	("Oprah","eget.tincidunt.dui@blanditmattis.org","(250) 839-7106","BC"),
#	("Bo","ut.sem.Nulla@Duiscursus.co.uk","(672) 943-1404","BC"),
#	("Melodie","In.mi@scelerisquelorem.edu","(289) 555-7264","ON"),
#	("Brooke","cursus.vestibulum.Mauris@MaurismagnaDuis.edu","(778) 776-4180","BC"),
#	("Zachery","ligula.Aliquam@in.org","(418) 312-6240","QC"),
#	("Blaze","egestas@consectetueripsum.ca","(867) 466-6679","NU"),
#	("Dale","lectus.rutrum.urna@fringillaporttitor.org","(343) 513-6663","ON"),
#	("Adam","Curabitur@Nunccommodoauctor.com","(604) 416-3892","BC");

ALTER TABLE users
ADD COLUMN food VARCHAR(100) NULL;