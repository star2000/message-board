set names utf8;
drop database if exists msg;
create database msg;
use msg;

create table 留言 (
  编号 int(10) unsigned not null auto_increment primary key,
  时间 timestamp not null,
  标题 varchar(20) not null,
  内容 text not null,
  回复 text not null,
  邮箱 varchar(60) not null,
  ip varchar(15) not null
);

insert into 留言(标题, 内容, 邮箱, ip) values ('测试','测试留言板','i@star2000.work','127.0.0.1');

create table 管理员 (
  编号 int(10) unsigned not null auto_increment primary key,
  名字 varchar(20) not null,
  密码 varchar(40) not null
);

insert into 管理员(名字, 密码) values ('李星',sha1(1753304));
