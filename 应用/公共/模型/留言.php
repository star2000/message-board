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
     * @param string $标题
     * @param string $内容
     * @param string $邮箱
     * @return bool
     */
    public function 发表($标题,  $内容,  $邮箱)
    {
        return $this->增([
            '标题' => $标题,
            '内容' => $内容,
            '邮箱' => $邮箱,
            'ip' => $_SERVER['REMOTE_ADDR']
        ])->执行();
    }

    /**
     * 
     * @return array
     */
    public function 列表()
    {
        return $this->查()->取尽();
    }
}
