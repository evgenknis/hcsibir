<?php

namespace app\models\Calendar;

use yii\base\Model;

class CalendarPage extends Model
{
    public $month;
    public $year;
    public $weeksCount;
    
    public function __construct($month, $year) {             
        parent::__construct(); 
        var_dump($month);
        $this->month = $month; 
        $this->year = $year;
    }
    
    
}
