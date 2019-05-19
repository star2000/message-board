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
     * @var PDO
     */
    private $_连接;

    /**
     * @var self
     */
    private static $_实例;

    private function __construct(array $配置)
    {
        // 拼装dsn数据元
        $数据源 = $配置['类型'] . ':host=' . $配置['地址'] . ';dbname=' . $配置['库名'];
        if (!empty($配置['端口'])) {
            $数据源 .= ';port=' . $配置['端口'];
        }
        if (!empty($配置['字符集'])) {
            $数据源 .= ';charset=' . $配置['字符集'];
        }

        // 连接数据库
        try {
            $this->_连接 = new PDO($数据源, $配置['用户名'], $配置['密码']);
        } catch (PDOException $错误) {
            die('数据库链接失败');
        }
    }

    private function __clone()
    {}

    /**
     * 生成或返回现有实例
     * @return self
     */
    public static function 获取实例(): self
    {
        if (null == self::$_实例) {
            self::$_实例 = new self($GLOBALS['配置']['数据库']);
        }
        return self::$_实例;
    }

    /**
     * 预处理语句，并且执行
     * @param string $语句
     * @param array $数据
     * @return PDOStatement
     */
    public function 执行(string $语句, array $数据 = []): PDOStatement
    {
        $声明 = $this->_连接->prepare($语句);
        $声明->execute($数据);
        return $声明;
    }

    /**
     * 取数据
     * @var string $语句
     * @return array
     */
    public function 取(string $语句, array $数据 = []): array
    {
        return $this->执行($语句, $数据)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 取全部数据
     * @var string $语句
     * @return array
     */
    public function 取全部(string $语句): array
    {
        return $this->执行($语句)->fetchAll(PDO::FETCH_ASSOC);
    }
}
