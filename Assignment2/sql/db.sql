CREATE TABLE employee (
    employeeid int PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    pass char(32) NOT NULL
);

CREATE TABLE comment (
    commentid int(11) PRIMARY KEY AUTO_INCREMENT,
    description varchar(200),
    inserteddate datetime,
    email varchar(50) 
);

-- Test input
INSERT INTO employee VALUES(NULL, 'Tugsuu', 'admin123@gmail.com', MD5('admin-123'));