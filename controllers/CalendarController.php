<?php
namespace app\controllers;

use app\models\Calendar;
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
}
