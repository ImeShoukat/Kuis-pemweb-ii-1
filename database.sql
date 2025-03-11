CREATE DATABASE kuispemweb1

CREATE TABLE events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL
);

CREATE TABLE participants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    event_id INT,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (event_id) REFERENCES events(id)
);
