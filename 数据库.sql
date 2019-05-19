set names utf8;
drop database if exists msg;
create database msg;
use msg;

create table `留言` (
    `编号` int unsigned not null primary key auto_increment,
    `日期` date not null,
    `标题` varchar(20) not null,
    `内容` text not null,
    `邮件` varchar(60) not null,
    `ip` varchar(15) not null
);

create table `管理` (
    `编号` int unsigned not null primary key auto_increment,
    `名字` varchar(20) not null,
    `密码` varchar(32) not null,
    `盐` char(4) not null
)