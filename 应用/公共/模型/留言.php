<?php
namespace 应用\公共\模型;

use 框架\模型;

/**
 * 留言模型
 */
class 留言 extends 模型
{
    public function 写(array $数据)
    {
        $this->_库->执行("insert into {$this->_表}(标题, 内容, 邮件, ip) values (?,?,?,?)", $数据);
    }
}
