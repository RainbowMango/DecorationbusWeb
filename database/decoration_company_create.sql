create table decoration_company( 
    id int AUTO_INCREMENT NOT null primary key comment '公司ID',
    name varchar(256) not null comment '公司名字',
    logo varchar(256) not null comment '公司logo',
    comments_number int default 0 comment '评价数量',
    score int default 0 comment '评价得分',
    updtime TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8


/* 生产环境测试数据
INSERT INTO `decoration_company` (`id`, `name`, `logo`, `comments_number`, `score`, `updtime`) VALUES
(1, '城建装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/1.jpg', 129, 87, '2015-11-29 15:19:08'),
(2, '亚加装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/2.jpg', 120, 60, '2015-11-28 23:51:22'),
(3, '悦美装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/3.jpg', 110, 65, '2015-11-29 22:41:50'),
(4, 'I.F设计工作室', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/4.jpg', 110, 65, '2015-11-29 22:41:50'),
(5, '1917个性家装', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/5.jpg', 110, 65, '2015-11-29 22:41:50'),
(6, '辉度空间', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/6.jpg', 110, 65, '2015-11-29 22:41:50'),
(7, '艺创装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/7.jpg', 110, 65, '2015-11-29 22:41:50'),
(8, '墨缘装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/8.jpg', 110, 65, '2015-11-29 22:41:50'),
(9, '品鑫装饰设计', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/9.jpg', 110, 65, '2015-11-29 22:41:50'),
(10, '康源装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/10.jpg', 110, 65, '2015-11-29 22:41:50'),
(11, '良工装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/11.jpg', 110, 65, '2015-11-29 22:41:50'),
(12, '伟杰装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/12.jpg', 110, 65, '2015-11-29 22:41:50'),
(13, '海逸装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/13.jpg', 110, 65, '2015-11-29 22:41:50'),
(14, '奥林装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/14.jpg', 110, 65, '2015-11-29 22:41:50'),
(15, '正源装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/15.jpg', 110, 65, '2015-11-29 22:41:50'),
(16, '南鸿装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/16.jpg', 110, 65, '2015-11-29 22:41:50'),
(17, '壹滴水设计', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/17.jpg', 110, 65, '2015-11-29 22:41:50'),
(18, '东仓美社', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/18.jpg', 110, 65, '2015-11-29 22:41:50'),
(19, '麦丰装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/19.jpg', 110, 65, '2015-11-29 22:41:50'),
(20, '绿才居装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/20.jpg', 110, 65, '2015-11-29 22:41:50'),
(21, '胡荣装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/21.jpg', 110, 65, '2015-11-29 22:41:50'),
(22, '真水无香', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/22.jpg', 110, 65, '2015-11-29 22:41:50'),
(23, '维泽设计', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/23.jpg', 110, 65, '2015-11-29 22:41:50'),
(24, 'TK设计', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/24.jpg', 110, 65, '2015-11-29 22:41:50'),
(25, '尚铭装饰', 'http://decorationbus-decorationbus.stor.sinaapp.com/company/avatar/25.jpg', 110, 65, '2015-11-29 22:41:50');
*/