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
    <a href="<?= self::链接(['应用' => '后台', '控制器' => '管理员', '行为' => '登录']) ?>" class="fixed-top">
        管理员登录
    </a>
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
            <div class="card-body">
                <h6 class="card-title">
                    <a href="mailto:<?= $留言['邮箱'] ?>" class="card-link"><?= $留言['邮箱'] ?></a>
                    <span class="text-muted">发表于 <?= $留言['时间'] ?></span>
                </h6>
                <p class="card-text"><?= $留言['内容'] ?></p>
            </div>
            <?php if ($留言['回复']) { ?>
                <div class="card-footer">管理员回复: <?= $留言['回复'] ?></div>
            <?php } ?>
        </section>
    <?php } ?>
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