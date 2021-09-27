drop database if exists oceanicdb;
create database if not exists oceanicdb;

use oceanicdb;

-- USER INFORMATION TABLE

CREATE TABLE USER (
	user_id INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(256) NULL UNIQUE KEY,
	user_pass VARCHAR(256) NULL,
	firstname VARCHAR(50),
	lastname VARCHAR(50),
	mi CHAR(1),
	is_moderator BOOLEAN,
	join_date DATETIME DEFAULT current_timestamp,
    pin VARCHAR(10)
);

-- POST INFORMATION TABLE

CREATE TABLE POST (
	username VARCHAR(256) NULL,
	post_id INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT unsigned NOT NULL,
	date_created TIMESTAMP,
	post_title VARCHAR(256),
	post_body VARCHAR(1000),
    FOREIGN KEY (username) REFERENCES USER(username)
);

-- FOREIGN KEY (status_id) REFERENCES STATUS(status_id)
-- status_id INT unsigned NOT NULL,

CREATE TABLE IMAGE (
	image_id INT unsigned auto_increment PRIMARY KEY,
    file_name NVARCHAR(255) NOT NULL,
    mimetype NVARCHAR(50) NOT NULL,
    img_data longblob NOT NULL,
    post_id INT unsigned NOT NULL,
	FOREIGN KEY (post_id) REFERENCES POST(post_id) on delete cascade
);


-- STATUS TABLE MAY BE ADDED. YET TO BE DETERMINED.  IF ADDED WILL BE USED FOR MODERATOR APPROVAL OF POSTS.
/*

	CREATE TABLE STATUS (
		status_id INT unsigned NOT NULL PRIMARY KEY,
		post_id INT unsigned NOT NULL,
		status_set VARCHAR(100),
		status_approved BOOLEAN,
		status_declined BOOLEAN,
		status_waiting BOOLEAN,
		status_blocked BOOLEAN,
		FOREIGN KEY (post_id) REFERENCES POST(post_id)
);

*/

-- USER TABLE CONSTRAINTS

ALTER TABLE USER
	ADD CONSTRAINT first_name_check CHECK (firstname NOT LIKE '%[^A-Z]%');

ALTER TABLE USER
	ADD CONSTRAINT last_name_check CHECK (lastname NOT LIKE '%[^A-Z]%');

ALTER TABLE USER
	ADD CONSTRAINT mi_name_check CHECK (mi NOT LIKE '%[^A-Z]%');

ALTER TABLE IMAGE
	ADD UNIQUE KEY file_name(file_name);


SELECT * FROM USER;
SELECT * FROM POST p.*, i.imaged_id left join IMAGE i on p.post_id = i.post_id;
-- SELECT * FROM STATUS;
SELECT * FROM IMAGE;

-- INSERT INTO `oceanicdb`.`post`
-- (`post_title`,
-- `post_body`)
-- VALUES
-- ('testtitel','tezsuidhfglidsfhgldkfjhlkdfsjhgfdlsk' );

INSERT INTO USER (username, user_pass, firstname, lastname, mi, pin) VALUES ('admin', 'pass', 'aiden', 'smith', 't', '0220');

