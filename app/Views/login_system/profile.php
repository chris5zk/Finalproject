<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-個人頁面編輯</title>
    <link rel="stylesheet" href="/style/login_system.css">
</head>

<body>
    <?php if (isset($validation)) : ?>  
        <div class="validation2">
            <?= $validation->listErrors()?>
        </div>
    <?php endif; ?>
    <form action="/LoginController/profile_edit" enctype="multipart/form-data" method="post">
            <h2 class="center">更改暱稱:</h2>
            <input id="name" type="text" name="name" value="<?=session()->get('name')?>" class="center">
            <br>
            <h2 class="center">電子郵件:</h2>
            <input id="mail" type="email" name="mail" value="<?=session()->get('mail')?>" class="center" readonly style="background:lightgray;">
            <br>
            <h2 class="center">更改帳號:</h2>
            <input id="account" type="text" name="account" value="<?=session()->get('account')?>" class="center">
            <br>
            <h2 class="center">更改密碼:</h2>
            <input id="password2" type="password" name="password" placeholder="Password" class="center">
            <input id="passconf2" type="password" name="passconf" placeholder="Passconf" class="center">
            <br><br><br>
            <button class="button_left">更新</button>
            <input type="reset" value="取消" class="button_right" onclick="location.href='/PostController/homepage'">
        </form>
</body>

<?= $this->endSection() ?>