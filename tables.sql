SET FOREIGN_KEY_CHECKS = 0;

#DROP TABLE IF EXISTS users;
#DROP TABLE IF EXISTS subjects;
#DROP TABLE IF EXISTS topics;
#DROP TABLE IF EXISTS questions;
#DROP TABLE IF EXISTS exams;
#DROP TABLE IF EXISTS exams_has_questions;
DROP TABLE IF EXISTS results;

CREATE TABLE IF NOT EXISTS users (
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

CREATE TABLE IF NOT EXISTS subjects (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,

  CONSTRAINT pk_subject PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS topics (
  id INT NOT NULL AUTO_INCREMENT,
  description VARCHAR(255) NOT NULL,
  subjects_id INT NOT NULL,

  CONSTRAINT fk_topics_subjects_id FOREIGN KEY(subjects_id) REFERENCES subjects(id) ON DELETE CASCADE,
  CONSTRAINT pk_topics PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS questions (
	id INT NOT NULL AUTO_INCREMENT,
  topics_id INT NOT NULL,
	statement TEXT NOT NULL,
	alternative_a TINYTEXT NOT NULL,
	alternative_b TINYTEXT NOT NULL,
	alternative_c TINYTEXT,
	alternative_d TINYTEXT,
	alternative_e TINYTEXT,
  answer VARCHAR(1) NOT NULL,

  CONSTRAINT fk_questions_topics_id FOREIGN KEY(topics_id) REFERENCES topics(id),
	CONSTRAINT pk_questions PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS exams (
  id INT NOT NULL AUTO_INCREMENT,
  users_id INT NOT NULL,

  CONSTRAINT fk_exams_users_id FOREIGN KEY(users_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT pk_exams PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS exams_has_questions (
  exams_id INT NOT NULL,
  questions_id INT NOT NULL,

  CONSTRAINT fk_ehq_exams_id FOREIGN KEY(exams_id) REFERENCES exams(id) ON DELETE CASCADE,
  CONSTRAINT fk_ehq_questions_id FOREIGN KEY(questions_id) REFERENCES questions(id) ON DELETE CASCADE,
  PRIMARY KEY(exams_id, questions_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS results (
  users_id INT NOT NULL,
  exams_id INT NOT NULL,
  questions_id INT NOT NULL,
	answer VARCHAR(1) NOT NULL,

  CONSTRAINT fk_results_users_id FOREIGN KEY(users_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT fk_results_exams_id FOREIGN KEY(exams_id) REFERENCES exams(id) ON DELETE CASCADE,
  CONSTRAINT fk_results_questions_id FOREIGN KEY(questions_id) REFERENCES questions(id) ON DELETE CASCADE,
  PRIMARY KEY(users_id, exams_id, questions_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
