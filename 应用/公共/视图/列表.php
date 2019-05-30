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
            </tr>
        <?php } ?>
    </table>
    <a href="<?= self::链接(['行为' => '发表']) ?>" class="btn btn-link btn-outline-success">添加</a>
</body>

</html>