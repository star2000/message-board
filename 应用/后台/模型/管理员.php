<?php
namespace 应用\后台\模型;

use 框架\模型;

/**
 * 管理员模型
 */
class 管理员 extends 模型
{
    /**
     * 判断管理员是否存在
     * @return bool
     */
    public function 存在($名字)
    {
        return (bool)$this->查()->当(['名字' => $名字])->取();
    }

    /**
     * 判断密码是否正确
     * @param string $名字
     * @param string $密码
     * @return bool
     */
    public function 校验($名字, $密码)
    {
        return sha1($密码) == $this->查('密码')->当(['名字' => $名字])->取()['密码'];
    }
}
