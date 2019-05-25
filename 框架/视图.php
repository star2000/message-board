<?php
namespace 框架;

/**
 * 基础视图
 */
class 视图
{
    /**
     * 渲染视图
     * @var string $模板
     * @var array $数据
     */
    public function 渲染(array $数据 = [], string $应用 = '', string $视图 = '')
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

    public function 跳转(string $目标 = '/')
    {
        header("location:$目标");
    }
}
