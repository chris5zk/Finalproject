<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-查詢</title>
    <link rel="stylesheet" href="/style/post_system.css">
</head>

<body>
    <form action="/PostController/found" enctype="multipart/form-data" method="post">
        <h2 class="center">要搜尋的車牌:</h2>
        <input id="car2" type="text" name="car" placeholder="請輸入車牌號碼" class="center">
        <br><br>
        <button class="button_left">查詢</button>
        <input type="reset" value="取消" class="button_right" onclick="location.href='/PostController/homepage'">
    </form>
    <?php if(isset($posts)): ?>
        <h2 class="center">事故次數：<?php echo ''.count($posts).'' ?></h2>
        <?php
            foreach($posts as $post){
                echo '
                <div class="center">
                    <br>
                    <a href="/PostController/show/'.$post['id'].'">'.$post['date'].'</a>
                </div>
                ';
            }
                
        ?>
    <?php endif;?>
</body>

<?= $this->endSection() ?>