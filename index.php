<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            //Проверяем, была ли переменая month задана в url
            //или обращаемся к PHP функции date()
            if (isset($_GET['month'])){
                $month = $_GET['month'];
            }elseif (isset($_GET['viewmonth'])){
                $month = $_GET['viewmonth'];
            }else{
                $month = date('m');
            }
            // Теперь мы проверим, если переменная года устанавливается в URL,
            //или обращаемся к PHP функции date()
            //чтобы установить текущий год, если текущий год не установлен в URL-адресе.
            
            
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
