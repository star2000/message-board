<?php

namespace 应用\后台\控制器;

use 框架\控制器;
use 框架\视图;
use 应用\公共\模型\留言 as 留言模型;

class 留言 extends 控制器
{
    private $留言;

    public function __construct()
    {
        if (!isset($_SESSION['管理员'])) {
            return 视图::跳转([
                '应用' => '后台'
            ]);
        }
        $this->留言 = new 留言模型;
    }

    public function 列表()
    { }

    public function 回复()
    { }

    public function 编辑()
    { }

    public function 删除()
    {
        $this->留言->删除($_GET['编号']);
        视图::跳转();
    }
}
