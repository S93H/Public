USE twitter;

INSERT INTO users (username, pass, mail, birthdate, firstname, lastname, profile_picture) VALUES ("La montage", "9ca81f2e8b7565329da6c87fb1538cd2210b1b5a", "mon@tagne.com", "1993-01-01", "Sylvain", "Hutt", "../view/media/users.png");
INSERT INTO users (username, pass, mail, birthdate, firstname, lastname, profile_picture) VALUES ("Raph Raphy", "9ca81f2e8b7565329da6c87fb1538cd2210b1b5a", "raph@raphy.com", "1992-01-01", "Raphael", "Froehly", "../view/media/users.png");
INSERT INTO users (username, pass, mail, birthdate, firstname, lastname, profile_picture) VALUES ("The Boss", "9ca81f2e8b7565329da6c87fb1538cd2210b1b5a", "james@brown.com", "1946-01-01", "James", "Brown", "../view/media/users.png");
INSERT INTO users (username, pass, mail, birthdate, firstname, lastname, profile_picture) VALUES ("La Daronne", "9ca81f2e8b7565329da6c87fb1538cd2210b1b5a", "co@co.com", "1993-01-01", "Colette", "Ostwald", "../view/media/users.png");

INSERT INTO posts (id_user, content, created_at) VALUES (1, "T'as pas un p'tit coup de blanc ?", NOW());
INSERT INTO posts (id_user, content, created_at) VALUES (2, "Vraiment, il y a des gens ils sont trop cringes", NOW());
INSERT INTO posts (id_user, content, created_at) VALUES (3, "Papa's got a brand new bag !", NOW());
INSERT INTO posts (id_user, content, created_at) VALUES (4, "Putain y en à marre des rats !", NOW());
