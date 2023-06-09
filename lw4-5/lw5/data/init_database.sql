CREATE TABLE user
(
    id INT UNSIGNED AUTO_INCREMENT,
    first_name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    middle_name VARCHAR(200),
    gender VARCHAR(200) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(200),
    avatar_path VARCHAR(200),
    PRIMARY KEY (id)
);
 