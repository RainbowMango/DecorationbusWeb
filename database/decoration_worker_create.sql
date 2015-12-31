create table decoration_worker(
    id              int          AUTO_INCREMENT not null primary key comment '工人ID',
    name            varchar(20)  not null                            comment '姓名',
    avatar          varchar(256) not null                            comment '头像',
    birthday        date                                             comment '出生日期',
    hometown        int                                              comment '家乡城市编码',
    workcity        int                                              comment '工作城市编码',
    phone           varchar(20)                                      comment '手机号码',
    worktype				tinyint                                          comment '工种(1:水电 2:泥工 3:油漆 4:木工 5:保洁 6:其他)',
    manager					int                                              comment '所属项目经理',
    company         int                                              comment '所属公司',
    comments_number int          default 0                           comment '评价数量',
    score           int          default 0                           comment '评价得分',
    updtime         TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


/* 
*localhost测试数据
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈长轮', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/1.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1,  79, 52);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈军桥', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/2.jpg', '1986-02-10', '571', '571', '18301323461', 1, 1, 1,  92, 55); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('郑小韦', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/3.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 105, 58);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('赵道学', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/4.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 118, 61);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('章小彪', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/5.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 131, 64);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('虞江龙', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/6.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 144, 67);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('徐守峥', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/7.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 157, 70);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('谢伟松', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/8.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 170, 73);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('秦秀银', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/9.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 183, 76);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('马存柱', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/10.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 183, 79); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('芦传名', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/11.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 196, 80); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('刘苏平', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/12.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 209, 81); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('江登宝', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/13.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 222, 82); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('贾大兵', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/14.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 235, 83); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('侯泽民', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/15.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 248, 84); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('何其国', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/16.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 261, 85); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('葛基林', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/17.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 274, 86); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('冯亮平', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/18.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 287, 87); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈中响', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/19.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 300, 88); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈荣顺', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/20.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 313, 89); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈存武', 'http://localhost/DecorationbusWeb/server/images/worker/avatar/21.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 326, 90); 
*/

/* 
*生产环境测试数据
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈长轮', 'http://decorationbus-worker.stor.sinaapp.com/avatar/1.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1,  79, 52);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈军桥', 'http://decorationbus-worker.stor.sinaapp.com/avatar/2.jpg', '1986-02-10', '571', '571', '18301323461', 1, 1, 1,  92, 55); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('郑小韦', 'http://decorationbus-worker.stor.sinaapp.com/avatar/3.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 105, 58);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('赵道学', 'http://decorationbus-worker.stor.sinaapp.com/avatar/4.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 118, 61);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('章小彪', 'http://decorationbus-worker.stor.sinaapp.com/avatar/5.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 131, 64);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('虞江龙', 'http://decorationbus-worker.stor.sinaapp.com/avatar/6.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 144, 67);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('徐守峥', 'http://decorationbus-worker.stor.sinaapp.com/avatar/7.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 157, 70);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('谢伟松', 'http://decorationbus-worker.stor.sinaapp.com/avatar/8.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 170, 73);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('秦秀银', 'http://decorationbus-worker.stor.sinaapp.com/avatar/9.jpg', '1986-02-10', '571', '571', '18605811688', 1, 1, 1, 183, 76);  
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('马存柱', 'http://decorationbus-worker.stor.sinaapp.com/avatar/10.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 183, 79); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('芦传名', 'http://decorationbus-worker.stor.sinaapp.com/avatar/11.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 196, 80); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('刘苏平', 'http://decorationbus-worker.stor.sinaapp.com/avatar/12.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 209, 81); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('江登宝', 'http://decorationbus-worker.stor.sinaapp.com/avatar/13.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 222, 82); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('贾大兵', 'http://decorationbus-worker.stor.sinaapp.com/avatar/14.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 235, 83); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('侯泽民', 'http://decorationbus-worker.stor.sinaapp.com/avatar/15.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 248, 84); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('何其国', 'http://decorationbus-worker.stor.sinaapp.com/avatar/16.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 261, 85); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('葛基林', 'http://decorationbus-worker.stor.sinaapp.com/avatar/17.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 274, 86); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('冯亮平', 'http://decorationbus-worker.stor.sinaapp.com/avatar/18.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 287, 87); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈中响', 'http://decorationbus-worker.stor.sinaapp.com/avatar/19.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 300, 88); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈荣顺', 'http://decorationbus-worker.stor.sinaapp.com/avatar/20.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 313, 89); 
insert into decoration_worker(name, avatar, birthday, hometown, workcity, phone, worktype, manager, company, comments_number, score) values('陈存武', 'http://decorationbus-worker.stor.sinaapp.com/avatar/21.jpg', '1986-02-10', '571', '571', '18605811688', 2, 2, 2, 326, 90); 
*/