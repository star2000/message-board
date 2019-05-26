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
    public function 存在(string $名字)
    {
        return (bool)$this->查(['名字'])->当(['名字' => $名字])->取();
    }
}
