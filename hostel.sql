SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create tables

CREATE TABLE Student (
    Student_id VARCHAR(255) PRIMARY KEY,
    Fname VARCHAR(255),
    Lname VARCHAR(255),
    DOB DATE NOT NULL,
    ContactNo INT(12) NOT NULL,
    Passwd VARCHAR(255) NOT NULL,
    Dept VARCHAR(255),
    Semester INT(10) NOT NULL,
    Hostel_id INT(10),
    Room_id INT(10),
    Mess_id INT(10),
    Gender CHAR(1)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Hostel (
    Hostel_id INT(10) PRIMARY KEY,
    Hostel_name VARCHAR(255),
    No_of_rooms INT(10) NOT NULL,
    Street VARCHAR(255),
    City VARCHAR(255),
    State VARCHAR(255),
    Pincode INT(6) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Room (
    Room_id INT(10) PRIMARY KEY,
    Hostel_id INT(10),
    Room_no INT(10) NOT NULL,
    Capacity INT(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Mess (
    Mess_id INT(10) PRIMARY KEY,
    Mess_name VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Fees (
    Hostel_id INT(10) PRIMARY KEY,
    Yearly_fee INT(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Message (
    Sender_id VARCHAR(255) PRIMARY KEY,
    Receiver_id INT(10) NOT NULL,
    Message VARCHAR(255) NOT NULL,
    Timestamp TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Warden (
    Warden_id INT(10) PRIMARY KEY,
    Fname VARCHAR(255),
    Lname VARCHAR(255),
    ContactNo INT(10) NOT NULL,
    Hostel_id INT(10)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Warden_email (
    Warden_id INT(10) PRIMARY KEY,
    Email VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Add foreign key constraints

ALTER TABLE student
ADD CONSTRAINT fk_students_hostel
FOREIGN KEY (Hostel_id) REFERENCES Hostel(Hostel_id);

ALTER TABLE student
ADD CONSTRAINT fk_students_room
FOREIGN KEY (Room_id) REFERENCES Room(Room_id);

ALTER TABLE student
ADD CONSTRAINT fk_students_mess
FOREIGN KEY (Mess_id) REFERENCES Mess(Mess_id);

ALTER TABLE warden
ADD CONSTRAINT fk_hostel_id
FOREIGN KEY (Hostel_id) REFERENCES Hostel(Hostel_id);

ALTER TABLE warden_email
ADD CONSTRAINT fk_hostel0_id
FOREIGN KEY (Warden_id) REFERENCES Warden(Warden_id);

ALTER TABLE room
ADD CONSTRAINT fk_hostel1_id
FOREIGN KEY (Hostel_id) REFERENCES Hostel(Hostel_id);

ALTER TABLE fees
ADD CONSTRAINT fk_hostel2_id
FOREIGN KEY (Hostel_id) REFERENCES Hostel(Hostel_id);

ALTER TABLE message
ADD CONSTRAINT fk_hostel3_id
FOREIGN KEY (Sender_id) REFERENCES Student(Student_id);

ALTER TABLE message
ADD CONSTRAINT fk_hostel4_id
FOREIGN KEY (Receiver_id) REFERENCES Warden(Warden_id);

-- Insert

INSERT INTO Hostel (Hostel_id, Hostel_name, No_of_rooms, Street, City, State, Pincode)
VALUES
(1, 'Sunshine Hostel', 50, '123 Sunshine Street', 'Mumbai', 'Maharashtra', 400001),
(2, 'Pinewood Hostel', 60, '456 Greenwood Avenue', 'Delhi', 'Delhi', 110001),
(3, 'Bluebell Hostel', 70, '789 Bluebell Lane', 'Bangalore', 'Karnataka', 560001),
(4, 'Rosewood Hostel', 55, '789 Rosewood Road', 'Chennai', 'Tamil Nadu', 600001);

INSERT INTO Room (Room_id, Hostel_id, Room_no, Capacity)
VALUES
(1, 1, 101, 2),
(2, 1, 102, 2),
(3, 1, 103, 2),
(4, 1, 104, 2),
(5, 1, 105, 3),
(6, 1, 106, 2),
(7, 1, 107, 2),
(8, 1, 108, 2),
(9, 1, 109, 2),
(10, 1, 110, 2),
(11, 2, 201, 3),
(12, 2, 202, 3),
(13, 2, 203, 4),
(14, 2, 204, 2),
(15, 2, 205, 2),
(16, 2, 206, 2),
(17, 2, 207, 2),
(18, 2, 208, 2),
(19, 2, 209, 2),
(20, 2, 210, 2),
(21, 3, 301, 2),
(22, 3, 302, 4),
(23, 3, 303, 3),
(24, 3, 304, 2),
(25, 3, 305, 4);

INSERT INTO Mess (Mess_id, Mess_name)
VALUES
(1, 'Mess A'),
(2, 'Mess B'),
(3, 'Mess C'),
(4, 'Mess D');

INSERT INTO Student (Student_id, Fname, Lname, DOB, ContactNo, Passwd, Dept, Semester, Hostel_id, Room_id, Mess_id, Gender)
VALUES
(1, 'John', 'Doe', '1995-05-15', 1234567890, 'password1', 'Computer Science', 5, 1, 2, 1, 'M'),
(10, 'Ava', 'Lopez', '1993-04-25', 1239874560, 'password10', 'Chemical Engineering', 4, 1, 2, 3, 'M'),
(11, 'Noah', 'Lee', '1995-09-30', 2147483647, 'password11', 'Computer Science', 6, 3, 25, 2, 'F'),
(12, 'Sophia', 'Gonzalez', '1994-12-05', 2147483647, 'password12', 'Electrical Engineering', 5, 3, 25, 3, 'F'),
(13, 'Mia', 'Harris', '1996-02-15', 1473692580, 'password13', 'Mechanical Engineering', 7, 2, 11, 1, 'M'),
(14, 'Ethan', 'Clark', '1993-07-20', 2147483647, 'password14', 'Civil Engineering', 4, 2, 11, 2, 'M'),
(15, 'Isabella', 'King', '1995-10-25', 2147483647, 'password15', 'Chemical Engineering', 6, 2, 11, 1, 'M'),
(16, 'Aiden', 'Allen', '1994-01-05', 2147483647, 'password16', 'Computer Science', 5, 3, 24, 3, 'F'),
(17, 'Abigail', 'Baker', '1996-03-15', 1234567890, 'password17', 'Electrical Engineering', 7, 2, 12, 2, 'M'),
(18, 'James', 'Young', '1994-06-20', 2147483647, 'password18', 'Mechanical Engineering', 4, 2, 12, 3, 'M'),
(19, 'Charlotte', 'Hill', '1997-11-10', 2147483647, 'password19', 'Civil Engineering', 6, 3, 22, 1, 'F'),
(2, 'Jane', 'Smith', '1996-08-20', 2147483647, 'password2', 'Electrical Engineering', 4, 3, 22, 2, 'F'),
(20, 'Benjamin', 'Cook', '1993-04-25', 1473692580, 'password20', 'Chemical Engineering', 5, 3, 22, 3, 'F'),
(3, 'Michael', 'Johnson', '1994-02-10', 1231231234, 'password3', 'Mechanical Engineering', 6, 2, 13, 1, 'M'),
(4, 'Emily', 'Williams', '1997-07-25', 2147483647, 'password4', 'Civil Engineering', 5, 2, 13, 3, 'M'),
(5, 'William', 'Brown', '1993-10-30', 2147483647, 'password5', 'Chemical Engineering', 7, 3, 21, 2, 'F'),
(6, 'Emma', 'Jones', '1995-01-05', 1472583690, 'password6', 'Computer Science', 4, 3, 21, 3, 'F'),
(7, 'Daniel', 'Garcia', '1996-03-15', 2147483647, 'password7', 'Electrical Engineering', 6, 1, 5, 1, 'M'),
(8, 'Olive', 'Martinez', '1994-06-20', 2147483647, 'password8', 'Mechanical Engineering', 5, 1, 5, 2, 'M'),
(9, 'Alex', 'Rodriguez', '1997-11-10', 2147483647, 'password9', 'Civil Engineering', 7, 1, 5, 1, 'M');

INSERT INTO Fees (Hostel_id, Yearly_fee)
VALUES
(1, 5000),
(2, 6000),
(3, 5500),
(4, 7000);

INSERT INTO Warden (Warden_id, Fname, Lname, ContactNo, Hostel_id)
VALUES
(1, 'Robert', 'Johnson', 1234567890, 1),
(2, 'Mary', 'Williams', 2147483647, 2),
(3, 'Richard', 'Brown', 1231231234, 3),
(4, 'Jennifer', 'Jones', 2147483647, 4);

INSERT INTO Warden_email (Warden_id, Email)
VALUES
(1, 'robert.johnson@example.com'),
(2, 'mary.williams@example.com'),
(3, 'richard.brown@example.com'),
(4, 'jennifer.jones@example.com');
