DROP TABLE IF EXISTS user;
CREATE TABLE user (
  userId int unsigned NOT NULL auto_increment,
  userName varchar(255) NOT NULL,
  userSurname varchar(255) NOT NULL,
  userPPS varchar(15) NOT NULL,
  userEmail varchar(255) NOT NULL,
  userPassword varchar(255) NOT NULL,
  userDateOfBirth date NOT NULL,
  userPhone varchar(255) NOT NULL,
  userFeePlan varchar(255) NOT NULL,
  userPhoto varchar(255),

  PRIMARY KEY (userId)
);

DROP TABLE IF EXISTS post;
CREATE TABLE post (
  id int unsigned NOT NULL auto_increment,
  publicationData date NOT NULL,
  title varchar(255) NOT NULL,
  text varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  type varchar(20) NOT NULL,

  PRIMARY KEY (id)
);

INSERT INTO post (publicationData, title, text, link, type)
    VALUES (2020-05-10, 'test1', 'testando', 'bla', 'news');

INSERT INTO post (publicationData, title, text, link, type)
    VALUES (2020-05-10, 'test2', 'testando', 'bla', 'news');