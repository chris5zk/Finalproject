<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <link rel="stylesheet" href="/style/login_system.css">
</head>

<body>
    <?php if (isset($validation)) : ?>
        <div class="validation">
            <?= $validation->listErrors()?>
        </div>
    <?php endif; ?>

    <div class="center">
        <form action="/LoginController/new_account" enctype="multipart/form-data" method="POST">
            <h2>暱稱:</h2>
            <input id="name" type="text" name="name" placeholder="請輸入暱稱">
            <h2>EMAIL:</h2>
            <input id="mail" type="email" name="mail" placeholder="請輸入電子郵件">
            <h2>帳號:</h2>
            <input id="account" type="text" name="account" placeholder="請輸入帳號">
            <h2>密碼:</h2>
            <input id="password" type="password" name="password" placeholder="請輸入密碼">
            <h2>再次輸入密碼:</h2>
            <input id="passconf" type="password" name="passconf" placeholder="請再次輸入密碼">
            <br><br>
            <button>註冊</button>
        </form>
    </div>
</body>

<?= $this->endSection() ?>