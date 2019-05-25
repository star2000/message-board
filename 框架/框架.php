<?php
namespace 框架;

/**
 * 基础框架
 */
final class 框架
{
    public function 运行()
    {
        $this->加载配置();
        $this->注册自动加载();
        $this->请求分发();
    }
    private function 加载配置()
    {
        $GLOBALS['配置'] = require __DIR__ . '/../配置.php';
    }
    private function 注册自动加载()
    {
        spl_autoload_register([$this, '自动加载']);
    }
    private function 自动加载($类名)
    {
        require __DIR__ . '/../' . $类名 . '.php';
    }
    private function 请求分发()
    {
        // 路由
        $应用 = $_REQUEST['应用'] ?? $GLOBALS['配置']['应用']['默认应用'];
        $控制器 = $_REQUEST['控制器'] ?? $GLOBALS['配置'][$应用]['默认控制器'];
        $行为 = $_REQUEST['行为'] ?? $GLOBALS['配置'][$应用]['默认行为'];

        $控制器 = "\\应用\\$应用\\控制器\\$控制器";
        $GLOBALS['应用'] = $应用;
        $GLOBALS['控制器'] = $控制器;
        $GLOBALS['行为'] = $行为;
        // 执行
        (new $控制器)->$行为();
    }
}
