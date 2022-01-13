<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
    <title>中正碰碰版-首頁</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(window).scroll(function scroll(){
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                alert('bottom!!');
            }
        });
    </script>

</head>

<body>
    首頁公告尚未完成。
</body>

<?= $this->endSection() ?>