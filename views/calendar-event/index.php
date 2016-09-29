<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Calendar\CalendarEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendar Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Calendar Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'start_time',
            'end_time',
            'name',
            // 'groups',
            // 'place',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
