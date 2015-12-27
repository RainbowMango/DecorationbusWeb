create table decoration_company_comments(
    commentid    int          AUTO_INCREMENT primary key comment '评论ID',
    userid       varchar(256) NOT null    comment '用户ID',
    usernickname varchar(256) NOT null    comment '用户昵称',
    useravatar   varchar(256) NOT null    comment '用户头像',
    companyid    int          NOT null    comment '公司ID',
    comment      varchar(512) NOT null    comment '评论内容',
    commentdate  datetime     NOT null    comment '评论时间',    
    score        int          NOT null    comment '评价得分',
    thumbnail01  varchar(256) 						comment '缩略图01',
    thumbnail02  varchar(256) 						comment '缩略图02',
    thumbnail03  varchar(256) 						comment '缩略图03',
    thumbnail04  varchar(256) 						comment '缩略图04',
    image01      varchar(256) 						comment '原始图01',
    image02      varchar(256) 						comment '原始图02',
    image03      varchar(256) 						comment '原始图03',
    image04      varchar(256) 						comment '原始图04',
    updtime TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8
