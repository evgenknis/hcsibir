<?php

namespace app\models\Calendar;

use yii\base\Model;

class CalendarDay extends Model
{
    public $date;
    public $events;
    public $currentMonth;
    
    public function __construct($date, $events) {             
        parent::__construct(); 
      
        $this->date = $date;
        $this->events = $events;
    }
    
    
}
