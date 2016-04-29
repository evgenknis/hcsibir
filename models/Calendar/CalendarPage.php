<?php

namespace app\models\Calendar;

use yii\base\Model;
use DateTime;

class CalendarPage extends Model
{
    public $month;
    public $year;
    
    public $days = array();
    private $weeksCount = 6;
    private $daysCount = 7;
    private $previousMonth;
    private $nextMonth;
    private $previousYear;
    private $nextYear;
    
    private $previousMonthDaysCount;
    private $previousMonthLastDayNumber;
    
    public function __construct($month, $year) {             
        parent::__construct(); 
        var_dump($month);
        $this->month = $month; 
        $this->year = $year;
        
        $date = new DateTime();
        
        $this->previousMonth = $month == 1 ? 12 : $month - 1;
        $this->nextMonth = $month == 12 ? 1 : $month + 1;
        
        $this->previousYear = $month == 1 ? $year - 1 : $year;
        $this->nextYear = $month == 12 ? $year + 1 : $year;
       
        
        $firstDayNumber = intval(date("N", $date->getTimestamp()));
        $daysCount = intval(date("t", $date->getTimestamp()));
        
    }
    
    private function createDays($firstDayNumber, $daysCount) {
        
        $date = new DateTime();
        $date->setDate($this->previousYear, $this->previousMonth, 1);   
        $previousMonthDaysCount = intval(date("t", $date->getTimestamp()));
        $date->setDate($this->previousYear, $this->previousMonth,  $previousMonthDaysCount);
        $previousMonthLastDayNumber = intval(date("N", $date->getTimestamp()));
        
        $month = $this->previousMonth;
        $dayNumber = $previousMonthDaysCount - $previousMonthLastDayNumber + 1; 
        
       for ($i = 0; $i < $weeksCount; $i++)
       {
            $days[$i] = array();
            for ($j = 0; $j < $daysCount; $i++)
            {
                if ($dayNumber > $previousMonthDaysCount && $month == $this->previousMonth)
                {
                    $dayNumber = 1;
                    $month = $this->month;
                }
                
               $days[$i][$j] = new CalendarDay();
                    
            }
       }
    }
    
    
}
