<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">

        .block-on-center {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -100px; }

        .cal{
            border: 1px solid #ccc;
            color: #333;
            background: #F6F6F6;
            font: Arial;
            font-size: 14px;
            text-align: center;}

        .caltoday{
            font: Arial;
            font-size: 14px;
            text-align: center;
            font-weight: bold;}

        .navi{
            font: Arial;
            font-size: 16px;
            font-weight: bold;}

        .datehead{
            font: Arial;
            font-size: 16px;
            font-weight: bold;}

    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Функциональный календарь на Php</h1>
    </div>

</header>
<div class="container">
    <section>
        <div class="container">
            <?php
            //Местоположение скрипта
            $self = $_SERVER['PHP_SELF'];
            
            ?>
        </div>
    </section>
</div>
<footer>
    <div class="navbar-fixed-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container">
                <h6>&copy;Marc Shreder 2020</h6>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
