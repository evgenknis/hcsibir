<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Calendar\CalendarEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        //'ajaxConversion'=>false,
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ])?>
    
    <?= $form->field($model, 'start_time')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'showMeridian' => false
        ]
    ]);?> 
    
    <?= $form->field($model, 'end_time')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'showMeridian' => false
        ]
    ]);?> 
  

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'groups')->widget(Select2::classname(), [
        'data' => $groups,
        'options' => ['placeholder' => 'Выберите группу ...', 'multiple' => true]
    ]); ?>
    
    <?= $form->field($model, 'place')->widget(Select2::classname(), [
        'data' => $places,
        'options' => ['placeholder' => 'Выберете место ...']
    ]); ?>

    <!--?= $form->field($model, 'groups')->textInput() ?-->

    <!--?= $form->field($model, 'place')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
