<?php
    $campos="caption,media_type,media_url,permalink,timestamp,username";
    $token="IGQWROOHlNZA2kxZAjNEOHlUSDRZAcWMxUXhXeWpNbEhnMnhvMHRYOHlfdmNrNy1uM1lneHVlVlE1WHFtZADRfSmd5YXVsUDZA0bGhiR1dvcFRvWFhSTTFHWG9ONm1zLTExNkY4OVVpcFAxMlNBZAW1VRHVIZAWRCT2lub1UZD";
    $qtdefeeds=6;

    $url="https://graph.instagram.com/me/media?fields={$campos}&access_token={$token}&limit={$qtdefeeds}";
    
    $ch=curl_init($url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resultado = json_decode(curl_exec($ch));
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed do Guga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-image: radial-gradient(circle at 50% -20.71%, #d7c35d 0, #deba54 8.33%, #e4b04d 16.67%, #e9a546 25%, #ed9841 33.33%, #f0893e 41.67%, #f2793c 50%, #f3673d 58.33%, #f35542 66.67%, #f34249 75%, #f22b52 83.33%, #f0065d 91.67%, #ec0069 100%);
        }
        h1 {
        font-family:cursive;
          color: WHITE;
          text-shadow: 
               -1px -1px 0px #000, 
               -1px 1px 0px #000,                    
                1px -1px 0px #000,                  
                1px 0px 0px #000;
            padding:20px;
            margin-top:10px;
            display:flex;
            justify-content:space-between;
            background-color:;
        }
        .post {
            margin: 10px;
            padding: 0px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            display: inline-block;
            height: 680px;
            width: 600px;
            
        }
        .post img, .post video {
            max-width: 90%;
            height: auto;
            margin-top: 10px;
        }
        .video {
            width: 100%; /* Make the video player full width */
        }
        .img-icon{
            height:40px;
            width:40px;
        }
    </style>
</head>
<body>
    <h1> Feed do Gustavo <3
        <img src="insta.png " class="img-icon">
</h1>
    <?php
    foreach($resultado->data as $cp)
    {
        $media_type = $cp->media_type;
        $media_url = $cp->media_url;
        $permalink = $cp->permalink;
        $timestamp = $cp->timestamp;
        $username = $cp->username;
    ?>
        <div class="post">
       <h3> <p style="color: #000000;">@<?= $username ?></p></h3> 
       
            <?php if($media_type == "VIDEO"): ?>
                <video class="video" controls>
                    <source src="<?= $media_url ?>" type="video/mp4">
                    Seu navegador não suporta esse formato
                </video>
            <?php else: ?>
                <img src="<?= $media_url ?>" alt="Post Image">
                <p>Postado em: <?= $timestamp ?></p>
            
            <?php endif; ?>
         
        
        </div>
    <?php
    }
    ?>
</body>
</html>