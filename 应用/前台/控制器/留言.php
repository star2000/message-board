<?php
namespace 应用\前台\控制器;

use 应用\公共\模型\留言 as 留言模型;
use 框架\控制器;

class 留言 extends 控制器
{
    public $留言模型;

    public function 初始化()
    {
        $this->留言模型 = new 留言模型;
    }

    public function 列表()
    {
        $this->视图->渲染([
            '留言列表' => $this->留言模型->取全部(),
        ]);
    }
}
