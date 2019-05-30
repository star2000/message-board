<?php
namespace 应用\前台\控制器;

use 应用\公共\模型\留言 as 留言模型;
use 框架\控制器;
use 框架\视图;

class 留言 extends 控制器
{
    public $留言模型;

    public function __construct()
    {
        $this->留言模型 = new 留言模型;
    }

    public function 列表()
    {
        视图::渲染([
            '留言列表' => $this->留言模型->列表(),
        ], '公共');
    }

    public function 发表()
    {
        if (isset($_POST['标题']) and isset($_POST['内容']) and isset($_POST['邮箱'])) {
            if ($this->留言模型->发表($_POST['标题'], $_POST['内容'], $_POST['邮箱'])) {
                视图::跳转();
            }
        } else {
            视图::渲染();
        }
    }
}
