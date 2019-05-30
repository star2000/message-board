<?php
namespace 应用\前台\控制器;

use 框架\控制器;
use 框架\视图;
use 应用\公共\模型\留言 as 留言模型;

class 留言 extends 控制器
{
    public $留言;

    public function __construct()
    {
        $this->留言 = new 留言模型;
    }

    public function 列表()
    {
        $页 = $_GET['分页'] ?? 1;
        $总数 = $this->留言->总数();
        视图::渲染([
            '留言列表' => $this->留言->列表($页),
            '留言总数' => $总数,
            '当前页' => $页,
            '总页数' => (int)($总数 / $GLOBALS['分页']) + 1
        ]);
    }

    public function 发表()
    {
        $this->留言->发表($_POST['内容'], $_POST['邮箱']);
        视图::跳转();
    }
}
