<!DOCTYPE html>

<html lang="en">

    <head>
        <title>中正大學碰碰版</title>
        <link rel="stylesheet" href="/style/home_default.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body class="bgcolor">
       
            <div class="left" id="leftblock">
                <div class="header">
                    <h1 id="title">中正大學碰碰版 CCU CAR ACCIDENT</h1>
                </div>
                <div class="list left">
                    <a class="sidebutton sideword">打卡</a>
                    <a class="sidebutton sideword">查詢</a>
                    <a class="sidebutton sideword" href="/LoginController/login">登入</a>
                    <a class="sidebutton sideword" href="/LoginController/register">註冊</a>
                    <a class="sidebutton sideword" href="/PostController/postpage">首頁</a>
                </div>
                <div class="left" id="contentbox">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>

            <div class="left" id="rightblock">
                <div class="ranking">
                    <h1>車禍榜</h1>
                </div>     
            </div>
        
    </body>

</html>