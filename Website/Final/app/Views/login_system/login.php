<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-會員登入</title>
    <link rel="stylesheet" href="/style/login_system.css">
</head>

<body>
<?php if (isset($validation)) : ?>
        <div class="validation">
            <?= $validation->listErrors()?>
        </div>
    <?php endif; ?>
    <div class="center">
        <form action="/LoginController/compare_account" enctype="multipart/form-data" method="post">
            <h2>帳號:</h2>
            <input id="account" type="text" name="account" placeholder="請輸入帳號">
            <br>
            <h2>密碼:</h2>
            <input id="password" type="password" name="password" placeholder="請輸入密碼">
            <br>
            <h2>驗證碼:</h2>
            <input id="valicode" type="text" name="valicode" placeholder="請輸入驗證碼">
            
            <button>登入</button>
        </form>
    </div>
</body>


<?= $this->endSection() ?>