<?php
namespace app\controllers;

use app\models\Calendar\Calendar;
use app\models\Calendar\CalendarDay;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use DateTime;

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
        $dayCount = floor($datediff/(60*60*24));
        
        $calendarDays = array(); 

        for ($i = 0; $i < $dayCount; $i++)
        {
            array_push($calendarDays, new CalendarDay($i, null));
            //or $array[] = $some_data; for single items.
        }
       // $currentNum = rand();
       // $time = date('H:i:s');
    return $this->renderPartial('page',['calendarDays' => $calendarDays] );
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
}
