<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-會員註冊</title>
    <link rel="stylesheet" href="/style/login_system.css">
</head>

<body>
    <div>
        <form action="/LoginController/new_account" enctype="multipart/form-data" method="POST">
            <h2 class="center">暱稱:</h2>
            <input id="name" type="text" name="name" placeholder="請輸入暱稱" class="center">
            <br>
            <span class="validation"> <?= (isset($validation) && $validation->hasError('name')) ? $validation->getError('name'):'' ?> </span>
            <h2 class="center">電子郵件:</h2>
            <input id="mail" type="email" name="mail" placeholder="請輸入電子郵件" class="center">
            <br>
            <span class="validation"> <?= (isset($validation) && $validation->hasError('mail')) ? $validation->getError('mail'):'' ?> </span>
            <h2 class="center">帳號:</h2>
            <input id="account" type="text" name="account" placeholder="請輸入帳號" class="center">
            <br>
            <span class="validation"> <?= (isset($validation) && $validation->hasError('account')) ? $validation->getError('account'):'' ?> </span>
            <h2 class="center">密碼:</h2>
            <input id="password" type="password" name="password" placeholder="請輸入密碼" class="center">
            <br>
            <span class="validation"> <?= (isset($validation) && $validation->hasError('password')) ? $validation->getError('password'):'' ?> </span>
            <h2 class="center">再次輸入密碼:</h2>
            <input id="passconf" type="password" name="passconf" placeholder="請再次輸入密碼" class="center">
            <br>
            <span class="validation"> <?= (isset($validation) && $validation->hasError('passconf')) ? $validation->getError('passconf'):'' ?> </span>
            <br><br>
            <button class="button_left">註冊</button>
            <input type="reset" value="取消" class="button_right" onclick="location.href='/PostController/homepage'">
        </form>
        
    </div>
</body>

<?= $this->endSection() ?>