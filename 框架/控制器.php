<?php
namespace 框架;

/**
 * 基础控制器
 */
class 控制器
{
    /**
     * @var 视图
     */
    public $视图;

    public function __construct()
    {
        $this->视图 = new 视图;
        $this->初始化();
    }
    public function 初始化()
    {
    }
}
