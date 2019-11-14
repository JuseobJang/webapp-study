DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS department;

CREATE TABLE student(
  student_id  INTEGER NOT NULL  PRIMARY KEY,
  name  VARCHAR(20),
  year  TINYINT  DEFAULT 1,
  dept_no INTEGER,
  major VARCHAR(20)
);

CREATE TABLE department(
  dept_no INTEGER PRIMARY KEY AUTO_INCREMENT,
  dept_name VARCHAR(40)  UNIQUE,
  office  VARCHAR(40),
  office_tel  VARCHAR(13) NOT NULL
);

ALTER TABLE student
   CHANGE COLUMN major major VARCHAR(40);
ALTER TABLE student
   ADD COLUMN gender CHAR(1);

ALTER TABLE student DROP COLUMN gender;


insert into student values(20070002, 'Jane Smith', 3, 4, 'Business Administration');
insert into student values(20060001, 'Ashley Jackson', 4, 4, 'Business Administration');
insert into student values(20030001, 'Liam Johnson', 4, 2, 'Electrical Engineering');
insert into student values(20040003, 'Jacob Lee', 3, 2, 'Electrical Engineering');
insert into student values(20060002, 'Noah Kim', 3, 1, 'Computer Science');
insert into student values(20100002, 'Ava Lim', 3, 4, 'Business Administration');
insert into student values(20110001, 'Emma Watson', 2, 1, 'Computer Science');
insert into student values(20080003, 'Lisa Maria', 4, 3, 'Law');
insert into student values(20040002, 'Jacob William', 4, 5, 'Law');
insert into student values(20070001, 'Emily Rose', 4, 4, 'Business Administration');
insert into student values(20100001, 'Ethan Hunt', 3, 4, 'Business Administration');
insert into student values(20110002, 'Jason Mraz' ,2, 1, 'Electrical Engineering');
insert into student values(20030002, 'John Smith', 5, 1, 'Computer Science');
insert into student values(20070003, 'Sophia Park', 4, 3, 'Law');
insert into student values(20070007, 'James Michael', 2, 4, 'Business Administration');
insert into student values(20100003, 'James Bond', 3, 1, 'Computer Science');
insert into student values(20070005, 'Olivia Madison', 2, 5, 'English Language and Literature');


insert into department(dept_name,office,office_tel) values('Computer Science', 'Science Building 101', '02-3290-0123');
insert into department(dept_name,office,office_tel) values('Electrical Engineering', 'Engineering Building 401', '02-3290- 2345');
insert into department(dept_name,office,office_tel) values('Law', 'Law Building 201', '02-3290-7896');
insert into department(dept_name,office,office_tel) values('Business Administration','Business Building 104','02-3290-1112');
insert into department(dept_name,office,office_tel) values('English Language and Literature','Language Building 303','02-3290-4412');

UPDATE student
SET major = 'Electrical and Electronics Engineering'
WHERE major = 'Electrical Engineering';

UPDATE department
SET dept_name = 'Electrical and Electronics Engineering'
WHERE dept_name = 'Electrical Engineering';


SELECT * FROM student WHERE major = 'Computer Science';
SELECT student_id, year ,major FROM student;
SELECT * FROM student WHERE year =3;
SELECT * FROM student WHERE year =2 or year =1;
SELECT * FROM student WHERE major = (SELECT dept_name FROM department where dept_no=4);



SELECT * FROM student WHERE student_id LIKE '2007%';
SELECT * FROM student ORDER BY student_id;
SELECT DISTINCT major FROM student GROUP BY major HAVING avg(year) >3;
SELECT * FROM student WHERE student_id LIKE '2007%' LIMIT 2;
