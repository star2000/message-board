<?php
namespace 框架;

/**
 * 基础框架
 */
final class 框架
{
    public static function 运行()
    {
        session_start();
        self::加载配置();
        self::环境变量();
        self::注册自动加载();
        self::响应();
    }
    private static function 加载配置()
    {
        $GLOBALS['配置'] = require __DIR__ . '/../配置.php';
    }
    private static function 注册自动加载()
    {
        spl_autoload_register('self::自动加载');
    }
    private static function 自动加载($类名)
    {
        require __DIR__ . '/../' . $类名 . '.php';
    }
    private static function 环境变量()
    {
        define('应用', $_REQUEST['应用'] ?? $GLOBALS['配置']['应用']['默认应用']);
        define('控制器', $_REQUEST['控制器'] ?? $GLOBALS['配置'][应用]['默认控制器']);
        define('行为', $_REQUEST['行为'] ?? $GLOBALS['配置'][应用]['默认行为']);
        define('分页', $GLOBALS['配置'][应用]['分页']);
    }
    private static function 响应()
    {
        $控制器 = '\\应用\\' . 应用 . '\\控制器\\' . 控制器;
        $行为 = 行为;
        (new $控制器)->$行为();
    }
}
