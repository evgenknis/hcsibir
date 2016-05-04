<?php 
use yii\widgets\Pjax;
use yii\helpers\Html;

?>

<?php  $this->render('page'); ?>
<div id="data">

<!--?php Pjax::begin(); ?-->
    <!--?= Html::a("Обновить", ['calendar/view'], ['class' => 'btn btn-lg btn-primary']);?-->
        
    
<!--?php Pjax::end(); ?-->
</div>




