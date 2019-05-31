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
    private $表 = '';

    /**
     * 为拼装语句提供数据
     * @var array
     */
    private $数据 = [];

    /**
     * 语句的类型
     * @var string
     */
    private $类型 = '';

    /**
     * 控制limit的起始行
     * @var int
     */
    private $始行 = 0;

    /**
     * 为拼装语句提供字段列表
     * @var array
     */
    private $字段列表 = [];

    public function __construct($表 = '')
    {
        $this->表 = $表 ? $表 : substr(strrchr(static::class, '\\'), 1);
        $GLOBALS['分页'] = $GLOBALS['配置'][$GLOBALS['应用']]['分页'];
    }

    /**
     * 对应insert
     * @param array $数据
     * @return $this
     */
    public function 增($数据)
    {
        $this->类型 = '增';
        $this->数据 = array_merge($this->数据, $数据);
        return $this;
    }

    /**
     * 对应delete
     * @return $this
     */
    public function 删()
    {
        $this->类型 = '删';
        return $this;
    }

    /**
     * 对应update
     * @param array $字段列表
     * @return $this
     */
    public function 改($字段列表 = [])
    {
        $this->类型 = '改';
        $this->字段列表 = $字段列表;
        return $this;
    }

    /**
     * 对应select
     * @param array $字段列表
     * @return $this
     */
    public function 查($字段列表 = [])
    {
        $this->类型 = '查';
        $this->字段列表 = $字段列表;
        return $this;
    }

    /**
     * 对应where
     * @param array $条件
     * @return $this
     */
    public function 当($条件)
    {
        $this->数据 = array_merge($this->数据, $条件);
        return $this;
    }

    /**
     * 对应limit
     * @param int $行
     * @return $this
     */
    public function 始($始行)
    {
        $this->始行 = $始行;
        return $this;
    }

    /**
     * 拼装语句
     * @return string
     */
    public function 语句()
    {
        switch ($this->类型) {
            case '增':
                $语句 = "insert into `{$this->表}`(" . join(', ', array_keys($this->数据)) . ')';
                $语句 .= ' values (' . join(', ', array_fill(0, count($this->数据), '?')) . ')';
                break;
            case '删':
                $语句 = "delete from `{$this->表}`";
                break;
            case '改':
                $语句 = "update `{$this->表}` set ";
                $语句 .= join(', ', array_map(function ($键) {
                    return "`$键`=?";
                }, array_keys($this->字段列表)));
                break;
            case '查':
                $字段 = $this->字段列表 ? join(', ', $this->字段列表) : '*';
                $语句 = "select $字段 from `{$this->表}`";
                break;
            default:
                return '';
        }
        // where 子句
        if ($this->类型 != '增') {
            if ($this->数据) {
                $语句 .= ' where ';
                $语句 .= join(' and ', array_map(function ($键) {
                    return "`$键`=?";
                }, array_keys($this->数据)));
            }
        }
        // limit 子句
        if ($this->类型 == '查') {
            $语句 .= " limit {$this->始行},{$GLOBALS['分页']}";
        }

        if ($this->类型 == '改') {
            foreach ($this->字段列表 as $值) {
                $this->数据[] = $值;
            }
        }
        return $语句;
    }

    /**
     * 执行语句
     * @param array $数据
     * @return bool
     */
    public function 执行($数据 = [])
    {
        $this->数据 = array_merge($this->数据, $数据);
        return 数据库::获取实例()->执行($this->语句(), array_values($this->数据));
    }

    /**
     * 取一行数据
     * @return array
     */
    public function 取()
    {
        return 数据库::获取实例()->取($this->语句(), array_values($this->数据));
    }

    /**
     * 取全部数据
     * @return array
     */
    public function 取尽()
    {
        return 数据库::获取实例()->取尽($this->语句(), array_values($this->数据));
    }
}
