<?php
namespace app\controllers;

use app\models\Calendar\Calendar;
use app\models\Calendar\CalendarDay;
use app\models\Calendar\CalendarEvent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use DateTime;
use DateInterval;
use Constants;

class CalendarController extends Controller
{
    public $layout = 'blank';

    public function actionView()
    {   
        $model = new Calendar;

        if ($model === null) {
            throw new NotFoundHttpException;
        }

        
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    public function actionPage($start, $end)
    {   
        $startDate = DateTime::createFromFormat('Y-m-d', $start);
        $endDate = DateTime::createFromFormat('Y-m-d', $end);
        
        $datediff = $endDate->getTimestamp() - $startDate->getTimestamp();
        $dayCount = floor($datediff/(60*60*24)) + 1;
        
        $calendarDays = array();   

        for ($i = 0; $i < $dayCount; $i++)
        {                 
            $eventStartDate = clone $startDate;
            $eventEndDate = clone $eventStartDate;
            $eventEndDate->add(new DateInterval('PT1H'));
           // $date = $this->addDaysToDate($startDate, );
            array_push($calendarDays, new CalendarDay(clone $startDate, 
                    array(
                        new CalendarEvent($eventStartDate,$eventEndDate,"Лёд",array(Constants::GROUP_A,Constants::GROUP_B),Constants::PLACE_RODNIK ), 
                        new CalendarEvent($eventStartDate,$eventEndDate,"Лёд", array(Constants::GROUP_A,Constants::GROUP_B),Constants::PLACE_SKA)))
                    );          
            $startDate->add(new DateInterval('P1D'));
            //or $array[] = $some_data; for single items.
        }
       // $currentNum = rand();
       // $time = date('H:i:s');
     return $this->renderPartial('page',['calendarDays' => $calendarDays] );
     //return $this->render('page',['calendarDays' => $calendarDays] );
//        $model = new CalendarDay(1,array (1,2,3));
//
//        if ($model === null) {
//            throw new NotFoundHttpException;
//        }
//
//        return $this->render('page', [
//            'model' => $model,
//        ]);
   }
   
    private function addDaysToDate($date, $days)
    {
        $newDate = strtotime("+".$days." days", strtotime($date));
        return date("Y-m-d", $newDate);
    }
}
