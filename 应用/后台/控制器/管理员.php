<?php
namespace 应用\后台\控制器;

use 框架\控制器;
use 应用\后台\模型\管理员 as 管理员模型;
use 框架\视图;

class 管理员 extends 控制器
{
    public function __construct()
    {
        $this->管理员模型 = new 管理员模型;
    }

    public function 登录()
    {
        $提示 = '';
        if (isset($_POST['名字']) and isset($_POST['密码'])) {
            if ($this->管理员模型->存在($_POST['名字'])) {
                $数据 = $this->管理员模型->校验($_POST['名字'], $_POST['密码']);
                if ($数据) {
                    session_start();
                    $_SESSION['管理员'] = $数据['编号'];
                    视图::跳转([
                        '应用' => '后台',
                        '控制器' => '留言',
                        '行为' => '列表'
                    ]);
                } else {
                    $提示 = '密码错误';
                }
            } else {
                $提示 = '名字不存在';
            }
        }
        视图::渲染([
            '提示' => $提示
        ]);
    }

    public function 注销()
    {
        $_SESSION = [];
        视图::跳转();
    }
}
