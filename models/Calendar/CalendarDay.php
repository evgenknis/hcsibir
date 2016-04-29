<?php

namespace app\models\Calendar;

use yii\base\Model;

class CalendarDay extends Model
{
    public $dayNumber;
    public $events;
    public $currentMonth;
    
    public function __construct($dayNumber, $events, $currentMonth) {             
        parent::__construct(); 
      
        $this->dayNumber = $dayNumber;
        $this->events = $events;
        $this->dayNumber = $currentMonth;
    }
    
    
}