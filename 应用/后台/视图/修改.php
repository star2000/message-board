<!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>修改</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="container">
    <form method="post">
        <label class="form-row">
            <span class="form-text">内容</span>
            <textarea name="内容" rows="3" class="form-control"><?= $留言['内容'] ?></textarea>
        </label>
        <label class="form-row">
            <span class="form-text">回复</span>
            <textarea name="回复" rows="3" class="form-control"><?= $留言['回复'] ?></textarea>
        </label>
        <label class="form-row">
            <span class="col-auto form-text">邮箱</span>
            <input type="email" value="<?= $留言['邮箱'] ?>" name="邮箱" class="form-control col">
        </label>
        <label class="form-row">
            <span class="col-auto form-text">地址</span>
            <input name="地址" value="<?= $留言['地址'] ?>" class="form-control col">
        </label>
        <button type=" submit" class="btn btn-block btn-outline-primary">修改</button>
    </form>
</body>

</html>