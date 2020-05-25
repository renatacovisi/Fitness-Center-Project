DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id int unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  surname varchar(255) NOT NULL,
  PPS varchar(15) NOT NULL,
  email varchar(100) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  dateOfBirth date NOT NULL,
  phone varchar(255) NOT NULL,
  plan varchar(255) NOT NULL,
  photo varchar(255),
  type varchar(40),

  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS post;
CREATE TABLE post (
  id int unsigned NOT NULL auto_increment,
  publicationData date NOT NULL,
  title varchar(255) NOT NULL,
  text varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  type varchar(20) NOT NULL,
  buttonText varchar(20) NOT NULL,
  photoLink varchar(255) NOT NULL,

  PRIMARY KEY (id)
)DEFAULT CHARSET=UTF8;

DROP TABLE IF EXISTS fee;
CREATE TABLE fee (
  id int unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  text varchar(255) NOT NULL,
  price double NOT NULL,
  maxClasses int NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARSET=UTF8;

INSERT INTO post (publicationData, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Online Classes', 'Be with us every morning on our online classes to meditate and work out with us in this difficult times', 'registration.php', 'news', 'Join Online', '../app/images/online-yoga.jpg');

INSERT INTO post (publicationData, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Yoga in the Park', 'On 13th february we will have a class on St Stephens Green', '#', 'news', 'Join us', '../app/images/yoga-park.jpg');

INSERT INTO post (publicationData, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Free Trial', 'Do your first class free!', 'contact_us.php', 'offers', 'Contact Us', '../app/images/free-trial.jpg');

INSERT INTO post (publicationData, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'First month free', 'Ten first registered members will have first month free',
    'registration.php', 'offers', 'Register now!', '../app/images/pilates.jpg');

INSERT INTO user (name, surname, PPS, email, password, dateOfBirth, phone, plan, photo, type)
    VALUES ('Renata', 'Covisi', '111111', 'renata@hotmail.com', '12345678', 1991-11-18, '3333333', 'tree', 'xxxx.jpg', 'admin');

INSERT INTO user (name, surname, PPS, email, password, dateOfBirth, phone, plan, photo, type)
    VALUES ('Alex', 'B', '2222222', 'alex@hotmail.com', '87654321', 1990-06-21, '3333333', 'tree', 'xxxx.jpg', 'member');

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Tree', 'Basic plan where you can choose 4 differente classes*', 59.90, 4 );

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Lotus', 'Medium plan where you can choose 6 differente classes*', 89.90, 6 );

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Butterfly', 'Unlimited plan where you can do all differente classes*', 129.90, 8 );