<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="/style/home_default.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body class="bgcolor">
            <div class="left" id="leftblock">
                <div class="header">
                    <h1 id="title">中正大學碰碰版<br>CCU CAR ACCIDENT</h1>
                </div>
                <div class="list left">
                    <div id="home" class="sidebutton"><div class="insidebutton"><a class="sideword" href="/PostController/homepage">首頁</a></div></div>
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/PostController/postpage">打卡</a></div></div>
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/PostController/search">查詢</a></div></div>
                    <?php if(session()->get('Login')): ?>        
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/LoginController/profile">編輯</a></div></div>
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/LoginController/logout">登出</a></div></div>
                    <?php else: ?>
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/LoginController/login">登入</a></div></div>
                    <div class="sidebutton"><div class="insidebutton"><a class="sideword" href="/LoginController/register">註冊</a></div></div>
                    <?php endif; ?>
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