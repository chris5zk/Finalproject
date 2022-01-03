<!DOCTYPE html>

<html lang="en">

    <head>
        <title>中正大學碰碰版</title>
        <link rel="stylesheet" href="/style/home_default.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="bottom">
            <div class="left bottom" id="L">
                <div class="title">
                    <h1 id="header">中正大學碰碰版 CCU CAR ACCIDENT</h1>
                </div>
                <div class="bottom">
                    <div class="sidebutton sideword">打卡</div>
                    <div class="sidebutton sideword">查詢</div>
                    <div class="sidebutton sideword">登入</div>
                    <div class="sidebutton sideword">註冊</div>
                    <div class="bottom" id="contentbox">
                    <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
            <div class="left rank bottom">
                    <h1>車禍榜</h1>
            </div>
        </div>
    </body>

</html>