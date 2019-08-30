<?php

//set your time zone;
date_default_timezone_set('Asia/Dhaka');

//get previews and next month
if (isset($_GET['ym'])){
    $ym = $_GET['ym'];
}else{
    //This Month
    $ym = date('Y-m');
}
//check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false){
    $timestamp = time();
}
//today

$today = date('Y-m-d',time());

//for title
$html_titles = date('m / Y',$timestamp);

//create previews next month link
//mktime(hour,minute,second,month,day,year)
$pre = date('Y-m', mktime(0,0,0, date('m',$timestamp)-1, 1,date('Y',$timestamp)));
$next = date('Y-m', mktime(0,0,0, date('m',$timestamp)+1, 1,date('Y',$timestamp)));

//number of the day in the month
$day_count = date('t',$timestamp);

//0:sun. 1:mon. 2:tue....
$str = date('w', mktime(0,0,0, date('m',$timestamp), 1,date('Y',$timestamp)));

//create calender

$weeks = array();
$week = '';

//Add empty cell

$week .= str_repeat('<td></td>',$str);

for ($day =1; $day <=$day_count; $day++, $str++){
    $date = $ym .'-'.$day;

    if ($today == $date){
        $week .='<td class="today"><a methods="get" href="event_form.php">'.$day;
    }else{
        $week .='<td><a methods="get" href="event_form.php">'.$day;
    }
    $week .='</a></td>';

    //End Of Day Or End Of Week
    if ($str % 7 ==6 || $day == $day_count){

        if ($day == $day_count){
            //Add Empty Cell
            $week .= str_repeat('<td></td>',6 -($str %7));
        }

        $weeks[] ='<tr>'.$week.'</tr>';

        //prepare for new week
        $week='';

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Calender</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/js/bootstrap.min.js" rel="script" type="text/css">


    <meta name="viewport" content="width=device-width, inisial-scale=1.0">
    <style>

        *{margin: 0;padding: 0}

        .container {
            font-family: "Times New Roman";
            font-size: 30px;
            margin: 20px auto;
            overflow: hidden;

        }
        a{
            text-decoration: none;
            display: inline-block;

        }
        th{
            height: 30px;
            text-align: center;
            font-weight: 700;
        }
        td{
            height: 80px;
            text-align: center;
        }
        .today{
            background: rgba(8, 6, 5, 0.76);
            color: rgba(255, 253, 251, 0.76);
        }
        th:nth-of-type(7),td:nth-of-type(7){
            color: rgba(92, 127, 205, 0.76);
        }
        th:nth-of-type(1),td:nth-of-type(1){
            color: #e8312b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 align="center"><a href="?ym=<?php echo $pre?>"> &lt; </a><?php echo $html_titles ?><a href="?ym=<?php echo $next?>"> &gt; </a></h1>
        <table class="table table-bordered">
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <?php
                foreach ($weeks as $week){
                    echo $week;
                }
            ?>
        </table>
    </div>

</body>

</html>




