<!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>登录</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="container">
    <?php if (isset($提示)) { ?>
        <p class="alert alert-danger"><?= $提示 ?: '' ?></p>
    <?php } ?>
    <form method="post">
        <input name="名字" placeholder="名字" class="form-control"><br>
        <input type="password" name="密码" placeholder="密码" class="form-control"><br>
        <button type="submit" class="btn btn-block btn-outline-success">登录</button>
    </form>
</body>

</html>