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
    VALUES ('2020-05-10', 'Online Classes', 'Be with us every morning on our online classes to meditate and work out with us in this difficult times', 'registration.php', 'news', 'Join Online', '../app/images/online-yoga.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES ('2020-05-10', 'Yoga in the Park', 'On 13th february we will have a class on St Stephens Green', '#', 'news', 'Join us', '../app/images/yoga-park.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES ('2020-05-10', 'Free Trial', 'Do your first class free!', 'contact_us.php', 'offers', 'Contact Us', '../app/images/free-trial.jpg');

INSERT INTO post (publicationDate, title, text, link, type, buttonText, photoLink)
    VALUES ('2020-05-10', 'First month free', 'Ten first registered members will have first month free',
    'registration.php', 'offers', 'Register now!', '../app/images/pilates.jpg');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
    VALUES ('Renata', 'Covisi', '111111', 'renata@hotmail.com', '12345678', 'hashtagmuito', '1991-11-18', '3333333', '2222222','Renata', '111', '2022-10-11', 'tree', 'admin');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
    VALUES ('Alex', 'B', '2222222', 'alex@hotmail.com', '87654321', 'hashtagmuito', '1990-06-21', '3333333', '4444444', 'Alex', '222', '2025-10-22', 'tree', 'member');

INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type)
VALUES ('Cristina', 'Silva', '3333333', 'cristina@hotmail.com', '12345612', 'hashtagmuito', '1986-02-27', '5555555', '1111111','Cristina', '333', '2023-05-26', 'Lotus', 'admin');

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
    VALUES ('Power Vinyasa', 'Invigorating, powerful, energetic form of yoga where participants move or flow from pose to pose.',
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

DROP TABLE IF EXISTS testimonial;
CREATE TABLE testimonial (
    id        int unsigned NOT NULL auto_increment,
    title     varchar(255) NOT NULL,
    text      varchar(255) NOT NULL,
    name      varchar(255) NOT NULL,
    stars     int(1) NOT NULL,
    approval varchar(255) NOT NULL,
    className varchar(255) NOT NULL,
    creationDate varchar(255) NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO testimonial (title, text, name, stars, approval, className, creationDate)
VALUES ('Excelent classes', 'In this fast paced and sometimes unsettling world we live in coming to the Yoga center allows me to bring my mind, body and soul back into balance', '@MikeJr ', 4,  'pending', 'Hatha Yoga', '2020-05-10');


INSERT INTO testimonial (title, text, name, stars, approval, className, creationDate)
VALUES ('Perfect for injuries', 'I returned to Yoga primarily because of a knee injury and an inability to perform high impact exercise. My knee is much improved and so is my body as a whole', '@JessM', 4 , 'pending', 'Hatha Yoga', '2020-05-10');


INSERT INTO testimonial (title, text, name, stars, approval, className, creationDate)
VALUES ('Good for health', 'After a hectic/stressful day, coming to Yoga is calming and restorative. Since I’ve been practicing I am much stronger have much greater range of motion', '@LukeY', 5 , 'approved', 'Hatha Yoga', '2020-05-10');


INSERT INTO testimonial (title, text, name, stars, approval, className, creationDate)
VALUES ('Love it', 'One of the most relaxing experiences I have ever felt while being able to melt into myself', '@JenS', 3 , 'approved', 'Hatha Yoga', '2020-05-10');



DROP TABLE IF EXISTS contactUs;
CREATE TABLE contactUs
(
    id         int unsigned NOT NULL auto_increment,
    name       varchar(255) NOT NULL,
    email      varchar(100) NOT NULL,
    phone      varchar(255) NOT NULL,
    title      varchar(255) NOT NULL,
    message    mediumtext,
    PRIMARY KEY (id)
);



DROP TABLE IF EXISTS page;
CREATE TABLE page
(
    id       int unsigned NOT NULL auto_increment,
    name     varchar(255) NOT NULL,
    minLevel varchar(255) NOT NULL,
    link     varchar(255),

    PRIMARY KEY (id)
);

INSERT INTO page (name, minLevel, link)
VALUES ('Home', 'public', 'index.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('About Us', 'public', 'about_us.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Classes', 'public', 'class.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Class Details', 'member', NULL );

INSERT INTO page (name, minLevel, link)
VALUES ('Testimonials', 'public', 'testimonial.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Contact Us', 'public', 'contact_us.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Our team', 'public', 'our_team.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('FAQ', 'public', 'faq.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Registration', 'public', 'registration.php' );

INSERT INTO page (name, minLevel, link)
VALUES ('Login', 'public', NULL );


