<?php
namespace 应用\公共\模型;

use 框架\模型;

/**
 * 留言模型
 */
class 留言 extends 模型
{
    /**
     * 发表留言
     * @param string $内容
     * @param string $邮箱
     * @return bool
     */
    public function 发表($内容, $邮箱)
    {
        return $this->增([
            '内容' => $内容,
            '邮箱' => $邮箱,
            '地址' => $_SERVER['REMOTE_ADDR']
        ])->执行();
    }

    /**
     * 按页取出的留言
     * @param int $页
     * @return array
     */
    public function 列表($页 = 1)
    {
        return $this->查()->始(分页 * ($页 - 1))->取尽();
    }

    /**
     * 删除留言
     * @param int $编号
     * @return bool
     */
    public function 删除($编号)
    {
        return $this->删()->当(['编号' => $编号])->执行();
    }

    /**
     * 获得总行数
     * @return int
     */
    public function 总数()
    {
        return $this->查(['count(*)'])->取()['count(*)'];
    }
}
