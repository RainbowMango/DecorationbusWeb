
create table user(
    username varchar(16) not null primary key,
    passwd varchar(40) not null,
    email varchar(100) not null unique,
    realName varchar(40),
    phone varchar(11) unique,
    sex tinyint,
    createtime datetime,
    house varchar(256), 
    updtime TIMESTAMP
    )ENGINE=MyISAM DEFAULT CHARSET=utf8;
