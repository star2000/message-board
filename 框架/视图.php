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
        $应用 = $应用 ?: 应用;
        $视图 = $视图 ?: 行为;
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
     * @param array $参数
     */
    public static function 跳转($参数 = [])
    {
        header('location:' . self::链接($参数));
    }

    /**
     * 生成链接, 以当前路由为基准
     * @param array $参数
     * @return string
     */
    public static function 链接($参数 = [])
    {
        $参数 = array_merge([
            '应用' => 应用,
            '控制器' => 控制器,
            '行为' => 行为
        ], $参数);
        // 缩短url
        if ($参数['行为'] == $GLOBALS['配置'][$参数['应用']]['默认行为']) {
            unset($参数['行为']);
        }
        if ($参数['控制器'] == $GLOBALS['配置'][$参数['应用']]['默认控制器']) {
            unset($参数['控制器']);
        }
        if ($参数['应用'] == $GLOBALS['配置']['应用']['默认应用']) {
            unset($参数['应用']);
        }
        return $参数 ? '/?' . http_build_query($参数) : '/';
    }
}
