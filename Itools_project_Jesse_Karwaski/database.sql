-- Create the tech_support database
DROP DATABASE IF EXISTS project_database_jesse_karwaski;
CREATE DATABASE project_database_jesse_karwaski;
USE project_database_jesse_karwaski;
















CREATE TABLE teams (
    teamID  int NOT NULL AUTO_INCREMENT,
    name    VARCHAR(40)    NOT NULL,
    city VARCHAR(40) NOT NULL,
    imagePath VARCHAR(80) null,
    PRIMARY KEY (teamID)
);

INSERT INTO teams VALUES 
(1, 'Spartans', 'Sudbury', '/itools_project_Jesse_Karwaski/images/Spartans-logo.webp'),
(2, 'Bulldogs', 'North Bay','/itools_project_Jesse_Karwaski/images/Bulldog-logo.webp'),
(3, 'Steelers', 'Sault ste maire','/itools_project_Jesse_Karwaski/images/steelers-1.webp'),
(4, 'All-Stars', 'Gta','/itools_project_Jesse_Karwaski/images/gtastars.logo_.webp'),
(5, 'Longhorns', 'Oakvile','/itools_project_Jesse_Karwaski/images/longhorns.webp'),
(6, 'Imperials', 'Sarnia','/itools_project_Jesse_Karwaski/images/Sarnia-Imperials-Logo-crown-CL.webp'),
(7, 'Sooners', 'Ottawa','/itools_project_Jesse_Karwaski/images/ottawa-sooners-logo.webp'),
(8, 'Phantom Raiders', 'Toronto','/itools_project_Jesse_Karwaski/images/Raiders.webp'),
(9, 'Outlaws', 'Tri-City','/itools_project_Jesse_Karwaski/images/Tricity_outlaws_logo.webp'),
(10,'Patriots', 'Hamilton','/itools_project_Jesse_Karwaski/images/SCP-New.webp');




CREATE TABLE players (
    playerID int NOT NULL AUTO_INCREMENT,
    teamID int NOT NULL,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    position VARCHAR(3)    NOT NULL,
    height int NOT NULL,
    weight int NOT NULL,
    primary key (playerID),
    FOREIGN KEY (teamID) REFERENCES teams(teamID)

);

insert into players values
(1,1,'Carroll','Shephard','Qb',189,208),
(2,1,'Nicholas','Kendall','OL',179,215),
(3,1,'Larry','Huddle','OL',199,243),
(4,1,'Ivan','Olson','OL',185,214),
(5,1,'Joseph','Ramos','OL',192,249),
(6,1,'Brendan','Arledge','OL',186,209),
(7,1,'Justin','Turner','Wr',194,248),
(8,1,'Peter','Lake','Wr',190,279),
(9,1,'Randy','Earle','Rb',188,238),
(10,1,'Harry','Berry','TE',172,198),
(11,1,'Brandon','Quinlan','DL',169,233),
(12,1,'Milton','Burciaga','DL',183,183),
(13,1,'Bradley','Mendoza','DL',165,256),
(14,1,'Tomas','Woodson','DL',186,256),
(15,1,'Joshua','Ogilvie','LB',197,207),
(16,1,'Carl','Brindle','LB',195,214),
(17,1,'Juan','Chang','LB',166,223),
(18,1,'Mickey','Moser','LB',182,256),
(19,1,'James','Smith','DB',194,214),
(20,1,'Harry','Hattley','DB',180,187),
(21,1,'Keith','Hoot','DB',197,251),
(22,1,'Vernon','Lopez','DB',198,189),
(23,1,'Larry','Davis','DB',169,196),
(24,2,'Adrian','Santos','Qb',175,219),
(25,2,'Dustin','Gonsales','OL',184,262),
(26,2,'Michael','Glass','OL',198,219),
(27,2,'Timothy','Medina','OL',184,254),
(28,2,'Ruben','Webster','OL',173,180),
(29,2,'Ronald','Rowe','OL',192,260),
(30,2,'Chad','Nelson','Wr',194,265),
(31,2,'John','Mui','Wr',193,196),
(32,2,'Jerry','Cave','Rb',185,181),
(33,2,'Cecil','Reichard','TE',169,225),
(34,2,'Jeffrey','Lyons','DL',175,212),
(35,2,'Kevin','King','DL',187,221),
(36,2,'Joshua','Whitehead','DL',179,276),
(37,2,'Barry','Gold','DL',173,191),
(38,2,'Michael','Taylor','LB',199,250),
(39,2,'Gene','Walters','LB',176,226),
(40,2,'Henry','Smith','LB',168,201),
(41,2,'Kevin','Johnson','LB',179,258),
(42,2,'Thomas','Pratt','DB',196,272),
(43,2,'Dennis','Mears','DB',186,240),
(44,2,'Howard','Marsh','DB',192,204),
(45,2,'Andrew','Mclaren','DB',196,220),
(46,2,'Lyle','Lavigne','DB',168,225),
(47,3,'James','Moreno','Qb',171,226),
(48,3,'Bruce','Beeler','OL',186,277),
(49,3,'Ronald','Whaley','OL',180,249),
(50,3,'Hung','Westmoreland','OL',194,209),
(51,3,'Oscar','Dilley','OL',170,261),
(52,3,'Fernando','Seifert','OL',198,249),
(53,3,'Lewis','Fallin','Wr',189,199),
(54,3,'Bret','Sorenson','Wr',181,183),
(55,3,'Rafael','Scott','Rb',165,189),
(56,3,'James','Stewart','TE',189,262),
(57,3,'Christopher','Starling','DL',189,193),
(58,3,'Lawrence','Moser','DL',192,258),
(59,3,'Leonard','Deck','DL',175,250),
(60,3,'Joe','Angulo','DL',190,230),
(61,3,'John','Weldon','LB',168,202),
(62,3,'Anthony','Rankin','LB',189,181),
(63,3,'Henry','Jones','LB',189,277),
(64,3,'Roosevelt','Rodrigues','LB',188,269),
(65,3,'Darryl','Seiber','DB',196,205),
(66,3,'Robert','Situ','DB',166,230),
(67,3,'Bill','Miller','DB',188,188),
(68,3,'Kenneth','Hunt','DB',189,202),
(69,3,'Michael','Quinn','DB',181,248),
(70,4,'Mark','Simon','Qb',181,214),
(71,4,'Lawrence','Bradley','OL',197,228),
(72,4,'Fermin','Tanner','OL',184,193),
(73,4,'Louis','Plascencia','OL',188,214),
(74,4,'David','Sisco','OL',196,219),
(75,4,'Ryan','Gardener','OL',182,201),
(76,4,'Kevin','Johnson','Wr',199,218),
(77,4,'Theodore','Struck','Wr',191,276),
(78,4,'Timothy','Sabala','Rb',173,234),
(79,4,'Joseph','Abbott','TE',182,192),
(80,4,'Harry','Hines','DL',197,253),
(81,4,'Steven','Jacobs','DL',191,217),
(82,4,'Joseph','Cooper','DL',167,181),
(83,4,'David','Sierra','DL',195,221),
(84,4,'Michael','Peebles','LB',198,188),
(85,4,'James','Mendez','LB',183,275),
(86,4,'Joseph','Beltz','LB',181,215),
(87,4,'Rick','Swanson','LB',196,256),
(88,4,'Harold','Almeida','DB',179,195),
(89,4,'Paul','Reed','DB',186,191),
(90,4,'Robby','Behr','DB',189,251),
(91,4,'Jan','Brown','DB',167,277),
(92,4,'Ernie','Armstrong','DB',177,279),
(93,5,'Randy','Laliberte','Qb',168,216),
(94,5,'Jaime','Amidon','OL',191,229),
(95,5,'John','Lyons','OL',191,260),
(96,5,'William','Gregory','OL',189,221),
(97,5,'Thurman','Benson','OL',171,231),
(98,5,'Terry','Ford','OL',191,191),
(99,5,'Mark','Madden','Wr',180,277),
(100,5,'James','Barkley','Wr',165,232),
(101,5,'Thomas','Mariano','Rb',195,276),
(102,5,'John','Tyson','TE',167,216),
(103,5,'Ronald','Banks','DL',169,222),
(104,5,'Michael','Banerjee','DL',176,252),
(105,5,'Joey','Edmund','DL',176,180),
(106,5,'Mark','Vanhook','DL',180,247),
(107,5,'Roger','Mclean','LB',199,201),
(108,5,'Scott','Swinson','LB',197,197),
(109,5,'Ronald','Fernandes','LB',171,247),
(110,5,'Chester','Hasler','LB',196,258),
(111,5,'Jeffrey','Williamson','DB',187,180),
(112,5,'Gregory','Stelly','DB',173,247),
(113,5,'Danny','Vue','DB',186,266),
(114,5,'Jesse','Hines','DB',171,241),
(115,5,'Thomas','Rigsby','DB',199,210),
(116,6,'David','Tyler','Qb',194,217),
(117,6,'John','Brown','OL',180,180),
(118,6,'Darren','Hart','OL',178,181),
(119,6,'Nathan','Moorehead','OL',188,253),
(120,6,'John','Roth','OL',197,182),
(121,6,'Robert','Clay','OL',176,265),
(122,6,'James','Harris','Wr',171,280),
(123,6,'Carl','Fonua','Wr',189,240),
(124,6,'Larry','Bekerman','Rb',171,235),
(125,6,'Chris','Robles','TE',192,184),
(126,6,'Burl','Sinclair','DL',190,185),
(127,6,'Jose','Taylor','DL',174,221),
(128,6,'Salvador','Toth','DL',185,264),
(129,6,'Leon','Kesner','DL',175,274),
(130,6,'Ernest','Bryant','LB',166,216),
(131,6,'Earl','Faith','LB',179,185),
(132,6,'Nelson','Bautista','LB',192,240),
(133,6,'Chris','Myrick','LB',184,205),
(134,6,'Michael','Fisher','DB',181,262),
(135,6,'Dario','Queen','DB',176,236),
(136,6,'Stephen','Thomas','DB',199,280),
(137,6,'Marcus','Bartos','DB',174,182),
(138,6,'Ricky','Powell','DB',190,194),
(139,7,'Ronald','Hill','Qb',193,214),
(140,7,'John','Brown','OL',165,205),
(141,7,'George','Morber','OL',194,195),
(142,7,'Daniel','Hughes','OL',194,252),
(143,7,'James','Snyder','OL',190,259),
(144,7,'Willie','Lang','OL',176,230),
(145,7,'David','Rodriguez','Wr',190,260),
(146,7,'Chad','Mckenzie','Wr',171,186),
(147,7,'Steven','Graham','Rb',196,240),
(148,7,'Wilfred','Mosley','TE',166,208),
(149,7,'Sam','Perla','DL',177,225),
(150,7,'Paul','Snyder','DL',176,268),
(151,7,'Keith','Jackson','DL',180,250),
(152,7,'Ryan','Sabella','DL',167,243),
(153,7,'Bill','Cullom','LB',169,201),
(154,7,'Raymond','Frazier','LB',198,242),
(155,7,'Stephen','Lauer','LB',180,258),
(156,7,'Marlin','Crane','LB',185,231),
(157,7,'Leopoldo','Campbell','DB',187,267),
(158,7,'Eric','Poage','DB',185,275),
(159,7,'Michael','Olague','DB',177,207),
(160,7,'Ronald','Parker','DB',186,230),
(161,7,'Richard','Delacruz','DB',186,241),
(162,8,'Randolph','Bivens','Qb',173,223),
(163,8,'Christopher','Kevan','OL',188,248),
(164,8,'Andres','Baird','OL',198,211),
(165,8,'James','Tate','OL',167,252),
(166,8,'Mark','Cohen','OL',197,191),
(167,8,'Michael','Knox','OL',181,188),
(168,8,'Dale','Giusti','Wr',175,239),
(169,8,'Kenneth','Barajas','Wr',178,242),
(170,8,'Stephen','Medley','Rb',197,277),
(171,8,'Reid','Stroupe','TE',190,227),
(172,8,'Martin','Alexander','DL',173,202),
(173,8,'Gregg','Ozaeta','DL',185,252),
(174,8,'Edward','Barnes','DL',168,271),
(175,8,'Micheal','Gunter','DL',187,193),
(176,8,'John','Oshell','LB',197,231),
(177,8,'Ronald','Goodner','LB',193,249),
(178,8,'Jason','Sayer','LB',173,255),
(179,8,'Wilburn','Bowman','LB',176,218),
(180,8,'Michael','Uppencamp','DB',195,227),
(181,8,'William','Roundtree','DB',174,196),
(182,8,'James','Cobb','DB',169,248),
(183,8,'Steve','Pirtle','DB',187,214),
(184,8,'George','Waterhouse','DB',199,243),
(185,9,'Thomas','Bandy','Qb',165,264),
(186,9,'David','Curtis','OL',176,187),
(187,9,'Claude','Wiener','OL',196,258),
(188,9,'Dean','Garcia','OL',200,247),
(189,9,'Charles','Depaola','OL',196,184),
(190,9,'Wendell','Miles','OL',174,202),
(191,9,'Peter','Peoples','Wr',197,181),
(192,9,'Roger','Bezio','Wr',185,196),
(193,9,'Bernard','Robey','Rb',171,234),
(194,9,'Chris','Daughrity','TE',167,262),
(195,9,'Christopher','Williamson','DL',173,249),
(196,9,'Stephen','Barker','DL',195,257),
(197,9,'Jose','Olcott','DL',177,218),
(198,9,'Jeffrey','Lewis','DL',169,262),
(199,9,'Johnny','Whetstone','LB',170,229),
(200,9,'Jason','Grubbs','LB',182,257),
(201,9,'Samuel','Scharf','LB',167,243),
(202,9,'Bernard','Devora','LB',189,213),
(203,9,'Raymond','Waldron','DB',170,241),
(204,9,'Marvin','Wilson','DB',185,230),
(205,9,'Ronald','Mcconnell','DB',183,258),
(206,9,'Aaron','Ginder','DB',166,250),
(207,9,'John','Grinage','DB',185,232),
(208,10,'Fred','Gomez','Qb',170,180),
(209,10,'Jon','Wilson','OL',166,264),
(210,10,'Emory','Byron','OL',186,216),
(211,10,'Matthew','Draudt','OL',198,262),
(212,10,'Thomas','Taylor','OL',188,269),
(213,10,'Allen','Palmer','OL',174,278),
(214,10,'Chris','Abbott','Wr',168,242),
(215,10,'Ted','Jackson','Wr',176,191),
(216,10,'Terry','Pina','Rb',171,233),
(217,10,'Charles','Carrington','TE',178,219),
(218,10,'Pablo','Bridges','DL',174,181),
(219,10,'Kelley','Logan','DL',180,265),
(220,10,'Jesse','Davenport','DL',196,210),
(221,10,'Edgar','Buck','DL',193,262),
(222,10,'Edwin','Scaffidi','LB',193,219),
(223,10,'Buster','Toki','LB',167,200),
(224,10,'William','Atkinson','LB',173,218),
(225,10,'Michael','Trevino','LB',179,265),
(226,10,'Matthew','Siegel','DB',197,202),
(227,10,'Mike','Walk','DB',194,181),
(228,10,'Joseph','Cormier','DB',198,183),
(229,10,'Jacob','Ennis','DB',177,280),
(230,10,'Vito','Miller','DB',177,194);

CREATE TABLE games (
    gameID int NOT NULL AUTO_INCREMENT,
    homeTeamID int NOT NULL, 
    awayTeamID int NOT NULL,
    homeTeamScore int NOT NULL,
    awayTeamScore int NOT NULL,
    gameDate datetime NOT NUll,

    primary key (gameID)

);
INSERT INTO games values
(1,4,9,7,47,'2022-6-01'),
(2,8,10,21,27,'2022-6-01'),
(3,1,7,24,37,'2022-6-02'),
(4,6,5,28,27,'2022-6-02'),
(5,3,2,41,27,'2022-6-02'),

(6,3,9,27,13,'2022-6-10'),
(7,5,1,34,20,'2022-6-10'),
(8,8,6,10,23,'2022-6-11'),
(9,10,4,33,17,'2022-6-12'),
(10,7,2,20,12,'2022-6-12'),

(11,2,5,13,16,'2022-6-18'),
(12,6,4,3,7,'2022-6-18'),
(13,1,8,6,3,'2022-6-19'),
(14,7,3,10,14,'2022-6-19'),
(15,9,10,20,12,'2022-6-20'),

(16,5,7,45,24,'2022-6-26'),
(17,9,6,42,45,'2022-6-26'),
(18,4,1,20,21,'2022-6-28'),
(19,10,3,16,12,'2022-6-28'),
(20,2,8,8,7,'2022-6-27');

create table team_stats (
    leagueID int NOT NULL,
    teamID  int NOT NULL,
    wins int ,
    loses int ,
    pointsAgaints int,
    pointsFor int ,
    points int ,
    primary key (leagueID),
    FOREIGN KEY (teamID) REFERENCES teams(teamID)



);

insert into team_stats (leagueID, teamID) values
    (1,1),
    (2,2),
    (3,3),
    (4,4),
    (5,5),
    (6,6),
    (7,7),
    (8,8),
    (9,9),
    (10,10);


CREATE TABLE administrators (
  username    VARCHAR(40)    NOT NULL     UNIQUE,
  password    VARCHAR(40)    NOT NULL,
  PRIMARY KEY (username)
);


INSERT INTO administrators VALUES
('test', 'password');


-- Create a user named ts_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO ts_user@localhost
IDENTIFIED BY 'pa55word';