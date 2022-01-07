<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>

</head>

<body>
    <form>
    請輸入文字:
    <input type="text" id="text" name="text_name" style="width: 100%; height: 400px; " /> 
    </form>

   
	
<form action="/somewhere/to/upload" enctype="multipart/form-data">

<input name="progressbarTW_img" type="file" accept="image/gif, image/jpeg, image/png">

</form>
<a href="#top">回到頂端</a>
</body>

<?= $this->endSection() ?>