<?php
namespace 框架;

/**
 * 基础控制器
 */
class 控制器
{
    /**
     * 视图类实例
     * @var 视图
     */
    public $视图;

    public function __construct()
    {
        $this->视图 = new 视图;
    }
}
