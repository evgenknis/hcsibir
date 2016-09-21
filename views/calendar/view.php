<?php 
use yii\widgets\Pjax;
use yii\helpers\Html;
use app\controllers\CalendarController; 

?>


<div id="data" class="container"></div>
<?php Pjax::begin(['id'=>'data','enablePushState' => false]); ?>

      <!--?= $response ?-->
<?= Html::a("Обновить", ['calendar/page','start'=>'2016-06-01','end'=>'2016-06-30'], ['class' => 'btn btn-lg btn-primary']);?>
<?php Pjax::end(); ?>
      
              





