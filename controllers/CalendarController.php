<?php
namespace app\controllers;

use app\models\Calendar\Calendar;
use app\models\Calendar\CalendarDay;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
    
    public function actionPage()
    {   
        $currentNum = rand();
       // $time = date('H:i:s');
    return $this->renderPartial('page',['currentNum' => $currentNum] );
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
