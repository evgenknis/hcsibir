<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Calendar\CalendarEvent */

$this->title = 'Create Calendar Event';
$this->params['breadcrumbs'][] = ['label' => 'Calendar Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dateTime = new DateTime();
$dateTime->setTimezone(new DateTimeZone('Asia/Novosibirsk'));

$model->date = $dateTime->format("Y-m-d");;
$model->start_time = $dateTime->format("H:m");
$dateTime->add(new DateInterval('PT1H'));
$model->end_time = $dateTime->format("H:m");

$groups = Array
(
    Constants::GROUP_A => 'Группа А',
    Constants::GROUP_B => 'Группа Б'
);

$places = Array
(
    Constants::PLACE_SKA => 'СКА',
    Constants::PLACE_RODNIK => 'Родник',
    Constants::PLACE_SMALLARENA => 'Малая арена'
);

?>
<div class="calendar-event-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'groups' => $groups,
        'places' => $places
    ]) ?>

</div>
