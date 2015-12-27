create table decoration_company( 
    id int AUTO_INCREMENT NOT null primary key comment '公司ID',
    name varchar(256) not null comment '公司名字',
    logo varchar(256) not null comment '公司logo',
    comments_number int default 0 comment '评价数量',
    score int default 0 comment '评价得分',
    updtime TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8
