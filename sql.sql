CREATE TABLE user {
	id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    pwd varchar(128) not null,
    fname varchar(128) not null,
    lname varchar(128) not null,
    email varchar(128) not null
}

INSERT INTO user (uid, pwd, fname, lname, email) VALUES ('admin', 'whatsup', 'Nishant', 'Teck', 'nishant.teckchandani@gmail.com');
INSERT INTO user (uid, pwd, fname, lname, email) VALUES ('kvajihi', 'yellow', 'hussain', 'vaji', 'kvajihi@gmail.com');