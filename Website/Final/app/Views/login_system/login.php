<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-會員登入</title>
    <link rel="stylesheet" href="/style/login_system.css">
</head>

<body>
    <?php if (isset($validation)) : ?>
        <div class="validation2">
            <?= $validation->listErrors()?>
        </div>
    <?php endif; ?>
    <div>
        <form action="/LoginController/compare_account" enctype="multipart/form-data" method="post">
            <h2 class="center">帳號:</h2>
            <input id="account" type="text" name="account" placeholder="請輸入帳號" class="center">
            <br>
            <h2 class="center">密碼:</h2>
            <input id="password" type="password" name="password" placeholder="請輸入密碼" class="center">
            <br><br><br>
            <button class="button_left">登入</button>
            <input type="reset" value="取消" class="button_right" onclick="location.href='/PostController/homepage'">
        </form>
    </div>
</body>


<?= $this->endSection() ?>