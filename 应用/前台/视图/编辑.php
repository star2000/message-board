<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>编辑器</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="container">
    <h1>编辑器</h1>
    <form action="?行为=发表" method="post">
        <input name="标题" placeholder="标题" class="form-control"><br>
        <textarea name="内容" placeholder="内容" rows="10" class="form-control"></textarea><br>
        <input type="email" name="邮箱" placeholder="邮箱" class="form-control"><br>
        <button type="submit" class="btn btn-block btn-outline-primary">提交</button>
    </form>
</body>
</html>
