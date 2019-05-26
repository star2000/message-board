<?php
namespace 框架;

use PDO;
use PDOException;
use PDOStatement;

/**
 * 数据库驱动
 */
final class 数据库
{
    /**
     * PDO连接
     * @var PDO
     */
    private $连接;

    /**
     * 保存自身实例
     * @var self
     */
    private static $实例;

    /**
     * 连接数据库
     * @param array $配置
     */
    private function __construct($配置)
    {
        // 拼装dsn数据元
        $数据源 = $配置['类型'] . ':host=' . $配置['地址'] . ';dbname=' . $配置['库名'];
        if (isset($配置['端口'])) {
            $数据源 .= ';port=' . $配置['端口'];
        }
        if (isset($配置['字符集'])) {
            $数据源 .= ';charset=' . $配置['字符集'];
        }

        // 连接数据库
        try {
            $this->连接 = new PDO($数据源, $配置['用户名'], $配置['密码']);
        } catch (PDOException $_) {
            die('数据库链接失败');
        }
    }

    private function __clone()
    { }

    /**
     * 生成或返回现有实例
     * @return self
     */
    public static function 获取实例()
    {
        if (null == self::$实例) {
            self::$实例 = new self($GLOBALS['配置']['数据库']);
        }
        return self::$实例;
    }

    /**
     * 执行语句, 返回bool
     * @param string $语句
     * @param array $数据
     * @return bool
     */
    public function 执行($语句, $数据 = [])
    {
        return $this->连接->prepare($语句)->execute($数据);
    }

    /**
     * 查询语句, 返回PDOStatement对象
     * @param string $语句
     * @param array $数据
     * @return PDOStatement
     */
    public function 查询($语句, $数据 = [])
    {
        $模板 = $this->连接->prepare($语句);
        $模板 or die('语句查询失败');
        $模板->execute($数据);
        return $模板;
    }

    /**
     * 取一行数据
     * @param string $语句
     * @param array $数据
     * @return array
     */
    public function 取($语句, $数据 = [])
    {
        return $this->查询($语句, $数据)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 取全部数据
     * @param string $语句
     * @param array $数据
     * @return array
     */
    public function 取尽($语句, $数据 = [])
    {
        return $this->查询($语句, $数据)->fetchAll(PDO::FETCH_ASSOC);
    }
}
