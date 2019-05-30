<!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>留言板</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body class="container">
    <table class="table table-bordered table-hover">
        <caption>留言列表</caption>
        <thead>
            <td>编号</td>
            <td>时间</td>
            <td>标题</td>
            <td>内容</td>
            <td>邮箱</td>
            <td>ip</td>
        </thead>
        <?php foreach ($留言列表 as $留言) { ?>
            <tr>
                <td><?= $留言['编号'] ?></td>
                <td><?= $留言['时间'] ?></td>
                <td><?= $留言['标题'] ?></td>
                <td><?= $留言['内容'] ?></td>
                <td><?= $留言['邮箱'] ?></td>
                <td><?= $留言['ip'] ?></td>
                <?php if (isset($_SESSION['管理员'])) { ?>
                    <td>
                        <a href="<?= self::链接(['应用' => '后台', '控制器' => '留言', '行为' => '删除', '编号' => $留言['编号']]) ?>">
                            删除
                        </a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <a href="<?= self::链接(['行为' => '发表']) ?>" class="btn btn-link btn-outline-success">
        留言
    </a>
    <?php if (isset($_SESSION['管理员'])) { ?>
        欢迎管理员 <?= $_SESSION['管理员'] ?>
        <a href="<?= self::链接(['应用' => '后台', '行为' => '注销']) ?>" class="btn btn-link btn-outline-primary">
            注销
        </a>
    <?php } else { ?>
        <a href="<?= self::链接(['应用' => '后台']) ?>" class="btn btn-link btn-outline-primary">
            管理员登录
        </a>
    <?php } ?>
</body>

</html>