<?php
namespace 框架;

/**
 * 基础视图
 */
class 视图
{
    /**
     * 渲染视图
     * @param array $数据
     * @param string $应用
     * @param string $视图
     */
    public static function 渲染($数据 = [], $应用 = '', $视图 = '')
    {
        $应用 = $应用 ?: $GLOBALS['应用'];
        $视图 = $视图 ?: $GLOBALS['行为'];
        array_walk_recursive($数据, function (&$值) {
            if (is_string($值)) {
                $值 = nl2br(htmlentities($值));
            }
        });
        extract($数据, EXTR_OVERWRITE);
        require __DIR__ . "/../应用/$应用/视图/$视图.php";
    }

    /**
     * 页面跳转
     * @param array $目标
     */
    public static function 跳转($目标 = [])
    {
        header('location:' . self::链接($目标));
    }

    /**
     * 生成链接
     * @param array $目标
     * @return string
     */
    public static function 链接($目标 = [])
    {
        return $目标 ? '/?' . http_build_query($目标) : '/';
    }
}
