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
            if (isset($_GET['year'])){
               $year = $_GET['year'];
            }elseif (isset($_GET['viewyear'])){
                $year = $_GET['viewyear'];
            }else{
                $year = date('Y');
            }
            if ($month == '12'){
                $nextYear = $year + 1;
            }else{
                $nextYear= $year;
            }

            $monthR = array(
                    "1" => "январь",
                    "2" => "февраль",
                    "3" => "март",
                    "4" => "апрель",
                    "5" => "май",
                    "6" => "июнь",
                    "7" => "июль",
                    "8" => "август",
                    "9" => "сентябрь",
                    "10" => "октябрь",
                    "11" => "ноябрь",
                    "12" => "декабрь"
            );
            
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
