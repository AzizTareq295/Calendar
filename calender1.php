<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


class calender{
    public $month;
    public $year;
    public $days_of_week;
    public $num_days;
    public $date_info;
    public $day_of_week;

    public function __construct($month, $year, $days_of_week = array('S','M','T','W','Th','F','S')){

        $this->month = $month;
        $this->year = $year;
        $this->days_of_week =$days_of_week;
        $this->num_days = cal_days_in_month(CAL_GREGORIAN,$this-> month, $this-> year);
        $this->date_info = getdate(strtotime('First Day Of', mktime(0,0,0,$this->month,1,$this->year)));
        $this->day_of_week =$this->date_info['wday'];

    }
    public function show(){
        //create a heading with month and year by caption
        $output = '<table class="calender">';
        $output .= '<caption>'.$this->date_info['month'].''.$this->year.'</caption>';
        $output .= '<tr>';

        //name of days
        foreach ($this->days_of_week as $day){
            $output .='<th class="header">'.$day.'</th>';
        }
        //closing header and row and opening first row of the day
        $output .='</tr><tr>';

        //if the first day does not fall on the Sunday, then we need to feel
        //beginning space using colspan
        if ($this->day_of_week >0){
            $output .='<td colspan="'. $this->day_of_week . '"></td>';
        }

        //start number days counter
        $current_day = 1;

        //loop and bulid days
        while ($current_day <= $this->num_days){
            //Reset day of week counter and close each row if end of row;
            if ($this->day_of_week == 7){
                $this->day_of_week =0;
                $output .='</tr><tr>';
            }

            //Bulid each day cell;
            $output .= '<td class="day">'.$current_day.'</td>';

            //increament counter days
            $current_day++;
            $this->day_of_week++;

        }
        //once number days counter stops, if day of week is not 7, then we need to fill the remaining space
        if ($this->day_of_week !=7){
            $remaining_days = 7- $this->day_of_week;
            $output .='<td colspan="'.$remaining_days.'"></td>';

        }



        //close the final row and table

        $output .='</tr>';
        $output .='</table>';

        echo $output;

    }

}

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

    <?php

        $calender = new calender(3,2017);
        $calender->show();

    ?>

</body>
</html>
