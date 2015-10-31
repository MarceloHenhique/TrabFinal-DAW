CREATE TABLE users (
	id INT AUTO_INCREMENT,
	login VARCHAR(45) NOT NULL,
	password VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	firstname VARCHAR(45) NOT NULL,
	lastname VARCHAR(45) NOT NULL,
	telephone VARCHAR(15) DEFAULT "non-informed",
	birthdate DATE NOT NULL,
	cpf VARCHAR(15) DEFAULT "non-informed",
	rank INT DEFAULT 1,

	CONSTRAINT pk_users PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE questions (
	id INT NOT NULL AUTO_INCREMENT,
	statement TEXT NOT NULL,
	alternative_a TINYTEXT NOT NULL,
	alternative_b TINYTEXT NOT NULL,
	alternative_c TINYTEXT NOT NULL DEFAULT "non-informed",
	alternative_d TINYTEXT NOT NULL DEFAULT "non-informed",
	alternative_e TINYTEXT NOT NULL DEFAULT "non-informed",

	CONSTRAINT pk_questions PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
