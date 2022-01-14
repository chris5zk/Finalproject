<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-查詢</title>
    <link rel="stylesheet" href="/style/post_system.css">
</head>
<body>
    <div class="">
        <h4>事故日期:<?php echo $post['date']?></h4>
        <h4>事故地點:<?php echo $post['place']?></h4>
        <h4>聯絡人:<br><?php echo $post['contact']?></h4>
        <h4>事發經過:<?php echo $post['content']?></h4>
        <img src="/upload/<?php echo $post['myfile']?>" width="100%" height="400px">
    </div>
</body>


<?= $this->endSection() ?>