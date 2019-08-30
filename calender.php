<!DOCTYPE html>
<html>

<head>
    
    <script>
        //make a two function for both next and previews buttons and give them parameters;
        //in the year there are 12month, so make a check whether the current month is at the minimum(previews) or maximum(next);
        //for previews function
        function GoPreviewsMonth(month, year) {
            if (month = 1){
                //if the current 1, decrease the year and set month to 12
                --year;
                month = 12;
            }
            //now we create a url to state the month and year, so the checking for month and year will set it to the variable
            document.location.href= "<?php $_SERVER['PHP_SELF'];?>?month="+month+"&year="+year;

        }
        //for next function
        function GoNextMonth(month, year) {
            if (month = 12){
                //if the current month 12,increase the year and set month 1
                ++year;
                month = 0;
            }
            document.location.href= "<?php $_SERVER['PHP_SELF'];?>?month="+(month+1)+"&year="+year;
        }
    </script>

</head>
<body>

    <?php
        if (isset($_GET['day'])){
            $day = $_GET['day'];
        }else{
            $day = date("j");
        }
        if (isset($_GET['month'])){
            $month = $_GET['month'];
        }else{
            $month = date("n");
        }
        if (isset($_GET['year'])){
            $year = $_GET['year'];
        }else{
            $year = date("Y");
        }


        echo $day."/".$month."/". $year;

        //calender variable;

        $currenttimestamp = strtotime("$year-$month-$day");
        //get current month name;
        $monthname = date("F", $currenttimestamp);

        //get the how many days are there in the current month
        $numdays =date("t",$currenttimestamp);

        //we need to set a variable to count cell in a loop later;
        $counter = 0;
    ?>

    <table border="1">
        <tr>
            <td><input width="70px" type="button" value="<" name="previews" onclick="GoPreviewsMonth(<?php echo $month."/".$year?>)"></td>
            <td colspan="5"> <?php echo $monthname." - ".$year; ?> </td>
            <td><input width="70px" type="button" value=">" name="next" onclick="GoNextMonth(<?php echo $month."/".$year?>)"></td>
        </tr>
        <tr>
            <td width="50px">Sun</td>
            <td width="50px">Mon</td>
            <td width="50px">Tue</td>
            <td width="50px">Wed</td>
            <td width="50px">Thu</td>
            <td width="50px">Fri</td>
            <td width="50px">Sat</td>
        </tr>

        <!--make a for loop, looping 1 to the number of days in month-->
        <?php

        echo "<tr>";

            for ($i=1; $i <$numdays+1; $i++, $counter++){


                //make a timestamp for each day in loop;
                $timestamp = strtotime("$year-$month-$i");

                //make a check if it is day 1;
                if ($i==1){
                    //get which day where day 1 fall on;
                    $firstday = date("w",$timestamp);

                    //make a loop and make a blank cell if is it not first day;
                    for ($j=1; $j<$firstday; $j++, $counter++){
                        //blank space;
                        echo "<td>&nbsp;</td>";
                    }

                }
                //make a check if the day is on last column, so we will make another row;
                if ($counter %7 == 0){
                    echo "<tr></tr>";

                }
                echo "<td align='center'>".$i."</td>";

            }

        echo "</tr>";


        ?>

    </table>

</body>

</html>


