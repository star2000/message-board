<?php
namespace 应用\公共\模型;

use 框架\模型;

/**
 * 留言模型
 */
class 留言 extends 模型
{
    public function 发表(string $标题, string $内容, string $邮箱): bool
    {
        return $this->插(['标题', '内容', '邮箱', 'ip'])
            ->值([$标题, $内容, $邮箱, $_SERVER['REMOTE_ADDR']]);
    }

    public function 列表(): array
    {
        return $this->选()->取尽();
    }
}
