<?php
namespace 应用\后台\控制器;

use 框架\控制器;
use 框架\视图;
use 应用\后台\模型\管理员 as 管理员模型;

class 管理员 extends 控制器
{
    public function 登录()
    {
        // 如果管理员已登陆, 跳转到列表
        if (isset($_SESSION['管理员'])) {
            return 视图::跳转();
        }
        // 默认渲染登录表格
        if (!(isset($_POST['名字']) and isset($_POST['密码']))) {
            return 视图::渲染();
        }
        $管理员 = new 管理员模型;
        if (!$管理员->存在($_POST['名字'])) {
            return 视图::渲染([
                '提示' => '名字不存在'
            ]);
        }
        // 校验密码, 正确返回管理员名字, 错误返回false
        $结果 = $管理员->校验($_POST['名字'], $_POST['密码']);
        if ($结果 === false) {
            return 视图::渲染([
                '提示' => '密码错误'
            ]);
        }
        $_SESSION['管理员'] = $结果;
        视图::跳转();
    }

    public function 注销()
    {
        $_SESSION = [];
        视图::跳转();
    }
}
