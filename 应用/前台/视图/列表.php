<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>留言板</title>
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
        <?php foreach ($留言列表 as $留言) {?>
        <tr>
            <td><?=$留言['编号']?></td>
            <td><?=$留言['时间']?></td>
            <td><?=$留言['标题']?></td>
            <td><?=$留言['内容']?></td>
            <td><?=$留言['邮箱']?></td>
            <td><?=$留言['ip']?></td>
        </tr>
        <?php }?>
    </table>
    <a href="?行为=编辑" class="btn btn-link btn-outline-success">添加</a>
</body>

</html>