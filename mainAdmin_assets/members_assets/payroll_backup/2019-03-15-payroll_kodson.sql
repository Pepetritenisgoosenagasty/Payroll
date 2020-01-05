DROP TABLE cat_dept;

CREATE TABLE `cat_dept` (
  `cat_id` int(10) unsigned NOT NULL,
  `dept_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`cat_id`,`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

INSERT INTO cat_dept VALUES("1","1");
INSERT INTO cat_dept VALUES("1","2");
INSERT INTO cat_dept VALUES("1","3");
INSERT INTO cat_dept VALUES("2","1");
INSERT INTO cat_dept VALUES("3","1");
INSERT INTO cat_dept VALUES("4","1");
INSERT INTO cat_dept VALUES("5","2");
INSERT INTO cat_dept VALUES("6","0");
INSERT INTO cat_dept VALUES("6","2");



DROP TABLE debt_surcharges;

CREATE TABLE `debt_surcharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `debt_surcharges` float NOT NULL,
  `other_deduc` float NOT NULL,
  `comments` varchar(255) NOT NULL,
  `input_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE debts_loans /_surcharges _deductions;

CREATE TABLE `debts_loans /_surcharges _deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `debt_bal_b/d` float NOT NULL,
  `current_loans/surcharges` float NOT NULL,
  `other_expensis` float NOT NULL,
  `total_debt` float NOT NULL,
  `adjustments` float NOT NULL,
  `deductions` float NOT NULL,
  `bal_outstanding` float NOT NULL,
  `total_deductions` float NOT NULL,
  `input_date` date NOT NULL,
  `updatee_date` date NOT NULL,
  `dueDate` date NOT NULL,
  `numOfDaysdue` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `debts_loans /_surcharges _deductions_ibfk_1` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO debts_loans /_surcharges _deductions VALUES("1","1","17775","0","0","17775","0","690","17085","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("2","2","19838","0","0","19838","0","760","19078","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("3","3","41958","0","0","41958","0","760","41198","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("4","4","17817","0","0","17817","0","690","17127","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("5","5","33573","0","0","33573","0","760","32813","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("6","6","33619","0","0","33619","0","760","32859","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("7","7","6297","0","0","6297","0","690","5607","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("8","8","36646","0","0","36646","0","760","35886","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("9","9","14158","0","0","14158","0","690","13468","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("10","10","28845","728.4","0","29573.4","0","1399","28174.6","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("11","11","13784","0","0","13784","0","690","13094","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("12","12","5175","0","0","5175","0","690","4485","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("13","13","27478","0","0","27478","0","790","26688","1091.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("14","14","1136","0","0","1136","0","520","616","821.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("15","15","1399","0","0","1399","0","520","879","821.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("16","16","3800","0","0","3800","0","400","3400","701.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("17","17","53463","0","0","53463","0","2664","50798.6","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("18","18","25639","0","0","25639","0","760","24873","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("19","19","30052","0","0","30052","0","790","29262","1091.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("20","20","6450","0","0","6450","0","690","5760","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("21","21","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("22","22","7247","0","0","7247","0","620","6627","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("23","23","17402","0","0","17402","0","1250","17402","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("24","24","5056","0","0","5056","0","620","4436","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("25","25","11714","0","0","11714","0","620","11094","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("26","26","10958","0","0","10958","0","690","10268","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("27","27","32295","0","0","32295","0","1280","32835","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("28","28","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("29","29","16981","0","0","16981","0","690","16291","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("30","30","8100","0","0","8100","0","620","7480","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("31","31","6615","0","0","6615","0","620","5995","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("32","32","10115","0","0","10115","0","690","9425","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("33","33","15460","0","0","15460","0","690","14770","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("34","34","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("35","35","16848","0","0","16848","0","1299","16569.2","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("36","36","7790","0","0","7790","0","1399","7879.24","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("37","37","16514","0","0","16514","0","690","15824","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("38","38","10265","284.4","0","10549.4","0","974","9575","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("39","39","4811","0","0","4811","0","690","4121","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("40","40","12847","614","0","13461","0","1299","12162.2","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("41","41","4993","0","0","4993","0","620","4373","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("42","42","2514","0","0","2514","0","690","1824","991.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("43","43","3793","0","0","3793","0","620","3173","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("44","44","7683","0","0","7683","0","620","7063","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("45","45","2907","0","0","2907","0","620","2287","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("46","46","26911","0","0","26911","0","760","26151","1061.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("47","47","17744","0","0","17744","0","1399","17234.4","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("48","48","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("49","49","14024","0","0","14024","0","1399","14513.2","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("50","50","1927","0","0","1927","0","620","1307","921.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("51","51","444","0","0","444","0","444","0","745.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("52","52","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("53","53","1400","0","0","1400","0","200","1200","379.51","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("54","54","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("55","55","0","0","0","0","0","0","0","301.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("56","56","0","0","0","0","0","80","80","381.24","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("57","57","0","1500","0","1500","0","1399","101.24","1700","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("58","58","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("59","59","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("60","60","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("61","61","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("62","62","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("63","63","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("64","64","0","1200","0","1200","0","200","1000","200","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("65","65","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("66","66","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("67","67","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("68","68","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("69","69","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("70","70","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("71","71","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("72","72","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("73","73","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("74","74","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("75","75","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("76","76","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("77","77","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("78","78","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("79","79","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("80","80","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("81","81","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("82","82","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("83","83","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("84","84","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("85","85","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("86","86","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("87","87","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("88","88","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("89","89","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("90","90","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("91","91","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("92","92","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("93","93","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("94","94","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("95","95","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("96","96","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("97","97","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("98","98","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("99","99","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("100","100","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("101","101","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("102","102","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("103","103","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("104","104","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("105","105","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("106","106","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("107","107","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("108","108","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("109","109","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("110","110","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("111","111","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("112","112","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("113","113","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("114","114","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("115","115","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("116","116","0","0","0","0","0","0","0","83.9","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("117","117","0","0","0","0","0","0","0","83.9","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("118","118","0","0","0","0","0","0","0","257.16","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("119","119","0","0","0","0","0","0","0","216.13","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("120","120","0","0","0","0","0","0","0","58.83","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("121","121","0","0","0","0","0","0","0","55.52","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("122","122","0","0","0","0","0","0","0","19.25","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("123","123","0","0","0","0","0","0","0","17.88","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("124","124","0","0","0","0","0","0","0","16.5","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("125","125","0","0","0","0","0","0","0","0","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("126","126","0","0","0","0","0","0","0","38.5","2019-01-21","2019-02-20","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("127","127","900","0","0","900","0","200","700","200","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("128","128","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("129","129","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("130","130","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("131","131","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("132","132","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("133","133","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("134","134","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("135","135","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("136","136","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("137","137","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("138","138","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("139","139","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("140","140","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("141","141","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("142","142","19606","0","0","19606","0","800","18806","943","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("143","143","600","0","0","600","0","300","300","355","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("144","144","6860","0","0","6860","0","400","6460","5287","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("145","145","0","0","0","0","0","0","0","0","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("146","146","0","0","0","0","0","0","0","92.95","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("147","147","0","0","0","0","0","0","0","42.9","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("148","148","1500","0","0","1500","0","200","1300","200","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("149","149","0","0","0","0","0","0","0","121.55","2019-01-21","0000-00-00","0000-00-00","0","");
INSERT INTO debts_loans /_surcharges _deductions VALUES("150","150","0","0","0","0","0","0","0","275","2019-01-21","0000-00-00","0000-00-00","0","");



DROP TABLE deduct_date_deduct;

CREATE TABLE `deduct_date_deduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `deduc_id` int(11) NOT NULL,
  `deduc_date` date NOT NULL,
  `last_deduct_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO deduct_date_deduct VALUES("1","1","1","2019-03-09","2019-03-09");
INSERT INTO deduct_date_deduct VALUES("2","2","2","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("3","3","3","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("4","4","4","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("5","5","5","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("6","6","6","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("7","7","7","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("8","8","8","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("9","9","9","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("10","10","10","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("11","11","11","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("12","12","12","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("13","13","13","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("14","14","14","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("15","15","15","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("16","16","16","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("17","17","17","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("18","18","18","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("19","19","19","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("20","20","20","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("21","21","21","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("22","22","22","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("23","23","23","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("24","24","24","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("25","25","25","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("26","26","26","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("27","27","27","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("28","28","28","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("29","29","29","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("30","30","30","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("31","31","31","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("32","32","32","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("33","33","33","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("34","34","34","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("35","35","35","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("36","36","36","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("37","37","37","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("38","38","38","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("39","39","39","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("40","40","40","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("41","41","41","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("42","42","42","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("43","43","43","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("44","44","44","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("45","45","45","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("46","46","46","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("47","47","47","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("48","48","48","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("49","49","49","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("50","50","50","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("51","51","51","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("52","52","52","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("53","53","53","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("54","54","54","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("55","55","55","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("56","56","56","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("57","57","57","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("58","58","58","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("59","59","59","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("60","60","60","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("61","61","61","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("62","62","62","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("63","63","63","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("64","64","64","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("65","65","65","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("66","66","66","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("67","67","67","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("68","68","68","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("69","69","69","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("70","70","70","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("71","71","71","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("72","72","72","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("73","73","73","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("74","74","74","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("75","75","75","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("76","76","76","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("77","77","77","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("78","78","78","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("79","79","79","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("80","80","80","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("81","81","81","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("82","82","82","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("83","83","83","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("84","84","84","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("85","85","85","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("86","86","86","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("87","87","87","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("88","88","88","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("89","89","89","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("90","90","90","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("91","91","91","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("92","92","92","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("93","93","93","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("94","94","94","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("95","95","95","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("96","96","96","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("97","97","97","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("98","98","98","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("99","99","99","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("100","100","100","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("101","101","101","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("102","102","102","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("103","103","103","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("104","104","104","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("105","105","105","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("106","106","106","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("107","107","107","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("108","108","108","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("109","109","109","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("110","110","110","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("111","111","111","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("112","112","112","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("113","113","113","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("114","114","114","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("115","115","115","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("116","116","116","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("117","117","117","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("118","118","118","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("119","119","119","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("120","120","120","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("121","121","121","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("122","122","122","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("123","123","123","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("124","124","124","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("125","125","125","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("126","126","126","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("127","127","127","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("128","128","128","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("129","129","129","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("130","130","130","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("131","131","131","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("132","132","132","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("133","133","133","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("134","134","134","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("135","135","135","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("136","136","136","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("137","137","137","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("138","138","138","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("139","139","139","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("140","140","140","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("141","141","141","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("142","142","142","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("143","143","143","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("144","144","144","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("145","145","145","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("146","146","146","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("147","147","147","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("148","148","148","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("149","149","149","2019-01-21","2019-01-21");
INSERT INTO deduct_date_deduct VALUES("150","150","150","2019-01-21","2019-01-21");



DROP TABLE department;

CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("1","Operations","OP");
INSERT INTO department VALUES("2","Admin","AD");
INSERT INTO department VALUES("3","GM","GM");
INSERT INTO department VALUES("4","","");



DROP TABLE employees;

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `emp_phone` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_bank_account_no` varchar(255) NOT NULL,
  `emp_bank_branch` varchar(255) NOT NULL,
  `emp_ssnit` varchar(255) NOT NULL,
  `emp_nationality` varchar(255) NOT NULL,
  `emp_additional_info` varchar(255) NOT NULL,
  `emp_allowances` float NOT NULL,
  `emp_basic` float NOT NULL,
  `emp_gross_salary` float NOT NULL,
  `emp_taxable_salary` float NOT NULL,
  `emp_paye` float NOT NULL,
  `emp_total_statutory_deductions` float NOT NULL,
  `emp_net_salary` float NOT NULL,
  `emp_bicycle_deduction` float NOT NULL,
  `empnet_salary_payable` float NOT NULL,
  `emp_pos_id` int(11) NOT NULL,
  `emp_dept_id` int(11) NOT NULL,
  `emp_main_cat_id` int(11) NOT NULL,
  `ssf_id` int(11) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  `is_pending` int(11) NOT NULL,
  `on_leave` int(11) NOT NULL,
  `sacked` int(11) NOT NULL,
  `employee_ssf` float NOT NULL,
  `employer_ssf` float NOT NULL,
  `on_payroll` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO employees VALUES("1","ABU MORO","NULL","NULL","0610162138416","Unibank, Ashiaman","20120093039","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-22","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("2","ADAMS IBRAHIM","NULL","NULL","0600163990919","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","638.76","0","638.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("3","ALBERT VIKU","NULL","NULL","0600162376117","Unibank, Ashiaman","D097704160018","NULL","NULL","1500","200","1700","189","0","301.24","638.76","100","538.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("4","ALEX KABUTEY OKUNOR","NULL","NULL","3200119644817","Unibank, Comm. 25","C037205120074","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("5","ANAS K. AGGREY","NULL","NULL","1032000112873501","A.D.B Mankwadzi Roundabout","","NULL","NULL","1500","200","1700","189","0","301.24","638.76","0","638.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("6","ASUMAH MUSAH","NULL","NULL","9040005586563","STANBIC BANK,ASHAIMAN","C117410020010","NULL","NULL","1500","200","1700","189","0","301.24","638.76","100","538.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("7","ROLLAND NARH  TETTEH  ","NULL","NULL","3200123916514","UNIBANK ,COMM. 25","","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("8","DIVINE ADJORLOLO","NULL","NULL","0600161301512","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","638.76","0","638.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("9","FRANCIS KWEKU OSEI","NULL","NULL","02704880000","Bank for Africa, M. Camp","20420131190","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("10","FUSEINI MUMUNI","NULL","NULL","0600163979311","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("11","MOSES KWABLA","NULL","NULL","0020231018121","ACESS BANK,TEMA MAIN","E137507180010","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("12","SETH EVANS ADJAHO","NULL","NULL","1200103165914","Unibank, Tema C1","","NULL","NULL","1500","200","1700","200","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("13","LUCKY ADRAKU","NULL","NULL","0610163770515","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","608.76","0","608.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("14","ADDO SAMUEL","NULL","NULL","2030200648313","Fidelity Bank, Tema Comm. 2","C048407230034","NULL","NULL","1500","200","1700","189","0","301.24","878.76","0","878.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("15","MUSTAPH NARH OMAN","NULL","NULL","0600163875613","Unibank, Ashaiman","","NULL","NULL","1500","200","1700","189","0","301.24","878.76","0","878.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("16","ODY  TETTEH KWAO","NULL","NULL","0061006213461","Unibank, Ashiaman","2042132887","NULL","NULL","1500","200","1700","189","0","301.24","998.76","0","998.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("17","OPOKU EBENEZER","NULL","NULL","0600163990013","Unibank ,Ashaiman","","NULL","NULL","0","0","1700","0","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("18","RICHARD YEBOAH","NULL","NULL","1081010063192","GCB Bank, Tema Main","","NULL","NULL","1500","200","1700","189","0","301.24","638.76","0","638.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("19","SAMPSON KORLI","NULL","NULL","0600162651417","Unibank, Ashiaman","E138005310017","NULL","NULL","1500","200","1700","189","0","301.24","608.76","0","608.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("20","SAMUEL ASIAMAH","NULL","NULL","0600162134218","Unibank, Ashiaman","C03720110036","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("21","SHAIBU INUSA","NULL","NULL","0600163341112","Unibank, Ashiaman","D066903160031","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("22","TAMARA MICHAEL","NULL","NULL","0801024343","Barclays, Kofrom - Kumasi","05A16A02845","NULL","NULL","1500","200","1700","189","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("23","AGBEKO BENJAMIN","NULL","NULL","1200104177819","Unibank, Tema","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("24","YUSIF TETTEH","NULL","NULL","060-1101947","Barclays, Tema","","NULL","NULL","1500","200","1700","200","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("25","NTOW EDWARD","NULL","NULL","3200124455715","UNIBANK ,COMM. 25","","NULL","NULL","1500","200","1700","189","0","301.24","778.76","100","678.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("26","JOSEPH  AGOE","NULL","NULL","0600162445518","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("27","JAMES NANOR","NULL","NULL","3200124446619","UNIBANK ,COMM. 25","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("28","DOE DAVID GATI","NULL","NULL","0600161602717","Unibank, Ashiaman","D107805140034","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("29","HASIM YAKUBU","NULL","NULL","0121463076301","STANBIC BANK,TAKORADI MKT SQUARE","05A17C07328","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("30","PETER ODONKOR","NULL","NULL","2030905755019","Fidelity Bank, Ashiaman","E156703250016","NULL","NULL","1500","200","1700","189","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("31","KWAO DAVID NARH","NULL","NULL","2661710000862401","Manya Krobo Rural Bank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("32","DODZI GATI","NULL","NULL","0600163975618","Unibank, Ashiaman","D108504070072","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("33","MICHAEL DOKU","NULL","NULL","0600162351912","Unibank ,Ashaiman","    ","NULL","NULL","1500","200","1700","189","0","301.24","708.76","100","608.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("34","MICHAEL NYARKO","NULL","NULL","0600162983412","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("35","BENJAMINE TEIKO ALIPOE","NULL","NULL","0101182810001","BESTPOINT SAVINGS &  LOAN LTD,MILE 7","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","100","1298.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("36","QUARSHIE EBENEZER","NULL","NULL","1351120000667","GCB Bank, Tema ","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("37","YONLI FIDEL","NULL","NULL","0863516250","BARCLAYS ,SOMANYA","","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("38","EMMANUEL MENSAH","NULL","NULL","0800384101100","BESTPOINT SAVINGS AND LOAN LTD,ASH","A167902010011","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("39","AVUGLA KWASI","NULL","NULL","1200103469816","UNIBANK ,TEMA","","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("40","ADAMU DAUDA BAWURE","NULL","NULL","0061011130131","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","100","1298.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("41","ANONEHIA BRIGHT","NULL","NULL","0600164112214","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("42","MOSES VORDZOGBE","NULL","NULL","0600162207412","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","708.76","0","708.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("43","WILLIAMS  SAMPSON AKWAFO","NULL","NULL","02787770010","Bank of Africa, Michel Camp","C057802140015","NULL","NULL","1500","200","1700","189","0","301.24","778.76","100","678.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("44","STEPHEN AFEZUKE","NULL","NULL","0430011376811","Unibank,  Zenu Ashaiman","05C17H05318","NULL","NULL","1500","200","1700","189","0","301.24","778.76","100","678.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("45","KALEO WILLIAM KWABENA","NULL","NULL","0600162732517","Unibank, Ashiaman","","NULL","NULL","1500","200","1700","189","0","301.24","778.76","200","578.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("46","ISAAC SEMABIA ANGMLER","NULL","NULL","2400050315928","Fidelity Bank, Spintex","C047607030014","NULL","NULL","1500","200","1700","189","0","301.24","638.76","0","638.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("47","EBENEZER DARLINTON","NULL","NULL","0600162780511","Unibank, Ashiaman","E038006130050","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("48","WISDOM AZAGU","NULL","NULL","0600163988717","Unibank, Ashaiman","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("49","DAWUDA MAHAMUD","NULL","NULL","9040002458106","Stanbic Bank, TEMA INDUSTRIAL AREA","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("50","LIVINGSTONE OFORI","NULL","NULL","0023014495462101","Ecobank, Tema","C0369070034","NULL","NULL","1500","200","1700","189","0","301.24","778.76","0","778.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("51","ASARE MIGHTY","NULL","NULL","1781010102227","GCB Bank, Ashaiman","D078307100016","NULL","NULL","1500","200","1700","189","0","301.24","954.76","100","854.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("52","JOHN OSUTU NARTEY","NULL","NULL","2030905484319","Fidelity Bank, T.P.B","E137505260053","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("53","ADAMS COFFIE","NULL","NULL","9040004946345","Stanbic Bank, TEMA INDUSTRIAL AREA","","NULL","NULL","1500","200","1700","189","0","179.51","720.49","0","720.49","11","1","2","1","2019-02-18","2019-02-18","0","0","0","60.5","143","1");
INSERT INTO employees VALUES("54","AKORNOR ANNUM  MOSES","NULL","NULL","4012300293","Zenith Bank, Tema Com.1","","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","287.5","1111.26","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("55","TULASI JAMES","NULL","NULL","5022000094055701","A.D.B ","E149012070010","NULL","NULL","1500","200","1700","189","0","301.24","1398.76","0","1398.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("56","NATHANIEL FENEKU","NULL","NULL","1200103073416","Unibank, Ashiaman","D116912190018","NULL","NULL","1500","200","1700","189","0","301.24","1318.76","0","1318.76","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("57","AZUMAH HARRISON","NULL","NULL","1200115935014","UNIBANK ,TEMA","D119304150031","NULL","NULL","1500","200","1700","189","0","301.24","0","0","0","11","1","2","1","2019-02-18","2019-02-18","0","0","0","93.5","221","1");
INSERT INTO employees VALUES("58","ATIVOR NEWTON","NULL","NULL","0600169339519","Unibank, Ashaiman","","NULL","NULL","1500","200","1700","189","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("59","CLEMENT AMU","NULL","NULL","2030905517316","Fidelity Bank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("60","COLLINS  TEYE AHORTORVI","NULL","NULL","3200123865219","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("61","DOMINIC YEKPLE","NULL","NULL","3200123923111","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("62","LINOS ASONG","NULL","NULL","0430011797711","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("63","ANYANKOR ABRAHAM","NULL","NULL","0320011370721","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("64","EMMANUEL ADU","NULL","NULL","0600163974212","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","100","0","100","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("65","DANSO GEORGE ODURO","NULL","NULL","0060011691961","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("66","ENOCH AMOASI","NULL","NULL","0600163979915","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("67","RAHIM ABDUL RAHMAN","NULL","NULL","1211010217069","GCB, ASHAIMAN","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("68","IBRAHIM  AMADU  ZEBLE","NULL","NULL","4300143087113","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("69","GODWIN SUKAH","NULL","NULL","0430011016851","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("70","JAMES AYIGLAH","NULL","NULL","0600163991516","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("71","JOHN ASUPAH","NULL","NULL","0600164004314","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("72","MOHAMMED HIDIR","NULL","NULL","0600163985214","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("73","ERIC MENSAH","NULL","NULL","0060010767022","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("74","CHEROBIN AGBAKPE","NULL","NULL","0060011823511","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("75","NUTSA DERRICK","NULL","NULL","0060011186801","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("76","AMEKE WORLALI","NULL","NULL","0600163980317","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("77","RICHARD D.  TOKKU","NULL","NULL","3200124408113","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("78","KWAKU NAWA","NULL","NULL","0060011341421","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("79","KWESI KENEDY KUFFOUR","NULL","NULL","0600162727513","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("80","MOHAMMED FATAWO","NULL","NULL","0061011725091","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("81","AYORNU FRANCIS","NULL","NULL","0320012193191","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("82","SHAIBU MUBARRACK","NULL","NULL","0430010841691","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("83","OFOSU THEOPHOLUS ","NULL","NULL","08007137410001","BEST POINT SAVINGS AND LOANS,ASH.","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("84","PATRICK OBU","NULL","NULL","0193514943012","HFC BANK ,ASHAIMAN","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("85","MATHEW KWEITSU","NULL","NULL","0060011098111","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("86","JOSEPH OFORI","NULL","NULL","0320010549941","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("87","YUSIF ABDUL GAFARU","NULL","NULL","0430010309061","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("88","FELIX AKWATEY AGBOLUMKWEI","NULL","NULL","1200105997011","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("89","DOMINIC OKRAKU","NULL","NULL","0700171192511","UNIBANK ,MARKOLA BRANCH","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("90","CHARLES  ERIC TETTEH","NULL","NULL","0060010289371","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("91","ATSUTSE STEPHEN","NULL","NULL","0320010282711","UNIBANK ,COMM. 25","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("92","AZAZ MOHAMMED","NULL","NULL","0430011473931","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("93","SEBUABE KOFI","NULL","NULL","3014475385001","ECOBANK,AHSAIMAN","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("94","MENSAH SAMPSON","NULL","NULL","2000901953601","NATIONAL INVESTMENT BANK,TEMA","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("95","KOMADO ANDERSON HANSON","NULL","NULL","0060012158011","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("96","STEPHEN CHANTEY WAYO","NULL","NULL","0061010772051","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("97","AMOS  KOLOG NAOH","NULL","NULL","0121416460701","STANBIC BANK ,TARKWA","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("98","AMARTEY EBENEZER","NULL","NULL","0123010015701","FBN,ACCRA","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("99","ROBERT DUAMOR","NULL","NULL","0800125410100","BEST POINT SAVINGS AND LOAN","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("100","KINGSLEY MOTTEY","NULL","NULL","0060010711371","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("101","AGBOTA PAUL DAWUKPOR","NULL","NULL","0800300110100","BEST POINT SAVINGS AND LOAN","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("102","YUSSIF MOHAMMED","NULL","NULL","0430010629021","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("103","SENANU  FELIX","NULL","NULL","2030806423412","Fidelity Bank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("104","TEE ERIC","NULL","NULL","0291300076722","Universal Merchant Bank,Spintex Rd.","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("105","SITSOFE KOMLA HEDZRO","NULL","NULL","0430011003931","Unibank,  Zenu Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("106","PAUL MACCARTHY","NULL","NULL","0060011617141","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("107","ISAAC KUMAH","NULL","NULL","0061010973601","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("108","JOSEPH AMOAKO","NULL","NULL","2100388524613","Fidelity Bank, Accra New Town","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("109","NARH TEI JUSTIN","NULL","NULL","0060011844401","Unibank, Ashaiman","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("110","ROBERT AMENU","NULL","NULL","3200123778917","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","100","200","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("111","FELIX KABUTEY","NULL","NULL","0221626711341","ACCESS BANK,ASHAIMAN","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("112","NOAH QUARSHIE","NULL","NULL","0400379610100","BEST POINT SAVINGS AND LOAN","","NULL","NULL","0","300","0","300","0","0","300","100","200","16","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("113","ALFRED ABOAGYE","NULL","NULL","0150485235900","Standard Charted Bank, Tema East","","NULL","NULL","0","300","0","300","0","0","300","0","300","12","1","3","1","2019-02-18","2019-02-18","0","0","0","0","0","1");
INSERT INTO employees VALUES("114","ADAMS ISSAH","NULL","NULL","0600163970117","Unibank, Ashiaman","","NULL","NULL","0","250","0","250","0","0","250","0","250","13","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("115","JOHN GATI","NULL","NULL","1032000031738201","ADB, Tema","","NULL","NULL","0","250","0","250","0","0","250","0","250","13","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("116","ALEX EZU","NULL","NULL","0600163963415","Unibank, Ashiaman","","NULL","NULL","0","800","0","756","39.9","83.9","572.1","100","672.1","14","1","4","1","2019-02-18","2019-02-19","0","0","0","44","0","1");
INSERT INTO employees VALUES("117"," LAZIZ ABDUL  SAHEED","NULL","NULL","0320012011781","UNIBANK ,COMM. 25","","NULL","NULL","0","800","0","756","39.9","83.9","672.1","0","672.1","15","1","4","1","2019-02-18","2019-02-19","0","0","0","44","0","1");
INSERT INTO employees VALUES("118","NARH E. TEI ","NULL","NULL","0600163133118","Unibank, Ashiaman","C047608250015","NULL","NULL","0","1500","0","1417.5","174.66","257.16","1160.34","0","1160.34","15","1","4","1","2019-02-18","2019-02-19","0","0","0","82.52","0","1");
INSERT INTO employees VALUES("119","AVEVOR MAWULI GODFRED","NULL","NULL","0060011994421","Unibank, Ashiaman","","NULL","NULL","0","1400","0","1323","139.13","216.13","1106.87","0","1106.87","14","1","4","1","2019-02-18","2019-02-19","0","0","0","77","0","1");
INSERT INTO employees VALUES("120","MUSAH ALHASSAN","NULL","NULL","0190907813014","H.F.C Bank, Ashiaman","","NULL","NULL","0","600","0","567","25.83","58.83","508.17","0","508.17","15","1","4","1","2019-02-18","2019-02-19","0","0","0","33","0","1");
INSERT INTO employees VALUES("121","BOAKYE EDEM FOSTER","NULL","NULL","0061010656771","Unibank, Ashiaman","","NULL","NULL","0","585","0","552.83","23.34","55.52","497.31","0","497.31","13","1","4","1","2019-02-18","2019-02-19","0","0","0","32.18","0","1");
INSERT INTO employees VALUES("122","AKAKPO KENOU","NULL","NULL","0600163990811","Unibank ,Ashaiman","","NULL","NULL","0","350","0","350","0","0","250","100","350","16","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("123","ALEX ADDO","NULL","NULL","0610163837512","Unibank Ashaiman","","NULL","NULL","0","325","0","325","0","0","325","0","325","16","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("124","EVANS OBUBUAFO","NULL","NULL","0600160096419","Unibank, Ashiaman","","NULL","NULL","0","300","0","300","0","0","300","0","300","17","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("125","MOSES HOMEKU","NULL","NULL","0600163970217","Unibank, Ashiaman","","NULL","NULL","0","0","0","0","0","0","0","0","0","16","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("126","MOHAMMED MUBARICK ","NULL","NULL","0320011980591","Unibank, Ashaiman","","NULL","NULL","0","700","0","700","38.5","38.5","661.5","0","661.5","22","1","4","1","2019-02-18","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("127","CHRISTIAN AGBELI","NULL","NULL","0061011398021","Uni Bank ,Ashaiman","D076004190030","NULL","NULL","0","650","0","614.25","25.83","25.83","388.42","0","388.42","18","2","5","1","2019-02-19","2019-02-19","0","0","0","35.75","0","1");
INSERT INTO employees VALUES("128","MARTIN SIMPRI","NULL","NULL","0060012147751","Uni Bank ,Ashaiman","","NULL","NULL","0","600","0","600","25.83","25.83","574.17","0","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("129","NATHANIEL NARTEY","NULL","NULL","0600163973119","Unibank, Ashiaman","","NULL","NULL","0","200","0","200","0","0","200","0","200","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("130","ELIKPLIM -KWASHIE   DA-SILVERA","NULL","NULL","0451618059071","The Beige Capital,Ash. Round About","D098611050017","NULL","NULL","0","600","0","567","25.83","25.83","541.17","0","541.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","33","0","1");
INSERT INTO employees VALUES("131","AKPABLI DANIEL KUJO","NULL","NULL","0451604798071","The Beige Capital,Ash. Round About","","NULL","NULL","0","600","0","600","25.83","25.83","574.17","0","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("132","KUFOALOR ARNOLD","NULL","NULL","9040007164542","Stanbic Bank,Ashaiman","","NULL","NULL","0","600","0","600","25.83","25.83","574.17","0","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("133","MORTI NICHOLAS","NULL","NULL","0061006385231","Unibank, Ashiaman","","NULL","NULL","0","600","0","600","25.83","25.83","474.17","100","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("134","SAMUEL OMELTEY","NULL","NULL","0600163994418","Unibank, Ashiaman","","NULL","NULL","0","600","0","600","25.83","25.83","474.17","100","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("135","EVANS L. K. AGBAGA","NULL","NULL","136011569612","CARL BANK ,TEMA COM. 1","C015603250032","NULL","NULL","0","600","0","600","25.83","25.83","574.17","0","574.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("136"," ANOMAH SAMUEL AKWAH","NULL","NULL","0060006352931","Unibank, Ashiaman","C109209280039","NULL","NULL","0","600","0","567","25.83","25.83","541.17","0","541.17","18","2","5","1","2019-02-19","2019-02-19","0","0","0","33","0","1");
INSERT INTO employees VALUES("137","RITA OBENEWAA","NULL","NULL","0192343103014","HFC, Ashaiman","","NULL","NULL","0","360","0","360","0","0","360","0","360","21","2","6","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("138","DANIEL VIGBEDOR","NULL","NULL","0320010616751","UNIBANK ,COMM. 25","","NULL","NULL","0","600","0","567","25.83","25.83","541.17","0","541.17","21","2","6","1","2019-02-19","2019-02-19","0","0","0","33","0","1");
INSERT INTO employees VALUES("139","EMMANUEL OKYERE","NULL","NULL","2030021739653","FIDELITY BANK","","NULL","NULL","0","450","0","450","0","0","450","0","450","0","4","6","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("140","EMMANUEL DANSO","NULL","NULL","0061011266381","Unibank, Ashiaman","","NULL","NULL","0","180","0","180","0","0","180","0","180","20","4","6","1","2019-02-19","2019-02-19","0","0","0","0","0","1");
INSERT INTO employees VALUES("141","PIERRE DJIRIOBE","NULL","NULL","0600163018117","Uni Bank ,Ashaiman","","NULL","NULL","0","1040","0","1040","0","0","1040","0","1040","1","1","1","1","2019-02-19","2019-02-20","0","0","0","0","0","1");
INSERT INTO employees VALUES("142","EVA  EFUA F. AGBO","NULL","NULL","9040006899913","Stanbic Bank,Ashaiman","D018201150040","NULL","NULL","0","2600","0","2457","0","0","1657","0","1657","2","2","1","1","2019-02-19","2019-02-20","0","0","0","143","0","1");
INSERT INTO employees VALUES("143","UMAH SALMA SAMBA","NULL","NULL","2030905312619","Fidelity Bank, Ashiaman","C109001060045","NULL","NULL","0","1000","0","945","0","0","645","0","645","3","2","1","1","2019-02-19","2019-02-20","0","0","0","55","0","1");
INSERT INTO employees VALUES("144","ISHMAEL AFENYO","NULL","NULL","0610162865016","Uni Bank ,Ashaiman","D097503180010","NULL","NULL","0","2340","0","2211.3","0","0","1811.3","0","1811.3","4","2","1","1","2019-02-19","2019-02-20","0","0","0","128.7","0","1");
INSERT INTO employees VALUES("145","SAVIOUR QUARCOO KUDZE","NULL","NULL","9060904435","Zenith Bank, Industrial Area ","","NULL","NULL","0","1000","0","1000","0","0","1000","0","1000","5","2","1","1","2019-02-19","2019-02-20","0","0","0","0","0","1");
INSERT INTO employees VALUES("146","MOSES BUER","NULL","NULL","0600160008013","Unibank, Ashaiman","  ","NULL","NULL","0","1690","0","1597.05","0","0","1597.05","0","1597.05","6","1","1","1","2019-02-19","2019-02-20","0","0","0","92.95","0","1");
INSERT INTO employees VALUES("147","HOPE FENU ","NULL","NULL","0600163837118","Unibank, Ashiaman","C037506120137","NULL","NULL","0","780","0","737.1","0","0","737.1","0","737.1","7","1","1","1","2019-02-19","2019-02-20","0","0","0","42.9","0","1");
INSERT INTO employees VALUES("148","JACOB TEYE ","NULL","NULL","2030905123117","Fidelity Bank, Ashiaman","","NULL","NULL","0","650","0","650","0","0","450","0","450","8","1","1","1","2019-02-19","2019-02-20","0","0","0","0","0","1");
INSERT INTO employees VALUES("149","WILLIAM ATIOGBE","NULL","NULL","0493014467308801","Ecobank, Aflao Branch","E07412280013","NULL","NULL","0","2210","0","2088.45","0","0","2088.45","0","2088.45","9","1","1","1","2019-02-19","2019-02-20","0","0","0","121.55","0","1");
INSERT INTO employees VALUES("150","LAWRENCE YAO ADDO","NULL","NULL","0061006206271","Unibank, Ashiaman","","NULL","NULL","0","5000","0","4725","0","0","4725","0","4725","10","3","1","1","2019-02-19","2019-02-20","0","0","0","275","0","1");



DROP TABLE last_restored;

CREATE TABLE `last_restored` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_restored` datetime NOT NULL,
  `is_last` int(11) NOT NULL,
  `is_inUse` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO last_restored VALUES("1","2019-03-08 16:00:00","0","0");
INSERT INTO last_restored VALUES("2","2019-03-15 10:28:22","0","0");
INSERT INTO last_restored VALUES("3","2019-03-15 12:07:12","0","0");
INSERT INTO last_restored VALUES("4","2019-03-15 12:28:09","0","0");
INSERT INTO last_restored VALUES("5","2019-03-15 12:32:53","1","1");



DROP TABLE main_category;

CREATE TABLE `main_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_code` varchar(10) NOT NULL,
  `input_date` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO main_category VALUES("1","Senior Staff","SS","2019-02-16");
INSERT INTO main_category VALUES("2","BVO drivers","BVOD","2019-02-16");
INSERT INTO main_category VALUES("3","BVO drivers mate","BVOM","2019-02-16");
INSERT INTO main_category VALUES("4","Mechanics and drivers","MAD","2019-02-16");
INSERT INTO main_category VALUES("5","Security","ST","2019-02-16");
INSERT INTO main_category VALUES("6","General Staff","GS","2019-02-16");



DROP TABLE pay_dates_pay;

CREATE TABLE `pay_dates_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `payroll_lastPayId` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `last_payDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO pay_dates_pay VALUES("1","1","1","2019-03-09","2019-03-09");
INSERT INTO pay_dates_pay VALUES("2","2","2","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("3","3","3","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("4","4","4","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("5","5","5","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("6","6","6","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("7","7","7","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("8","8","8","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("9","9","9","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("10","10","10","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("11","11","11","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("12","12","12","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("13","13","13","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("14","14","14","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("15","15","15","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("16","16","16","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("17","17","17","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("18","18","18","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("19","19","19","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("20","20","20","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("21","21","21","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("22","22","22","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("23","23","23","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("24","24","24","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("25","25","25","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("26","26","26","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("27","27","27","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("28","28","28","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("29","29","29","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("30","30","30","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("31","31","31","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("32","32","32","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("33","33","33","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("34","34","34","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("35","35","35","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("36","36","36","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("37","37","37","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("38","38","38","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("39","39","39","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("40","40","40","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("41","41","41","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("42","42","42","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("43","43","43","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("44","44","44","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("45","45","45","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("46","46","46","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("47","47","47","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("48","48","48","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("49","49","49","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("50","50","50","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("51","51","51","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("52","52","52","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("53","53","53","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("54","54","54","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("55","55","55","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("56","56","56","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("57","57","57","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("58","58","58","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("59","59","59","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("60","60","60","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("61","61","61","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("62","62","62","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("63","63","63","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("64","64","64","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("65","65","65","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("66","66","66","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("67","67","67","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("68","68","68","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("69","69","69","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("70","70","70","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("71","71","71","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("72","72","72","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("73","73","73","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("74","74","74","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("75","75","75","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("76","76","76","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("77","77","77","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("78","78","78","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("79","79","79","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("80","80","80","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("81","81","81","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("82","82","82","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("83","83","83","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("84","84","84","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("85","85","85","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("86","86","86","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("87","87","87","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("88","88","88","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("89","89","89","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("90","90","90","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("91","91","91","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("92","92","92","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("93","93","93","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("94","94","94","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("95","95","95","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("96","96","96","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("97","97","97","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("98","98","98","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("99","99","99","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("100","100","100","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("101","101","101","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("102","102","102","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("103","103","103","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("104","104","104","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("105","105","105","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("106","106","106","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("107","107","107","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("108","108","108","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("109","109","109","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("110","110","110","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("111","111","111","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("112","112","112","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("113","113","113","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("114","114","114","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("115","115","115","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("116","116","116","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("117","117","117","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("118","118","118","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("119","119","119","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("120","120","120","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("121","121","121","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("122","122","122","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("123","123","123","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("124","124","124","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("125","125","125","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("126","126","126","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("127","127","127","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("128","128","128","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("129","129","129","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("130","130","130","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("131","131","131","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("132","132","132","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("133","133","133","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("134","134","134","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("135","135","135","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("136","136","136","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("137","137","137","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("138","138","138","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("139","139","139","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("140","140","140","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("141","141","141","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("142","142","142","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("143","143","143","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("144","144","144","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("145","145","145","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("146","146","146","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("147","147","147","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("148","148","148","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("149","149","149","2019-01-21","2019-01-21");
INSERT INTO pay_dates_pay VALUES("150","150","150","2019-01-21","2019-01-21");



DROP TABLE payroll_date;

CREATE TABLE `payroll_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `input_date` datetime NOT NULL,
  `sas` date NOT NULL,
  `auto_man` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO payroll_date VALUES("1","2019-03-16 16:00:00","2019-03-15","2","daily","0");
INSERT INTO payroll_date VALUES("2","2019-03-15 16:00:00","0000-00-00","1","back_up","1");
INSERT INTO payroll_date VALUES("3","0000-00-00 00:00:00","0000-00-00","0","never","0");
INSERT INTO payroll_date VALUES("4","2019-03-16 16:00:00","2019-03-09","3","weekly","0");



DROP TABLE payroll_default_rules;

CREATE TABLE `payroll_default_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `date_stored` date NOT NULL,
  `basic_pay` float NOT NULL,
  `emp_gross_salary` float NOT NULL,
  `emp_taxable_salary` float NOT NULL,
  `emp_paye` float NOT NULL,
  `emp_total_statutory_deductions` float NOT NULL,
  `net_before_deductions` float NOT NULL,
  `emp_net_salary` float NOT NULL,
  `emp_bicycle_deduction` float NOT NULL,
  `empnet_salary_payable` float NOT NULL,
  `emp_oter_deductions` float NOT NULL,
  `employee_ssf` float NOT NULL,
  `employer_ssf` float NOT NULL,
  `debt_bal_b/d` float NOT NULL,
  `current_loans/surcharges` float NOT NULL,
  `other_expensis` float NOT NULL,
  `total_debt` float NOT NULL,
  `adjustments` float NOT NULL,
  `deductions` float NOT NULL,
  `bal_outstanding` float NOT NULL,
  `total_deductions` float NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `updatee_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE payroll_next_pay;

CREATE TABLE `payroll_next_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date_stored` date NOT NULL,
  `basic_pay` float NOT NULL,
  `emp_gross_salary` float NOT NULL,
  `emp_taxable_salary` float NOT NULL,
  `emp_paye` float NOT NULL,
  `emp_total_statutory_deductions` float NOT NULL,
  `net_before_deductions` float NOT NULL,
  `emp_net_salary` float NOT NULL,
  `emp_bicycle_deduction` float NOT NULL,
  `empnet_salary_payable` float NOT NULL,
  `emp_oter_deductions` float NOT NULL,
  `employee_ssf` float NOT NULL,
  `employer_ssf` float NOT NULL,
  `debt_bal_b/d` float NOT NULL,
  `current_loans/surcharges` float NOT NULL,
  `other_expensis` float NOT NULL,
  `total_debt` float NOT NULL,
  `adjustments` float NOT NULL,
  `deductions` float NOT NULL,
  `bal_outstanding` float NOT NULL,
  `total_deductions` float NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `updatee_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE payroll_store;

CREATE TABLE `payroll_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date_stored` date NOT NULL,
  `basic_pay` float NOT NULL,
  `emp_gross_salary` float NOT NULL,
  `emp_taxable_salary` float NOT NULL,
  `emp_paye` float NOT NULL,
  `emp_total_statutory_deductions` float NOT NULL,
  `net_before_deductions` float NOT NULL,
  `emp_net_salary` float NOT NULL,
  `emp_bicycle_deduction` float NOT NULL,
  `empnet_salary_payable` float NOT NULL,
  `emp_oter_deductions` float NOT NULL,
  `employee_ssf` float NOT NULL,
  `employer_ssf` float NOT NULL,
  `debt_bal_b/d` float NOT NULL,
  `current_loans/surcharges` float NOT NULL,
  `other_expensis` float NOT NULL,
  `total_debt` float NOT NULL,
  `adjustments` float NOT NULL,
  `deductions` float NOT NULL,
  `bal_outstanding` float NOT NULL,
  `total_deductions` float NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `updatee_date` date NOT NULL,
  `ready_for_printing` int(11) NOT NULL,
  `ready_for_deleting` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO payroll_store VALUES("1","1","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","17775","0","0","17775","0","690","17085","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("2","2","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","0","638.76","0","93.5","221","19838","0","0","19838","0","760","19078","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("3","3","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","100","538.76","0","93.5","221","41958","0","0","41958","0","760","41198","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("4","4","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","17817","0","0","17817","0","690","17127","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("5","5","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","0","638.76","0","93.5","221","33573","0","0","33573","0","760","32813","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("6","6","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","100","538.76","0","93.5","221","33619","0","0","33619","0","760","32859","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("7","7","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","6297","0","0","6297","0","690","5607","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("8","8","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","0","638.76","0","93.5","221","36646","0","0","36646","0","760","35886","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("9","9","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","14158","0","0","14158","0","690","13468","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("10","10","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","28845","728.4","0","29573.4","0","760","29573.4","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("11","11","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","13784","0","0","13784","0","690","13094","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("12","12","2019-01-21","1700","0","1606.5","207.74","301.24","1492.26","708.76","0","708.76","0","93.5","221","5175","0","0","5175","0","690","4485","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("13","13","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","608.76","0","608.76","0","93.5","221","27478","0","0","27478","0","790","26688","1091.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("14","14","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","878.76","0","878.76","0","93.5","221","1136","0","0","1136","0","520","616","821.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("15","15","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","878.76","0","878.76","0","93.5","221","1399","0","0","1399","0","520","879","821.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("16","16","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","998.76","0","998.76","0","93.5","221","3800","0","0","3800","0","400","3400","701.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("17","17","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","53463","0","0","53463","0","2664","53463","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("18","18","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","0","638.76","0","93.5","221","25639","0","0","25639","0","760","24879","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("19","19","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","608.76","0","608.76","0","93.5","221","30052","0","0","30052","0","790","29262","1091.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("20","20","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","6450","0","0","6450","0","690","5760","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("21","21","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("22","22","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","0","778.76","0","93.5","221","7247","0","0","7247","0","620","6627","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("23","23","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","17402","0","0","17402","0","1250","16712","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("24","24","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","0","778.76","0","93.5","221","5056","0","0","5056","0","620","4436","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("25","25","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","100","678.76","0","93.5","221","11714","0","0","11714","0","620","11094","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("26","26","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","10958","0","0","10958","0","690","10268","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("27","27","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","32295","0","0","32295","0","1280","32295","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("28","28","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("29","29","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","16981","0","0","16981","0","690","16291","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("30","30","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","0","778.76","0","93.5","221","8100","0","0","8100","0","620","7480","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("31","31","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","0","778.76","0","93.5","221","6615","0","0","6615","0","620","5995","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("32","32","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","10115","0","0","10115","0","690","9425","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("33","33","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","100","608.76","0","93.5","221","15460","0","0","15460","0","690","14770","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("34","34","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("35","35","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","100","1298.76","0","93.5","221","16848","0","0","16848","0","1299","16848","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("36","36","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","7790","0","0","7790","0","1399","7790","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("37","37","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","16514","0","0","16514","0","690","15824","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("38","38","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","10265","284.4","0","10549.4","0","974","10549.4","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("39","39","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","4811","0","0","4811","0","690","4121","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("40","40","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","100","1298.76","0","93.5","221","12847","614","0","13461","0","1299","13461","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("41","41","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","0","778.76","0","93.5","221","4993","0","0","4993","0","620","4373","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("42","42","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","708.76","0","708.76","0","93.5","221","2514","0","0","2514","0","690","1824","991.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("43","43","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","100","678.76","0","93.5","221","3793","0","0","3793","0","620","3173","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("44","44","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","100","678.76","0","93.5","221","7683","0","0","7683","0","620","7063","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("45","45","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","778.76","200","578.76","0","93.5","221","2907","0","0","2907","0","620","2287","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("46","46","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","638.76","0","638.76","0","93.5","221","26911","0","0","26911","0","760","26151","1061.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("47","47","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","17744","0","0","17744","0","1399","17744","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("48","48","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("49","49","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","14024","0","0","14024","0","1399","14024","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("50","50","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","778.76","0","93.5","221","1927","0","0","1927","0","620","1307","921.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("51","51","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","100","854.76","0","93.5","221","444","0","0","444","0","444","0","745.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("52","52","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("53","53","2019-01-21","1100","0","1606.5","119.01","179.51","920.49","720.49","0","720.49","0","60.5","143","1400","0","0","1400","0","200","1200","379.51","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("54","54","2019-01-21","1700","0","1606.5","207.74","301.24","1492.26","1111.26","287.5","1111.26","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("55","55","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1398.76","0","1398.76","0","93.5","221","0","0","0","0","0","0","0","301.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("56","56","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","1318.76","0","1318.76","0","93.5","221","0","80","0","80","0","80","0","381.24","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("57","57","2019-01-21","1700","0","1606.5","207.74","301.24","1398.76","0","0","0","0","93.5","221","0","1500","0","1500","0","1399","101.24","1700","","","","2019-02-20","0","0");
INSERT INTO payroll_store VALUES("58","58","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("59","59","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("60","60","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("61","61","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("62","62","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("63","63","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("64","64","2019-01-21","300","0","300","0","0","300","100","0","100","0","0","0","0","1200","0","1200","0","200","1000","200","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("65","65","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("66","66","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("67","67","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("68","68","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("69","69","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("70","70","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("71","71","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("72","72","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("73","73","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("74","74","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("75","75","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("76","76","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("77","77","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("78","78","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("79","79","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("80","80","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("81","81","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("82","82","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("83","83","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("84","84","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("85","85","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("86","86","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("87","87","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("88","88","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("89","89","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("90","90","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("91","91","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("92","92","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("93","93","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("94","94","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("95","95","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("96","96","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("97","97","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("98","98","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("99","99","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("100","100","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("101","101","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("102","102","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("103","103","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("104","104","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("105","105","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("106","106","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("107","107","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("108","108","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("109","109","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("110","110","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("111","111","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("112","112","2019-01-21","300","0","300","0","0","300","300","100","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("113","113","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("114","114","2019-01-21","250","0","250","0","0","250","250","0","250","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("115","115","2019-01-21","250","0","250","0","0","250","250","0","250","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("116","116","2019-01-21","800","0","756","39.9","83.9","756","572.1","100","672.1","0","44","0","0","0","0","0","0","0","0","830.9","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("117","117","2019-01-21","800","0","756","39.9","83.9","756","672.1","0","672.1","0","44","0","0","0","0","0","0","0","0","83.9","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("118","118","2019-01-21","1500","0","1417.5","174.66","257.16","1417.5","1160.34","0","1160.34","0","82.52","0","0","0","0","0","0","0","0","257.16","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("119","119","2019-01-21","1400","0","1323","139.13","216.13","1323","1106.87","0","1106.87","0","77","0","0","0","0","0","0","0","0","216.13","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("120","120","2019-01-21","600","0","567","25.83","58.83","567","508.17","0","508.17","0","33","0","0","0","0","0","0","0","0","58.83","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("121","121","2019-01-21","585","0","552.83","23.34","55.52","552.83","497.31","0","497.31","0","32.18","0","0","0","0","0","0","0","0","55.52","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("122","122","2019-01-21","350","0","350","0","0","350","250","100","350","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("123","123","2019-01-21","325","0","325","0","0","325","325","0","325","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("124","124","2019-01-21","300","0","300","0","0","300","300","0","300","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("125","125","2019-01-21","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("126","126","2019-01-21","700","0","700","38.5","38.5","700","661.5","0","661.5","0","0","0","0","0","0","0","0","0","0","38.5","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("127","127","2019-01-21","650","0","614.25","25.83","25.83","588.42","388.42","0","388.42","0","35.75","0","900","0","0","900","0","200","700","261.58","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("128","128","2019-01-21","600","0","600","25.83","25.83","574.17","574.17","0","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("129","129","2019-01-21","200","0","200","0","0","200","200","0","200","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("130","130","2019-01-21","600","0","567","25.83","25.83","574.17","541.17","0","541.17","0","33","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("131","131","2019-01-21","600","0","600","25.83","25.83","574.17","574.17","0","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("132","132","2019-01-21","600","0","600","25.83","25.83","574.17","574.17","0","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("133","133","2019-01-21","600","0","600","25.83","25.83","574.17","474.17","100","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("134","134","2019-01-21","600","0","600","25.83","25.83","574.17","474.17","100","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("135","135","2019-01-21","600","0","600","25.83","25.83","574.17","574.17","0","574.17","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("136","136","2019-01-21","600","0","567","25.83","25.83","574.17","541.17","0","541.17","0","33","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("137","137","2019-01-21","360","0","360","0","0","360","360","0","360","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("138","138","2019-01-21","600","0","567","25.83","25.83","541.17","541.17","0","541.17","0","33","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("139","139","2019-01-21","450","0","450","0","0","450","450","0","450","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("140","140","2019-01-21","180","0","180","0","0","180","180","0","180","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("141","141","2019-01-21","1040","0","1040","0","0","1040","1040","0","1040","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("142","142","2019-01-21","2600","0","2457","0","0","2457","1657","0","1657","0","143","0","19606","0","0","19606","0","800","18806","943","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("143","143","2019-01-21","1000","0","945","0","0","945","645","0","645","0","55","0","600","0","0","600","0","300","300","355","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("144","144","2019-01-21","2340","0","2211.3","0","0","2211.3","1811.3","0","1811.3","0","128.7","0","6860","0","0","6860","0","400","6460","5287","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("145","145","2019-01-21","1000","0","1000","0","0","1000","1000","0","1000","0","0","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("146","146","2019-01-21","1690","0","1597.05","0","0","1597.05","1597.05","0","1597.05","0","92.95","0","0","0","0","0","0","0","0","92.95","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("147","147","2019-01-21","780","0","737.1","0","0","737.1","737.1","0","737.1","0","42.9","0","0","0","0","0","0","0","0","42.9","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("148","148","2019-01-21","650","0","650","0","0","650","450","0","450","0","0","0","1500","0","0","1500","0","200","1300","200","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("149","149","2019-01-21","2210","0","2088.45","0","0","2088.45","2088.45","0","2088.45","0","121.55","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");
INSERT INTO payroll_store VALUES("150","150","2019-01-21","5000","0","4725","0","0","4725","4725","0","4725","0","275","0","0","0","0","0","0","0","0","0","","","","0000-00-00","0","0");



DROP TABLE positions;

CREATE TABLE `positions` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_type_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pos_code` varchar(11) NOT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `main_category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO positions VALUES("1","Assistant manager","1","AM");
INSERT INTO positions VALUES("2","Administrator","1","AD");
INSERT INTO positions VALUES("3","Secretary","1","ST");
INSERT INTO positions VALUES("4","CFO","1","CF");
INSERT INTO positions VALUES("5","Counsel","1","CS");
INSERT INTO positions VALUES("6","Transport Manager","1","TM");
INSERT INTO positions VALUES("7","Supervisor","1","SP");
INSERT INTO positions VALUES("8","Deport REP.","1","DR");
INSERT INTO positions VALUES("9","Operations M.","1","OM");
INSERT INTO positions VALUES("10","GM","1","GM");
INSERT INTO positions VALUES("11","BVO","2","BVO");
INSERT INTO positions VALUES("12","BVO Mate","3","BVOM");
INSERT INTO positions VALUES("13","Driver","4","DV");
INSERT INTO positions VALUES("14","Electrician","4","EL");
INSERT INTO positions VALUES("15","Mechanic","4","MH");
INSERT INTO positions VALUES("16","Operator","4","OPT");
INSERT INTO positions VALUES("17","Operator Mate","4","OPTM");
INSERT INTO positions VALUES("18","Security","5","SCT");
INSERT INTO positions VALUES("19","Goil REP","6","GREP");
INSERT INTO positions VALUES("20","CEO\'s House Help","6","CEOHH");
INSERT INTO positions VALUES("21","Cleaner","6","CL");
INSERT INTO positions VALUES("22","Vulganizer","4","NULL");



DROP TABLE reports;

CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `reports` varchar(255) NOT NULL,
  `input_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE ssf;

CREATE TABLE `ssf` (
  `ssf_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_%` float NOT NULL,
  `employer_%` float NOT NULL,
  `total` float NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`ssf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO ssf VALUES("1","0.055","0.13","0.19","1");



DROP TABLE sys_settings;

CREATE TABLE `sys_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name_on_payslip` varchar(255) NOT NULL,
  `bank_name_on_payslip` varchar(255) NOT NULL,
  `bank_location_on_payslip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO sys_settings VALUES("1","KODSON PLUS CO. LTD","GHC","PLOT # 10 OLD ADA ROAD. BOX SK 519 SAKUMONO, TEMA.","0303305730","kodsontransport@gmail.com","THE MANAGER","UNIBANK GHANA LTD","ASHAIMAN");



DROP TABLE system_logs;

CREATE TABLE `system_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `log_location` varchar(255) NOT NULL,
  `log_msg` varchar(255) NOT NULL,
  `log_datTime` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE taxes;

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chargeable_income` float NOT NULL,
  `rate` float NOT NULL,
  `tax` float NOT NULL,
  `cumulative_chargeable_income` float NOT NULL,
  `insertDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO taxes VALUES("1","288","0","0","288","2019-03-11 19:22:03");
INSERT INTO taxes VALUES("2","100","5","5","388","2019-03-11 19:22:03");
INSERT INTO taxes VALUES("3","140","10","14","528","2019-03-11 19:22:03");
INSERT INTO taxes VALUES("4","3000","17.5","525","3528","2019-03-11 19:22:03");
INSERT INTO taxes VALUES("5","16472","25","4118","20000","2019-03-11 19:22:03");
INSERT INTO taxes VALUES("6","20000","30","0","0","2019-03-11 19:22:03");



DROP TABLE test;

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_id` int(11) NOT NULL,
  `emp_temp_id` int(11) NOT NULL,
  `main_temp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;

INSERT INTO test VALUES("1","1","2","0");
INSERT INTO test VALUES("2","2","4","0");
INSERT INTO test VALUES("3","3","6","0");
INSERT INTO test VALUES("4","4","8","0");
INSERT INTO test VALUES("5","5","10","0");
INSERT INTO test VALUES("6","6","12","0");
INSERT INTO test VALUES("7","7","14","0");
INSERT INTO test VALUES("8","8","16","0");
INSERT INTO test VALUES("9","9","18","0");
INSERT INTO test VALUES("10","10","20","0");
INSERT INTO test VALUES("11","11","22","0");
INSERT INTO test VALUES("12","12","24","0");
INSERT INTO test VALUES("13","13","26","0");
INSERT INTO test VALUES("14","14","28","0");
INSERT INTO test VALUES("15","15","30","0");
INSERT INTO test VALUES("16","16","32","0");
INSERT INTO test VALUES("17","17","34","0");
INSERT INTO test VALUES("18","18","36","0");
INSERT INTO test VALUES("19","19","38","0");
INSERT INTO test VALUES("20","20","40","0");
INSERT INTO test VALUES("21","21","42","0");
INSERT INTO test VALUES("22","22","44","0");
INSERT INTO test VALUES("23","23","46","0");
INSERT INTO test VALUES("24","24","48","0");
INSERT INTO test VALUES("25","25","50","0");
INSERT INTO test VALUES("26","26","52","0");
INSERT INTO test VALUES("27","27","54","0");
INSERT INTO test VALUES("28","28","56","0");
INSERT INTO test VALUES("29","29","58","0");
INSERT INTO test VALUES("30","30","60","0");
INSERT INTO test VALUES("31","31","62","0");
INSERT INTO test VALUES("32","32","64","0");
INSERT INTO test VALUES("33","33","66","0");
INSERT INTO test VALUES("34","34","68","0");
INSERT INTO test VALUES("35","35","70","0");
INSERT INTO test VALUES("36","36","72","0");
INSERT INTO test VALUES("37","37","74","0");
INSERT INTO test VALUES("38","38","76","0");
INSERT INTO test VALUES("39","39","78","0");
INSERT INTO test VALUES("40","40","80","0");
INSERT INTO test VALUES("41","41","82","0");
INSERT INTO test VALUES("42","42","84","0");
INSERT INTO test VALUES("43","43","86","0");
INSERT INTO test VALUES("44","44","88","0");
INSERT INTO test VALUES("45","45","90","0");
INSERT INTO test VALUES("46","46","92","0");
INSERT INTO test VALUES("47","47","94","0");
INSERT INTO test VALUES("48","48","96","0");
INSERT INTO test VALUES("49","49","98","0");
INSERT INTO test VALUES("50","50","100","0");
INSERT INTO test VALUES("51","51","102","0");
INSERT INTO test VALUES("52","52","104","0");
INSERT INTO test VALUES("53","53","106","0");
INSERT INTO test VALUES("54","54","108","0");
INSERT INTO test VALUES("55","55","110","0");
INSERT INTO test VALUES("56","56","112","0");
INSERT INTO test VALUES("57","57","114","0");
INSERT INTO test VALUES("58","58","116","0");
INSERT INTO test VALUES("59","59","118","0");
INSERT INTO test VALUES("60","60","120","0");
INSERT INTO test VALUES("61","61","122","0");
INSERT INTO test VALUES("62","62","124","0");
INSERT INTO test VALUES("63","63","126","0");
INSERT INTO test VALUES("64","64","128","0");
INSERT INTO test VALUES("65","65","130","0");
INSERT INTO test VALUES("66","66","132","0");
INSERT INTO test VALUES("67","67","134","0");
INSERT INTO test VALUES("68","68","136","0");
INSERT INTO test VALUES("69","69","138","0");
INSERT INTO test VALUES("70","70","140","0");
INSERT INTO test VALUES("71","71","142","0");
INSERT INTO test VALUES("72","72","144","0");
INSERT INTO test VALUES("73","73","146","0");
INSERT INTO test VALUES("74","74","148","0");
INSERT INTO test VALUES("75","75","150","0");
INSERT INTO test VALUES("76","76","152","0");
INSERT INTO test VALUES("77","77","154","0");
INSERT INTO test VALUES("78","78","156","0");
INSERT INTO test VALUES("79","79","158","0");
INSERT INTO test VALUES("80","80","160","0");
INSERT INTO test VALUES("81","81","162","0");
INSERT INTO test VALUES("82","82","164","0");
INSERT INTO test VALUES("83","83","166","0");
INSERT INTO test VALUES("84","84","168","0");
INSERT INTO test VALUES("85","85","170","0");
INSERT INTO test VALUES("86","86","172","0");
INSERT INTO test VALUES("87","87","174","0");
INSERT INTO test VALUES("88","88","176","0");
INSERT INTO test VALUES("89","89","178","0");
INSERT INTO test VALUES("90","90","180","0");
INSERT INTO test VALUES("91","91","182","0");
INSERT INTO test VALUES("92","92","184","0");
INSERT INTO test VALUES("93","93","186","0");
INSERT INTO test VALUES("94","94","188","0");
INSERT INTO test VALUES("95","95","190","0");
INSERT INTO test VALUES("96","96","192","0");
INSERT INTO test VALUES("97","97","194","0");
INSERT INTO test VALUES("98","98","196","0");
INSERT INTO test VALUES("99","99","198","0");
INSERT INTO test VALUES("100","100","200","0");
INSERT INTO test VALUES("101","101","202","0");
INSERT INTO test VALUES("102","102","204","0");
INSERT INTO test VALUES("103","103","206","0");
INSERT INTO test VALUES("104","104","208","0");
INSERT INTO test VALUES("105","105","210","0");
INSERT INTO test VALUES("106","106","212","0");
INSERT INTO test VALUES("107","107","214","0");
INSERT INTO test VALUES("108","108","216","0");
INSERT INTO test VALUES("109","109","218","0");
INSERT INTO test VALUES("110","110","220","0");
INSERT INTO test VALUES("111","111","222","0");
INSERT INTO test VALUES("112","112","224","0");
INSERT INTO test VALUES("113","113","226","0");
INSERT INTO test VALUES("114","114","228","0");
INSERT INTO test VALUES("115","115","230","0");
INSERT INTO test VALUES("116","116","232","0");
INSERT INTO test VALUES("117","117","234","0");
INSERT INTO test VALUES("118","118","236","0");
INSERT INTO test VALUES("119","119","238","0");
INSERT INTO test VALUES("120","120","240","0");
INSERT INTO test VALUES("121","121","242","0");
INSERT INTO test VALUES("122","122","244","0");
INSERT INTO test VALUES("123","123","246","0");
INSERT INTO test VALUES("124","124","248","0");
INSERT INTO test VALUES("125","125","250","0");
INSERT INTO test VALUES("126","126","252","0");
INSERT INTO test VALUES("127","127","254","0");
INSERT INTO test VALUES("128","128","256","0");
INSERT INTO test VALUES("129","129","258","0");
INSERT INTO test VALUES("130","130","260","0");
INSERT INTO test VALUES("131","131","262","0");
INSERT INTO test VALUES("132","132","264","0");
INSERT INTO test VALUES("133","133","266","0");
INSERT INTO test VALUES("134","134","268","0");
INSERT INTO test VALUES("135","135","270","0");
INSERT INTO test VALUES("136","136","272","0");
INSERT INTO test VALUES("137","137","274","0");
INSERT INTO test VALUES("138","138","276","0");
INSERT INTO test VALUES("139","139","278","0");
INSERT INTO test VALUES("140","140","280","0");
INSERT INTO test VALUES("141","141","282","0");
INSERT INTO test VALUES("142","142","284","0");
INSERT INTO test VALUES("143","143","286","0");
INSERT INTO test VALUES("144","144","288","0");
INSERT INTO test VALUES("145","145","290","0");
INSERT INTO test VALUES("146","146","292","0");
INSERT INTO test VALUES("147","147","294","0");
INSERT INTO test VALUES("148","148","296","0");
INSERT INTO test VALUES("149","149","298","0");
INSERT INTO test VALUES("150","150","300","0");
INSERT INTO test VALUES("151","0","0","0");
INSERT INTO test VALUES("152","0","0","0");
INSERT INTO test VALUES("153","0","0","0");
INSERT INTO test VALUES("154","0","0","0");
INSERT INTO test VALUES("155","0","0","0");
INSERT INTO test VALUES("156","0","0","0");
INSERT INTO test VALUES("157","0","0","0");
INSERT INTO test VALUES("158","0","0","0");
INSERT INTO test VALUES("159","0","0","0");
INSERT INTO test VALUES("160","0","0","0");
INSERT INTO test VALUES("161","0","0","0");
INSERT INTO test VALUES("162","0","0","0");
INSERT INTO test VALUES("163","0","0","0");
INSERT INTO test VALUES("164","0","0","0");
INSERT INTO test VALUES("165","0","0","0");
INSERT INTO test VALUES("166","0","0","0");
INSERT INTO test VALUES("167","0","0","0");
INSERT INTO test VALUES("168","0","0","0");
INSERT INTO test VALUES("169","0","0","0");
INSERT INTO test VALUES("170","0","0","0");
INSERT INTO test VALUES("171","0","0","0");
INSERT INTO test VALUES("172","0","0","0");
INSERT INTO test VALUES("173","0","0","0");
INSERT INTO test VALUES("174","0","0","0");
INSERT INTO test VALUES("175","0","0","0");
INSERT INTO test VALUES("176","0","0","0");
INSERT INTO test VALUES("177","0","0","0");
INSERT INTO test VALUES("178","0","0","0");
INSERT INTO test VALUES("179","0","0","0");
INSERT INTO test VALUES("180","0","0","0");
INSERT INTO test VALUES("181","0","0","0");
INSERT INTO test VALUES("182","0","0","0");
INSERT INTO test VALUES("183","0","0","0");
INSERT INTO test VALUES("184","0","0","0");
INSERT INTO test VALUES("185","0","0","0");
INSERT INTO test VALUES("186","0","0","0");
INSERT INTO test VALUES("187","0","0","0");
INSERT INTO test VALUES("188","0","0","0");
INSERT INTO test VALUES("189","0","0","0");
INSERT INTO test VALUES("190","0","0","0");
INSERT INTO test VALUES("191","0","0","0");
INSERT INTO test VALUES("192","0","0","0");
INSERT INTO test VALUES("193","0","0","0");
INSERT INTO test VALUES("194","0","0","0");
INSERT INTO test VALUES("195","0","0","0");
INSERT INTO test VALUES("196","0","0","0");
INSERT INTO test VALUES("197","0","0","0");
INSERT INTO test VALUES("198","0","0","0");
INSERT INTO test VALUES("199","0","0","0");
INSERT INTO test VALUES("200","0","0","0");
INSERT INTO test VALUES("201","0","0","0");
INSERT INTO test VALUES("202","0","0","0");
INSERT INTO test VALUES("203","0","0","0");
INSERT INTO test VALUES("204","0","0","0");
INSERT INTO test VALUES("205","0","0","0");
INSERT INTO test VALUES("206","0","0","0");
INSERT INTO test VALUES("207","0","0","0");
INSERT INTO test VALUES("208","0","0","0");
INSERT INTO test VALUES("209","0","0","0");
INSERT INTO test VALUES("210","0","0","0");
INSERT INTO test VALUES("211","0","0","0");
INSERT INTO test VALUES("212","0","0","0");
INSERT INTO test VALUES("213","0","0","0");
INSERT INTO test VALUES("214","0","0","0");
INSERT INTO test VALUES("215","0","0","0");
INSERT INTO test VALUES("216","0","0","0");
INSERT INTO test VALUES("217","0","0","0");
INSERT INTO test VALUES("218","0","0","0");
INSERT INTO test VALUES("219","0","0","0");
INSERT INTO test VALUES("220","0","0","0");
INSERT INTO test VALUES("221","0","0","0");
INSERT INTO test VALUES("222","0","0","0");
INSERT INTO test VALUES("223","0","0","0");
INSERT INTO test VALUES("224","0","0","0");
INSERT INTO test VALUES("225","0","0","0");
INSERT INTO test VALUES("226","0","0","0");
INSERT INTO test VALUES("227","0","0","0");
INSERT INTO test VALUES("228","0","0","0");
INSERT INTO test VALUES("229","0","0","0");
INSERT INTO test VALUES("230","0","0","0");
INSERT INTO test VALUES("231","0","0","0");
INSERT INTO test VALUES("232","0","0","0");
INSERT INTO test VALUES("233","0","0","0");
INSERT INTO test VALUES("234","0","0","0");
INSERT INTO test VALUES("235","0","0","0");
INSERT INTO test VALUES("236","0","0","0");
INSERT INTO test VALUES("237","0","0","0");
INSERT INTO test VALUES("238","0","0","0");
INSERT INTO test VALUES("239","0","0","0");
INSERT INTO test VALUES("240","0","0","0");
INSERT INTO test VALUES("241","0","0","0");
INSERT INTO test VALUES("242","0","0","0");
INSERT INTO test VALUES("243","0","0","0");
INSERT INTO test VALUES("244","0","0","0");
INSERT INTO test VALUES("245","0","0","0");
INSERT INTO test VALUES("246","0","0","0");
INSERT INTO test VALUES("247","0","0","0");
INSERT INTO test VALUES("248","0","0","0");
INSERT INTO test VALUES("249","0","0","0");
INSERT INTO test VALUES("250","0","0","0");
INSERT INTO test VALUES("251","0","0","0");
INSERT INTO test VALUES("252","0","0","0");
INSERT INTO test VALUES("253","0","0","0");
INSERT INTO test VALUES("254","0","0","0");
INSERT INTO test VALUES("255","0","0","0");
INSERT INTO test VALUES("256","0","0","0");
INSERT INTO test VALUES("257","0","0","0");
INSERT INTO test VALUES("258","0","0","0");
INSERT INTO test VALUES("259","0","0","0");
INSERT INTO test VALUES("260","0","0","0");
INSERT INTO test VALUES("261","0","0","0");
INSERT INTO test VALUES("262","0","0","0");
INSERT INTO test VALUES("263","0","0","0");
INSERT INTO test VALUES("264","0","0","0");
INSERT INTO test VALUES("265","0","0","0");
INSERT INTO test VALUES("266","0","0","0");
INSERT INTO test VALUES("267","0","0","0");
INSERT INTO test VALUES("268","0","0","0");
INSERT INTO test VALUES("269","0","0","0");
INSERT INTO test VALUES("270","0","0","0");
INSERT INTO test VALUES("271","0","0","0");
INSERT INTO test VALUES("272","0","0","0");
INSERT INTO test VALUES("273","0","0","0");
INSERT INTO test VALUES("274","0","0","0");
INSERT INTO test VALUES("275","0","0","0");
INSERT INTO test VALUES("276","0","0","0");
INSERT INTO test VALUES("277","0","0","0");
INSERT INTO test VALUES("278","0","0","0");
INSERT INTO test VALUES("279","0","0","0");
INSERT INTO test VALUES("280","0","0","0");
INSERT INTO test VALUES("281","0","0","0");
INSERT INTO test VALUES("282","0","0","0");
INSERT INTO test VALUES("283","0","0","0");
INSERT INTO test VALUES("284","0","0","0");
INSERT INTO test VALUES("285","0","0","0");
INSERT INTO test VALUES("286","0","0","0");
INSERT INTO test VALUES("287","0","0","0");
INSERT INTO test VALUES("288","0","0","0");
INSERT INTO test VALUES("289","0","0","0");
INSERT INTO test VALUES("290","0","0","0");
INSERT INTO test VALUES("291","0","0","0");
INSERT INTO test VALUES("292","0","0","0");
INSERT INTO test VALUES("293","0","0","0");
INSERT INTO test VALUES("294","0","0","0");
INSERT INTO test VALUES("295","0","0","0");
INSERT INTO test VALUES("296","0","0","0");
INSERT INTO test VALUES("297","0","0","0");
INSERT INTO test VALUES("298","0","0","0");
INSERT INTO test VALUES("299","0","0","0");
INSERT INTO test VALUES("300","0","0","0");
INSERT INTO test VALUES("301","1","0","0");
INSERT INTO test VALUES("302","2","0","0");
INSERT INTO test VALUES("303","3","0","0");
INSERT INTO test VALUES("304","4","0","0");
INSERT INTO test VALUES("305","5","0","0");
INSERT INTO test VALUES("306","6","0","0");
INSERT INTO test VALUES("307","7","0","0");
INSERT INTO test VALUES("308","8","0","0");
INSERT INTO test VALUES("309","9","0","0");
INSERT INTO test VALUES("310","10","0","0");
INSERT INTO test VALUES("311","11","0","0");
INSERT INTO test VALUES("312","12","0","0");
INSERT INTO test VALUES("313","13","0","0");
INSERT INTO test VALUES("314","14","0","0");
INSERT INTO test VALUES("315","15","0","0");
INSERT INTO test VALUES("316","16","0","0");
INSERT INTO test VALUES("317","17","0","0");
INSERT INTO test VALUES("318","18","0","0");
INSERT INTO test VALUES("319","19","0","0");
INSERT INTO test VALUES("320","20","0","0");
INSERT INTO test VALUES("321","21","0","0");
INSERT INTO test VALUES("322","22","0","0");
INSERT INTO test VALUES("323","23","0","0");
INSERT INTO test VALUES("324","24","0","0");
INSERT INTO test VALUES("325","25","0","0");
INSERT INTO test VALUES("326","26","0","0");
INSERT INTO test VALUES("327","27","0","0");
INSERT INTO test VALUES("328","28","0","0");
INSERT INTO test VALUES("329","29","0","0");
INSERT INTO test VALUES("330","30","0","0");
INSERT INTO test VALUES("331","31","0","0");
INSERT INTO test VALUES("332","32","0","0");
INSERT INTO test VALUES("333","33","0","0");
INSERT INTO test VALUES("334","34","0","0");
INSERT INTO test VALUES("335","35","0","0");
INSERT INTO test VALUES("336","36","0","0");
INSERT INTO test VALUES("337","37","0","0");
INSERT INTO test VALUES("338","38","0","0");
INSERT INTO test VALUES("339","39","0","0");
INSERT INTO test VALUES("340","40","0","0");
INSERT INTO test VALUES("341","41","0","0");
INSERT INTO test VALUES("342","42","0","0");
INSERT INTO test VALUES("343","43","0","0");
INSERT INTO test VALUES("344","44","0","0");
INSERT INTO test VALUES("345","45","0","0");
INSERT INTO test VALUES("346","46","0","0");
INSERT INTO test VALUES("347","47","0","0");
INSERT INTO test VALUES("348","48","0","0");
INSERT INTO test VALUES("349","49","0","0");
INSERT INTO test VALUES("350","50","0","0");
INSERT INTO test VALUES("351","51","0","0");
INSERT INTO test VALUES("352","52","0","0");
INSERT INTO test VALUES("353","53","0","0");
INSERT INTO test VALUES("354","54","0","0");
INSERT INTO test VALUES("355","55","0","0");
INSERT INTO test VALUES("356","56","0","0");
INSERT INTO test VALUES("357","57","0","0");
INSERT INTO test VALUES("358","58","0","0");
INSERT INTO test VALUES("359","59","0","0");
INSERT INTO test VALUES("360","60","0","0");
INSERT INTO test VALUES("361","61","0","0");
INSERT INTO test VALUES("362","62","0","0");
INSERT INTO test VALUES("363","63","0","0");
INSERT INTO test VALUES("364","64","0","0");
INSERT INTO test VALUES("365","65","0","0");



DROP TABLE test_2;

CREATE TABLE `test_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `update_id` int(11) NOT NULL,
  `deduc_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

INSERT INTO test_2 VALUES("1","152","1","0");
INSERT INTO test_2 VALUES("2","153","2","0");
INSERT INTO test_2 VALUES("3","154","3","0");
INSERT INTO test_2 VALUES("4","155","4","0");
INSERT INTO test_2 VALUES("5","156","5","0");
INSERT INTO test_2 VALUES("6","157","6","0");
INSERT INTO test_2 VALUES("7","158","7","0");
INSERT INTO test_2 VALUES("8","159","8","0");
INSERT INTO test_2 VALUES("9","160","9","0");
INSERT INTO test_2 VALUES("10","161","10","0");
INSERT INTO test_2 VALUES("11","162","11","0");
INSERT INTO test_2 VALUES("12","163","12","0");
INSERT INTO test_2 VALUES("13","164","13","0");
INSERT INTO test_2 VALUES("14","165","14","0");
INSERT INTO test_2 VALUES("15","166","15","0");
INSERT INTO test_2 VALUES("16","167","16","0");
INSERT INTO test_2 VALUES("17","168","17","0");
INSERT INTO test_2 VALUES("18","169","18","0");
INSERT INTO test_2 VALUES("19","170","19","0");
INSERT INTO test_2 VALUES("20","171","20","0");
INSERT INTO test_2 VALUES("21","172","21","0");
INSERT INTO test_2 VALUES("22","173","22","0");
INSERT INTO test_2 VALUES("23","174","23","0");
INSERT INTO test_2 VALUES("24","175","24","0");
INSERT INTO test_2 VALUES("25","176","25","0");
INSERT INTO test_2 VALUES("26","177","26","0");
INSERT INTO test_2 VALUES("27","178","27","0");
INSERT INTO test_2 VALUES("28","179","28","0");
INSERT INTO test_2 VALUES("29","180","29","0");
INSERT INTO test_2 VALUES("30","181","30","0");
INSERT INTO test_2 VALUES("31","182","31","0");
INSERT INTO test_2 VALUES("32","183","32","0");
INSERT INTO test_2 VALUES("33","184","33","0");
INSERT INTO test_2 VALUES("34","185","34","0");
INSERT INTO test_2 VALUES("35","186","35","0");
INSERT INTO test_2 VALUES("36","187","36","0");
INSERT INTO test_2 VALUES("37","188","37","0");
INSERT INTO test_2 VALUES("38","189","38","0");
INSERT INTO test_2 VALUES("39","190","39","0");
INSERT INTO test_2 VALUES("40","191","40","0");
INSERT INTO test_2 VALUES("41","192","41","0");
INSERT INTO test_2 VALUES("42","193","42","0");
INSERT INTO test_2 VALUES("43","194","43","0");
INSERT INTO test_2 VALUES("44","195","44","0");
INSERT INTO test_2 VALUES("45","196","45","0");
INSERT INTO test_2 VALUES("46","197","46","0");
INSERT INTO test_2 VALUES("47","198","47","0");
INSERT INTO test_2 VALUES("48","199","48","0");
INSERT INTO test_2 VALUES("49","200","49","0");
INSERT INTO test_2 VALUES("50","201","50","0");
INSERT INTO test_2 VALUES("51","202","51","0");
INSERT INTO test_2 VALUES("52","203","52","0");
INSERT INTO test_2 VALUES("53","204","53","0");
INSERT INTO test_2 VALUES("54","205","54","0");
INSERT INTO test_2 VALUES("55","206","55","0");
INSERT INTO test_2 VALUES("56","207","56","0");
INSERT INTO test_2 VALUES("57","208","57","0");
INSERT INTO test_2 VALUES("58","209","58","0");
INSERT INTO test_2 VALUES("59","210","59","0");
INSERT INTO test_2 VALUES("60","211","60","0");
INSERT INTO test_2 VALUES("61","212","61","0");
INSERT INTO test_2 VALUES("62","213","62","0");
INSERT INTO test_2 VALUES("63","214","63","0");
INSERT INTO test_2 VALUES("64","215","64","0");
INSERT INTO test_2 VALUES("65","216","65","0");
INSERT INTO test_2 VALUES("66","217","66","0");
INSERT INTO test_2 VALUES("67","218","67","0");
INSERT INTO test_2 VALUES("68","219","68","0");
INSERT INTO test_2 VALUES("69","220","69","0");
INSERT INTO test_2 VALUES("70","221","70","0");
INSERT INTO test_2 VALUES("71","222","71","0");
INSERT INTO test_2 VALUES("72","223","72","0");
INSERT INTO test_2 VALUES("73","224","73","0");
INSERT INTO test_2 VALUES("74","225","74","0");
INSERT INTO test_2 VALUES("75","226","75","0");
INSERT INTO test_2 VALUES("76","227","76","0");
INSERT INTO test_2 VALUES("77","228","77","0");
INSERT INTO test_2 VALUES("78","229","78","0");
INSERT INTO test_2 VALUES("79","230","79","0");
INSERT INTO test_2 VALUES("80","231","80","0");
INSERT INTO test_2 VALUES("81","232","81","0");
INSERT INTO test_2 VALUES("82","233","82","0");
INSERT INTO test_2 VALUES("83","234","83","0");
INSERT INTO test_2 VALUES("84","235","84","0");
INSERT INTO test_2 VALUES("85","236","85","0");
INSERT INTO test_2 VALUES("86","237","86","0");
INSERT INTO test_2 VALUES("87","238","87","0");
INSERT INTO test_2 VALUES("88","239","88","0");
INSERT INTO test_2 VALUES("89","240","89","0");
INSERT INTO test_2 VALUES("90","241","90","0");
INSERT INTO test_2 VALUES("91","242","91","0");
INSERT INTO test_2 VALUES("92","243","92","0");
INSERT INTO test_2 VALUES("93","244","93","0");
INSERT INTO test_2 VALUES("94","245","94","0");
INSERT INTO test_2 VALUES("95","246","95","0");
INSERT INTO test_2 VALUES("96","247","96","0");
INSERT INTO test_2 VALUES("97","248","97","0");
INSERT INTO test_2 VALUES("98","249","98","0");
INSERT INTO test_2 VALUES("99","250","99","0");
INSERT INTO test_2 VALUES("100","251","100","0");
INSERT INTO test_2 VALUES("101","252","101","0");
INSERT INTO test_2 VALUES("102","253","102","0");
INSERT INTO test_2 VALUES("103","254","103","0");
INSERT INTO test_2 VALUES("104","255","104","0");
INSERT INTO test_2 VALUES("105","256","105","0");
INSERT INTO test_2 VALUES("106","257","106","0");
INSERT INTO test_2 VALUES("107","258","107","0");
INSERT INTO test_2 VALUES("108","259","108","0");
INSERT INTO test_2 VALUES("109","260","109","0");
INSERT INTO test_2 VALUES("110","261","110","0");
INSERT INTO test_2 VALUES("111","262","111","0");
INSERT INTO test_2 VALUES("112","263","112","0");
INSERT INTO test_2 VALUES("113","264","113","0");
INSERT INTO test_2 VALUES("114","265","114","0");
INSERT INTO test_2 VALUES("115","266","115","0");
INSERT INTO test_2 VALUES("116","267","116","0");
INSERT INTO test_2 VALUES("117","268","117","0");
INSERT INTO test_2 VALUES("118","269","118","0");
INSERT INTO test_2 VALUES("119","270","119","0");
INSERT INTO test_2 VALUES("120","271","120","0");
INSERT INTO test_2 VALUES("121","272","121","0");
INSERT INTO test_2 VALUES("122","273","122","0");
INSERT INTO test_2 VALUES("123","274","123","0");
INSERT INTO test_2 VALUES("124","275","124","0");
INSERT INTO test_2 VALUES("125","276","125","0");
INSERT INTO test_2 VALUES("126","277","126","0");
INSERT INTO test_2 VALUES("127","278","127","0");
INSERT INTO test_2 VALUES("128","279","128","0");
INSERT INTO test_2 VALUES("129","280","129","0");
INSERT INTO test_2 VALUES("130","281","130","0");
INSERT INTO test_2 VALUES("131","282","131","0");
INSERT INTO test_2 VALUES("132","283","132","0");
INSERT INTO test_2 VALUES("133","284","133","0");
INSERT INTO test_2 VALUES("134","285","134","0");
INSERT INTO test_2 VALUES("135","286","135","0");
INSERT INTO test_2 VALUES("136","287","136","0");
INSERT INTO test_2 VALUES("137","288","137","0");
INSERT INTO test_2 VALUES("138","289","138","0");
INSERT INTO test_2 VALUES("139","290","139","0");
INSERT INTO test_2 VALUES("140","291","140","0");
INSERT INTO test_2 VALUES("141","292","141","0");
INSERT INTO test_2 VALUES("142","293","142","0");
INSERT INTO test_2 VALUES("143","294","143","0");
INSERT INTO test_2 VALUES("144","295","144","0");
INSERT INTO test_2 VALUES("145","296","145","0");
INSERT INTO test_2 VALUES("146","297","146","0");
INSERT INTO test_2 VALUES("147","298","147","0");
INSERT INTO test_2 VALUES("148","299","148","0");
INSERT INTO test_2 VALUES("149","300","149","0");
INSERT INTO test_2 VALUES("150","150","150","0");



DROP TABLE users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(2555) NOT NULL,
  `cpwd` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `ilogin_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","142","EVA EFUA AGBO","","fcea920f7412b5da7be0cf42b8c93759","fcea920f7412b5da7be0cf42b8c93759","1","2019-03-02");
INSERT INTO users VALUES("2","150","LAWRENCE YAO ADDO","","fcea920f7412b5da7be0cf42b8c93759","fcea920f7412b5da7be0cf42b8c93759","1","2019-03-02");



