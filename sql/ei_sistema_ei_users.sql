CREATE TABLE ei_sistema.ei_users
(
    ID int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_login varchar(60),
    user_name varchar(60),
    user_email varchar(100),
    user_phone varchar(20),
    user_joined date,
    user_left date,
    user_status int(4),
    user_password varchar(61)
);
CREATE UNIQUE INDEX ei_users_ID_uindex ON ei_sistema.ei_users (ID);
CREATE UNIQUE INDEX ei_users_user_password_uindex ON ei_sistema.ei_users (user_password);
INSERT INTO ei_sistema.ei_users (ID, user_login, user_name, user_email, user_phone, user_joined, user_left, user_status, user_password) VALUES (1, 'karol', 'Karolis', 'karolis.vaikutis@gmail.com', '868948423', '2017-10-20', null, 1, null);
INSERT INTO ei_sistema.ei_users (ID, user_login, user_name, user_email, user_phone, user_joined, user_left, user_status, user_password) VALUES (2, 'admin', null, 'email@test.lt', null, null, null, null, '$2y$10$d34jKIb/DNRCjJcla7LEFuqmtBMIbEupA7bZyH7wwKm12.Wd.kzFS');
INSERT INTO ei_sistema.ei_users (ID, user_login, user_name, user_email, user_phone, user_joined, user_left, user_status, user_password) VALUES (3, 'admin', 'Karolis', 'email@test.lt', null, null, null, 1, '$2y$10$LsWwWxxb7rkDFMOfYeFRzeNY5NdMGNHnQ1bl2/6g3ZJes2FSIITlS');