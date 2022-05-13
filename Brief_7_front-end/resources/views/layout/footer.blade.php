<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="footer">
        <p>©2022 My Baby Terms of ServicePrivacy PolicyWorldwide</p>
        <div id="icones">
            <img src="images/insta.png" alt="" class="icone">
            <img src="images/twitter.png" alt="" class="icone">
            <img src="images/facebook.png" alt="" class="icone">
        </div>
    </div>
</body>
</html>

<style>
    .footer{
        background-color: black;
        color: white;
        height: auto;
        padding: 10px;
        padding-bottom: 0px;
        display: flex;
        justify-content: space-between;
    }

    #icones{
        display: flex;
    }

    .icone{
        width: 30px !important;
        height: 30px;
        margin-left: 10px;
        margin-bottom: 7px;
    }

    @media (max-width:600px){
        .footer{
        display: block;
    }
    .footer p{
        margin-bottom: 7px;
    }
    #icones{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    }

</style>
