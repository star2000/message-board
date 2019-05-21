<?php
namespace 应用\后台\控制器;

use 框架\控制器;

class 管理员 extends 控制器
{
    public function 登录()
    {
        if (isset($_POST['名字']) and isset($_POST['密码'])) {

        } else {
            $this->视图->渲染();
        }
    }

    public function 注销()
    {

    }
}
