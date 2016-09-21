<?php

namespace app\models\Calendar;
use yii\base\Model;

class CalendarEvent extends Model
{
    public $startDate;
    public $endDate;
    public $eventName;
    public $groups;
    public $place;
    
    public function __construct($startDate, $endDate, $eventName, $groups, $place) {             
        parent::__construct(); 
      
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->eventName = $eventName;
        $this->groups = $groups;
        $this->place = $place;
    }
    
    
}
