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

            $firstOfMonth = mktime(0,0,0, $month, 1, $year);
            //массив имен всех дней в неделе
            $dayHeadings = array('Sunday','Monday','Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
            $maxdays = date('t', $firstOfMonth);
            $dateInfo = getdate($firstOfMonth);
            $month = $dateInfo['mon'];
            $year = $dateInfo['year'];

            if ($month == '1'){
                $lastYear = $year - 1;
            }else{
                $lastYear = $year;
            }
            // Вычитаем один день с первого дня месяца,
            //чтобы получить в конец прошлого месяца
            $timestampLastMonth = $firstOfMonth - (24*60*60);
            $lastMonth = date("m", $timestampLastMonth);
            // Проверяем, что если месяц декабрь,
            //на следующий месяц равен 1, а не 13

            if ($month == '12'){
                $nextMonth = '1';
            }else{
                $nextMonth = $month + 1;
            }
            //Формируем календарь
            $calendar ="
            <div class = \"block-on-center\">
                <table width='390px' height='280px' style='border: 1px solid #cccccc';>
                    <tr style='background: #5C8EB3;'>
                        <td colspan='7' class='navi'>
                        <a style='margin-right: 50px; color: white' href='$self?month=".$lastMonth. "&year=".$lastYear. "'><<</a>
                        <a style='margin-left: 50px; color: white' href='$self?month = ".$nextMonth. "&year=".$nextYear. "'>>></a>.
                        </td>
                    </tr>
                    <tr>
                        <td class='datehead'>Пн</td>
                        <td class='datehead'>Вт</td>
                        <td class='datehead'>Ср</td>
                        <td class='datehead'>Чт</td>
                        <td class='datehead'>Пт</td>
                        <td class='datehead'>Сб</td>
                        <td class='datehead'>Вс</td>
                    </tr>
                    
                    <tr>"
                    // очищаем имя класса css
                    //$class = "";
                    $weekDay = $dateInfo['wday'];
                    // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
                    if ($weekDay == -1){
                        $weekDay = 6;
                    }
                    //устанавливаем текущий день, как единицу
                    $day = 1;
                    // выводим ширину календаря
                    if ($weekDay > 0){
                        $calendar .= "<td colspan='$weekDay'> </td>";
                    }
                    while ($day <= $maxdays){
                        if ($weekDay == 7){
                            $calendar .= "</tr><tr>";
                            $weekDay = 0;
                        }
                        $linkDate = mktime(0,0,0, $month, $day, $year);
                        // проверяем, если распечатанная дата является сегодняшней датой.
                        //если так, используем другой класс css, чтобы выделить её
                         if ((($day < 10 and "0$day" == date('d')) or ($day >= 10 and "$day" == date('d'))) and (($month <10 and "0$month" == date('m')) or ($month >= 10 and "$month" ==date('m'))) and $year == date('Y')){
                             $class = "caltoday";
                         }else{
                            $d = date('m/d/Y', $linkDate);
                            $class ="cal";
                         }
                    }
                    //помечаем выходные дни красным
                    if ($weekDay == 5 || $weekDay == 6){
                        $red = 'style="color:red"';
                    }else{
                        $red ='';
                        $calendar .= "
                            <td class='{$class}'><span ".$red.">{$day}</span>
                            </td>";
                        $day++;
                        $weekDay++;
                    }
                    if ($weekDay != 7){
                        $calendar .= "<td colspan='" . (7 - $weekDay) . "'> </td>";
                    }
                    echo $calendar . "</tr></table>";
            </div>


            
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
