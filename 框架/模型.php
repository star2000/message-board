<?php
namespace 框架;

/**
 * 模型基础类
 */
class 模型
{
    /**
     * 保存对应的表名
     * @var string
     */
    private $_表;

    /**
     * 保存数据库实例
     * @var 数据库
     */
    protected $_库;

    public function __construct()
    {
        $this->_库 = 数据库::获取实例();
        $this->_表 = substr(strrchr(static::class, '\\'), 1);
    }

    /**
     * 取全部数据
     * @return array
     */
    public function 取全部(): array
    {
        return $this->_库->取全部("select * from {$this->_表}");
    }

    /**
     * 取指定行数据
     * @return array
     */
    public function 取(int $编号): array
    {
        return $this->_库->取("select * from {$this->_表} where 编号=?", [$编号]);
    }
}
