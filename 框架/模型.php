<?php
namespace 框架;

/**
 * 基础模型
 */
class 模型
{
    /**
     * 保存对应的表名
     * @var string
     */
    private $表;

    /**
     * 保存数据库实例
     * @var 数据库
     */
    private $库;

    /**
     * 保存拼装的语句
     * @var string
     */
    private $语句;

    public function __construct()
    {
        $this->库 = 数据库::获取实例();
        $this->表 = substr(strrchr(static::class, '\\'), 1);
    }

    /**
     * 拼装select语句
     * @param array $字段列表
     * @return self
     */
    public function 选(array $字段列表 = []): self
    {
        $字段 = $字段列表 ? join(', ', $字段列表) : '*';
        $this->语句 = "select $字段 from `{$this->表}`";
        return $this;
    }

    /**
     * 拼装where子句
     * @param string $条件
     * @return self
     */
    public function 当(string $条件): self
    {
        $this->语句 .= " where $条件";
        return $this;
    }

    /**
     * 取一行数据
     * @return array
     */
    public function 取(): array
    {
        return $this->库->取($this->语句);
    }

    /**
     * 取全部数据
     * @return array
     */
    public function 取尽(): array
    {
        return $this->库->取尽($this->语句);
    }

    public function 插(array $字段列表 = []): self
    {
        $this->语句 = "insert into `{$this->表}`";
        if ($字段列表) {
            $字段 = join(', ', $字段列表);
            $this->语句 .= "($字段)";
        }
        return $this;
    }

    public function 值(array $数据): bool
    {
        $this->语句 .= ' values (' . join(',', array_fill(0, count($数据), '?')) . ')';
        return (bool)$this->库->执行($this->语句, $数据);
    }
}
