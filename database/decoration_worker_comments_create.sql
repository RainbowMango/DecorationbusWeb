create table decoration_worker_comments(
    commentid    int          AUTO_INCREMENT primary key comment '评论ID',
    userid       varchar(256) NOT null    comment '用户ID',
    usernickname varchar(256) NOT null    comment '用户昵称',
    useravatar   varchar(256) NOT null    comment '用户头像',
    workerid     int          NOT null    comment '工人ID',
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
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

/* localhost测试数据
#one line without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#two lines without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了，这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了，这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#more lines without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了，这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了，这是我见过最敬业的项目经理了,这是我见过最敬业的项目经理了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#more line with one images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', '', '', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', '', '', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', '', '', '');

#more line with two images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', '', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', '', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', '', '');

#more line with three images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail03.jpg', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin03.jpg', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail03.jpg', '', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin03.jpg', '');

#more line with four images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail03.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail04.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin03.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin04.jpg');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://localhost/DecorationbusWeb/server/images/avatar/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail03.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/thumbnail04.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin01.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin02.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin03.jpg', 'http://localhost/DecorationbusWeb/server/images/worker/reference/origin04.jpg');
*/







/* 生产环境测试数据
#one line without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#two lines without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#more lines without images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, '', '', '', '', '', '', '', '');

#more line with one images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', '', '', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', '', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', '', '', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', '', '', '');

#more line with two images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', '', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', '', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', '', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', '', '');

#more line with three images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail03.jpg', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin03.jpg', '');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail03.jpg', '', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin03.jpg', '');

#more line with four images
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '贾宝玉', 'http://decorationbus-avatar.stor.sinaapp.com/user01.png', 1, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail03.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail04.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin03.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin04.jpg');
insert into decoration_worker_comments(userid, usernickname, useravatar, workerid, comment, commentdate, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04) values('qdurenhongcai01@163.com', '林黛玉', 'http://decorationbus-avatar.stor.sinaapp.com/user02.png', 2, '这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了，这是我见过最敬业的装修工人了,这是我见过最敬业的装修工人了', '2015-12-13 19:44:11', 67, 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail03.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/thumbnail04.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin01.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin02.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin03.jpg', 'http://decorationbus-worker.stor.sinaapp.com/reference/origin04.jpg');

*/
