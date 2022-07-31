<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-打卡</title>
    <link rel="stylesheet" href="/style/post_system.css">
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
</head>
<body>
    <?php if (isset($validation)) : ?>
        <div class="validation2">
            <?= $validation->listErrors()?>
        </div>
    <?php endif; ?>
    <form action="/PostController/post" enctype="multipart/form-data" method="post">
        <input id="date" type="datetime-local" name="date" placeholder="請輸入車禍日期">
        <input id="car" type="text" name="car" placeholder="請輸入車牌">
        <input id="place" type="text" name="place" placeholder="請輸入車禍地點">
        <input id="contact" type="text" name="contact" placeholder="請輸入聯絡方式">
        <input id="myfile" type="file" name="myfile" accept="image/.png,image/.jpg,image/jpeg,image/">
        <textarea class="ckeditor" id="editor" name="content" placeholder="為你的車禍描述..."></textarea>
        <br>
        <button class="button_left">確認</button>
        <input type="reset" value="取消" class="button_right" onclick="location.href='/PostController/homepage'">
    </form>
</body>

<?= $this->endSection() ?>