<?php
namespace 应用\公共\模型;

use 框架\模型;

/**
 * 留言模型
 */
class 留言 extends 模型
{
    public function 发表()
    {
        $this->_库->执行("insert into {$this->_表}(标题, 内容, 邮箱, ip) values (?,?,?,?)", [
            $_POST['标题'],
            $_POST['内容'],
            $_POST['邮箱'],
            $_SERVER['REMOTE_ADDR'],
        ]);
    }
}
