mysql -u root

CREATE DATABASE todolist;
-- cara ngeliat informasi table --
desc todo;
-- cara ngeliat data ditable --
select * from todo;

CREATE TABLE todo (
    id int NOT NULL AUTO_INCREMENT,
    task VARCHAR(255) NOT NULL,
    status int DEFAULT 0,
    PRIMARY KEY (id)
);


-- cara masukin data ke table --
insert into todo (task) values ("ngerjain tugas EA");