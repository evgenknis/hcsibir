<?php

namespace app\models\Calendar;

use yii\base\Model;

class Calendar extends Model
{
    public $page;
 
    public function __construct() {             
        parent::__construct(); 
        
        $now = new \DateTime('now');
        $month = intval($now->format('n'));  
        $year = intval($now->format('Y')); 
        
        $this->page = new CalendarPage($month, $year);
    }
    
}

