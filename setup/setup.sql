CREATE DATABASE gocfs;
USE gocfs;
GRANT ALL ON gocfs.* TO gocfs IDENTIFIED BY "gocfs";
CREATE TABLE users(username text, password text, isadmin int(1));
INSERT INTO users values("admin","21232f297a57a5a743894a0e4a801fc3",1);
INSERT INTO users values("chris","6b34fe24ac2ff8103f6fce1f0da2ef57",0);
INSERT INTO users values("katie","f1f58e8c06b2a61ce13e0c0aa9473a72",0);
INSERT INTO users values("becca","f0ae4863831e5d476f345b3aadb83953",0);

CREATE TABLE committee_officer
        (officerID        int                NOT NULL,        
         firstname        varchar(20)        NOT NULL,
         lastname        varchar(20)        NOT NULL,
         phone                 int,
         street                varchar(30),
         city                varchar(15),
         state                char(2),
         zip                int,
	PRIMARY KEY (officerID));
CREATE TABLE bank
        (bankID                int                NOT NULL,
         name                varchar(30)        NOT NULL,
         phone                int,
         street                varchar(30),
         city                varchar(15),
         state                char(2),
         zip                int,
	PRIMARY KEY (bankID));
CREATE TABLE treasurer
        (officerID        int                NOT NULL,
	PRIMARY KEY (officerID),
	FOREIGN KEY (officerID) REFERENCES committee_officer(officerID));
CREATE TABLE chairperson        
        (officerID        int                NOT NULL,
	PRIMARY KEY (officerID),
	FOREIGN KEY (officerID) REFERENCES committee_officer(officerID));
CREATE TABLE committee
        (committeeID        int                NOT NULL,
         name                varchar(30),        
         phone                int,
         street                varchar(30),
         city                varchar(15),
         state                 char(2),
         zip                int,
         dateEstablished        date,
         treasurerID        int,
         chairpersonID        int,
         bankID                int,
         accountNumber         int,
	PRIMARY	KEY (committeeID),
	FOREIGN KEY (treasurerID) REFERENCES treasurer(officerID),
	FOREIGN KEY (chairpersonID) REFERENCES chairperson(officerID),
	FOREIGN KEY (bankID) REFERENCES bank(bankID));
CREATE TABLE proposition
        (number                int                NOT NULL,
         electionYear        int                NOT NULL,
         description        varchar(40)        NOT NULL,
	PRIMARY KEY (number, electionYear));
CREATE TABLE expenditure
        (expenditureID        int                NOT NULL,
         code                char(1),
         description         varchar(40),
         datePaid        date,
         amount                int,
         payee                varchar(30),
         street                varchar(30),
         city                varchar(15),
         state                char(2),
         zip                int,
         committeeID        int,
	PRIMARY KEY (expenditureID),
	FOREIGN KEY (committeeID) REFERENCES committee(committeeID));
CREATE TABLE office
        (name                varchar(30)         NOT NULL,
         salary                int,
	PRIMARY KEY (name));
CREATE TABLE party_committee
        (committeeID         int                NOT NULL,
         contributorID        int,
         partyName        varchar(20),
	PRIMARY KEY (committeeID));
CREATE TABLE candidate
	(ssn			int		NOT NULL,
	 firstname		varchar(20)	NOT NULL,
	 lastname		varchar(20)	NOT NULL,
	 district		varchar(15),
	 electionyear		int,
	 electiondate		date,
	 datefiled		date,
	 homephone		int,
	 street			varchar(45),
	 city			varchar(15),
	 state			varchar(2),
	 zip			int,
	 partycommitteeID	int		NOT NULL,
	 officename		varchar(15)	NOT NULL,
	PRIMARY KEY(ssn),
	FOREIGN KEY(partycommitteeID) REFERENCES party_committee(committeeID),
	FOREIGN KEY(officename) REFERENCES office(name));
CREATE TABLE political_committee
	(committeeID		int		NOT NULL,
	 ssn			int		NOT NULL,
	 propositionnumber	int		NOT NULL,
	 electionyear		int		NOT NULL,
	 supporting             int             NOT NULL;
	PRIMARY KEY (committeeID),
	FOREIGN KEY (propositionnumber,electionyear) REFERENCES proposition(number,year),
	FOREIGN KEY (ssn) REFERENCES candidate(ssn));
CREATE TABLE contributor
	(contributorID		int		NOT NULL,
 	 contributorname	varchar(30),
	 class			varchar(20),
	 street			varchar(45),
	 city			varchar(15),
	 state			varchar(2),
	 zip			int,
	PRIMARY KEY(contributorID));
CREATE TABLE corporation
	(contributorID		int		NOT NULL,
	PRIMARY KEY(contributorID),
	FOREIGN KEY(contributorID) REFERENCES contributor (contributorID));
CREATE TABLE labor_organization
	(contributorID		int		NOT NULL,
	PRIMARY KEY(contributorID),
	FOREIGN KEY(contributorID) REFERENCES contributor (contributorID));
CREATE TABLE individual
	(contributorID		int		NOT NULL,
	 employername		varchar(30)	NOT NULL,
	PRIMARY KEY(contributorID),
	FOREIGN KEY(contributorID) REFERENCES contributor (contributorID));
CREATE TABLE contributed_to
	(committeeID		int		NOT NULL,
	 contributorID		int		NOT NULL,
	 date			date,
	 amount			int,
	PRIMARY KEY(committeeID, contributorID),
	FOREIGN KEY(committeeID) REFERENCES committee (committeeID),
	FOREIGN KEY(contributorID) REFERENCES contributor(contributorID));
CREATE TABLE finance_committee
        (committeeID            int             NOT NULL,
         ssn                    int             NOT NULL,
         electionyear           int             NOT NULL,
	officename             varchar(15)     NOT NULL,
        PRIMARY KEY (committeeID),
	FOREIGN KEY(officename) REFERENCES office(name),
        FOREIGN KEY (ssn) REFERENCES candidate(ssn));

INSERT INTO office VALUES("King","100000");
INSERT INTO office VALUES("Preist","100000");
INSERT INTO office VALUES("Rabbi","50000");
INSERT INTO office VALUES("Saint","600000");
INSERT INTO office VALUES("Pope","45000");
INSERT INTO office VALUES("Messiah","1000000");

INSERT INTO proposition VALUES("500","2004","Legalize Prostitution");
INSERT INTO proposition VALUES("501","2004","Lower Minimum Wage");
INSERT INTO proposition VALUES("502","2004","Anarchy");
INSERT INTO proposition VALUES("503","2004","Eat the Apple");
INSERT INTO proposition VALUES("504","2004","War with England");
INSERT INTO proposition VALUES("505","2004","Cruisades");
INSERT INTO proposition VALUES("506","2004","Idle Hands Movement");
