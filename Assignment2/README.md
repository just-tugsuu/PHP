## 🎯  Зорилго 

Энэхүү бие даалтын зорилго нь хэрэглэгчийн нэвтрэлтийг удирдах ба үүнтэй зэрэгцэн хэрхэн SQL injection, XSS халдлагаас хамгаалах талаар судлана.


## Ашиглагдах өгөгдлийн сан 

```
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
```

## 🌳 Файлын бүтэц

``` 
├── configs  (Өгөгдлийн сангийн холболтын файл)
│   └── config.php
├── index.php 
├── README.md
├── script   
│   └── index.js
├── sql      
│   └── db.sql
├── src     
│   ├── description.php
│   ├── helper (Программын туслагч функцууд)
│   │   └── function.php
│   └── register.php
└── styles (CSS)
    ├── description-page.css
    └── style.css
```

## Шаардлага: 

- [x] Хэрэглэгч системд өөрийн и-мэйл хаяг, нууц үгээр нэвтрэнэ

- [x] Нууц үг нь MD5() ашиглан үүсгэгдсэн байна.

- [x] Сервер болон клиент талын баталгаажуулалт

- [x] SQL injection халдлагаас хамгаалах `mysql_real_escape_string(), mysqli_stmt_bind_param()`

- [x] Баталгаажуулалтын алдааны мэдээлэл харуулах

- [x] Cookie ашиглан хэрэглэгчийн мэдээллийг санах 

- [x] Нэвтэрсэн хэрэглэгч description хуудас руу шилжих

- [x] description хуудас руу нэвтрээгүй хандсан тохиолдолд Login нүүр рүү шилжих

- [x] description хуудас нь comment бичих хэсэгтэй ба `comment table` тай ажиллах

- [x] comment хуудас нь сэтгэгдэл оруулах хэсэгтэй ба бүх сэтгэгдлийг харах

- [x] XSS халдлагаас хамгаалах `htmlspecialchars()`


