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
    private $_库;

    /**
     * 保存拼装的语句
     * @var string
     */
    private $_语句;

    public function __construct()
    {
        $this->_库 = 数据库::获取实例();
        $this->_表 = substr(strrchr(static::class, '\\'), 1);
    }

    /**
     * 拼装select语句
     * @param array $字段列表
     * @return self
     */
    public function 选(array $字段列表 = []): self
    {
        $字段 = empty($字段列表) ? '*' : join(', ', $字段列表);
        $this->_语句 = "select $字段 from `{$this->_表}`";
        return $this;
    }

    /**
     * 拼装where子句
     * @param string $条件
     * @return self
     */
    public function 当(string $条件): self
    {
        $this->_语句 .= " where $条件";
        return $this;
    }

    /**
     * 取一行数据
     * @return array
     */
    public function 取(): array
    {
        return $this->_库->取($this->_语句);
    }

    /**
     * 取全部数据
     * @return array
     */
    public function 取尽(): array
    {
        return $this->_库->取尽($this->_语句);
    }

    public function 插(array $字段列表 = [])
    {
        $this->_语句 = "insert into `{$this->_表}`";
        if (!empty($字段列表)) {
            $字段 = join(', ', $字段列表);
            $this->_语句 .= "($字段)";
        }
        return $this;
    }

    public function 值(array $数据)
    {
        $this->_语句 .= ' values (' . join(',', array_fill(0, count($数据), '?')) . ')';
        return (bool) $this->_库->执行($this->_语句, $数据);
    }
}
