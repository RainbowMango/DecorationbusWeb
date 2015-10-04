create table user_score(
    username VARCHAR(16) NOT NULL PRIMARY KEY,
    score    INT unsigned NOT NULL ,
    updtime TIMESTAMP
    )ENGINE=MyISAM DEFAULT CHARSET=utf8;
