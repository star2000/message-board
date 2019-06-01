<!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>列表</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="container">
    <ul class="fixed-top list-group list-group-flush" style="width:85px">
        <li class="list-group-item">你好<?= $_SESSION['管理员'] ?></li>
        <a href="<?= self::链接([
                        '控制器' => '管理员',
                        '行为' => '注销'
                    ]) ?>" class="list-group-item list-group-item-action list-group-item-warning">注销</a>
    </ul>
    <table class="table table-hover">
        <thead>
            <td>编号</td>
            <td>邮箱</td>
            <td>内容</td>
            <td>回复</td>
            <td>地址</td>
            <td>时间</td>
            <td>管理</td>
        </thead>
        <?php foreach ($留言列表 as $留言) { ?>
            <tr>
                <td><?= $留言['编号'] ?></td>
                <td><?= $留言['邮箱'] ?></td>
                <td><?= $留言['内容'] ?></td>
                <td><?= $留言['回复'] ?></td>
                <td><?= $留言['地址'] ?></td>
                <td><?= $留言['时间'] ?></td>
                <td>
                    <a href="<?= self::链接(['行为' => '修改', '编号' => $留言['编号']]) ?>" class="text-info">
                        修改
                    </a>
                    <a href="<?= self::链接(['行为' => '删除', '编号' => $留言['编号']]) ?>" class="text-danger">
                        删除
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="btn-toolbar btn-group">
        <a href="<?= self::链接(['分页' => 1]) ?>" class="col-1 btn btn-outline-dark <?= $当前页 == 1 ? 'disabled' : '' ?>">
            首页
        </a>
        <?php for ($_ = 1; $_ <= $总页数; $_++) {
            if ($当前页 <= 3 or $当前页 >= $总页数 - 3) {
                if ($_ < $当前页 - 6 or $_ > $当前页 + 6) {
                    continue;
                }
            } elseif ($_ < $当前页 - 3 or $_ > $当前页 + 3) {
                continue;
            } ?>
            <a href="<?= self::链接(['分页' => $_]) ?>" class="col-1 btn btn-outline-dark <?= $当前页 == $_ ? 'disabled' : '' ?>">
                <?= $_ ?>
            </a>
        <?php } ?>
        <a href="<?= self::链接(['分页' => $总页数]) ?>" class="col-1 btn btn-outline-dark <?= $当前页 == $总页数 ? 'disabled' : '' ?>">
            尾页
        </a>
    </div>
</body>

</html>