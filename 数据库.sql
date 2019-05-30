set names utf8;
drop database if exists 留言板;
create database 留言板 charset utf8;
use 留言板;

create table 留言 (
  编号 int unsigned auto_increment primary key,
  时间 timestamp not null,
  内容 text not null,
  邮箱 varchar(60) not null,
  地址 varchar(15) not null
);

insert into 留言(内容, 邮箱, 地址) values ('测试留言板','i@star2000.work','127.0.0.1');

create table 管理员 (
  编号 int unsigned auto_increment primary key,
  名字 varchar(20) not null,
  密码 varchar(40) not null
);

insert into 管理员(名字, 密码) values ('李星',sha1(1753304));
