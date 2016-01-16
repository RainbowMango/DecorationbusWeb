create table user(
  userid      varchar(20)  not null primary key comment 'YYYYMMDDHHMMSSFFF',
  nickname    varchar(16)                       comment '',
  avatar      varchar(256)                      comment '',
  passwd      varchar(128)                      comment '',
  email       varchar(256)                      comment '',
  phone       varchar(14)                       comment '',
  realName    varchar(40)                       comment '',
  sex         tinyint                           comment '0:  1: ',
  job         varchar(64)                       comment '',
  address     varchar(512)                      comment '', 
  updtime     TIMESTAMP                         comment ''
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

/* localhost
insert into user(userid, nickname, avatar, passwd, email, phone, realname, sex, job, address) values('20160110215933444', '', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'qdurenhongcai@163.com', '18605811857', '', 1, '', '-');
*/

/* 
insert into user(userid, nickname, avatar, passwd, email, phone, realname, sex, job, address) values('20160110215933444', '', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'qdurenhongcai@163.com', '18605811857', '', 1, '', '-');
*/