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

<body class="container col-lg-8">
    <h1 class="text-center text-primary my-5">
        <a href="https://github.com/star2000/message-board" class="text-decoration-none">
            <img src="favicon.ico" alt="标志" height="60">
        </a>
        星的留言板
    </h1>
    <h2 class="text-center text-primary mb-5">一个基于PHP的留言板</h2>
    <span class="text-primary">共 <?= $留言总数 ?> 条评论</span>
    <hr>
    <form action="<?= self::链接(['行为' => '发表']) ?>" method="post">
        <textarea name="内容" placeholder="说点什么" rows="3" class="form-control mb-1"></textarea>
        <div class="form-row mx-0">
            <input type="email" name="邮箱" placeholder=" 邮箱" class="form-control col mr-1">
            <button type="submit" class="btn btn-outline-primary col-2">发表</button>
        </div>
    </form>
    <?php foreach ($留言列表 as $留言) { ?>
        <section class="card my-3">
            <div class="card-title pl-2">
                <a href="mailto:<?= $留言['邮箱'] ?>" class="card-link"><?= $留言['邮箱'] ?></a>
                <span class="text-muted">发表于 <?= $留言['时间'] ?></span>
            </div>
            <div class="card-body">
                <?= $留言['内容'] ?>
            </div>
        </section>
    <?php } ?>
    <div class="btn-toolbar btn-group">
        <?php if ($当前页 > 1) { ?>
            <a href="<?= self::链接(['分页' => 1]) ?>" class="btn btn-outline-dark">首页</a>
        <?php } ?>
        <?php for ($_ = 1; $_ <= $总页数; $_++) {
            if ($当前页 <= 3 or $当前页 >= $总页数 - 3) {
                if ($_ < $当前页 - 6 or $_ > $当前页 + 6) {
                    continue;
                }
            } elseif ($_ < $当前页 - 3 or $_ > $当前页 + 3) {
                continue;
            } ?>
            <a href="<?= self::链接(['分页' => $_]) ?>" class="btn btn-outline-dark <?= $当前页 == $_ ? 'disabled' : '' ?>">
                <?= $_ ?>
            </a>
        <?php } ?>
        <?php if ($当前页 < $总页数) { ?>
            <a href="<?= self::链接(['分页' => $总页数]) ?>" class="btn btn-outline-dark">尾页</a>
        <?php } ?>
    </div>
</body>

</html>