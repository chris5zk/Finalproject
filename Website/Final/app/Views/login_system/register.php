<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>

</head>

<body>
    <div>
        <form action="/LoginController/new_account" enctype="multipart/form-data" method="post">
            <h5>ACCOUNT:</h5>
            <input id="account" type="text" name="account">
            <br>
            <h5>PASSWORD:</h5>
            <input id="password" type="text" name="password">
            <button>Submit</button>
        </form>
    </div>
</body>


<?= $this->endSection() ?>