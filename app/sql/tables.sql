DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id int unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  surname varchar(255) NOT NULL,
  PPS varchar(15) NOT NULL,
  email varchar(100) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  securityMessage varchar (255) NOT NULL,
  dateOfBirth date NOT NULL,
  phone varchar(255) NOT NULL,
  card varchar (255) NOT NULL,
  nameOnCard varchar (255) NOT NULL,
  securityCode varchar (4) NOT NULL,
  expirationDate date NOT NULL,
  plan varchar(255),
  type varchar(40) NOT NULL,

  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS post;
CREATE TABLE post (
  id int unsigned NOT NULL auto_increment,
  publicationDate date NOT NULL,
  title varchar(255) NOT NULL,
  text varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  type varchar(20) NOT NULL,
  buttonText varchar(20) NOT NULL,
  photoLink varchar(255) NOT NULL UNIQUE,

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


DROP TABLE IF EXISTS class;
CREATE TABLE class (
  id int unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  shortDescription varchar(255) NOT NULL,
  longDescription varchar(1000) NOT NULL,
  timetable varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  plan varchar(255) NOT NULL,
  externalLink varchar(255) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARSET=UTF8;

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Online Classes', 'Be with us every morning on our online classes to meditate and work out with us in this difficult times', 'registration.php', 'news', 'Join Online', '../app/images/online-yoga.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Yoga in the Park', 'On 13th february we will have a class on St Stephens Green', '#', 'news', 'Join us', '../app/images/yoga-park.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'Free Trial', 'Do your first class free!', 'contact_us.php', 'offers', 'Contact Us', '../app/images/free-trial.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES (2020-05-10, 'First month free', 'Ten first registered members will have first month free',
    'registration.php', 'offers', 'Register now!', '../app/images/pilates.jpg');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
    VALUES ('Renata', 'Covisi', '111111', 'renata@hotmail.com', '12345678', 'hashtagmuito', 1991-11-18, '3333333', '2222222','Renata', '111', 2022-10-11, 'tree', 'admin');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
    VALUES ('Alex', 'B', '2222222', 'alex@hotmail.com', '87654321', 'hashtagmuito', 1990-06-21, '3333333', '4444444', 'Alex', '222', 2025-10-22, 'tree', 'member');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
VALUES ('Cristina', 'Silva', '3333333', 'cristina@hotmail.com', '12345612', 'hashtagmuito', 1986-02-27, '5555555', '1111111','Cristina', '333', 2023-05-26, 'Lotus', 'admin');

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Tree', 'Basic plan where you can choose 4 differente classes*', 59.90, 4 );

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Lotus', 'Medium plan where you can choose 6 differente classes*', 89.90, 6 );

INSERT INTO fee (name, text, price, maxClasses)
    VALUES ('Butterfly', 'Unlimited plan where you can do all differente classes*', 129.90, 8 );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Hatha Yoga', 'You will get a gentle introduction to the most basic yoga postures.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '7h45', '../app/images/side_plank.svg', 'Tree', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Pilates', 'Low-impact exercise that aims to strengthen muscles while improving postural alignment and flexibility.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '8h45', '../app/images/one_leg_up.svg', 'Butterfly', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Slow Vinyasa', 'Sequence of fluid, movement-intensive practices',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '9h45', '../app/images/cobra.svg', 'Butterfly', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Meditation', 'Training in awareness and getting a healthy sense of perspective.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '10h45', '../app/images/seated_heart.svg', 'Butterfly', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Power Vinyasa', 'Invigorating, powerful, energetic form of yoga where participants move or “flow” from pose to pose.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '11h45', '../app/images/two_legs_up.svg', 'Butterfly', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Pregnancy Yoga', 'Practice adapted for "moms to be" and is tailored to women in all trimesters.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '12h45', '../app/images/stratch_seated.svg', 'Butterfly', '#' );


INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Yin Yoga', 'Slow-paced style with seated postures that are held for longer periods of time.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '13h45', '../app/images/tree.svg', 'Butterfly', '#' );

INSERT INTO class (name, shortDescription, longDescription, timetable, image, plan, externalLink)
    VALUES ('Zumba', 'Dance inspired exercise classes.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at tortor erat. Donec rutrum ac justo vel pharetra. Morbi eu felis at sem finibus pulvinar. Fusce aliquam, enim in ultricies faucibus, mauris sapien mollis velit, vel sagittis massa magna tincidunt risus. Curabitur blandit consectetur accumsan. Duis ac lacus metus. Suspendisse potenti. Ut imperdiet ipsum ligula, sed molestie mi congue sit amet. Ut efficitur magna et nisi elementum rhoncus. Pellentesque fringilla elit justo, at varius mauris ultricies non. Sed nec imperdiet tellus, quis euismod massa. Cras eget augue eros. Proin diam lectus, condimentum at odio a, mollis ullamcorper est. Donec tincidunt magna vel ligula bibendum, at consequat velit viverra. Praesent quis velit iaculis, mattis augue sed, accumsan nisi. Donec luctus ex sed felis elementum, ut rutrum justo mattis.',
    '19h45', '../app/images/hold_leg_up.svg', 'Butterfly', '#' );




/*
 *
 *
 * created by Cristina
 *
 *
 */

DROP TABLE IF EXISTS teacher;
CREATE TABLE teacher
(
    id          int unsigned NOT NULL auto_increment,
    name        varchar(255) NOT NULL,
    surname     varchar(255) NOT NULL,
    text        varchar(400) NOT NULL,
    description varchar(255) NOT NULL,
    photoLink   varchar(255) NOT NULL,

    PRIMARY KEY (id)
);


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Audrey', 'OConnell', 'Audrey completed her 200hrs YTT in Hatha yoga and has been mentored by senior Iyengar teacher, Orla Punch for the past three years', 'Her classes are focused on alignment, strength and relaxation', '../app/images/our_team_audrey.jpg');


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Nance', 'McGowen', 'Nance has experience in many styles including Childrens yoga, Restorative, Ashtanga, Trauma Sensitive Yoga, and Yin yoga', 'Her classes are focused on flexibility ad relaxation', '../app/images/our_team_nance.jpg');


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Zoe', 'Burke', 'Hailing from Australia, Zoe found Yoga and quickly fell in love. She moved to Ireland and completed her 250hrs Yoga Teacher Training at Samadhi, Orla Punch for the past three years', 'Zoe teaches a strong vinyasa practice', '../app/images/our_team_zoe.jpg');


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Patrick', 'Prince', 'Patrick is a yoga and breath-work teacher. He took his teacher training in Goa, India, studying the lineages of Hatha, Vinyasa and Therapeutic yoga', 'His yoga classes are breath focused and based on alignment and conscious movement', '../app/images/our_team_patrick.jpg');


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Paul', 'OBrien', 'Paul spent his youth training in London. He began to train in India in 2004 where he spent 2 years experiencing yoga as a way of life', 'His main practice there was in the Ashtanga Vinyasa tradition', '../app/images/our_team_paul.jpg');


INSERT INTO teacher (name, surname, text, description, photoLink)
VALUES ('Julie', 'Lyane', 'Julie originally qualified in Sports Therapy, Rehab and PT. She completed her 250hrs YT Training with The Yoga Rooms in Dublin', 'Her classes are energetic and challenging', '../app/images/our_team_julie.jpg');




-- DROP TABLE IF EXISTS testimonial;
-- CREATE TABLE testimonial
-- (
--     id        int unsigned NOT NULL auto_increment,
--     user_id   int          NOT NULL,
--     title     varchar(255) NOT NULL,
--     text      varchar(255) NOT NULL,
--     name      varchar(255) NOT NULL,
--     stars     int(1) NOT NULL,
--     photoLink varchar(255) NOT NULL
--         PRIMARY KEY (id)
--         FOREIGN KEY (user_id) REFERENCES user (id)
--         ON UPDATE CASCADE
--         ON DELETE CASCADE
-- );
--
-- INSERT INTO testimonial (title, text, name, stars, photoLink)
-- VALUES ('Excelent classes', 'In this fast paced and sometimes unsettling world we live in coming to the Yoga center allows me to bring my mind, body and soul back into balance', '@MikeJr ', 4,  './app/images/side_plank.svg');
--
--
-- INSERT INTO testimonial (title, text, name, stars, photoLink)
-- VALUES ('Perfect for injuries', 'I returned to Yoga primarily because of a knee injury and an inability to perform high impact exercise. My knee is much improved and so is my body as a whole', '@JessM', 4 , '../app/images/one_leg_up.svg');
--
--
-- INSERT INTO testimonial (title, text, name, stars, photoLink)
-- VALUES ('Good for health', 'After a hectic/stressful day, coming to Yoga is calming and restorative. Since I’ve been practicing I am much stronger have much greater range of motion', '@LukeY', 4 , '../app/images/cobra.svg');
--
--
-- INSERT INTO testimonial (title, text, name, stars, photoLink)
-- VALUES ('Love it', 'One of the most relaxing experiences I have ever felt while being able to melt into myself', '@JenS', 4 , '../app/images/seated_heart.svg');



DROP TABLE IF EXISTS contactUs;
CREATE TABLE contactUs
(
    id         int unsigned NOT NULL auto_increment,
    name       varchar(255) NOT NULL,
    email      varchar(100) NOT NULL UNIQUE,
    phone      varchar(255) NOT NULL,
    message    mediumtext,
    link       varchar(255) NOT NULL,
    buttonText varchar(20)  NOT NULL,

    PRIMARY KEY (id)
);



-- DROP TABLE IF EXISTS enrollement;
-- CREATE TABLE enrollement
-- (
--     user_id  int  NOT NULL,
--     class_id int  NOT NULL,
--     date     date NOT NULL,
--
--         FOREIGN KEY (user_id) REFERENCES user (id)
--         FOREIGN KEY (class_id) REFERENCES class(id)
--         ON UPDATE CASCADE ON DELETE,
-- );

DROP TABLE IF EXISTS page;
CREATE TABLE page (
                      id int unsigned NOT NULL auto_increment,
                      name varchar(255) NOT NULL,
                      level varchar(255) NOT NULL,

                      PRIMARY KEY (id)
);

INSERT INTO page (name, level)
VALUES ('Renata', 'admin' );

INSERT INTO page (name, level)
VALUES ('Alex', 'member' );

INSERT INTO page (name, level)
VALUES ('Cristina', 'public' );

--
-- DROP TABLE IF EXISTS permission;
-- CREATE TABLE permission
-- (
--     user_id         int unsigned NOT NULL auto_increment,
--     permissionLevel varchar(255) NOT NULL,
--
--     FOREIGN KEY (user_id) REFERENCES user (id)
--     ON UPDATE CASCADE ON DELETE,
--
-- );
--
-- INSERT INTO permission (permissionLevel)
-- VALUES ('admin' );
--
-- INSERT INTO permission (permissionLevel)
-- VALUES ('member' );
--
-- INSERT INTO permission (permissionLevel)
-- VALUES ('member' );




DROP TABLE IF EXISTS faq;
CREATE TABLE faq (
                       id int unsigned NOT NULL auto_increment,
                       question varchar(400) NOT NULL,
                       answer varchar(400) NOT NULL,
                       link varchar(400) NOT NULL,

                       PRIMARY KEY (id)
);



INSERT INTO faq (question, answer, link)
VALUES ('Which plans does Sunrise Fitness Centre offer and how can I join', 'We have three plans with different number of classes that you can do. You can have more information in our registration page', 'registration.php' );

INSERT INTO faq (question, answer, link)
VALUES ('Which plans does Sunrise Fitness Centre offer and how can I join', 'Yes, of course. You can change it by contacting us', 'contact_us.php');

INSERT INTO faq (question, answer, link )
VALUES ('Can I transfer my plan to another person?', 'No, you can not. You can cancel your plan whenever you want, and the another person can register themselvES directly on our registration page', 'contact_us.php');


INSERT INTO faq (question, answer, link )
VALUES ('Which plans does Sunrise Fitness Centre offer and how can I join', '', 'contact_us.php' );



INSERT INTO faq (question, answer, link )
VALUES ('Which plans does Sunrise Fitness Centre offer and how can I join', '', 'contact_us.php' );




DROP TABLE IF EXISTS jumbotron;
CREATE TABLE jumbotron (
                       id int unsigned NOT NULL auto_increment,
                       title varchar(100) NOT NULL,
                       text varchar(255) NOT NULL,
                       link varchar(255) NOT NULL,
                       type varchar(20) NOT NULL,
                       buttonText varchar(20) NOT NULL,
                       photoLink varchar(255) NOT NULL,
                       page_id_fk varchar (255) NOT NULL,
                       PRIMARY KEY (id)
);
