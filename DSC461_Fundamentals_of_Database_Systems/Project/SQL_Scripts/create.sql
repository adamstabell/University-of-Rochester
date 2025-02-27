# Drop all exisiting tables
DROP TABLE IF EXISTS ADSPLATFORM;
DROP TABLE IF EXISTS APPLY_TO;
DROP TABLE IF EXISTS APPLICANT;
DROP TABLE IF EXISTS POSITION_;
DROP TABLE IF EXISTS RECRUITER;
DROP TABLE IF EXISTS DEPARTMENT;
DROP TABLE IF EXISTS OFFICE;

-- Office
CREATE TABLE OFFICE (ID INT NOT NULL PRIMARY KEY,
				     StreetAddress VARCHAR(50) NOT NULL UNIQUE,
  				     City VARCHAR(25) NOT NULL,
  				     State CHAR(2) NOT NULL,
  				     ZipCode INT(5) NOT NULL);
-- Department
CREATE TABLE DEPARTMENT (ID INT,
					     OfficeID INT,
					     Name VARCHAR(50) NOT NULL,
					     PRIMARY KEY(ID),
					     FOREIGN KEY(OfficeID) REFERENCES OFFICE(ID) ON DELETE SET NULL ON UPDATE CASCADE);
-- Recruiter
CREATE TABLE RECRUITER(ID VARCHAR(30)	NOT NULL,
					   FirstName VARCHAR(30)	NOT NULL,
					   LastName VARCHAR(30)	NOT NULL,
				       Position VARCHAR(50)	NOT NULL,
					   DepartmentID INT,
					   PRIMARY KEY (ID),
					   FOREIGN KEY (DepartmentID) REFERENCES DEPARTMENT(ID) ON DELETE SET NULL ON UPDATE CASCADE);
-- Position_
CREATE TABLE POSITION_ (ID INT NOT NULL PRIMARY KEY,
						Type CHAR(8) DEFAULT 'FullTime',
						Title VARCHAR(50) NOT NULL,
						DepartmentID INT,
					    RecruiterID VARCHAR(30),
					    PostDate DATE,
					    Salary INT,
					    VisaSponsorship VARCHAR(15) DEFAULT 'Yes',
					    FOREIGN KEY (DepartmentID) REFERENCES DEPARTMENT(ID) ON DELETE SET NULL ON UPDATE CASCADE,
					    FOREIGN KEY (RecruiterID) REFERENCES RECRUITER(ID) ON DELETE SET NULL ON UPDATE CASCADE);
-- Applicant
CREATE TABLE APPLICANT(ID INT(11) AUTO_INCREMENT PRIMARY KEY,
					   Applicant_ID VARCHAR(30) UNIQUE,
 					   Email VARCHAR(50)		NOT NULL,
 					   FirstName VARCHAR(30)	NOT NULL,
 					   LastName VARCHAR(30)	NOT NULL,
 					   School VARCHAR(50),
 					   Degree VARCHAR(30),
 					   Major VARCHAR(30));
-- Apply_to
CREATE TABLE APPLY_TO(ApplicantID VARCHAR(30),
 					  PositionID INT,
 					  AdsPlatform VARCHAR(50) NOT NULL,
 					  PRIMARY KEY(ApplicantID, PositionID),
 					  FOREIGN KEY(ApplicantID) REFERENCES APPLICANT(Applicant_ID) ON DELETE CASCADE ON UPDATE CASCADE,
 					  FOREIGN KEY(PositionID) REFERENCES POSITION_(ID) ON DELETE CASCADE ON UPDATE CASCADE);
-- AdsPlatform
CREATE TABLE ADSPLATFORM(PositionID INT,
 						 AdsPlatform VARCHAR(50) NOT NULL,
 						 PRIMARY KEY(PositionID, AdsPlatform),
 						 FOREIGN KEY(PositionID) REFERENCES POSITION_(ID) ON DELETE CASCADE ON UPDATE CASCADE);