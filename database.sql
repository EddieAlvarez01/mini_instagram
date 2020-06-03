CREATE DATABASE IF NOT EXISTS db_mini_instagram;
USE db_mini_instagram;

#TABLA DE ROLES
CREATE TABLE Role(
	id TINYINT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    CONSTRAINT pk_role PRIMARY KEY(id)
)ENGINE=InnoDB;

#TABLA DE USUARIOS
CREATE TABLE User(
	id INT UNSIGNED AUTO_INCREMENT,
    role_id TINYINT UNSIGNED NOT NULL,
    name VARCHAR(200) NOT NULL,
    surname VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    nickname VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    remember_token VARCHAR(255),
    CONSTRAINT pk_user PRIMARY KEY(id),
    CONSTRAINT uq_user_nickname UNIQUE(nickname),
    CONSTRAINT fk_user_role FOREIGN KEY(role_id) REFERENCES Role(id)
)ENGINE=InnoDB;

#TABLA DE IMAGENES
CREATE TABLE Image(
	id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    path VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_image PRIMARY KEY(id),
    CONSTRAINT fk_image_user FOREIGN KEY(user_id) REFERENCES User(id)
)ENGINE=InnoDB;

#TABLA DE COMENTARIOS
CREATE TABLE Comment(
	id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    image_id INT UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_comment PRIMARY KEY(id),
    CONSTRAINT fk_comment_user FOREIGN KEY(user_id) REFERENCES User(id),
    CONSTRAINT fk_comment_image FOREIGN KEY(image_id) REFERENCES Image(id)
)ENGINE=InnoDB;

#TABLA DE LIKES
CREATE TABLE Likes(
	image_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created_at DATETIME,
	updated_at DATETIME,
    CONSTRAINT pk_likes PRIMARY KEY(image_id, user_id),
    CONSTRAINT fk_likes_image FOREIGN KEY(image_id) REFERENCES Image(id),
    CONSTRAINT fk_likes_user FOREIGN KEY(user_id) REFERENCES User(id)
)ENGINE=InnoDB;